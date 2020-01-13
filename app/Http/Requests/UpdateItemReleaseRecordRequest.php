<?php

namespace App\Http\Requests;

use App\ItemReleaseRecord;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateItemReleaseRecordRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('item_release_record_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'control_number_id' => [
                'required',
                'integer',
            ],
            'received_by'       => [
                'required',
            ],
            'claimed'           => [
                'required',
            ],
            'date_issued_id'    => [
                'required',
                'integer',
            ],
        ];
    }
}
