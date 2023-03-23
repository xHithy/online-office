import $ from 'jquery';
import { timeDifference } from "./timeDifference";

export const sessionTime = () => {
    let CURRENT_TIME = Math.floor(Date.now() / 1000);
    $.ajax({
        type: 'GET',
        url: '/api/v1/auth/session',
        success: function ( SESSION_START ) {
            let SESSION_LENGTH = timeDifference(SESSION_START, CURRENT_TIME);
            console.log(SESSION_LENGTH);
            let TIME_CONTAINER = $('.session-length');
            TIME_CONTAINER.html('');
            TIME_CONTAINER.append(`Working for <b class="time">${SESSION_LENGTH._data.hours}h ${SESSION_LENGTH._data.minutes}min</b>`);
        }
    });
}
