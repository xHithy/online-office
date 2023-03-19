import $ from 'jquery';

export const loadAllBlobs = () => {
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
                OFFICE.append(`<div class="colleague" id="${ID}"><span>${NAME}</span><img src="/avatars/avatar-${AVATAR}.svg" alt=""/></div>`);

                let BLOB = $( '.colleague[id=' + ID + ']' );
                BLOB.css('left', parseInt(POS_X) + '%');
                BLOB.css('top', parseInt(POS_Y) + '%');
            });

            // Load the users blob/avatar
            let USER_BLOB = $( '#user' );

            let AVATAR = locations.user.avatar_id;
            let POS_X = locations.user.posX;
            let POS_Y = locations.user.posY;
            let USER_DATA = `<span>You</span><img src="/avatars/avatar-${AVATAR}.svg" alt=""/>`

            $( USER_DATA ).appendTo( '#user' );
            $( USER_BLOB ).css('left', parseInt(POS_X) + '%');
            $( USER_BLOB ).css('top', parseInt(POS_Y) + '%');
        }
    });
}
