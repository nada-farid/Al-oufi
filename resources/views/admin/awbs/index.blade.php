@extends('layouts.admin')
@section('content')
@can('awb_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.awbs.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.awb.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.awb.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Awb">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.awb.fields.serial_number') }}
                        </th>
                        <th>
                            {{ trans('cruds.awb.fields.awb_no') }}
                        </th>
                      
                        <th>
                            {{ trans('cruds.awb.fields.client_name') }}
                        </th>
                          <th>
                            {{ trans('cruds.awb.fields.no_of_pcs') }}
                        </th>
                        <th>
                            {{ trans('cruds.awb.fields.goods_weight') }}
                        </th>
                       
                        <th>
                            {{ trans('cruds.awb.fields.delivery_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.awb.fields.delivery_amount') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($awbs as $key => $awb)
                        <tr data-entry-id="{{ $awb->id }}">
                            <td>

                            </td>
                            <td>
                                  <a  href="{{ route('admin.awbs.show', $awb->id) }}">
                                 
                                {{ $awb->serial_number ?? '' }}
                                   </a>
                            </td>
                            <td>
                                {{ $awb->awb_no ?? '' }}
                            </td>
                              <td>
                                {{ $awb->notification->client->client_name ?? '' }}
                            </td>
                            <td>
                                {{ $awb->no_of_pcs ?? '' }}
                            </td>
                          
                            <td>
                                {{ $awb->goods_weight ?? '' }}
                            </td>
                          
                            <td>
                                {{ $awb->delivery_date ?? '' }}
                            </td>
                            <td>
                                {{ $awb->delivery_amount ?? '' }}
                            </td>
                            <td>
                                <!--@can('awb_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.awbs.show', $awb->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan-->

                                @can('awb_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.awbs.edit', $awb->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('awb_delete')
                                    <form action="{{ route('admin.awbs.destroy', $awb->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('awb_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.awbs.massDestroy') }}",
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
   // order: [[ 1, 'desc' ]],
    pageLength: 25,
  });
  let table = $('.datatable-Awb:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection