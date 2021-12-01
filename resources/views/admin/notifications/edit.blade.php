@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.notification.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.notifications.update", [$notification->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="awb_no">{{ trans('cruds.notification.fields.awb_no') }}</label>
                <input class="form-control {{ $errors->has('awb_no') ? 'is-invalid' : '' }}" type="text" name="awb_no" id="awb_no" value="{{ old('awb_no', $notification->awb_no) }}" required>
                @if($errors->has('awb_no'))
                    <div class="invalid-feedback">
                        {{ $errors->first('awb_no') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.notification.fields.awb_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="client_id">{{ trans('cruds.notification.fields.client') }}</label>
                <select class="form-control select2 {{ $errors->has('client') ? 'is-invalid' : '' }}" name="client_id" id="client_id" required>
                    @foreach($clients as $id => $entry)
                        <option value="{{ $id }}" {{ (old('client_id') ? old('client_id') : $notification->client->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('client'))
                    <div class="invalid-feedback">
                        {{ $errors->first('client') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.notification.fields.client_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="awb_date">{{ trans('cruds.notification.fields.awb_date') }}</label>
                <input class="form-control date {{ $errors->has('awb_date') ? 'is-invalid' : '' }}" type="text" name="awb_date" id="awb_date" value="{{ old('awb_date', $notification->awb_date) }}" required>
                @if($errors->has('awb_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('awb_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.notification.fields.awb_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="awb_file">{{ trans('cruds.notification.fields.awb_file') }}</label>
                <div class="needsclick dropzone {{ $errors->has('awb_file') ? 'is-invalid' : '' }}" id="awb_file-dropzone">
                </div>
                @if($errors->has('awb_file'))
                    <div class="invalid-feedback">
                        {{ $errors->first('awb_file') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.notification.fields.awb_file_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="remarks">{{ trans('cruds.notification.fields.remarks') }}</label>
                <textarea class="form-control {{ $errors->has('remarks') ? 'is-invalid' : '' }}" name="remarks" id="remarks">{{ old('remarks', $notification->remarks) }}</textarea>
                @if($errors->has('remarks'))
                    <div class="invalid-feedback">
                        {{ $errors->first('remarks') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.notification.fields.remarks_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.notification.fields.appearance') }}</label>
                <select class="form-control {{ $errors->has('appearance') ? 'is-invalid' : '' }}" name="appearance" id="appearance" required>
                    <option value disabled {{ old('appearance', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Notification::APPEARANCE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('appearance', $notification->appearance) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('appearance'))
                    <div class="invalid-feedback">
                        {{ $errors->first('appearance') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.notification.fields.appearance_helper') }}</span>
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
    Dropzone.options.awbFileDropzone = {
    url: '{{ route('admin.notifications.storeMedia') }}',
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
      $('form').find('input[name="awb_file"]').remove()
      $('form').append('<input type="hidden" name="awb_file" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="awb_file"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($notification) && $notification->awb_file)
      var file = {!! json_encode($notification->awb_file) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="awb_file" value="' + file.file_name + '">')
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
@endsection