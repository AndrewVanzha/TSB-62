$(document).ready(function () {
    function requiredFields() {
        var arFields = [
            'input[name="NAME"]',
            'input[name="PHONE"]',
            'input[name="CAPTCHA_WORD"]',
            //'input[name="EMAIL"]',
        ];

        var countErr = 0;

        arFields.forEach(function (value) {
            if ($(value).val() == '') {
                $(value).parent().addClass("is-error");
                countErr++;
            } else {
                $(value).parent().removeClass("is-error");
            }
        });

        return (countErr > 0) ? false : true;
    }

    $('#fNewTariffsForm').submit(function (e) {
        e.preventDefault();
        //console.log('submit='+$("#politics").prop("checked"));
        if ($("#politics").prop("checked")) {
            $('#politics').parent().parent().removeClass("is-error");
            //console.log('requiredFields=');
            //console.log(requiredFields());
            if (requiredFields()) {
                //console.log('if');
                //console.log($(this));
                $.ajax({
                    type: "POST",
                    url: '/local/templates/v21_template_home/components/webtu/feedback/accept_new_tariffs/ajax.customer.php',
                    data: {
                        'fields': $(this).serialize(),
                    },
                    dataType: "json",
                    success: function (data) {
                        $('#reloadCaptcha').click();

                        if (data.message && data.message.length > 0) {
                            $(".v21_alert_fNewTariffsForm_item").remove()
                            $.each(data.message, function (key, field) {
                                $('#v21_alert_fNewTariffsForm .v21-modal__window').append(
                                    '<div class="v21-grid__item v21_alert_fNewTariffsForm_item" style="font-size: 20px; padding: 0; text-align: center;">' + field.text + '</div>'
                                );

                                if (!field.type) {
                                    $('.v21_alert_fNewTariffsForm_item').css("color", "red");
                                }
                            });
                        }
                        if (data.status) {
                            $("#fNewTariffsForm")[0].reset();
                        }

                        if (!data.captcha){
                            $('input[name="CAPTCHA_WORD"]').parent().addClass("is-error");
                        } else {
                            $('input[name="CAPTCHA_WORD"]').parent().removeClass("is-error");
                            tsb21.modal.toggleModal('v21_alert_fNewTariffsForm');
                        }
                    }
                });
            }
        } else {
            $('#politics').parent().parent().addClass("is-error");
        }
    });

    //$('a[href="#v21_depositOrder"].open').click(function () {
    //    $('input#CREDIT_NAME').val($(this).data('name'));
    //});

    /*$('#reloadCaptcha').click(function () {
        $.getJSON('/local/components/webtu/feedback/reload_captcha.php', function (data) {
            $('#captchaImg').attr('src', '/bitrix/tools/captcha.php?captcha_sid=' + data);
            $('#captchaSid').val(data);
        });
        return false;
    });*/
});
