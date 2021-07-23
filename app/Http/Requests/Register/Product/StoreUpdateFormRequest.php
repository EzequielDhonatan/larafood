<?php

namespace App\Http\Requests\Register\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateFormRequest extends FormRequest
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
        $id = $this->segment( 3 );

        return
        [
            /* DADOS DO PRODUTO
            ================================================== */
            'category_id'                       => 'required',
            'title'                             => "required|min:3|max:255|unique:products,title,{$id},id",
            'flag'                              => 'required',
            'image'                             => 'required',
            'price'                             => "required|regex:/^\d+(\.\d{1,2})?$/",
            'description'                       => 'nullable|min:3|max:255'

        ]; // return
    } // rules
} // StoreUpdateFormRequest
