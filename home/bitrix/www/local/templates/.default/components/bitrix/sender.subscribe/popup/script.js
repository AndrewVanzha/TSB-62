/*-----------------------------------------------------*/
/* SubmitClick */
/*-----------------------------------------------------*/
if(typeof ComplianceDispatchOnchange != 'function') {
    function ComplianceDispatchOnchange(element) {
        if( $(element).prop('checked') ){
            $(".subscribeSave-wrapper").removeClass('block-disabled');
        }else{
            $(".subscribeSave-wrapper").addClass('block-disabled');
        }
    }
}