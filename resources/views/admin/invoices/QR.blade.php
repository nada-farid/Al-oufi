
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Invoice</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
</head>
<body>

    <div class="row">
        @if ( Config::get('app.locale') == 'en')
    <div class="card col-md-6">
        <div class="card-header">
        </div>
        <div class="card-body">
    <h4 class="center">Invoice Dateils</h4>
    <p>Client Name:{{$invoice->client->client_name }}</p>
    <p>Tax Number:{{$invoice->client->tax_number}}</p>
    <p>Invoice Number:{{$invoice->id}}</p>
    <p>Invoice Date:{{$invoice->invoice_date}}</p>
    <p>Invoice Amount Before Tax:{{$invoice->amount}}</p>
    <p>Invoice VAT(15%):{{$invoice->vat}}</p>
    <p>Invoice Total :{{$invoice->total}}</p>
        </div>
    </div>
    @elseif ( Config::get('app.locale') == 'ar' )
    <div class="card  col-md-4">
        <div class="card-header">
       
        </div>
        <div class="card-body">
    <h4> تفاصيل الفاتورة</h4>
    <p> اسم الشركة:{{$invoice->client->client_name }}</p>
    <p>الرقم الضريبي:{{$invoice->client->tax_number}}</p>
    <p>  رقم الفاتوره:{{$invoice->id}}</p>
    <p> تاريخ اصدار الفاتوره{{$invoice->invoice_date}}</p>
    <p>قيمة الفاتورة قبل الضريبه   :{{$invoice->amount}}</p>
    <p>الضريبه (15%):{{$invoice->vat}}</p>
    <p> قيمة الفاتورة بعد الضريبه :{{$invoice->total}}</p>
        </div>
    </div>
    </div>
    @endif
</body>


