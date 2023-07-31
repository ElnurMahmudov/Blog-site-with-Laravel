<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class elaqeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'required | min:3 | max:20',
            'email'=>'required | min:5 | max:25',
            'phone'=>'required | min:3 | max:12',
            'message'=>'required | min:10 | max:500'
        ];
    }

    public function messages(){
        return [
        'name.required'=>'Ad, soyad düzgün daxil edilməmişdir!',
        'email.required'=>'E-poçt ünvanı düzdün daxil edilməmişdir!',
        'phone.required'=>'Əlaqə nömrəsi düzgün daxil edilməmişdir',
        'message.required'=>'Mesaj düzgün daxil edilməmişdir'
        ];
    }
}
