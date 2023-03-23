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
                    `<div class="single-room flex col jc-sb gap" data-id="${ROOM.id}">` +
                        `<div class="flex jc-sb gap">` +
                            `<span> ${ROOM.room} </span>` +
                            `<span class="room-capacity"> ${ROOM.users_in} / ${ROOM.limit} </span>` +
                        `</div>` +
                        `<div class="user-list flex col" data-id="${ROOM.id}"></div>` +
                    `</div>` +
                ``)
                ROOM.users.forEach(user => {
                    $( `.user-list[data-id=${ROOM.id}]` ).append(`` +
                        `<span><img src="/avatars/avatar-${user.avatar_id}.svg" alt=""/>${user.name}</span>` +
                    ``)
                });
            });
        }
    });
}
