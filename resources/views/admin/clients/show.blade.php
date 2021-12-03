@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.client.title') }}
    </div>
    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.clients.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <div class="row">
                <div class="col-md-4">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.id') }}
                        </th>
                        <td>
                            {{ $client->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.client_name') }}
                        </th>
                        <td>
                            {{ $client->client_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.tel_1') }}
                        </th>
                        <td>
                            {{ $client->tel_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.tel_2') }}
                        </th>
                        <td>
                            {{ $client->tel_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.tax_number') }}
                        </th>
                        <td>
                            {{ $client->tax_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.short_name') }}
                        </th>
                        <td>
                            {{ $client->short_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.email') }}
                        </th>
                        <td>
                            {{ $client->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.address') }}
                        </th>
                        <td>
                            {{ $client->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.fax') }}
                        </th>
                        <td>
                            {{ $client->fax }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.contact_person') }}
                        </th>
                        <td>
                            {{ $client->contact_person }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.contact_person_2') }}
                        </th>
                        <td>
                            {{ $client->contact_person_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.bank_name') }}
                        </th>
                        <td>
                            {{ $client->bank_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.home_tel') }}
                        </th>
                        <td>
                            {{ $client->home_tel }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.iban') }}
                        </th>
                        <td>
                            {{ $client->iban }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.mobile_number_1') }}
                        </th>
                        <td>
                            {{ $client->mobile_number_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.mobile_number_2') }}
                        </th>
                        <td>
                            {{ $client->mobile_number_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.remarks') }}
                        </th>
                        <td>
                            {{ $client->remarks }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.from') }}
                        </th>
                        <td>
                            {{ $client->from }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.to') }}
                        </th>
                        <td>
                            {{ $client->to }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.clients.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
</div>
<div class="col-md-8">   
<div class="card">
    <div class="card-header">
        <strong style="color: #00008B;"> Client Fees</strong>
    </div>
    <div class="card-body">
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
          
            <td><input value="{{$ClientFee->clearance_fee ?? null }}"  data-id="{{ $ClientFee->client_fee_id }}" disabled></td> 
            <td><input value="{{ $ClientFee->transportaion ?? null }}"  data-id="{{ $ClientFee->client_fee_id }}" disabled></td>       
            <td><input value="{{$ClientFee->loading_fee ?? null }}"  data-id="{{ $ClientFee->client_fee_id }}" disabled></td>             
        </tr>
    @endforeach
</table>
    </div>
</div>
</div>
    </div>
@endsection