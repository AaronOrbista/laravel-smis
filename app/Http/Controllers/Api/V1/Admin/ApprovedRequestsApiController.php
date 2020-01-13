<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\ApprovedRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreApprovedRequestRequest;
use App\Http\Requests\UpdateApprovedRequestRequest;
use App\Http\Resources\Admin\ApprovedRequestResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApprovedRequestsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('approved_request_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ApprovedRequestResource(ApprovedRequest::with(['requestor', 'item', 'description', 'brand'])->get());
    }

    public function store(StoreApprovedRequestRequest $request)
    {
        $approvedRequest = ApprovedRequest::create($request->all());

        return (new ApprovedRequestResource($approvedRequest))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ApprovedRequest $approvedRequest)
    {
        abort_if(Gate::denies('approved_request_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ApprovedRequestResource($approvedRequest->load(['requestor', 'item', 'description', 'brand']));
    }

    public function update(UpdateApprovedRequestRequest $request, ApprovedRequest $approvedRequest)
    {
        $approvedRequest->update($request->all());

        return (new ApprovedRequestResource($approvedRequest))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ApprovedRequest $approvedRequest)
    {
        abort_if(Gate::denies('approved_request_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $approvedRequest->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
