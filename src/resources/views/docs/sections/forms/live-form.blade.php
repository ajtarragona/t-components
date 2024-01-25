
<x-t-form wire:submit.prevent="submitForm">
    <pre>{{ var_export($errors) }}</pre>
    
    <x-t-field label="Camp obligatori" label-placement="start" required for="f3-tf-1" class="mb-2">
        <x-t-text id="f3-tf-1" wire:model="form.text1" />
    </x-t-field>
    <x-t-field label="Camp mida màxima" label-placement="start"  for="f3-tf-2" class="mb-2">
        <x-t-textarea id="f3-tf-2" wire:model="form.text2" />
    </x-t-field>

    <x-t-field label="Camp data obligatori" label-placement="start"  required for="f3-df-1" class="mb-2">
        <x-t-date wire:model="form.data" id="f3-df-1"  allowClear placeholder="date required"/>
    </x-t-field>
    <x-t-field label="Camp select obligatori" label-placement="start"  required for="f3-sf-1" class="mb-2">
        <x-t-select id="f3-sf-1" wire:model="form.select1" allowClear :data="[
            1=>'Opció 1',
            2=>'Opció 2',
            3=>'Opció 3',
        ]"/>
    </x-t-field>
    <x-t-field label="Camp select multiple" label-placement="start"  for="f3-sf-2" class="mb-2">
        <x-t-select id="f3-sf-2" wire:model="form.select_multi" multiple allowClear :data="[
            1=>'Opció 1',
            2=>'Opció 2',
            3=>'Opció 3',
            4=>'Opció 4',
            5=>'Opció 5'
        ]"/>
    </x-t-field>

    <x-t-button icon="save" type="submit">Submit</x-t-button>
    
</x-t-form>