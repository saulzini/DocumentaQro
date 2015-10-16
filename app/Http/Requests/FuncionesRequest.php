<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Carbon\Carbon;

class FuncionesRequest extends Request
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
            'Titulo'=>'required',
            'Sede' => 'required|exists:sedes,id',
            'Fecha' =>  'required |date_format:d/m/Y H:i',
            'Asistencia'=>'numeric',
            'Status'=>'required|in:Programada,Confirmada,Cancelada,Realizada',
            'Pelicula'=>'required|exists:peliculas,id',
            'Festival'=>'required|exists:festivales,id',
            'image' =>'mimes:jpeg,bmp,png,jpg',
            'Programa'=>'exists:programas,id'

        ];
    }
}
