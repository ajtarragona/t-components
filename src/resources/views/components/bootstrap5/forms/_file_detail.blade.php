<div class="modal" tabindex="-1" id="file_detail_{{str_slug($name??'')}}">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">
            {{ __t('files.Arxius') }}  
            <span class="badge  rounded-pill " :class="hasInvalidFiles()?'bg-danger':'bg-secondary'" x-show="multiple && hasFiles()" x-cloak >
              <span x-text="hasFiles()?files.length:0"></span>
              <i class="bi bi-exclamation-triangle-fill"  x-show="hasInvalidFiles()" x-cloak></i>

            </span>

          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <template x-if="hasFiles()">
              <ul class="list-unstyled">
                  <template x-for="file in files">
                      <li class="d-sm-flex p-2 justify-content-between " >
                          <div class="text-truncate pe-3" :class="{'text-decoration-line-through text-gray-400':!validFile(file) }">
                              <i class="bi" :class="fileTypeIcon(file)"></i>
                              <span x-text="file.name"></span>
                          </div>
                          <div class="flex-1 ">
                              <small class="pe-3" :class="validFileType(file) ? 'text-muted':'text-danger'" x-text="fileTypeDescription(file)"></small>
                              <small :class="validFileSize(file) ? 'text-muted':'text-danger'" x-text="humanSize(file.size/1024)"></small>
                          </div>
                      </li>
                  </template>
                  
                  
              </ul>
            </template>
          
        </div>
        
      </div>
    </div>
  </div>