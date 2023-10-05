<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use Bitrix\Main\Localization\Loc,
	Bitrix\Main\Page\Asset;

#Установим заголовок страницы
if ($arParams["SET_TITLE"] == 'Y')
{
    $APPLICATION->SetPageProperty('title',Loc::getMessage('SPOD_LIST_MY_ORDER', array('#ACCOUNT_NUMBER#' => htmlspecialcharsbx($arResult["ACCOUNT_NUMBER"]),'#DATE_ORDER_CREATE#' => $arResult["DATE_INSERT_FORMATED"])) );
}

if (!empty($arResult['ERRORS']['FATAL']))
{
	foreach ($arResult['ERRORS']['FATAL'] as $error){ ShowError($error); }

	$component = $this->__component;

	if ($arParams['AUTH_FORM_IN_TEMPLATE'] && isset($arResult['ERRORS']['FATAL'][$component::E_NOT_AUTHORIZED])){ 
	   $APPLICATION->AuthForm('', false, false, 'N', false); 
    }
}
else
{
	if (!empty($arResult['ERRORS']['NONFATAL']))
	{
		foreach ($arResult['ERRORS']['NONFATAL'] as $error){ ShowError($error); }
	}
?>

<div class="table-container">
	<table class="content-table">
		<tr>
			<th>№</th>
			<th>Фото</th>
			<th>Описание товара</th>
			<th>Статус заказа</th>
			<th>Количество</th>
			<th>Цена</th>
		</tr>
        <?
            $count_basket = 1;
            foreach ($arResult['BASKET'] as $basketItem)
            {
				if (strlen($basketItem['PICTURE']['SRC'])){
					$imageSrc = $basketItem['PICTURE']['SRC'];
				}else{
					$imageSrc = $this->GetFolder().'/images/no_photo.png';
				}
                
                #получим свойсво артикул
                $arFilelds = array();
                $arProps = array();
                $array_list = CIBlockElement::GetList(
                    array(), 
                    array("ID"=>$basketItem["PRODUCT_ID"]), 
                    false, 
                    false,
                    array("IBLOCK_ID","ID","NAME") 
                );
            	while($ob = $array_list->GetNextElement()){ 
                    $arProps = $ob->GetProperties();
                }

        		echo '<tr>';
        			echo '<td>'.$count_basket.'</td>';
        			echo '<td>';
        				echo '<div class="images">';
                            echo '<a href="'.$basketItem['DETAIL_PAGE_URL'].'"><img src="'.$imageSrc.'" alt="'.htmlspecialcharsbx($basketItem['NAME']).'"></a>';
                        echo '</div>';
        			echo '</td>';
        			echo '<td>';
        				echo '<div class="title-product">';
        					echo '<div class="title">'.htmlspecialcharsbx($basketItem['NAME']).'</div>';
                            if( mb_strlen( $arProps["ARTICLE"]["VALUE"] ) > 0 ){
                                echo '<div class="art">'.$arProps["ARTICLE"]["NAME"].' '.$arProps["ARTICLE"]["VALUE"].'</div>';
                            }
							if (isset($basketItem['PROPS']) && is_array($basketItem['PROPS']))
							{
								foreach ($basketItem['PROPS'] as $itemProps)
								{
								    echo '<div class="art">'.htmlspecialcharsbx($itemProps['NAME']).' '.htmlspecialcharsbx($itemProps['VALUE']).'</div>';
								}
							}
        				echo '</div>';
        			echo '</td>';
        			echo '<td>';
    					if ($arResult['CANCELED'] !== 'Y'){
    						echo '<div class="cart-status true">'.htmlspecialcharsbx($arResult["STATUS"]["NAME"])."</div>";
    					}else{
    						echo '<div class="cart-status true">'.Loc::getMessage('SPOD_ORDER_CANCELED')."</div>";
    					}
            
						foreach ($arResult['PAYMENT'] as $payment)
						{
							echo '<div class="cart-status true">';
								if ($payment['PAID'] === 'Y'){
									echo Loc::getMessage('SPOD_PAYMENT_PAID');
								}elseif($arResult['IS_ALLOW_PAY'] == 'N'){
									echo Loc::getMessage('SPOD_TPL_RESTRICTED_PAID');
								}else{
									echo Loc::getMessage('SPOD_PAYMENT_UNPAID');
								}
							echo '</div>';
						}
        			echo '</td>';
        			echo '<td>';
        				echo '<div class="cart-value"><input type="text" value="'.$basketItem['QUANTITY'].'" disabled="disabled" /></div>';
        			echo '</td>';
        			echo '<td><div class="cart-price">'.$basketItem['PRICE_FORMATED'].'</div></td>';
        		echo '</tr>';

                $count_basket++;
            }
        ?>
	</table>
</div><!-- /.table-container -->

<div class="cart-result-wrap">
	<?
		if (floatval($arResult["ORDER_WEIGHT"]))
		{
			echo '<div class="cart-result-value">'.Loc::getMessage('SPOD_TOTAL_WEIGHT').': '.$arResult['ORDER_WEIGHT_FORMATED'].'</div>';
		}
		if ($arResult['PRODUCT_SUM_FORMATED'] != $arResult['PRICE_FORMATED'] && !empty($arResult['PRODUCT_SUM_FORMATED']))
		{
			echo '<div class="cart-result-value">'.Loc::getMessage('SPOD_COMMON_SUM').': '.$arResult['PRODUCT_SUM_FORMATED'].'</div>';
		}
		if (strlen($arResult["PRICE_DELIVERY_FORMATED"]))
		{
			echo '<div class="cart-result-value">'.Loc::getMessage('SPOD_DELIVERY').': '.$arResult["PRICE_DELIVERY_FORMATED"].'</div>';
		}
		foreach ($arResult["TAX_LIST"] as $tax)
		{
			echo '<div class="cart-result-value">'.Loc::getMessage('SPOD_TAX').': '.$tax["VALUE_MONEY_FORMATED"].'</div>';
		}
		echo '<div class="cart-result-value">'.Loc::getMessage('SPOD_SUMMARY').': '.$arResult['PRICE_FORMATED'].'</div>';

		if ($arParams['GUEST_MODE'] !== 'Y')
		{
            echo '<div class="cart-result-btn">';
                if($arResult["STATUS_ID"] != "N")
                {
            		foreach ($arResult['PAYMENT'] as $payment)
            		{
                        if ($arResult["STATUS_ID"] == "G" && $payment['PAID'] == "N")   $payment['PAID'] = 'N';
                        else $payment['PAID'] = 'Y';

                        if ($payment["PAY_SYSTEM_ID"] == 1 || $payment["PAY_SYSTEM_ID"] == 11) $payment['PAID'] = 'Y';

            			if ($payment['PAY_SYSTEM']["IS_CASH"] !== "Y"){
            				if ($payment['PAY_SYSTEM']['PSA_NEW_WINDOW'] === 'Y' && $arResult["IS_ALLOW_PAY"] !== "N"){
            					echo '<a class="cancel-order" target="_blank" href="'.htmlspecialcharsbx($payment['PAY_SYSTEM']['PSA_ACTION_FILE']).'">'.Loc::getMessage('SPOD_ORDER_PAY').'</a>';
            				}
            			}
                        
						if ($payment["PAID"] !== "Y"
							&& $payment['PAY_SYSTEM']["IS_CASH"] !== "Y"
							&& $payment['PAY_SYSTEM']['PSA_NEW_WINDOW'] !== 'Y'
							&& $arResult['CANCELED'] !== 'Y'
							&& $arResult["IS_ALLOW_PAY"] !== "N")
						{
                            echo $payment['BUFFERED_OUTPUT'];
						}
            		}
                }

                echo '<a href="'.$arResult["URL_TO_COPY"].'" class="repeat-order">'.Loc::getMessage('SPOD_ORDER_REPEAT').'</a>';

                if ($arResult["STATUS_ID"] == "J" || $arResult["STATUS_ID"] == "H" || $arResult["STATUS_ID"] == "G" ) { $arResult["CAN_CANCEL"] = "N"; }

                if ($arResult["CAN_CANCEL"] === "Y")
				{
					echo '<a href="'.$arResult["URL_TO_CANCEL"].'" class="repeat-order">'.Loc::getMessage('SPOD_ORDER_CANCEL').'</a>';
				}
            echo '</div>';

        }
    ?>
</div>

<?}?>