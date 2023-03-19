import $ from 'jquery';
import 'jquery-ui/dist/jquery-ui.min.js'
import { moveBlob } from "./functions/moveBlob";

$( document ).ready(() => {
    const office = $( '#office' );
    const room = $( '.room' )
    const userBlob = $( '#user' );

    room.droppable({
        accept: userBlob,
        over: function(e) {
            let id = $(this).attr('id');
            office.find(`.room[id=${id}]`).addClass('hovering');
        },
        out: function(e) {
            let id = $(this).attr('id');
            office.find(`.room[id=${id}]`).removeClass('hovering');
        },
        drop: function(e) {
            let id = $(this).attr('id');
        }
    });

    userBlob.draggable({
        containment: office,
        snap: room,
        snapTolerance: 30,
        stop: function(e) {
            let posX = (parseInt(userBlob.css('left')) / office.width()) * 100;
            let posY = (parseInt(userBlob.css('top')) / office.height()) * 100;
            moveBlob(posX, posY);
        }
    });
});
