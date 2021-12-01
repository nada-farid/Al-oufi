@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.client.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.clients.update", [$client->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="client_name">{{ trans('cruds.client.fields.client_name') }}</label>
                <input class="form-control {{ $errors->has('client_name') ? 'is-invalid' : '' }}" type="text" name="client_name" id="client_name" value="{{ old('client_name', $client->client_name) }}" required>
                @if($errors->has('client_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('client_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.client_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="tel_1">{{ trans('cruds.client.fields.tel_1') }}</label>
                <input class="form-control {{ $errors->has('tel_1') ? 'is-invalid' : '' }}" type="text" name="tel_1" id="tel_1" value="{{ old('tel_1', $client->tel_1) }}" required>
                @if($errors->has('tel_1'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tel_1') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.tel_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tel_2">{{ trans('cruds.client.fields.tel_2') }}</label>
                <input class="form-control {{ $errors->has('tel_2') ? 'is-invalid' : '' }}" type="text" name="tel_2" id="tel_2" value="{{ old('tel_2', $client->tel_2) }}">
                @if($errors->has('tel_2'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tel_2') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.tel_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="tax_number">{{ trans('cruds.client.fields.tax_number') }}</label>
                <input class="form-control {{ $errors->has('tax_number') ? 'is-invalid' : '' }}" type="text" name="tax_number" id="tax_number" value="{{ old('tax_number', $client->tax_number) }}" required>
                @if($errors->has('tax_number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tax_number') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.tax_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="short_name">{{ trans('cruds.client.fields.short_name') }}</label>
                <input class="form-control {{ $errors->has('short_name') ? 'is-invalid' : '' }}" type="text" name="short_name" id="short_name" value="{{ old('short_name', $client->short_name) }}" required>
                @if($errors->has('short_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('short_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.short_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="email">{{ trans('cruds.client.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email', $client->email) }}" required>
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="address">{{ trans('cruds.client.fields.address') }}</label>
                <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" name="address" id="address" value="{{ old('address', $client->address) }}" required>
                @if($errors->has('address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.address_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fax">{{ trans('cruds.client.fields.fax') }}</label>
                <input class="form-control {{ $errors->has('fax') ? 'is-invalid' : '' }}" type="text" name="fax" id="fax" value="{{ old('fax', $client->fax) }}">
                @if($errors->has('fax'))
                    <div class="invalid-feedback">
                        {{ $errors->first('fax') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.fax_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="contact_person">{{ trans('cruds.client.fields.contact_person') }}</label>
                <input class="form-control {{ $errors->has('contact_person') ? 'is-invalid' : '' }}" type="text" name="contact_person" id="contact_person" value="{{ old('contact_person', $client->contact_person) }}" required>
                @if($errors->has('contact_person'))
                    <div class="invalid-feedback">
                        {{ $errors->first('contact_person') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.contact_person_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="contact_person_2">{{ trans('cruds.client.fields.contact_person_2') }}</label>
                <input class="form-control {{ $errors->has('contact_person_2') ? 'is-invalid' : '' }}" type="text" name="contact_person_2" id="contact_person_2" value="{{ old('contact_person_2', $client->contact_person_2) }}">
                @if($errors->has('contact_person_2'))
                    <div class="invalid-feedback">
                        {{ $errors->first('contact_person_2') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.contact_person_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="bank_name">{{ trans('cruds.client.fields.bank_name') }}</label>
                <input class="form-control {{ $errors->has('bank_name') ? 'is-invalid' : '' }}" type="text" name="bank_name" id="bank_name" value="{{ old('bank_name', $client->bank_name) }}">
                @if($errors->has('bank_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('bank_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.bank_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="home_tel">{{ trans('cruds.client.fields.home_tel') }}</label>
                <input class="form-control {{ $errors->has('home_tel') ? 'is-invalid' : '' }}" type="text" name="home_tel" id="home_tel" value="{{ old('home_tel', $client->home_tel) }}">
                @if($errors->has('home_tel'))
                    <div class="invalid-feedback">
                        {{ $errors->first('home_tel') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.home_tel_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="iban">{{ trans('cruds.client.fields.iban') }}</label>
                <input class="form-control {{ $errors->has('iban') ? 'is-invalid' : '' }}" type="text" name="iban" id="iban" value="{{ old('iban', $client->iban) }}">
                @if($errors->has('iban'))
                    <div class="invalid-feedback">
                        {{ $errors->first('iban') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.iban_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="mobile_number_1">{{ trans('cruds.client.fields.mobile_number_1') }}</label>
                <input class="form-control {{ $errors->has('mobile_number_1') ? 'is-invalid' : '' }}" type="text" name="mobile_number_1" id="mobile_number_1" value="{{ old('mobile_number_1', $client->mobile_number_1) }}" required>
                @if($errors->has('mobile_number_1'))
                    <div class="invalid-feedback">
                        {{ $errors->first('mobile_number_1') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.mobile_number_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mobile_number_2">{{ trans('cruds.client.fields.mobile_number_2') }}</label>
                <input class="form-control {{ $errors->has('mobile_number_2') ? 'is-invalid' : '' }}" type="text" name="mobile_number_2" id="mobile_number_2" value="{{ old('mobile_number_2', $client->mobile_number_2) }}">
                @if($errors->has('mobile_number_2'))
                    <div class="invalid-feedback">
                        {{ $errors->first('mobile_number_2') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.mobile_number_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="remarks">{{ trans('cruds.client.fields.remarks') }}</label>
                <textarea class="form-control {{ $errors->has('remarks') ? 'is-invalid' : '' }}" name="remarks" id="remarks">{{ old('remarks', $client->remarks) }}</textarea>
                @if($errors->has('remarks'))
                    <div class="invalid-feedback">
                        {{ $errors->first('remarks') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.remarks_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="from">{{ trans('cruds.client.fields.from') }}</label>
                <input class="form-control date {{ $errors->has('from') ? 'is-invalid' : '' }}" type="text" name="from" id="from" value="{{ old('from', $client->from) }}" required>
                @if($errors->has('from'))
                    <div class="invalid-feedback">
                        {{ $errors->first('from') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.from_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="to">{{ trans('cruds.client.fields.to') }}</label>
                <input class="form-control date {{ $errors->has('to') ? 'is-invalid' : '' }}" type="text" name="to" id="to" value="{{ old('to', $client->to) }}" required>
                @if($errors->has('to'))
                    <div class="invalid-feedback">
                        {{ $errors->first('to') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.to_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="fees">{{ trans('cruds.client.fields.fees') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('fees') ? 'is-invalid' : '' }}" name="fees[]" id="fees" multiple required>
                    @foreach($fees as $id => $fee)
                        <option value="{{ $id }}" {{ (in_array($id, old('fees', [])) || $client->fees->contains($id)) ? 'selected' : '' }}>{{ $fee }}</option>
                    @endforeach
                </select>
                @if($errors->has('fees'))
                    <div class="invalid-feedback">
                        {{ $errors->first('fees') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.fees_helper') }}</span>
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