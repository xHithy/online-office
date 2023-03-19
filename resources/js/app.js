import $ from 'jquery';
import './bootstrap';
import '../css/main.scss';
import './functions/selectAvatar';
import './office';

// Functions
import { loadAvatars } from "./functions/loadAvatars";
import { selectAvatar } from "./functions/selectAvatar";
import { loadAllBlobs } from "./functions/loadAllBlobs";

window.selectAvatar = selectAvatar;

$( document ).ready(() => {
    loadAvatars();
    loadAllBlobs()
});
