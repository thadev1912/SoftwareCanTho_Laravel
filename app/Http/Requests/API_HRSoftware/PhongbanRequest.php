<?php

namespace App\Http\Requests\API_HRSoftware;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
class PhongbanRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'ma_pb'=>'required',
            'ten_pb'=>'required',
            
        ];
    }
    public function messages()
    {
        return [
            'ma_pb.required'=>'Mã phòng ban không được để trống!!!',
            'ten_pb.required'=>'Tên phòng ban không được để trống!!!',           
            
        ];
    }
    protected function failedValidation(Validator $validator)
{
   
    throw new HttpResponseException(response()->json($validator->errors(), 422));
    
    
}
}
