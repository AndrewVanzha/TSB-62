$(document).ready(function () {
    function requiredFields() {
        let arFields = [
            'input[name="check_date"]',
            'input[name="check_start_time"]',
            'input[name="check_finish_time"]',
            //'input[name="check_office"]',
            'select[name="check_office"]',
            'input[name="check_fio"]',
        ];
        let arRadioFields = [
            'input[name="check_question_1"]',
            'input[name="check_question_2"]',
            'input[name="check_question_3"]',
            'input[name="check_question_4"]',
            'input[name="check_question_5"]',
            'input[name="check_question_6"]',
            //'input[name="check_question_7"]',
            //'input[name="check_question_8"]',
        ];

        let countErr = 0;
        let error_list = [];
        //console.log('(value).val()=');
        arFields.forEach(function (value) {
            if ($(value).val() == '' || $(value).val() == 'Дополнительный офис') {  // myString.replace(/[^\w\s!?]/g,'');
                //console.log($(value));
                //console.log($(value).val());
                $(value).parent().addClass("vs-form__error");
                countErr += 1;
                error_list.push($(value));
            } else {
                //console.log('checked');
                //console.log($(value));
                //console.log($(value).val());
                $(value).parent().removeClass("vs-form__error");
            }
        });

        if(badTimeString('input[name="check_start_time"]')) { // защита от часов > 24, минут > 60
            countErr += 1;
            $('input[name="check_start_time"]').parent().addClass("vs-form__error");
            error_list.push($('input[name="check_start_time"]'));
        } else {
            $('input[name="check_start_time"]').parent().removeClass("vs-form__error");
        }
        if(badTimeString('input[name="check_finish_time"]')) {
            countErr += 1;
            $('input[name="check_finish_time"]').parent().addClass("vs-form__error");
            error_list.push($('input[name="check_finish_time"]'));
        } else {
            $('input[name="check_finish_time"]').parent().removeClass("vs-form__error");
        }

        arRadioFields.forEach(function (value) {
            if ($(value).is(':checked')) {
                //console.log('checked');
                //console.log($(value));
                //console.log($(value).val());
                //console.log($(value+':checked').closest('label').text());
                $(value).parent().parent().removeClass("vs-form__error");
            } else {
                let text = $('input[name="radio"]:checked').closest('label').text();
                //console.log($(value));
                //console.log($(value+':checked').closest('label').text().replace(/[^\w\s!?]/g,''));
                $(value).parent().parent().addClass("vs-form__error");
                countErr += 1;
                error_list.push($(value));
            }
        });
        if(countErr > 0) { moveToError(error_list); }
        //console.log('countErr=' + countErr);

        return (countErr > 0) ? false : true;
    }

    function badTimeString(snode) {
        //console.log('time');
        let stime = $(snode).val();
        //console.log(stime);
        if(stime == '') {
            return true;
        }
        let hours = parseInt(stime.substring(0, 2));
        //console.log(hours);
        if(hours >= 24) {
            return true;
        } else {
            let minutes = parseInt(stime.substring(3, 5));
            //console.log(minutes);
            if(minutes >= 60) {
                return true;
            } else {
                return false;
            }
        }
    }

    function moveToError(error_list) {
        //console.log(error_list[0]);
        $('html, body').animate({
            scrollTop: $(error_list[0]).offset().top - 170
        }, {
            duration: 600,   // по умолчанию «400»
            easing: "linear" // по умолчанию «swing»
        });
        return true;
    }

    function clearFields () { // не подключен
        $('textarea').val('').css('box-shadow', 'none');
        $('input:not([type="hidden"])').val('').css('box-shadow', 'none');

        $('textarea').focusout(function () {
            $(this).css('box-shadow', '');
        });
        $('input').focusout(function () {
            $(this).css('box-shadow', '');
        });
    }

    $('#check-list-form').submit(function (e) {
        //console.log('check-list-form');
        e.preventDefault();
        if (requiredFields()) {
            //console.log('3');
            $.ajax({
                type: "POST",
                url: '/local/modules/inkass.service/process/manager.php',
                //contentType: "application/json; charset=utf-8",
                data: $(this).serialize(),
                dataType: "json",
                success: function (response) {
                    //console.log(response);
                    //console.log(response['check_id']);
                    document.location.href = "/inkass/finish.php?check_id=" + response['check_id'];
                },
                //error: function (response) {
                //    console.log(response);
                //    console.log('check-list-form error');
                //    console.log(response['error']);
                //},
                error: function (jqXHR, exception) {
                    console.log(jqXHR);
                    if (jqXHR.status === 0) {
                        console.log('Not connect. Verify Network.');
                    } else if (jqXHR.status == 404) {
                        console.log('Requested page not found (404).');
                    } else if (jqXHR.status == 500) {
                        console.log('Internal Server Error (500).');
                    } else if (exception === 'parsererror') {
                        console.log('Requested JSON parse failed.');
                    } else if (exception === 'timeout') {
                        console.log('Time out error.');
                    } else if (exception === 'abort') {
                        console.log('Ajax request aborted.');
                    } else {
                        console.log('Uncaught Error. ' + jqXHR.responseText);
                    }
                }
            });
        }
    });

    /*$('.js-vs-form__arrow').click(function () {
        console.log('click');
        //$(this).next('.vs-form__arrow').toggleClass('vs-form__arrow--transform');
        $(this).children('.vs-form__arrow').toggleClass('vs-form__arrow--transform');
    });*/

    $('.js-vs-form__warn').hover(
        function () {
            if($(this).hasClass('vs-form__error')) {
                $(this).find('.vs-form__warn').addClass('vs-form__warn--show');
            } else {
                $(this).find('.vs-form__warn').removeClass('vs-form__warn--show');
            }
        },
        function () { $(this).find('.vs-form__warn').removeClass('vs-form__warn--show'); }
    );

    $('#reload').click(function (e) {
        e.preventDefault();
        $.getJSON('/local/modules/inkass.service/process/reload-captcha.php', function (data) {
            $('#captchaImg').attr('src', '/bitrix/tools/captcha.php?captcha_sid=' + data);
            $('#captchaSid').val(data);
        });
        return false;
    });

    $('#daterange').daterangepicker({
        "autoApply": true,
        "startDate": moment().subtract(30, 'days').format('DD/MM/YYYY'),
        "endDate": moment().format('DD/MM/YYYY'),
        "maxDate": moment().format('DD/MM/YYYY'),
        "locale": {
            "format": "DD/MM/YYYY",
            "separator": " - ",
            "applyLabel": "Принять",
            "cancelLabel": "Отменить",
            "fromLabel": "От",
            "toLabel": "До",
            "customRangeLabel": "Пользовательский",
            "weekLabel": "W",
            "daysOfWeek": [
                "Вс",
                "Пн",
                "Вт",
                "Ср",
                "Чт",
                "Пт",
                "Сб"
            ],
            "monthNames": [
                "Январь",
                "Февраль",
                "Март",
                "Апрель",
                "Май",
                "Июнь",
                "Июль",
                "Август",
                "Сентябрь",
                "Октябрь",
                "Ноябрь",
                "Декабрь"
            ],
            "firstDay": 1
        }
    });

    $('.mask-time').mask('99:99');
});