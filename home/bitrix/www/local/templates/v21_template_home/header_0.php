<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Page\Asset;

IncludeTemplateLangFile(__FILE__);
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <? $APPLICATION->ShowHead() ?>
    <title><? $APPLICATION->ShowTitle() ?></title>
    <meta name="format-detection" content="telephone=no" />
    <meta name="yandex-verification" content="3219059ecde97a2a" />
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" />
    <? $assets = Asset::getInstance(); ?>
    <? $assets->addCss("/local/templates/.default/css/normalize.min.css"); ?>
    <? $assets->addCss("/local/templates/.default/css/animate.min.css"); ?>
    <? $assets->addCss("/local/templates/.default/fancybox/jquery.fancybox.min.css"); ?>
    <? $assets->addCss("/local/templates/.default/jqueryui/jquery-ui.min.css"); ?>
    <? $assets->addCss("/local/templates/.default/owlcarousel/owl.carousel.min.css"); ?>
    <? $assets->addCss("/local/templates/v21_template_home/css/v21_ext.min.css"); ?>
    <?// $assets->addCss("/local/templates/v21_template_home/css/nouislider.min.css"); ?>
    <? $assets->addCss("/local/templates/v21_template_home/css/v21_main.css"); ?>
    <? $assets->addCss("/local/templates/.default/css/style.css"); ?>
    <? $assets->addCss("/local/templates/czebra_home/css/style.css"); ?>
    <? $assets->addCss("/local/templates/czebra_home/css/cz_style.css"); ?>
    <!-- Scripts -->
    <? // $assets->addJs("/local/templates/.default/js/vendor/jquery.min.js"); 
    ?>
    <? $assets->addJs('https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'); ?>
    <? $assets->addJs("/local/templates/.default/fancybox/jquery.fancybox.min.js"); ?>
    <? $assets->addJs("/local/templates/.default/jqueryui/jquery-ui.min.js"); ?>
    <? $assets->addJs("/local/templates/.default/owlcarousel/owl.carousel.min.js"); ?>
    <? $assets->addJs("/local/templates/.default/js/vendor/jquery.customSelect.min.js"); ?>
    <? $assets->addJs("/local/templates/.default/js/vendor/jquery.maskedinput.min.js"); ?>
    <? $assets->addJs("/local/templates/.default/js/vendor/wow.min.js"); ?>
    <? $assets->addJs("/local/templates/.default/js/vendor/packery.pkgd.min.js"); ?>
    <? $assets->addJs("/local/templates/.default/js/plugins.js"); ?>
    <? $assets->addJs("/local/templates/.default/js/main.js"); ?>
    <? $assets->addJs("/local/templates/.default/js/m.vlaznev.js"); ?>

    <? $assets->addJs("/local/templates/v21_template_home/js/init.js"); ?>

    <? $assets->addJs("/local/templates/v21_template_home/js/v21_ext.min.js"); ?>
    <?// $assets->addJs("/local/templates/v21_template_home/js/nouislider.min.js"); ?>
    <? $assets->addJs("/local/templates/v21_template_home/js/v21_main.js"); ?>

    <script>
        (function($) {
            let replay = false;
            if (typeof(getCookie) !== 'function') {
                function getCookie(name) {
                    let matches = document.cookie.match(new RegExp(
                        "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
                    ));

                    return matches ? decodeURIComponent(matches[1]) : undefined;
                }
            }
            if (getCookie('replay_remote_credit') !== undefined) {
                replay = !replay;
            }
            if (!/Android|webOS|iPhone|iPad|iPod|BlackBerry|BB|PlayBook|IEMobile|Windows Phone|Kindle|Silk|Opera Mini/i.test(navigator.userAgent) && !replay) {
                setTimeout(() => {
                    let today = new Date();
                    today.setDate(today.getDate() + 365);
                    $('.popup-remote-credit').addClass('popup-remote-credit__show');
                    document.cookie = "replay_remote_credit=true; expires=" + today;
                }, 15000);
                $(document).ready(function() {
                    $('.popup-remote-credit__button').click(function(e) {
                        e.preventDefault();
                        $('.popup-remote-credit').removeClass('popup-remote-credit__show');
                    });
                });
            }
        })(jQuery);
    </script>

    <!-- Facebook Pixel Code -->
    <script>/*
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '155795963032471');
        fbq('track', 'PageView');
    */</script>
    <?/*?>
    <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=155795963032471&ev=PageView&noscript=1" /></noscript>
    <?*/?>
    <!-- End Facebook Pixel Code -->

    <!-- 2ГИС карты -->
	<script src="https://maps.api.2gis.ru/2.0/loader.js?pkg=full"></script>
