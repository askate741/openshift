<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChurchRequest extends FormRequest
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
/*            'name'=>"required",
            'add_zipcode'=>"required",
            'add_city'=>"required",
            'add_dist'=>"required",
            'add_street'=>"required",
            'tel'=>"required",
            'ext'=>"required",
            'contact'=>"required"*/
        ];
    }
}
