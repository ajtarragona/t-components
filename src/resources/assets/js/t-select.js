
document.addEventListener('alpine:init', () => {
    Alpine.data('tSelectComponent', (config) => ({
        data: config.data ?? [],
        open: false,
        size: config.size ?? 'md',
        term: '',
        search: config.search ?? false,
        inlineSearch: config.inlineSearch ?? false,
        options: {},
        placeholder: config.placeholder,
        emptyOptionsMessage: config.emptyOptionsMessage || 'No results match your search.',
        searchPlaceholder: config.searchPlaceholder || 'Type to search...',
        loadingMessage: config.loadingMessage || 'Loading...',
        selected: config.selected,
        multiple: config.multiple,
        currentIndex: -1,
        isLoading: true,
        isLoaded: true,
        disabled: config.disabled || false,
        readonly: config.readonly || false,
        limit: config.limit ?? 20,
        color: config.color ?? 'default',
        icon: config.icon ?? null,
        allowClear: config.allowClear || false,
        selectedLabelLimitText: config.selectedLabelLimitText || 'and :num more...',
        selectedLabelLimit: config.selectedLabelLimit || false,
        selectedLabelGlue: config.selectedLabelGlue ?? ', ',
        selectedLabelPrefix: config.selectedLabelPrefix ?? '',
        selectedLabelSufix: config.selectedLabelSufix ?? '',
        btnClass: config.class ?? '',
        outerClass: config.outerClass ?? '',
        width: config.width ?? false,
        name: config.name ?? false,
        id: config.id ?? false,
        dataSrc: config.dataSrc ?? null,
        dataSrcMethod: config.dataSrcMethod ?? 'get',
        dataSrcParams: config.dataSrcParams ?? {},
        prefetch: config.prefetch ?? false,
        termName: config.termName ?? 'term',
        limitName: config.limitName ?? 'limit',
        pageName: config.pageName ?? 'page',
        grouped: config.grouped ?? false,
        groups: [],
        groupOptions: [],
        optionsIndex:0,
        height: config.height ?? false,
        lazyLoad: config.lazyLoad ?? false,
        page: 1,
        allLoaded: false,
        overlay: config.overlay ?? false,
        
        async init() {
            var s = this;
            if(this.lazyLoad && this.limit) this.height=this.limit*2+"rem";
                    
            if(this.selected == null ){
                if(this.multiple)
                    this.selected = []
                else
                    this.selected = ''
            }else{
                // console.log(this.selected);
                if(this.multiple){
                    this.selected = Object.values(this.selected).map((value) => {
                        return ''+value;
                    });
                    // console.log(this.selected);
                }
                
            }
            if(this.dataSrc){
                // console.log(this.dataSrc);
                this.isLoaded=false;
                if(this.prefetch){
                    await this.getAsyncData();
                }

            }else{
                this.isLoading=false;
                if(!this.data) this.data = {}
                // console.log(this.multiple, this.selected);
                this.prepareData()
                this.prepareOptions()
            }


            if(this.name && this.multiple && !this.name.endsWith('[]')) this.name+='[]';

            this.$watch('term', (async function(values) {
                // console.log('term changed', values, s.term, s.dataSrc);
                s.currentIndex=-1
                s.groupOptions=[];
                s.page=1;
                s.allLoaded=false;
                if(s.dataSrc){
                    s.isLoaded=false;
                    // console.log("BEFORE TERM CHANGE ASYNC", s.options);
                    return await s.getAsyncData();

                    // console.log("AFTER TERM CHANGE ASYNC", s.options);
                }else{
                    s.prepareOptions();
                }
                
            }));

            // var instance=bootstrap.Dropdown.getInstance(btn);
            // console.log(btn,instance);
            // instance.hide();
            var btn= this.$refs['dropdown-btn'];
            
            if(this.inlineSearch){
                this.$refs['inlineSearchInput'].addEventListener('focus', event => {
                    btn.dispatchEvent(new CustomEvent('click'));
                    this.$refs['inlineSearchInput'].focus();

                });
            }
           
            btn.addEventListener('shown.bs.dropdown', event => {
                // do something...
                // console.log('event',event);
                event.preventDefault();
                event.stopPropagation();
                event.target.classList.remove('show');
                s.openSelect();

                // event.target.addEventListener('keypress', event => {
                // //     // do something...
                //     // console.log('event',event);
                // //     s.closeSelect();
    
                // });
                
            });
            
            


        },
        
        async loadMore(){
            // _d('loadMore');
            if(this.dataSrc && !this.allLoaded){
                this.page++;
                this.isLoaded=false;
                await this.getAsyncData();
                this.prepareOptions();
            }else{
                
                
                // console.log('loadMore', this.page, (Object.keys(this.data).length/this.limit) );
                if(this.page < (Object.keys(this.data).length/this.limit) ){
                    this.page++;
                    this.prepareOptions();
                }else{
                    this.allLoaded=true;
                }
            }
        },
        async getAsyncData() {
            this.isLoading=true;
            
            // _d('getAsyncData', this.isLoaded);
            if(!this.isLoaded){
                var loadedData = await this.loadAsyncData();
                // console.log('loadedData',Object.keys(loadedData).length);
                //
                if(loadedData &&  Object.keys(loadedData).length>0  ) {
                    //si solo devuelve los datos selecionados, asumimos que ha acabado
                    //si devuelve menos datos que el límite, tb ha acabado
                    if(Object.keys(loadedData).length < this.limit){
                        this.allLoaded=true;    
                    }
                    if( this.selected && ( (this.multiple && this.selected==Object.keys(loadedData)) || (!this.multiple && Object.keys(loadedData).length==1 && this.selected == Object.keys(loadedData)[0] ) )){
                        this.allLoaded=true;    
                    }


                    for(var key in loadedData){
                        if(!Object.keys(this.data).includes(key)) this.data[key]=loadedData[key];
                    }
                }else{
                    this.allLoaded=true;
                }
                // _d('loaded');
                this.prepareData()
                // _d(this.data);
                this.prepareOptions()
                // _d(this.options);
            }
            this.isLoading=false;
            this.isLoaded=true;
            
        },
        async loadAsyncData() {
            // _d('loadAsyncData', Alpine.raw(this));
            var s=this;
            const data = new URLSearchParams();
            data.append(this.termName, this.term);
            data.append(this.limitName,  this.limit);
            if(this.lazyLoad) data.append(this.pageName,  this.page);
            // _d('loadAsyncData', this.selected);
            if(this.selected){
                if(this.multiple){
                    for(var i in this.selected){
                        data.append('selected['+i+']',  this.selected[i]);
                    }

                }else{
                    data.append('selected',  this.selected);
                }
            }

            if(this.dataSrcParams){
                // _d('this.dataSrcParams',data,this.dataSrcParams);
                for(var dataParamKey in this.dataSrcParams){
                    data.append(dataParamKey,  this.dataSrcParams[dataParamKey]);
                }
            }

            let response;

            if(s.dataSrcMethod.toUpperCase()=="GET" || s.dataSrcMethod.toUpperCase()=="DELETE"){
                // console.log(s.dataSrc+"?"+data.toString());
                var url=s.dataSrc;
                if(s.dataSrc.includes('?')) url+="&";
                else url+="?";
                
                // console.log('loadAsyncData',url, data.toString());
                response = await fetch( url+data.toString());
            }else{
                data.append('_token', document.querySelector('head meta[name="csrf-token"]').content);
                
                response = await fetch( s.dataSrc , {
                    method: s.dataSrcMethod.toUpperCase(),
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: data
                });
            }
            return await response.json()
            
        },

        async prepareOptions() {
            var s=this;
            // _d('prepareOptions before',  Object.keys(this.data).length, this.page, this.limit);
            

            this.options=Object.keys(this.data)
                .filter(function(key){
                    // _d('filter',s.term, s.dataSrc);
                    if(s.term){
                        var terms=s.term.split(" ");
                        for(var t of terms){
                            if(s.data[key].value.toLowerCase().includes(t.toLowerCase())) return true;
                        }
                        return false;
                        // }
                    }
                    return true;
                });

                // _d('prepareOptions after 1',  Object.keys(this.options).length);
            
                if(this.limit){
                    if(this.lazyLoad){
                        // console.log('limiting page:'+ this.page,this.limit);
                        this.options = this.options.slice(0,  this.page*this.limit);
                    }else{
                        this.options = this.options.slice(0,  this.limit);

                    }
                }
                // _d('prepareOptions after 2',  Object.keys(this.options).length);
            

                this.options=this.options.reduce((options, key) => {
                    options[key] = this.data[key]
                    return options
                }, {});

                // _d('prepareOptions after 3',  Object.keys(this.options).length);
            


        },
        prepareOption: function(option,key,group) {
            var ret;
            // _d('prepareOption',option,key);
            if(typeof option == 'object'){
                // console.log(Object.keys(this.data[key]));
                ret = {...{key:key, group:group,  value:option.value ?? ''}, ...option};
            }else{
                ret = {
                    value: option,
                    group: group,
                    key: key
                };
            }
            // _d('ret',ret);
            return ret;

        },
        async prepareData() {
            var data=[];
            this.groups=[];
            // _d('prepareData',Object.keys(this.data).length);
            if(this.grouped){
                
                
                // var tmp=[];
                for(var gr_key in this.data){
                    // this.data[key][gr_key];
                    // var grdata=[];
                    for(var op_key in this.data[gr_key]){
                        data[op_key] =this.prepareOption(this.data[gr_key][op_key], op_key, gr_key);
                        // data[op_key]= grdata[op_key];
                    }

                    this.groups.push(gr_key);
                }

                // console.log('groups', this.groups);
            
            }else{

                for(var key in this.data){
                    data[key]= this.prepareOption(this.data[key],key, null);
                    
                }
            }
            this.data=data;
            // _d('preparedData',Object.keys(this.data).length);
            // console.log(this.data);
            //lo paso a options
            this.options = Object.keys(this.data);
            // _d('options before',Object.keys(this.options).length, this.limit);
            
            if(this.limit) this.options=this.options.slice(0,this.limit);

            this.options=this.options.reduce((options, key) => {
                    options[key] = this.data[key]
                    return options
                }, {});

            // _d('options after',Object.keys(this.options).length);
            
            // console.log('prepareData', this.data,this.options);
                // if(this.grouped)console.log( this.options );
            
            // console.log(Object.values(this.options).filter((option)=>{ return option.group=="Trains" }));
        },

        getGroupOptions: function(group){
            return Object.values(this.options).filter((option)=>{return option.group==group;});
        },
        closeSelect () {
            if(this.open){
                // console.log('closeSelect');
                this.open = false
                this.term = ''
                this.page=1;
                this.allLoaded=false;
                this.currentIndex=-1
                var btn= this.$refs['dropdown-btn'];
                var instance=bootstrap.Dropdown.getInstance(btn);
                // console.log(instance);
                instance.hide();
                document.documentElement.classList.remove('select-opened');
                
            }
        },
        async openSelect() {
            if(this.disabled) return;

            // console.log('openSelect');

            
            if(!this.open){
                this.open = true
                this.term = ''
                this.currentIndex=-1;
                document.documentElement.classList.add('select-opened');
                // console.log(this.dataSrc ,this.prefetch);
                if(this.dataSrc && !this.prefetch){
                    await this.getAsyncData();
                }
            }
        },

        // toggleSelect: function() {
        //     // console.log('toggleSelect');
        //     if(!this.disabled) {
        //         if (this.open){
        //             return this.closeSelect()
        //         }

        //         this.open = true
        //         // this.$refs["dropdown-btn"].classList.remove('show');

                
        //     }
        // },

        deselectOption: function(index) {
            // console.log('deselectOption',value)
            if(this.disabled) return;
            if(this.readonly) return;
            
            if(this.multiple) {
                this.selected.splice(index, 1)
            }
            else {
                this.selected = ''
            }

            this.emitChanged();
            
        },

        emitChanged: function() {
            // _d('emitChanged: t-select-changed',this.selected);

            var obj=null;
            if(this.selected){
                if(this.multiple){
                    obj=[];
                    for(var i in this.selected){
                        obj[this.selected[i]] =  this.options[this.selected[i]];
                    }
                }else{
                    
                    obj = this.options[this.selected]
                }
            }
            if(obj) obj=Alpine.raw(obj);

            this.$dispatch('t-select-changed',{
                input_id:this.id, 
                input_name:this.name, 
                value: this.selected,
                value_obj: obj,
            });
            // this.$refs['dropdown-btn'].dispatchEvent(new CustomEvent('tselectchanged',{ bubbles :true, value: this.selected }));
                    
        },

        clearSelected: function() {
            if(this.disabled) return;
            if(this.readonly) return;
            
            if(!this.allowClear) return;
            // console.log('clearSelected');
            if(this.multiple) {
                this.selected=[];
                
            }
            else {
                this.selected = ''
            }
            this.closeSelect()
            this.emitChanged();
        },

        selectCurrentOption: function() {
            // console.log('selectCurrentOption',this.currentIndex);

            if(this.readonly) return;
            if(this.disabled) return;
            if(this.options[Object.values(this.options)[this.currentIndex].key].disabled??false)  return;
            if(this.currentIndex>=0)
                this.selectOption(Object.values(this.options)[this.currentIndex].key);
        },
        selectOption: function(value) {
            // console.log('select', value);
            if(this.readonly) return;
            if(this.disabled) return;
            if(this.options[value].disabled??false) return;

            // If multiple push to the array, if not, keep that value and close menu
            if(this.multiple){
                if(!this.selected) this.selected=[];
                // If it's not already in there
                if (!this.selected.includes(value)) {
                    this.selected.push(value)
                }else{
                    let index = this.selected.indexOf(value);
                    this.selected.splice(index, 1);
                }
            }
            else {
                // console.log("HOLA");
                this.selected=value;
                this.closeSelect();
            }
            this.emitChanged();
        },

        increaseIndex: function() {
            // console.log('increaseIndex');
            
           

            if(this.currentIndex >= Object.keys(this.options).length -1)
                this.currentIndex = 0
            else
                this.currentIndex++


            if(this.options[Object.values(this.options)[this.currentIndex].key].disabled??false)      this.increaseIndex();           
        },

        decreaseIndex: function() {
            if(this.currentIndex <= 0)
                this.currentIndex = Object.keys(this.options).length-1
            else
                this.currentIndex--;

            if(this.options[Object.values(this.options)[this.currentIndex].key].disabled??false)      this.decreaseIndex();
        },

        isSelected: function(key){
            // console.log('isSelected ',key, this.selected);
            var ret;

            if(this.multiple) ret= this.selected.includes(key) ;
            else ret= this.selected==key;
            // console.log(ret);
            return ret;
        },
        hasSelected: function(){
            return (this.multiple && this.selected.length>0) || (!this.multiple && this.selected);
        },

        optionClass: function(key,index){
            let ret=[];
            if(this.multiple){
                if(this.selected.includes(key)) ret.push('selected');
                
            }else{
                if(this.selected == key) ret.push('selected');
            }
            if(!this.readonly && this.currentIndex==index) ret.push('active');

           
            // console.log(this.data[key]);
            if(this.data[key] && (this.data[key].color??null)) ret.push('text-'+this.data[key].color);
            if(this.data[key] && (this.data[key].class??null)) ret.push(this.data[key].class);
            return ret.join(" ");
        },
        btnClasses: function(){
            let ret=[this.btnClass];
            
            // if(this.open) ret.push('active');
            if(this.disabled) ret.push('disabled');
            if(!this.width){
                ret.push('w-100');
            }

            // console.log(this.multiple,this.selected);
            if(!this.multiple && this.selected &&  (this.data[this.selected]??null) && (this.data[this.selected].color??null) ){
                ret.push('btn-'+this.data[this.selected].color);
            }else{
                // if(this.color=="default") ret.push('btn-default');
                // else 
                ret.push('btn-'+this.color);
            }
            
            ret.push('btn-'+this.size);

            return ret.join(" ");
        },
        
        renderSelected: function() {
            let ret=this.placeholder;
            // console.log('renderSelected',this.selected);
           
                if(this.multiple){
                    if(this.selected.length>0){
                        // if(this.dataSrc){
                        //     ret="<small class='opacity-75'>"+ (this.selected.length) + " selected...</small>";
                        // }else{
                            let selected=[];
                            // console.log(this.selected,this.data);
                            for(var key in this.selected){
                                if(this.data[this.selected[key]]??null){
                                    var optionTxt="";
                                    optionTxt+=this.selectedLabelPrefix;
                                    
                                    var color=this.data[this.selected[key]].color??null;

                                    if(color){
                                        optionTxt+="<span class='badge text-bg-"+color+"'>";
                                    }
                                    optionTxt+=this.data[this.selected[key]].value;
                                    if(color){
                                        optionTxt+="</span>";
                                    }
                                    optionTxt+=this.selectedLabelSufix;

                                    selected.push( optionTxt);
                                }
                            }
                            // console.log('limit', this.selectedLabelLimit);
                            if(this.selectedLabelLimit && this.selected.length > this.selectedLabelLimit){
                                // console.log(selected);
                                selected.splice( this.selectedLabelLimit);
                                // console.log(selected);
                                var more=this.selectedLabelLimitText;
                                more=more.replace(":num",(this.selected.length - this.selectedLabelLimit));
                                

                                ret= selected.join(this.selectedLabelGlue) + " <small class='opacity-75'>"+more+"</small>";
                                // $ret= implode($this->selected_label_glue, array_slice($selected, 0, $this->selected_label_limit)) ." and ".(count($selected)-$this->selected_label_limit)." more...";
                            }else{
                                ret= selected.join(this.selectedLabelGlue);
                            }
                        // }
                       
                    }
                }else{
                    if(this.selected && (this.data[this.selected]??null)){
                        // console.log(this.data, this.selected);
                        ret= this.data[this.selected].value;//["value"];
                    }
                }
            
            return ret;
        },

        setAttribute(e){
            if(e.detail.target!=this.id) return;
            this[e.detail.attribute] = e.detail.value;
           
        },
        async reload(e){

            if(e.detail.target!=this.id) return;

            // _d('reload');
            var s=this;
            // if(this.dataSrc){
                s.selected=null;
                s.data=[];
                s.options= {};
                s.currentIndex=-1
                s.groupOptions=[];
                s.page=1;
                s.allLoaded=false;
                this.isLoaded=false;
                this.isLoading=true;
                if(this.prefetch){
                    await this.getAsyncData();
                }
                // _d('options',this.options);
                // this.prepareOptions();
            // }
            
        },
    
    }))
})

