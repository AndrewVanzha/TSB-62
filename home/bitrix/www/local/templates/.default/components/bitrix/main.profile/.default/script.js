$(window).load(function() {

    $('#add-input').click(function() {
        // evt.preventDefault();
        $('#box').append('<label class="file-box"> \
            <input type="hidden" name="UF_DOCUMENTS_old_id[]" value=""> \
            <input name="UF_DOCUMENTS[]" size="0" type="file" style="visibility: hidden; position: absolute;"> \
            <span class="cap">Выбрать</span> \
            </label> \
        ');
    });


    $('.file-box input').change(function() {
        $(this).siblings('.cap').html($(this).val().replace(/.+[\\\/]/, ''));
    });


    $("body").on("change", ".file-box input", function () {
        $(this).siblings('.cap').html($(this).val().replace(/.+[\\\/]/, ''));
    });

});