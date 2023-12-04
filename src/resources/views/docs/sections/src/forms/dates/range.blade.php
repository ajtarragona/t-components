<p>Podem definir que el selector sigui un rang enre dos dates amb l'atribut <code>range</code>.</p>
<p>Podem passar valor per defecte, com a array PHP afegint <code>:</code> davant l'atribut value: <code>:value="['01/11/2023', '10/11/2023']"</code>
    
    <div class="row">
        <div class="col-6">
            <x-t-date  range name="flat-range" allowClear placeholder="range"/>
        </div>
        <div class="col-6">
            <x-t-date  range name="flat-range-2" allowClear  :value="['01/11/2023', '10/11/2023']" placeholder="range with default value"/>
        </div>
    </div>
