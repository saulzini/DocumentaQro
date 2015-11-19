<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class TraficosRequest extends Request
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
        //dd($this);
        return [
            //
            'Pelicula'=>'required',
            'Status'=>'required|in:Buscando contacto,Por enviar correo,Mail enviado,Mail respondido,Ya con permiso,Ya con material,Por pagar,Pagado,En revision,Revisado,Devuelto,Perdido,Almacenado',
            'Formato' =>'required',
            'Costo' => 'required',
            'Tipo' => 'required|in:Entrante,Saliente',
        ];
    }
}
