
    document.addEventListener('alpine:init', () => {
        Alpine.data('tFile', (config) => ({

            imageUrl: '',
            placement:  config.placement??'left',
            required:  config.required??false,
            multiple:  config.multiple??false,
            label:  config.label??'',
            formText:  config.formText??'',
            containerClass:  config.containerClass??'',
            class:  config.class??'',
            maxsize:  config.maxsize??null,
            signed:  config.signed??false,
            allowedTypes : config.allowedTypes??'',
            autoUpload : config.autoUpload??false,
            files:config.files??null,
            invalidFiles:null,
            dragover:false,
            clear:false,

            strings : {
                required: 'Obligatori',
                optional: 'Opcional',
                multiple: 'Admet múltiples arxius',
                single: 'Només admet un arxiu',
                all_allowed: 'Qualsevol tipus d\'arxiu',
                signed: 'Requereix signatura electrònica',
                not_signed: 'No requereix signatura electrònica',
                maxsize: 'Mida màxima',
                not_maxsize: 'Sense limitació de mida',
                select_single: 'Selecciona un arxiu',
                select_multiple: 'Selecciona multiples arxius',
                multiple_files: 'Multiples arxius',
                invalid_file: 'Arxiu invàlid',
                types : {
                    pdf: 'PDF',
                    word: 'Documents',
                    excel: 'Fulls de càlcul',
                    image: 'Imatges',
                    other: 'Altres',
                    zip: 'Arxius comprimits',

                },
                ... config.strings??{}
            },
            type_icons : {
                pdf: 'bi-file-pdf',
                word: 'bi-file-word',
                excel: 'bi-file-excel',
                image: 'bi-file-image',
                other: 'bi-files',
                zip: 'bi-file-zip',
            },
            mimes : {
                zip : ['application/x-zip-compressed','application/x-7z-compressed','application/vnd.rar'],
                pdf : ['application/pdf'],
                word : ['application/vnd.openxmlformats-officedocument.wordprocessingml.document','application/msword','application/vnd.oasis.opendocument.text'],
                excel : ['application/vnd.openxmlformats-officedocument.spreadsheetml.sheet','application/vnd.ms-excel','application/xls','application/vnd.oasis.opendocument.spreadsheet'],
                image : ['image/png','image/jpeg','image/jpg','image/gif','image/tiff'],
                xml : ['application/xml','text/xml'],
                txt : ['text/plain'],
            },
            init() {
                // console.log('init',Alpine.raw(this.strings), Alpine.raw(config.strings??{}));
                if(this.files){
                    //si solo pasan un file, lo meto en un array
                    if(this.files.name??null){
                        tmp=[];
                        tmp.push(this.files);
                        this.files=tmp;
                        // console.log(Alpine.raw(this.files));
                    }
                }
                
                // console.log(this.getAllowedTypes());
            },
            placementRight(){
                return this.placement=='right';
            },
            getContainerClass(){
                var ret=this.containerClass;
                if(this.dragover) ret+=" dragover";
                return ret;
            },
            colInputClass(){
                var ret = this.placementRight() ? 'ms-md-auto ps-md-4 order-last':'pe-md-4 ';
                if(this.multiple) ret+=" multiple";
                if(this.hasFiles()) ret+=" with-files";
                return ret;
            },
            colDetailClass(){
                return this.placementRight() ? 'pe-md-4 ':'ps-md-4';
            },
            requiredLabel(){
                return this.required ? this.strings.required : this.strings.optional;
            },
            multipleLabel(){
                return this.multiple ? this.strings.multiple : this.strings.single;
            },
            signedLabel(){
                return this.signed ? this.strings.signed : this.strings.not_signed;
            },
            maxsizeLabel(){
                return this.maxsize ? (this.strings.maxsize +": "+this.humanSize(this.maxsize)) : this.strings.not_maxsize;
            },
            selectedFilesLabel(){
                var o=this;

                // console.log('this.files',Alpine.raw(this.files));
                if(this.hasFiles()) {
                    if(this.files.length>1){
                        var size=0;
                        this.files.map(file=>size+=file.size);
                        return "<div><strong class='d-block mb-1'>"+this.strings.multiple_files + '</strong><small class="text-muted">'+ o.humanSize(size/1024)+"</small></div>";

                    }else{
                        var file=this.files[0];
                        
                        return "<div ><strong  class='d-block mb-1' title='"+file.name+"'>"+file.name + "</strong><small class='"+(this.validFile(file)?'text-muted':'text-danger')+"'>" + (this.validFile(file)? o.humanSize(file.size/1024) : this.strings['invalid_file']) +'</small></div>';
                           
                    }
                    
                }else{
                    return this.strings[this.multiple?'select_multiple':'select_single']+"...";
                }
                
            },
            getAllowedTypes(){
                return this.allowedTypes ? this.allowedTypes.split(',') : [];
            },

            getAllowedMimetypes(){
                var allowed=this.getAllowedTypes();
                var ret=[];
                var o=this;
                // console.log('getAllowedMimetypes', allowed);
                if(allowed){
                    allowed.forEach((type) => {
                        // console.log(type, o.mimes[type]);
                        if(o.mimes[type]){
                            ret=ret.concat(o.mimes[type]);
                        }else{
                            ret.push(type);
                        }
                    });
                }
                // console.log('ret',ret);
                return ret;
            },
            allowedImages(){
                return this.getAllowedTypes().includes('image');
            },
            allowedWord(){
                return this.getAllowedTypes().includes('word');
            },
            allowedPdf(){
                return this.getAllowedTypes().includes('pdf');
            },
            allowedExcel(){
                return this.getAllowedTypes().includes('excel');
            },
            allowedAll(){
                return this.getAllowedTypes().length ==0;
            },
            allowedOther(){
                var o=this;
                var types=Object.keys(o.strings.types);
                var allowed= this.getAllowedTypes();

                // return allowed.some(strA => !types.includes(strA));
                // console.log('types',types, allowed);

                var ret=false;
                for (let i = 0; i < allowed.length; i++) {
                    var tipo=allowed[i];
                    if(!types.includes(tipo)) {
                        if(ret===false) ret=[];
                        ret.push(tipo);
                    }
                    
                }
                // console.log('hola');
                return ret;
            },
            hasFiles(){
                return this.files ? this.files.length>0 : false;
            },
            hasInvalidFiles(){
                var o=this;
                if(!this.files || this.files.length==0) return false;
                // _d('hasInvalidFiles',this.files);
                
                return this.files.some((file)=>{
                    // _d(file);
                        return !o.validFile(file)
                });
            },
            humanSize(kilobytes) {
                if(!kilobytes) return;
                // console.log('humanSize',kilobytes);
                // if(!this.maxsize) return '';
                
                // kilobytes=this.maxsize;
                kilobytes=parseFloat(kilobytes);

                if (kilobytes >= 1024) {
                    const megabytes = kilobytes / 1024;
                    return megabytes.toFixed(2).replace(/\.?0+$/, "") + "MB";
                  } else {
                    return kilobytes.toFixed(2).replace(/\.?0+$/, "") + "KB";
                  }
            },
             setFiles(event) {
                // console.log('setFiles',event);
                // this.validateFiles(Object.values(event.target.files));
                this.files= Object.values(event.target.files);
            
                // console.log('this.files',this.files);
                if(this.files.length==0){
                    this.files=[];
                    this.doClear();
                }else{
                   
                    this.$refs.clearfile_input.value=null;
                    this.clear=false;

                    
                    
                }
                
             },
             drop(event) {
                // console.log('drop',Array.from(event.dataTransfer.files));
                if (!event.dataTransfer.files) return;

                // this.validateFiles(Array.from(event.dataTransfer.files));
                this.files=Array.from(event.dataTransfer.files);
                this.dragover=false;
 
                
                 
                // const formData = new FormData()
              
                // for (let item of event.dataTransfer.items) {
                //   if (item.kind === 'file') {
                //     const file = item.getAsFile()
                //     if (file) {
                //       if (!file.type.match('image.*')) {
                //         alert('only images supported')
                //         return
                //       }
                //       formData.append('files', file)
                //     }
                //   }
                // }
              
                //...
            },
            validFile(file){
                // _d('validFile',file);
                return  this.validFileType(file) && this.validFileSize(file);
            },
            validFileType(file){
                // _d('validFileType',file,this.allowedTypes);
                if(!this.allowedTypes) return true;
                const allowedMimes=this.getAllowedMimetypes();
                return allowedMimes.includes(file.type);
            },
            validFileSize(file){
                // _d('validFileSize',file,this.maxsize);
                if(!this.maxsize) return true;
                return file.size/1024 <= this.maxsize;
            },
            
            doClear(){
                // console.log('clear');
                this.files=null;
                this.$refs.input.value='';
                this.$refs.clearfile_input.value=1;
                this.clear=true;
            },
            showFiles(){
                // console.log('showFiles',Alpine.raw(this.files));
            },
            fileType(file){
                return this.typeFromMime(file.type);
            },
            fileTypeDescription(file){
                var type=this.typeFromMime(file.type);
                if(type) return this.strings.types[type];
                return this.strings.types.other;
            },
            fileTypeIcon(file){
                var type=this.typeFromMime(file.type);
                if(type) return this.type_icons[type];
                return 'bi-file';
            },
            typeFromMime(mime) {
                const entradaEncontrada = Object.entries(this.mimes).find(([tipo, tiposMime]) => tiposMime.includes(mime));
                return entradaEncontrada ? entradaEncontrada[0] : null;
            }, 
            acceptedMimes(){
                var ret=[];
                // console.log('acceptedMimes',Alpine.raw(this.getAllowedTypes()),Alpine.raw(this.mimes));
                for(var type of this.getAllowedTypes()){
                    // console.log(type);
                    if(this.mimes[type]){
                        ret=ret.concat(this.mimes[type]);
                    }else{
                        ret.push(type);
                    }

                }
                // console.log(ret);
                return ret.join(",");
            }
              
            // selectFile (event) {
            //     const file = event.target.files[0]
            //     const reader = new FileReader()

            //     if (event.target.files.length < 1) {
            //         return
            //     }

            //     reader.readAsDataURL(file)

            //     reader.onload = () => (this.imageUrl = reader.result)
            // },
        }))
    })
