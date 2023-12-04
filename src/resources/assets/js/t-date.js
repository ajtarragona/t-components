import labelPlugin from 'flatpickr/dist/plugins/labelPlugin/labelPlugin'

document.addEventListener('alpine:init', () => {
    Alpine.data('tDate', (config) => ({
        value: config.value ?? null,
        native: config.native ?? false,
        allowClear: config.allowClear ?? false,
        hasValue: false,
        instance :null,
        clear: function() {
            this.hasValue=false;
            this.value=null;
            this.instance.clear();
        },
        init: function() {
            var d=this;
            if(!this.native){
                // console.log('init Date picker', this.$refs['date-input']);//, this.$refs['date-input'].dataset);
                if(this.$refs['date-input']){
                    var val=this.value;
                    if(this.value){
                        this.hasValue=true;
                        if(Array.isArray(this.value)){
                            val=Object.values(this.value);
                        }
                    }
                    d.instance = flatpickr(this.$refs['date-input'],{
                        defaultDate: val,
                        plugins: [labelPlugin()],
                        onOpen: function(selectedDates, dateStr, instance) { d.focused=true },
                        onClose: function(selectedDates, dateStr, instance) { d.focused=false },

                    });
                }
                if(this.$refs['date-input']){
                    this.$refs['date-input'].addEventListener('change', function(e){
                        // console.log('changed',e,d);
                        // console.log(e.target.value);
                        d.value=e.target.value;
                        if(d.value) d.hasValue=true;
                        else d.hasValue=false;
                    })
                }
            }
        }
    }))
});