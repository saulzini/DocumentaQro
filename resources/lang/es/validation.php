<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | such as the size rules. Feel free to tweak each of these messages.
    |
    */

    "accepted"         => ":attribute debe ser aceptado.",
    "active_url"       => ":attribute no es una URL válida.",
    "after"            => ":attribute debe ser una fecha posterior a :date.",
    "alpha"            => ":attribute solo debe contener letras.",
    "alpha_dash"       => ":attribute solo debe contener letras, números y guiones.",
    "alpha_num"        => ":attribute solo debe contener letras y números.",
    "array"            => ":attribute debe ser un conjunto.",
    "before"           => ":attribute debe ser una fecha anterior a :date.",
    "between"          => [
        "numeric" => ":attribute tiene que estar entre :min - :max.",
        "file"    => ":attribute debe pesar entre :min - :max kilobytes.",
        "string"  => ":attribute tiene que tener entre :min - :max caracteres.",
        "array"   => ":attribute tiene que tener entre :min - :max ítems.",
    ],
    "boolean"          => "El campo :attribute debe tener un valor verdadero o falso.",
    "confirmed"        => "La confirmación de :attribute no coincide.",
    "date"             => ":attribute no es una fecha válida.",
    "date_format"      => "La :attribute no corresponde al formato dia/mes/año",
    "different"        => ":attribute y :other deben ser diferentes.",
    "digits"           => ":attribute debe tener :digits dígitos.",
    "digits_between"   => ":attribute debe tener entre :min y :max dígitos.",
    "email"            => ":attribute no es un correo válido",
    "exists"           => ":attribute es inválido.",
    "filled"           => "El campo :attribute es obligatorio.",
    "image"            => ":attribute debe ser una imagen.",
    "in"               => "El campo :attribute es inválido.",
    "integer"          => ":attribute debe ser un número entero.",
    "ip"               => ":attribute debe ser una dirección IP válida.",
    "max"              => [
        "numeric" => ":attribute no debe ser mayor a :max.",
        "file"    => ":attribute no debe ser mayor que :max kilobytes.",
        "string"  => ":attribute no debe ser mayor que :max caracteres.",
        "array"   => ":attribute no debe tener más de :max elementos.",
    ],
    "mimes"            => ":attribute debe ser un archivo con formato: :values.",
    "min"              => [
        "numeric" => "El tamaño de :attribute debe ser de al menos :min.",
        "file"    => "El tamaño de :attribute debe ser de al menos :min kilobytes.",
        "string"  => ":attribute debe contener al menos :min caracteres.",
        "array"   => ":attribute debe tener al menos :min elementos.",
    ],
    "not_in"           => ":attribute es inválido.",
    "numeric"          => ":attribute debe ser numérico.",
    "regex"            => "El formato de :attribute es inválido.",
    "required"         => "El campo :attribute es obligatorio.",
    "required_if"      => "El campo :attribute es obligatorio cuando :other es :value.",
    "required_with"    => "El campo :attribute es obligatorio cuando :values está presente.",
    "required_with_all" => "El campo :attribute es obligatorio cuando :values está presente.",
    "required_without" => "El campo :attribute es obligatorio cuando :values no está presente.",
    "required_without_all" => "El campo :attribute es obligatorio cuando ninguno de :values estén presentes.",
    "same"             => ":attribute y :other deben coincidir.",
    "size"             => [
        "numeric" => "El tamaño de :attribute debe ser :size.",
        "file"    => "El tamaño de :attribute debe ser :size kilobytes.",
        "string"  => ":attribute debe contener :size caracteres.",
        "array"   => ":attribute debe contener :size elementos.",
    ],
    "string"           => "The :attribute must be a string.",
    "timezone"         => "El :attribute debe ser una zona válida.",
    "unique"           => ":attribute ya ha sido registrado.",
    "url"              => "El formato :attribute es inválido.",
    "current_password" => "Contraseña actual equivocada",
    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [

            'rule-name' => 'custom-message',

        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [

        'Peliculas' => 'Películas',
        'Pelicula' => 'Película',
        'Realizadores' => 'Realizadores',
        'Trafico' => 'Tráfico',

        'Funcion' => 'Función',
        'Programa' => 'Programa',
        'Festival' => 'Festival',
        'Sedes' => 'Sedes',
        'Integrantes' => 'Integrantes',

        'Patrocinios' => 'Patrocinios',
        'Caracteristicas' => 'Características',
        'Paquetes' => 'Paquetes',
        'Patrocinadores' => 'Patrocinadores',

        'Reportes' => 'Reportes',
        'ReportesFunciones' => 'Reportes Funciones',
        'ReportesPaises' => 'Reportes Países',
        'ReportesProgramas' => 'Reportes Programas',
        'ReportesFestivales' => 'Reportes Festivales',
        'ReportesSedes' => 'Reportes Sedes',


        'Configuracion' => 'Configuración',

        'Anio'=>'año',
        'material'=>'El material',
        'buscar' => 'Buscar',
        'realizadores' => 'Realizadores',
        'nombre' => 'Nombre',
        'vinculo' => 'Vínculo',
        'busqueda' => 'Búsqueda',
        'agregarRealizador' => 'Agregar realizador',
        'agregarPatrocinador' => 'Agregar patrocinador',
        'puesto' => 'Puesto',
        'tipo' => 'Tipo',
        'paquete' => 'Paquete',
        'notas' => 'Notas',

        'validatorRealizadorNombre'=>'El nombre es requerido',
        'camposObligatorios' => 'Campos obligatorios',
        'nombredelRealizador' => 'Nombre del realizador',
        'nombredelPatrocinador' => 'Nombre del patrocinador',
        'placeNotas' => 'Aquí puede añadir sus notas',
        'telefono' => 'Teléfono',
        'agregar' => 'Agregar',
        'modificar' => 'Modificar',
        'eliminar' => 'Eliminar',
        'consultar' => 'Consultar',
        'modificarRealizador' => 'Modificar realizador',
        'modificarPatrocinador' => 'Modificar patrocinador',
        'exportar' => 'Exportar',
        'consultarRealizador' => 'Consultar Realizador',
        'consultarPatrocinador' => 'Consultar Patrocinador',
        'mensajePaquete' => 'No tiene paquete',

        'mensajeEliminarRealizador' => '¿Seguro que desea eliminar el realizador?',
        'mensajeModificarRealizador' => 'return confirm ("¿Seguro que desea modificar el realizador?")',

        'mensajeEliminarPatrocinador'=>'¿Seguro que desea eliminar el patrocinador?',
        'mensajeModificarPatrocinador' => 'return confirm ("¿Seguro que desea modificar el realizador?")',


        'contrasena' => 'Contraseña',

        'ingresar' => 'Ingresar',
        'enviar' => 'Enviar',
        'recuerdame' => 'Recuérdame',
        'olvidastecontrasena' => '¿Olvidaste tu contraseña?',

        'contrasenaActual' => 'Contraseña actual',
        'contrasenaNueva' => 'Contraseña nueva',
        'contrasenaConfirmar' => 'Confirmar nueva contraseña ',
        'recuperarContrasena' => 'Recuperar contraseña ',
        'recordarContrasena' => 'Recordar contraseña',
        'guardar' => 'Guardar',
        'mensajeModificarContrasena' => 'return confirm("¿Seguro que desea modificar contraseña?")',
        'errores' => 'Existen algunos problemas con los valores ingresados.',

        'Festivales'=>'Festivales',
        'Título'=>'Título',
        'mensajeEliminarFestival'=>'¿Seguro que desea eliminar el festival?',
        'mensajeModificarFestival' => 'return confirm ("¿Seguro que desea modificar el festival?")',
        'agregarFestival' => 'Agregar festival',
        'consultarFestival' => 'Consultar festival',
        'Fecha'=>'Fecha',
        'Funciones'=>'Funciones',
        'Programas'=>'Programas',
        'NoFunciones'=>'No tiene funciones',
        'NoProgramas'=>'No tiene programas',
        'NoPatrocinadores'=>'No tiene patrocinadores',
        'modificarFestival'=>'Modificar festival',
        'tituloFestival'=>'Título del festival',

        'mensajeEliminarSede'=>'¿Seguro que desea eliminar la sede?',
        'agregarSede' => 'Agregar sede',

        'validatorSedeRequerido'=>'El nombre de la sede es requerido',
        'validatorLongitudNombre'=>'El nombre debe tener como máximo 255 caracteres',
        'validatorLongitudVinculo'=>'El vinculo debe tener como máximo 255 caracteres',
        'validatorEmail'=>'El e-mail no es válido',
        'validatorNumeroTelefono'=>'El teléfono sólo puede tener números',
        'consultarSede'=>'Consultar sede',
        'modificarSede'=>'Modificar sede',
        'nombreSede'=>'Nombre de la sede',
        'Selecciona'=>'Selecciona',
        'mensajeModificarSede' => 'return confirm ("¿Seguro que desea modificar la sede?")',

        'Pais'=>'País',
        'Anno'=>'Año',
        'mensajeEliminarPelicula'=>'¿Seguro que desea eliminar la película?',
        'mensajeModificarPelicula' => 'return confirm ("¿Seguro que desea modificar la película?")',
        'agregarPelicula'=>'Agregar película',
        'consultarPelicula'=>'Consultar película',
        'Director'=>'Director',
        'Duracion'=>'Director',
        'Tipo'=>'Director',
        'Subtitulos'=>'Subtitulos',
        'Sinopsis'=>'Sinopsis',
        'Trailer'=>'Tráiler',
        'Material'=>'Material',
        'Material'=>'Material',
        'reemplazarMaterial'=>'Reemplazar',
        'NoTiene'=>'No tiene',
        'modificarPelicula'=>'Modificar película',
        'tituloPeliculaPlace'=>'Título de la película',
        'directorPeliculaPlace'=>'Nombre del director',
        'annoPeliculaPlace'=>'Año de la película',
        'sinopsisPeliculaPlace'=>'Ingrese sipnopsis',
        'duracionPeliculaPlace'=>'Duración en minutos',
        'trailerPeliculaPlace'=>'URL del tráiler',
        'materialActual'=>'Material actual',
        'clickDescargar'=>'Click aquí para descargar',


    ],

];