</head>

<body onload="document.getElementById('v21_preloader').style.opacity = '0'; document.getElementById('v21_preloader').style.visibility = 'hidden'; document.body.style.overflow = 'unset';" style="overflow: hidden;">
    <? $APPLICATION->ShowPanel() ?>
    <!-- No script warning -->
    <noscript style="background: #f00; color: #fff; padding: 20px; position: relative; text-align: center; z-index: 9999;">
        К сожалению, ваш браузер <strong>не поддерживает</strong> JavaScript.
        Пожалуйста, <a href="https://browsehappy.com/" target="_blank" rel="nofollow" style="color: #fff;">обновите</a> ваш
        браузер или включите поддержку JavaScript для корректного отображения страницы.
    </noscript>

    <div class="popup-remote-credit">
        <div class="popup-remote-credit__title">
            Обращаем ваше внимание, что заявки на оформление кредита принимаются только при личном обращении в офис
            АКБ «ТРАНССТРОЙБАНК» (АО).
        </div>
        <div class="popup-remote-credit__info">
            <div class="popup-remote-credit__icons">
                <svg width="65" height="68" viewBox="0 0 65 68" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect x="1" y="6" width="61" height="61" rx="5" stroke="black" stroke-width="2" />
                    <path d="M40.9238 39.8669C40.9191 39.8559 40.9135 39.8453 40.9071 39.8351C40.8939 39.8042 40.8786 39.7744 40.8611 39.7457C40.8316 39.6854 40.7945 39.6292 40.7507 39.5785C40.728 39.5531 40.7037 39.529 40.678 39.5066C40.6272 39.4623 40.571 39.4246 40.5108 39.3945C40.484 39.3784 40.456 39.3641 40.4272 39.3519C40.3329 39.3148 40.2325 39.2956 40.1312 39.295H13.3771C13.2756 39.2966 13.1752 39.317 13.0812 39.3552C13.0523 39.3675 13.0244 39.3817 12.9975 39.3979C12.9373 39.428 12.8811 39.4656 12.8303 39.5099C12.8047 39.5324 12.7804 39.5564 12.7576 39.5818C12.7138 39.6326 12.6767 39.6888 12.6472 39.749C12.63 39.7777 12.6144 39.8073 12.6004 39.8376C12.6004 39.8494 12.5879 39.8586 12.5845 39.8703C12.5563 39.9544 12.5416 40.0424 12.5411 40.1311V50.1639H8.36072C8.13899 50.1639 7.92633 50.252 7.76954 50.4088C7.61274 50.5656 7.52466 50.7782 7.52466 51C7.52466 51.2217 7.61274 51.4344 7.76954 51.5912C7.92633 51.7479 8.13899 51.836 8.36072 51.836H12.5411V58.5246C12.5411 58.7463 12.6291 58.9589 12.7859 59.1157C12.9427 59.2725 13.1554 59.3606 13.3771 59.3606H40.1312C40.353 59.3606 40.5656 59.2725 40.7224 59.1157C40.8792 58.9589 40.9673 58.7463 40.9673 58.5246V40.1311C40.9675 40.0412 40.9528 39.952 40.9238 39.8669ZM37.623 40.9672L26.7542 49.1188L15.8853 40.9672H37.623ZM14.2132 57.6885V51.836H15.8853C16.1071 51.836 16.3197 51.7479 16.4765 51.5912C16.6333 51.4344 16.7214 51.2217 16.7214 51C16.7214 50.7782 16.6333 50.5656 16.4765 50.4088C16.3197 50.252 16.1071 50.1639 15.8853 50.1639H14.2132V41.8032L26.2525 50.8327C26.3972 50.9413 26.5733 51 26.7542 51C26.9351 51 27.1111 50.9413 27.2558 50.8327L39.2952 41.8032V57.6885H14.2132Z" fill="black" />
                    <path d="M51.836 19.2295H25.0819C23.9737 19.2308 22.9111 19.6717 22.1275 20.4553C21.3438 21.239 20.9029 22.3015 20.9016 23.4098V28.4262C20.9029 29.5345 21.3438 30.597 22.1275 31.3807C22.9111 32.1644 23.9737 32.6052 25.0819 32.6065H41.5633L54.7372 40.8401C54.8964 40.9396 55.0845 40.9825 55.2712 40.9621C55.4578 40.9416 55.6321 40.8589 55.7661 40.7273C55.9 40.5957 55.9857 40.4229 56.0094 40.2366C56.0331 40.0503 55.9935 39.8615 55.8968 39.7006L51.6404 32.6065H51.836C52.9443 32.6052 54.0068 32.1644 54.7905 31.3807C55.5742 30.597 56.015 29.5345 56.0164 28.4262V23.4098C56.015 22.3015 55.5742 21.239 54.7905 20.4553C54.0068 19.6717 52.9443 19.2308 51.836 19.2295ZM52.6721 37.5786L44.7178 32.6065H49.6907L52.6721 37.5786ZM54.3442 28.4262C54.3442 29.0914 54.08 29.7294 53.6096 30.1998C53.1392 30.6702 52.5013 30.9344 51.836 30.9344H25.0819C24.4167 30.9344 23.7788 30.6702 23.3084 30.1998C22.838 29.7294 22.5737 29.0914 22.5737 28.4262V23.4098C22.5737 22.7446 22.838 22.1066 23.3084 21.6363C23.7788 21.1659 24.4167 20.9016 25.0819 20.9016H51.836C52.5013 20.9016 53.1392 21.1659 53.6096 21.6363C54.08 22.1066 54.3442 22.7446 54.3442 23.4098V28.4262Z" fill="black" />
                    <path d="M26.7542 26.754H25.082V28.4262H26.7542V26.754Z" fill="black" />
                    <path d="M26.7542 23.4098H25.082V25.0819H26.7542V23.4098Z" fill="black" />
                    <path d="M31.7705 23.4098H28.4263V25.0819H31.7705V23.4098Z" fill="black" />
                    <path d="M41.8033 23.4098H33.4426V25.0819H41.8033V23.4098Z" fill="black" />
                    <path d="M52.6721 23.4098H43.4753V25.0819H52.6721V23.4098Z" fill="black" />
                    <path d="M52.6722 26.754H28.4263V28.4262H52.6722V26.754Z" fill="black" />
                    <path d="M6.6886 48.4918H10.8689C11.0907 48.4918 11.3033 48.4037 11.4601 48.247C11.6169 48.0902 11.705 47.8775 11.705 47.6558C11.705 47.434 11.6169 47.2214 11.4601 47.0646C11.3033 46.9078 11.0907 46.8197 10.8689 46.8197H6.6886C6.46687 46.8197 6.25421 46.9078 6.09742 47.0646C5.94062 47.2214 5.85254 47.434 5.85254 47.6558C5.85254 47.8775 5.94062 48.0902 6.09742 48.247C6.25421 48.4037 6.46687 48.4918 6.6886 48.4918Z" fill="black" />
                    <circle cx="55.5985" cy="8.77869" r="7.77869" fill="#F8F5F0" stroke="black" stroke-width="2" />
                    <path d="M59.3857 5.01643L52.0204 12.75" stroke="black" stroke-width="2" />
                    <path d="M52.0203 5.01643L59.3857 12.75" stroke="black" stroke-width="2" />
                </svg>
                <svg width="64" height="68" viewBox="0 0 64 68" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect x="1" y="6" width="61" height="61" rx="5" stroke="black" stroke-width="2" />
                    <path d="M44.4021 20.0854C45.0478 20.2055 51.1754 21.5584 52.5123 29.9615C52.6388 30.7566 52.6158 31.6604 52.455 32.6449C51.7524 36.9487 48.3592 43.0044 43.3353 48.2533C38.3158 53.4976 31.649 57.9669 24.3837 59.1228C22.0498 59.4941 19.6559 59.524 17.2369 59.129L17.3408 58.4905L17.2363 59.1306C17.1346 59.1141 17.0424 59.0746 16.9639 59.0185C16.3344 58.6221 7.30032 52.8258 12.1584 49.5135C16.369 46.6426 21.3238 43.9725 21.3736 43.9456L21.373 43.9444C21.6502 43.7947 21.988 43.8677 22.1812 44.102L26.8394 48.9464C27.8796 49.4175 30.4489 48.4146 33.1205 46.6896C34.7722 45.6232 36.4321 44.2772 37.7841 42.814C39.1109 41.378 40.1338 39.8399 40.5422 38.3642C40.9289 36.9665 40.748 35.6123 39.7063 34.455C37.875 32.4201 37.7142 31.2002 37.7105 31.1702L37.7081 31.1705C37.6873 31.0083 37.7285 30.8525 37.813 30.7267L43.6797 20.395L44.2422 20.7142L43.6782 20.3939C43.8257 20.1341 44.1258 20.0151 44.4021 20.0855L44.4021 20.0854ZM51.2353 30.1642C50.1801 23.5314 45.9364 21.8318 44.5672 21.4516L39.0394 31.1866C39.1492 31.5149 39.5094 32.2999 40.6691 33.5885C42.0469 35.1194 42.2917 36.891 41.7887 38.7088C41.3207 40.4001 40.191 42.1167 38.7368 43.6906C37.3078 45.2372 35.5581 46.6567 33.8198 47.7791C30.7472 49.7631 27.6264 50.8127 26.1828 50.0664C26.1101 50.0334 26.0421 49.9864 25.9834 49.9252L25.9846 49.924L21.5577 45.32C20.2711 46.0279 16.3256 48.2389 12.8881 50.5826C9.74183 52.7279 16.6279 57.2674 17.5757 57.8729C19.8105 58.2229 22.0227 58.1892 24.1811 57.8458C31.1353 56.7394 37.5521 52.4245 42.4029 47.3564C47.2494 42.293 50.5135 36.508 51.1781 32.4372C51.3171 31.5854 51.3396 30.8194 51.2353 30.1642L51.2353 30.1642Z" fill="black" stroke="black" stroke-width="0.5" />
                    <path d="M26.0859 23.0692C26.4245 22.9559 26.6071 22.5895 26.4938 22.2509C26.3805 21.9122 26.0141 21.7296 25.6754 21.8429C21.3012 23.3211 17.6184 26.4807 15.4284 30.7778C13.418 34.7224 12.6659 39.6238 13.796 45.0564C13.8687 45.4063 14.2113 45.6308 14.5612 45.5581C14.911 45.4853 15.1355 45.1427 15.0628 44.7929C13.9973 39.6707 14.6994 35.063 16.5838 31.3656C18.619 27.3723 22.034 24.4385 26.0859 23.0692L26.0859 23.0692Z" fill="black" />
                    <path d="M34.4446 25.6971C34.7874 25.7964 35.1459 25.5991 35.2452 25.2562C35.3445 24.9134 35.1472 24.5549 34.8044 24.4556C34.3666 24.3281 33.9332 24.2281 33.5059 24.155C30.612 23.6602 27.6477 24.2784 25.1554 25.8873C22.6738 27.4891 20.6624 30.0709 19.6613 33.5096C19.4874 34.1067 19.345 34.7216 19.2371 35.3527C19.177 35.7053 19.414 36.04 19.7667 36.1001C20.1193 36.1603 20.4539 35.9232 20.5141 35.5706C20.6164 34.9721 20.7468 34.405 20.9027 33.8694C21.8106 30.751 23.623 28.4173 25.8547 26.9767C28.0755 25.5432 30.7142 24.9919 33.288 25.432C33.6832 25.4996 34.0694 25.5879 34.4446 25.6971V25.6971Z" fill="black" />
                    <circle cx="54.9098" cy="8.77869" r="7.77869" fill="#F8F5F0" stroke="black" stroke-width="2" />
                    <path d="M58.697 5.01643L51.3316 12.75" stroke="black" stroke-width="2" />
                    <path d="M51.3316 5.01643L58.6969 12.75" stroke="black" stroke-width="2" />
                </svg>
                <svg width="68" height="68" viewBox="0 0 68 68" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect x="1" y="6" width="61" height="61" rx="5" stroke="black" stroke-width="2" />
                    <path d="M9.14104 23.4098C8.864 23.4098 8.6394 23.6344 8.6394 23.9114V46.9868C8.6394 47.2639 8.864 47.4885 9.14104 47.4885C9.41809 47.4885 9.64268 47.2639 9.64268 46.9868V24.4131H51.2788C51.5558 24.4131 51.7804 24.1885 51.7804 23.9114C51.7804 23.6344 51.5558 23.4098 51.2788 23.4098H9.14104ZM13.0601 27.4229C12.8303 27.4668 12.6484 27.6905 12.6525 27.9245V49.9967C12.6525 50.2593 12.8917 50.4983 13.1542 50.4983H53.2853C53.5478 50.4983 53.7869 50.2593 53.7869 49.9967V27.9245C53.7869 27.6619 53.5478 27.423 53.2853 27.4229H13.0601ZM13.6558 28.4262H26.4163C22.9692 30.6651 20.6944 34.5502 20.6944 38.9606C20.6944 43.371 22.9692 47.2594 26.4163 49.495H13.6558V28.4262ZM28.5169 28.4262H37.954C41.9704 30.2301 44.7731 34.2665 44.7731 38.9606C44.7731 43.6671 41.9561 47.6984 37.9226 49.495H28.5482C24.5147 47.6984 21.6977 43.6671 21.6977 38.9606C21.6977 34.2665 24.5004 30.2301 28.5169 28.4262ZM40.0546 28.4262H52.7837V49.495H40.0546C43.5016 47.2594 45.7764 43.371 45.7764 38.9606C45.7764 34.5502 43.5016 30.6651 40.0546 28.4262ZM28.6109 32.4393C28.3483 32.4639 28.2017 32.6772 28.2033 32.9409C28.2084 33.3473 28.4423 33.4672 28.705 33.4426H30.2099V39.4622H28.705C28.44 39.4572 28.2033 39.6989 28.2033 39.9639C28.2033 40.229 28.44 40.4693 28.705 40.4655H30.2099V42.4721H28.705C28.4279 42.4721 28.2033 42.6967 28.2033 42.9737C28.2033 43.2508 28.4279 43.4754 28.705 43.4754H30.2099V45.9836C30.2049 46.2486 30.4465 46.4852 30.7115 46.4852C30.9766 46.4852 31.2169 46.2486 31.2132 45.9836V43.4754H35.7279C36.005 43.4754 36.2296 43.2508 36.2296 42.9737C36.2296 42.6967 36.005 42.4721 35.7279 42.4721H31.2132V40.4655H35.2263C37.368 40.4655 39.2394 38.6816 39.2394 36.4524C39.2394 34.2232 37.368 32.4393 35.2263 32.4393H28.6109ZM31.2132 33.4426H35.2263C36.8049 33.4426 38.2361 34.7909 38.2361 36.4524C38.2361 38.1139 36.8049 39.4622 35.2263 39.4622H31.2132V33.4426Z" fill="black" stroke="black" stroke-width="0.7" />
                    <circle cx="59.2213" cy="8.77869" r="7.77869" fill="#F8F5F0" stroke="black" stroke-width="2" />
                    <path d="M63.0085 5.01643L55.6432 12.75" stroke="black" stroke-width="2" />
                    <path d="M55.6431 5.01643L63.0085 12.75" stroke="black" stroke-width="2" />
                </svg>
            </div>
            <div class="popup-remote-credit__desc">
                <p>Банк не осуществляет выдачу кредитов дистанционным способом, не производит sms- и е-mail рассылки
                    с предложениями оформить кредит, не предлагает онлайн-кредиты по телефону.</p>
                <p>Банк не взимает денежное вознаграждение и не требует предоплаты ни за какие услуги, связанные с
                    рассмотрением заявки и выдачей кредита.</p>
            </div>
        </div>
        <div class="popup-remote-credit__contact">
            Телефон для обращений: <a href="tel:+78005053773">8 (800) 505-37-73</a>
        </div>
        <button class="popup-remote-credit__button">Спасибо за информацию</button>
    </div>
    <?
    $prefix = '';
    if (CSite::InDir('/en/')) {
        $prefix = '/en';
    }
    ?>
    <div class="v21">
        <div class="v21-preloader" id="v21_preloader" style="background: #fff url(<?= SITE_TEMPLATE_PATH ?>/img/v21_v21-logo.svg) 50% 50% no-repeat; background-size: 240px auto; height: 100vh; left: 0; position: fixed; top: 0; transition: opacity .9s, visibility .9s; width: 100vw; z-index: 8888;"></div>
        <header class="v21-header js-v21-header">
            <div class="v21-header__container v21-container">
                <a href="#v21_navigation" class="v21-header__toggle js-v21-modal-toggle">
                    <div class="v21-header__toggle-line v21-header__toggle-line--top"></div>
                    <div class="v21-header__toggle-line v21-header__toggle-line--mid"></div>
                    <div class="v21-header__toggle-line v21-header__toggle-line--bot"></div>
                </a><!-- /.v21-header__toggle -->

                <a href="<?= $prefix ?>/" class="v21-header__logo" data-type="corporative_menu">
                    <? if (CSite::InDir('/en/')) { ?>
                        <img src="<?= SITE_TEMPLATE_PATH ?>/img/v21_logo_en.svg" alt="АКБ «Трансстройбанк»">
                    <? } else { ?>
                        <img src="<?= SITE_TEMPLATE_PATH ?>/img/v21_logo.svg" alt="АКБ «Трансстройбанк»">
                    <? } ?>
                </a>

                <div class="v21-header__content">
                    <div class="v21-header__group v21-header__group--top v21-header__container">
                        <ul class="v21-header__top-nav">
                            <li class="v21-header__top-nav-item">
                                <a href="<?= $prefix ?>/" data-type="corporative_menu" class="v21-header__top-nav-link"><?= GetMessage("CORPOPATIVE_CLIENTS") ?></a>
                            </li>
                            <li class="v21-header__top-nav-item">
                                <a href="<?= $prefix ?>/chastnym-klientam/" data-type="private_menu" class="v21-header__top-nav-link"><?= GetMessage("PRIVATE_CUSTOMERS") ?></a>
                            </li>
                            <li class="v21-header__top-nav-item">
                                <a href="/arbitrazhnym-upravlyayushchim/" class="v21-header__top-nav-link"><?= GetMessage("ARBITRATION_MANAGER") ?></a>
                            </li>
                            <li class="v21-header__top-nav-item">
                                <a href="<?= $prefix ?>/o-banke/" class="v21-header__top-nav-link"><?= GetMessage("ABOUT_BANK") ?></a>
                            </li>
                            <li class="v21-header__top-nav-item">
                                <a href="<?= $prefix ?>/finansovym-organizatsiyam/" class="v21-header__top-nav-link"><?= GetMessage("FINANCIAL_INSTITUTIONS") ?></a>
                            </li>
                        </ul><!-- /.v21-header__top-nav -->

                        <a href="<?= $prefix ?>/ofisy-i-bankomaty/" class="v21-header__link v21-header__link--contacts v21-link">
                            <svg width="10" height="14" class="v21-header__link-icon">
                                <use xlink:href="<?= SITE_TEMPLATE_PATH ?>/img/v21_icons.svg#pin"></use>
                            </svg>
                            <span class="v21-link__text v21-link__text--inv"><?= GetMessage("OFFICES_AND_ATMS") ?></span>
                        </a>

                        <a href="#citySelector" data-fancybox class="v21-header__link v21-header__link--contacts v21-link">
                            <svg width="14" height="14" class="v21-header__link-icon">
                                <use xlink:href="<?= SITE_TEMPLATE_PATH ?>/img/v21_icons.svg#compass"></use>
                            </svg>
                            <span class="v21-link__text v21-link__text--inv">
                                <?
                                if(CSite::InDir('/chastnym-klientam/obmen-valyut/')) {
                                    if(isset($_GET['city'])) {
                                        $rsList = CIBlockElement::GetList(
                                            Array("SORT"=>"ASC"),
                                            Array("IBLOCK_ID"=>114, "CODE"=>$_GET['city']),
                                            false,
                                            false,
                                            Array("IBLOCK_ID", "ID", "NAME", "PROPERTY_ATT_ENGLISH", "PROPERTY_ATT_WHERE")
                                        );
                                        while($arList = $rsList->Fetch()) {
                                            echo $arList['NAME'];
                                        }
                                    } else {
                                        echo 'Москва';
                                    }
                                } else {
                                    if (CSite::InDir('/en/')) {
                                        echo \GarbageStorage::get('english_name');
                                    } else {
                                        echo \GarbageStorage::get('name');
                                    }
                                }
                                ?>
                            </span>
                            <svg width="7" height="4" class="v21-header__link-icon">
                                <use xlink:href="<?= SITE_TEMPLATE_PATH ?>/img/v21_icons.svg#chevron"></use>
                            </svg>
                        </a>

                        <div class="v21-header__container">
                            <?
                            if (CSite::InDir('/en/')) {
                                $languageName = "RU";
                                $languageLink = substr($_SERVER['REQUEST_URI'], 3);
                                $searchPlasholder = "Search";
                            } else {
                                $languageName = "EN";
                                $languageLink = '/en' . $_SERVER['REQUEST_URI'];
                                $searchPlasholder = "Поиск по сайту";
                            }
                            ?>
                            <a href="<?= $languageLink ?>" class="v21-header__link v21-link">
                                <span class="v21-link__text v21-link__text--inv"><?= $languageName ?></span>
                            </a>

                            <a href="?special_version=Y" title="<?= GetMessage("VERSION") ?>" class="v21-header__link">
                                <svg width="23" height="14">
                                    <use xlink:href="<?= SITE_TEMPLATE_PATH ?>/img/v21_icons.svg#view"></use>
                                </svg>
                            </a>
                        </div>
                    </div><!-- /.v21-header__group -->

                    <div class="v21-header__group v21-header__group--bot v21-header__container">
                        <? $APPLICATION->IncludeComponent(
                            "bitrix:menu",
                            "v21-header__mid-nav",
                            array(
                                "ALLOW_MULTI_SELECT" => "Y",    // Разрешить несколько активных пунктов одновременно
                                "CHILD_MENU_TYPE" => "sub", // Тип меню для остальных уровней
                                "COMPONENT_TEMPLATE" => "vertical_multilevel",
                                "DELAY" => "N", // Откладывать выполнение шаблона меню
                                "MAX_LEVEL" => "2", // Уровень вложенности меню
                                "MENU_CACHE_GET_VARS" => "",    // Значимые переменные запроса
                                "MENU_CACHE_TIME" => "3600",    // Время кеширования (сек.)
                                "MENU_CACHE_TYPE" => "N",   // Тип кеширования
                                "MENU_CACHE_USE_GROUPS" => "Y", // Учитывать права доступа
                                "ROOT_MENU_TYPE" => "top_v21_private",  // Тип меню для первого уровня
                                "USE_EXT" => "Y",   // Подключать файлы с именами вида .тип_меню.menu_ext.php
                                "MENU_THEME" => "site",

                                "TYPE_MENU" => "private_menu"
                            ),
                            false
                        ); ?>
                        <? $APPLICATION->IncludeComponent(
                            "bitrix:menu",
                            "v21-header__mid-nav",
                            array(
                                "ALLOW_MULTI_SELECT" => "Y",    // Разрешить несколько активных пунктов одновременно
                                "CHILD_MENU_TYPE" => "sub", // Тип меню для остальных уровней
                                "COMPONENT_TEMPLATE" => "vertical_multilevel",
                                "DELAY" => "N", // Откладывать выполнение шаблона меню
                                "MAX_LEVEL" => "2", // Уровень вложенности меню
                                "MENU_CACHE_GET_VARS" => "",    // Значимые переменные запроса
                                "MENU_CACHE_TIME" => "3600",    // Время кеширования (сек.)
                                "MENU_CACHE_TYPE" => "N",   // Тип кеширования
                                "MENU_CACHE_USE_GROUPS" => "Y", // Учитывать права доступа
                                "ROOT_MENU_TYPE" => "top_v21_corporative",  // Тип меню для первого уровня
                                "USE_EXT" => "Y",   // Подключать файлы с именами вида .тип_меню.menu_ext.php
                                "MENU_THEME" => "site",

                                "TYPE_MENU" => "corporative_menu"
                            ),
                            false
                        ); ?>

                        <div class="v21-header__search">
                            <a href="#v21_headerSearchForm" class="v21-header__search-open js-v21-modal-toggle js-v21-header-search-toggle">
                                <svg width="20" height="20">
                                    <use xlink:href="<?= SITE_TEMPLATE_PATH ?>/img/v21_icons.svg#search"></use>
                                </svg>
                            </a>

                            <div id="v21_headerSearchOverlay" class="v21-header__search-overlay v21-fade js-v21-overlay"></div>

                            <form action="/search/" method="GET" data-overlay="v21_headerSearchOverlay" id="v21_headerSearchForm" class="v21-header__search-form v21-fade js-v21-modal-content">
                                <button type="submit" class="v21-header__search-submit">
                                    <svg width="20" height="20">
                                        <use xlink:href="<?= SITE_TEMPLATE_PATH ?>/img/v21_icons.svg#search"></use>
                                    </svg>
                                </button>

                                <input type="search" name="q" placeholder="<?= $searchPlasholder ?>" class="v21-header__search-input js-v21-header-search-input">

                                <a href="#v21_headerSearchForm" class="v21-header__search-close js-v21-modal-toggle">
                                    <svg width="16" height="16">
                                        <use xlink:href="<?= SITE_TEMPLATE_PATH ?>/img/v21_icons.svg#close"></use>
                                    </svg>
                                </a>
                            </form><!-- /.v21-header__search-form -->
                        </div><!-- /.v21-header__search -->

                        <?/*?><a target="_blank" href="https://online.transstroybank.ru/rich/auth#%23id%3Dg%26paction%3Dlist" class="v21-header__login v21-button v21-button--solid v21-route-choice"><?= GetMessage("INTERNET_BANK") ?></a><?*/?>
                        <div class="v21-header__login v21-button v21-button--solid v21-route-choice">
                            <?= GetMessage("INTERNET_BANK") ?>
                            <div class="v21-route-choice__block">
                                <ul>
                                    <li><a href="https://online.transstroybank.ru/rich/auth#%23id%3Dg%26paction%3Dlist">Физические лица</a></li>
                                    <li><a href="https://193.42.145.55/auth/login" target="_blank">Юридические лица</a></li>
                                    <?/*?><li><a href="https://ddei5-0-ctp.trendmicro.com:443/wis/clicktime/v1/query?url=https%3a%2f%2f193.42.145.55%2fauth%2flogin&umid=A1D69E31-E280-8205-858F-914E45533726&auth=a2c6d5911ff3307677e35fb11cca2ec19faa4f82-4578856e6b24c1bc00f38be900281bbce87342e2" target="_blank">Юридические лица</a></li><?*/?>
                                </ul>
                            </div>
                        </div>
                    </div><!-- /.v21-header__group -->

                </div><!-- /.v21-header__content -->
            </div><!-- /.v21-header__container -->

        </header><!-- /.v21-header -->

        <div id="v21_navigation" class="v21-nav js-v21-modal-content">
            <a href="#citySelector" data-fancybox class="v21-nav__link v21-nav__link--contacts">
                <svg width="14" height="14" class="v21-nav__link-icon">
                    <use xlink:href="<?= SITE_TEMPLATE_PATH ?>/img/v21_v21-icons.svg#compass"></use>
                </svg>
                <span>
                    <?
                    if (CSite::InDir('/en/')) {
                        echo \GarbageStorage::get('english_name');
                    } else {
                        echo \GarbageStorage::get('name');
                    }
                    ?>
                </span>
                <svg width="7" height="4" class="v21-nav__link-icon">
                    <use xlink:href="<?= SITE_TEMPLATE_PATH ?>/img/v21_v21-icons.svg#chevron"></use>
                </svg>
            </a><!-- /.v21-nav__link -->

            <a href="<?= $prefix ?>/ofisy-i-bankomaty/" class="v21-nav__link v21-nav__link--contacts">
                <svg width="10" height="14" class="v21-nav__link-icon">
                    <use xlink:href="<?= SITE_TEMPLATE_PATH ?>/img/v21_v21-icons.svg#pin"></use>
                </svg>
                <span><?= GetMessage("OFFICES_AND_ATMS") ?></span>
            </a><!-- /.v21-nav__link -->

            <?/*?><a target="_blank" href="https://online.transstroybank.ru/rich/auth#%23id%3Dg%26paction%3Dlist" class="v21-nav__login v21-button v21-button--solid"><?= GetMessage("INTERNET_BANK") ?></a><?*/?>
            <div class="v21-nav__login v21-button v21-button--solid v21-route-choice">
                <?= GetMessage("INTERNET_BANK") ?>
                <div class="v21-route-choice__block">
                    <ul>
                        <li><a href="https://online.transstroybank.ru/rich/auth#%23id%3Dg%26paction%3Dlist">Физические лица</a></li>
                        <li><a href="https://193.42.145.55/auth/login" target="_blank">Юридические лица</a></li>
                        <?/*?><li><a href="https://ddei5-0-ctp.trendmicro.com:443/wis/clicktime/v1/query?url=https%3a%2f%2f193.42.145.55%2fauth%2flogin&umid=A1D69E31-E280-8205-858F-914E45533726&auth=a2c6d5911ff3307677e35fb11cca2ec19faa4f82-4578856e6b24c1bc00f38be900281bbce87342e2" target="_blank">Юридические лица</a></li><?*/?>
                    </ul>
                </div>
            </div>

            <? $APPLICATION->IncludeComponent(
                "bitrix:menu",
                "v21-nav__list",
                array(
                    "ALLOW_MULTI_SELECT" => "Y",    // Разрешить несколько активных пунктов одновременно
                    "CHILD_MENU_TYPE" => "sub", // Тип меню для остальных уровней
                    "COMPONENT_TEMPLATE" => "vertical_multilevel",
                    "DELAY" => "N", // Откладывать выполнение шаблона меню
                    "MAX_LEVEL" => "3", // Уровень вложенности меню
                    "MENU_CACHE_GET_VARS" => "",    // Значимые переменные запроса
                    "MENU_CACHE_TIME" => "3600",    // Время кеширования (сек.)
                    "MENU_CACHE_TYPE" => "N",   // Тип кеширования
                    "MENU_CACHE_USE_GROUPS" => "Y", // Учитывать права доступа
                    "ROOT_MENU_TYPE" => "top",  // Тип меню для первого уровня
                    "USE_EXT" => "Y",   // Подключать файлы с именами вида .тип_меню.menu_ext.php
                    "MENU_THEME" => "site"
                ),
                false
            ); ?>
        </div><!-- /.nav -->

        <? if (!CSite::InDir('/index.php') && !CSite::InDir('/en/index.php') && !CSite::InDir('/chastnym-klientam/index.php') && !CSite::InDir('/en/chastnym-klientam/index.php')) : ?>
            <div class="v21-section">
                <div class="v21-container <?=(CSite::InDir('/chastnym-klientam/kreditnaya-karta-mir/index.php'))? 'v21-container--header' : ''; ?>">
                    <? $APPLICATION->IncludeComponent(
                        "bitrix:breadcrumb",
                        "v21",
                        array(
                            "START_FROM" => "0",
                            "PATH" => "",
                            "SITE_ID" => "en",
                            "COMPONENT_TEMPLATE" => "custom"
                        ),
                        false
                    ); ?>
                <? endif ?>