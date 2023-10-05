$(window).load(function(){
    // --------------------------------------- //
    // TIMER //
    // --------------------------------------- //
    function updateTimer($_obj){
        var currentDate = Date.parse(new Date());
        var endDate = $_obj.data('time') * 1000;

        if ( (endDate - currentDate) <= 0 ) return false;
        var leftTime = (endDate - currentDate) / 1000;

        var leftDays = parseInt(leftTime / 86400);
        leftTime = leftTime % 86400;

        var leftHours = parseInt(leftTime / 3600);
        leftTime = leftTime % 3600;

        var leftMinutes = parseInt( leftTime / 60);
        var leftSeconds = parseInt(leftTime % 60);

        var leftSeconds_1 = leftSeconds / 10 >> 0;
        var leftSeconds_2 = leftSeconds % 10;
        var leftMinutes_1 = leftMinutes / 10 >> 0;
        var leftMinutes_2 = leftMinutes % 10;
        var leftHours_1 = leftHours / 10 >> 0;
        var leftHours_2 = leftHours % 10;
        var leftDays_1 = leftDays / 10 >> 0;
        var leftDays_2 = leftDays % 10;

        $_obj.html( leftDays_1 + '' + leftDays_2 + ' д ' + leftHours_1 + '' + leftHours_2 + ':' + leftMinutes_1 + '' + leftMinutes_2 + ':' + leftSeconds_1 + '' + leftSeconds_2);

        return false;
    }


    updateTimer($(".timer-lot"));

    setInterval(function(){
        updateTimer($(".timer-lot"));
    }, 1000);




});

