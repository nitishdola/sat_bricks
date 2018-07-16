<table>
<tr>
<td>
Name
</td>
<td>
Mobile No.
</td>
<td>
Address 
</td>
<td>
Sardar Type
</td>
<td>
Mill
</td>
</tr>

@if(count($sardars) > 0)
@foreach($sardars as $sardars)
<tr>
<td>
{{$sardars->name}}
</td>
<td>
{{$sardars->mobile_number}}
</td>
<td>
{{$sardars->address}}
</td>
<td>
{{$sardars->sardar_types->name}}
</td>
<td>
{{$sardars->mills->name}}
</td>
</tr>
@endforeach
@endif
</table>