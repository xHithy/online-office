import $ from 'jquery';

$( '.message-form' ).submit(function( event ) {
    event.preventDefault();
    let message = $( '.message-text' ).val();
    $.ajax({
        type: 'POST',
        url: '/api/v1/messages',
        data: {
            message: message,
            room_id: window.room_id,
        },
        success: function() {
            $( '.message-text' ).val('');
        }
    });
});
