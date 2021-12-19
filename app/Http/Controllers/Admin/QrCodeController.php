<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Invoice;

class QrCodeController extends Controller
{
    public function index($id)
    {
      
      $invoice = Invoice::where('id',$id)->with('client','awb')->first();
  
       return view('admin.invoices.printing',compact('invoice'));
    }
    public function details($id){

      $invoice = Invoice::where('id',$id)->with('client','awb')->first();

      return view('admin.invoices.QR',compact('invoice'));


      
    }
}