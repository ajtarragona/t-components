<div class="modal" tabindex="-1" id="file_detail_{{str_slug($name??'')}}">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">
            Files  <span class="badge bg-primary rounded-pill " x-show="multiple && hasFiles()" x-cloak x-text="hasFiles()?files.length:0"></span>

          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <ul class="list-unstyled">
                <template x-for="file in files">
                    <li class="d-sm-flex p-2 justify-content-between">
                        <div class="text-truncate pe-3">
                            <i class="bi" :class="fileTypeIcon(file)"></i>
                            <span x-text="file.name"></span>
                        </div>
                        <div class="flex-1 ">
                            <small class="text-muted pe-3" x-text="fileTypeDescription(file)"></small>
                            <small class="text-muted " x-text="humanSize(file.size/1024)"></small>
                        </div>
                    </li>
                </template>
            </ul>
          
        </div>
        
      </div>
    </div>
  </div>