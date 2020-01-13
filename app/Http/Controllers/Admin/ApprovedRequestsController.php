<?php

namespace App\Http\Controllers\Admin;

use App\Account;
use App\ApprovedRequest;
use App\Brand;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyApprovedRequestRequest;
use App\Http\Requests\StoreApprovedRequestRequest;
use App\Http\Requests\UpdateApprovedRequestRequest;
use App\Item;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ApprovedRequestsController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = ApprovedRequest::with(['requestor', 'item', 'description', 'brand'])->select(sprintf('%s.*', (new ApprovedRequest)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'approved_request_show';
                $editGate      = 'approved_request_edit';
                $deleteGate    = 'approved_request_delete';
                $crudRoutePart = 'approved-requests';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : "";
            });
            $table->editColumn('control_number', function ($row) {
                return $row->control_number ? $row->control_number : "";
            });
            $table->addColumn('requestor_id_number', function ($row) {
                return $row->requestor ? $row->requestor->id_number : '';
            });

            $table->addColumn('item_name', function ($row) {
                return $row->item ? $row->item->name : '';
            });

            $table->addColumn('description_description', function ($row) {
                return $row->description ? $row->description->description : '';
            });

            $table->addColumn('brand_name', function ($row) {
                return $row->brand ? $row->brand->name : '';
            });

            $table->editColumn('quantity', function ($row) {
                return $row->quantity ? $row->quantity : "";
            });
            $table->editColumn('unit', function ($row) {
                return $row->unit ? $row->unit : "";
            });
            $table->editColumn('price', function ($row) {
                return $row->price ? $row->price : "";
            });

            $table->rawColumns(['actions', 'placeholder', 'requestor', 'item', 'description', 'brand']);

            return $table->make(true);
        }

        return view('admin.approvedRequests.index');
    }

    public function create()
    {
        abort_if(Gate::denies('approved_request_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $requestors = Account::all()->pluck('id_number', 'id')->prepend(trans('global.pleaseSelect'), '');

        $items = Item::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $descriptions = Item::all()->pluck('description', 'id')->prepend(trans('global.pleaseSelect'), '');

        $brands = Brand::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.approvedRequests.create', compact('requestors', 'items', 'descriptions', 'brands'));
    }

    public function store(StoreApprovedRequestRequest $request)
    {
        $approvedRequest = ApprovedRequest::create($request->all());

        return redirect()->route('admin.approved-requests.index');
    }

    public function edit(ApprovedRequest $approvedRequest)
    {
        abort_if(Gate::denies('approved_request_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $requestors = Account::all()->pluck('id_number', 'id')->prepend(trans('global.pleaseSelect'), '');

        $items = Item::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $descriptions = Item::all()->pluck('description', 'id')->prepend(trans('global.pleaseSelect'), '');

        $brands = Brand::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $approvedRequest->load('requestor', 'item', 'description', 'brand');

        return view('admin.approvedRequests.edit', compact('requestors', 'items', 'descriptions', 'brands', 'approvedRequest'));
    }

    public function update(UpdateApprovedRequestRequest $request, ApprovedRequest $approvedRequest)
    {
        $approvedRequest->update($request->all());

        return redirect()->route('admin.approved-requests.index');
    }

    public function show(ApprovedRequest $approvedRequest)
    {
        abort_if(Gate::denies('approved_request_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $approvedRequest->load('requestor', 'item', 'description', 'brand', 'controlNumberItemReleaseRecords', 'dateIssuedItemReleaseRecords');

        return view('admin.approvedRequests.show', compact('approvedRequest'));
    }

    public function destroy(ApprovedRequest $approvedRequest)
    {
        abort_if(Gate::denies('approved_request_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $approvedRequest->delete();

        return back();
    }

    public function massDestroy(MassDestroyApprovedRequestRequest $request)
    {
        ApprovedRequest::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
