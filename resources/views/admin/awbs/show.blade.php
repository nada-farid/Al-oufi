@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.awb.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.awbs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.awb.fields.id') }}
                        </th>
                        <td>
                            {{ $awb->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.awb.fields.awb_no') }}
                        </th>
                        <td>
                            {{ $awb->awb_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.awb.fields.no_of_pcs') }}
                        </th>
                        <td>
                            {{ $awb->no_of_pcs }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.awb.fields.goods_type') }}
                        </th>
                        <td>
                            {{ $awb->goods_type }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.awb.fields.decleration_no') }}
                        </th>
                        <td>
                            {{ $awb->decleration_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.awb.fields.goods_weight') }}
                        </th>
                        <td>
                            {{ $awb->goods_weight }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.awb.fields.declaration_date') }}
                        </th>
                        <td>
                            {{ $awb->declaration_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.awb.fields.declaration_file') }}
                        </th>
                        <td>
                            @if($awb->declaration_file)
                                <a href="{{ $awb->declaration_file->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.awb.fields.delivery_no') }}
                        </th>
                        <td>
                            {{ $awb->delivery_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.awb.fields.delivery_date') }}
                        </th>
                        <td>
                            {{ $awb->delivery_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.awb.fields.delivery_amount') }}
                        </th>
                        <td>
                            {{ $awb->delivery_amount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.awb.fields.goods_date') }}
                        </th>
                        <td>
                            {{ $awb->goods_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.awb.fields.customer_fees') }}
                        </th>
                        <td>
                            {{ $awb->customer_fees }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.awb.fields.receipt_no') }}
                        </th>
                        <td>
                            {{ $awb->receipt_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.awb.fields.receipt_date') }}
                        </th>
                        <td>
                            {{ $awb->receipt_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.awb.fields.remarks') }}
                        </th>
                        <td>
                            {{ $awb->remarks }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.awbs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection