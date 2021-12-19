@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.client.title_singular') }}
        </div>

        <div class="card-body">
            <form id="clientForm" action="" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <strong style="color: #00008B;"> Client Information</strong>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label
                                    for="client_no">{{ trans('cruds.client.fields.client_no') }}</label>
                                <input class="form-control {{ $errors->has('client_no') ? 'is-invalid' : '' }}" type="text"
                                    name="client_no" id="client_no"     value="" />
                            </div>
                            <div class="form-group col-md-6">
                                <label class="required"
                                    for="client_name">{{ trans('cruds.client.fields.client_name') }}</label>
                                <input class="form-control {{ $errors->has('client_name') ? 'is-invalid' : '' }}"
                                    type="text" name="client_name" id="client_name" value="{{ old('client_name', '') }}"
                                    required>
                                @if ($errors->has('client_name'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('client_name') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.client.fields.client_name_helper') }}</span>
                            </div>
                            
                            <div class="form-group col-md-3">
                                <label class=""
                                    for="tel_1">{{ trans('cruds.client.fields.tel_1') }}</label>
                                <input class="form-control {{ $errors->has('tel_1') ? 'is-invalid' : '' }}" type="text"
                                    name="tel_1" id="tel_1" value="{{ old('tel_1', '') }}" >
                                @if ($errors->has('tel_1'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('tel_1') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.client.fields.tel_1_helper') }}</span>
                            </div>

                            <div class="form-group col-md-3">
                                <label class=""
                                    for="tax_number">{{ trans('cruds.client.fields.tax_number') }}</label>
                                <input class="form-control {{ $errors->has('tax_number') ? 'is-invalid' : '' }}"
                                    type="text" name="tax_number" id="tax_number" value="{{ old('tax_number', '') }}"
                                    >
                                @if ($errors->has('tax_number'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('tax_number') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.client.fields.tax_number_helper') }}</span>
                            </div>
                            <div class="form-group col-md-6">
                                <label class=""
                                    for="short_name">{{ trans('cruds.client.fields.short_name') }}</label>
                                <input class="form-control {{ $errors->has('short_name') ? 'is-invalid' : '' }}"
                                    type="text" name="short_name" id="short_name" value="{{ old('short_name', '') }}"
                                    >
                                @if ($errors->has('short_name'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('short_name') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.client.fields.short_name_helper') }}</span>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="tel_2">{{ trans('cruds.client.fields.tel_2') }}</label>
                                <input class="form-control {{ $errors->has('tel_2') ? 'is-invalid' : '' }}" type="text"
                                    name="tel_2" id="tel_2" value="{{ old('tel_2', '') }}">
                                @if ($errors->has('tel_2'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('tel_2') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.client.fields.tel_2_helper') }}</span>
                            </div>
                            <div class="form-group col-md-3">
                                <label class=""
                                    for="email">{{ trans('cruds.client.fields.email') }}</label>
                                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email"
                                    name="email" id="email" value="{{ old('email') }}" >
                                @if ($errors->has('email'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('email') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.client.fields.email_helper') }}</span>
                            </div>
                            <div class="form-group col-md-6">
                                <label class=""
                                    for="address">{{ trans('cruds.client.fields.address') }}</label>
                                <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text"
                                    name="address" id="address" value="{{ old('address', '') }}" >
                                @if ($errors->has('address'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('address') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.client.fields.address_helper') }}</span>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="fax">{{ trans('cruds.client.fields.fax') }}</label>
                                <input class="form-control {{ $errors->has('fax') ? 'is-invalid' : '' }}" type="text"
                                    name="fax" id="fax" value="{{ old('fax', '') }}">
                                @if ($errors->has('fax'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('fax') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.client.fields.fax_helper') }}</span>
                            </div>
                            <div class="form-group col-md-3">
                                <label class=""
                                    for="contact_person">{{ trans('cruds.client.fields.contact_person') }}</label>
                                <input class="form-control {{ $errors->has('contact_person') ? 'is-invalid' : '' }}"
                                    type="text" name="contact_person" id="contact_person"
                                    value="{{ old('contact_person', '') }}" >
                                @if ($errors->has('contact_person'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('contact_person') }}
                                    </div>
                                @endif
                                <span
                                    class="help-block">{{ trans('cruds.client.fields.contact_person_helper') }}</span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="contact_person_2">{{ trans('cruds.client.fields.contact_person_2') }}</label>
                                <input class="form-control {{ $errors->has('contact_person_2') ? 'is-invalid' : '' }}"
                                    type="text" name="contact_person_2" id="contact_person_2"
                                    value="{{ old('contact_person_2', '') }}">
                                @if ($errors->has('contact_person_2'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('contact_person_2') }}
                                    </div>
                                @endif
                                <span
                                    class="help-block">{{ trans('cruds.client.fields.contact_person_2_helper') }}</span>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="bank_name">{{ trans('cruds.client.fields.bank_name') }}</label>
                                <input class="form-control {{ $errors->has('bank_name') ? 'is-invalid' : '' }}"
                                    type="text" name="bank_name" id="bank_name" value="{{ old('bank_name', '') }}">
                                @if ($errors->has('bank_name'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('bank_name') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.client.fields.bank_name_helper') }}</span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="home_tel">{{ trans('cruds.client.fields.home_tel') }}</label>
                                <input class="form-control {{ $errors->has('home_tel') ? 'is-invalid' : '' }}"
                                    type="text" name="home_tel" id="home_tel" value="{{ old('home_tel', '') }}">
                                @if ($errors->has('home_tel'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('home_tel') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.client.fields.home_tel_helper') }}</span>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="iban">{{ trans('cruds.client.fields.iban') }}</label>
                                <input class="form-control {{ $errors->has('iban') ? 'is-invalid' : '' }}" type="text"
                                    name="iban" id="iban" value="{{ old('iban', '') }}">
                                @if ($errors->has('iban'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('iban') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.client.fields.iban_helper') }}</span>
                            </div>
                            <div class="form-group col-md-6">
                                <label class=""
                                    for="mobile_number_1">{{ trans('cruds.client.fields.mobile_number_1') }}</label>
                                <input class="form-control {{ $errors->has('mobile_number_1') ? 'is-invalid' : '' }}"
                                    type="text" name="mobile_number_1" id="mobile_number_1"
                                    value="{{ old('mobile_number_1', '') }}" >
                                @if ($errors->has('mobile_number_1'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('mobile_number_1') }}
                                    </div>
                                @endif
                                <span
                                    class="help-block">{{ trans('cruds.client.fields.mobile_number_1_helper') }}</span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="mobile_number_2">{{ trans('cruds.client.fields.mobile_number_2') }}</label>
                                <input class="form-control {{ $errors->has('mobile_number_2') ? 'is-invalid' : '' }}"
                                    type="text" name="mobile_number_2" id="mobile_number_2"
                                    value="{{ old('mobile_number_2', '') }}">
                                @if ($errors->has('mobile_number_2'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('mobile_number_2') }}
                                    </div>
                                @endif
                                <span
                                    class="help-block">{{ trans('cruds.client.fields.mobile_number_2_helper') }}</span>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="remarks">{{ trans('cruds.client.fields.remarks') }}</label>
                            <input class="form-control {{ $errors->has('remarks') ? 'is-invalid' : '' }}" name="remarks"
                                id="remarks" value="{{ old('remarks') }}">
                            @if ($errors->has('remarks'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('remarks') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.client.fields.remarks_helper') }}</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <strong style="color: #00008B;"> Client fees</strong>
                            </div>
                            <div class="card-body">
                                @include('admin.clients.partial.fees')
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <strong style="color: #00008B;"> Statement Of Account</strong>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label 
                                        for="from">{{ trans('cruds.client.fields.from') }}</label>
                                    <input class="form-control date {{ $errors->has('from') ? 'is-invalid' : '' }}"
                                        type="text" name="from" id="from" value="{{ old('from') }}" >
                                    @if ($errors->has('from'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('from') }}
                                        </div>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.client.fields.from_helper') }}</span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label  for="to">{{ trans('cruds.client.fields.to') }}</label>
                                    <input class="form-control date {{ $errors->has('to') ? 'is-invalid' : '' }}"
                                        type="text" name="to" id="to" value="{{ old('to') }}" >
                                    @if ($errors->has('to'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('to') }}
                                        </div>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.client.fields.to_helper') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-danger" id="save_client" >
                        {{ trans('global.save') }}
                    </button>
                </div>
                <div class="alert alert-success" id="success_msg" style="display: none;">
                  Client Information Saved successfully
                  </div>
                  <div class="alert alert-danger" id="failed_msg" style="display: none;">
                  Something wentwrong please try again
                    </div>
                  
            </form>
        </div>
    </div>



@endsection
@section('scripts')
    <script>
        $(document).on('click', '#save_client', function (e) {
            e.preventDefault();
            $('#client_name_error').text('');
            $('#tel_1_error').text('');
            $('#tel_2_error').text('');
            $('#tax_number_error').text('');
            $('#short_name_error').text('');
            $('#email_error').text('');
            $('#address_error').text('');
            $('#fax_error').text('');
            $('#contact_person_error').text('');
            $('#contact_person_2_error').text('');
            $('#bank_name_error').text('');
            $('#home_tel_error').text('');
            $('#iban_error').text('');
            $('#mobile_number_error').text('');
            $('#mobile_number_2_error').text('');
            $('#remarks_error').text('');
            $('#from_error').text('');
            $('#to_error').text('');
            
            
            var formData = new FormData($('#clientForm')[0]);
            $.ajax({
                type: 'post',
                enctype: 'multipart/form-data',
                url: "{{ route('admin.clients.store') }}",
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                success: function (data) {
                    if (data.status == true) {
                        document.getElementById("client_no").value = data.value;
                        $('#success_msg').show();
                        
                    }
                    else{

                        $('#failed_msg').show();
                    }
                }, error: function (reject) {
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function (key, val) {
                        $("#" + key + "_error").text(val[0]);
                    });
                }
            });
        });
    </script>
@endsection