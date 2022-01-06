<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyInvoiceRequest;
use App\Http\Requests\StoreInvoiceRequest;
use App\Http\Requests\UpdateInvoiceRequest;
use App\Models\Awb;
use App\Models\Client;
use App\Models\Invoice;
use Illuminate\Support\Facades\DB;
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
     
        //calculations;
   
              $amount=$request->clearance_fee+$request->loading_fee+$request->transportaion+$request->delivery_amount+$request->customer_fees+$request->scan+$request->air+$request->formalities+$request->demuerrage+$request->legalization+$request->undertaking+$request->other;
              
                
              $temp=$request->clearance_fee+$request->loading_fee+$request->transportaion+$request->scan+$request->other;
      
              $vat=($temp*15)/100;
       
              $total=  $amount+$vat;
    
              $old_invoice=Invoice::where('awb_id',$request->awb_id)->first();
        
  
     
        if($old_invoice){
    
        
         $invoice =$old_invoice->update([
             'clearance_fee'=>$request->clearance_fee,
            'loading_fee'=>$request->loading_fee,
            'transportaion'=>$request->transportaion,
             'delivery_amount'=>$request->delivery_amount,
            'customer_fees'=>$request->customer_fees,
             'serial_no'=>$request->serial_no,
            'goods_release'=>$request->goods_release,
            'invoice_date'=>$request->invoice_date,
            'air'=>$request->air,
            'legalization'=>$request->legalization,
            'formalities'=>$request->formalities,
            'demuerrage'=>$request->demuerrage,
            'scan'=>$request->scan,
            'undertaking'=>$request->undertaking,
             'remarks'=>$request->remarks,
            'other'=>$request->other,
            'amount'=>$amount,
            'vat'=>$vat,
            'total'=>$total,
            'awb_id'=>$request->awb_id,
            'client_id'=>$request->client_id,
            ]);
         
            
$new_invoice=Invoice::where('awb_id',$request->awb_id)->first();
        if ($new_invoice)
        return response()->json([
            'status' => true,
            'msg' => 'تم الحفظ بنجاح',
            'value'=>$new_invoice,
        ]);

    else
        return response()->json([
            'status' => false,
            'msg' => 'فشل الحفظ برجاء المحاوله مجددا',
        ]);
    }
            
        
        
        
        else{
        
      /*  $numbers = mt_rand(1000000, 9999999)
    . mt_rand(1000000, 9999999);

   // shuffle the result
   $serial = str_shuffle($numbers);*/
   $serial=Invoice::latest()->first()->serial_no;
       
        $invoice = Invoice::create([
             'clearance_fee'=>$request->clearance_fee,
            'loading_fee'=>$request->loading_fee,
            'transportaion'=>$request->transportaion,
             'delivery_amount'=>$request->delivery_amount,
            'customer_fees'=>$request->customer_fees,
             'serial_no'=>$serial+1,
            'goods_release'=>$request->goods_release,
            'invoice_date'=>$request->invoice_date,
            'air'=>$request->air,
            'legalization'=>$request->legalization,
            'formalities'=>$request->formalities,
            'demuerrage'=>$request->demuerrage,
            'scan'=>$request->scan,
            'undertaking'=>$request->undertaking,
             'remarks'=>$request->remarks,
            'other'=>$request->other,
           'amount'=> $amount,
            'vat'=>$vat,
            'total'=>$total,
            'awb_id'=>$request->awb_id,
            'client_id'=>$request->client_id,
        
            
            ]);

        if ($invoice)
        return response()->json([
            'status' => true,
            'msg' => 'تم الحفظ بنجاح',
            'value'=>$invoice,
        ]);

    else
        return response()->json([
            'status' => false,
            'msg' => 'فشل الحفظ برجاء المحاوله مجددا',
        ]);
    }
    }

    public function edit(Invoice $invoice)
    {
        abort_if(Gate::denies('invoice_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

/*        $awbs = Awb::pluck('awb_no', 'id')->prepend(trans('global.pleaseSelect'), '');

        $clients = Client::pluck('client_name', 'id')->prepend(trans('global.pleaseSelect'), '');
                        */
        $invoice->load('awb', 'client');
        
        
        //

        return view('admin.invoices.edit', compact('invoice'));
    }

    public function update(UpdateInvoiceRequest $request, Invoice $invoice)
    {
       //calculations;
   
              $amount=$request->clearance_fee+$request->loading_fee+$request->transportaion+$request->delivery_amount+$request->customer_fees+$request->scan+$request->air+$request->formalities+$request->demuerrage+$request->legalization+$request->undertaking+$request->other;
              
              $temp=$request->clearance_fee+$request->loading_fee+$request->transportaion+$request->scan+$request->other;
      
        $vat=($temp*15)/100;
        $total=  $amount+$vat;
    
        $invoice->update([
               'clearance_fee'=>$request->clearance_fee,
            'loading_fee'=>$request->loading_fee,
            'transportaion'=>$request->transportaion,
           'delivery_amount'=>$request->delivery_amount,
            'customer_fees'=>$request->customer_fees,
            'serial_no'=>$request->serial_no,
            'goods_release'=>$request->goods_release,
            'invoice_date'=>$request->invoice_date,
            'air'=>$request->air,
            'legalization'=>$request->legalization,
            'formalities'=>$request->formalities,
            'demuerrage'=>$request->demuerrage,
            'scan'=>$request->scan,
            'undertaking'=>$request->undertaking,
             'remarks'=>$request->remarks,
            'other'=>$request->other,
            'amount'=>$amount,
            'vat'=>$vat,
            'total'=>$total,
            ]);

        Alert::success('Success', 'invoice updated sucessfully');

        return redirect()->route('admin.invoices.edit',$invoice->id);
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

    public function status(Request $request){

           $invoice=Invoice::findOrfail($request->invoice_id);
            $update=$invoice->update([
                'status'=>$request->value,
                
                ]);
                 if ($update)
            return response()->json([
                'status' => true,
                
            ]);
    
        else
            return response()->json([
                'status' => false,
           
            ]);
        }

        public function returend()
        {
            abort_if(Gate::denies('invoice_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    
            $invoices = Invoice::where('status','returned')->with(['awb', 'client'])->get();
    
            return view('admin.invoices.returned', compact('invoices'));
        }
        }
        
    


