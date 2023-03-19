import $ from 'jquery';

export const moveBlob = (posX, posY) => {
    $.ajax({
        type: 'POST',
        url: '/api/v1/office/move',
        data: {
            posX:posX,
            posY:posY
        },
    });
}
