import $ from 'jquery';
import { joinRoom } from "./joinRoom";
import { loadChat } from "./loadChat";
import { moveBlob } from "./moveBlob";

export const registerBlobMove = (POS_X, POS_Y, ROOM_ID) => {
    $.ajax({
        type: 'POST',
        url: '/api/v1/office/move',
        data: {
            posX: POS_X,
            posY: POS_Y,
            room: ROOM_ID
        },
        success: function(response) {
            const OFFICE = $( '#office' );
            if(response.success === 'full') {
                alert('Room is full');
                moveBlob(window.PREV_X, window.PREV_Y, window.USER_ID);
                // Remove hover from the room that was full
                OFFICE.find(`.room[id=${ROOM_ID}]`).removeClass('hovering');
                // Add back hover effect to the room user was previously in
                OFFICE.find(`.room[id=${window.PREV_ROOM}]`).addClass('hovering');
            } else {
                joinRoom(window.room_id, ROOM_ID);
                loadChat(ROOM_ID);
                window.PREV_X = POS_X;
                window.PREV_Y = POS_Y;
                window.PREV_ROOM = ROOM_ID;
            }
        }
    });
}
