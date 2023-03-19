import $ from 'jquery';
import 'jquery-ui/dist/jquery-ui.min.js'
import { moveBlob } from "./functions/moveBlob";

let USER_BLOB = $( '#user' );
const OFFICE = $( '#office' );
const ROOM = $( '.room' );

ROOM.droppable({
    accept: USER_BLOB,
    over: function() {
        let ROOM_ID = $(this).attr('id');
        OFFICE.find(`.room[id=${ROOM_ID}]`).addClass('hovering');
    },
    out: function() {
        let ROOM_ID = $(this).attr('id');
        OFFICE.find(`.room[id=${ROOM_ID}]`).removeClass('hovering');
    },
    drop: function() {
        let ROOM_ID = $(this).attr('id');
        let POS_X = (parseInt(USER_BLOB.css('left')) / OFFICE.width()) * 100;
        let POS_Y = (parseInt(USER_BLOB.css('top')) / OFFICE.height()) * 100;
        moveBlob(POS_X, POS_Y, ROOM_ID);
    }
});

USER_BLOB.draggable({
    containment: OFFICE,
    snap: ROOM,
    snapTolerance: 30,
});
