    <h1 >Alerts</h1> 
    <div id="alerts">
        
        @tAlert(["type"=>"danger", "class"=>"mb-3"])
            <x-slot name="title">
                Server Error
            </x-slot>
            <strong>Whoops!</strong> Something went wrong!
        @endTAlert


        <x-t-alert type="success" class="small" close="false">
            <strong>Ok!</strong> Message succesful
        </x-t-alert>

    </div>
