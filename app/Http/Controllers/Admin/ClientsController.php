<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyClientRequest;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use Illuminate\Support\Facades\DB;
use App\Models\Client;
use App\Models\ClientFee;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;
use Alert;

class ClientsController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('client_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Client::with(['fees'])->select(sprintf('%s.*', (new Client())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'client_show';
                $editGate = 'client_edit';
                $deleteGate = 'client_delete';
                $crudRoutePart = 'clients';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('client_name', function ($row) {
                return $row->client_name ? $row->client_name : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.clients.index');
    }

    public function create()
    {
        abort_if(Gate::denies('client_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $fees = ClientFee::all();

        return view('admin.clients.create', compact('fees'));
    }

    public function store(StoreClientRequest $request)
    {
        $client = Client::create($request->all());
    
         for($i=1;$i<5;$i++){
            DB::table('client_client_fee')->insert([  
                'client_id'=>$client->id,
                'client_fee_id'=>$i,
                'clearance_fee' => $request->fees[$i][0],
                'transportaion' => $request->fees[$i][1],
                'loading_fee' => $request->fees[$i][2],

        ]); 
    }

        //return redirect()->route('admin.clients.index');
        if ($client)
        return response()->json([
            'status' => true,
            'msg' => 'تم الحفظ بنجاح',
            'value'=>$client->id,
        ]);

    else
        return response()->json([
            'status' => false,
            'msg' => 'فشل الحفظ برجاء المحاوله مجددا',
        ]);
}


    public function edit(Client $client)
    {
        abort_if(Gate::denies('client_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

       $client_fees =  DB::table('client_client_fee')->where('client_id','=',$client->id)->get();
      
       
       return view('admin.clients.edit', compact( 'client','client_fees'));
    }

    public function update(UpdateClientRequest $request, Client $client)
    {
       
        $client->update($request->all());
      
        $deleting=DB::table('client_client_fee')->where('client_id','=',$client->id)->delete();
         if($deleting){
            for($i=1;$i<5;$i++){
                DB::table('client_client_fee')->insert([  
                    'client_id'=>$client->id,
                    'client_fee_id'=>$i,
                    'clearance_fee' => $request->fees[$i][0],
                    'transportaion' => $request->fees[$i][1],
                    'loading_fee' => $request->fees[$i][2],
    
            ]); 
    }
    }
    Alert::success('Success', 'client info updated sucessfully');
        return redirect()->route('admin.clients.index');
    }

    public function show(Client $client)
    {
        abort_if(Gate::denies('client_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $client->load('fees');

        return view('admin.clients.show', compact('client'));
    }

    public function destroy(Client $client)
    {
        abort_if(Gate::denies('client_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $client->delete();

        return back();
    }

    public function massDestroy(MassDestroyClientRequest $request)
    {
        Client::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
