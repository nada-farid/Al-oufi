<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Invoice;
use Carbon\Carbon;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    //
    public function index(){

        $clients = Client::selectRaw("CONCAT (client_no, '-' ,client_name) as columns, id")->pluck('columns', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.reports.index',compact('clients'));
    }

    public function report(request $request){

        $from=Carbon::parse(Carbon::createFromFormat('d/m/Y', $request->start_date)->format('d-m-Y')); 
        $to=Carbon::parse(Carbon::createFromFormat('d/m/Y', $request->end_date)->format('d-m-Y')); 
    if($request->client_id)
        $invoices = Invoice::where('status','active')->where('client_id', $request->client_id)->whereBetween('invoice_date',[$from,$to])->with(['awb', 'client'])->get();
   else
     $invoices = Invoice::where('status','active')->whereBetween('invoice_date',[$from,$to])->with(['awb', 'client'])->get();   
        $amount= $invoices->sum('amount');  
        $vat= $invoices->sum('amount');  
        $total= $invoices->sum('total');  

        $client=Client::find($request->client_id);

        return view('admin.reports.show', compact('invoices','amount','vat','total','from','to','client'));


    }
}
