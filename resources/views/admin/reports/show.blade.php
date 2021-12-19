@extends('layouts.admin')
@section('content')

@section('styles')

<style>
p{
    margin-bottom: 0px !important;
    font-size: 16px;
}

.row.titles-wrapper {
    padding-bottom: 5px;
    border-bottom: 6px solid;
    margin-bottom: 10px;
}
.reciept-info-wrap {
    text-align: right;
}
.row.receipt-charges div {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-bottom: 0px;
}
.reciept-info-wrap p {
    font-weight: bold;
}
.receipt-details-wrap {
    text-align: center;
}
.row.delivery-info {
    padding: 10px 0px;
    border: 1px solid;
    margin-bottom: 5px !important;
}
  </style>
  @endsection
 
<div class="card">
    <div class="card-header">
      <div class="row delivery-info">
        <div class="col-3 reciept-info-wrap">
          <p class="receipt-info">From:</p>
          @if($client)
            
          <p class="receipt-info">Client No:</p>
          <p class="receipt-info">  Client Name:</p>
          @endif
      </div>
      <div class="col-3 receipt-details-wrap">
      <p class="receipt-details">{{ $from }}</p>
      <p class="receipt-details">{{$client->client_no ?? ''  }}</p>
      <p class="receipt-details">{{$client->client_name ??''  }}</p>
      </div>
        <div class="col-3 reciept-info-wrap">
          <p class="receipt-info">To:</p>
          <p class="receipt-info"></p>
          <p class="receipt-info"></p>
      </div>
      <div class="col-3 receipt-details-wrap">
      <p class="receipt-details"></p>
      <p class="receipt-details"></p>
      <p class="receipt-details date">{{ $to }}</p>
      </div>
    </div>
    </div>

    <div class="card-body">
        <div class="table-responsive">
  
            <table class=" table table-bordered table-striped table-hover datatable datatable-Invoice">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                           Date
                        </th>
                        <th>
                         Inv.No
                        </th>
                        <th>
                           A.W.B
                        </th>
                        <th>
                           Description
                        </th>
                        <th>
                          Amount
                        </th>
                        <th>
                         Tax
                        </th>
                        <th>
                          Total
                        </th>
                     
                    </tr>
                </thead>
                <tbody>
                    @foreach($invoices as $key => $invoice)
                        <tr data-entry-id="{{ $invoice->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $invoice->invoice_date ?? '' }}
                            </td>
                            <td>
                            
                                {{ $invoice->serial_no ?? '' }}
                            </td>
                            <td>
                                {{ $invoice->awb->awb_no ?? '' }}
                            </td>
                            <td>
                                {{ $invoice->remarks ?? '' }}
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
                        </tr>
                    @endforeach
              
                    </tbody>
                    <tr>
                    <td style="visibility:collapse" ></td>
                    <td style="visibility:collapse"></td>
                    <td style="visibility:collapse"></td>
                    <td style="visibility:collapse"></td>
                    <td style="visibility:collapse" > </td>
                    <td class="table-dark">{{$amount}}</td>
                    <td class="table-dark">{{ $vat }}</td>
                    <td class="table-dark">{{ $total }}</td>
                      </tr>
                  </table>
            
                  <a class="btn btn-default" href="{{ route('admin.invoices.reports') }}">
                 Back
                </a>
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