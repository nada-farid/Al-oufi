@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.notification.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.notifications.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <!-- <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.notification.fields.id') }}
                        </th>
                        <td>
                            {{ $notification->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.notification.fields.awb_no') }}
                        </th>
                        <td>
                            {{ $notification->awb_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.notification.fields.client') }}
                        </th>
                        <td>
                            {{ $notification->client->client_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.notification.fields.awb_date') }}
                        </th>
                        <td>
                            {{ $notification->awb_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.notification.fields.awb_file') }}
                        </th>
                        <td>
                           
                           
                           
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.notification.fields.remarks') }}
                        </th>
                        <td>
                            {{ $notification->remarks }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.notification.fields.appearance') }}
                        </th>
                        <td>
                            {{ App\Models\Notification::APPEARANCE_SELECT[$notification->appearance] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.notifications.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>  -->

 <div class="row">
                <div class="form-group col-md-4">
                <label class="required" for="awb_no">{{ trans('cruds.notification.fields.awb_no') }}</label>
                <input class="form-control {{ $errors->has('awb_no') ? 'is-invalid' : '' }}" type="text" name="awb_no" id="awb_no" value="{{ old('awb_no', $notification->awb_no) }}" disabled>
                @if($errors->has('awb_no'))
                    <div class="invalid-feedback">
                        {{ $errors->first('awb_no') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.notification.fields.awb_no_helper') }}</span>
            </div>
            <div class="form-group col-md-4">
                <label class="required" for="client_id">{{ trans('cruds.notification.fields.client') }}</label>
          <input class="form-control" value="{{$notification->client->client_name}}" disabled>
                @if($errors->has('client'))
                    <div class="invalid-feedback">
                        {{ $errors->first('client') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.notification.fields.client_helper') }}</span>
            </div>
            <div class="form-group col-md-4">
                <label class="required" for="awb_date">{{ trans('cruds.notification.fields.awb_date') }}</label>
                <input class="form-control date {{ $errors->has('awb_date') ? 'is-invalid' : '' }}" type="text" name="awb_date" id="awb_date" value="{{ old('awb_date', $notification->awb_date) }}" disabled>
                @if($errors->has('awb_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('awb_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.notification.fields.awb_date_helper') }}</span>
            </div>
            <div class="form-group col-md-4">
                <label for="awb_file">{{ trans('cruds.notification.fields.awb_file') }}</label>
                   @foreach($notification->awb_file as $key => $media)
                                <a class="form-control"  href="{{ $media->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endforeach
                            </div>
            <div class="form-group col-md-4">
                <label for="remarks">{{ trans('cruds.notification.fields.remarks') }}</label>
                <textarea class="form-control {{ $errors->has('remarks') ? 'is-invalid' : '' }}" name="remarks" id="remarks" disabled>{{ old('remarks', $notification->remarks) }}</textarea>
                @if($errors->has('remarks'))
                    <div class="invalid-feedback">
                        {{ $errors->first('remarks') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.notification.fields.remarks_helper') }}</span>
            </div>
            <div class="form-group col-md-4">
                <label class="required">{{ trans('cruds.notification.fields.appearance') }}</label>
                   <input class="form-control" value="{{$notification->appearance}}" disabled>
                @if($errors->has('appearance'))
                    <div class="invalid-feedback">
                        {{ $errors->first('appearance') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.notification.fields.appearance_helper') }}</span>
            </div>
            </div>
            </div>
                       <a class="btn btn-default" href="{{ route('admin.notifications.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>

@endsection