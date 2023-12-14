window._ = require("lodash");
import "bootstrap";

import "./nightmode";

import "./t-modal";
import "./t-text";
import "./t-texteditor";
import "./t-select";
import "./t-date";
import "./t-icon";
import "./livewire";

var Turbolinks = require("turbolinks");
Turbolinks.start();

const flatpickr = require("flatpickr");

window.bootstrap =require("bootstrap");

// const quilljs = require("quill");

var detectOnTop=function(){
    // console.log('detectOnTop',document.documentElement.scrollTop);
    if (document.documentElement.scrollTop > 0 ) {
        document.body.classList.remove('on-top');
    }else{
        document.body.classList.add('on-top');

    }
}


window.addEventListener("scroll", detectOnTop);

window.addEventListener('DOMContentLoaded', () => {
    
    detectOnTop();
});