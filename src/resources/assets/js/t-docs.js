import hljs from 'highlight.js';
hljs.highlightAll();

window.addEventListener('src-opened', event => {
    hljs.highlightAll();
})