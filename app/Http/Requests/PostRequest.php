<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
        'maker' => 'required',
        'car_model' => 'required',
        'model' => 'required',
        'price' => 'required',
        'release_date' => 'required',
        'full_length' => 'required',
        'overall_width' => 'required',
        'overall_height' => 'required',
        'seat_height' => 'required',
        'weight' => 'required',
        'fuel_economy' => 'required',
        'engine_type' => 'required',
        'number_of_cylinders' => 'required',
        'cylinder_arrangement' => 'required',
        'cooling_method' => 'required',
        'engine_displacement' => 'required',
        'cam_valve_drive_system' => 'required',
        'number_of_valves' => 'required',
        'max_power_km' => 'required',
        'max_power_ps' => 'required',
        'max_output_speed' => 'required',
        'max_torque_nm' => 'required',
        'max_torque_kgfm' => 'required',
        'max_torque_rotation_speed' => 'required',
        'fuel_tank_capacity' => 'required',
        'fuel_type' => 'required',
        'range' => 'required',
        'front_tire_size' => 'required',
        'rear_tire_size' => 'required',
        'remarks' => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'maker.required' => '※未入力です',
            'car_model.required' => '※未入力です',
            'model.required' => '※未入力です',
            'price.required' => '※未入力です',
            'release_date.required' => '※未入力です',
            'full_length.required' => '※未入力です',
            'overall_width.required' => '※未入力です',
            'overall_height.required' => '※未入力です',
            'seat_height.required' => '※未入力です',
            'weight.required' => '※未入力です',
            'fuel_economy.required' => '※未入力です',
            'engine_type.required' => '※未入力です',
            'number_of_cylinders.required' => '※未入力です',
            'cylinder_arrangement.required' => '※未入力です',
            'cooling_method.required' => '※未入力です',
            'engine_displacement.required' => '※未入力です',
            'cam_valve_drive_system.required' => '※未入力です',
            'number_of_valves.required' => '※未入力です',
            'max_power_km.required' => '※未入力です',
            'max_power_ps.required' => '※未入力です',
            'max_output_speed.required' => '※未入力です',
            'max_torque_nm.required' => '※未入力です',
            'max_torque_kgfm.required' => '※未入力です',
            'max_torque_rotation_speed.required' => '※未入力です',
            'fuel_tank_capacity.required' => '※未入力です',
            'fuel_type.required' => '※未入力です',
            'range.required' => '※未入力です',
            'front_tire_size.required' => '※未入力です',
            'rear_tire_size.required' => '※未入力です',
        ];
    }
}
