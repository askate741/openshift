<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 2017/1/9
 * Time: 下午 09:41
 */

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class Course_registrationsRequest extends FormRequest
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
            //
        ];
    }
}