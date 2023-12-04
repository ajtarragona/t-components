@isset($attributes["name"])
    @error($attributes["name"])
        <div class="invalid-feedback d-block">
        @foreach ($errors->get($attributes["name"]) as $message) 
            <div>{!! $message !!}</div>
        @endforeach
        </div>

    @enderror
@else 
{{-- @dump($attributes->whereStartsWith('wire:model')) --}}
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
