import $ from 'jquery';
import {appendMessage} from "./appendMessage";

export const loadChat = (ROOM_ID) => {
    $.ajax({
        type: 'GET',
        url: `/api/v1/messages/${ROOM_ID}`,
        success: function(data) {
            let ROOM_DATA = data.room;
            let MESSAGES = data.messages;
            $( '#chat-title' ).html(ROOM_DATA.room);
            // Purge old room chat from UI
            $( '.chat .message-container' ).remove();
            $( '.chat .chat-notification' ).remove();
            MESSAGES.forEach(message => {
                appendMessage(message.author.name, message.message);
            });
        }
    });
}
