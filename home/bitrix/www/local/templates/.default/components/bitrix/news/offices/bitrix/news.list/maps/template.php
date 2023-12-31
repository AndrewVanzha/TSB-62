<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true); ?>
maps
<?
$arCoordinates = array();
foreach ($arResult['ITEMS'] as $arItem) {
    $arCoordinates[] = $arItem['PROPERTIES']['ATT_COORDINATES']['VALUE'];
}

$arCoordinatesTemp = $arCoordinates;
for ($i = 0; $i < count($arCoordinatesTemp); $i++) {
    $value = $arCoordinatesTemp[$i];
    unset($arCoordinatesTemp[$i]);
    if( in_array($value, $arCoordinatesTemp) ) {
        $x = rand(-3, 3) * 0.000005;
        $y = rand(-3, 3) * 0.000005;
        $coordinate = explode(',', $arResult['ITEMS'][$i]['PROPERTIES']['ATT_COORDINATES']['VALUE']);
        $coordFirst = $coordinate[0] + $x;
        $coordSecond = $coordinate[1] + $y;
        $arResult['ITEMS'][$i]['PROPERTIES']['ATT_COORDINATES']['VALUE'] = $coordFirst.','.$coordSecond;
        //echo $coordFirst.','.$coordSecond.'<br>';
    }
    $arCoordinatesTemp = $arCoordinates;
}
?>
<?
$typeFilter = array("LOGIC"=>"OR");

if (in_array('office', $_SESSION['offices']['type']))
    $typeFilter[] = array("=PROPERTY_ATT_TYPE_VALUE"=>"Офис");
if (in_array('cash', $_SESSION['offices']['type']))
    $typeFilter[] = array("=PROPERTY_ATT_TYPE_VALUE"=>"Банкомат");
//if (in_array('partners', $_SESSION['offices']['type']))
//    $typeFilter[] = array("=PROPERTY_ATT_TYPE_VALUE"=>"Банкомат партнера");

$rsSections = CIBlockSection::GetList(
                Array("SORT"=>"ASC"),
                array("IBLOCK_ID"=>$arResult['ID']),
                false,
                Array(),
                false
            );
while($arSection = $rsSections->Fetch()){
    $arElement = array();
    $rsElements = CIBlockElement::GetList(
        Array("SORT"=>"ASC"),
        Array("SECTION_ID"=>$arSection['ID'], $typeFilter),
        false,
        false,
        Array("IBLOCK_ID", "ID", "NAME")
    );
    while($arElements = $rsElements->Fetch()){
        $arElement = $arElements;
    }
    if(!empty($arElement))
        $arSections[] = array('NAME' => $arSection['NAME'], 'ID' => $arSection['ID'], 'CODE' => $arSection['CODE']);
}
//debugg('map');
//debugg($arSections);
//debugg($arElement);
?>

