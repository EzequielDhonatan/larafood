<?php

namespace App\Http\Requests\Register\Plan\DetailPlan;

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
        $url = $this->segment( 5 );

        return
        [
            /* DADOS DO DETALHE DO PLANO
            ================================================== */
            'name'      => "required"

        ]; // return
    } // rules
} // StoreUpdateFormRequest
