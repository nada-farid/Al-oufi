@extends('layouts.admin')
@section('content')
<!--@can('notification_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.notifications.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.notification.title_singular') }}
            </a>
        </div>
    </div>
@endcan-->

   
    <!-- -->
     <div class="card">
    <div class="card-header">
        <strong style="color: #00008B;">Add Notification</strong>
    </div>
       <div class="card-body">
        <form method="POST" action="{{ route("admin.notifications.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
            <div class="form-group col-md-4">
                <label class="required" for="awb_no">{{ trans('cruds.notification.fields.awb_no') }}</label>
                <input class="form-control {{ $errors->has('awb_no') ? 'is-invalid' : '' }}" type="text" name="awb_no" id="awb_no" value="{{ old('awb_no', '') }}" required>
                @if($errors->has('awb_no'))
                    <div class="invalid-feedback">
                        {{ $errors->first('awb_no') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.notification.fields.awb_no_helper') }}</span>
            </div>
            <div class="form-group col-md-4">
                <label for="client_id">{{ trans('cruds.notification.fields.client') }}</label>
                <select class="form-control select2 {{ $errors->has('client') ? 'is-invalid' : '' }}" name="client_id" id="client_id" >
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
            <div class="form-group col-md-4">
                <label class="required" for="awb_date">{{ trans('cruds.notification.fields.awb_date') }}</label>
                <input class="form-control date {{ $errors->has('awb_date') ? 'is-invalid' : '' }}" type="text" name="awb_date" id="awb_date" value="{{ old('awb_date') }}" required>
                @if($errors->has('awb_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('awb_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.notification.fields.awb_date_helper') }}</span>
            </div>
            <div class="form-group col-md-4">
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
            <div class="form-group col-md-4">
                <label for="remarks">{{ trans('cruds.notification.fields.remarks') }}</label>
                <textarea class="form-control {{ $errors->has('remarks') ? 'is-invalid' : '' }}" name="remarks" id="remarks">{{ old('remarks') }}</textarea>
                @if($errors->has('remarks'))
                    <div class="invalid-feedback">
                        {{ $errors->first('remarks') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.notification.fields.remarks_helper') }}</span>
            </div>
            <div class="form-group col-md-4">
                <label class="required">{{ trans('cruds.notification.fields.appearance') }}</label>
                <select class="form-control {{ $errors->has('appearance') ? 'is-invalid' : '' }}" name="appearance" id="appearance" required>
                    <option value disabled {{ old('appearance', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Notification::APPEARANCE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('appearance', 'yes') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
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
            </div>
        </form>
    </div>
    </div>
    <!-- -->
    
    <!-- -->
     <div class="card">
    <div class="card-header">
        <strong style="color: #00008B;">Notification Report</strong>
    </div>
    <div class="card-body">
<form action="{{route('admin.notifications.report')}}" method="get">
                <div class="row">
                <div class="col-md-4">
            <select class="form-control {{ $errors->has('appearance') ? 'is-invalid' : '' }}" name="appearance" id="mySelect" required >
                    <option value disabled {{ old('appearance', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Notification::APPEARANCE_SELECT as $key => $label)
                        <option value="{{ $key }}">{{ $label }}</option>
                    @endforeach
                </select>
                </div>
                 <div class="col-md-4">
            <button type="submitt" class="btn btn-xs btn-info" >Preview</button>
             </div>
             </div>
            </form>
        </div>
        </div>
    </div>
    <!-- -->
    <div class="card">
    <div class="card-header">
        {{ trans('cruds.notification.title_singular') }} {{ trans('global.list') }}
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Notification">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                      
                        <th>
                            {{ trans('cruds.notification.fields.awb_no') }}
                        </th>
                        <th>
                            {{ trans('cruds.notification.fields.client') }}
                        </th>
                        <th>
                            {{ trans('cruds.notification.fields.awb_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.notification.fields.remarks') }}
                        </th>
                        <th>
                            {{ trans('cruds.notification.fields.appearance') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($notifications as $key => $notification)
                        <tr data-entry-id="{{ $notification->id }}">
                            <td>

                            </td>
                           
                            <td>
                                <a  href="{{ route('admin.notifications.show', $notification->id) }}">
                                {{ $notification->awb_no ?? '' }}
                                </a>
                            </td>
                            <td>
                                {{ $notification->client->client_name ?? '' }}
                            </td>
                            <td>
                                {{ $notification->awb_date ?? '' }}
                            </td>
                            <td>
                                {{ $notification->remarks ?? '' }}
                            </td>
                           <!-- <td>
                                {{ App\Models\Notification::APPEARANCE_SELECT[$notification->appearance] ?? '' }}
                            </td>-->
                            <td>
         <select class="form-control {{ $errors->has('appearance') ? 'is-invalid' : '' }}" name="appearance" id="selection" onchange="myFunction({{$notification->id}})" required >
                    <option value disabled {{ old('appearance', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Notification::APPEARANCE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('appearance', $notification->appearance) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>

                            </td>
                            <td>
                                <!-- @can('notification_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.notifications.show', $notification->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan -->

                                @can('notification_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.notifications.edit', $notification->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('notification_delete')
                                    <form action="{{ route('admin.notifications.destroy', $notification->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
            
</div>


    </div>
    </div>


@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('notification_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.notifications.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 25,
  });
  let table = $('.datatable-Notification:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
<script>
function myFunction(id) {
  var selected = document.getElementById("selection").value;
 // var id=document.getElementById("notific_id").value;
  alert(id);
  
      $.ajax({
                type: 'Post',
                url: "{{ route('admin.notifications.changApparance') }}",
                data:{
                    "_token": "{{ csrf_token() }}",
                    'value':selected,
                    'notification_id':id,
                },
                success: function (data) {
                    if (data.status == true) {
                       alert('Apperance Chang Successfully');
                    }
                    else
                    alert('Something went wrong, try again ')
                },
            });
    
}
</script>
<script>
    var uploadedAwbFileMap = {}
Dropzone.options.awbFileDropzone = {
    url: '{{ route('admin.notifications.storeMedia') }}',
    maxFilesize: 100, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 100
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="awb_file[]" value="' + response.name + '">')
      uploadedAwbFileMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedAwbFileMap[file.name]
      }
      $('form').find('input[name="awb_file[]"][value="' + name + '"]').remove()
    },
    init: function () {

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