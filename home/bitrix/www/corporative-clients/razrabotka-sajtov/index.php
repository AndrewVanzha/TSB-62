<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Разработка сайтов");
$APPLICATION->SetPageProperty("description", "Разработка сайтов");
$APPLICATION->SetTitle("Разработка сайтов");
?>
<style>
	.breadcrumbs {margin-bottom:44px}
	.popup-form_title, .fancybox-close-small, .popup-form_content .button, .popup-form .switch-box_lever::before {background-color:#A58A57}
	.popup-form_content .button:hover {background-color:#00345E}
	.popup-form .select-box .cs-box_selected, .popup-form .select-box .cs-box_list li.is-active, .popup-form a {color: #A58A57;text-decoration:none}
	.popup-form a:hover {color:#00345E}
	.popup-form_content .button {border-radius:0;height:45px;line-height:42px}
	h1.page-title {display:none}
</style>
<link rel="stylesheet" href="/assets/css/style-broker-deposit.css?v=1.0.4">

<div class="page-lf">
    <div class="container">
        <section class="business-online">
            <div class="row">
                <div class="business-online__info col-md-5">
                    <header class="business-online__header">
                        <h2 class="business-online__title page-title">
                            Оперативно переведём ваш бизнес в онлайн
                        </h2>
                    </header>
                    <div class="business-online__desc">
                        <p>Мы поможем вам в короткие сроки спроектировать и запустить для вашей компании корпоративный
                            сайт, продающий лендинг или интернет-магазин на популярных CMS.</p>
                        <p>Срок реализации от 1 недели, в зависимости от масштаба проекта.</p>
                    </div>
                </div>
                <div class="business-online__image col-md-7">
                    <div class="swiper-container business-online__slider">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide business-online__slide">
                                <img src="/corporative-clients/razrabotka-sajtov/images/offline.png" alt="Оффлайн бизнес">
                            </div>
                            <div class="swiper-slide business-online__slide">
								<img src="/corporative-clients/razrabotka-sajtov/images/online.png" alt="Онлайн бизнес">
                            </div>
                        </div>
                    </div>
                    <div class="business-online__arrows">
                        <span class="business-online__arrow business-online__arrow_prev" data-slide_type="off">Off</span>
                        <img src="/corporative-clients/razrabotka-sajtov/images/off.png" alt="Off" class="business-online__type-slide business-online__off">
                        <img src="/corporative-clients/razrabotka-sajtov/images/on.png" alt="On" class="business-online__type-slide business-online__on">
                        <span class="business-online__arrow business-online__arrow_next" data-slide_type="on">On</span>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="container">
        <section class="contract-home">
            <div class="row">
                <header class="business-online__header col-md-5 col-lg-4">
                    <h3 class="business-online__title page-title">
                        Заключим договор с выездом на дом
                    </h3>
                </header>
            </div>
            <div class="contract-home__steps">
                <div class="row">
                    <div class="contract-home__step col-sm-6 col-lg-4">
                        <div class="row">
                            <div class="contract-home__step-icon col-md-5">
                                <img src="/corporative-clients/razrabotka-sajtov/images/bill.svg" alt="Откроем расчётный счёт">
                            </div>
                            <div class="contract-home__step-name col-md-6">
                                Откроем расчётный счёт
                            </div>
                        </div>
                    </div>
                    <div class="contract-home__step col-sm-6 col-lg-4">
                        <div class="row">
                            <div class="contract-home__step-icon col-md-5">
                                <img src="/corporative-clients/razrabotka-sajtov/images/crm.svg"
                                     alt="Проведём интеграцию с CRM сервисами и системами управления торговлей">
                            </div>
                            <div class="contract-home__step-name col-md-6">
                                Проведём интеграцию с CRM сервисами и системами управления торговлей
                            </div>
                        </div>
                    </div>
                    <div class="contract-home__step col-sm-6 col-lg-4">
                        <div class="row">
                            <div class="contract-home__step-icon col-md-5">
                                <img src="/corporative-clients/razrabotka-sajtov/images/pay.svg" alt="Подключим платёжные системы">
                            </div>
                            <div class="contract-home__step-name col-md-6">
                                Подключим платёжные системы
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<script src="/assets/js/script-broker-deposit.js?v=1.0.4"></script>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>