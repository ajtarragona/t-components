<x-t-form action="{{route('t-components.testForm')}}" method="get" > 
    
    @include('t-components::docs._form_request')

    <h2>Files</h2>

    <x-t-file id="formFile1" label="Default file input" name="f-simple"/>
    <hr />

    <x-t-file id="formFile1" label="Align right file input" name="f-right" placement="right" maxsize="500" form-text="Irure Lorem consequat duis aliqua consectetur."/>
    <hr />

    <x-t-file id="formFile1" label="Multiple file input" multiple name="f-multi"/>
    <hr />

    <x-t-file id="formFile1" label="Required file input" multiple required signed maxsize="20480" name="f-required"/>
    <hr />

    <x-t-file id="formFile1" label="Allowed types file input" multiple required allowed-types="image,word,pdf,excel,zip,dwg,xml" name="f-allowed"/>
    <hr />

    <x-t-file id="formFile1" label="With default value" maxsize="40" multiple allowed-types="pdf,xml" name="f-def-value" :files="[
        [
            'name'=>'test.pdf',
            'type'=>'application/pdf',
            'size'=>12345
        ],
        [
            'name'=>'test2.pdf',
            'type'=>'application/pdf',
            'size'=>123453
        ]
    ]"/>



    <x-t-button icon="save" type="submit">Submit</x-t-button>


</x-t-form>