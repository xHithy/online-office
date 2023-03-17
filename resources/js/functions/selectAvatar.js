import $ from 'jquery';

export const selectAvatar = ( avatar ) => {
    //Reset all avatar icons
    $( '.avatar' ).attr('class', 'avatar')

    let id = $( avatar ).attr('id');
    $('#avatar_id').val(id);
    $( avatar ).attr('class', 'avatar selected');
}

