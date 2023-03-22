import $ from 'jquery';
import { joinRoom } from "./joinRoom";
import {loadChat} from "./loadChat";

export const registerBlobMove = (POS_X, POS_Y, ROOM_ID) => {
    $.ajax({
        type: 'POST',
        url: '/api/v1/office/move',
        data: {
            posX: POS_X,
            posY: POS_Y,
            room: ROOM_ID
        },
        success: function() {
            joinRoom(window.room_id, ROOM_ID);
            loadChat(ROOM_ID);
        }
    });
}
