<div class="stepwizard" id="{{$component_id}}" >
    
    <div class="stepwizard-header">
        {{-- {{ var_export($step_data)}} --}}
        <ul class="stepwizard-bar">
            {{-- @dump("HOLA",$steps) --}}
            @foreach($steps as $st)
                
                <li class="{{ $stepIndex == $st->index ? 'active' : '' }}" id="step-button-{{$st->index}}">
                    <a href="#" wire:click.prevent="goTo({{$st->index}})">
                        <x-t-icon :name="$st->icon"/>
                        <strong>{{$st->index+1}}. {{$st->title()}}</strong>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>

    {{-- @dump($view, $comici_id) --}}
    @if($view)
        <div class="stepwizard-common-body">
            @include($view)
        </div>
    @endif

    <div class="step-content" id="step-{{$stepIndex}}">
      
            {{-- {{$step_component_name}} --}}
            @livewire($step_component_name, [
                "wizard"=>$wizard, 
                "index"=>$stepIndex,
                "data" => $step_data[$stepIndex] ?? [],
                "all_data" => $step_data ?? [],
            ], key('step-key-'.$step_component_name."-".$stepIndex) )
       
       
    </div>

    <pre>
        {{ $dump }}
    </pre>
</div>