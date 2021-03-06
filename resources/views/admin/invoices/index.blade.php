@extends('layouts.admin')
@section('content')
@can('invoice_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.invoices.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.invoice.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.invoice.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Invoice">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.invoice.fields.serial_number') }}
                        </th>
                        <th>
                            {{ trans('cruds.invoice.fields.awb') }}
                        </th>
                        <th>
                            {{ trans('cruds.invoice.fields.invoice_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.client.fields.client_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.invoice.fields.amount') }}
                        </th>
                        <th>
                            {{ trans('cruds.invoice.fields.vat') }}
                        </th>
                        <th>
                            {{ trans('cruds.invoice.fields.total') }}
                        </th>
                        <th>
                            Status
                        </th>
                        <th>
                            &nbsp;
                        </th>
                   
                    </tr>
                </thead>
                <tbody>
                    @foreach($invoices as $key => $invoice)
                        <tr data-entry-id="{{ $invoice->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $invoice->serial_no ?? '' }}
                            </td>
                            <td>
                                {{ $invoice->awb->awb_no ?? '' }}
                            </td>
                            <td>
                                {{ $invoice->invoice_date ?? '' }}
                            </td>
                            <td>
                                {{ $invoice->client->client_name ?? '' }}
                            </td>
                            <td>
                                {{ $invoice->amount ?? '' }}
                            </td>
                            <td>
                                {{ $invoice->vat ?? '' }}
                            </td>
                            <td>
                                {{ $invoice->total ?? '' }}
                            </td>
                            <td>
                     
                                <!--<select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="selection" onchange="myFunction({{ $invoice->id  }})">
                                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                    @foreach(App\Models\Invoice::STATUS_SELECT as $key => $label)
                                        <option value="{{ $key }}" {{ old('status', $invoice->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                    @endforeach
                                </select>-->
                              
                                @if($invoice->status=='active')
                                <select id="selection"onchange="myFunction({{ $invoice->id  }})">
			<option value="active" selected>active</option>
			<option value="returned">returned</option>
		</select>
		@else
		                          <select id="selection"onchange="myFunction({{ $invoice->id  }})">
			<option value="active" >active</option>
			<option value="returned" selected>returned</option>
		</select>
		@endif
	
                            </td>
                            <td>
                          <a href="{{route('admin.invoices.print', $invoice->id)}}" target="_blank" class="btn btn-xs btn-primary">print</a> 
                        
                               @can('invoice_edit')
                                    <a class="btn btn-xs btn-info" href="{{route('admin.invoices.edit', $invoice->id)}} ">
                                         {{trans('global.edit')}}
                                    </a>
                                @endcan

                                @can('invoice_delete')
                                   <form action="{{ route('admin.invoices.destroy', $invoice->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
        <div>
        </div>
    </div>
</div>    




@endsection
@section('scripts')
@parent
<script>
    function myFunction(id) {
        var selected = document.getElementById("selection").value;
       // alert(selected);
       
            $.ajax({
                      type: 'Post',
                      url: "{{ route('admin.invoices.changeStatus') }}",
                      data:{
                          "_token": "{{ csrf_token() }}",
                          'value':selected,
                          'invoice_id':id,
                      },
                      success: function (data) {
                          if (data.status == true) {
                         
                             showFrontendAlert('success','Status changes successfully','')
                          }
                          else
                          showFrontendAlert('Error','Something went wrong','')
                      },
                  });
          
      }
      </script>

<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('invoice_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.invoices.massDestroy') }}",
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
  let table = $('.datatable-Invoice:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>

@endsection