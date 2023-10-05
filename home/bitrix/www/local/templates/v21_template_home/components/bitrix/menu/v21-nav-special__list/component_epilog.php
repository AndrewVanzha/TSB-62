<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $templateData */
/** @var @global CMain $APPLICATION */
//debugg('component epilog');
//debugg($arResult);
//debugg($arResult["AUTH"]);
//$arLinks = [];
/*foreach ($arResult as $arItem) {
    if ($arItem['IS_PARENT'] && $arItem['DEPTH_LEVEL'] == 1) {
        //$arBuffLinks[] = str_replace('/', '', $arItem['LINK']);
        //$arLinks[] = $arItem['LINK'];

        ob_start();
        $APPLICATION->IncludeComponent(
            "bitrix:main.include",
            "",
            Array(
                "AREA_FILE_SHOW" => "file",
                "PATH" => $arItem['LINK'] . 'index_menublock.php',
                "EDIT_TEMPLATE" => ""
            )
        );
        $content = ob_get_clean();
        //$APPLICATION->AddViewContent('show_block_' . str_replace('/', '', $arItem['LINK']), $content);
    }
}*/
//debugg($arLinks);
//debugg('show_block_'.$arBuffLinks[0]);
?>
<?
/*
ob_start();  //echo 'buffer epilog 0';
$APPLICATION->IncludeComponent(
    "bitrix:main.include",
    "",
    Array(
        "AREA_FILE_SHOW" => "file",
        "PATH" => $arLinks[0] . 'index_menublock.php',
        "EDIT_TEMPLATE" => "standard.php"
    )
);
$content0 = ob_get_clean();

ob_start();  // echo 'buffer epilog 1';
$APPLICATION->IncludeComponent(
    "bitrix:main.include",
    "",
    Array(
        "AREA_FILE_SHOW" => "file",
        "PATH" => $arLinks[1] . 'index_menublock.php',
        "EDIT_TEMPLATE" => "standard.php"
    )
);
$content1 = ob_get_clean();

//$APPLICATION->AddViewContent('show_block_'.$arBuffLinks[0], $content0);
//$APPLICATION->AddViewContent('show_block_'.$arBuffLinks[1], $content1);
*/
?>

