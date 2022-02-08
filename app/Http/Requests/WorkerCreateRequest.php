<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkerCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'workername' => 'required|max:255',
            'workerrole' => 'required',
            'workergender' => 'required',
            'workerimage' => 'required',
            'workercontent' => 'required',
            'workerphone' => 'required|max:9',
        ];
    }
}
