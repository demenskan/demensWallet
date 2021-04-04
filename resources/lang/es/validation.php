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

    'accepted' => 'El atributo :attribute debe ser aceptado.',
    'active_url' => 'El :attribute no es una URL válida.',
    'after' => 'El atributo :attribute debe ser una fecha después de :date.',
    'after_or_equal' => 'El atributo :attribute debe ser una fecha igual o posterior a :date.',
    'alpha' => 'El atributo :attribute debe contener solamente letras.',
    'alpha_dash' => 'El atributo :attribute debe contener solamente letras, numeros, guiones o guiones bajos.',
    'alpha_num' => 'El atributo :attribute debe contener solamente letras y numeros.',
    'array' => 'El atributo :attribute debe ser un vector.',
    'before' => 'El atributo :attribute debe ser una fecha anterior a :date.',
    'before_or_equal' => 'El atributo :attribute debe ser una fecha anterior o igual a :date.',
    'between' => [
        'numeric' => 'El atributo :attribute debe estar entre :min y :max.',
        'file' => 'El atributo :attribute debe ser de entre :min y :max kilobytes.',
        'string' => 'El atributo :attribute debe ser de entre :min y :max caracteres.',
        'array' => 'El atributo :attribute debe ser de entre :min y :max elementos.',
    ],
    'boolean' => 'El atributo :attribute debe ser "cierto" o "falso".',
    'confirmed' => 'La confirmación del atributo :attribute no coincide.',
    'date' => 'El atributo :attribute no es una fecha válida.',
    'date_equals' => 'El atributo :attribute debe ser una fecha igual a :date.',
    'date_format' => 'El atributo :attribute no coincide con el formato :format.',
    'different' => 'El atributo :attribute y :other deben ser diferentes.',
    'digits' => 'El atributo :attribute debe tener :digits digitos.',
    'digits_between' => 'El atributo :attribute debe tener entre :min y :max digitos.',
    'dimensions' => 'El atributo :attribute no tiene dimensiones de imagen válidas.',
    'distinct' => 'El atributo :attribute tiene un campo duplicado.',
    'email' => 'El atributo :attribute debe ser una dirección válida de correo.',
    'ends_with' => 'El atributo :attribute debe de terminar con algo de lo siguiente: :values.',
    'exists' => 'El atributo :attribute es inválido.',
    'file' => 'El atributo :attribute debe ser un archivo.',
    'filled' => 'El atributo :attribute debe tener un valor.',
    'gt' => [
        'numeric' => 'El atributo :attribute debe ser mayor que :value.',
        'file' => 'El atributo :attribute debe ser mayor que :value kilobytes.',
        'string' => 'El atributo :attribute debe tener más de :value caracteres.',
        'array' => 'El atributo :attribute debe tener mas de :value items.',
    ],
    'gte' => [
        'numeric' => 'El atributo :attribute debe ser mayor o igual a :value.',
        'file' => 'El atributo :attribute debe ser mayor o igual a :value kilobytes.',
        'string' => 'El atributo :attribute debe tener :value o más caracteres.',
        'array' => 'El atributo :attribute debe tener :value items o más.',
    ],
    'image' => 'El atributo :attribute debe de ser una imagen.',
    'in' => 'El atributo seleccionado :attribute es inválido.',
    'in_array' => 'El atributo :attribute no existe en :other.',
    'integer' => 'El atributo :attribute debe ser un número entero.',
    'ip' => 'El atributo :attribute debe ser una dirección válida IP.',
    'ipv4' => 'El atributo :attribute debe ser una dirección válida IPv4.',
    'ipv6' => 'El atributo :attribute debe ser una dirección válida IPv6.',
    'json' => 'El atributo :attribute debe ser una cadena válida JSON.',
    'lt' => [
        'numeric' => 'El atributo :attribute debe ser menor a :value.',
        'file' => 'El atributo :attribute debe tener menos de :value kilobytes.',
        'string' => 'El atributo :attribute debe tener menos de :value caracteres.',
        'array' => 'El atributo :attribute debe tener menos de :value items.',
    ],
    'lte' => [
        'numeric' => 'El atributo :attribute debe ser menor o igual a :value.',
        'file' => 'El atributo :attribute debe tener :value kilobytes o menos.',
        'string' => 'El atributo :attribute debe tener :value caracteres o menos.',
        'array' => 'El atributo :attribute no debe tener más de :value items.',
    ],
    'max' => [
        'numeric' => 'El atributo :attribute no debe ser mayor a :max.',
        'file' => 'El atributo :attribute no debe tener más de :max kilobytes.',
        'string' => 'El atributo :attribute no debe tener más de :max caracteres.',
        'array' => 'El atributo :attribute may not have more than :max items.',
    ],
    'mimes' => 'El atributo :attribute must be a file of type: :values.',
    'mimetypes' => 'El atributo :attribute must be a file of type: :values.',
    'min' => [
        'numeric' => 'El atributo :attribute must be at least :min.',
        'file' => 'El atributo :attribute must be at least :min kilobytes.',
        'string' => 'El atributo :attribute must be at least :min characters.',
        'array' => 'El atributo :attribute must have at least :min items.',
    ],
    'not_in' => 'The selected :attribute is invalid.',
    'not_regex' => 'El atributo :attribute format is invalid.',
    'numeric' => 'El atributo :attribute must be a number.',
    'password' => 'The password is incorrect.',
    'present' => 'El atributo :attribute field must be present.',
    'regex' => 'El atributo :attribute format is invalid.',
    'required' => 'El atributo :attribute field is required.',
    'required_if' => 'El atributo :attribute field is required when :other is :value.',
    'required_unless' => 'El atributo :attribute field is required unless :other is in :values.',
    'required_with' => 'El atributo :attribute field is required when :values is present.',
    'required_with_all' => 'El atributo :attribute field is required when :values are present.',
    'required_without' => 'El atributo :attribute field is required when :values is not present.',
    'required_without_all' => 'El atributo :attribute field is required when none of :values are present.',
    'same' => 'El atributo :attribute and :other must match.',
    'size' => [
        'numeric' => 'El atributo :attribute must be :size.',
        'file' => 'El atributo :attribute must be :size kilobytes.',
        'string' => 'El atributo :attribute must be :size characters.',
        'array' => 'El atributo :attribute must contain :size items.',
    ],
    'starts_with' => 'El atributo :attribute must start with one of the following: :values.',
    'string' => 'El atributo :attribute must be a string.',
    'timezone' => 'El atributo :attribute must be a valid zone.',
    'unique' => 'El atributo :attribute has already been taken.',
    'uploaded' => 'El atributo :attribute failed to upload.',
    'url' => 'El atributo :attribute format is invalid.',
    'uuid' => 'El atributo :attribute must be a valid UUID.',

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
