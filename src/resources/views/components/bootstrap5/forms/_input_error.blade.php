@if(isset($attributes["name"]) || isset($name))

    @php
        $errorname=$attributes["name"]??($name??'');
        if($errorname){
            $errorname=str_replace(["[","]"],[".",""],$errorname);
        }
        
    @endphp
    @error($errorname)
        <div class="invalid-feedback d-block">
        @foreach ($errors->get($errorname) as $message) 
            <div>{!! $message !!}</div>
        @endforeach
        </div>

    @enderror
@else 

    @if($wiremodel=$attributes->whereStartsWith('wire:model')->first())
        @error($wiremodel)
            <div class="invalid-feedback d-block">
                @foreach ($errors->get($wiremodel) as $message) 
                    <div>{!! $message !!}</div>
                @endforeach
            </div>
        @enderror
    @endif
@endif
