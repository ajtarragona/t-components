<div x-data>
    <div class="modal fade" tabindex="-1"  
        :class="{'show':$store.confirmModal.open}"
        x-data
        x-show="$store.confirmModal.open"
        @keydown.window.escape="$store.confirmModal.open = false"
        x-ref="dialog"
        
    >
        <div 
            class="modal-dialog"
          
        >
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" x-html="$store.confirmModal.title">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" @click="$store.confirmModal.onCancel()"></button>
                </div>
                <div class="modal-body" x-html="$store.confirmModal.message">
                Modal body text goes here.
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" x-text="$store.confirmModal.cancelText" @click="$store.confirmModal.onCancel()">Close</button>
                <button type="button" class="btn btn-primary" x-text="$store.confirmModal.okText" @click="$store.confirmModal.onOk()">Confirm</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal-backdrop fade" 
        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-50"
        x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-50"
        x-transition:leave-end="opacity-0"
        :class="{'show':$store.confirmModal.open}" x-show="$store.confirmModal.open"
        ></div>
</div>