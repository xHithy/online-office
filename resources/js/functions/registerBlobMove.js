import $ from 'jquery';

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
}
