import $ from 'jquery';
import { joinRoom } from "./joinRoom";

export const registerBlobMove = (POS_X, POS_Y, ROOM_ID) => {
    $.ajax({
        type: 'POST',
        url: '/api/v1/office/move',
        data: {
            posX: POS_X,
            posY: POS_Y,
            room: ROOM_ID
        },
    });
    joinRoom(window.room_id, ROOM_ID);
}
