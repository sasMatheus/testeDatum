<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateHash extends FormRequest
{
    public function authorize()
    {
        return true;
    }
   
   
    public function rules()
    { 
        return [
            'data' => 'required|min:1|max:300'
           
            
            
        ];
    }
}
