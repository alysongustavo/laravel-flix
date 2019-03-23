<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDataUserAdmin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            \App\Models\User::create([
                'name' => env('USER_ADMIN_NAME'),
                'email' => env('USER_ADMIN_EMAIL'),
                'password' => bcrypt(env('USER_ADMIN_PASSWORD')),
                'role' => \App\Models\User::ROLE_ADMIN
            ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
           $user = \App\Models\User::where('email',env('USER_ADMIN_EMAIL'));
           $user->delete();
        });
    }
}
