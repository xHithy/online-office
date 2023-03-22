import $ from 'jquery';

export const updateRoomStatus = () => {
    $.ajax({
       type: 'GET',
       url: '/api/v1/office/status',
       success: function( ROOMS ) {
           const LIST = $( '.room-container' );
           LIST.html('');
           ROOMS.forEach(ROOM => {
               LIST.append(`` +
                   `<div class="single-room flex jc-sb gap" data-id="${ROOM.id}">` +
                       `<span> ${ROOM.room} </span>` +
                       `<span class="room-capacity"> ${ROOM.users_in} / ${ROOM.limit} </span>` +
                   `</div>` +
               ``)
               ROOM.users.forEach(user => {
                  console.log(user);
               });
           });
       }
    });
}