<script>
    //$(function() {
    $(document).ready(function () {
        const brkpoint = 767;
        let blockSpeed = 400;
        let hv1Height = 46; // 71
        let hv2Height = 56;
        let toggleFlag = true;

        $('.js-v21-mobilemenu-toggle').click(function (event) { // раскрытие меню, движение части шапки и меню
            event.preventDefault();
            const scrollY = document.body.style.top;
            if(toggleFlag) {  // запрет scroll экрана
                toggleFlag = false;
                //document.body.style.position = 'fixed';
                //document.body.style.top = `-${window.scrollY}px`;
            } else {  // разрешение scroll экрана
                toggleFlag = true;
                document.body.style.position = '';
                document.body.style.top = '';
                window.scrollTo(0, parseInt(scrollY || '0') * -1);
            }

            $(this).toggleClass('is-active');
            $('.mainslider-window').toggleClass('display--none');
            $('.v21-header__toggle--hamburger').toggleClass('v21-nav__list--inner');
            $('.v21-header__toggle--cross').toggleClass('v21-input-group');

            let $header_1 = $('.v21 .v21-header-1');
            let $header_2 = $('.v21 .v21-header-2');
            hv1Height = $header_1.height();
            hv2Height = $header_2.height();
            if(toggleFlag) {
                    $header_1.removeClass('v21-header-fixed');
                    $header_2.removeClass('v21-header-fixed');
            }
            $('.v21-nav--special__wrapper').addClass('v21-nav--special__wrapper_height'); // ограничение по высоте

            $('.v21-nav--special').animate({    //  прокрутка главного меню в начало
                scrollTop: 10
            }, {
                duration: 100,   // по умолчанию «400»
                easing: "linear" // по умолчанию «swing»
            });
            $('.v21-nav--special').addClass('v21-nav--special__overflow'); // запрет scroll главного меню

            $header_2.animate({
                height: ["toggle", "swing"],
                opacity: "toggle"
            }, {
                duration: blockSpeed,
                easing: "linear",
                complete: function() {
                //    $('.v21-nav--special').animate({
                //        height: ["toggle", "swing"],
                //        opacity: "toggle"
                //    }, blockSpeed * 2, "linear");
                },
                queue: false // не ставим в очередь
            });

            $('.v21-nav--special').animate({
                height: ["toggle", "swing"],
                opacity: "toggle"
            }, {
                duration: blockSpeed,
                easing: "linear",
                complete: function() {
                    if(!toggleFlag) {
                        $header_1.addClass('v21-header-fixed');
                        $header_2.addClass('v21-header-fixed');
                        document.body.style.position = 'fixed';
                        document.body.style.top = `-${window.scrollY}px`;
                    }
                    $header_1.toggleClass('v21-header-color');
                    $header_2.toggleClass('v21-header-color');
                    $header_2.toggleClass('v21-header-2-fixed');
                }
            });

            $('.v21-nav--bottomblock').removeClass('v21-menu__item--none'); // сброс младшего меню
            for (let node of document.querySelectorAll('.v21-nav__top-item')) {
                $(node).fadeIn(blockSpeed);
                $(node).css("height", "auto");
                $(node).children('.v21-nav__top-link').fadeIn(blockSpeed);
                $(node).children('.v21-nav__top-link').removeClass('v21-display--hide');
                //$(node).children('.v21-nav__list--ul').removeClass('share_menu');
                $(node).children('.v21-nav__list--ul').addClass('share_menu');
                $(node).children('.v21-nav__list--ul').removeClass('show_menu');
                //$(node).children('.v21-nav__list--ul').removeClass('hide_menu');
                $(node).children('.v21-nav__list--ul').addClass('hide_menu');
                //$(node).children('.v21-nav__list--ul').addClass('v21-nav__list--inner');
            }
        });

        $('.js-v21-side-toggle').click(function (event) { // сдвижка меню в мобиле, переход на младшее меню
            event.preventDefault();
            //console.log(event);
            //console.log(event.currentTarget);
            let node_id = '#' + $(this).attr('data-link');
            //console.log(node_id);
            let ours = event.currentTarget.parentNode;
            //console.log('ours=');
            //console.log(ours);
            //console.log($(ours).children('.v21-nav__list--ul'));
            let block_height = $(ours).children('.v21-nav__list--ul').height();
            //console.log(block_height);
            //$(ours).height(block_height);
            //$(ours).css("height", block_height+50+"px");
            setTimeout(() => {
                $(ours).css("height", block_height+50+"px");
            }, 200); // иначе в хроме выделяет все поле синим
            $('.v21-nav--bottomblock').addClass('v21-menu__item--none');
            $(this).parents('.v21-nav--special').removeClass('v21-nav--special__overflow'); // переключаю overflow в auto
            $(this).parents('.v21-nav--special__wrapper').removeClass('v21-nav--special__wrapper_height'); // убираю ограничение по высоте

            /*$('.v21-nav__list--outer').animate({
                height: ["toggle", "swing"],
                opacity: "toggle"
            }, 2000);*/

            for (let node of document.querySelectorAll('.v21-nav__top-item')) {
                if(node != ours) {
                    $(node).fadeToggle(blockSpeed); // убираю все старшие меню, кроме выбранного
                    //console.log(node);

                    $(node_id).removeClass('v21-nav__list--inner');
                    $(node_id).addClass('share_menu');
                    if($(node_id).hasClass('hide_menu')) {
                        $(node_id).removeClass('hide_menu')
                    }
                    $(node_id).addClass('show_menu');
                }
            }
            $(this).addClass('v21-display--hide'); // растворяю выбранную позицию в старшем меню
            $(this).fadeToggle(blockSpeed/2); // убираю выбранную позицию в старшем меню

            /*$(node_id).stop().animate({
                width: ["toggle", "swing"],
            }, {
                duration: blockSpeed,
                easing: "linear",
                complete: function() {
                    //$('.v21-nav--bottomblock').addClass('v21-menu__item--none');
                }
            });*/
        });

        $('.js-v21-nav__list--inner__back').click(function () { // возвращение на старшее меню в мобиле
            /*$('.v21-nav__list--outer').animate({
                height: ["toggle", "swing"],
                opacity: "toggle"
            }, 2000);*/

            $(this).parents('.v21-nav__list--ul').removeClass('show_menu');
            $(this).parents('.v21-nav__list--ul').addClass('hide_menu');
            $(this).parents('.v21-nav__top-item').css("height", "auto");
            $(this).parents('.v21-nav__top-item').children('.v21-nav__top-link').removeClass('v21-display--hide');
            $(this).parents('.v21-nav__top-item').children('.v21-nav__top-link').fadeIn(blockSpeed);
            $(this).parents('.v21-nav--special').addClass('v21-nav--special__overflow'); // переключаю overflow в первонач.
            $(this).parents('.v21-nav--special__wrapper').addClass('v21-nav--special__wrapper_height'); // возвращаю ограничение по высоте
            $('.v21-nav--bottomblock').removeClass('v21-menu__item--none');
            for (let node of document.querySelectorAll('.v21-nav__top-item')) {
                $(node).fadeIn(blockSpeed);
            }
            /*$(this).parents('.v21-nav__list--inner').animate({
                width: ["toggle", "swing"],
            }, {
                duration: blockSpeed,
                easing: "linear",
                complete: function() {
                    $(this).parents('.v21-nav__top-item').children('.v21-nav__top-link').removeClass('v21-nav__list--inner');
                    $('.v21-nav--bottomblock').removeClass('v21-menu__item--none');
                    for (let node of document.querySelectorAll('.v21-nav__top-item')) {
                        $(node).fadeIn(blockSpeed);
                    }
                }
            });*/
        });

        //$('.js-v21-nav--bottomblock__city').click(() => {
        //    $('.js-v21-nav--bottomblock__city').children('.v21-nav__link-icon').toggleClass('v21-nav--bottomblock__svg--turn');
        //});

        $('.js-v21-route-language').hover( // показываю доп.меню из-под RU на мобильном экране
            function () {
                let $appx = $('.v21-route-choice__language');
                let $newheader = $('.v21-nav--bottomblock__block11');
                $appx.addClass('v21-route-choice__language--show');
                let x_right = $newheader.offset().left + $newheader.width();
                //console.log($appx.position().top);
                //console.log($appx.height());
                if($(window).width() > 767) {
                    //$appx.css({ left: x_right - $appx.width() - 20*2 }); // paddings
                } else {
                    $appx.css({ top: $newheader.position().top - 10 });
                    $appx.css({ left: x_right - $appx.width() - 20*2 });
                }
                $appx.hover(
                    function () {
                        $(this).addClass('v21-route-choice__language--show');
                    },
                    function () {
                        $(this).removeClass('v21-route-choice__language--show');
                    }
                );
            },
            function () {
                $('.v21-route-choice__language').removeClass('v21-route-choice__language--show');
            }
        );

        //$('.js-v21-nav--bottomblock__city').hover(  // показываю подменю с городами
        $('.js-v21-nav--bottomblock__city').click(  // показываю подменю с городами
            function () {
                //console.log('**');
                let $appx = $('.v21-route-choice__city');
                let $newheader = $('.v21-nav--bottomblock__block11');
                $appx.addClass('v21-route-choice__city--show');
                let x_right = $newheader.offset().left + $newheader.width();
                if($(window).width() > 767) {
                } else {
                    $appx.css({ left: x_right - $appx.width() - 20*2 });
                    $appx.css({ bottom: -($newheader.position().top - 10) });
                    /*$appx.hover(
                        function () {
                            $(this).addClass('v21-route-choice__city--show');
                        },
                        function () {
                            $(this).removeClass('v21-route-choice__city--show');
                        }
                    );*/
                }
            }/*,
            function () {
                $('.v21-route-choice__city').removeClass('v21-route-choice__city--show');
            },*/
        );

        $(window).resize(function () {
            //console.log($(window).width());
            if($(window).width() > brkpoint) {
                $('.v21 .v21-header-2').css("display", "block");
                $('.v21 .v21-nav--special').css("display", "none");
            } else {
                $('.v21 .v21-header-2').css("display", "none");   //  мобильное меню отключено
                $('.v21 .v21-nav--special').css("display", "none");
            }
        });
    });
</script>