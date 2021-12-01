<?php

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'client_create',
            ],
            [
                'id'    => 18,
                'title' => 'client_edit',
            ],
            [
                'id'    => 19,
                'title' => 'client_show',
            ],
            [
                'id'    => 20,
                'title' => 'client_delete',
            ],
            [
                'id'    => 21,
                'title' => 'client_access',
            ],
            [
                'id'    => 22,
                'title' => 'notification_create',
            ],
            [
                'id'    => 23,
                'title' => 'notification_edit',
            ],
            [
                'id'    => 24,
                'title' => 'notification_show',
            ],
            [
                'id'    => 25,
                'title' => 'notification_delete',
            ],
            [
                'id'    => 26,
                'title' => 'notification_access',
            ],
            [
                'id'    => 27,
                'title' => 'awb_create',
            ],
            [
                'id'    => 28,
                'title' => 'awb_edit',
            ],
            [
                'id'    => 29,
                'title' => 'awb_show',
            ],
            [
                'id'    => 30,
                'title' => 'awb_delete',
            ],
            [
                'id'    => 31,
                'title' => 'awb_access',
            ],
            [
                'id'    => 32,
                'title' => 'client_fee_create',
            ],
            [
                'id'    => 33,
                'title' => 'client_fee_edit',
            ],
            [
                'id'    => 34,
                'title' => 'client_fee_show',
            ],
            [
                'id'    => 35,
                'title' => 'client_fee_delete',
            ],
            [
                'id'    => 36,
                'title' => 'client_fee_access',
            ],
            [
                'id'    => 37,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 38,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 39,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 40,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 41,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 42,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 43,
                'title' => 'invoice_create',
            ],
            [
                'id'    => 44,
                'title' => 'invoice_edit',
            ],
            [
                'id'    => 45,
                'title' => 'invoice_show',
            ],
            [
                'id'    => 46,
                'title' => 'invoice_delete',
            ],
            [
                'id'    => 47,
                'title' => 'invoice_access',
            ],
            [
                'id'    => 48,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
