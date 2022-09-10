<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
           
        return [
            'Name' => 'required',
            'Size' => 'required',
            'Weight' => 'required',
            'Color' => 'required',
            'Note' => 'required',
            'coloroption_id' => 'required',
            'weightoption_id' => 'required',
            'sizeoption_id' => 'required',
            'brand_id' => 'required',
            'categoryitem_id' => 'required',
            'Name' => 'required',
            'in_stock' => 'required',
        ];
    }
}
