<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
/**
* Run the database seeds.
*
* @return void
*/
public function run()
{
$users = [
[
'name' => 'test_admin',
'email' => 'admin@admin.com',
'password' => Hash::make('123456789')
],
[
'name' => 'test_view',
'email' => 'view@view.com',
'password' => Hash::make('123456789')
],
[
'name' => 'test_manage',
'email' => 'manage@manage.com',
'password' => Hash::make('123456789')
]
];

foreach ($users as $key => $value) {
User::create($value);
}

/*test_admin*/
$user=User::all()->first();
$user->attachRole(1);

/*test_view*/
$user = User::find(2);
$user->attachRole(2);

/*test_manage*/
$user = User::find(3);
$user->attachRole(3);
}
}
