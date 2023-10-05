<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Кэшбэк деньгами, а не баллами");
$APPLICATION->SetPageProperty("description", "Любые покупки дешевле с кэшбэк картами от Трансстройбанка! Вернём деньгами до 4,5% от покупок и столько же на остаток по счёту. Скидки партнёров до 30%.");
$APPLICATION->SetTitle("Дебетовые карты с кэшбэком");
?>
<style>
	.breadcrumbs {margin-bottom:44px}
	.popup-form_title, .fancybox-close-small, .popup-form_content .button, .popup-form .switch-box_lever::before {background-color:#A58A57}
	.popup-form_content .button:hover {background-color:#00345E}
	.popup-form .select-box .cs-box_selected, .popup-form .select-box .cs-box_list li.is-active, .popup-form a {color: #A58A57;text-decoration:none}
	.popup-form a:hover {color:#00345E}
	.popup-form_content .button {border-radius:0;height:45px;line-height:42px}
</style>
<link rel="stylesheet" href="/assets/css/style-broker-deposit.css?v=1.0.3">

<div class="page-lf">
    <div class="container">
        <section class="banner-top banner-top--cashback">
            <div class="row">
                <div class="banner-top__image col-md-6 col-lg-7">
                    <div class="banner-top__background">
						<img src="/assets/images/broker-deposit/cashback.png?v=1.0.3" alt="Cashback"/>
                    </div>
                </div>
                <div class="banner-top__desc col-md-6 col-lg-5">
                    <header class="banner-top__header">
                        <span>Вернём деньгами</span>
                    </header>
                    <div class="banner-top__percent">
                        <div class="banner-top__percent-item">
                            <header>до <span>4,5%</span></header>
                            <p>на остаток по <br/>счёту</p>
                        </div>
                        <div class="banner-top__percent-item">
                            <header>до <span>2%</span></header>
                            <p>в любимых <br/>категориях</p>
                        </div>
                        <div class="banner-top__percent-item">
                            <header><span>2%</span> на всё</header>
                            <p>в День рождения и <br/>следующие 6 дней</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="container">
        <section class="cashback-conditions">
            <header class="cashback-conditions__header">
                <h2 class="cashback-conditions__title page-title page-title__h2">Условия и процент кэшбэка</h2>
            </header>
            <?$APPLICATION->IncludeComponent(
                "bitrix:news.list",
                "cashback_list",
                Array(
                    "ACTIVE_DATE_FORMAT" => "d.m.Y",
                    "ADD_SECTIONS_CHAIN" => "N",
                    "AJAX_MODE" => "N",
                    "AJAX_OPTION_ADDITIONAL" => "",
                    "AJAX_OPTION_HISTORY" => "N",
                    "AJAX_OPTION_JUMP" => "N",
                    "AJAX_OPTION_STYLE" => "N",
                    "CACHE_FILTER" => "N",
                    "CACHE_GROUPS" => "Y",
                    "CACHE_TIME" => "36000000",
                    "CACHE_TYPE" => "A",
                    "CHECK_DATES" => "Y",
                    "DETAIL_URL" => "",
                    "DISPLAY_BOTTOM_PAGER" => "Y",
                    "DISPLAY_DATE" => "N",
                    "DISPLAY_NAME" => "N",
                    "DISPLAY_PICTURE" => "N",
                    "DISPLAY_PREVIEW_TEXT" => "N",
                    "DISPLAY_TOP_PAGER" => "N",
                    "FIELD_CODE" => array("NAME", "PREVIEW_TEXT", "DETAIL_TEXT", ""),
                    "FILTER_NAME" => "",
                    "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                    "IBLOCK_ID" => "185",
                    "IBLOCK_TYPE" => "private_clients",
                    "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                    "INCLUDE_SUBSECTIONS" => "N",
                    "MESSAGE_404" => "",
                    "NEWS_COUNT" => "3",
                    "PAGER_BASE_LINK_ENABLE" => "N",
                    "PAGER_DESC_NUMBERING" => "N",
                    "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                    "PAGER_SHOW_ALL" => "N",
                    "PAGER_SHOW_ALWAYS" => "N",
                    "PAGER_TEMPLATE" => ".default",
                    "PAGER_TITLE" => "Новости",
                    "PARENT_SECTION" => "",
                    "PARENT_SECTION_CODE" => "",
                    "PREVIEW_TRUNCATE_LEN" => "",
                    "PROPERTY_CODE" => array("", ""),
                    "SET_BROWSER_TITLE" => "N",
                    "SET_LAST_MODIFIED" => "N",
                    "SET_META_DESCRIPTION" => "N",
                    "SET_META_KEYWORDS" => "N",
                    "SET_STATUS_404" => "N",
                    "SET_TITLE" => "N",
                    "SHOW_404" => "N",
                    "SORT_BY1" => "ASC",
                    "SORT_BY2" => "SORT",
                    "SORT_ORDER1" => "ASC",
                    "SORT_ORDER2" => "DESC",
                    "STRICT_SECTION_CHECK" => "N"
                )
            );?>
            <?/*div class="cashback-conditions__list col-md-12 col-lg-10 offset-lg-1">
                <div class="row conditions-slider swiper-container">
                    <div class="swiper-wrapper conditions-slider__wrapper">
                        <div class="cashback-conditions__item swiper-slide conditions-item">
                            <div class="conditions-item__wrapper conditions-item--turquoise">
                                <div class="conditions-item__header">
                                    10 платежей
                                </div>
                                <div class="conditions-item__desc">
                                    <ul class="conditions-item__ul">
                                        <li class="conditions-item__li">1% на «Любимую категорию»</li>
                                        <li class="conditions-item__li">0,5% на остальные покупки</li>
                                        <li class="conditions-item__li">Неограниченный кешбэк от партнеров</li>
                                        <li class="conditions-item__li">Максимальное вознаграждение в месяц 1000 ₽
                                        </li>
                                    </ul>
                                </div>
                                <div class="conditions-item__if">
                                    <p>Условие:</p>
                                    <p>
                                        совершить не менее 10 безналичных операций в течение календарного месяца на
                                        общую сумму не менее
                                        10 000 ₽
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="cashback-conditions__item swiper-slide conditions-item">
                            <div class="conditions-item__wrapper conditions-item--blue">
                                <div class="conditions-item__header">
                                    20 платежей
                                </div>
                                <div class="conditions-item__desc">
                                    <ul class="conditions-item__ul">
                                        <li class="conditions-item__li">1,5% на «Любимую категорию»</li>
                                        <li class="conditions-item__li">0,5% на остальные покупки</li>
                                        <li class="conditions-item__li">Неограниченный кешбэк от партнеров</li>
                                        <li class="conditions-item__li">Максимальное вознаграждение в месяц 2000 ₽
                                        </li>
                                    </ul>
                                </div>
                                <div class="conditions-item__if">
                                    <p>Условие:</p>
                                    <p>
                                        совершить не менее 20 безналичных операций в течение календарного месяца на
                                        общую сумму не менее
                                        40 000 ₽
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="cashback-conditions__item swiper-slide conditions-item">
                            <div class="conditions-item__wrapper conditions-item--gold">
                                <div class="conditions-item__header">
                                    30 платежей
                                </div>
                                <div class="conditions-item__desc">
                                    <ul class="conditions-item__ul">
                                        <li class="conditions-item__li">2% на «Любимую категорию»</li>
                                        <li class="conditions-item__li">0,5% на остальные покупки</li>
                                        <li class="conditions-item__li">Неограниченный кешбэк от партнеров</li>
                                        <li class="conditions-item__li">Максимальное вознаграждение в месяц 3000 ₽
                                        </li>
                                    </ul>
                                </div>
                                <div class="conditions-item__if">
                                    <p>Условие:</p>
                                    <p>
                                        совершить не менее 30 безналичных операций в течение календарного месяца на
                                        общую сумму не менее
                                        90 000 ₽
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="conditions-slider__pagination d-md-none"></div>
            </div*/?>
            <div class="cashback-conditions__info conditions-info d-none d-md-block">
                <div class="row">
                    <div class="conditions-info__icon col-md-1">
                        <img src="/assets/images/broker-deposit/info.svg" alt="Info"/>
                    </div>
                    <div class="conditions-info__text col-md-5">
                        В день рождения (и следующие 6 дней) вознаграждение по всем категориям программы повышается до
                        2%
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="container">
        <section class="cashback-category">
            <header class="cashback-category__header">
                <h2 class="cashback-category__title page-title page-title__h2">Категории повышенного кэшбэка</h2>
            </header>
            <div class="row">
                <div class="cashback-category__slider col-md-8 col-lg-9">
                    <div class="cashback-category__slider category-slider swiper-container">
                        <div class="swiper-wrapper category-slider__wrapper">
                            <div class="swiper-slide category-slider__slide">
                                <div class="category-slide">
                                    <img src="/assets/images/broker-deposit/headphones.png" class="category-slide__image"/>
                                    <div class="category-slide__title">Книги, видео, музыка</div>
                                </div>
                                <span class="category-slide__tooltip" data-tooltip-content="#tooltip-book">
                      <img src="/assets/images/broker-deposit/question.svg"/>
                      <span class="category-slide__tooltip--content" id="tooltip-book">
                        Разнообразные издательства / печатное дело; Книги, периодические издания и газеты; Музыкальные
                        инструменты и сопутствующие товары; Музыкальные магазины; Книжные магазины; Стримминговые
                        сервисы, онлайн-кинотеатры
                      </span>
                    </span>
                            </div>
                            <div class="swiper-slide category-slider__slide">
                                <div class="category-slide">
                                    <img src="/assets/images/broker-deposit/apteka.png" class="category-slide__image"/>
                                    <div class="category-slide__title">Аптеки</div>
                                </div>
                            </div>
                            <div class="swiper-slide category-slider__slide">
                                <div class="category-slide">
                                    <img src="/assets/images/broker-deposit/veterinar.png" class="category-slide__image"/>
                                    <div class="category-slide__title">Вет. клиники, зоомагазины</div>
                                </div>
                            </div>
                            <div class="swiper-slide category-slider__slide">
                                <div class="category-slide">
                                    <img src="/assets/images/broker-deposit/sport.png" class="category-slide__image"/>
                                    <div class="category-slide__title">Спорт</div>
                                </div>
                                <span class="category-slide__tooltip" data-tooltip-content="#tooltip-sport">
                      <img src="/assets/images/broker-deposit/question.svg"/>
                      <span class="category-slide__tooltip--content" id="tooltip-sport">
                        Одежда для активного отдыха и спорта, спорттовары; Продажа и обслуживание велосипедов;
                        Спортивные поля, коммерческие спортивные состязания, профессиональные спортивные клубы,
                        спортивные промоутеры; Частные клубы (загородные, спортивные, оздоровительные) и поля для гольфа
                      </span>
                    </span>
                            </div>
                            <div class="swiper-slide category-slider__slide">
                                <div class="category-slide">
                                    <img src="/assets/images/broker-deposit/clothes.png" class="category-slide__image"/>
                                    <div class="category-slide__title">Одежда, обувь, аксессуары</div>
                                </div>
                            </div>
                            <div class="swiper-slide category-slider__slide">
                                <div class="category-slide">
                                    <img src="/assets/images/broker-deposit/furniture.png" class="category-slide__image"/>
                                    <div class="category-slide__title">Мебель, ремонт, цветы</div>
                                </div>
                                <span class="category-slide__tooltip" data-tooltip-content="#tooltip-furniture">
                      <img src="/assets/images/broker-deposit/question.svg"/>
                      <span class="category-slide__tooltip--content" id="tooltip-furniture">
                        Строительные материалы; Цветы, садовый инвентарь; Сантехника, отопление; Стекло, лак, краска,
                        обои; Мебель, предметы интерьера и бытовые принадлежности, камины; Ткани, обивочный материал,
                        гардины и портьеры, жалюзи; Товары для рукоделия; Услуги по обустройству полов; Услуги по
                        дезинсекции, дезинфекции и дератизации, Специальная обработка, полировка, санитария
                      </span>
                    </span>
                            </div>
                            <div class="swiper-slide category-slider__slide">
                                <div class="category-slide">
                                    <img src="/assets/images/broker-deposit/azs.png" class="category-slide__image"/>
                                    <div class="category-slide__title">АЗС</div>
                                </div>
                                <span class="category-slide__tooltip" data-tooltip-content="#tooltip-azs">
                      <img src="/assets/images/broker-deposit/question.svg"/>
                      <span class="category-slide__tooltip--content" id="tooltip-azs">
                        Продажа топлива, сопутствующих товаров и услуги на АЗС; Топливо – уголь, нефть, сжиженный газ,
                        дрова; Оптовая продажа нефти и нефтепродуктов
                      </span>
                    </span>
                            </div>
                            <div class="swiper-slide category-slider__slide">
                                <div class="category-slide">
                                    <img src="/assets/images/broker-deposit/rzd.png" class="category-slide__image"/>
                                    <div class="category-slide__title">Ж/Д билеты</div>
                                </div>
                            </div>
                            <div class="swiper-slide category-slider__slide">
                                <div class="category-slide">
                                    <img src="/assets/images/broker-deposit/auto.png" class="category-slide__image"/>
                                    <div class="category-slide__title">Авто, СТО, запчасти, мойка</div>
                                </div>
                                <span class="category-slide__tooltip" data-tooltip-content="#tooltip-auto">
                      <img src="/assets/images/broker-deposit/question.svg"/>
                      <span class="category-slide__tooltip--content" id="tooltip-auto">
                        Автозапчасти, шины; Продажа, лизинг и обслуживание легковых и грузовых автомобилей; Продажа
                        мотоциклов; Паркинги и гаражи; Шиномонтаж и вулканизация; СТО, мойка, покраска; Услуги
                        эвакуатора
                      </span>
                    </span>
                            </div>
                            <div class="swiper-slide category-slider__slide">
                                <div class="category-slide">
                                    <img src="/assets/images/broker-deposit/restoran.png" class="category-slide__image"/>
                                    <div class="category-slide__title">Рестораны, бары, ночные клубы</div>
                                </div>
                            </div>
                            <div class="swiper-slide category-slider__slide">
                                <div class="category-slide">
                                    <img src="/assets/images/broker-deposit/spa.png" class="category-slide__image"/>
                                    <div class="category-slide__title">SPA, косметика, салоны красоты</div>
                                </div>
                                <span class="category-slide__tooltip" data-tooltip-content="#tooltip-spa">
                      <img src="/assets/images/broker-deposit/question.svg"/>
                      <span class="category-slide__tooltip--content" id="tooltip-spa">
                        Парики и шиньоны; Магазины косметики; Парикмахерские и салоны красоты; Массажные услуги;
                        СПА-услуги
                      </span>
                    </span>
                            </div>
                            <div class="swiper-slide category-slider__slide">
                                <div class="category-slide">
                                    <img src="/assets/images/broker-deposit/fastfood.png" class="category-slide__image"/>
                                    <div class="category-slide__title">Фаст-фуд, закусочные, буфеты</div>
                                </div>
                            </div>
                            <div class="swiper-slide category-slider__slide">
                                <div class="category-slide">
                                    <img src="/assets/images/broker-deposit/gift.png" class="category-slide__image"/>
                                    <div class="category-slide__title">Подарки, сувениры</div>
                                </div>
                            </div>
                            <div class="swiper-slide category-slider__slide">
                                <div class="category-slide">
                                    <img src="/assets/images/broker-deposit/photo.png" class="category-slide__image"/>
                                    <div class="category-slide__title">Фото, фототехника, графический дизайн</div>
                                </div>
                            </div>
                            <div class="swiper-slide category-slider__slide">
                                <div class="category-slide">
                                    <img src="/assets/images/broker-deposit/tech.png" class="category-slide__image"/>
                                    <div class="category-slide__title">Электроника, бытовая техника</div>
                                </div>
                                <span class="category-slide__tooltip" data-tooltip-content="#tooltip-tech">
                      <img src="/assets/images/broker-deposit/question.svg"/>
                      <span class="category-slide__tooltip--content" id="tooltip-tech">
                        Компьютеры и компьютерная периферия; Бытовая техника; Офисное, фотографическое,
                        фотокопировальное и микрофильмирующее оборудование
                      </span>
                    </span>
                            </div>
                        </div>
                        <!-- Add Pagination -->
                        <div class="swiper-pagination category-slider__pagination"></div>
                    </div>
                    <div class="category-slider__arrows d-none d-sm-flex">
                        <div class="category-slider__arrow category-slider__prev">
                            <svg width="27" height="33" viewBox="0 0 27 33" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                        class="svg-arrow"
                                        d="M19.3922 5.67981L19.3806 6.797L17.8659 7.64065L17.5066 7.86324L16.0905 8.7409L12.6498 10.8618L5.27175 15.4019L4.01641 16.183L3.70879 16.3751L4.03551 16.5694L4.68267 16.9541L7.78572 18.8097L15.6783 23.5589L20.1942 26.2763L22.0028 27.3584L23.2388 28.088L23.5409 28.2662L23.691 28.3546C23.7278 28.3905 23.7083 28.3257 23.7125 28.3035L23.7109 28.211L23.6976 27.4781L23.671 26.0509L23.6178 21.0806L23.4051 1.98865e-05L26.4971 2.04979e-05L26.2843 21.0806L26.2311 26.6506L26.2045 30.4935L26.1912 32.3957L26.1896 32.6326L26.1888 32.7509C26.1837 32.7619 26.1994 32.81 26.1774 32.7904L26.1259 32.7583L25.715 32.5014L24.8951 31.9889L14.5036 25.4674L6.70841 20.5598L1.96755 17.5869L0.653773 16.7645L1.58865e-07 16.3552L0.676448 15.9545L3.3691 14.3643L11.7831 9.41885L16.2383 6.797L18.7703 5.3033L19.398 4.93306L19.3922 5.67981Z"
                                        fill="#FFFFFF"
                                />
                            </svg>
                        </div>
                        <div class="category-slider__arrow category-slider__next">
                            <svg width="27" height="33" viewBox="0 0 27 33" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                        class="svg-arrow"
                                        d="M19.3922 5.67981L19.3806 6.797L17.8659 7.64065L17.5066 7.86324L16.0905 8.7409L12.6498 10.8618L5.27175 15.4019L4.01641 16.183L3.70879 16.3751L4.03551 16.5694L4.68267 16.9541L7.78572 18.8097L15.6783 23.5589L20.1942 26.2763L22.0028 27.3584L23.2388 28.088L23.5409 28.2662L23.691 28.3546C23.7278 28.3905 23.7083 28.3257 23.7125 28.3035L23.7109 28.211L23.6976 27.4781L23.671 26.0509L23.6178 21.0806L23.4051 1.98865e-05L26.4971 2.04979e-05L26.2843 21.0806L26.2311 26.6506L26.2045 30.4935L26.1912 32.3957L26.1896 32.6326L26.1888 32.7509C26.1837 32.7619 26.1994 32.81 26.1774 32.7904L26.1259 32.7583L25.715 32.5014L24.8951 31.9889L14.5036 25.4674L6.70841 20.5598L1.96755 17.5869L0.653773 16.7645L1.58865e-07 16.3552L0.676448 15.9545L3.3691 14.3643L11.7831 9.41885L16.2383 6.797L18.7703 5.3033L19.398 4.93306L19.3922 5.67981Z"
                                        fill="#FFFFFF"
                                />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="cashback-category__favorites col-md-4 col-lg-3">
                    <div class="category-favorites">
                        <div class="category-favorites__header">
                            <span>Что такое «Любимая <br/>категория»?</span>
                        </div>
                        <div class="category-favorites__desc">
                            <p>
                                Это категория торговых и сервисных предприятий со схожими видами деятельности.
                                Определите сферу, в
                                которой у вас больше всего расходов, назначте её «Любимой категорией» и получайте
                                кэшбэк по
                                увеличенному проценту.
                            </p>
                            <p>Изменить «Любимую категорию» можно в любой момент в интернет-банке.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="container">
        <section class="cashback-card">
            <header class="cashback-card__header">
                <h2 class="cashback-card__title page-title page-title__h2">Оформите карту и присоединяйтесь к
                    программе</h2>
            </header>
            <div class="cashback-card__step swiper-container card-step">
                <div class="row swiper-wrapper">
                    <div class="card-step__item swiper-slide col-5 col-sm-4 col-md-3 offset-md-1">
                        <div class="card-step__image">
                            <img src="/assets/images/broker-deposit/card-step-1.svg"/>
                        </div>
                        <div class="card-step__title">Подайте <br/>заявку онлайн</div>
                    </div>
                    <div class="card-step__item swiper-slide col-6 col-sm-4 col-md-4">
                        <div class="card-step__image">
                            <img src="/assets/images/broker-deposit/card-step-2.svg"/>
                        </div>
                        <div class="card-step__title">Выберите <br/>любимую категорию</div>
                    </div>
                    <div class="card-step__item swiper-slide col-7 col-sm-4 col-md-3">
                        <div class="card-step__image">
                            <img src="/assets/images/broker-deposit/card-step-3.svg"/>
                        </div>
                        <div class="card-step__title">Совершайте покупки <br/>и получайте деньги</div>
                    </div>
                </div>
            </div>
            <div class="cashback-card__tariff card-tariff">
                <?$APPLICATION->IncludeComponent(
                    "bitrix:news.list",
                    "card_cashback_info",
                    Array(
                        "ACTIVE_DATE_FORMAT" => "d.m.Y",
                        "ADD_SECTIONS_CHAIN" => "N",
                        "AJAX_MODE" => "N",
                        "AJAX_OPTION_ADDITIONAL" => "",
                        "AJAX_OPTION_HISTORY" => "N",
                        "AJAX_OPTION_JUMP" => "N",
                        "AJAX_OPTION_STYLE" => "N",
                        "CACHE_FILTER" => "N",
                        "CACHE_GROUPS" => "Y",
                        "CACHE_TIME" => "36000000",
                        "CACHE_TYPE" => "A",
                        "CHECK_DATES" => "Y",
                        "DETAIL_URL" => "",
                        "DISPLAY_BOTTOM_PAGER" => "Y",
                        "DISPLAY_DATE" => "N",
                        "DISPLAY_NAME" => "N",
                        "DISPLAY_PICTURE" => "N",
                        "DISPLAY_PREVIEW_TEXT" => "N",
                        "DISPLAY_TOP_PAGER" => "N",
                        "FIELD_CODE" => array("NAME", "PREVIEW_TEXT", "DETAIL_TEXT", ""),
                        "FILTER_NAME" => "",
                        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                        "IBLOCK_ID" => "185",
                        "IBLOCK_TYPE" => "private_clients",
                        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                        "INCLUDE_SUBSECTIONS" => "N",
                        "MESSAGE_404" => "",
                        "NEWS_COUNT" => "5",
                        "PAGER_BASE_LINK_ENABLE" => "N",
                        "PAGER_DESC_NUMBERING" => "N",
                        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                        "PAGER_SHOW_ALL" => "N",
                        "PAGER_SHOW_ALWAYS" => "N",
                        "PAGER_TEMPLATE" => ".default",
                        "PAGER_TITLE" => "Новости",
                        "PARENT_SECTION" => "425",
                        "PARENT_SECTION_CODE" => "",
                        "PREVIEW_TRUNCATE_LEN" => "",
                        "PROPERTY_CODE" => array("LINK_CARD", "INFO_CARD"),
                        "SET_BROWSER_TITLE" => "N",
                        "SET_LAST_MODIFIED" => "N",
                        "SET_META_DESCRIPTION" => "N",
                        "SET_META_KEYWORDS" => "N",
                        "SET_STATUS_404" => "N",
                        "SET_TITLE" => "N",
                        "SHOW_404" => "N",
                        "SORT_BY1" => "ASC",
                        "SORT_BY2" => "SORT",
                        "SORT_ORDER1" => "ASC",
                        "SORT_ORDER2" => "DESC",
                        "STRICT_SECTION_CHECK" => "N"
                    )
                );?>
                <?/*div class="row">
                    <div class="card-tariff__slider col-md-6 col-lg-5">
                        <div class="tariff-slider__title d-md-none">Visa Platinum PayWave</div>
                        <div class="swiper-container tariff-slider">
                            <div class="swiper-wrapper">
                                <div
                                        class="swiper-slide tariff-slider__slide"
                                        style="background-image:url(/assets/images/broker-deposit/tsb-v-platinum.png)"
                                        data-card_info='{"title":"Visa Platinum PayWave","url":"https://www.transstroybank.ru/chastnym-klientam/bankovskie-karty/visa-platinum-pay-wave/","param":["Кэшбэк программа","Страховой полис для выезжающих за рубеж бесплатно","до 5 % на остаток по картсчету","Бесплатное пополнение с карт других банков на <a href=\"https://card2card.intervale.ru/transstroybank/\" target=\"_blank\">сайте Банка</a>","Сервисы оплаты Apple Pay, Samsung Pay, Garmin Pay, Google Pay", "до 50 % скидки для вас у партнеров"]}'
                                ></div>
                                <div
                                        class="swiper-slide tariff-slider__slide"
                                        style="background-image:url(/assets/images/broker-deposit/tsb-mc-platinum.png)"
                                        data-card_info='{"title":"MasterCard Platinum PayPass","url":"https://www.transstroybank.ru/chastnym-klientam/bankovskie-karty/mastercard-platinum-paypass/","param":["Кэшбэк программа","до 5 % на остаток по картсчету","Услуга \"СМС-сервис\" бесплатно","Бесплатное снятие наличных в банкоматах по всему миру","Бесплатное пополнение с карт других банков на <a href=\"https://card2card.intervale.ru/transstroybank/\" target=\"_blank\">сайте Банка</a>","Сервис оплаты Google Pay"]}'
                                ></div>
                                <div
                                        class="swiper-slide tariff-slider__slide"
                                        style="background-image:url(/assets/images/broker-deposit/tsb-v-gold.png)"
                                        data-card_info='{"title":"Visa Gold PayWave","url":"https://www.transstroybank.ru/chastnym-klientam/bankovskie-karty/visa-gold/","param":["Кэшбэк программа","до 5 % на остаток по картсчету","Сервисы оплаты Apple Pay, Samsung Pay, Garmin Pay, Google Pay","до 50 % скидки для вас у партнеров", "Медицинская и юридическая поддержка по всему миру ISOS"]}'
                                ></div>
                                <div
                                        class="swiper-slide tariff-slider__slide"
                                        style="background-image:url(/assets/images/broker-deposit/tsb-mc-gold.png)"
                                        data-card_info='{"title":"MasterCard Gold PayPass","url":"https://www.transstroybank.ru/chastnym-klientam/bankovskie-karty/mastercard-gold/","param":["Кэшбэк программа","до 30 % скидки у 4 000 партнеров","до 5 % на остаток по картсчету","Бесплатное пополнение с карт других банков на <a href=\"https://card2card.intervale.ru/transstroybank/\" target=\"_blank\">сайте Банка</a>","Бесплатное снятие наличных в банкоматах по всему миру","Сервис оплаты Google Pay"]}'
                                ></div>
                                <div
                                        class="swiper-slide tariff-slider__slide"
                                        style="background-image:url(/assets/images/broker-deposit/tsb-mc-black.png)"
                                        data-card_info='{"title":"World MasterCard Black Edition","url":"https://transstroybank.ru/chastnym-klientam/bankovskie-karty/master-card-black-edition/","param":["Кэшбэк программа","LOUNGE KEY доступ в бизнес-залы","до 5 % на остаток по картсчету","Услуга \"СМС-сервис\" бесплатно", "Бесплатное снятие наличных в банкоматах по всему миру", "Комплексное страхование и круглосуточная консьерж служба", "Сервис оплаты Google Pay"]}'
                                ></div>
                            </div>
                        </div>
                        <div class="tariff-slider__arrows">
                            <div class="tariff-slider__arrow tariff-slider__prev">
                                <svg width="9" height="14" viewBox="0 0 9 14" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 13L8 7L0.999999 1" stroke="#62757E"/>
                                </svg>
                            </div>
                            <div class="tariff-slider__number"></div>
                            <div class="tariff-slider__arrow tariff-slider__next">
                                <svg width="9" height="14" viewBox="0 0 9 14" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 13L8 7L0.999999 1" stroke="#62757E"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="card-tariff__desc tariff-desc col-sm-8 offset-sm-2 col-md-6 offset-md-0 col-lg-7">
                        <h3 class="tariff-desc__title d-none d-md-block">Visa Platinum PayWave</h3>
                        <ul class="tariff-desc__ul">
                            <li class="tariff-desc__li">Кэшбэк программа</li>
                            <li class="tariff-desc__li">Страховой полис для выезжающих за рубеж бесплатно</li>
                            <li class="tariff-desc__li">до 5 % на остаток по картсчету</li>
                            <li class="tariff-desc__li">
								Бесплатное пополнение с карт других банков на <a href="https://card2card.intervale.ru/transstroybank/" target="_blank">сайте Банка</a>
                            </li>
                            <li class="tariff-desc__li">Сервисы оплаты Apple Pay, Samsung Pay, Garmin Pay, Google
                                Pay
                            </li>
                            <li class="tariff-desc__li">до 50 % скидки для вас у партнеров</li>
                        </ul>
                        <a
                                href="https://www.transstroybank.ru/chastnym-klientam/bankovskie-karty/visa-platinum-pay-wave/"
                                class="tariff-desc__link"
                        >
                            Подробнее
                            <svg width="9" height="14" viewBox="0 0 9 14" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 13L8 7L0.999999 1" stroke="#62757E"/>
                            </svg>
                        </a>
                    </div>
                </div*/?>
                <div class="card-tariff__order">
                    <a class="card-tariff__button" href="#vaultRequestCashback" data-fancybox>Оформить карту</a>
                    <p>
                        Ознакомиться с полными условиями программы можно
                        <a href="https://www.transstroybank.ru/zagruzka/%D0%9F%D1%80%D0%BE%D0%B3%D1%80%D0%B0%D0%BC%D0%BC%D0%B0%20%D0%BB%D0%BE%D1%8F%D0%BB%D1%8C%D0%BD%D0%BE%D1%81%D1%82%D0%B8.pdf"
                           target="_blank" class="link__gold">здесь</a>.
                    </p>
                </div>
            </div>
        </section>
    </div>
</div>
<div class="popup-form" id="vaultRequestCashback">
	<?$APPLICATION->IncludeComponent(
		"webtu:feedback",
		"card",
		Array(
			"ADMIN_EVENT" => "WEBTU_FEEDBACK_CARD_ADMIN",
			"AJAX_MODE" => "Y",
			"AJAX_OPTION_ADDITIONAL" => "",
			"AJAX_OPTION_HISTORY" => "N",
			"AJAX_OPTION_JUMP" => "N",
			"AJAX_OPTION_STYLE" => "N",
			"EVENT_CALLBACK" => function($post){if($post['SEX']=='Мужской'){$post['RECOURSE']='Уважаемый';}else{$post['RECOURSE']='Уважаемая';}return$post;},
			"IBLOCK_ID" => "11",
			"POST_CALLBACK" => function($post){if(!isset($post['CITYZENSHIP'])){$post['CITYZENSHIP']='Нет';}else{$post['CITYZENSHIP']='Да';}if(!empty($post['FIRST_NAME'])){$post['NAME']=$post['LAST_NAME'].' '.$post['FIRST_NAME'].' '.$post['SECOND_NAME'];}return$post;},
			"PROPERTIES" => array("BIRTHDATE","SEX","PHONE","EMAIL","CITY","CITYZENSHIP","TYPE","CARD_SUMM","CARD_CURRENCY"),
			"SITES" => array("s1"),
			"USER_EVENT" => "WEBTU_FEEDBACK_CARD_USER"
		)
	);?>
</div>
<script src="/assets/js/script-broker-deposit.js?v=1.0.2"></script>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>