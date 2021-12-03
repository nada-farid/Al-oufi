<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Invoice;

class QrCodeController extends Controller
{
    public function index()
    {
      $invoice = Invoice::where('id',1)->with('client','awb')->first();
    
      $weight=$invoice->awb->goods_weight;
     
      global $id;

      if($weight<=300)
       $id=1;
      elseif(300<$weight &&  $weight<=1000) 
       $id=2;
      elseif(1000<$weight&&$weight<=2000)
       $id=3;
      else 
       $id=4;

       $fees=DB::table('client_client_fee')->where('client_id','=',$invoice->client->id)->where('client_fee_id',$GLOBALS['id'])->first();
  
       return view('qrcode',compact('invoice','fees'));
    }
}