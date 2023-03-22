import $ from 'jquery';

export const appendMessage = ( NAME, MESSAGE ) => {
    const CHAT = $( '.chat' );
    CHAT.append(`` +
        `<div class="message-container">` +
            `<span class="message-author">${NAME}</span>` +
            `<span class="message-content">${MESSAGE}</span>` +
        `</div>` +
    ``);
}
