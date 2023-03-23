import $ from 'jquery';
import './bootstrap';
import '../css/main.scss';
import './functions/selectAvatar';
import './office';
import './functions/sendMessage';

// Functions
import { loadAvatars } from "./functions/loadAvatars";
import { selectAvatar } from "./functions/selectAvatar";
import { loadAllBlobs } from "./functions/loadAllBlobs";
import { sessionTime } from "./functions/sessionTime";

window.selectAvatar = selectAvatar;

$( document ).ready(() => {
    loadAvatars();
    loadAllBlobs();
    sessionTime();
});
