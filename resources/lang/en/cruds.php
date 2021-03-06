<?php

return [
    'userManagement' => [
        'title'          => 'User management',
        'title_singular' => 'User management',
    ],
    'permission' => [
        'title'          => 'Permissions',
        'title_singular' => 'Permission',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role' => [
        'title'          => 'Roles',
        'title_singular' => 'Role',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user' => [
        'title'          => 'Users',
        'title_singular' => 'User',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'name'                     => 'Name',
            'name_helper'              => ' ',
            'email'                    => 'Email',
            'email_helper'             => ' ',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => ' ',
            'password'                 => 'Password',
            'password_helper'          => ' ',
            'roles'                    => 'Roles',
            'roles_helper'             => ' ',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
        ],
    ],
    'client' => [
        'title'          => 'Clients',
        'title_singular' => 'Client',
        'fields'         => [
            'id'                      => 'ID',
            'id_helper'               => ' ',
            'client_no'              => 'Client No',
            'client_no_helper'              => '',
            'client_name'             => 'Client Name',
            'client_name_helper'      => ' ',
            'tel_1'                   => 'Tel1',
            'tel_1_helper'            => ' ',
            'tel_2'                   => 'Tel2',
            'tel_2_helper'            => ' ',
            'tax_number'              => 'Tax Number',
            'tax_number_helper'       => ' ',
            'short_name'              => 'Short Name',
            'short_name_helper'       => ' ',
            'email'                   => 'Email',
            'email_helper'            => ' ',
            'address'                 => 'Address',
            'address_helper'          => ' ',
            'fax'                     => 'Fax',
            'fax_helper'              => ' ',
            'contact_person'          => 'Contact Person',
            'contact_person_helper'   => ' ',
            'contact_person_2'        => 'Contact Person 2',
            'contact_person_2_helper' => ' ',
            'bank_name'               => 'Bank Name',
            'bank_name_helper'        => ' ',
            'home_tel'                => 'Home Tel',
            'home_tel_helper'         => ' ',
            'iban'                    => 'IBAN',
            'iban_helper'             => ' ',
            'mobile_number_1'         => 'Mobile Number 1',
            'mobile_number_1_helper'  => ' ',
            'mobile_number_2'         => 'Mobile Number2',
            'mobile_number_2_helper'  => ' ',
            'remarks'                 => 'Remarks',
            'remarks_helper'          => ' ',
            'from'                    => 'From',
            'from_helper'             => ' ',
            'to'                      => 'To',
            'to_helper'               => ' ',
            'created_at'              => 'Created at',
            'created_at_helper'       => ' ',
            'updated_at'              => 'Updated at',
            'updated_at_helper'       => ' ',
            'deleted_at'              => 'Deleted at',
            'deleted_at_helper'       => ' ',
            'fees'                    => 'Client Fees',
            'fees_helper'             => ' ',
        ],
    ],
    'notification' => [
        'title'          => 'Notifications',
        'title_singular' => 'Notification',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'awb_date'          => 'Awb Date',
            'awb_date_helper'   => ' ',
            'remarks'           => 'Remarks',
            'remarks_helper'    => ' ',
            'appearance'        => 'Appearance',
            'appearance_helper' => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'awb_no'            => 'Awb No',
            'awb_no_helper'     => ' ',
            'client'            => 'Client Name',
            'client_helper'     => ' ',
            'awb_file'          => 'Awb File',
            'awb_file_helper'   => ' ',
        ],
    ],
    'awb' => [
        'title'          => 'Awb Entry',
        'title_singular' => 'Awb Entry',
        'fields'         => [
            'id'                      => 'ID',
            'id_helper'               => ' ',
            'awb_no'                  => 'Awb No',
            'awb_no_helper'           => ' ',
            'serial_number'                  => 'Serial No',
            'serial_number_helper'           => ' ',
            'no_of_pcs'               => 'No Of Pcs',
            'no_of_pcs_helper'        => ' ',
            'client_name'         =>'Client Name',
            'goods_type'              => 'Goods Type',
            'goods_type_helper'       => ' ',
            'decleration_no'          => 'Decleration No',
            'decleration_no_helper'   => ' ',
            'goods_weight'            => 'Goods Weight',
            'goods_weight_helper'     => ' ',
            'declaration_date'        => 'Declaration Date',
            'declaration_date_helper' => ' ',
            'delivery_no'             => 'Delivery No',
            'delivery_no_helper'      => ' ',
            'delivery_date'           => 'Delivery Date',
            'delivery_date_helper'    => ' ',
            'delivery_amount'         => 'Storage Fees ',
            'delivery_amount_helper'  => ' ',
            'goods_date'              => 'Goods Release Date',
            'goods_date_helper'       => ' ',
            'customer_fees'           => 'Custom Fees',
            'customer_fees_helper'    => ' ',
            'receipt_no'              => 'Receipt No',
            'receipt_no_helper'       => ' ',
            'receipt_date'            => 'Receipt Date',
            'receipt_date_helper'     => ' ',
            'remarks'                 => 'Remarks',
            'remarks_helper'          => ' ',
            'created_at'              => 'Created at',
            'created_at_helper'       => ' ',
            'updated_at'              => 'Updated at',
            'updated_at_helper'       => ' ',
            'deleted_at'              => 'Deleted at',
            'deleted_at_helper'       => ' ',
            'declaration_file'        => 'Declaration File',
            'declaration_file_helper' => ' ',
        ],
    ],
    'clientFee' => [
        'title'          => 'Client Fees',
        'title_singular' => 'Client Fee',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'type'              => 'Type',
            'type_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'auditLog' => [
        'title'          => 'Audit Logs',
        'title_singular' => 'Audit Log',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'description'         => 'Description',
            'description_helper'  => ' ',
            'subject_id'          => 'Subject ID',
            'subject_id_helper'   => ' ',
            'subject_type'        => 'Subject Type',
            'subject_type_helper' => ' ',
            'user_id'             => 'User ID',
            'user_id_helper'      => ' ',
            'properties'          => 'Properties',
            'properties_helper'   => ' ',
            'host'                => 'Host',
            'host_helper'         => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
        ],
    ],
    'userAlert' => [
        'title'          => 'User Alerts',
        'title_singular' => 'User Alert',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'alert_text'        => 'Alert Text',
            'alert_text_helper' => ' ',
            'alert_link'        => 'Alert Link',
            'alert_link_helper' => ' ',
            'user'              => 'Users',
            'user_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
        ],
    ],
    'invoice' => [
        'title'          => 'Invoices',
        'title_singular' => 'Invoice',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
             'serial_number'                   => 'Serial Number',
            'serial_number_helper'            => ' ',
            'awb'                  => 'Awb',
            'awb_helper'           => ' ',
            'goods_release'        => 'Goods Release Date',
            'goods_release_helper' => ' ',
            'invoice_date'         => 'Invoice Date',
            'invoice_date_helper'  => ' ',
            'arrival_date'         => 'Arrival Date',
            'arrival_date_helper'  => ' ',
            'client'               => 'Client No',
            'client_helper'        => ' ',
            'amount'               => 'Amount',
            'amount_helper'        => ' ',
            'vat'                  => 'VAT',
            'vat_helper'           => ' ',
            'total'                => 'Total',
            'total_helper'         => ' ',
            'remarks'              => 'Remarks',
            'remarks_helper'       => ' ',
            'created_at'           => 'Created at',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Updated at',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'Deleted at',
            'deleted_at_helper'    => ' ',
        ],
    ],
    'parcode'=>[
          'client_name'=>'Client Name',
          'tax_number'=>'Tax Number',
          'invoice_number'=>'Invoice Number',
          'amount'=>'Tax Number',
          'vat'=>'V.A.T ',
          'total'=>'Total',

    ],
];
