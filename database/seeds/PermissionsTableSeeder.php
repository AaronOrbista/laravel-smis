<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => '1',
                'title' => 'user_management_access',
            ],
            [
                'id'    => '2',
                'title' => 'permission_create',
            ],
            [
                'id'    => '3',
                'title' => 'permission_edit',
            ],
            [
                'id'    => '4',
                'title' => 'permission_show',
            ],
            [
                'id'    => '5',
                'title' => 'permission_delete',
            ],
            [
                'id'    => '6',
                'title' => 'permission_access',
            ],
            [
                'id'    => '7',
                'title' => 'role_create',
            ],
            [
                'id'    => '8',
                'title' => 'role_edit',
            ],
            [
                'id'    => '9',
                'title' => 'role_show',
            ],
            [
                'id'    => '10',
                'title' => 'role_delete',
            ],
            [
                'id'    => '11',
                'title' => 'role_access',
            ],
            [
                'id'    => '12',
                'title' => 'user_create',
            ],
            [
                'id'    => '13',
                'title' => 'user_edit',
            ],
            [
                'id'    => '14',
                'title' => 'user_show',
            ],
            [
                'id'    => '15',
                'title' => 'user_delete',
            ],
            [
                'id'    => '16',
                'title' => 'user_access',
            ],
            [
                'id'    => '17',
                'title' => 'item_category_access',
            ],
            [
                'id'    => '18',
                'title' => 'item_create',
            ],
            [
                'id'    => '19',
                'title' => 'item_edit',
            ],
            [
                'id'    => '20',
                'title' => 'item_show',
            ],
            [
                'id'    => '21',
                'title' => 'item_delete',
            ],
            [
                'id'    => '22',
                'title' => 'item_access',
            ],
            [
                'id'    => '23',
                'title' => 'brand_create',
            ],
            [
                'id'    => '24',
                'title' => 'brand_edit',
            ],
            [
                'id'    => '25',
                'title' => 'brand_show',
            ],
            [
                'id'    => '26',
                'title' => 'brand_delete',
            ],
            [
                'id'    => '27',
                'title' => 'brand_access',
            ],
            [
                'id'    => '28',
                'title' => 'requestor_access',
            ],
            [
                'id'    => '29',
                'title' => 'account_create',
            ],
            [
                'id'    => '30',
                'title' => 'account_edit',
            ],
            [
                'id'    => '31',
                'title' => 'account_show',
            ],
            [
                'id'    => '32',
                'title' => 'account_delete',
            ],
            [
                'id'    => '33',
                'title' => 'account_access',
            ],
            [
                'id'    => '34',
                'title' => 'approved_request_create',
            ],
            [
                'id'    => '35',
                'title' => 'approved_request_edit',
            ],
            [
                'id'    => '36',
                'title' => 'approved_request_show',
            ],
            [
                'id'    => '37',
                'title' => 'approved_request_delete',
            ],
            [
                'id'    => '38',
                'title' => 'approved_request_access',
            ],
            [
                'id'    => '39',
                'title' => 'item_release_record_create',
            ],
            [
                'id'    => '40',
                'title' => 'item_release_record_edit',
            ],
            [
                'id'    => '41',
                'title' => 'item_release_record_show',
            ],
            [
                'id'    => '42',
                'title' => 'item_release_record_delete',
            ],
            [
                'id'    => '43',
                'title' => 'item_release_record_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
