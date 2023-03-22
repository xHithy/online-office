import $ from 'jquery';

export const appendChatNotification = (USER, ACTION) => {
    const CHAT = $( '.chat' );
    CHAT.append(`` +
        `<div class="chat-notification">` +
            `${USER} has ${ACTION} the room` +
        `</div>` +
    ``);
}