<div class="page-content page-container">
    <div class="offices-filter clearfix">

        <form class="filter" action="<?=$_SERVER['REQUEST_URI']?>" method="post">

            <div class="city select-box">

                <select id="city" data-id="<?=htmlspecialchars($_REQUEST['city'])?>" name="city">

                        <option value='' <?if (empty($_SESSION['offices']['cityFilter'])){?>selected<?}?>>

                            Все

                        </option>

                    <?foreach ($arSections as $section){?>

                        <option  value="<?=$section['ID']?>" <?if (htmlspecialchars($_SESSION['offices']['cityFilter']) == $section['ID']){?>selected<?}?>>

                            <?=$section['NAME']?>

                        </option>

                    <?}?>

                </select>

            </div>

            <div class="view">

                <div class="switch-box clearfix">

                    <a id='maps' onclick="maps();" href="javascript:void(0);" class="switch-box_caption <?if(htmlspecialchars($_SESSION['offices']['maps'] != 'no')){?>is-active<?}?>">

                        <span>
                            Карта
                        </span>

                    </a>

                    <?/*?><input type="hidden" name="maps" value="yes"><?*/?>
                    <input type="hidden" name="maps" value="no">

                    <a id='switch' href="#" class="switch-box_lever <?if(htmlspecialchars($_SESSION['offices']['maps'] == 'no')){?>is-active-right<?}else{?>is-active-left<?}?>"></a>

                    <a id='list' onclick="list();" href="javascript:void(0);" class="switch-box_caption <?if(htmlspecialchars($_SESSION['offices']['maps'] == 'no')){?>is-active<?}?>">

                        <span>
                            Списком
                        </span>

                    </a>

                </div>

            </div>

            <div class="type clearfix">

                <label class="check-box">
                    <input type="checkbox" name="type[]" value="office" onchange="$('#send').click();" <?if (in_array('office', $_SESSION['offices']['type'])||(empty($_SESSION['offices']['type']))){?>checked<?}?>>
                    <span class="check-box_caption">
                        Офисы
                    </span>
                </label>

                <label class="check-box">
                    <input type="checkbox" name="type[]" value="cash" onchange="$('#send').click();" <?if (in_array('cash', $_SESSION['offices']['type'])){?>checked<?}?>>
                    <span class="check-box_caption">
                        Банкоматы
                    </span>
                </label>
				<?/*
                <label class="check-box">
                    <input type="checkbox" name="type[]" value="partners" onchange="$('#send').click();" <?if (in_array('partners', $_SESSION['offices']['type'])){?>checked<?}?>>
                    <span class="check-box_caption">
                        Банкоматы партнеров
                    </span>
                </label>
*/?>
            </div>
            <input hidden id="send" type="submit" name="" value="">
        </form>

    </div>
</div>

<?if (empty($arResult["ITEMS"])) {?>
    <script>
        $('#city option')[0].setAttribute('selected', 'selected');
        $('#send').click();
    </script>
<?}?>

<script type="text/javascript">
    $('.select-box select').customSelect({
        speed: 360
    });
    $( "#city" ).on("change", function() {
        $('#send').click();
    });
</script>


<?
global $USER;
//if($USER->GetID() == 107) :
if(true) : // включены карты gis
?>

<!--<input id="pac-input" class="controls" type="text" placeholder="Адрес или объект">-->
<div class="offices-map" id="map_gis"></div>

<?
/*foreach($arResult["ITEMS"] as $arItem) {
	debugg($arItem["~NAME"]);
	debugg($arItem["PROPERTIES"]["ATT_TYPE"]["~VALUE"]);
	//$arCoords = explode(',', $arItem["PROPERTIES"]["ATT_COORDINATES"]["VALUE"]);
	debugg($arCoords);

	debugg($arItem["PROPERTIES"]["ATT_ADDRESS"]["~VALUE"]);
	debugg($arItem["PROPERTIES"]["ATT_PHONE"]["VALUE"]);
	//print_r($arItem["DISPLAY_PROPERTIES"]["ATT_COORDINATES"]["DISPLAY_VALUE"]);
}*/
?>
    <?
    foreach($arResult["ITEMS"] as $arItem) {
        debugg($arItem["PROPERTIES"]["ATT_COORDINATES"]);
    }
    ?>

