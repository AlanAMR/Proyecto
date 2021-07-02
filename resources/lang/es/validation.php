<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'El campo :attribute debe ser Aceptado.',
    'active_url' => 'El campo :attribute no es una url valida.',
    'after' => 'El campo :attribute debe ser una fecha posterior a :date.',
    'after_or_equal' => 'El campo :attribute debe ser una fecha igual o posterior a :date.',
    'alpha' => 'El campo :attribute unicamente debe contener letras [a-z y A-Z].',
    'alpha_dash' => 'El campo :attribute  debe contener unicamente letras, numeros, diagonales y guines bajos [a-z, A-Z, 0-9, /, _].',
    'alpha_num' => 'El campo :attribute unicamente debe conterne letras y numeros [a-z, A-Z].',
    'array' => 'El campo :attribute debe ser un conjunto.',
    'before' => 'El campo :attribute debe ser una fecha anterior a :date.',
    'before_or_equal' => 'El campo :attribute debe ser una fecha anterior o igual a :date.',
    'between' => [
        'numeric' => 'El campo :attribute debe estar entre :min y :max.',
        'file' => 'El campo :attribute debe estar entre :min y :max kilobytes.',
        'string' => 'El campo :attribute debe estar entre :min y :max caracteres.',
        'array' => 'El campo :attribute debe tener entre :min y :max elementos.',
    ],
    'boolean' => 'El campo :attribute debe ser verdadero o falso.',
    'confirmed' => 'No se confirmo el campo :attribute .',
    'date' => 'El campo :attribute no es una fecha valida.',
    'date_equals' => 'El campo :attribute debe ser una fecha igual a  :date.',
    'date_format' => 'El campo :attribute no concuerda con el patron :format.',
    'different' => 'El campo :attribute y :other deben ser diferentes.',
    'digits' => 'El campo :attribute debe tener :digits digitos.',
    'digits_between' => 'El campo :attribute debe tener entre :min y :max digitos.',
    'dimensions' => 'El campo :attribute tiene unas dimenciones invalidas.',
    'distinct' => 'El :attribute tiene un valor duplicado.',
    'email' => 'El campo :attribute debe ser un correo valido.',
    'ends_with' => 'El campo :attribute debe terminar con los siguiente valores: :values.',
    'exists' => 'El campo :attribute es invalido.',
    'file' => 'El campo :attribute debe ser un archivo.',
    'filled' => 'El campo :attribute debe ser llenado.',
    'gt' => [
        'numeric' => 'El campo :attribute debe ser mas grande que :value.',
        'file' => 'El campo :attribute debe ser mas grande que :value kilobytes.',
        'string' => 'El campo :attribute debe ser mas grande que :value caracteres.',
        'array' => 'El campo :attribute debe tener mas de :value elementos.',
    ],
    'gte' => [
        'numeric' => 'El campo :attribute debe ser mas grande o igual a :value.',
        'file' => 'El campo :attribute debe ser mas grande o igual a :value kilobytes.',
        'string' => 'El campo :attribute debe ser mas grande o igual a :value caracteres.',
        'array' => 'El campo :attribute debe tener :value elementos o mas.',
    ],
    'image' => 'El campo :attribute debe ser una imagen.',
    'in' => 'El campo :attribute  seleccionado es invalido.',
    'in_array' => 'El campo :attribute no existe en :other.',
    'integer' => 'El campo :attribute debe ser un entero.',
    'ip' => 'El campo :attribute debe ser una direccion ip valida.',
    'ipv4' => 'El campo :attribute debe ser una direccion IPv4 valida.',
    'ipv6' => 'El campo :attribute debe ser una direccion IPv6 valida.',
    'json' => 'El campo :attribute debe ser una cadena JSON.',
    'lt' => [
        'numeric' => 'El campo :attribute debe se menor :value.',
        'file' => 'El campo :attribute debe pesar menos de  :value kilobytes.',
        'string' => 'The :attribute must be less than :value caracteres.',
        'array' => 'The :attribute must have less than :value items.',
    ],
    'lte' => [
        'numeric' => 'El campo :attribute debe ser menor o igual a :value.',
        'file' => 'El campo :attribute debe ser menor o igual a :value kilobytes.',
        'string' => 'El campo :attribute debter tener menos(o igual) que :value caracteres.',
        'array' => 'El conjunto :attribute no debe tener menos (o igual) de  :value elementos.',
    ],
    'max' => [
        'numeric' => 'El campo :attribute no debe ser mayor que  :max.',
        'file' => 'El campo :attribute no debe ser mayor de :max kilobytes.',
        'string' => 'El campo :attribute no debe tener mas de :max caracteres.',
        'array' => 'El conjunto :attribute no debe tener mas de :max elementos.',
    ],
    'mimes' => 'El campo :attribute debe ser un archivo de tipo: :values.',
    'mimetypes' => 'El campo :attribute debe ser un archivo de tipo: :values.',
    'min' => [
        'numeric' => 'El campo :attribute debe ser como minimo :min.',
        'file' => 'El campo :attribute debe pesar como minimo :min kilobytes.',
        'string' => 'El campo :attribute debe tener como minimo :min caracteres.',
        'array' => 'El conjunto :attribute debe tener como minimo :min elementos.',
    ],
    'not_in' => 'El campo :attribute seleccionado no es valido.',
    'not_regex' => 'El formato del campo :attribute no es valido.',
    'numeric' => 'El campo :attribute debe ser un numero.',
    'password' => 'La contraseña es incorrecta.',
    'present' => 'El campo :attribute debe estar presente.',
    'regex' => 'La expresion regular del campo :attribute no tiene un formato valido.',
    'required' => 'El campo ":attribute" es requerido.',
    'required_if' => 'El campo :attribute es requerido cuando :other es :value.',
    'required_unless' => 'El campo :attribute es requerido a menos que :other sea :values.',
    'required_with' => 'El campo :attribute cuando el campo :values esta presente.',
    'required_with_all' => 'El campo :attribute los campos :values estan presentes.',
    'required_without' => 'El campo :attribute es requerido cuando :values no esta presente.',
    'required_without_all' => 'El campo :attribute cuando ninguno de los campos :values estan presentes.',
    'same' => 'El campo :attribute y :other deben ser los mismos.',
    'size' => [
        'numeric' => 'El campo :attribute debe tener un tamaño de :size.',
        'file' => 'El campo :attribute debe tener un tamaño de :size kilobytes.',
        'string' => 'El campo :attribute debe tener un tamaño de :size caracteres.',
        'array' => 'El conjunto :attribute debe contener :size elementos.',
    ],
    'starts_with' => 'El campo :attribute debe comenzar con uno de los siguientes valores: :values.',
    'string' => 'El campo :attribute debe ser una cadena.',
    'timezone' => 'El campo :attribute debe ser una zona valida.',
    'unique' => 'El campo :attribute ya a sido tomado / esta en uso.',
    'uploaded' => 'El campo :attribute fallo al subirse.',
    'url' => 'El campo :attribute tiene un formato invalido.',
    'uuid' => 'El campo :attribute debe ser un UUID valido.',

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
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
