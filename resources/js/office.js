import $ from 'jquery';
import 'jquery-ui/dist/jquery-ui.min.js'
import { registerBlobMove } from "./functions/registerBlobMove";
import { moveBlob } from "./functions/moveBlob";
import { createBlob } from "./functions/createBlob";
import { removeBlob } from "./functions/removeBlob";
import { sessionTime } from "./functions/sessionTime";

let USER_BLOB = $( '#user' );
const OFFICE = $( '#office' );
const ROOM = $( '.room' );

setInterval(() => {
    sessionTime();
}, 60000);

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
        registerBlobMove(POS_X, POS_Y, ROOM_ID);
    }
});

USER_BLOB.draggable({
    containment: OFFICE,
    snap: ROOM,
    snapTolerance: 30,
});

window.Echo.channel('office')
    .listen('MoveBlob', (response) => {
        moveBlob(response[0], response[1], response[2], response[3]);
    })
    .listen('CreateBlob', (response) => {
        createBlob(response[0], response[1], response[2]);
    })
    .listen('RemoveBlob', (response) => {
        removeBlob(response[0]);
    });

