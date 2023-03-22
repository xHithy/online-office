import $ from 'jquery';

export const loadChat = (ROOM_ID) => {
    $.ajax({
        type: 'GET',
        url: `/api/v1/messages/${ROOM_ID}`,
        success: function(data) {
            let ROOM_DATA = data.room;
            let MESSAGES = data.messages;
            $( '#chat-title' ).html(ROOM_DATA.room);
            console.log(ROOM_DATA);
        }
    });
}
