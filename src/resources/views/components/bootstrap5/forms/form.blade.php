@props([
    // 'action'=>null,
    'method'=>'GET',
])

<form {{$attributes}} method="{{ in_array( strtoupper($method),['GET','POST'])?$method:'POST' }}">

    @if(strtoupper($method)!='GET') 
        @csrf
    @endif
    @if(!in_array(strtoupper($method),['GET','POST'])) 
        @method(strtoupper($method))
    @endif

    
    
    {{$slot}}
</form>