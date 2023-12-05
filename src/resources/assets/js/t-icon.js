// import Iconpicker from 'codethereal-iconpicker'
/**
 * Script para extraer bootstrap icons
 * 
 * JSON.stringify(Array.prototype.map.call(document.querySelectorAll('#icons-list > li'),(item)=>{
    //return item.querySelector('.bi').getAttribute('class');
    return 'bi-'+item.dataset.name;
    return {
        name:item.dataset.name,
        class:item.querySelector('.bi').getAttribute('class')
    };//return item.attribute('data-name');
}));
}));
 */

document.addEventListener('alpine:init', () => {
    Alpine.data('tIconPicker', (config) => ({
        value: config.value ?? null,
        allowClear: config.allowClear ?? false,
        hasValue: false,
        value: null,
        instance :null,
        icon:config.icon??null,
        search:config.search ?? false,
        term:null,
        icons:[],
        options:[],
        open:false,
        isLoading:false,
        btnClass: config.class ?? '',
        outerClass: config.outerClass ?? '',
        width: config.width ?? false,
        name: config.name ?? false,
        id: config.id ?? false,
        color: config.color ?? 'default',
        size: config.size ?? 'md',
        placeholder: config.placeholder ?? 'Choose icon...',
        layout: config.layout ?? 'list',

        clear: function() {
            this.hasValue=false;
            this.value=null;
            this.$refs['icon-input'].value=null;
            this.$refs['dropdown-btn'].value=null;
            
        },
        openDropdown(){
            this.open=true;
        },
        closeDropdown(){
            this.open=false;
            this.term=null;
        },
        select(value){
            this.value=value;
            this.$refs['icon-input'].value=value;
            this.hasValue=true;
            this.closeDropdown();
        },
        isSelected: function(value){
            return value==this.value;
        },
        btnClasses: function(){
            let ret=[this.btnClass];
            
            // if(this.open) ret.push('active');
            if(this.disabled) ret.push('disabled');
            if(!this.width){
                ret.push('w-100');
            }

            ret.push('btn-'+this.color);
            ret.push('btn-'+this.size);
            return ret.join(" ");
        },
        async init() {
            var d=this;
            this.isLoading=true;
            // d.instance = new Iconpicker(this.$refs['icon-input'],{});
            const response = await fetch('https://unpkg.com/codethereal-iconpicker@1.2.1/dist/iconsets/bootstrap5.json')
            this.icons= await response.json()

            this.isLoading=false;
            
            var btn= this.$refs['dropdown-btn'];
            
          
            btn.addEventListener('shown.bs.dropdown', event => {
                event.target.classList.remove('show');
                d.openDropdown();
            });

            this.options=await this.icons;

            this.$watch('term', (function(values) {
                // console.log(d.icons, d.term);
                d.options=d.icons.filter(function(icon){
                    if(d.term){ 
                       return icon.toLowerCase().includes(d.term.toLowerCase())
                    }
                    return true;
                });
                
            }));
        }
    }))
});