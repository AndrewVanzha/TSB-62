$(document).ready(function() {

   $('.buy').on('click', function() {

       var html = '<div id="loading_page"></div>';

       $('body').append(html);

       var href = $(this).attr('href');

       var xhr = new XMLHttpRequest();

       xhr.open('GET', href, false);

       xhr.send();
       if (xhr.status != 200) {
           return true;
       } else {
           $('#popup-pay').html();
           $('#popup-pay').html(xhr.response);

           $.fancybox.open({
               src  : '#popup-pay',
               type : 'inline',
               opts : {
                   onComplete : function() {
                       $('#loading_page').remove();
                   }
               }
           });
       }

       return false;

    });
});
