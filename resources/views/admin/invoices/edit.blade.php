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
            <div class="form-group">
                <label class="required" for="awb_id">{{ trans('cruds.invoice.fields.awb') }}</label>
                <select class="form-control select2 {{ $errors->has('awb') ? 'is-invalid' : '' }}" name="awb_id" id="awb_id" required>
                    @foreach($awbs as $id => $entry)
                        <option value="{{ $id }}" {{ (old('awb_id') ? old('awb_id') : $invoice->awb->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('awb'))
                    <div class="invalid-feedback">
                        {{ $errors->first('awb') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.invoice.fields.awb_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="goods_release">{{ trans('cruds.invoice.fields.goods_release') }}</label>
                <input class="form-control date {{ $errors->has('goods_release') ? 'is-invalid' : '' }}" type="text" name="goods_release" id="goods_release" value="{{ old('goods_release', $invoice->goods_release) }}">
                @if($errors->has('goods_release'))
                    <div class="invalid-feedback">
                        {{ $errors->first('goods_release') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.invoice.fields.goods_release_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="invoice_date">{{ trans('cruds.invoice.fields.invoice_date') }}</label>
                <input class="form-control date {{ $errors->has('invoice_date') ? 'is-invalid' : '' }}" type="text" name="invoice_date" id="invoice_date" value="{{ old('invoice_date', $invoice->invoice_date) }}" required>
                @if($errors->has('invoice_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('invoice_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.invoice.fields.invoice_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="client_id">{{ trans('cruds.invoice.fields.client') }}</label>
                <select class="form-control select2 {{ $errors->has('client') ? 'is-invalid' : '' }}" name="client_id" id="client_id" required>
                    @foreach($clients as $id => $entry)
                        <option value="{{ $id }}" {{ (old('client_id') ? old('client_id') : $invoice->client->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('client'))
                    <div class="invalid-feedback">
                        {{ $errors->first('client') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.invoice.fields.client_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="amount">{{ trans('cruds.invoice.fields.amount') }}</label>
                <input class="form-control {{ $errors->has('amount') ? 'is-invalid' : '' }}" type="number" name="amount" id="amount" value="{{ old('amount', $invoice->amount) }}" step="0.01" required>
                @if($errors->has('amount'))
                    <div class="invalid-feedback">
                        {{ $errors->first('amount') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.invoice.fields.amount_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="vat">{{ trans('cruds.invoice.fields.vat') }}</label>
                <input class="form-control {{ $errors->has('vat') ? 'is-invalid' : '' }}" type="number" name="vat" id="vat" value="{{ old('vat', $invoice->vat) }}" step="0.01" required>
                @if($errors->has('vat'))
                    <div class="invalid-feedback">
                        {{ $errors->first('vat') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.invoice.fields.vat_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="total">{{ trans('cruds.invoice.fields.total') }}</label>
                <input class="form-control {{ $errors->has('total') ? 'is-invalid' : '' }}" type="number" name="total" id="total" value="{{ old('total', $invoice->total) }}" step="0.01" required>
                @if($errors->has('total'))
                    <div class="invalid-feedback">
                        {{ $errors->first('total') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.invoice.fields.total_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="remarks">{{ trans('cruds.invoice.fields.remarks') }}</label>
                <textarea class="form-control {{ $errors->has('remarks') ? 'is-invalid' : '' }}" name="remarks" id="remarks" required>{{ old('remarks', $invoice->remarks) }}</textarea>
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