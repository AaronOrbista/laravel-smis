<?php

namespace App\Http\Controllers\Admin;

use App\ApprovedRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyItemReleaseRecordRequest;
use App\Http\Requests\StoreItemReleaseRecordRequest;
use App\Http\Requests\UpdateItemReleaseRecordRequest;
use App\ItemReleaseRecord;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ItemReleaseRecordsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('item_release_record_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $itemReleaseRecords = ItemReleaseRecord::all();

        return view('admin.itemReleaseRecords.index', compact('itemReleaseRecords'));
    }

    public function create()
    {
        abort_if(Gate::denies('item_release_record_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $control_numbers = ApprovedRequest::all()->pluck('control_number', 'id')->prepend(trans('global.pleaseSelect'), '');

        $date_issueds = ApprovedRequest::all()->pluck('date_requested', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.itemReleaseRecords.create', compact('control_numbers', 'date_issueds'));
    }

    public function store(StoreItemReleaseRecordRequest $request)
    {
        $itemReleaseRecord = ItemReleaseRecord::create($request->all());

        return redirect()->route('admin.item-release-records.index');
    }

    public function edit(ItemReleaseRecord $itemReleaseRecord)
    {
        abort_if(Gate::denies('item_release_record_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $control_numbers = ApprovedRequest::all()->pluck('control_number', 'id')->prepend(trans('global.pleaseSelect'), '');

        $date_issueds = ApprovedRequest::all()->pluck('date_requested', 'id')->prepend(trans('global.pleaseSelect'), '');

        $itemReleaseRecord->load('control_number', 'date_issued');

        return view('admin.itemReleaseRecords.edit', compact('control_numbers', 'date_issueds', 'itemReleaseRecord'));
    }

    public function update(UpdateItemReleaseRecordRequest $request, ItemReleaseRecord $itemReleaseRecord)
    {
        $itemReleaseRecord->update($request->all());

        return redirect()->route('admin.item-release-records.index');
    }

    public function show(ItemReleaseRecord $itemReleaseRecord)
    {
        abort_if(Gate::denies('item_release_record_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $itemReleaseRecord->load('control_number', 'date_issued');

        return view('admin.itemReleaseRecords.show', compact('itemReleaseRecord'));
    }

    public function destroy(ItemReleaseRecord $itemReleaseRecord)
    {
        abort_if(Gate::denies('item_release_record_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $itemReleaseRecord->delete();

        return back();
    }

    public function massDestroy(MassDestroyItemReleaseRecordRequest $request)
    {
        ItemReleaseRecord::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
