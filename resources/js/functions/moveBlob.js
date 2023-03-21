import $ from 'jquery';

export const moveBlob = (POS_X, POS_Y, BLOB_ID, ROOM_ID) => {
    let BLOB = $( `.id-${BLOB_ID}` );
    BLOB.css('left', parseInt(POS_X) + '%');
    BLOB.css('top', parseInt(POS_Y) + '%');
}
