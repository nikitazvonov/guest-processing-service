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

    'email' => ':attribute должен соответствовать требованиям к адресам почты.',
    'integer' => 'Поле :attribute должно быть числом.',
    'max' => [
        'numeric' => 'Поле :attribute не должно быть больше максимального значения :max.',
        'string' => 'Поле :attribute не должно быть длиннее :max символов.',
    ],
    'min' => [
        'numeric' => 'Поле :attribute должно быть равно как минимум числу :min.',
        'string' => 'Поле :attribute должно иметь длину минимум :min символов(а).',
    ],
    'regex' => 'Формат поля :attribute не соответствует требованиям.',
    'required' => 'Поле :attribute обязательно для заполнения.',
    'string' => 'Поле :attribute должно быть строкой.',
    'unique' => 'Значение поля :attribute уже занято.',

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

    'attributes' => [
        'name' => 'Имя',
        'surname' => 'Фамилия',
        'email' => 'Адрес электронной почты',
        'phone_code' => 'Код номера телефона',
        'phone_number' => 'Номер телефона',
        'country' => 'Наименование страны',
        'per_page' => 'Количество записей',
        'page' => 'Номер страницы',
    ],

];
