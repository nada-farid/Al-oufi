<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyAwbRequest;
use App\Http\Requests\StoreAwbRequest;
use App\Http\Requests\UpdateAwbRequest;
use App\Models\Awb;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class AwbController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('awb_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $awbs = Awb::with(['media'])->get();

        return view('admin.awbs.index', compact('awbs'));
    }

    public function create()
    {
        abort_if(Gate::denies('awb_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.awbs.create');
    }

    public function store(StoreAwbRequest $request)
    {
        $awb = Awb::create($request->all());

        if ($request->input('declaration_file', false)) {
            $awb->addMedia(storage_path('tmp/uploads/' . basename($request->input('declaration_file'))))->toMediaCollection('declaration_file');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $awb->id]);
        }

        return redirect()->route('admin.awbs.index');
    }

    public function edit(Awb $awb)
    {
        abort_if(Gate::denies('awb_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.awbs.edit', compact('awb'));
    }

    public function update(UpdateAwbRequest $request, Awb $awb)
    {
        $awb->update($request->all());

        if ($request->input('declaration_file', false)) {
            if (!$awb->declaration_file || $request->input('declaration_file') !== $awb->declaration_file->file_name) {
                if ($awb->declaration_file) {
                    $awb->declaration_file->delete();
                }
                $awb->addMedia(storage_path('tmp/uploads/' . basename($request->input('declaration_file'))))->toMediaCollection('declaration_file');
            }
        } elseif ($awb->declaration_file) {
            $awb->declaration_file->delete();
        }

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
}
