@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.invoice.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.invoices.update", [$invoice->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row">
                           <div class="form-group col-md-3">
                <label for="serial_no"> <strong style="color: #00008B;">Invoice Serial No:</strong></label>
                <input class="form-control {{ $errors->has('serial_no') ? 'is-invalid' : '' }}" type="text" name="serial_no" id="serial_no" value="{{ old('serial_no',$invoice->serial_no) }}" step="1"    >
            </div>
            <div class="form-group col-md-8">
            <a href="{{route('admin.invoices.print', $invoice->id)}}" target="_blank"  class="btn btn-info">print</a> 
            </div>
      </div>
            <div class="card">
                <div class="card-header">
                    <strong style="color: #00008B;"></strong>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-3">
                <label class="required" for="awb_no">{{ trans('cruds.awb.fields.awb_no') }}</label>
                <input class="form-control {{ $errors->has('awb_no') ? 'is-invalid' : '' }}" type="text" name="awb_no" id="awb_no" value="{{ old('awb_no',$invoice->awb->awb_no) }}" step="1" disabled >
                @if($errors->has('awb_no'))
                    <div class="invalid-feedback">
                        {{ $errors->first('awb_no') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.awb.fields.awb_no_helper') }}</span>
            </div>
            <div class="form-group col-md-3">
                <label  for="client_name">{{ trans('cruds.awb.fields.client_name') }}</label>
                <input class="form-control {{ $errors->has('client_name') ? 'is-invalid' : '' }}" type="text" name="client_name" id="client_name"    value="{{$invoice->client->client_name}}" disabled>
              </div>
              <div class="form-group col-md-3">
                <label for="goods_date">{{ trans('cruds.awb.fields.goods_date') }}</label>
                <input class="form-control date {{ $errors->has('goods_date') ? 'is-invalid' : '' }}" type="text" name="goods_date" id="goods_date" value="{{ old('goods_date',$invoice->goods_date) }}" disabled  />
                @if($errors->has('goods_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('goods_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.awb.fields.goods_date_helper') }}</span>
            </div>
            <div class="form-group col-md-3">
                <label class="required" for="invoice_date">{{ trans('cruds.invoice.fields.invoice_date') }}</label>
                <input class="form-control date {{ $errors->has('invoice_date') ? 'is-invalid' : '' }}" type="text" name="invoice_date" id="invoice_date" value="{{$invoice->invoice_date}}" required >
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
    <input class="form-control {{ $errors->has('no_of_pcs') ? 'is-invalid' : '' }}" type="number" name="no_of_pcs" id="no_of_pcs" value="{{ old('no_of_pcs',$invoice->awb->no_of_pcs) }}" step="1" required disabled>
    @if($errors->has('no_of_pcs'))
        <div class="invalid-feedback">
            {{ $errors->first('no_of_pcs') }}
        </div>
    @endif
    <span class="help-block">{{ trans('cruds.awb.fields.no_of_pcs_helper') }}</span>
</div>
<div class="form-group col-md-3">
    <label class="required" for="goods_type">{{ trans('cruds.awb.fields.goods_type') }}</label>
    <input class="form-control {{ $errors->has('goods_type') ? 'is-invalid' : '' }}" type="text" name="goods_type" id="goods_type" value="{{ old('goods_type',$invoice->awb->goods_type) }}" required disabled>
    @if($errors->has('goods_type'))
        <div class="invalid-feedback">
            {{ $errors->first('goods_type') }}
        </div>
    @endif
    <span class="help-block">{{ trans('cruds.awb.fields.goods_type_helper') }}</span>
</div>
<div class="form-group col-md-3">
    <label class="required" for="goods_weight">{{ trans('cruds.awb.fields.goods_weight') }}</label>
    <input class="form-control {{ $errors->has('goods_weight') ? 'is-invalid' : '' }}" type="number" name="goods_weight" id="goods_weight" value="{{ old('goods_weight', $invoice->awb->goods_weight) }}" step="0.01" required disabled>
    @if($errors->has('goods_weight'))
        <div class="invalid-feedback">
            {{ $errors->first('goods_weight') }}
        </div>
    @endif
    <span class="help-block">{{ trans('cruds.awb.fields.goods_weight_helper') }}</span>
</div>
<div class="form-group col-md-3">
    <label class="required" for="decleration_no">{{ trans('cruds.awb.fields.decleration_no') }}</label>
    <input class="form-control {{ $errors->has('decleration_no') ? 'is-invalid' : '' }}" type="number" name="decleration_no" id="decleration_no" value="{{ old('decleration_no', $invoice->awb->decleration_no) }}" step="1" required disabled>
    @if($errors->has('decleration_no'))
        <div class="invalid-feedback">
            {{ $errors->first('decleration_no') }}
        </div>
    @endif
    <span class="help-block">{{ trans('cruds.awb.fields.decleration_no_helper') }}</span>
</div>

<div class="form-group col-md-3">
    <label class="required" for="declaration_date">{{ trans('cruds.awb.fields.declaration_date') }}</label>
    <input class="form-control date {{ $errors->has('declaration_date') ? 'is-invalid' : '' }}" type="text" name="declaration_date" id="declaration_date" value="{{ old('declaration_date',$invoice->awb->declaration_date) }}" required disabled>
    @if($errors->has('declaration_date'))
        <div class="invalid-feedback">
            {{ $errors->first('declaration_date') }}
        </div>
    @endif
    <span class="help-block">{{ trans('cruds.awb.fields.declaration_date_helper') }}</span>
</div>
<div class="form-group col-md-3">
    <label class="required" for="delivery_no">{{ trans('cruds.awb.fields.delivery_no') }}</label>
    <input class="form-control {{ $errors->has('delivery_no') ? 'is-invalid' : '' }}" type="number" name="delivery_no" id="delivery_no" value="{{ old('delivery_no',$invoice->awb->delivery_no) }}" step="1" required disabled>
    @if($errors->has('delivery_no'))
        <div class="invalid-feedback">
            {{ $errors->first('delivery_no') }}
        </div>
    @endif
    <span class="help-block">{{ trans('cruds.awb.fields.delivery_no_helper') }}</span>
</div>
<div class="form-group col-md-3">
    <label class="required" for="delivery_date">{{ trans('cruds.awb.fields.delivery_date') }}</label>
    <input class="form-control date {{ $errors->has('delivery_date') ? 'is-invalid' : '' }}" type="text" name="delivery_date" id="delivery_date" value="{{ old('delivery_date',$invoice->awb->delivery_date) }}" required disabled>
    @if($errors->has('delivery_date'))
        <div class="invalid-feedback">
            {{ $errors->first('delivery_date') }}
        </div>
    @endif
    <span class="help-block">{{ trans('cruds.awb.fields.delivery_date_helper') }}</span>
</div>
<div class="form-group col-md-3">
    <label class="required" for="arrival_date">{{ trans('cruds.invoice.fields.arrival_date') }}</label>
    <input class="form-control date {{ $errors->has('arrival_date') ? 'is-invalid' : '' }}" type="text" name="arrival_date" id="arrival_date" value="{{$invoice->awb->arrival_date}}" required disabled>
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
    <input class="form-control {{ $errors->has('receipt_no') ? 'is-invalid' : '' }}" type="number" name="receipt_no" id="receipt_no" value="{{ old('receipt_no',$invoice->awb->receipt_no)}}" step="1" disabled>
    @if($errors->has('receipt_no'))
        <div class="invalid-feedback">
            {{ $errors->first('receipt_no') }}
        </div>
    @endif
    <span class="help-block">{{ trans('cruds.awb.fields.receipt_no_helper') }}</span>
</div>
<div class="form-group col-md-3">
    <label for="receipt_date">{{ trans('cruds.awb.fields.receipt_date') }}</label>
    <input class="form-control date {{ $errors->has('receipt_date') ? 'is-invalid' : '' }}" type="text" name="receipt_date" id="receipt_date" value="{{ old('receipt_date',$invoice->awb->receipt_date) }}" disabled>
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
            <input class="form-control {{ $errors->has('clearance_fee') ? 'is-invalid' : '' }}" type="text" name="clearance_fee" id="clearance_fee"    value="{{$invoice->clearance_fee}}" />
                    </div>
                    <div class="form-group col-md-4">           
                        <label>loading fee</label>
                        <input class="form-control {{ $errors->has('loading_fee') ? 'is-invalid' : '' }}" type="text" name="loading_fee" id="loading_fee"   value="{{$invoice->loading_fee}}"/>
                                </div>
                                <div class="form-group col-md-4">           
                                    <label>transportaion fee</label>
                                    <input class="form-control {{ $errors->has('transportaion') ? 'is-invalid' : '' }}" type="text" name="transportaion" id="transportaion"  value="{{$invoice->transportaion}}"/>
                                            </div>       
                                            <div class="form-group col-md-4">           
                                                <label>custom fee</label>
                                                <input class="form-control {{ $errors->has('customer_fees') ? 'is-invalid' : '' }}" type="text" name="customer_fees" id="customer_fees"    value="{{$invoice->customer_fees}}" />
                                                        </div>    
                                                        <div class="form-group col-md-4">           
                                                            <label>delivery order</label>
                                                            <input class="form-control {{ $errors->has('delivery_amount') ? 'is-invalid' : '' }}" type="text" name="delivery_amount" id="delivery_amount"    value="{{$invoice->delivery_amount}}" />
                                                            </div>
                                                 <!---  -->
                                                 
                                                  <div class="form-group col-md-4">  
                                                 
                                                                          <label>Translation\Scan</label>
                                                            <input class="form-control {{ $errors->has('delivery_amount') ? 'is-invalid' : '' }}" type="text" name="scan" id="delivery_amount"    value="{{$invoice->scan}}" />
                                                            </div>
                                                            
                                                 <div class="form-group col-md-4">              
                                                                        
                                                                          <label>Air\See</label>
                                                            <input class="form-control {{ $errors->has('delivery_amount') ? 'is-invalid' : '' }}" type="text" name="air" id="delivery_amount"    value="{{$invoice->air}}" />
                                                                             </div>
                                                            
                                                 <div class="form-group col-md-4">  
                                                                        
                                                                          <label>Exp\Imp formalities</label>
                                                            <input class="form-control {{ $errors->has('delivery_amount') ? 'is-invalid' : '' }}" type="text" name="formalities" id="delivery_amount"    value="{{$invoice->formalities}}" /> 
                                                                             </div>
                                                            
                                                 <div class="form-group col-md-4">  
                                                                          <label>Demuerrage</label>
                                                            <input class="form-control {{ $errors->has('delivery_amount') ? 'is-invalid' : '' }}" type="text" name="demuerrage" id="delivery_amount"    value="{{$invoice->demuerrage}}" />  
                                                                             </div>
                                                            
                                                 <div class="form-group col-md-4">  
                                                                          <label>Legalization</label>
                                                            <input class="form-control {{ $errors->has('delivery_amount') ? 'is-invalid' : '' }}" type="text" name="legalization" id="delivery_amount"    value="{{$invoice->legalization}}" />  
                                                                             </div>
                                                            
                                                 <div class="form-group col-md-4">  
                                                                 <label>undertaking</label>
                                                            <input class="form-control {{ $errors->has('delivery_amount') ? 'is-invalid' : '' }}" type="text" name="undertaking" id="delivery_amount"    value="{{$invoice->undertaking}}" /> 
                                                                             </div>
                                                            
                                                 <div class="form-group col-md-4">  
                                                                          <label>Other Expenses</label>
                                                            <input class="form-control {{ $errors->has('delivery_amount') ? 'is-invalid' : '' }}" type="text" name="other" id="delivery_amount"    value="{{$invoice->other}}" />
                                                            <!-- -->
                                                            
                                              
                                                 </div>
                                                                       
                    </div>
                    </div>
                </div> 
                <div class="col">
            <div class="form-group col-md-4"> 
          <label>Amount</label>              
                    <input type="number" id="amount" name="amount" value="{{$invoice->amount}}"required disabled>  
                    </div>
        <div class="form-group col-md-4"> 
            <label>VAT(15%)</label>              
            <input type="vat" id="vat" name="vat" value="{{$invoice->vat}}"required disabled >  
                      </div>
          <div class="form-group col-md-4"> 
            <label>Total</label>             
            <input type="number" id="total" name="total" step="0.01"  value="{{$invoice->total}}" required disabled>   
                      </div>
          </div>
        </div>
        <div class="form-group">
            <label  for="remarks">{{ trans('cruds.invoice.fields.remarks') }}</label>
            <input class="form-control {{ $errors->has('remarks') ? 'is-invalid' : '' }}" name="remarks" id="remarks" required  value ="{{$invoice->remarks}}" />
            @if($errors->has('remarks'))
                <div class="invalid-feedback">
                    {{ $errors->first('remarks') }}
                </div>
            @endif
            <span class="help-block">{{ trans('cruds.invoice.fields.remarks_helper') }}</span>
        </div>
<div class="row">
            <div class="col-md-4">
                <button class="btn btn-danger" id="save_invoice">
                    {{ trans('global.save') }}
                </button>
                </div>
                <div class="col-md-4">
                <a href="{{route('admin.invoices.print', $invoice->id)}}" target="_blank" class="btn btn-info">print</a> 
                </div>
                  <div class="col-md-4">
                <a href="{{route('admin.invoices.index')}}" class="btn btn-defult">Back</a> 
                </div>
            </div>
              
  </div>
                      
                  </div>
           
        </form>
     
               </div>

@endsection