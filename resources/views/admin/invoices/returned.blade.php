@extends('layouts.admin')
@section('content')
@can('invoice_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
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
                          <a href="{{route('admin.invoices.print', $invoice->id)}}" target="_blank"  class="btn btn-xs btn-info">print</a> 
                        
                   
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