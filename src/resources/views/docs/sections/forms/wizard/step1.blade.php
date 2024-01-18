@extends('t-components::components.bootstrap5.wizard-step')

@section('step-content')
    Pas 1
   
    {{-- <script>
        window.addEventListener('import-progress', event => {
            console.log('import-progress :' +event.detail.percent);
            $('#progress-bar').css('width',event.detail.percent+'%');
            if(event.detail.percent>=100) $('#progress-bar').addClass('bg-success').removeClass('progress-bar-striped').removeClass('progress-bar-animated');
        });
    </script> --}}
@endsection