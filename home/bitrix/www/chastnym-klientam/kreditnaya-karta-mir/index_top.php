<h1 class="v21-h1 v21-ved-section">Кредитная карта «Мир»</h1>
<div class="v21-section v21-section--border v21-ved-contracts__border" style="border-bottom: 1px solid #e4e5e5;">
    <div class="v21-ved-contracts__box">
        <div class="v21-ved-contracts__content">
            <div class="v21-ved-contracts__wrap">
                <h3 class="v21-ved-contracts__header">Бесплатная кредитная карта для сотрудников с зарплатным проектом от Трансстройбанка.</h3>
                <?/*?><p class="v21-ved-contracts__text">Условия: Быть новым клиентом и открыть валютный счёт до 31 мая.</p><?*/?>
            </div>
            <?/*?><h3 class="v21-h3 rko-banner__anno" style="color:#a58a57;font-size:16px;">* Воспользоваться сервисом дистанционного открытия счета возможно только в браузере Yandex</h3><?*/?>
            <a href="#fMirCardRequest" class="v21-ved-contracts__button v21-button js-mir-card-jump__button">
            <?/*?><a href="https://193.42.145.62/corporative-clients/bankovskoe-obsluzhivanie/raschetno-kassovoe-obsluzhivanie/" class="v21-ved-contracts__button v21-button"><?*/?>
            <?/*?><a href="#currencyAccountRequest" class="v21-ved-contracts__button v21-button"><?*/?>
                <span>Заказать карту</span>
            </a>
        </div>
        <div class="v21-ved-contracts__image v21-ved-contracts__image--dt">
            <?/*?><img src="/images/VED_Contracts.png" alt="Валютные контракты"><?*/?>
            <img src="/images/Creditcard_MIR_top.png" alt="Кредитная карта МИР">
        </div>
        <div class="v21-ved-contracts__image v21-ved-contracts__image--mobile">
            <img src="/images/Creditcard_MIR_top.png" alt="Кредитная карта МИР">
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('.js-mir-card-jump__button').on('click', function() {
            let href = $(this).attr('href');
            $('html, body').animate({
                scrollTop: $(href).offset().top - 120
            }, {
                duration: 800,   // по умолчанию «400»
                easing: "linear" // по умолчанию «swing»
            });
            return false;
        });
    });
</script>