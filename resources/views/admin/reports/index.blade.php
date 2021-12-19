@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <strong style="color: #00008B;">Invoices Report By date</strong>
    </div>
    <div class="card-body">
            <form action="{{route('admin.invoice.reportsByDate')}}">
                @csrf
                <div class="row">
                    <div class="form-group col-md-3">
                        <label  class="required">From</label>
                <input name="start_date"  class="form-control date" required >
                    </div>
                    <div class="form-group col-md-3">
                        <label class="required">To</label>
                <input name="end_date"  class="form-control date " required>
                    </div>
                </div>
                <button type="submit" class="btn btn-xs btn-info">preview</button>
            </form>
    </div>
</div>
<div class="card">
    <div class="card-header">
        <strong style="color: #00008B;">Invoices Report By Client</strong>
    </div>
    <div class="card-body">
            <form action="{{route('admin.invoice.reportsByClient')}}">
                @csrf
                <div class="form-group">
                    <label class="required" for="client_id">{{ trans('cruds.notification.fields.client') }}</label>
                    <select class="form-control select2 {{ $errors->has('client') ? 'is-invalid' : '' }}" name="client_id" id="client_id" required>
                        @foreach($clients as $id => $entry)
                            <option value="{{ $id }}" {{ old('client_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('client'))
                        <div class="invalid-feedback">
                            {{ $errors->first('client') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.notification.fields.client_helper') }}</span>
                </div>
                <div class="row">
                    <div class="form-group col-md-3">
                        <label  class="required">From</label>
                <input name="start_date"  class="form-control date" required >
                    </div>
                    <div class="form-group col-md-3">
                        <label class="required">To</label>
                <input name="end_date"  class="form-control date " required>
                    </div>
                </div>
                <button type="submit" class="btn btn-xs btn-info">preview</button>
            </form>
    </div>
</div>
@endsection