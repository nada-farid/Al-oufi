<table>
    <tr>
        <th>
        </th>
        <th>
            Clearance Fee
        </th>
        <th>
            Transportaion Fee
        </th>
        <th>
            Loading Fee
        </th>
    </tr>
    @foreach($fees as  $ClientFee)
        <tr>      
            <td>{{ $ClientFee->type}}</td>
          
            <td><input value="{{ $ClientFee->clearance_fee ?? null }}"  data-id="{{ $ClientFee->id }}" name="fees[{{ $ClientFee->id }}][]" type="number" class="ingredient-amount form-control"></td> 
            <td><input value="{{ $ClientFee->transportaion ?? null }}"  data-id="{{ $ClientFee->id }}" name="fees[{{ $ClientFee->id }}][]" type="number" class="ingredient-amount form-control"></td>       
            <td><input value="{{ $ClientFee->loading_fee ?? null }}"  data-id="{{ $ClientFee->id }}" name="fees[{{ $ClientFee->id }}][]" type="number" class="ingredient-amount form-control"></td>             
        </tr>
    @endforeach
</table>
