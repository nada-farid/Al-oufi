<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyClientFeeRequest;
use App\Http\Requests\StoreClientFeeRequest;
use App\Http\Requests\UpdateClientFeeRequest;
use App\Models\ClientFee;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ClientFeesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('client_fee_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clientFees = ClientFee::all();

        return view('admin.clientFees.index', compact('clientFees'));
    }

    public function create()
    {
        abort_if(Gate::denies('client_fee_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.clientFees.create');
    }

    public function store(StoreClientFeeRequest $request)
    {
        $clientFee = ClientFee::create($request->all());

        return redirect()->route('admin.client-fees.index');
    }

    public function edit(ClientFee $clientFee)
    {
        abort_if(Gate::denies('client_fee_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.clientFees.edit', compact('clientFee'));
    }

    public function update(UpdateClientFeeRequest $request, ClientFee $clientFee)
    {
        $clientFee->update($request->all());

        return redirect()->route('admin.client-fees.index');
    }

    public function show(ClientFee $clientFee)
    {
        abort_if(Gate::denies('client_fee_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.clientFees.show', compact('clientFee'));
    }

    public function destroy(ClientFee $clientFee)
    {
        abort_if(Gate::denies('client_fee_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clientFee->delete();

        return back();
    }

    public function massDestroy(MassDestroyClientFeeRequest $request)
    {
        ClientFee::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