<script type="text/javascript">
	var map_gis, ii;
	//var markers_coord = [];

	DG.then(function() {
		map_gis = DG.map('map_gis', {
			center: [55.714996361286, 37.632732992065],
			zoom: 8
		});
		var markers1 = DG.featureGroup();
		var markers1_icon = DG.icon({
			iconUrl:  '/local/templates/czebra_home/components/bitrix/news.list/maps/images/map-marker-1.png',
			iconSize: [26, 34]
		});
		var markers2_icon = DG.icon({
			iconUrl:  '/local/templates/czebra_home/components/bitrix/news.list/maps/images/map-marker-3.png',
			iconSize: [26, 34]
		});

		ii = 0;
		<?foreach($arResult["ITEMS"] as $arItem) : ?>
			<?$arCoords = explode(',', $arItem["PROPERTIES"]["ATT_COORDINATES"]["VALUE"]); ?>
			//markers_coord[ii] = ["<?//=$arCoords[0]?>", "<?//=$arCoords[1]?>"];
			//console.log(markers_coord[ii]);

			var comment = "<?=$arItem['~NAME']?>" + "<br>" + "<?=$arItem['PROPERTIES']['ATT_ADDRESS']['~VALUE']?>" + "<br>" + "<?=$arItem['PROPERTIES']['ATT_PHONE']['VALUE']?>";
            //console.log(comment);
			<?switch ($arItem['PROPERTIES']['ATT_TYPE']['~VALUE']) {
				case 'Офис': ?>
					DG.marker(["<?=$arCoords[0]?>", "<?=$arCoords[1]?>"], {icon: markers1_icon}).addTo(markers1).bindLabel(comment);
					<?break;
				case 'Банкомат': ?>
					DG.marker(["<?=$arCoords[0]?>", "<?=$arCoords[1]?>"], {icon: markers2_icon}).addTo(markers1).bindLabel(comment);
					<?break;
				case 'Банкомат партнера': ?>
					DG.marker(["<?=$arCoords[0]?>", "<?=$arCoords[1]?>"], {icon: markers2_icon}).addTo(markers1).bindLabel(comment);
					<?break;
			};?>

			ii += 1;
		<?endforeach; ?>

        //map.invalidateSize();
		markers1.addTo(map_gis);
		map_gis.fitBounds(markers1.getBounds());
	});
</script>


<?else: // google-карты отключены ?>

<!--<input id="pac-input" class="controls" type="text" placeholder="Адрес или объект">-->
<div class="offices-map" id="map"></div>

<??>
    <script src="/local/templates/.default/js/vendor/infobox.min.js"></script>
<??>


