<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class CambiarContrasenaRequest extends Request
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
        $password = User::select('password')->where('id','=',Auth::id())->get();
        $password= bcrypt($password);
        return [
            'contrasenaActual' => 'required|min:6|same:sssd|required',
            'contrasena' => 'confirmed|min:6|required',
            'contrasena_confirmation' => 'required|min:6'
        ];
    }

    public function sanitize()
    {
        return $this->only('password');
    }
}