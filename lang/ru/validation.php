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

    'accepted' => 'Поле :attribute должно быть принято.',
    'accepted_if' => 'Поле :attribute должно быть принято, когда :other равно :value.',
    'active_url' => 'Поле :attribute должно быть корректным URL.',
    'after' => 'Поле :attribute должно быть датой после :date.',
    'after_or_equal' => 'Поле :attribute должно быть датой после или равной :date.',
    'alpha' => 'Поле :attribute может содержать только буквы.',
    'alpha_dash' => 'Поле :attribute может содержать только буквы, цифры, дефисы и нижние подчеркивания.',
    'alpha_num' => 'Поле :attribute может содержать только буквы и цифры.',
    'array' => 'Поле :attribute должно быть массивом.',
    'ascii' => 'Поле :attribute может содержать только однобайтовые буквенно-цифровые символы и знаки.',
    'before' => 'Поле :attribute должно быть датой до :date.',
    'before_or_equal' => 'Поле :attribute должно быть датой до или равной :date.',
    'between' => [
        'array' => 'В поле :attribute должно быть от :min до :max элементов.',
        'file' => 'Размер файла в поле :attribute должен быть от :min до :max килобайт.',
        'numeric' => 'Значение поля :attribute должно быть между :min и :max.',
        'string' => 'Длина поля :attribute должна быть от :min до :max символов.',
    ],
    'boolean' => 'Поле :attribute должно быть истинным или ложным.',
    'can' => 'Поле :attribute содержит неразрешенное значение.',
    'confirmed' => 'Подтверждение поля :attribute не совпадает.',
    'contains' => 'В поле :attribute отсутствует обязательное значение.',
    'current_password' => 'Пароль неверный.',
    'date' => 'Поле :attribute должно быть корректной датой.',
    'date_equals' => 'Поле :attribute должно быть датой, равной :date.',
    'date_format' => 'Поле :attribute должно соответствовать формату :format.',
    'decimal' => 'В поле :attribute должно быть :decimal десятичных знаков.',
    'declined' => 'Поле :attribute должно быть отклонено.',
    'declined_if' => 'Поле :attribute должно быть отклонено, когда :other равно :value.',
    'different' => 'Поля :attribute и :other должны различаться.',
    'digits' => 'Поле :attribute должно содержать ровно :digits цифр.',
    'digits_between' => 'Поле :attribute должно содержать от :min до :max цифр.',
    'dimensions' => 'У поля :attribute недопустимые размеры изображения.',
    'distinct' => 'В поле :attribute есть дублирующееся значение.',
    'doesnt_end_with' => 'Поле :attribute не должно заканчиваться на одно из следующих значений: :values.',
    'doesnt_start_with' => 'Поле :attribute не должно начинаться с одного из следующих: :values.',
    'email' => 'Поле :attribute должно быть корректным адресом электронной почты.',
    'ends_with' => 'Поле :attribute должно заканчиваться на одно из следующих значений: :values.',
    'enum' => 'Выбранное значение для поля :attribute недопустимо.',
    'exists' => 'Выбранное значение для поля :attribute недопустимо.',
    'extensions' => 'Файл в поле :attribute должен иметь одно из следующих расширений: :values.',
    'file' => 'Поле :attribute должно быть файлом.',
    'filled' => 'Поле :attribute обязательно для заполнения.',
    'gt' => [
        'array' => 'В поле :attribute должно быть больше чем :value элементов.',
        'file' => 'Размер файла в поле :attribute должен превышать :value килобайт.',
        'numeric' => 'Значение поля :attribute должно превышать :value.',
        'string' => 'Длина поля :attribute должна превышать :value символов.',
    ],
    'gte' => [
        'array' => 'Поле :attribute должно содержать :value элементов или больше.',
        'file' => 'Размер файла в поле :attribute должен быть больше или равен :value килобайт.',
        'numeric' => 'Значение поля :attribute должно быть больше или равно :value.',
        'string' => 'Длина поля :attribute должна быть больше или равна :value символов.',
    ],
    'hex_color' => 'Поле :attribute должно быть корректным шестнадцатеричным цветом.',
    'image' => 'Поле :attribute должно быть изображением.',
    'in' => 'Выбранное значение для поля :attribute недопустимо.',
    'in_array' => 'Поле :attribute должно существовать в :other.',
    'integer' => 'Поле :attribute должно быть целым числом.',
    'ip' => 'Поле :attribute должно быть корректным IP-адресом.',
    'ipv4' => 'Поле :attribute должно быть корректным IPv4-адресом.',
    'ipv6' => 'Поле :attribute должно быть корректным IPv6-адресом.',
    'json' => 'Поле :attribute должно быть корректной JSON-строкой.',
    'list' => 'Поле :attribute должно быть списком.',
    'lowercase' => 'Поле :attribute должно содержать строчные буквы.',
    'lt' => [
        'array' => 'Поле :attribute должно содержать меньше чем :value элементов.',
        'file' => 'Размер файла в поле :attribute должен быть меньше чем :value килобайт.',
        'numeric' => 'Значение поля :attribute должно быть меньше чем :value.',
        'string' => 'Длина поля :attribute должна быть меньше чем :value символов.',
    ],
    'lte' => [
        'array' => 'Поле :attribute не должно содержать более чем :value элементов.',
        'file' => 'Размер файла в поле :attribute должен быть меньше или равен :value килобайт.',
        'numeric' => 'Значение поля :attribute должно быть меньше или равно :value.',
        'string' => 'Длина поля :attribute должна быть меньше или равна :value символов.',
    ],
    'mac_address' => 'Поле :attribute должно быть корректным MAC-адресом.',
    'max' => [
        'array' => 'Поле :attribute не должно содержать более чем :max элементов.',
        'file' => 'Размер файла в поле :attribute не должен превышать :max килобайт.',
        'numeric' => 'Значение поля :attribute не должно превышать :max.',
        'string' => 'Длина поля :attribute не должна превышать :max символов.',
    ],
    'max_digits' => 'Поле :attribute не должно содержать более чем :max цифр.',
    'mimes' => 'Поле :attribute должно быть файлом типа: :values.',
    'mimetypes' => 'Поле :attribute должно быть файлом типа: :values.',
    'min' => [
        'array' => 'Поле :attribute должно содержать как минимум :min элементов.',
        'file' =>  "Размер файла в поле : attribute должен составлять как минимум :min килобайт.", 
         "Значение поля : attribute должно составлять как минимум :min.", 
         "Длина поля : attribute должна составлять как минимум :min символов.", 
    ],
    'min_digits' => 'Поле :attribute должно содержать как минимум :min цифр.',
    'missing' => 'Поле :attribute должно отсутствовать.',
    'missing_if' => 'Поле :attribute должно отсутствовать, когда :other равно :value.',
    'missing_unless' => 'Поле :attribute должно отсутствовать, если только :other не равно :value.',
    'missing_with' => 'Поле :attribute должно отсутствовать, когда присутствует :values.',
    'missing_with_all' => 'Поле :attribute должно отсутствовать, когда присутствуют все значения: :values.',
    'multiple_of' => 'Поле :attribute должно быть кратным :value.',
    'not_in' => 'Выбранное значение для поля :attribute недопустимо.',
    'not_regex' => 'Формат поля :attribute недопустим.',
    'numeric' => 'Поле :attribute должно быть числом.',
    'password' => [
        'letters' => 'Поле :attribute должно содержать как минимум одну букву.',
        'mixed' => 'Поле :attribute должно содержать как минимум одну заглавную и одну строчную букву.',
        'numbers' => 'Поле :attribute должно содержать как минимум одно число.',
        'symbols' => 'Поле :attribute должно содержать как минимум один символ.',
        'uncompromised' => 'Указанное поле :attribute появилось в утечке данных. Пожалуйста, выберите другое значение для поля.',
    ],
    'present' => 'Поле :attribute должно присутствовать.',
    'present_if' => 'Поле :attribute должно присутствовать, когда :other равно :value.',
    'present_unless' => 'Поле :attribute должно присутствовать, если только :other не равно :value.',
    'present_with' => 'Поле :attribute должно присутствовать, когда присутствует :values.',
    'present_with_all' => 'Поле :attribute должно присутствовать, когда присутствуют все значения: :values.',
    'prohibited' => 'Поле :attribute запрещено.',
    'prohibited_if' => 'Поле :attribute запрещено, когда :other равно :value.',
    'prohibited_unless' => 'Поле :attribute запрещено, если только :other не входит в список: :values.',
    'prohibits' => 'Поле :attribute запрещает присутствие поля :other.',
    'regex' => 'Формат поля :attribute недопустим.',
    'required' => 'Поле :attribute обязательно для заполнения.',
    'required_array_keys' => 'В поле :attribute должны быть заполнены записи для: :values.',
    'required_if' => 'Поле :attribute обязательно для заполнения, когда :other равно :value.',
    'required_if_accepted' => 'Поле :attribute обязательно для заполнения, когда принято значение в поле :other.',
    'required_if_declined' => 'Поле :attribute обязательно для заполнения, когда отклонено значение в поле :other.',
    'required_unless' => 'Поле :attribute обязательно для заполнения, если только :other не входит в список: :values.',
    'required_with' => 'Поле :attribute обязательно для заполнения, когда присутствует: values.',
    'required_with_all' => 'Поле :attribute обязательно для заполнения, когда присутствуют все значения: :values.',
    'required_without' => 'Поле :attribute обязательно для заполнения, когда отсутствует: values.',
    'required_without_all' => 'Поле :attribute обязательно для заполнения, когда ни одно из значений: values не присутствует.',
    'same' => 'Значение поля :attribute должно совпадать с полем: other.',
    'size' => [
        'array' => 'В поле :attribute должно содержаться ровно :size элементов.',
        'file' => 'Размер файла в поле :attribute должен составлять ровно :size килобайт.',
        'numeric' => 'Значение поля :attribute должно составлять ровно :size.',
        'string' => 'Длина поля :attribute должна составлять ровно :size символов.',
    ],
    'starts_with' => 'Поле :attribute должно начинаться с одного из следующих значений: :values.',
    'string' => 'Поле :attribute должно быть строкой.',
    'timezone' => 'Поле :attribute должно быть корректным часовым поясом.',
    'unique' => 'Значение поля :attribute уже занято.',
    'uploaded' => 'Не удалось загрузить поле :attribute.',
    'uppercase' => 'Поле :attribute должно содержать заглавные буквы.',
    'url' => 'Поле :attribute должно быть корректным URL.',
    'ulid' => 'Поле :attribute должно быть корректным ULID.',
    'uuid' => 'Поле :attribute должно быть корректным UUID.',

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
