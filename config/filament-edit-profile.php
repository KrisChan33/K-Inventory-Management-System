<?php

return [
'show_custom_fields' => true,
    'custom_fields' => [
        'First Name' => [
            'type' => 'text',
            'label' => 'First Name',
            'placeholder' => '',
            'required' => true,
            'rules' => 'required|string|max:255',
        ],
        'Middle Initial' => [
            'type' => 'password',
            'label' => 'Middile Initial',
            'placeholder' => '',
            'required' => true,
            'rules' => 'required|string|max:255',
        ],
        'Last Name' => [
            'type' => 'password',
            'label' => 'Last Name',
            'placeholder' => '',
            'required' => true,
            'rules' => 'required|string|max:255',
        ],
        'Gender' => [
            'type' => 'select',
            'label' => 'Gender',
            'placeholder' => 'Select',
            'required' => true,
            'options' => [
                'Male' => 'Male',
                'Female' => 'Female',
            ],
        ],
        'About Your Self' => [
            'type' =>'textarea',
            'label' => 'About Your Self',
            'placeholder' => '',
            'rows' => '3',
            'required' => true,
        ],
        'Date of Birth' => [
            'type' => 'datetime',
            'placeholder' => '',
            'label' => 'Date of Birth',
            'seconds' => false,
        ],
        'Agree in Confidentiality' => [
            'type' => 'boolean',
            'placeholder' => '',
            'label' => 'Agree in Confidentiality',
        ],
    ]
];
