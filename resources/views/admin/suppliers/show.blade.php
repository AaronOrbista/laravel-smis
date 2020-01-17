@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Show Suppliers
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.suppliers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            ID
                        </th>
                        <td>
                            {{ $supplier->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Company Name
                        </th>
                        <td>
                            {{ $supplier->company_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            TIN Number
                        </th>
                        <td>
                            {{ $supplier->tin_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                           Address
                        </th>
                        <td>
                            {{ $supplier->address }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.suppliers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<!--
<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#requestor_approved_requests" role="tab" data-toggle="tab">
                {{ trans('cruds.approvedRequest.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="requestor_approved_requests">
            @includeIf('admin.accounts.relationships.requestorApprovedRequests', ['approvedRequests' => $account->requestorApprovedRequests])
        </div>
    </div>
</div>
-->
@endsection