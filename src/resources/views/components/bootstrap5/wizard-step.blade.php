<div class="stepwizard-step" id="{{$component_id}}" wire:init="loadStep">
    <div class="step-body">
        @yield('step-content') @if( isset($slot) ) {{ $slot }} @endif
    </div>
    <div class="step-footer d-flex justify-content-between">
        <button class="btn btn-light border " {{ $step->hasPrevious()?'':'disabled'}} type="button" wire:click="back" wire:loading.class="loading" wire:target="back"> 
            <x-t-icon name="arrow-left-short"/> {!! $step->__('Back') !!}
        </button>
        <div>
            @if($step->hasNext()) 
            <button class="btn btn-primary " {{ $step->hasNext()?'':'disabled'}} type="button" wire:click="next" wire:loading.class="loading" wire:target="next">
                {!! $step->__('Next') !!}  <x-t-icon name="arrow-right-short"/>
            </button>
            @endif
            
            @if($step->canSubmit()) 
                <button class="btn btn-primary " type="button" wire:click="submitForm" wire:loading.class="loading" wire:target="submitForm">
                    <x-t-icon name="check"/>
                    {!! $step->__('Submit') !!}
                </button> 
            @endif
        </div>
    </div>
    
</div>