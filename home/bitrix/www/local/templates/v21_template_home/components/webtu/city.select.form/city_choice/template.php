<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) { ?>
    <? die(); ?>
<? } ?>

<style>
    .ui-front {
        color: #C69643;
        width: 300px;
    }
</style>

<script>
    var cityNames = [];
    var cityIds = [];
</script>

<div class="popup-form_block">
<?/*?><form action="" method="post" class="city-selector" ><?*/?>

    <?if (CSite::InDir('/en/')) {
        $db_props = CIBlockElement::GetProperty(114, $_SESSION['city'], array("sort" => "asc"), Array("CODE"=>"ATT_ENGLISH"));
        if($ar_props = $db_props->Fetch()) {
            $selectedCity = $ar_props["VALUE"];
        }
    } else {
        if (CSite::InDir('/chastnym-klientam/obmen-valyut/')) {
            $cityCode = 'moskva';
            if (!empty($_GET['city'])) {
                $cityCode = htmlspecialchars($_GET['city']);
                $res = CIBlockElement::GetList(Array(), Array("IBLOCK_ID","CODE"=>$cityCode), false, Array(), Array("ID", "NAME"));
                while ($ob = $res->GetNextElement()) {
                    //debugg($ob);
                    $selectedCity = $ob->GetFields()['~NAME'];
                }
            } else {
                $selectedCity = 'Москва';
            }
        } else {
            $res = CIBlockElement::GetByID($_SESSION['city']);
            if($ar_res = $res->GetNext()) $selectedCity = $ar_res['NAME'];
        }
    }?>
    <?/*?><h4 class="popup-form_title page-title--4 page-title">
        <?=GetMessage("YOUR_CITY")?>
    </h4><?*/?>
    <div class="popup-form_content">
        <?//debugg($selectedCity);?>
        <?/*?>
        <div class="city-selector_search clearfix">
            <input type="search" name="search" id="search" placeholder="<?=GetMessage("YOUR_CITY")?>" class="input-field">
            <button type="submit" class="button">
                <?=GetMessage("FIND_THE_CITY")?>
            </button>
        </div>
        <?*/?>

        <?/*?><div id="autocomplete"></div><?*/?>

        <ul class="city-selector_list clearfix">  

           <?foreach($arResult['CITY'] as $city){?>
               <?//debugg($city);?>

                <?if (CSite::InDir('/en/')) {
                    $cityName = $city['NAME_ENGLISH'];
                } else {
                    $cityName = $city['NAME'];
                }?>
                <script>
                    cityNames.push("<?=$cityName?>");
                    cityIds.push("<?=$city['ID']?>");
                </script>

                <li class="<?= ($selectedCity == $city['NAME'])? 'selected' : ''; ?>">
                    <?/*?><a href="javascript:void(0);" onclick="$('#select').val('<?=$city['ID']?>');$('#submit').click();"><?*/?>
                    <?/*?><a href="javascript:void(0);" onclick="$('#select').val('<?=$city['ID']?>');$('#city-code').val('<?=$city['CODE_NAME']?>');$('#submit').click();"><?*/?>
                    <?/*?><a href="?city=<?=$city['CODE_NAME']?>" onclick="$('#select').val('<?=$city['ID']?>');$('#submit').click();"><?*/?>
                    <??><a href="?city=<?=$city['CODE_NAME']?>"><??>
                        <?if (CSite::InDir('/en/')) {
                            echo $city['NAME_ENGLISH'];
                        } else {
                            echo $city['NAME'];
                        }?>
                    </a>
                </li>
            
			<?}?>
        </ul>
        
        <?/*?>
        <input name="office-id" type="text" hidden value="" id="office-id">
        <input name="select" type="text" hidden value="" id="select">
        <input name="city-code" type="text" hidden value="" id="city-code">
        <input type="submit" hidden id="submit">
        <?*/?>

    </div>

<?/*?></form><?*/?>
</div>
<?/*?>
\GarbageStorage::get('name');
    $city_name = 'ququ';
    \GarbageStorage::set('name', $city_name);
<?*/?>
<?/*?>
<script type="text/javascript" src="/local/templates/.default/js/vendor/jquery-ui.min.js"></script>
<script>
    $(document).ready(function(){
        $(function () {
            var options = {
                source: cityNames,
                appendTo: $("#autocomplete"),
                select: function(event, ui) {
                    $.each(cityNames, function (i, name) {
                        if (name == ui.item.value) {
                            index = i;
                            return false;
                        }
                    });
                    $('#select').val(cityIds[index]);
                    $('#submit').click();
                }
            };
            console.log('options=');
            console.log(options);
            $('#search').autocomplete(options);
        });
    });
</script>
<?*/?>

<?if($_REQUEST['search']){?>
<script>
    $('.fancybox-close-small').click(function(){
        location.reload();
    })      
</script>
<?}?>


    