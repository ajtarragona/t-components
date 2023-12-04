@props(['title' => null, 'closer' => true,'size'=>'md'])

<div class="modal-dialog modal-{{$size}}" >
    <div class="modal-content">
        
       
        @if($title || $closer)
            <div class="modal-header">
               @if($title) <h5 class="modal-title">{!!$title??null!!}</h5> @endif
               @if($closer) <button type="button" class="btn-close" wire:click.prevent.stop="closeModal()" tabindex="-1"  aria-label="Close" ></button> @endif
            </div>
        @endif
        <div class="modal-body">
         {{ $slot }}
        </div>
        @if($footer??null)
            <div class="modal-footer d-block">
                {!! $footer !!}
            </div>
        @endif
      </div>
</div>
  