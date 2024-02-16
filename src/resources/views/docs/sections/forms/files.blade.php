

<h2>Files</h2>

<x-t-file id="formFile1" label="Default file input" />
<hr />

<x-t-file id="formFile1" label="Align right file input" placement="right" maxsize="500" form-text="Irure Lorem consequat duis aliqua consectetur."/>
<hr />

<x-t-file id="formFile1" label="Multiple file input" multiple/>
<hr />

<x-t-file id="formFile1" label="Required file input" multiple required signed maxsize="20480"/>
<hr />

<x-t-file id="formFile1" label="Allowed types file input" multiple required allowed-types="image,word,pdf,excel,zip,dwg,xml"/>
<hr />

<x-t-file id="formFile1" label="With default value" multiple allowed-types="pdf" :files="[
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


{{-- <x-t-field label="Default file input" for="formFile1"> --}}
{{-- </x-t-field> --}}
{{-- 
<x-t-field label="Multiple files" for="formFile-multi">
    <x-t-file id="formFile-multi" multiple/>
</x-t-field>

<x-t-field label="Disabled" for="formFile-disabled">
    <x-t-file id="formFile-disabled" disabled />
</x-t-field>

<x-t-field label="Size sm" for="formFile-sm">
    <x-t-file id="formFile-sm" size="sm" />
</x-t-field>


<x-t-field label="Size LG" for="formFile-lg">
    <x-t-file id="formFile-lg" size="lg" />
</x-t-field> --}}



