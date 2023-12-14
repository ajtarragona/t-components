// import Quill from 'quill';

// import Toolbar from 'quill/modules/toolbar';
// import Snow from 'quill/themes/snow';

// import Bold from 'quill/formats/bold';
// import Italic from 'quill/formats/italic';
// import Header from 'quill/formats/header';


// Quill.register({
//   'modules/toolbar': Toolbar,
//   'themes/snow': Snow,
//   'formats/bold': Bold,
//   'formats/italic': Italic,
//   'formats/header': Header
// });

// import Trix from "trix"


document.addEventListener('alpine:init', () => {
    Alpine.data('tTextEditorComponent', (config) => ({
        
        instance: null,
        placeholder: config.placeholder?? null,
        bubble: config.bubble?? false,
        value:config.value?? null,
        readonly:config.readonly?? false,
        toolbar:config.toolbar ?? 'simple',
        toolbars:{
            mini: ['bold', 'italic', 'underline', 'strike'],
            simple: [
                [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
                [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
                [{ 'align': [] }],
                ['clean']                                         // remove formatting button
            ],
            advanced: [
                [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
                ['blockquote', 'code-block'],

                [{ 'header': 1 }, { 'header': 2 }],               // custom button values
                [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
                [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
                [{ 'direction': 'rtl' }],                         // text direction

                [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown

                [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
                [{ 'font': [] }],
                [{ 'align': [] }],

                ['clean']                                         // remove formatting button
            ],
            
        },
        theme: config.bubble?'bubble':'snow',

        init: function() {
            var d=this;
            // this.refresh();
            // console.log("init texteditor", this );
            d.instance =new Quill(d.$refs['q-editor'], {
                theme: d.theme,
                placeholder: d.placeholder,
                modules: {
                    toolbar:  d.toolbars[d.toolbar]
                },
                readOnly: d.readonly
                
            });
            // console.log('value',d.value);
            d.$refs['q-input'].value = d.value;
            // d.instance.setText(d.value);
            // d.instance.container.firstChild.innerHTML;

            d.instance.on('text-change', function(delta, oldDelta, source) {
                // console.log(d.instance.container.firstChild.innerHTML)
                d.$refs['q-input'].value = d.instance.container.firstChild.innerHTML;
                d.value=d.instance.container.firstChild.innerHTML;
            });
        }

        // clear: function() {
        //     // this.$refs['input'].value = '';
        //     // if(this.$refs['input']._x_model) this.$refs['input']._x_model.set('');
        //     // this.hasValue=false;
        //     // this.$refs['input'].dispatchEvent(new Event('change', { 'bubbles': true }));
        //     this.refresh();
        // },
        // refresh: function() {
        //     // this.checkValue();
        //     // this.getInputLength();
        // },
        // checkValue: function() {
        //     // if(this.$refs['input'].value != '') this.hasValue=true;
        //     // else this.hasValue=false;
        // },
        
    }));
})

