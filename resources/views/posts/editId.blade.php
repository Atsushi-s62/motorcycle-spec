<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    <title>バイク性能比較表</title>
</head>
<body>
    
    <h1>バイク性能比較一覧  | 編集 -> ID: {{ $post->id }} </h1>
    
    <div class="edit-form">
        <form method="post" action="{{ route('posts.update', $post) }}">
            @method('PATCH')
            @csrf
            <div>
                <label for="maker">メーカー</label>
                <select id="maker" name="maker">
                    @foreach($makers as $value => $maker)
                        <option value="{{ $value }}" {{ $post->maker == $value ? 'selected' : '' }}>{{ $maker }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="car_model">車種</label>
                <input type="text" id="car_model" name="car_model" value="{{ old('car_model', $post->car_model) }}">
            </div>
            <div>
                <label for="model">型式</label>
                <input type="text" id="model" name="model" value="{{ old('model', $post->model) }}">
            </div>
            <div>
                <label for="price">価格</label>
                <input type="text" id="price" name="price" value="{{ old('price', $post->price) }}">
            </div>
            <div>
                <label for="release_date">発売日</label>
                <input type="text" id="release_date" name="release_date" value="{{ old('release_date', $post->release_date) }}">
            </div>
            <div>
                <label for="full_length">全長(mm)</label>
                <input type="text" id="full_length" name="full_length" value="{{ old('full_length', $post->full_length) }}">
            </div>
            <div>
                <label for="overall_width">全幅(mm)</label>
                <input type="text" id="overall_width" name="overall_width" value="{{ old('overall_width', $post->overall_width) }}">
            </div>
            <div>
                <label for="overall_height">全高(mm)</label>
                <input type="text" id="overall_height" name="overall_height" value="{{ old('overall_height', $post->overall_height) }}">
            </div>
            <div>
                <label for="seat_height">シート高 (mm)</label>
                <input type="text" id="seat_height" name="seat_height" value="{{ old('seat_height', $post->seat_height) }}">
            </div>
            <div>
                <label for="weight">車両重量 (kg)</label>
                <input type="text" id="weight" name="weight" value="{{ old('weight', $post->weight) }}">
            </div>
            <div>
                <label for="fuel_economy">燃料消費率(WMTCモード)(km/L)</label>
                <input type="text" id="fuel_economy" name="fuel_economy" value="{{ old('fuel_economy', $post->fuel_economy) }}">
            </div>
            <div>
                <label for="engine_type">原動機種類</label>
                <input type="text" id="engine_type" name="engine_type" value="{{ old('engine_type', $post->engine_type) }}">
            </div>
            <div>
                <label for="number_of_cylinders">気筒数</label>
                <input type="text" id="number_of_cylinders" name="number_of_cylinders" value="{{ old('number_of_cylinders', $post->number_of_cylinders) }}">
            </div>
            <div>
                <label for="cylinder_arrangement">シリンダ配列</label>
                <input type="text" id="cylinder_arrangement" name="cylinder_arrangement" value="{{ old('cylinder_arrangement', $post->cylinder_arrangement) }}">
            </div>
            <div>
                <label for="cooling_method">冷却方式</label>
                <input type="text" id="cooling_method" name="cooling_method" value="{{ old('cooling_method', $post->cooling_method) }}">
            </div>
            <div>
                
                <label for="engine_displacement">排気量 (cc)</label>
                <input type="text" id="engine_displacement" name="engine_displacement" value="{{ old('engine_displacement', $post->engine_displacement) }}">
            </div>
            <div>
                <label for="cam_valve_drive_system">カム・バルブ駆動方式</label>
                <input type="text" id="cam_valve_drive_system" name="cam_valve_drive_system" value="{{ old('cam_valve_drive_system', $post->cam_valve_drive_system) }}">
            </div>
            <div>
                <label for="number_of_valves">気筒あたりバルブ数</label>
                <input type="text" id="number_of_valves" name="number_of_valves" value="{{ old('number_of_valves', $post->number_of_valves) }}">
            </div>
            <div>
                <label for="max_power_km">最高出力（kW）</label>
                <input type="text" id="max_power_km" name="max_power_km" value="{{ old('max_power_km', $post->max_power_km) }}">
            </div>
            <div>
                <label for="max_power_ps">最高出力（PS）</label>
                <input type="text" id="max_power_ps" name="max_power_ps" value="{{ old('max_power_ps', $post->max_power_ps) }}">
            </div>
            <div>
                <label for="max_output_speed">最高出力回転数（rpm）</label>
                <input type="text" id="max_output_speed" name="max_output_speed" value="{{ old('max_output_speed', $post->max_output_speed) }}">
            </div>
            <div>
                <label for="max_torque_nm">最大トルク（N・m）</label>
                <input type="text" id="max_torque_nm" name="max_torque_nm" value="{{ old('max_torque_nm', $post->max_torque_nm) }}">
            </div>
            <div>
                <label for="max_torque_kgfm">最大トルク（kgf･m）</label>
                <input type="text" id="max_torque_kgfm" name="max_torque_kgfm" value="{{ old('max_torque_kgfm', $post->max_torque_kgfm) }}">
            </div>
            <div>
                <label for="max_torque_rotation_speed">最大トルク回転数（rpm）</label>
                <input type="text" id="max_torque_rotation_speed" name="max_torque_rotation_speed" value="{{ old('max_torque_rotation_speed', $post->max_torque_rotation_speed) }}">
            </div>
            <div>
                <label for="fuel_tank_capacity">燃料タンク容量 (L)</label>
                <input type="text" id="fuel_tank_capacity" name="fuel_tank_capacity" value="{{ old('fuel_tank_capacity', $post->fuel_tank_capacity) }}">
            </div>
            <div>
                <label for="fuel_type">燃料（種類）</label>
                    <select id="fuel_type" name="fuel_type">
                        @foreach($fuels as $value => $fuel)
                            <option value="{{ $value }}" {{ $post->fuel_type == $value ? 'selected' : '' }}>{{ $fuel }}</option>
                        @endforeach
                    </select>
            </div>
            <div>
                <label for="range">満タン時航続距離</label>
                <input type="text" id="range" name="range" value="{{ old('range', $post->range) }}">
            </div>
            <div>
                <label for="front_tire_size">タイヤ（前）</label>
                <input type="text" id="front_tire_size" name="front_tire_size" value="{{ old('front_tire_size', $post->front_tire_size) }}">
            </div>
            <div>
                <label for="rear_tire_size">タイヤ（後）</label>
                <input type="text" id="rear_tire_size" name="rear_tire_size" value="{{ old('rear_tire_size', $post->rear_tire_size) }}">
            </div>
            <div>
                <label for="remarks">備考</label>
                <input type="text" id="remarks" name="remarks" value="{{ old('remarks', $post->remarks) }}">
            </div>
                <button type="submit" class="update">更新</button>
        </form>
    </div>
</body>
</html>
