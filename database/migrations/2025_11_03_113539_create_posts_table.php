<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('maker');
            $table->string('car_model');
            $table->string('model');
            $table->integer('price');
            $table->string('release_date');
            $table->integer('full_length');
            $table->integer('overall_width');
            $table->integer('overall_height');
            $table->integer('seat_height');
            $table->integer('weight');
            $table->integer('fuel_economy');
            $table->string('engine_type');
            $table->integer('number_of_cylinders');
            $table->string('cylinder_arrangement');
            $table->string('cooling_method');
            $table->integer('engine_displacement');
            $table->string('cam_valve_drive_system');
            $table->integer('number_of_valves');
            $table->integer('max_power_km');
            $table->integer('max_power_ps');
            $table->integer('max_output_speed');
            $table->integer('max_torque_nm');
            $table->integer('max_torque_kgfm');
            $table->integer('max_torque_rotation_speed');
            $table->integer('fuel_tank_capacity');
            $table->string('fuel_type');
            $table->integer('range');
            $table->string('front_tire_size');
            $table->string('rear_tire_size');
            $table->string('remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
