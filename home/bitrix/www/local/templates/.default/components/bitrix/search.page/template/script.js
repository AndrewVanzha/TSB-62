$(window).on('load', function(){
    searchQuery = $('#search_query').val();
    $('.cs-box_list li:first-child').on('click', function(){
        window.location = "/search/?q=" + searchQuery + "&where=&how=r";
    });
    $('.cs-box_list li:nth-child(2)').on('click', function(){
        window.location = "/search/?q=" + searchQuery + "&where=&how=d&sort=asc";
    });
    $('.cs-box_list li:nth-child(3)').on('click', function(){
        window.location = "/search/?q=" + searchQuery + "&where=&how=d&sort=desc";
    });
});