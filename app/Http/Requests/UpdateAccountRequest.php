<?php

namespace App\Http\Requests;

use App\Account;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateAccountRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('account_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'id_number'  => [
                'min:7',
                'max:12',
                'required',
            ],
            'first_name' => [
                'required',
            ],
            'last_name'  => [
                'required',
            ],
        ];
    }
}
