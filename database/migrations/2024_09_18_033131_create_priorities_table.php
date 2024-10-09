<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
        Schema::create('priorities', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('description');
            $table->timestamps();
        });

        DB::table('priorities')->insert([
            [
                'name' => 'high',
                'description' => 'High Priority',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'medium',
                'description' => 'Medium Priority',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'low',
                'description' => 'Low Priority',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('priorities');
    }
};
