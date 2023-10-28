<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $userExists = DB::table('users')->where('email', 'teste@teste.com')->exists();

        if (!$userExists) {
            DB::table('users')->insert([
                'name' => 'Teste',
                'email' => 'teste@teste.com',
                'password' => Hash::make('123'),
                'permission_level' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('users')->where('email', 'teste@teste.com')->delete();
    }
};
