
document.addEventListener('alpine:init', () => {
    Alpine.data('tTextComponent', (config) => ({
        
        allowClear: config.allowClear ??false,
        allowInput: config.allowInput ??true,
        icon: config.icon??null,
        hasValue:false,
        maxlength:config.maxlength ??false,
        charCounter:config.charCounter ?? false,
        inputLength: 0,

        init: function() {
            
            this.refresh();

        },

        clear: function() {
            this.$refs['input'].value = '';
            if(this.$refs['input']._x_model) this.$refs['input']._x_model.set('');
            this.hasValue=false;
            this.$refs['input'].dispatchEvent(new Event('change', { 'bubbles': true }));
            this.refresh();
        },
        refresh: function() {
            this.checkValue();
            this.getInputLength();
        },
        checkValue: function() {
            if(this.$refs['input'].value != '') this.hasValue=true;
            else this.hasValue=false;
        },
        getInputLength: function() {
            this.inputLength= this.$refs['input'].value.length;
            return this.inputLength;
        }
    }));
})

