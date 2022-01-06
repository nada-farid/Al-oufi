<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyAwbRequest;
use App\Http\Requests\StoreAwbRequest;
use App\Http\Requests\UpdateAwbRequest;
use Illuminate\Support\Facades\DB;
use App\Models\Awb;
use App\Models\Notification;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Alert;

class AwbController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('awb_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $awbs = Awb::with(['notification.client','media'])->get();

        return view('admin.awbs.index', compact('awbs'));
    }

    public function create()
    {
        abort_if(Gate::denies('awb_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.awbs.create');
    }

    public function store(StoreAwbRequest $request)
    {
     
        $notification = Notification::where('awb_no',$request->awb_no)->first();
        if(! $notification){
        Alert::error('OOps','You must add this AWB in notification screen first');
        return redirect()->route('admin.awbs.create');
        }
        $serial_number=Awb ::latest()->first()->serial_number; 
        $awb = Awb::create([
             'awb_no'=>$request->awb_no,
             'serial_number'=>$serial_number+1,
             'no_of_pcs'=>$request->no_of_pcs,
             'goods_type'=>$request->goods_type,
             'decleration_no'=>$request->decleration_no,
             'goods_weight'=>$request->goods_weight,
             'declaration_date'=>$request->declaration_date,
             'delivery_no'=>$request->delivery_no,
             'delivery_date'=>$request->delivery_date,
             'delivery_amount'=>$request->delivery_amount,
             'goods_date'=>$request->goods_date,
             'customer_fees'=>$request->customer_fees,
             'receipt_no'=>$request->receipt_no,
             'receipt_date'=>$request->receipt_date,
             'remarks'=>$request->remarks,
             'notification_id'=>$notification->id,


        ]);

        if($awb)
        $notification->update([
           'status'=>0,
        ]);
        

     foreach ($request->input('declaration_file', []) as $file) {
            $awb->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('declaration_file');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $awb->id]);
        
        }
        Alert::success('Success', 'Awb added sucessfully');
        return redirect()->route('admin.awbs.create');
    }

    public function edit(Awb $awb)
    {
        abort_if(Gate::denies('awb_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $awb->load('notification');

        return view('admin.awbs.edit', compact('awb'));
    }

    public function update(UpdateAwbRequest $request, Awb $awb)
    {
        $awb->update($request->all());

    if (count($awb->declaration_file) > 0) {
            foreach ($awb->declaration_file as $media) {
                if (!in_array($media->file_name, $request->input('declaration_file', []))) {
                    $media->delete();
                }
            }
        }
        $media = $awb->declaration_file->pluck('file_name')->toArray();
        foreach ($request->input('declaration_file', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $awb->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('declaration_file');
            }
        }

        Alert::success('Success', 'Awb updated sucessfully');
        return redirect()->route('admin.awbs.index');
    }

    public function show(Awb $awb)
    {
        abort_if(Gate::denies('awb_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.awbs.show', compact('awb'));
    }

    public function destroy(Awb $awb)
    {
        abort_if(Gate::denies('awb_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $awb->delete();

        return back();
    }

    public function massDestroy(MassDestroyAwbRequest $request)
    {
        Awb::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('awb_create') && Gate::denies('awb_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Awb();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }

    public function check_awb(Request $request){

        $notification= Notification::where('awb_no',$request->num)->with('client')->first();

        if($notification)
        return response()->json([
            'status' => true,
            'value'=>$notification->client->client_name,
        ]);

    else
        return response()->json([
            'status' => false,
        ]);
}
    public function get_date(Request $request){

        global $id;
        $awb=Awb::where('awb_no',$request->num)->first();
          if(!$awb)
        return response()->json([
            'status' => false,
        ]);

        $weight=$awb->goods_weight;
        if($weight<=300)
         $id=1;
        elseif(300<$weight &&  $weight<=1000) 
         $id=2;
        elseif(1000<$weight&&$weight<=2000)
         $id=3;
        else 
         $id=4;

        $awb=Awb::where('awb_no',$request->num)->with('notification.client')->first();

        $fees=DB::table('client_client_fee')->where('client_id','=',$awb->notification->client_id)->where('client_fee_id',$GLOBALS['id'])->first();
        
        

        $amount=$fees->clearance_fee+$fees->transportaion+$fees->loading_fee+$awb->customer_fees+$awb->delivery_amount;
        $sum_vat=$fees->clearance_fee+$fees->transportaion+$fees->loading_fee;
        $vat=(($sum_vat)*15)/100;
        $total=$amount+$vat;
        if($awb)
        return response()->json([
            'status' => true,
            'fees'=>$fees,
            'value'=>$awb,
            'amount'=>$amount,
            'vat'=>$vat,
            'total'=>$total,
        ]);

   
    }

    
        }
    
