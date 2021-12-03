<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyInvoiceRequest;
use App\Http\Requests\StoreInvoiceRequest;
use App\Http\Requests\UpdateInvoiceRequest;
use App\Models\Awb;
use App\Models\Client;
use App\Models\Invoice;
use Gate;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Symfony\Component\HttpFoundation\Response;
use Alert;

class InvoicesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('invoice_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $invoices = Invoice::with(['awb', 'client'])->get();

        return view('admin.invoices.index', compact('invoices'));
    }

    public function create()
    {
        abort_if(Gate::denies('invoice_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $awbs = Awb::pluck('awb_no', 'id')->prepend(trans('global.pleaseSelect'), '');

        $clients = Client::pluck('client_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.invoices.create', compact('awbs', 'clients'));
    }

    public function store(StoreInvoiceRequest $request)
    {
        $invoice = Invoice::create($request->all());

        Alert::success('Success', 'invoice added sucessfully');

        return redirect()->route('admin.invoices.index');
    }

    public function edit(Invoice $invoice)
    {
        abort_if(Gate::denies('invoice_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $awbs = Awb::pluck('awb_no', 'id')->prepend(trans('global.pleaseSelect'), '');

        $clients = Client::pluck('client_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $invoice->load('awb', 'client');

        return view('admin.invoices.edit', compact('awbs', 'clients', 'invoice'));
    }

    public function update(UpdateInvoiceRequest $request, Invoice $invoice)
    {
        $invoice->update($request->all());

        Alert::success('Success', 'invoice updated sucessfully');

        return redirect()->route('admin.invoices.index');
    }

    public function show(Invoice $invoice)
    {
        abort_if(Gate::denies('invoice_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $invoice->load('awb', 'client');

        return view('admin.invoices.show', compact('invoice'));
    }

    public function destroy(Invoice $invoice)
    {
        abort_if(Gate::denies('invoice_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $invoice->delete();

        return back();
    }

    public function massDestroy(MassDestroyInvoiceRequest $request)
    {
        Invoice::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function report(request $request){
    
        $from=Carbon::parse(Carbon::createFromFormat('d/m/Y', $request->start_date)->format('d-m-Y')); 
        $to=Carbon::parse(Carbon::createFromFormat('d/m/Y', $request->end_date)->format('d-m-Y')); 

        $invoices = Invoice::whereBetween('invoice_date',[$from,$to])->with(['awb', 'client'])->get();

        return view('admin.invoices.report', compact('invoices'));

    }
}
