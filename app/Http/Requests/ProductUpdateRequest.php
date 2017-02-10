<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
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
          'nombre' => 'required|max:60',
          'precio' => 'required|not_in:0',
          'descripcion' => 'required',
          'categoria' => 'required',
          'cantidad' => 'required|not_in:0'
        ];
    }


    public function messages()
    {
        return [
            'nombre.required' => 'Debe escribir el nombre del producto',
            'precio.required'  => 'Es necesario ponerle un precio al producto',
            'categoria.required'  => 'Es necesario escogerle una categoria al producto',
            'descripcion' => 'Es necesario darle una breve descripción al producto',
            'imgpath' => 'Es necesario subir una imagen',
            'cantidad' => 'Establezca una cantidad mayor a 0'
        ];
    }


}
