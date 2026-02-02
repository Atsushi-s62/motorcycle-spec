<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = [
        'maker',
        'car_model',
        'model',
        'price',
        'release_date',
        'full_length',
        'overall_width',
        'overall_height',
        'seat_height',
        'weight',
        'fuel_economy',
        'engine_type',
        'number_of_cylinders',
        'cylinder_arrangement',
        'cooling_method',
        'engine_displacement',
        'cam_valve_drive_system',
        'number_of_valves',
        'max_power_km',
        'max_power_ps',
        'max_output_speed',
        'max_torque_nm',
        'max_torque_kgfm',
        'max_torque_rotation_speed',
        'fuel_tank_capacity',
        'fuel_type',
        'range',
        'front_tire_size',
        'rear_tire_size',
        'remarks',
    ];

    // $post->comments
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
