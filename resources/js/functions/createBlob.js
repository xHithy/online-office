import $ from 'jquery';

/*
    Scenario: User A is the only one in the office;
    User B creates an account and joins the office;
    This function is called by a listener;
    This function creates a blob of the new user for the already active user A
*/
export const createBlob = (USER_ID, AVATAR_ID, USERNAME) => {
    let BLOB = $(`<div class="colleague id-${USER_ID}" id="${USER_ID}"><span>${USERNAME}</span><img src="/avatars/avatar-${AVATAR_ID}.svg" alt=""/></div>`).hide().fadeIn(300);
    $( '#office' ).append(BLOB);
}
