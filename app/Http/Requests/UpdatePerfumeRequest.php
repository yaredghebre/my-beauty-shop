<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePerfumeRequest extends FormRequest
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
            'title' => ['required', 'max:150', Rule::unique('perfumes')->ignore($this->perfume)],
            'brand' => 'required', 'max:50',
            'size' => 'required', 'max:10',
            'price' => 'required', 'numeric', 'min:0.01',
            'description' => 'nullable',
            'category' => ['required', 'exists:categories,id'],
            'type' => ['required', 'exists:types,id'],
        ];
    }


    public function messages()
    {
        return [
            'title.required' => 'Il titolo è obbligatorio',
            'title.max' => 'Il titolo non deve superare :max carattteri',
            'brand.required' => 'La marca è obbligatoria',
            'brand.max' => 'La marca non deve superare :max caratteri',
            'size.required' => 'La misura è obbligatoria',
            'size.max' => 'La misura non deve superare :max caratteri',
            'price.required' => 'Il prezzo è obbligatorio',
            'price.min' => 'Inserisci un numero positivo',
            'category.required' => 'La categoria è obbligatoria',
            'type.required' => 'La tipologia è obbligatoria',

        ];
    }
}
