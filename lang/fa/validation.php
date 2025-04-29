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

    'accepted' => 'فیلد :attribute باید پذیرفته شود.',
    'accepted_if' => 'فیلد :attribute باید پذیرفته شود زمانی که :other برابر با :value است.',
    'active_url' => 'فیلد :attribute باید یک URL معتبر باشد.',
    'after' => 'فیلد :attribute باید تاریخی بعد از :date باشد.',
    'after_or_equal' => 'فیلد :attribute باید تاریخی بعد یا برابر با :date باشد.',
    'alpha' => 'فیلد :attribute باید فقط شامل حروف باشد.',
    'alpha_dash' => 'فیلد :attribute باید فقط شامل حروف، اعداد، خط تیره و زیرخط باشد.',
    'alpha_num' => 'فیلد :attribute باید فقط شامل حروف و اعداد باشد.',
    'array' => 'فیلد :attribute باید یک آرایه باشد.',
    'before' => 'فیلد :attribute باید تاریخی قبل از :date باشد.',
    'before_or_equal' => 'فیلد :attribute باید تاریخی قبل یا برابر با :date باشد.',
    'between' => [
        'numeric' => 'فیلد :attribute باید بین :min و :max باشد.',
        'file' => 'فیلد :attribute باید بین :min و :max کیلوبایت باشد.',
        'string' => 'فیلد :attribute باید بین :min و :max کاراکتر باشد.',
        'array' => 'فیلد :attribute باید بین :min و :max آیتم داشته باشد.',
    ],
    'boolean' => 'فیلد :attribute باید صحیح یا غلط باشد.',
    'confirmed' => 'تأییدیه فیلد :attribute مطابقت ندارد.',
    'date' => 'فیلد :attribute باید یک تاریخ معتبر باشد.',
    'date_equals' => 'فیلد :attribute باید تاریخی برابر با :date باشد.',
    'date_format' => 'فیلد :attribute باید با فرمت :format مطابقت داشته باشد.',
    'different' => 'فیلد :attribute و :other باید متفاوت باشند.',
    'digits' => 'فیلد :attribute باید :digits رقم باشد.',
    'digits_between' => 'فیلد :attribute باید بین :min و :max رقم باشد.',
    'email' => 'فیلد :attribute باید یک آدرس ایمیل معتبر باشد.',
    'exists' => 'فیلد :attribute انتخاب شده معتبر نیست.',
    'file' => 'فیلد :attribute باید یک فایل باشد.',
    'filled' => 'فیلد :attribute باید دارای مقدار باشد.',
    'gt' => [
        'numeric' => 'فیلد :attribute باید بزرگتر از :value باشد.',
        'file' => 'فیلد :attribute باید بزرگتر از :value کیلوبایت باشد.',
        'string' => 'فیلد :attribute باید بزرگتر از :value کاراکتر باشد.',
        'array' => 'فیلد :attribute باید بیش از :value آیتم داشته باشد.',
    ],
    'gte' => [
        'numeric' => 'فیلد :attribute باید بزرگتر یا برابر با :value باشد.',
        'file' => 'فیلد :attribute باید بزرگتر یا برابر با :value کیلوبایت باشد.',
        'string' => 'فیلد :attribute باید بزرگتر یا برابر با :value کاراکتر باشد.',
        'array' => 'فیلد :attribute باید :value آیتم یا بیشتر داشته باشد.',
    ],
    'image' => 'فیلد :attribute باید یک تصویر باشد.',
    'in' => 'فیلد :attribute انتخاب شده معتبر نیست.',
    'integer' => 'فیلد :attribute باید یک عدد صحیح باشد.',
    'ip' => 'فیلد :attribute باید یک آدرس IP معتبر باشد.',
    'ipv4' => 'فیلد :attribute باید یک آدرس IPv4 معتبر باشد.',
    'ipv6' => 'فیلد :attribute باید یک آدرس IPv6 معتبر باشد.',
    'json' => 'فیلد :attribute باید یک رشته JSON معتبر باشد.',
    'lt' => [
        'numeric' => 'فیلد :attribute باید کمتر از :value باشد.',
        'file' => 'فیلد :attribute باید کمتر از :value کیلوبایت باشد.',
        'string' => 'فیلد :attribute باید کمتر از :value کاراکتر باشد.',
        'array' => 'فیلد :attribute باید کمتر از :value آیتم داشته باشد.',
    ],
    'lte' => [
        'numeric' => 'فیلد :attribute باید کمتر یا برابر با :value باشد.',
        'file' => 'فیلد :attribute باید کمتر یا برابر با :value کیلوبایت باشد.',
        'string' => 'فیلد :attribute باید کمتر یا برابر با :value کاراکتر باشد.',
        'array' => 'فیلد :attribute نباید بیشتر از :value آیتم داشته باشد.',
    ],
    'max' => [
        'numeric' => 'فیلد :attribute نباید بزرگتر از :max باشد.',
        'file' => 'فیلد :attribute نباید بزرگتر از :max کیلوبایت باشد.',
        'string' => 'فیلد :attribute نباید بزرگتر از :max کاراکتر باشد.',
        'array' => 'فیلد :attribute نباید بیشتر از :max آیتم داشته باشد.',
    ],
    'mimes' => 'فیلد :attribute باید فایلی از نوع: :values باشد.',
    'mimetypes' => 'فیلد :attribute باید فایلی از نوع: :values باشد.',
    'min' => [
        'numeric' => 'فیلد :attribute باید حداقل :min باشد.',
        'file' => 'فیلد :attribute باید حداقل :min کیلوبایت باشد.',
        'string' => 'فیلد :attribute باید حداقل :min کاراکتر باشد.',
        'array' => 'فیلد :attribute باید حداقل :min آیتم داشته باشد.',
    ],
    'not_in' => 'فیلد :attribute انتخاب شده معتبر نیست.',
    'not_regex' => 'فرمت فیلد :attribute معتبر نیست.',
    'numeric' => 'فیلد :attribute باید یک عدد باشد.',
    'present' => 'فیلد :attribute باید حضور داشته باشد.',
    'regex' => 'فرمت فیلد :attribute معتبر نیست.',
    'required' => 'فیلد :attribute الزامی است.',
    'required_if' => 'فیلد :attribute زمانی الزامی است که :other برابر با :value باشد.',
    'required_unless' => 'فیلد :attribute الزامی است مگر اینکه :other در :values باشد.',
    'required_with' => 'فیلد :attribute زمانی الزامی است که :values حضور داشته باشد.',
    'required_with_all' => 'فیلد :attribute زمانی الزامی است که :values حضور داشته باشند.',
    'required_without' => 'فیلد :attribute زمانی الزامی است که :values حضور نداشته باشد.',
    'required_without_all' => 'فیلد :attribute زمانی الزامی است که هیچ‌یک از :values حضور نداشته باشند.',
    'same' => 'فیلد :attribute و :other باید مطابقت داشته باشند.',
    'size' => [
        'numeric' => 'فیلد :attribute باید :size باشد.',
        'file' => 'فیلد :attribute باید :size کیلوبایت باشد.',
        'string' => 'فیلد :attribute باید :size کاراکتر باشد.',
        'array' => 'فیلد :attribute باید شامل :size آیتم باشد.',
    ],
    'string' => 'فیلد :attribute باید یک رشته باشد.',
    'timezone' => 'فیلد :attribute باید یک منطقه زمانی معتبر باشد.',
    'unique' => 'فیلد :attribute قبلاً گرفته شده است.',
    'uploaded' => 'بارگذاری فیلد :attribute با شکست مواجه شد.',
    'url' => 'فیلد :attribute باید یک URL معتبر باشد.',
    'uuid' => 'فیلد :attribute باید یک UUID معتبر باشد.',

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
            'rule-name' => 'پیام سفارشی',
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
