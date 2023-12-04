<p>Per defecte una data es visualitza (i s'envia) en format <code>d/m/Y</code></p>
<p>Podem canviar aquest format amb dateFormat</p>
<x-t-date dateFormat="l, d F, Y" name="flat-format-1" placeholder="dateFormat='l, d F, Y'" class="mb-2" />

<p>Si especifiquem <code>altInput="true"</code> podem mostrar la data amb un format però sempre s'enviarà en format ISO 8601 <code>(Y-m-d)</code></p>

<x-t-date value="2023-01-01" dateFormat="l, d F, Y" altInput="true"  name="flat-format-2" />
