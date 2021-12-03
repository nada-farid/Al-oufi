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
    @foreach($client_fees as  $ClientFee)
        <tr>      
            <td>{{App\Models\ClientFee::findOrfail($ClientFee->client_fee_id)->type}}</td>
          
            <td><input value="{{$ClientFee->clearance_fee ?? null }}"  data-id="{{ $ClientFee->client_fee_id }}" name="fees[{{ $ClientFee->client_fee_id }}][]" type="number" class="ingredient-amount form-control"></td> 
            <td><input value="{{ $ClientFee->transportaion ?? null }}"  data-id="{{ $ClientFee->client_fee_id }}" name="fees[{{ $ClientFee->client_fee_id }}][]" type="number" class="ingredient-amount form-control"></td>       
            <td><input value="{{$ClientFee->loading_fee ?? null }}"  data-id="{{ $ClientFee->client_fee_id }}" name="fees[{{ $ClientFee->client_fee_id }}][]" type="number" class="ingredient-amount form-control"></td>             
        </tr>
    @endforeach
</table>
