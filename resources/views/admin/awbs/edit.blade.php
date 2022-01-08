@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.awb.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.awbs.update", [$awb->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="card">
                <div class="card-header">
                    <strong style="color: #00008B;"> AWB Information</strong>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-3">
                <label class="required" for="awb_no">{{ trans('cruds.awb.fields.awb_no') }}</label>
                <input class="form-control {{ $errors->has('awb_no') ? 'is-invalid' : '' }}" type="text" name="awb_no" id="awb_no" value="{{ old('awb_no', $awb->awb_no) }}" step="1" required>
                @if($errors->has('awb_no'))
                    <div class="invalid-feedback">
                        {{ $errors->first('awb_no') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.awb.fields.awb_no_helper') }}</span>
            </div>
         <!--   <div class="form-group col-md-3">
                <label  for="client_name">{{ trans('cruds.awb.fields.client_name') }}</label>
                @php
                 $client= App\Models\Client::where('id',$awb->notification->client_id)->first()    
                @endphp
                <input class="form-control {{ $errors->has('client_name') ? 'is-invalid' : '' }}" type="text" name="client_name" id="client_name" disabled   value="{{$client->client_name }}" />
              </div>-->
              <div class="form-group col-md-4">
                <label class="required" for="client_name">{{ trans('cruds.awb.fields.client_name') }}</label>
                <select class="form-control select2 {{ $errors->has('client') ? 'is-invalid' : '' }}" name="client_id" id="client_id" required>
                    @foreach($clients as $id => $entry)
                        <option value="{{ $id }}" {{ (old('client_id') ? old('client_id') : $client->id?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('client'))
                    <div class="invalid-feedback">
                        {{ $errors->first('client') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.notification.fields.client_helper') }}</span>
            </div>
                          <div class="form-group col-md-3">
                <label  for="serial_number">{{ trans('cruds.awb.fields.serial_number') }}</label>
                <input class="form-control {{ $errors->has('serial_number') ? 'is-invalid' : '' }}" type="text" name="serial_number" id="serial_number"   value="{{$awb->serial_number}}" />
              </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <strong style="color: #00008B;"> Goods details</strong>
                </div>
                <div class="card-body">
                    <div class="row">
            <div class="form-group col-md-3">
                <label class="required" for="no_of_pcs">{{ trans('cruds.awb.fields.no_of_pcs') }}</label>
                <input class="form-control {{ $errors->has('no_of_pcs') ? 'is-invalid' : '' }}" type="number" name="no_of_pcs" id="no_of_pcs"  value="{{ old('no_of_pcs', $awb->no_of_pcs) }}" step="1" required>
                @if($errors->has('no_of_pcs'))
                    <div class="invalid-feedback">
                        {{ $errors->first('no_of_pcs') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.awb.fields.no_of_pcs_helper') }}</span>
            </div>
                    <div class="form-group col-md-6">
                <label class="required" for="goods_type">{{ trans('cruds.awb.fields.goods_type') }}</label>
                <input class="form-control {{ $errors->has('goods_type') ? 'is-invalid' : '' }}" type="text" name="goods_type" id="goods_type"  value="{{ old('goods_type', $awb->goods_type) }}" required>
                @if($errors->has('goods_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('goods_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.awb.fields.goods_type_helper') }}</span>
            </div>
            <div class="form-group col-md-3">
                <label class="" for="decleration_no">{{ trans('cruds.awb.fields.decleration_no') }}</label>
                <input class="form-control {{ $errors->has('decleration_no') ? 'is-invalid' : '' }}" type="number" name="decleration_no" id="decleration_no" value="{{ old('decleration_no', $awb->decleration_no) }}" step="1" >
                @if($errors->has('decleration_no'))
                    <div class="invalid-feedback">
                        {{ $errors->first('decleration_no') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.awb.fields.decleration_no_helper') }}</span>
            </div>
            <div class="form-group col-md-3">
                <label class="required" for="goods_weight">{{ trans('cruds.awb.fields.goods_weight') }}</label>
                <input class="form-control {{ $errors->has('goods_weight') ? 'is-invalid' : '' }}" type="number" name="goods_weight" id="goods_weight"  value="{{ old('goods_weight', $awb->goods_weight) }}" step="0.01" required>
                @if($errors->has('goods_weight'))
                    <div class="invalid-feedback">
                        {{ $errors->first('goods_weight') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.awb.fields.goods_weight_helper') }}</span>
            </div>
            <div class="form-group col-md-6">
                <label for="declaration_file">{{ trans('cruds.awb.fields.declaration_file') }}</label>
                <div class="needsclick dropzone {{ $errors->has('declaration_file') ? 'is-invalid' : '' }}" id="declaration_file-dropzone">
                </div>
                @if($errors->has('declaration_file'))
                    <div class="invalid-feedback">
                        {{ $errors->first('declaration_file') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.awb.fields.declaration_file_helper') }}</span>
                </div>
            <div class="form-group col-md-3">
                <label class="required" for="declaration_date">{{ trans('cruds.awb.fields.declaration_date') }}</label>
                <input class="form-control date {{ $errors->has('declaration_date') ? 'is-invalid' : '' }}" type="text" name="declaration_date" id="declaration_date"value="{{ old('declaration_date', $awb->declaration_date) }}" required>
                @if($errors->has('declaration_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('declaration_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.awb.fields.declaration_date_helper') }}</span>
            </div>
                    </div>
                </div>
            </div>
                    <div class="card">
                        <div class="card-header">
                            <strong style="color: #00008B;"> Delivery details</strong>
                        </div>
                        <div class="card-body">
                            <div class="row">
            <div class="form-group col-md-4">
                <label  for="delivery_no">{{ trans('cruds.awb.fields.delivery_no') }}</label>
                <input class="form-control {{ $errors->has('delivery_no') ? 'is-invalid' : '' }}" type="number" name="delivery_no" id="delivery_no"  value="{{ old('delivery_no', $awb->delivery_no) }}" step="1" >
                @if($errors->has('delivery_no'))
                    <div class="invalid-feedback">
                        {{ $errors->first('delivery_no') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.awb.fields.delivery_no_helper') }}</span>
            </div>
            <div class="form-group col-md-4">
                <label for="delivery_date">{{ trans('cruds.awb.fields.delivery_date') }}</label>
                <input class="form-control date {{ $errors->has('delivery_date') ? 'is-invalid' : '' }}" type="text" name="delivery_date" id="delivery_date" value="{{ old('delivery_date', $awb->delivery_date) }}" >
                @if($errors->has('delivery_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('delivery_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.awb.fields.delivery_date_helper') }}</span>
            </div>
            <div class="form-group col-md-4">
                <label for="delivery_amount">{{ trans('cruds.awb.fields.delivery_amount') }}</label>
                <input class="form-control {{ $errors->has('delivery_amount') ? 'is-invalid' : '' }}" type="number" name="delivery_amount" id="delivery_amount"value="{{ old('delivery_amount', $awb->delivery_amount) }}" step="1" >
                @if($errors->has('delivery_amount'))
                    <div class="invalid-feedback">
                        {{ $errors->first('delivery_amount') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.awb.fields.delivery_amount_helper') }}</span>
            </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <strong style="color: #00008B;"> Recive details</strong>
                        </div>
                        <div class="card-body">
                            <div class="row">
            <div class="form-group col-md-6">
                <label for="goods_date">{{ trans('cruds.awb.fields.goods_date') }}</label>
                <input class="form-control date {{ $errors->has('goods_date') ? 'is-invalid' : '' }}" type="text" name="goods_date" id="goods_date" value="{{ old('goods_date', $awb->goods_date) }}">
                @if($errors->has('goods_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('goods_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.awb.fields.goods_date_helper') }}</span>
            </div>
            <div class="form-group col-md-6">
                <label  for="customer_fees">{{ trans('cruds.awb.fields.customer_fees') }}</label>
                <input class="form-control {{ $errors->has('customer_fees') ? 'is-invalid' : '' }}" type="number" name="customer_fees" id="customer_fees" value="{{ old('customer_fees', $awb->customer_fees) }}"  step="1" >
                @if($errors->has('customer_fees'))
                    <div class="invalid-feedback">
                        {{ $errors->first('customer_fees') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.awb.fields.customer_fees_helper') }}</span>
            </div>
            <div class="form-group col-md-6">
                <label for="receipt_no">{{ trans('cruds.awb.fields.receipt_no') }}</label>
                <input class="form-control {{ $errors->has('receipt_no') ? 'is-invalid' : '' }}" type="number" name="receipt_no" id="receipt_no" value="{{ old('receipt_no', $awb->receipt_no) }}" step="1">
                @if($errors->has('receipt_no'))
                    <div class="invalid-feedback">
                        {{ $errors->first('receipt_no') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.awb.fields.receipt_no_helper') }}</span>
            </div>
            <div class="form-group col-md-6">
                <label for="receipt_date">{{ trans('cruds.awb.fields.receipt_date') }}</label>
                <input class="form-control date {{ $errors->has('receipt_date') ? 'is-invalid' : '' }}" type="text" name="receipt_date" id="receipt_date"value="{{ old('receipt_date', $awb->receipt_date) }}">
                @if($errors->has('receipt_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('receipt_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.awb.fields.receipt_date_helper') }}</span>
            </div>
            <div class="form-group col-md-12">
                <label for="remarks">{{ trans('cruds.awb.fields.remarks') }}</label>
                <input class="form-control {{ $errors->has('remarks') ? 'is-invalid' : '' }}" name="remarks" id="remarks" value="{{ old('remarks', $awb->remarks) }}">
                @if($errors->has('remarks'))
                    <div class="invalid-feedback">
                        {{ $errors->first('remarks') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.awb.fields.remarks_helper') }}</span>
            </div>
                            </div>
                        </div>
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
    Dropzone.options.declarationFileDropzone = {
    url: '{{ route('admin.awbs.storeMedia') }}',
    maxFilesize: 40, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 40
    },
    success: function (file, response) {
      $('form').find('input[name="declaration_file"]').remove()
      $('form').append('<input type="hidden" name="declaration_file" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="declaration_file"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($awb) && $awb->declaration_file)
      var file = {!! json_encode($awb->declaration_file) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="declaration_file" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
    <script>
    function myFunction() {
        var num = document.getElementById("awb_no").value;
        $.ajax({
                type: 'get',
                url: "{{ route('admin.awb.check') }}",
                data:{
                    'num':num,
                },
                success: function (data) {
                    if (data.status == true) {
                        document.getElementById("client_name").value = data.value;
                    }
                    else
                    alert('oops .. You must add this AWB in notification screen first')
                },
            });
    }
    </script>

<script>
    var uploadedDeclarationFileMap = {}
Dropzone.options.declarationFileDropzone = {
    url: '{{ route('admin.awbs.storeMedia') }}',
    maxFilesize: 100, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 100
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="declaration_file[]" value="' + response.name + '">')
      uploadedDeclarationFileMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedDeclarationFileMap[file.name]
      }
      $('form').find('input[name="declaration_file[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($awb) && $awb->declaration_file)
          var files =
            {!! json_encode($awb->declaration_file) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="declaration_file[]" value="' + file.file_name + '">')
            }
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
@endsection