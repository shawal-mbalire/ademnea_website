<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use App\Models\Farmer;

class MakeFarmersSystemUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // First, create a new user for each existing farmer
        $farmers = Farmer::all();
        foreach ($farmers as $farmer) {
            $user = User::create([
                'name' => "$farmer->fname $farmer->lname",
                'email' => $farmer->email,
                'password' => $farmer->password,
                'role' => 'farmer',
            ]);

            // Set the farmer's user_id to the newly created user's id
            $farmer->user_id = $user->id;
            $farmer->save();
        }

        Schema::table('farmers', function (Blueprint $table) {
            $table->dropColumn('password');
            $table->dropColumn('email');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->default('user');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('farmers', function (Blueprint $table) {
            $table->string('password');
            $table->string('email');
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role');
        });
    }
}