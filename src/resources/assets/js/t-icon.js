// import Iconpicker from 'codethereal-iconpicker'
/**
 * Script para extraer bootstrap icons
 * 
 * Current Bootstrap icons: v1.11.0
 * 
 * Run this script in console at page: https://icons.getbootstrap.com/
 * 
 JSON.stringify(Array.prototype.map.call(document.querySelectorAll('#icons-list > li'),(item)=>{
    //return item.querySelector('.bi').getAttribute('class');
    return 'bi-'+item.dataset.name;
    return {
        name:item.dataset.name,
        class:item.querySelector('.bi').getAttribute('class')
    };//return item.attribute('data-name');
}));
 */

const bootstrap_icons = require('./bootstrap-icons.json'); 

document.addEventListener('alpine:init', () => {
    Alpine.data('tIconPicker', (config) => ({
        value: config.value ?? null,
        allowClear: config.allowClear ?? false,
        // hasValue: false,
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
        height: config.height ?? false,
        name: config.name ?? false,
        id: config.id ?? false,
        color: config.color ?? 'default',
        size: config.size ?? 'md',
        placeholder: config.placeholder ?? 'Choose icon...',
        grid: config.grid ?? 'list',
        page:1,
        pagesize:50,
        grid:config.grid??false,
        allLoaded:false,
        iconSrc: {
            // bootstrap: 'https://unpkg.com/codethereal-iconpicker@1.2.1/dist/iconsets/bootstrap5.json'
            bootstrap:bootstrap_icons
        },
        clear: function() {
            // this.hasValue=false;
            this.value=null;
            if(this.$refs['icon-input']) this.$refs['icon-input'].value=null;
            this.$refs['dropdown-btn'].value=null;
            this.closeDropdown();
        },
        openDropdown(){
            this.open=true;
            document.documentElement.classList.add('select-opened');
                

        },
        prepareOptions(){
            var d=this;

            this.options = d.icons;
            if(d.term){ 
                this.options=this.options.filter(function(icon){
                   return icon.toLowerCase().includes(d.term.toLowerCase());
                });
            }
            this.options=this.options.slice(0, this.page*this.pagesize);
            
        },
        closeDropdown(){
            this.open=false;
            this.term=null;
            document.documentElement.classList.remove('select-opened');
                
        },
        selectIcon(value){
            // console.log('selectIcon ', value);
                
            this.value=value;
            if(this.$refs['icon-input']) this.$refs['icon-input'].value=value;
            // this.hasValue=true;
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
        loadMore(){
            
            if(this.page < (this.icons.length/this.pagesize) ){
                // console.log('loadMore', this.page, this.icons.length/this.pagesize);
                // console.log('load');
                this.page++;
                this.prepareOptions();
            }else{
                this.allLoaded=true;
            }
        },
        init() {
            var d=this;
           
            // console.log('init iconpicker',this.value);
            if(this.value){
                // console.log('hasvalue ', this.value);
                // this.hasValue=true;
            }
            var btn= this.$refs['dropdown-btn'];
            
          
            btn.addEventListener('shown.bs.dropdown', event => {
                event.target.classList.remove('show');
                d.openDropdown();
            });

            this.isLoading=true;
            
            
           
            if(this.grid){
                var tmp=this.grid.split('x');
                if(tmp.length==2 && parseInt(tmp[0]) && parseInt(tmp[1])){
                    this.grid={cols:parseInt(tmp[0]),rows:parseInt(tmp[1])};
                    this.height=(this.grid.rows*2.8)+"rem";
                    this.pagesize=this.grid.cols * this.grid.rows;
                }else{
                    this.grid=false;
                }
                // console.log(this.grid);
            }
            
            // CARREGO LES ICONES
           
            this.icons= sessionStorage.getItem("t-icons.bootstrap");
            if(this.icons){
                this.icons=JSON.parse(this.icons);
            }else{
                // const response = await fetch(this.iconSrc.bootstrap)
                // this.icons= await response.json();
                this.icons=this.iconSrc.bootstrap;
                sessionStorage.setItem("t-icons.bootstrap", JSON.stringify(this.icons));
            }
            
            this.isLoading=false;
            this.prepareOptions();

            this.$watch('term', (function(values) {
                d.page=1;
                // console.log('term changed');
                d.prepareOptions();
            }));
            //     // console.log(d.icons, d.term);
            //     d.options = d.icons.filter(function(icon){
            //         if(d.term){ 
            //            var options = icon.toLowerCase().includes(d.term.toLowerCase());
            //            d.page=1;
            //            d.prepareOptions(options);
            //         }
            //         return true;
            //     });
                
            // }));
        }
    }))
});