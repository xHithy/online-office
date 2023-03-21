export const joinRoom = (PREVIOUS_ROOM_ID, NEW_ROOM_ID) => {
    window.Echo.leaveChannel('chat.' + PREVIOUS_ROOM_ID);
    window.Echo.channel('chat.' + NEW_ROOM_ID)
        .listen('JoinChat', (response) => {
            // Ignore default room events
            if(parseInt(response[1]) !== 1) {
                console.log(response[0] + ' has joined the room');
            }
        })
        .listen('LeaveChat', (response) => {
            // Ignore default room events
            if(parseInt(response[1]) !== 1) {
                console.log(response[0] + ' has left the room');
            }
        });

    // Set new room as global room
    window.room_id = NEW_ROOM_ID;
}
