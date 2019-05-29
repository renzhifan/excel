<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedUsersData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $users = [
            [
                'name'        => 'renzhifan',
                'email'        => 'zhifan6797@163.com',
                'password' =>bcrypt('12341234'),
            ]
        ];

        DB::table('users')->insert($users);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('users')->truncate();
    }
}
