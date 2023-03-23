import $ from 'jquery';
import { createBlob } from "./createBlob";
import { joinRoom } from "./joinRoom";
import { loadChat } from "./loadChat";
import { updateRoomStatus } from "./updateRoomStatus";

export const loadAllBlobs = () => {
    console.log('Loading all blobs');
    const OFFICE = $( '#office' );
    $.ajax({
        type: 'GET',
        url: '/api/v1/office/locations',
        success: function(locations) {
            locations.colleagues.forEach(colleague => {
                // Load all colleague blobs
                let ID = colleague.id;
                let NAME = colleague.name;
                let AVATAR = colleague.avatar_id;
                let POS_X = colleague.posX;
                let POS_Y = colleague.posY;
                createBlob(ID, AVATAR, NAME);

                let BLOB = $( `.id-${ID}` );
                BLOB.css('left', parseInt(POS_X) + '%');
                BLOB.css('top', parseInt(POS_Y) + '%');
            });

            // Load the users blob/avatar
            let USER_BLOB = $( '#user' );

            let AVATAR = locations.user.avatar_id;
            let POS_X = locations.user.posX;
            let POS_Y = locations.user.posY;
            let ROOM_ID = locations.user.room_id;
            let USER_DATA = `<span>You</span><img src="/avatars/avatar-${AVATAR}.svg" alt=""/>`

            USER_BLOB.addClass(`id-${locations.user.id}`);
            window.USER_ID = locations.user.id;
            window.room_id = ROOM_ID;
            window.PREV_X = POS_X;
            window.PREV_Y = POS_Y;
            window.PREV_ROOM = ROOM_ID;

            joinRoom(window.room_id, ROOM_ID);
            loadChat(ROOM_ID);
            updateRoomStatus();

            $( USER_DATA ).appendTo( '#user' );
            $( USER_BLOB ).css('left', parseInt(POS_X) + '%');
            $( USER_BLOB ).css('top', parseInt(POS_Y) + '%');
            OFFICE.find(`.room[id=${ROOM_ID}]`).addClass('hovering');
        }
    });
}
