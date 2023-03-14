import $ from 'jquery';
import 'jquery-ui/dist/jquery-ui.min.js'

$( document ).ready(() => {
    const office = $( '#office' );
    const room = $( '.room' )
    const userBlob = $( '#user' );

    room.droppable({
        accept: userBlob,
        over: function(e) {
            $(this).addClass('hovering');
        },
        out: function(e) {
            $(this).removeClass('hovering');
        },
        drop: function(e) {
            console.log($(this).attr('class'));
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
