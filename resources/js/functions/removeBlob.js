import $ from 'jquery';

export const removeBlob = (USER_ID) => {
    $( `.id-${USER_ID}` ).fadeOut("slsaow", function(){
        $(this).remove();
    })
}
