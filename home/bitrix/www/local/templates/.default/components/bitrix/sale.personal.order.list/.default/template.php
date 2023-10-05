<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

function plural_form($n, $form1, $form2, $form5)
{
    $n = abs($n) % 100;
    $n1 = $n % 10;
    if ($n > 10 && $n < 20) return $form5;
    if ($n1 > 1 && $n1 < 5) return $form2;
    if ($n1 == 1) return $form1;
    return $form5;
}

if (!empty($arResult['ERRORS']['FATAL']))
{
    echo '<div class="clearfix">';
    	foreach($arResult['ERRORS']['FATAL'] as $error) { ShowError($error); }
    	$component = $this->__component;
    	if ($arParams['AUTH_FORM_IN_TEMPLATE'] && isset($arResult['ERRORS']['FATAL'][$component::E_NOT_AUTHORIZED])) { $APPLICATION->AuthForm('', false, false, 'N', false); }
    echo '</div>';
}
else
{
	$nothing = !isset($_REQUEST["filter_history"]) && !isset($_REQUEST["show_all"]);
	$clearFromLink = array("filter_history","filter_status","show_all", "show_canceled");

    echo '<div class="filter-btn-wrap">';
        echo '<div class="filter-btn filter-btn-2 aligner">';
            $orders_cur = "";
            $orders_history = "";
            $orders_canceled = "";

            if($_REQUEST["filter_history"] == 'Y' and $_REQUEST["show_canceled"] == 'Y')
            {
                $orders_canceled = " is-active";
            }
            if($_REQUEST["filter_history"] == 'Y' and $orders_canceled == "")
            {
                $orders_history = " is-active";
            }
            if($orders_canceled == "" and $orders_history == "")
            {
                $orders_cur = " is-active";
            }

            echo '<a href="'.$APPLICATION->GetCurPageParam("", $clearFromLink, false).'" class="'.$orders_cur.'">';
                echo '<span class="aligner">'.Loc::getMessage("SPOL_TPL_CUR_ORDERS").'</span>';
            echo '</a>';

            echo '<a href="'.$APPLICATION->GetCurPageParam("filter_history=Y", $clearFromLink, false).'" class="'.$orders_history.'">';
                echo '<span class="aligner">'.Loc::getMessage("SPOL_TPL_VIEW_ORDERS_HISTORY").'</span>';
            echo '</a>';

            echo '<a href="'.$APPLICATION->GetCurPageParam("filter_history=Y&show_canceled=Y", $clearFromLink, false).'" class="'.$orders_canceled.'">';
                echo '<span class="aligner">'.Loc::getMessage("SPOL_TPL_VIEW_ORDERS_CANCELED").'</span>';
            echo '</a>';
            
        echo '</div>';
    echo '</div>';

    if($arResult['ORDERS'])
    {
        echo '<div class="table-container">';
        	echo '<table class="table-order">';

            	foreach ($arResult['ORDERS'] as $key => $order)
            	{

    				echo '<tr>';
    					echo '<td>';
    						echo '<div class="order-number-wrap">';
    							echo '<div class="order-number">№ <span>'.$order["ORDER"]["ACCOUNT_NUMBER"].'</span></div>';
    							echo '<div class="order-time icon-2">'.$order['ORDER']['DATE_INSERT']->format($arParams['ACTIVE_DATE_FORMAT']).'</div>';
    						echo '</div>';
    					echo '</td>';
                        
    					echo '<td>';
    						echo '<div class="order-value-wrap">';
    							echo '<div class="order-value">'.count($order["BASKET_ITEMS"]).' '.plural_form(count($order["BASKET_ITEMS"]), 'товар', 'товара', 'товаров').'</div>';
    							echo '<div class="product-more"><a href="'.$order["ORDER"]["URL_TO_DETAIL"].'">Подробнее</a></div>';
    						echo '</div>';
    					echo '</td>';

    					echo '<td>';
            				foreach ($order['PAYMENT'] as $payment)
            				{
            					if ($payment['PAID'] === 'Y')
            					{
                                    if($order["ORDER"]["CANCELED"] == "Y"){
                                        echo '<div class="state icon-2 is-cancelled">'.Loc::getMessage('SPOL_TPL_ORDER_CANCELED').'</div>';
                                    }else{
                                        echo '<div class="state icon-2 is-waiting">'.Loc::getMessage('SPOL_TPL_PAID').'</div>';
                                        echo '<div class="state icon-2">'.$arResult["INFO"]["STATUS"][$order["ORDER"]["STATUS_ID"]]["NAME"].'</div>';
                                    }
            					}
            					elseif ($order['ORDER']['IS_ALLOW_PAY'] == 'N')
            					{
                                    if($order["ORDER"]["CANCELED"] == "Y"){
                                        echo '<div class="state icon-2 is-cancelled">'.Loc::getMessage('SPOL_TPL_ORDER_CANCELED').'</div>';
                                    }else{
                                        echo '<div class="state icon-2 is-waiting">'.Loc::getMessage('SPOL_TPL_RESTRICTED_PAID').'</div>';
                                        echo '<div class="state icon-2">'.$arResult["INFO"]["STATUS"][$order["ORDER"]["STATUS_ID"]]["NAME"].'</div>';
                                    }
            					}
            					else
            					{
                                    if($order["ORDER"]["CANCELED"] == "Y"){
                                        echo '<div class="state icon-2 is-cancelled">'.Loc::getMessage('SPOL_TPL_ORDER_CANCELED').'</div>';
                                    }else{
                                        echo '<div class="state icon-2 is-cancelled">'.Loc::getMessage('SPOL_TPL_NOTPAID').'</div>';
                                        echo '<div class="state icon-2">'.$arResult["INFO"]["STATUS"][$order["ORDER"]["STATUS_ID"]]["NAME"].'</div>';
                                    }
            					}
            				}
    					echo '</td>';

    					echo '<td>';
    						echo '<div class="result-price">'.$order["ORDER"]["FORMATED_PRICE"].'</div>';
    					echo '</td>';
                        
    					echo '<td>';
    						echo '<div class="order-btn">';
                                foreach ($order['PAYMENT'] as $payment)
                                {
                                    if ($order["ORDER"]["STATUS_ID"] == "G" && $payment['PAID'] == "N")   $payment['PAID'] = 'N';
                                    else $payment['PAID'] = 'Y';
                                    if ($payment["PAY_SYSTEM_ID"] == 1 || $payment["PAY_SYSTEM_ID"] == 11) $payment['PAID'] = 'Y';

                					if ($payment['PAID'] === 'N' and $payment['IS_CASH'] !== 'Y' and $_REQUEST["filter_history"] != 'Y')
                					{
                						if ($order['ORDER']['IS_ALLOW_PAY'] == 'N')
                						{
                                            if($order["ORDER"]["STATUS_ID"] != "N"){
                                                echo '<a class="buy">'.Loc::getMessage('SPOL_TPL_PAY').'</a>';
                                            }
                                            if ($order["ORDER"]["STATUS_ID"] == "J" || $order["ORDER"]["STATUS_ID"] == "H" || $order["ORDER"]["STATUS_ID"] == "G" ) { continue; }
                                            else {
                                                echo '<a class="cancel" href="' . htmlspecialcharsbx($order["ORDER"]["URL_TO_CANCEL"]) . '">' . Loc::getMessage('SPOL_TPL_CANCEL_ORDER') . '</a>';
                                            }
                						}
                						elseif ($payment['NEW_WINDOW'] === 'Y')
                						{
                                            if($order["ORDER"]["STATUS_ID"] != "N"){
                                                echo '<a class="buy" href="'.htmlspecialcharsbx($payment['PSA_ACTION_FILE']).'" target="_blank" >'.Loc::getMessage('SPOL_TPL_PAY').'</a>';
                                            }
                                            if ($order["ORDER"]["STATUS_ID"] == "J" || $order["ORDER"]["STATUS_ID"] == "H" || $order["ORDER"]["STATUS_ID"] == "G" ) { continue; }
                                            else {
                                                echo '<a class="cancel" href="' . htmlspecialcharsbx($order["ORDER"]["URL_TO_CANCEL"]) . '">' . Loc::getMessage('SPOL_TPL_CANCEL_ORDER') . '</a>';
                                            }
                                        }
                						else
                						{
                                            if($order["ORDER"]["STATUS_ID"] != "N"){
                                                echo '<a class="buy" href="'.htmlspecialcharsbx($payment['PSA_ACTION_FILE']).'">'.Loc::getMessage('SPOL_TPL_PAY').'</a>';
                                            }

                                            if ($order["ORDER"]["STATUS_ID"] == "J" || $order["ORDER"]["STATUS_ID"] == "H" || $order["ORDER"]["STATUS_ID"] == "G" ) { continue; }
                                            else {
                                                echo '<a class="cancel" href="'.htmlspecialcharsbx($order["ORDER"]["URL_TO_CANCEL"]).'">'.Loc::getMessage('SPOL_TPL_CANCEL_ORDER').'</a>';
                                            }

                                        }
                					}
                                    
                                    if($payment['PAID'] === 'Y' or $_REQUEST["filter_history"] == 'Y' )
                                    {
                                        echo '<a class="cancel" href="'.htmlspecialcharsbx($order["ORDER"]["URL_TO_COPY"]).'">'.Loc::getMessage('SPOL_TPL_REPEAT_ORDER').'</a>';
                                    }
                                }
    						echo '</div>';
    					echo '</td>';
    				echo '</tr>';
                }
                
            echo '</table>';
        echo '</div>';
        
    	echo $arResult["NAV_STRING"];
        
    }else{
        
        echo '<div class="clearfix">';
        	if (!empty($arResult['ERRORS']['NONFATAL']))
        	{
        		foreach($arResult['ERRORS']['NONFATAL'] as $error){ ShowError($error); }
        	}
        	if (!count($arResult['ORDERS']))
        	{
        		if ($_REQUEST["filter_history"] == 'Y')
        		{
        			if ($_REQUEST["show_canceled"] == 'Y')
        			{
        				echo '<h3>'.Loc::getMessage('SPOL_TPL_EMPTY_CANCELED_ORDER').'</h3>';
        			}
        			else
        			{
        				echo '<h3>'.Loc::getMessage('SPOL_TPL_EMPTY_HISTORY_ORDER_LIST').'</h3>';
        			}
        		}
        		else
        		{
        			echo '<h3>'.Loc::getMessage('SPOL_TPL_EMPTY_ORDER_LIST').'</h3>';
        		}
        	}
        echo '</div>';

        
    }

}
?>

<div id="popup-pay" class="popup">

</div>