<script>
    var map;
    function initMap() {


        function latLng2Point(latLng, map) {

            var topRight = map.getProjection().fromLatLngToPoint( map.getBounds().getNorthEast() );
            var bottomLeft = map.getProjection().fromLatLngToPoint( map.getBounds().getSouthWest() );
            var scale = Math.pow( 2, map.getZoom() );
            var worldPoint = map.getProjection().fromLatLngToPoint(latLng);

            return new google.maps.Point( ( worldPoint.x - bottomLeft.x ) * scale, ( worldPoint.y - topRight.y ) * scale );

        }

        function point2LatLng(point, map) {

            var topRight = map.getProjection().fromLatLngToPoint( map.getBounds().getNorthEast() );
            var bottomLeft = map.getProjection().fromLatLngToPoint( map.getBounds().getSouthWest() );
            var scale = Math.pow( 2, map.getZoom() );
            var worldPoint = new google.maps.Point( point.x / scale + bottomLeft.x, point.y / scale + topRight.y );

            return map.getProjection().fromPointToLatLng(worldPoint);

        }

           var mapOptions = {
            mapTypeControl: false,
            gestureHandling: 'cooperative',
            styles: [

                {
                    featureType: 'landscape.natural',
                    elementType: 'geometry',
                    stylers: [ { color: '#eaeaea' } ]
                },

                {
                    featureType: 'all',
                    elementType: 'labels.text.fill',
                    stylers: [ { color: '#1b1b1b' }, { weight: 0.01 } ]
                },

                {   featureType: 'road.highway',
                    elementType: 'geometry.fill',
                    stylers: [ { color: '#fff' }, { lightness: 0 } ]
                },

                {
                    featureType: 'poi',
                    elementType: 'geometry',
                    stylers: [ { color: '#ded7c6' } ]
                },

                {
                    featureType: 'poi',
                    elementType: 'labels.text.fill',
                    stylers: [ { color: '#36322e' } ]
                },

                {
                    featureType: 'transit',
                    elementType: 'labels.text.fill',
                    stylers: [ { color: '#2c9ccc' } ]
                },

                /*{
                    featureType: 'road',
                    elementType: 'geometry',
                    stylers: [ { color: '#fff' } ]
                },*/

                {
                    featureType: 'water',
                    elementType: 'geometry',
                    stylers: [ { color: '#c3a866' } ]
                }

            ]

        };
        map = new google.maps.Map(document.getElementById('map'), mapOptions);

//        // Create the search box and link it to the UI element.
//        var input = document.getElementById('pac-input');
//        var searchBox = new google.maps.places.SearchBox(input);
//        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

//        // Bias the SearchBox results towards current map's viewport.
//        map.addListener('bounds_changed', function() {
//          searchBox.setBounds(map.getBounds());
//        });




        var bounds = new google.maps.LatLngBounds();

        var infowindow = new google.maps.InfoWindow({
            boxClass: 'office-popup',
            closeBoxURL: '/local/templates/.default/img/close.png',
        });

        var popup = new InfoBox({
            alignBottom: true,
            boxClass: 'office-popup',
            closeBoxURL: '/local/templates/.default/img/close.png',
            closeBoxMargin: '5px',
            infoBoxClearance: new google.maps.Size(20, 20),
            pixelOffset: new google.maps.Size(-135, -15)
        });

        var markerIconsCount = 4;
        var markerIcons = [], popupContent = [];
        for ( var i = 0; i < markerIconsCount; i++ ) {

            markerIcons[i] = new google.maps.MarkerImage( '/local/templates/.default/img/map-marker-' + ( i + 1 ) + '.png',
                    new google.maps.Size(48, 67),
                    new google.maps.Point(0, 0),
                    new google.maps.Point(24, 67)
            );

        }

        var mcOptions = {gridSize: 50, maxZoom: 20, imagePath: '/local/templates/.default/img/m'};
        var markerCluster = new MarkerClusterer(map, [], mcOptions);
        var markers = [

            <?foreach ($arResult['ITEMS'] as $arItem):

                //Изображение
                $img = !empty($arItem['PREVIEW_PICTURE']) ? $arItem['PREVIEW_PICTURE']['SRC'] : $this->GetFolder().'/images/logo.jpg';

                    switch ($arItem['PROPERTIES']['ATT_TYPE']['VALUE']) {
                        case 'Офис':
                            $typeIcon = 0;
                            break;
                        case 'Банкомат':
                            $typeIcon = 2;
                            break;
                        case 'Банкомат партнера':
                            $typeIcon = 3;
                            break;
                    };
                    $res = CIBlockElement::GetByID($arItem['ID']);
                    if($ar_res = $res->GetNext());
                    $res = CIBlockSection::GetByID($ar_res['IBLOCK_SECTION_ID']);
                    if($ar_res = $res->GetNext());
                ?>
                {
                    latLng: [ <?=$arItem['PROPERTIES']['ATT_COORDINATES']['VALUE']?> ],
                    city: "<?=$ar_res['NAME'];?>",
                    title: "<?=$arItem['NAME']?>",
                    address: "<?=$arItem['PROPERTIES']['ATT_ADDRESS']['VALUE']?>",
                    phone: "<?=$arItem['PROPERTIES']['ATT_PHONE']['VALUE']?>",
                    subway: "<?=$arItem['PROPERTIES']['ATT_METRO']['VALUE']?>",
                    services: "<?=$arItem['PROPERTIES']['ATT_SERVICE']['VALUE']?>",
                    hours: "<?=$arItem['PROPERTIES']['ATT_MODE']['VALUE']?>",
                    imgSrc: "<?=$img?>",
                    href: "<?=$arItem['DETAIL_PAGE_URL']?>",
                    markerIconId: <?=$typeIcon?>
                },

            <?endforeach;?>

        ];

        for ( i = 0; i < markers.length; i++ ) {

            popupContent[i] =
                    '<div class="office-popup">' +
                    '<div class="content ">' +
                    '<h3 class="city page-title--3 page-title">' + markers[i].city + '</h3>' +
                    '<h4 class="title page-title--4 page-title"><a href="' + markers[i].href + '">' + markers[i].title + '</a></h4>';

            if (markers[i].address) popupContent[i] = popupContent[i] + '<p class="mi--address-s mi">' + markers[i].address + '</p>';
            if (markers[i].phone) popupContent[i] = popupContent[i] + '<p class="mi--phone-s mi">' + markers[i].phone + '</p>';
            if (markers[i].subway) popupContent[i] = popupContent[i] + '<p class="mi--subway-s mi">' + markers[i].subway + '</p>';
            if (markers[i].services) popupContent[i] = popupContent[i] + '<p class="mi--services-s mi">' + markers[i].services + '</p>';
			//if (markers[i].hours) popupContent[i] = popupContent[i] + '<p class="mi--hours-s mi">' + markers[i].hours + '</p>';
			if (markers[i].hours) popupContent[i] = popupContent[i] + '<p class="mi--hours-s mi"><a href="' + markers[i].href + '">режим работы</a></p>';
            popupContent[i] = popupContent[i] + '<a href="' + markers[i].href + '" class="image" style="background-image: url(' + markers[i].imgSrc + ');"></a>' +
            '</a>';



            var marker = new google.maps.Marker( {

                position: new google.maps.LatLng( markers[i].latLng[0], markers[i].latLng[1] ),
                map: map,
                icon: markerIcons[ markers[i].markerIconId ],
                title: markers[i].title

            } );

//            searchBox.addListener('places_changed', function() {
//                var places = searchBox.getPlaces();
//
//                if (places.length == 0) {
//                    return;
//                }
//
//                // Clear out the old markers.
////                markers.forEach(function(marker) {
////                    marker.setMap(null);
////                });
//                markers = [];
//
//                // For each place, get the icon, name and location.
//                var bounds = new google.maps.LatLngBounds();
//                places.forEach(function(place) {
//                    if (!place.geometry) {
//                        console.log("Returned place contains no geometry");
//                        return;
//                    }
//                    var icon = {
//                        url: place.icon,
//                        size: new google.maps.Size(71, 71),
//                        origin: new google.maps.Point(0, 0),
//                        anchor: new google.maps.Point(17, 34),
//                        scaledSize: new google.maps.Size(25, 25)
//                    };
//
//                    // Create a marker for each place.
//                    markers.push(new google.maps.Marker({
//                        map: map,
//                        icon: icon,
//                        title: place.name,
//                        position: place.geometry.location
//                    }));
//
//                    if (place.geometry.viewport) {
//                        // Only geocodes have viewport.
//                        bounds.union(place.geometry.viewport);
//                    } else {
//                        bounds.extend(place.geometry.location);
//                    }
//                });
//                map.fitBounds(bounds);
//            });

            google.maps.event.addListener( marker, 'click', ( function( marker, i ) {

                return function() {

                    infowindow.setContent( popupContent[i] );
                    infowindow.open(map, marker);

                    // popup.setContent( popupContent[i] );
                    // popup.open(map, marker);

                    map.setCenter( marker.getPosition() );

                }

            } )( marker, i ) );

            markerCluster.addMarker(marker);

            bounds.extend( marker.getPosition() );

        }

        map.fitBounds(bounds);

        google.maps.event.addListenerOnce( map, 'idle', function() {

            var topRightLatLng = map.getBounds().getNorthEast();
            var topRightPoint = latLng2Point( topRightLatLng, map );

            topRightPoint.x += 24;
            topRightPoint.y += 67;
            topRightLatLng = point2LatLng( topRightPoint, map );

            bounds.extend( topRightLatLng );

            var bottomLeftLatLng = map.getBounds().getSouthWest();
            var bottomLeftPoint = latLng2Point( bottomLeftLatLng, map );

            bottomLeftPoint.x -= 24;
            bottomLeftLatLng = point2LatLng( bottomLeftPoint, map );

            bounds.extend( bottomLeftLatLng );

            map.fitBounds(bounds);

        } );

        google.maps.event.addDomListener( map, 'click', function() { popup.close(); } );
        google.maps.event.addDomListener( window, 'resize', function() {

            var center = map.getCenter();
            google.maps.event.trigger( map, 'resize' );
            map.setCenter( center );

        } );




    }
    google.maps.event.addDomListener( window, 'load', initMap );
    initMap();
    </script>


    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
    </script>
    <script src="/local/templates/.default/js/vendor/infobox.min.js"></script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAqTI_k2NvGWLhGNk0dT3nTLSgZI1Cgurs&libraries=places&callback=initMap"></script>

<?endif; // ending Google Map script ?>
