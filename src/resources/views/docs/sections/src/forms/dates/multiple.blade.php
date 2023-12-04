<p>L'usuari podrà triar més d'una data amb l'atribut  <code>multiple</code>.</p>
<p>Podem passar valor per defecte, com a array PHP afegint <code>:</code> davant l'atribut value: <code>:value="['01/11/2023', '10/11/2023']"</code>
<div class="row">
    <div class="col-6">
        <x-t-date  multiple allowClear  name="flat-multi-1" placeholder="multiple"/>
    </div>
    <div class="col-6">
        <x-t-date  multiple :value="['01/11/2023', '10/11/2023']" allowClear name="flat-multi-2" />
    </div>
</div>