@php
    
use Carbon\Carbon;
@endphp

@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.invoice.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.invoices.store") }}" enctype="multipart/form-data">
            @csrf
            <input id="client_id" name="client_id" type="hidden">
            <input id="awb_id" name="awb_id" type="hidden">
            <div class="card">
                <div class="card-header">
                    <strong style="color: #00008B;"></strong>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-3">
                <label class="required" for="awb_no">{{ trans('cruds.awb.fields.awb_no') }}</label>
                <input class="form-control {{ $errors->has('awb_no') ? 'is-invalid' : '' }}" type="text" name="awb_no" id="awb_no" value="{{ old('awb_no', '') }}" step="1" required  onfocusout="myFunction()" >
                @if($errors->has('awb_no'))
                    <div class="invalid-feedback">
                        {{ $errors->first('awb_no') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.awb.fields.awb_no_helper') }}</span>
            </div>
            <div class="form-group col-md-3">
                <label  for="client_name">{{ trans('cruds.awb.fields.client_name') }}</label>
                <input class="form-control {{ $errors->has('client_name') ? 'is-invalid' : '' }}" type="text" name="client_name" id="client_name" disabled   value="" />
              </div>
              <div class="form-group col-md-3">
                <label for="goods_date">{{ trans('cruds.awb.fields.goods_date') }}</label>
                <input class="form-control date {{ $errors->has('goods_date') ? 'is-invalid' : '' }}" type="text" name="goods_date" id="goods_date" value="{{ old('goods_date') }}" disabled value="" />
                @if($errors->has('goods_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('goods_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.awb.fields.goods_date_helper') }}</span>
            </div>
            <div class="form-group col-md-3">
                <label class="required" for="invoice_date">{{ trans('cruds.invoice.fields.invoice_date') }}</label>
                <input class="form-control date {{ $errors->has('invoice_date') ? 'is-invalid' : '' }}" type="text" name="invoice_date" id="invoice_date" value="{{Carbon::now()->format('d-m-Y') }}" required >
                @if($errors->has('invoice_date'))
                    <div class="inval
 id-feedback">
                        {{ $errors->first('invoice_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.invoice.fields.invoice_date_helper') }}</span>
            </div>
                    </div>
                </div>
            </div>
<div class="card">
    <div class="card-header">
        <strong style="color: #00008B;"> Invoice details</strong>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="form-group col-md-3">
    <label class="required" for="no_of_pcs">{{ trans('cruds.awb.fields.no_of_pcs') }}</label>
    <input class="form-control {{ $errors->has('no_of_pcs') ? 'is-invalid' : '' }}" type="number" name="no_of_pcs" id="no_of_pcs" value="{{ old('no_of_pcs', '') }}" step="1" required disabled>
    @if($errors->has('no_of_pcs'))
        <div class="invalid-feedback">
            {{ $errors->first('no_of_pcs') }}
        </div>
    @endif
    <span class="help-block">{{ trans('cruds.awb.fields.no_of_pcs_helper') }}</span>
</div>
<div class="form-group col-md-3">
    <label class="required" for="goods_type">{{ trans('cruds.awb.fields.goods_type') }}</label>
    <input class="form-control {{ $errors->has('goods_type') ? 'is-invalid' : '' }}" type="text" name="goods_type" id="goods_type" value="{{ old('goods_type', '') }}" required disabled>
    @if($errors->has('goods_type'))
        <div class="invalid-feedback">
            {{ $errors->first('goods_type') }}
        </div>
    @endif
    <span class="help-block">{{ trans('cruds.awb.fields.goods_type_helper') }}</span>
</div>
<div class="form-group col-md-3">
    <label class="required" for="goods_weight">{{ trans('cruds.awb.fields.goods_weight') }}</label>
    <input class="form-control {{ $errors->has('goods_weight') ? 'is-invalid' : '' }}" type="number" name="goods_weight" id="goods_weight" value="{{ old('goods_weight', '') }}" step="0.01" required disabled>
    @if($errors->has('goods_weight'))
        <div class="invalid-feedback">
            {{ $errors->first('goods_weight') }}
        </div>
    @endif
    <span class="help-block">{{ trans('cruds.awb.fields.goods_weight_helper') }}</span>
</div>
<div class="form-group col-md-3">
    <label class="required" for="decleration_no">{{ trans('cruds.awb.fields.decleration_no') }}</label>
    <input class="form-control {{ $errors->has('decleration_no') ? 'is-invalid' : '' }}" type="number" name="decleration_no" id="decleration_no" value="{{ old('decleration_no', '') }}" step="1" required disabled>
    @if($errors->has('decleration_no'))
        <div class="invalid-feedback">
            {{ $errors->first('decleration_no') }}
        </div>
    @endif
    <span class="help-block">{{ trans('cruds.awb.fields.decleration_no_helper') }}</span>
</div>

<div class="form-group col-md-3">
    <label class="required" for="declaration_date">{{ trans('cruds.awb.fields.declaration_date') }}</label>
    <input class="form-control date {{ $errors->has('declaration_date') ? 'is-invalid' : '' }}" type="text" name="declaration_date" id="declaration_date" value="{{ old('declaration_date') }}" required disabled>
    @if($errors->has('declaration_date'))
        <div class="invalid-feedback">
            {{ $errors->first('declaration_date') }}
        </div>
    @endif
    <span class="help-block">{{ trans('cruds.awb.fields.declaration_date_helper') }}</span>
</div>
<div class="form-group col-md-3">
    <label class="required" for="delivery_no">{{ trans('cruds.awb.fields.delivery_no') }}</label>
    <input class="form-control {{ $errors->has('delivery_no') ? 'is-invalid' : '' }}" type="number" name="delivery_no" id="delivery_no" value="{{ old('delivery_no', '') }}" step="1" required disabled>
    @if($errors->has('delivery_no'))
        <div class="invalid-feedback">
            {{ $errors->first('delivery_no') }}
        </div>
    @endif
    <span class="help-block">{{ trans('cruds.awb.fields.delivery_no_helper') }}</span>
</div>
<div class="form-group col-md-3">
    <label class="required" for="delivery_date">{{ trans('cruds.awb.fields.delivery_date') }}</label>
    <input class="form-control date {{ $errors->has('delivery_date') ? 'is-invalid' : '' }}" type="text" name="delivery_date" id="delivery_date" value="{{ old('delivery_date') }}" required disabled>
    @if($errors->has('delivery_date'))
        <div class="invalid-feedback">
            {{ $errors->first('delivery_date') }}
        </div>
    @endif
    <span class="help-block">{{ trans('cruds.awb.fields.delivery_date_helper') }}</span>
</div>
<div class="form-group col-md-3">
    <label class="required" for="arrival_date">{{ trans('cruds.invoice.fields.arrival_date') }}</label>
    <input class="form-control date {{ $errors->has('arrival_date') ? 'is-invalid' : '' }}" type="text" name="arrival_date" id="arrival_date" value="{{Carbon::now()->format('d-m-Y') }}" required disabled>
    @if($errors->has('arrival_date'))
        <div class="inval
id-feedback">
            {{ $errors->first('arrival_date') }}
        </div>
    @endif
    <span class="help-block">{{ trans('cruds.invoice.fields.arrival_date_helper') }}</span>
</div>

                    <div class="form-group col-md-3">
    <label for="receipt_no">{{ trans('cruds.awb.fields.receipt_no') }}</label>
    <input class="form-control {{ $errors->has('receipt_no') ? 'is-invalid' : '' }}" type="number" name="receipt_no" id="receipt_no" value="{{ old('receipt_no', '') }}" step="1" disabled>
    @if($errors->has('receipt_no'))
        <div class="invalid-feedback">
            {{ $errors->first('receipt_no') }}
        </div>
    @endif
    <span class="help-block">{{ trans('cruds.awb.fields.receipt_no_helper') }}</span>
</div>
<div class="form-group col-md-3">
    <label for="receipt_date">{{ trans('cruds.awb.fields.receipt_date') }}</label>
    <input class="form-control date {{ $errors->has('receipt_date') ? 'is-invalid' : '' }}" type="text" name="receipt_date" id="receipt_date" value="{{ old('receipt_date') }}" disabled>
    @if($errors->has('receipt_date'))
        <div class="invalid-feedback">
            {{ $errors->first('receipt_date') }}
        </div>
    @endif
    <span class="help-block">{{ trans('cruds.awb.fields.receipt_date_helper') }}</span>
</div>

                </div>
            </div>
        </div>
        <div class="row">
       
        <div class="card col-md-8">
            <div class="card-header">
                <strong style="color: #00008B;"> Fees </strong>
            </div>
            <div class="card-body">
              <div class="row">
             <div class="form-group col-md-4">           
            <label>Clearance</label>
            <input class="form-control {{ $errors->has('clearance_fee') ? 'is-invalid' : '' }}" type="text" name="clearance_fee" id="clearance_fee" disabled   value="" />
                    </div>
                    <div class="form-group col-md-4">           
                        <label>loading fee</label>
                        <input class="form-control {{ $errors->has('loading_fee') ? 'is-invalid' : '' }}" type="text" name="loading_fee" id="loading_fee" disabled   value="" />
                                </div>
                                <div class="form-group col-md-4">           
                                    <label>transportaion fee</label>
                                    <input class="form-control {{ $errors->has('transportaion') ? 'is-invalid' : '' }}" type="text" name="transportaion" id="transportaion" disabled   value="" />
                                            </div>       
                                            <div class="form-group col-md-4">           
                                                <label>custom fee</label>
                                                <input class="form-control {{ $errors->has('customer_fees') ? 'is-invalid' : '' }}" type="text" name="customer_fees" id="customer_fees" disabled   value="" />
                                                        </div>    
                                                        <div class="form-group col-md-4">           
                                                            <label>delivery order</label>
                                                            <input class="form-control {{ $errors->has('delivery_amount') ? 'is-invalid' : '' }}" type="text" name="delivery_amount" id="delivery_amount" disabled   value="" />
                                                                    </div>    
                    </div>
                    </div>
                </div> 
                <div class="col">
            <div class="form-group col-md-4"> 
          <label>Amount</label>              
                    <input value="" type="number" id="amount" name="amount" required>  
                    </div>
        <div class="form-group col-md-4"> 
            <label>VAT(15%)</label>              
            <input value="22.5" type="vat" id="vat" name="vat" required >  
                      </div>
          <div class="form-group col-md-4"> 
            <label>Total</label>             
            <input value="" type="number" id="total" name="total" step="0.01" required>   
                      </div>
          </div>
        </div>
        <div class="form-group">
            <label class="required" for="remarks">{{ trans('cruds.invoice.fields.remarks') }}</label>
            <input class="form-control {{ $errors->has('remarks') ? 'is-invalid' : '' }}" name="remarks" id="remarks" required/>
            @if($errors->has('remarks'))
                <div class="invalid-feedback">
                    {{ $errors->first('remarks') }}
                </div>
            @endif
            <span class="help-block">{{ trans('cruds.invoice.fields.remarks_helper') }}</span>
        </div>

            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
@section('scripts')
<script>
function myFunction() {
    var num = document.getElementById("awb_no").value;
    $.ajax({
            type: 'get',
            url: "{{ route('admin.awb.get_date') }}",
            data:{
                'num':num,
            },
            success: function (data) {
                if (data.status == true) {
                    document.getElementById("client_name").value = data.value.notification.client.client_name;
                    document.getElementById("client_id").value = data.value.notification.client.id;
                    document.getElementById("awb_id").value = data.value.id;
                    document.getElementById("goods_date").value = data.value.goods_date;
                    document.getElementById("no_of_pcs").value = data.value.no_of_pcs;
                    document.getElementById("goods_type").value = data.value.goods_type;
                    document.getElementById("goods_weight").value = data.value.goods_weight;
                    document.getElementById("decleration_no").value = data.value.decleration_no;
                    document.getElementById("delivery_no").value = data.value.delivery_no;
                    document.getElementById("declaration_date").value = data.value.declaration_date;
                    document.getElementById("delivery_date").value = data.value.delivery_date;
                    document.getElementById("receipt_no").value = data.value.receipt_no;
                    document.getElementById("receipt_date").value = data.value.receipt_date;
                    document.getElementById("clearance_fee").value = data.fees.clearance_fee;
                    document.getElementById("loading_fee").value = data.fees.loading_fee;
                    document.getElementById("transportaion").value = data.fees.transportaion;
                    document.getElementById("customer_fees").value = data.value.customer_fees;
                    document.getElementById("delivery_amount").value = data.value.delivery_amount;
                    document.getElementById("amount").value =data.amount;
                    document.getElementById("vat").value =data.vat;
                    document.getElementById("total").value =data.total;
                }
                else
                alert('oops .. Enter Vaild Awb number')
            },
        });
}
</script>
    @endsection
    
