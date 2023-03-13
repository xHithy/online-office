import $ from 'jquery';

export const loadAvatars = () => {
    const avatarCount = 19;
    const avatarContainer = $('#avatar-container');

    // Loop through all the avatars
    for(let i = 1; i < avatarCount; i++) {
        avatarContainer.append('<img class="avatar" src="/avatars/avatar-' + i + '.svg" alt="" onclick="selectAvatar(this)"/>')
    }

}
