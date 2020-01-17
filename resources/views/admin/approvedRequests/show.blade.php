@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.approvedRequest.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.approved-requests.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.approvedRequest.fields.id') }}
                        </th>
                        <td>
                            {{ $approvedRequest->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.approvedRequest.fields.control_number') }}
                        </th>
                        <td>
                            {{ $approvedRequest->control_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.approvedRequest.fields.requestor') }}
                        </th>
                        <td>
                            {{ $approvedRequest->requestor->id_number ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.approvedRequest.fields.item') }}
                        </th>
                        <td>
                            {{ $approvedRequest->item->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.approvedRequest.fields.description') }}
                        </th>
                        <td>
                            {{ $approvedRequest->description->description ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.approvedRequest.fields.brand') }}
                        </th>
                        <td>
                            {{ $approvedRequest->brand->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.approvedRequest.fields.quantity') }}
                        </th>
                        <td>
                            {{ $approvedRequest->quantity }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.approvedRequest.fields.unit') }}
                        </th>
                        <td>
                            {{ $approvedRequest->unit }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.approvedRequest.fields.price') }}
                        </th>
                        <td>
                            {{ $approvedRequest->price }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.approvedRequest.fields.date_requested') }}
                        </th>
                        <td>
                            {{ $approvedRequest->date_requested }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.approved-requests.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#control_number_item_release_records" role="tab" data-toggle="tab">
                {{ trans('cruds.itemReleaseRecord.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#date_issued_item_release_records" role="tab" data-toggle="tab">
                {{ trans('cruds.itemReleaseRecord.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="control_number_item_release_records">
            @includeIf('admin.approvedRequests.relationships.controlNumberItemReleaseRecords', ['itemReleaseRecords' => $approvedRequest->controlNumberItemReleaseRecords])
        </div>
        <div class="tab-pane" role="tabpanel" id="date_issued_item_release_records">
            @includeIf('admin.approvedRequests.relationships.dateIssuedItemReleaseRecords', ['itemReleaseRecords' => $approvedRequest->dateIssuedItemReleaseRecords])
        </div>
    </div>
</div>

@endsection