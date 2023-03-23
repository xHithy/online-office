import { appendMessage } from "./appendMessage";
import { appendChatNotification } from "./appendChatNotification";
import { updateRoomStatus } from "./updateRoomStatus";

export const joinRoom = (PREVIOUS_ROOM_ID, NEW_ROOM_ID) => {
    window.Echo.leaveChannel('chat.' + PREVIOUS_ROOM_ID);
    window.Echo.channel('chat.' + NEW_ROOM_ID)
        .listen('JoinChat', (response) => {
            // Ignore default room events
            updateRoomStatus();
            appendChatNotification(response[0], 'joined');
        })
        .listen('LeaveChat', (response) => {
            // Ignore default room events
            updateRoomStatus();
            appendChatNotification(response[0], 'left');
        })
        .listen('SendMessage', (response) => {
            appendMessage(response[0], response[1]);
        });

    // Set new room as global room
    window.room_id = NEW_ROOM_ID;
}
