import $ from 'jquery';
import './bootstrap';
import '../css/main.scss';
import './functions/selectAvatar';

// Functions
import { loadAvatars } from "./functions/loadAvatars";
import { selectAvatar } from "./functions/selectAvatar";

window.selectAvatar = selectAvatar;

$( document ).ready(() => {
    loadAvatars();
});
