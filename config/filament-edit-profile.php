<?php

return [
    'show_custom_fields' => true,

    'custom_fields' => [
        'FirstName' => [
            'type' => 'text',
            'label' => 'First Name',
            'placeholder' => 'your first name',
            'required' => true,
            'rules' => 'max:255',
        ],
        'MiddleName' => [
            'type' => 'text',
            'label' => 'Middle Name',
            'placeholder' => 'your middle name',
            'required' => true,
            'rules' => 'max:255',
        ],
        'LastName' => [
            'type' => 'text',
            'label' => 'Last Name',
            'placeholder' => 'your last name',
            'required' => true,
            'rules' => 'max:255',
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
        'ContactNumber' => [
            'type' => 'text',
            'label' => 'Contact Number',
            'placeholder' => 'your contact number',
            'required' => true,
            'rules' => 'max:255',
        ],
        'Address' => [
            'type' => 'textarea',
            'label' => 'Address',
            'placeholder' => 'your address',
            'rows' => '3',
            'required' => true,
        ],
        'AboutMe' => [
            'type' =>'textarea',
            'label' => 'About Me',
            'placeholder' => 'about me',
            'rows' => '3',
            'required' => true,
        ],
        'BirthDate' => [
            'type' => 'datetime',
            'label' => 'Birth Date',
            'placeholder' => 'Datetime',
            'seconds' => true,
        ],
        'Agreements' => [
            'type' => 'boolean',
            'label' => 'Agree in terms and conditions',
            'placeholder' => 'Boolean',
            'required' => true,
        ],
      
            //

    ],
    ];


    // 'shouldShowAvatarForm' => true,
    // return [
    //     'disk' => 's3',
    //     'visibility' => 'public',
    // ];
       


    //another custom field

    //     'custom_field_1' => [
    //         'type' => 'text',
    //         'label' => 'Custom Textfield 1',
    //         'placeholder' => 'Custom Field 1',
    //         'required' => false,
    //         'rules' => 'max:255',
    //     ],
    //     'custom_field_2' => [
    //         'type' => 'password',
    //         'label' => 'Custom Password field 2',
    //         'placeholder' => 'Custom Password Field 2',
    //         'required' => false,
    //         'rules' => 'max:255',
    //     ],
    //     'custom_field_3' => [
    //         'type' => 'select',
    //         'label' => 'Custom Select 3',
    //         'placeholder' => 'Select',
    //         'required' => false,
    //         'options' => [
    //             'option_1' => 'Option 1',
    //             'option_2' => 'Option 2',
    //             'option_3' => 'Option 3',
    //         ],
    //     ],
    //     'custom_field_4' => [
    //         'type' =>'textarea',
    //         'label' => 'Custom Textarea 4',
    //         'placeholder' => 'Textarea',
    //         'rows' => '3',
    //         'required' => false,
    //     ],
    //     'custom_field_5' => [
    //         'type' => 'datetime',
    //         'label' => 'Custom Datetime 5',
    //         'placeholder' => 'Datetime',
    //         'seconds' => false,
    //     ],
    //     'custom_field_6' => [
    //         'type' => 'boolean',
    //         'label' => 'Custom Boolean 6',
    //         'placeholder' => 'Boolean'
    //     ],
// ];
