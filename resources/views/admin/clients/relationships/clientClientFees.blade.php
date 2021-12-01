@can('client_fee_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.client-fees.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.clientFee.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.clientFee.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-clientClientFees">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.clientFee.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.clientFee.fields.type') }}
                        </th>
                        <th>
                            {{ trans('cruds.clientFee.fields.client') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clientFees as $key => $clientFee)
                        <tr data-entry-id="{{ $clientFee->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $clientFee->id ?? '' }}
                            </td>
                            <td>
                                {{ $clientFee->type ?? '' }}
                            </td>
                            <td>
                                @foreach($clientFee->clients as $key => $item)
                                    <span class="badge badge-info">{{ $item->client_name }}</span>
                                @endforeach
                            </td>
                            <td>
                                @can('client_fee_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.client-fees.show', $clientFee->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('client_fee_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.client-fees.edit', $clientFee->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('client_fee_delete')
                                    <form action="{{ route('admin.client-fees.destroy', $clientFee->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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

@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('client_fee_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.client-fees.massDestroy') }}",
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
  let table = $('.datatable-clientClientFees:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection