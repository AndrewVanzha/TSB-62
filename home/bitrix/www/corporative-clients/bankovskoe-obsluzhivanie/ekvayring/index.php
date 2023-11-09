<?

use Bitrix\Main\Page\Asset;

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "АКБ «ТрансСтройБанк» предлагает организациям современные и удобные решения применения торгового и интернет-эквайринга для расширения возможностей по приему платежей. Наши предложения разработаны с учетом потребностей каждого сегмента рынка");
$APPLICATION->SetPageProperty("keywords", "Эквайринг АКБ «ТрансСтройБанк»");
$APPLICATION->SetPageProperty("title", "Эквайринг купить: онлайн касса / терминал  | АКБ «ТрансСтройБанк»");
$APPLICATION->SetTitle("Эквайринг");
Asset::getInstance()->addCss("/assets/css/style-broker-deposit.css?v=1.0.6");
Asset::getInstance()->addCss("/corporative-clients/bankovskoe-obsluzhivanie/ekvayring/style.css?v=2");
Asset::getInstance()->addJs("/corporative-clients/bankovskoe-obsluzhivanie/ekvayring/script.js?v=2");
?>
<div style="display:none"><?=print_r($arResult)?></div>
<div class="page-lf">
    <div class="container">
        <section class="eq-main">
            <header class="eq-main__header">
                <h2 class="eq-main__title page-title">Эквайринг для бизнеса</h2>
                <div class="eq-main__description offset-md-3 col-md-6">Эквайринг позволяет клиентам расплачиваться с
                    вами с помощью карты
                    прямо в магазине или через интернет
                </div>
            </header>
            <div class="eq-main__arrow">
                <svg width="26" height="34" viewBox="0 0 26 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M25.1147 8.50002L12.9904 29.5L0.866025 8.50002L25.1147 8.50002Z" stroke="#A58A57"/>
                    <line x1="4.56445" y1="33.6838" x2="23.1293" y2="0.754447" stroke="#A58A57"/>
                </svg>
            </div>
            <div class="row">
                <div class="eq-main__type offset-lg-1 col-lg-10">
                    <div class="eq-main__type-title">Выберите тип эквайринга для приёма платежей</div>
                    <div class="eq-main__type-list">
                        <div class="eq-main__type-item eq-main__type-item_active" data-eq-type="offline">В обычном
                            магазине
                        </div>
                        <div class="eq-main__type-item" data-eq-type="online">В онлайне</div>
                    </div>
                </div>
            </div>
        </section>
        <div class="eq-offline eq-show-hide eq-show-type" id="eq-offline">
            <section class="eq-offline-banner">
                <div class="row">
                    <div class="eq-offline-banner__image d-none d-sm-block col-sm-6 col-lg-5 offset-lg-1">
                        <img src="images/terminal.png" alt="Терминал">
                    </div>
                    <div class="eq-offline-banner__info col-sm-5 col-lg-4 offset-md-1">
                        <h3 class="eq-offline-banner__title page-title">Торговый эквайринг</h3>
                        <div class="eq-offline-banner__terms">
                            <div class="row">
                                <div class="eq-offline-banner__term col-md-6">от <span>1,2%</span> комиссия</div>
                                <div class="eq-offline-banner__term col-md-6">от <span>3</span> дней подключение</div>
                                <div class="eq-offline-banner__term col-md-6"><span>0₽</span><br/> терминал банка
                                    бесплатно
                                </div>
                                <div class="eq-offline-banner__term col-md-6">до <span>0,05%</span> скидки в рамках
                                    услуги
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="eq-offline-advantages">
                <header class="eq-offline-advantages__header">
                    <h2 class="eq-offline-advantages__title">Преимущества</h2>
                </header>
                <div class="row">
                    <div class="eq-offline-advantages__list col-lg-10 offset-lg-1">
                        <div class="row">
                            <div class="eq-offline-advantages__item col-sm-6 col-md-4">
                                <div class="eq-offline-advantages__icon">
                                    <img src="images/message.svg">
                                </div>
                                <div class="eq-offline-advantages__desc">Онлайн-заявка на подключение без необходимости
                                    приезжать в банк
                                </div>
                            </div>
                            <div class="eq-offline-advantages__item col-sm-6 col-md-4">
                                <div class="eq-offline-advantages__icon">
                                    <img src="images/watch.svg">
                                </div>
                                <div class="eq-offline-advantages__desc">Зачисление денежных средств на следующий
                                    рабочий день
                                </div>
                            </div>
                            <div class="eq-offline-advantages__item col-sm-6 col-md-4">
                                <div class="eq-offline-advantages__icon">
                                    <img src="images/map.svg">
                                </div>
                                <div class="eq-offline-advantages__desc">Ваш расчетный счет может быть открыт в любом
                                    стороннем
                                    банке
                                </div>
                            </div>
                            <div class="eq-offline-advantages__item col-sm-6 col-md-4">
                                <div class="eq-offline-advantages__icon">
                                    <img src="images/person.svg">
                                </div>
                                <div class="eq-offline-advantages__desc">Бесплатное обучение персонала и техническая
                                    поддержка
                                </div>
                            </div>
                            <div class="eq-offline-advantages__item col-sm-6 col-md-4">
                                <div class="eq-offline-advantages__icon">
                                    <img src="images/terminal-card.svg">
                                </div>
                                <div class="eq-offline-advantages__desc">Терминал устанавливается от банка или приобретается у партнера

                                </div>
                            </div>
                            <div class="eq-offline-advantages__item col-sm-6 col-md-4">
                                <div class="eq-offline-advantages__icon">
                                    <img src="images/trading.svg">
                                </div>
                                <div class="eq-offline-advantages__desc">Интеграция с кассовой техникой и кредитование
                                    кассового
                                    разрыва до 3 млн ₽
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="eq-offline-payments">
                <div class="row">
                    <div class="eq-offline-payments__image col-md-4 d-none d-lg-block">
                        <img src="images/payments.png">
                    </div>
                    <div class="eq-offline-payments__info offset-md-1 col-md-10 col-lg-6">
                        <div class="row">
                            <header class="eq-offline-payments__header col-md-9">
                                <h3 class="eq-offline-payments__title">Увеличивайте прибыль бизнеса за счет
                                    использования
                                    способов оплаты, удобных всем покупателям</h3>
                                <div class="eq-offline-payments__desc">Работаем с основными платёжными системами и
                                    принимаем
                                    бесконтактные платежи с гаджетов
                                </div>
                            </header>
                        </div>
                        <div class="eq-offline-payments__list">
                            <div class="eq-offline-payments__item"><img src="images/visa.png" alt="Visa"></div>
                            <div class="eq-offline-payments__item"><img src="images/mir.png" alt="МИР"></div>
                            <div class="eq-offline-payments__item"><img src="images/mastercard.png" alt="MasterCard">
                            </div>
                            <?/*?><div class="eq-offline-payments__item"><img src="images/unionpay.png" alt="UnionPay"></div><?*/?>
                            <div class="eq-offline-payments__item"><img src="images/gpay.png" alt="GooglePay"></div>
                            <div class="eq-offline-payments__item"><img src="images/apay.png" alt="ApplePay"></div>
                            <div class="eq-offline-payments__item"><img src="images/spay.png" alt="SamsungPay"></div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="eq-offline-terminals">
                <div class="row">
                    <div class="eq-offline-terminals__info col-md-4">
                        <header class="eq-offline-terminals__header">
                            <h3 class="eq-offline-terminals__title">Предоставляем удобные терминалы от мирового лидера
                                компании INGENICO</h3>
                            <div class="eq-offline-terminals__desc">Первый терминал предоставляется бесплатно, второй и
                                последующие от 250 ₽ в месяц
                            </div>
                        </header>
                    </div>
                    <div class="eq-offline-terminals__products offset-md-1 col-md-7 col-lg-6">
                        <div class="eq-offline-terminals__nav">
                            <div class="eq-offline-terminals__nav-item eq-offline-terminals__nav-item_active" data-eq_terminal="move-2500">
                                Move/2500
                            </div>
                            <div class="eq-offline-terminals__nav-item" data-eq_terminal="ict-250">iCT 250</div>
                            <div class="eq-offline-terminals__nav-item" data-eq_terminal="ipp-320">iPP 320</div>
                        </div>
                        <div class="eq-offline-terminals__list">
                            <div class="eq-offline-terminals__item eq-show-terminal" id="eq-move-2500">
                                <div class="row">
                                    <div class="eq-offline-terminals__item-image col-sm-5">
                                        <img src="images/Move-2500.png" alt="Move/2500">
                                    </div>
                                    <div class="eq-offline-terminals__item-info offset-sm-1 col-sm-6">
                                        <h4 class="eq-offline-terminals__item-title">Move/2500</h4>
                                        <div class="eq-offline-terminals__item-desc">Беспроводной терминал GPRS / 3G /
                                            Wi-Fi / Dual sim
                                        </div>
                                        <div class="eq-offline-terminals__item-params">
                                            <p>Способы приема карт: бесконтактные платежи, магнитная полоса,
                                                чип-ридер</p>
                                            <p>Порты: USB, разъемы питания</p>
                                            <p>Сферы применения: доставка, выездная торговля, кафе/рестораны, частные
                                                репетиторы
                                                и мастера</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="eq-offline-terminals__item" id="eq-ict-250">
                                <div class="row">
                                    <div class="eq-offline-terminals__item-image col-sm-5">
                                        <img src="images/iCT%20250.png" alt="iCT 250">
                                    </div>
                                    <div class="eq-offline-terminals__item-info offset-sm-1 col-sm-6">
                                        <h4 class="eq-offline-terminals__item-title">iCT 250</h4>
                                        <div class="eq-offline-terminals__item-desc">Стационарный терминал Ethernet/GPRS
                                        </div>
                                        <div class="eq-offline-terminals__item-params">
                                            <p>Способы приема карт: бесконтактные платежи; магнитная полоса;
                                                чип-ридер</p>
                                            <p>Порты: USB, RS232, разъемы питания</p>
                                            <p>Сфера приминения: продуктовые магазины, салоны красоты, аптеки, АЗС,
                                                фитнес и
                                                другое</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="eq-offline-terminals__item" id="eq-ipp-320">
                                <div class="row">
                                    <div class="eq-offline-terminals__item-image col-sm-5">
                                        <img src="images/iPP%20320.png" alt="iPP 320">
                                    </div>
                                    <div class="eq-offline-terminals__item-info offset-sm-1 col-sm-6">
                                        <h4 class="eq-offline-terminals__item-title">iPP 320</h4>
                                        <div class="eq-offline-terminals__item-desc">Пин-пад/терминал выносной
                                            (Совместим с кассовыми аппаратами)
                                        </div>
                                        <div class="eq-offline-terminals__item-params">
                                            <p>Способы приема: бесконтактные платежи, магнитная полоса, чип-ридер</p>
                                            <p>Порты: USB, Ethernet, RS232, MagicBox</p>
                                            <p>Сфера приминения: удобный выносной терминал для интеграции с кассовыми
                                                решениями</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="eq-form">
                <header class="eq-form__header">
                    <h2 class="eq-form__title page-title">Подключение быстро и просто!</h2>
                </header>
                <div class="row">
                    <div class="eq-form__steps offset-md-1 col-md-10 offset-lg-2 col-lg-8">
                        <div class="row">
                            <div class="eq-form__step col-sm-4">
                                <div class="eq-form__step-icon">
                                    <img src="images/step-icon.svg" alt="">
                                    <span>1</span>
                                </div>
                                <div class="eq-form__step-desc">Вы подаёте заявку, и мы связываемся с вами</div>
                            </div>
                            <div class="eq-form__step col-sm-4">
                                <div class="eq-form__step-icon">
                                    <img src="images/step-icon.svg" alt="">
                                    <span>2</span>
                                </div>
                                <div class="eq-form__step-desc">Заключаем договор с минимальным пакетом документов от
                                    вас
                                </div>
                            </div>
                            <div class="eq-form__step col-sm-4">
                                <div class="eq-form__step-icon">
                                    <img src="images/step-icon.svg" alt="">
                                    <span>3</span>
                                </div>
                                <div class="eq-form__step-desc">Вы получаете терминал и принимаете платежи по карте
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="eq-form__wrapper offset-md-2 col-md-8 offset-lg-3 col-lg-6">
						<?$APPLICATION->IncludeComponent(
							"webtu:feedback",
							"acquiring-new",
							Array(
								"ADMIN_EVENT" => "WEBTU_FEEDBACK_ACQUIRING_ADMIN",
								"AJAX_MODE" => "Y",
								"AJAX_OPTION_ADDITIONAL" => "",
								"AJAX_OPTION_HISTORY" => "N",
								"AJAX_OPTION_JUMP" => "N",
								"AJAX_OPTION_STYLE" => "Y",
								"EVENT_CALLBACK" => function($post){$post['RECOURSE']='Уважаемый(ая)';return$post;},
								"IBLOCK_ID" => "34",
								"POST_CALLBACK" => function($post){return$post;},
								//"PROPERTIES" => array("PHONE","EMAIL","NAME","COMPANY_INN","REGION"),
                                "PROPERTIES" => array("PHONE","COMPANY_NAME","COMPANY_INN","NAME","EMAIL","REGION","CITY","FOLDER","REQ_URI","FROM_WHERE","UTM_SOURCE","UTM_MEDIUM","UTM_CAMPAIGN","UTM_TERM","UTM_CONTENT"),
								"SITES" => array("s1"),
								"USER_EVENT" => "WEBTU_FEEDBACK_ACQUIRING_USER",
                                "UTM" => "105",
							)
						);?>
                    </div>
                </div>
            </section>
            <section class="eq-docs">
				<header class="eq-docs__header">
					<h2 class="eq-docs__title page-title">Документы</h2>
				</header>
				<div class="eq-docs__list">
					<div class="row">
                        <?$APPLICATION->IncludeComponent(
                            "bitrix:news.detail",
                            "documents-type-1",
                            Array(
                                "ACTIVE_DATE_FORMAT" => "d.m.Y",
                                "ADD_ELEMENT_CHAIN" => "N",
                                "ADD_SECTIONS_CHAIN" => "N",
                                "AJAX_MODE" => "N",
                                "AJAX_OPTION_ADDITIONAL" => "",
                                "AJAX_OPTION_HISTORY" => "N",
                                "AJAX_OPTION_JUMP" => "N",
                                "AJAX_OPTION_STYLE" => "Y",
                                "BROWSER_TITLE" => "-",
                                "CACHE_GROUPS" => "Y",
                                "CACHE_TIME" => "36000000",
                                "CACHE_TYPE" => "A",
                                "CHECK_DATES" => "Y",
                                "DETAIL_URL" => "",
                                "DISPLAY_BOTTOM_PAGER" => "N",
                                "DISPLAY_DATE" => "Y",
                                "DISPLAY_NAME" => "Y",
                                "DISPLAY_PICTURE" => "Y",
                                "DISPLAY_PREVIEW_TEXT" => "Y",
                                "DISPLAY_TOP_PAGER" => "N",
                                "ELEMENT_CODE" => "",
                                "ELEMENT_ID" => "8885",
                                "FIELD_CODE" => array("", ""),
                                "IBLOCK_ID" => "189",
                                "IBLOCK_TYPE" => "ls_documents",
                                "IBLOCK_URL" => "",
                                "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                                "MESSAGE_404" => "",
                                "META_DESCRIPTION" => "-",
                                "META_KEYWORDS" => "-",
                                "PAGER_BASE_LINK_ENABLE" => "N",
                                "PAGER_SHOW_ALL" => "N",
                                "PAGER_TEMPLATE" => ".default",
                                "PAGER_TITLE" => "Страница",
                                "PROPERTY_CODE" => array("", "DOCUMENTS", "CLASSES"),
                                "SET_BROWSER_TITLE" => "N",
                                "SET_CANONICAL_URL" => "N",
                                "SET_LAST_MODIFIED" => "N",
                                "SET_META_DESCRIPTION" => "N",
                                "SET_META_KEYWORDS" => "N",
                                "SET_STATUS_404" => "N",
                                "SET_TITLE" => "N",
                                "SHOW_404" => "N",
                                "STRICT_SECTION_CHECK" => "N",
                                "USE_PERMISSIONS" => "N",
                                "USE_SHARE" => "N"
                            )
                        );?>
					</div>
				</div>

                <div class="v21-more v21-more--side">
                    <a href="/arkhiv-tarifov-i-dokumentov/ekvayring/" class="archive-section" target="_blank">
                        <span>Архив документов </span>
                        <svg class="archive-section__arrow" xmlns="http://www.w3.org/2000/svg" width="14" height="13" viewBox="0 0 14 13" fill="none">
                            <path d="M13.2371 0.989515C13.2371 0.492459 12.8342 0.0895151 12.3371 0.0895145L4.23715 0.0895146C3.74009 0.0895146 3.33714 0.492459 3.33714 0.989515C3.33714 1.48657 3.74009 1.88952 4.23714 1.88951L11.4371 1.88951L11.4371 9.08952C11.4371 9.58657 11.8401 9.98952 12.3371 9.98952C12.8342 9.98952 13.2371 9.58657 13.2371 9.08951L13.2371 0.989515ZM1.65983 12.9396L12.9735 1.62591L11.7007 0.353119L0.387041 11.6668L1.65983 12.9396Z" fill="#00345E"/>
                        </svg>
                    </a>
                </div>
			</section>
        </div>
        <div class="eq-online eq-show-hide" id="eq-online">
            <section class="eq-online-banner">
                <div class="row">
                    <div class="eq-online-banner__info col-sm-5 col-md-4 offset-md-1">
                        <h3 class="eq-online-banner__title">Интернет-эквайринг</h3>
                        <div class="eq-online-banner__terms">
                            <div class="eq-online-banner__term">
                                <!--div class="d-none d-md-block">от <span>1,2%</span></div>
                                <div class="d-none d-md-block">комиссия</div-->
                                <div class="d-none d-md-block">
                                    <div class="eq-online-banner__line" style="align-items: flex-end;">
                                        <div class="">от </div><div class="mark">1,2%</div>
                                        <div class="">комиссия</div>
                                    </div>
                                </div>
                                <div class="d-block d-md-none">от 1% комиссия</div>
                            </div>
                            <div class="eq-online-banner__term">
                                <!--div class="d-none d-md-block">от <span>1</span></div>
                                <div class="d-none d-md-block">дня подключение не выходя из дома</div-->
                                <div class="d-none d-md-block">
                                    <div class="eq-online-banner__line">
                                        <?/*?><div class="" style="align-self: flex-end;">от </div><div class="mark">1</div><?*/?>
                                        <div class="">от </div><div class="mark">1</div>
                                        <div class="">дня подключение не выходя из дома</div>
                                    </div>
                                </div>
                                <div class="d-block d-md-none">от 1 дня подключение не выходя из дома</div>
                            </div>
                            <div class="eq-online-banner__term">
                                <!--div class="d-none d-md-block"><span>0₽</span></div>
                                <div class="d-none d-md-block">установка платежного модуля на сайте</div-->
                                <div class="d-none d-md-block">
                                    <div class="eq-online-banner__line">
                                        <div class="mark">0₽</div>
                                        <div class="">установка платежного модуля на сайте</div>
                                    </div>
                                </div>
                                <div class="d-block d-md-none">0₽ установка платежного модуля на сайте</div>
                            </div>
                        </div>
                    </div>
                    <div class="eq-online-banner__image d-none d-sm-block col-sm-7">
                        <img src="images/pad.png">
                    </div>
                </div>
            </section>
            <section class="eq-online-advantages">
                <div class="row">
                    <div class="eq-online-advantages__list col-md-12 offset-lg-1 col-lg-10">
                        <div class="row">
                            <div class="eq-online-advantages__item col-md-4">
                                <div class="eq-online-advantages__name">Проводите оплату в 2 этапа</div>
                                <div class="eq-online-advantages__desc">Резервируйте средства на карте клиента с
                                    дальнейшим
                                    списанием либо отменой
                                </div>
                            </div>
                            <div class="eq-online-advantages__item col-md-4">
                                <div class="eq-online-advantages__name">Принимайте платежи от клиентов, даже если у вас
                                    нет
                                    сайта
                                </div>
                                <div class="eq-online-advantages__desc">Выставляйте счета онлайн из личного кабинета, а
                                    клиент
                                    получит email со ссылкой на оплату
                                </div>
                            </div>
                            <div class="eq-online-advantages__item col-md-4">
                                <div class="eq-online-advantages__name">Техническая поддержка 24/7</div>
                                <div class="eq-online-advantages__desc">Контакты службы поддержки: +7&nbsp;495&nbsp;788-95-25,
                                    rbssupport@bpc.ru
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="eq-online-modules">
                <div class="row">
                    <div class="eq-online-modules__info offset-md-1 col-md-3">
                        <header class="eq-online-modules__header">
                            <h2 class="eq-online-modules__title">Готовые модули для интеграции с CMS</h2>
                            <div class="eq-online-modules__desc">Благодаря готовым решениям мы сможем быстро и
                                дистанционно
                                встроить платежный модуль на ваш сайт и подключить интернет-эквайринг
                            </div>
                        </header>
                    </div>
                    <div class="eq-online-modules__cms col-md-7">
                        <div class="eq-online-modules__list">
                            <div class="eq-online-modules__item"><img src="images/drupal.png" alt="Drupal"></div>
                            <div class="eq-online-modules__item"><img src="images/joomla.png" alt="Joomla"></div>
                            <div class="eq-online-modules__item"><img src="images/wordpress.png" alt="WordPress"></div>
                            <div class="eq-online-modules__item"><img src="images/umicms.png" alt="UMI.CMS"></div>
                            <div class="eq-online-modules__item"><img src="images/netcat.png" alt="NetCat"></div>
                            <div class="eq-online-modules__item"><img src="images/1c-bitrix.png" alt="1С-Битрикс"></div>
                            <div class="eq-online-modules__item"><img src="images/amirocms.png" alt="AmiroCMS"></div>
                            <div class="eq-online-modules__item">и многие другие</div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="eq-online-security">
                <header class="eq-online-security__header">
                    <h2 class="eq-online-security__title page-title">Удобство и безопасность</h2>
                </header>
                <div class="row">
                    <div class="eq-online-security__info col-md-4">
                        <h3 class="eq-online-security__subtitle">У вас будет личный кабинет для управления
                            платежами</h3>
                        <ul class="eq-online-security__advantages">
                            <li class="eq-online-security__advantages-item">- аналитика платежей</li>
                            <li class="eq-online-security__advantages-item">- контроль статусов платежей</li>
                            <li class="eq-online-security__advantages-item">- подтверждение, отмена или возврат платежа
                            </li>
                            <li class="eq-online-security__advantages-item">- выставление счета клиенту</li>
                        </ul>
                    </div>
                    <div class="eq-online-security__sliders col-md-8">
                        <div class="swiper-container eq-online-security__slider">
                            <div class="eq-online-security__wrapper swiper-wrapper">
                                <div class="eq-online-security__slide swiper-slide">
                                    <img src="images/lk-slide-1.png">
                                </div>
                                <div class="eq-online-security__slide swiper-slide">
                                    <img src="images/lk-slide-2.png">
                                </div>
                            </div>
                            <div class="swiper-pagination eq-online-security__pagination"></div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="eq-online-security-pay">
                <div class="row">
                    <div class="eq-online-security-pay__info col-md-5 col-lg-4">
                        <header class="eq-online-security-pay__header">
                            <h2 class="eq-online-security-pay__title">Мы используем три уровня обеспечения безопасности
                                платежей</h2>
                        </header>
                        <div class="eq-online-security-pay__system d-none d-md-block">
                            <p>Приём карт платежных систем</p>
                            <div class="eq-online-security-pay__list">
                                <div class="eq-online-security-pay__item">
                                    <img src="images/mastercard.png" alt="MasterCard">
                                </div>
                                <div class="eq-online-security-pay__item">
                                    <img src="images/mir.png" alt="МИР">
                                </div>
                                <div class="eq-online-security-pay__item">
                                    <img src="images/visa.png"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="eq-online-security-pay__advantages offset-lg-1 col-md-6">
                        <div class="eq-online-security-pay__advantages-list">
                            <div class="row">
                                <div class="eq-online-security-pay__advantages-item col-6 col-sm-4">
                                    <div class="eq-online-security-pay__advantages-icon">
                                        <img src="images/3d%20secure.svg" alt="3-D SECURE">
                                    </div>
                                    <div class="eq-online-security-pay__advantages-desc">протокол<br> 3-D SECURE</div>
                                </div>
                                <div class="eq-online-security-pay__advantages-item col-6 col-sm-4">
                                    <div class="eq-online-security-pay__advantages-icon">
                                        <img src="images/PCI%20DSS.svg" alt="PCI DSS">
                                    </div>
                                    <div class="eq-online-security-pay__advantages-desc">стандарт<br> PCI DSS</div>
                                </div>
                                <div class="eq-online-security-pay__advantages-item col-6 col-sm-4">
                                    <div class="eq-online-security-pay__advantages-icon">
                                        <img src="images/Fraud.svg" alt="фрод-мониторинг">
                                    </div>
                                    <div class="eq-online-security-pay__advantages-desc">фрод-мониторинг онлайн
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="eq-form">
                <header class="eq-form__header">
                    <h2 class="eq-form__title">Подключение быстро и просто!</h2>
                </header>
                <div class="row">
                    <div class="eq-form__steps offset-md-2 col-md-8">
                        <div class="row">
                            <div class="eq-form__step col-sm-4">
                                <div class="eq-form__step-icon">
                                    <img src="images/step-icon.svg" alt="">
                                    <span>1</span>
                                </div>
                                <div class="eq-form__step-desc">Вы подаёте заявку, и мы связываемся с вами</div>
                            </div>
                            <div class="eq-form__step col-sm-4">
                                <div class="eq-form__step-icon">
                                    <img src="images/step-icon.svg" alt="">
                                    <span>2</span>
                                </div>
                                <div class="eq-form__step-desc">Заключаем договор с минимальным пакетом документов от
                                    вас
                                </div>
                            </div>
                            <div class="eq-form__step col-sm-4">
                                <div class="eq-form__step-icon">
                                    <img src="images/step-icon.svg" alt="">
                                    <span>3</span>
                                </div>
                                <div class="eq-form__step-desc">Принимаете платежи онлайн</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="eq-form__wrapper offset-md-2 col-md-8 offset-lg-3 col-lg-6">
						<?$APPLICATION->IncludeComponent(
							"webtu:feedback",
							"acquiring-new",
							Array(
								"ADMIN_EVENT" => "WEBTU_FEEDBACK_ACQUIRING_ADMIN",
								"AJAX_MODE" => "Y",
								"AJAX_OPTION_ADDITIONAL" => "",
								"AJAX_OPTION_HISTORY" => "N",
								"AJAX_OPTION_JUMP" => "N",
								"AJAX_OPTION_STYLE" => "Y",
								"EVENT_CALLBACK" => function($post){$post['RECOURSE']='Уважаемый(ая)';return$post;},
								"IBLOCK_ID" => "34",
								"POST_CALLBACK" => function($post){return$post;},
								//"PROPERTIES" => array("PHONE","EMAIL","NAME","COMPANY_INN","REGION"),
                                "PROPERTIES" => array("PHONE","COMPANY_NAME","COMPANY_INN","NAME","EMAIL","REGION","CITY","FOLDER","REQ_URI","FROM_WHERE","UTM_SOURCE","UTM_MEDIUM","UTM_CAMPAIGN","UTM_TERM","UTM_CONTENT"),
								"SITES" => array("s1"),
								"USER_EVENT" => "WEBTU_FEEDBACK_ACQUIRING_USER",
                                "UTM" => "105",
							)
						);?>
                    </div>
                </div>
            </section>
            <section class="eq-docs">
				<header class="eq-docs__header">
					<h2 class="eq-docs__title page-title">Документы</h2>
				</header>
				<div class="eq-docs__list">
					<div class="row">
                        <?$APPLICATION->IncludeComponent(
                            "bitrix:news.detail",
                            "documents-type-1",
                            Array(
                                "ACTIVE_DATE_FORMAT" => "d.m.Y",
                                "ADD_ELEMENT_CHAIN" => "N",
                                "ADD_SECTIONS_CHAIN" => "N",
                                "AJAX_MODE" => "N",
                                "AJAX_OPTION_ADDITIONAL" => "",
                                "AJAX_OPTION_HISTORY" => "N",
                                "AJAX_OPTION_JUMP" => "N",
                                "AJAX_OPTION_STYLE" => "Y",
                                "BROWSER_TITLE" => "-",
                                "CACHE_GROUPS" => "Y",
                                "CACHE_TIME" => "36000000",
                                "CACHE_TYPE" => "A",
                                "CHECK_DATES" => "Y",
                                "DETAIL_URL" => "",
                                "DISPLAY_BOTTOM_PAGER" => "N",
                                "DISPLAY_DATE" => "Y",
                                "DISPLAY_NAME" => "Y",
                                "DISPLAY_PICTURE" => "Y",
                                "DISPLAY_PREVIEW_TEXT" => "Y",
                                "DISPLAY_TOP_PAGER" => "N",
                                "ELEMENT_CODE" => "",
                                "ELEMENT_ID" => "8886",
                                "FIELD_CODE" => array("", ""),
                                "IBLOCK_ID" => "189",
                                "IBLOCK_TYPE" => "ls_documents",
                                "IBLOCK_URL" => "",
                                "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                                "MESSAGE_404" => "",
                                "META_DESCRIPTION" => "-",
                                "META_KEYWORDS" => "-",
                                "PAGER_BASE_LINK_ENABLE" => "N",
                                "PAGER_SHOW_ALL" => "N",
                                "PAGER_TEMPLATE" => ".default",
                                "PAGER_TITLE" => "Страница",
                                "PROPERTY_CODE" => array("", "DOCUMENTS", "CLASSES"),
                                "SET_BROWSER_TITLE" => "N",
                                "SET_CANONICAL_URL" => "N",
                                "SET_LAST_MODIFIED" => "N",
                                "SET_META_DESCRIPTION" => "N",
                                "SET_META_KEYWORDS" => "N",
                                "SET_STATUS_404" => "N",
                                "SET_TITLE" => "N",
                                "SHOW_404" => "N",
                                "STRICT_SECTION_CHECK" => "N",
                                "USE_PERMISSIONS" => "N",
                                "USE_SHARE" => "N"
                            )
                        );?>
					</div>
				</div>

                <div class="v21-more v21-more--side">
                    <a href="/arkhiv-tarifov-i-dokumentov/ekvayring/" class="archive-section" target="_blank">
                        <span>Архив документов </span>
                        <svg class="archive-section__arrow" xmlns="http://www.w3.org/2000/svg" width="14" height="13" viewBox="0 0 14 13" fill="none">
                            <path d="M13.2371 0.989515C13.2371 0.492459 12.8342 0.0895151 12.3371 0.0895145L4.23715 0.0895146C3.74009 0.0895146 3.33714 0.492459 3.33714 0.989515C3.33714 1.48657 3.74009 1.88952 4.23714 1.88951L11.4371 1.88951L11.4371 9.08952C11.4371 9.58657 11.8401 9.98952 12.3371 9.98952C12.8342 9.98952 13.2371 9.58657 13.2371 9.08951L13.2371 0.989515ZM1.65983 12.9396L12.9735 1.62591L11.7007 0.353119L0.387041 11.6668L1.65983 12.9396Z" fill="#00345E"/>
                        </svg>
                    </a>
                </div>
			</section>
        </div>
    </div>
</div>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>