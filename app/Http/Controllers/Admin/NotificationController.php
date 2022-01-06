<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyNotificationRequest;
use App\Http\Requests\StoreNotificationRequest;
use App\Http\Requests\UpdateNotificationRequest;
use App\Models\Client;
use App\Models\Notification;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Alert;

class NotificationController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('notification_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $notifications = Notification::where('status',1)->with(['client', 'media'])->get();
        
        /*$clients = Client::pluck('client_name', 'id')->prepend(trans('global.pleaseSelect'), '');*/
       $clients = Client::selectRaw("CONCAT (client_no, '-' ,client_name) as columns, id")->pluck('columns', 'id')->prepend(trans('global.pleaseSelect'), '');
        return view('admin.notifications.index', compact('notifications','clients'));
    }
    public function report(Request $request)
    {
        abort_if(Gate::denies('notification_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $notifications = Notification::where('appearance',$request->appearance)->with(['client', 'media'])->get();

        return view('admin.notifications.report', compact('notifications'));
    }

    public function create()
    {
        abort_if(Gate::denies('notification_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clients = Client::pluck('client_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.notifications.create', compact('clients'));
    }

    public function store(StoreNotificationRequest $request)
    {
        $notification = Notification::create($request->all());

      foreach ($request->input('awb_file', []) as $file) {
            $notification->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('awb_file');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $notification->id]);
        }
        Alert::success('Success', 'Notification added sucessfully');

        return redirect()->route('admin.notifications.index');
    }

    public function edit(Notification $notification)
    {
        abort_if(Gate::denies('notification_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clients = Client::pluck('client_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $notification->load('client');

        return view('admin.notifications.edit', compact('clients', 'notification'));
    }

    public function update(UpdateNotificationRequest $request, Notification $notification)
    {
        $notification->update($request->all());

       if (count($notification->awb_file) > 0) {
            foreach ($notification->awb_file as $media) {
                if (!in_array($media->file_name, $request->input('awb_file', []))) {
                    $media->delete();
                }
            }
        }
        $media = $notification->awb_file->pluck('file_name')->toArray();
        foreach ($request->input('awb_file', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $notification->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('awb_file');
            }
        }

        Alert::success('Success', 'Notification info updated sucessfully');
        return redirect()->route('admin.notifications.index');
    }

    public function show(Notification $notification)
    {
        abort_if(Gate::denies('notification_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $notification->load('client');

        return view('admin.notifications.show', compact('notification'));
    }

    public function destroy(Notification $notification)
    {
        abort_if(Gate::denies('notification_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $notification->delete();

        return back();
    }

    public function massDestroy(MassDestroyNotificationRequest $request)
    {
        Notification::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        
        abort_if(Gate::denies('notification_create') && Gate::denies('notification_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Notification();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
    public function changApparance(Request $request){
        
        $notification=Notification::where('id',$request->notification_id)->first();
        $update=$notification->update([
            'appearance'=>$request->value,
            
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
    }
    

