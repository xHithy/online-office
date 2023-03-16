import $ from 'jquery';
import 'jquery-ui/dist/jquery-ui.min.js'

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
            console.log(id);
        }
    });

    userBlob.draggable({
        containment: office,
        snap: room,
        snapTolerance: 30,
        stop: function(e) {
            let blobTopLocation = parseInt(userBlob.css('top'));
            let blobLeftLocation = parseInt(userBlob.css('left'));
            console.log((blobTopLocation / office.height()) * 100);
            console.log((blobLeftLocation / office.width()) * 100);
        }
    });
});
