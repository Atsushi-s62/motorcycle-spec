<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    <title>登録画面</title>
</head>
<body>
    <h1>バイク性能比較一覧  | 新規登録 </h1>

    <div class="create-form">
    <form method="post" action="{{ route('posts.store') }}">
        @csrf
        <div>
            <label for="">メーカー</label>
            <select name="maker">
                <option value="" selected disabled>選択してください</option>
                @foreach($makers as $value => $maker)
                    <option value="{{ $value }}" {{ old('maker') == $value ? 'selected' : '' }}>{{ $maker }}</option>
                @endforeach
            </select>
                @error('maker')
                    <p class="error">{{ $message }}</p>
                @enderror
        </div>
        <div>
            <label for="">車種</label>
            <input type="text" id="" name="car_model" value="{{ old('car_model') }}">
            @error('car_model')
                <p class="error">{{ $message }}</p>
            @enderror

        </div>
        <div>
            <label for="">型式</label>
            <input type="text" id="" name="model" value="{{ old('model') }}">
            @error('model')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="">価格</label>
            <input type="text" id="" name="price" value="{{ old('price') }}" placeholder="">
            @error('price')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="">発売日</label>
            <input type="text" id="" name="release_date" value="{{ old('release_date') }}" placeholder="例:xxxx.xx.xx">
            @error('release_date')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="">全長(mm)</label>
            <input type="text" id="" name="full_length" value="{{ old('full_length') }}">
            @error('full_length')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="">全幅(mm)</label>
            <input type="text" id="" name="overall_width" value="{{ old('overall_width') }}">
            @error('overall_width')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="">全高(mm)</label>
            <input type="text" id="" name="overall_height" value="{{ old('overall_height') }}">
            @error('overall_height')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="">シート高 (mm)</label>
            <input type="text" id="" name="seat_height" value="{{ old('seat_height') }}">
            @error('seat_height')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="">車両重量 (kg)</label>
            <input type="text" id="" name="weight" value="{{ old('weight') }}">
            @error('weight')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="">燃料消費率(WMTCモード)(km/L)</label>
            <input type="text" id="" name="fuel_economy" value="{{ old('fuel_economy') }}">
            @error('fuel_economy')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="">原動機種類</label>
            <input type="text" id="" name="engine_type" value="{{ old('engine_type') }}">
            @error('engine_type')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="">気筒数</label>
            <input type="text" id="" name="number_of_cylinders" value="{{ old('number_of_cylinders') }}">
            @error('number_of_cylinders')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="">シリンダ配列</label>
            <input type="text" id="" name="cylinder_arrangement" value="{{ old('cylinder_arrangement') }}">
            @error('cylinder_arrangement')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="">冷却方式</label>
            <input type="text" id="" name="cooling_method" value="{{ old('cooling_method') }}">
            @error('cooling_method')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div>
            
            <label for="">排気量 (cc)</label>
            <input type="text" id="" name="engine_displacement" value="{{ old('engine_displacement') }}">
            @error('engine_displacement')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="">カム・バルブ駆動方式</label>
            <input type="text" id="" name="cam_valve_drive_system" value="{{ old('cam_valve_drive_system') }}">
            @error('cam_valve_drive_system')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="">気筒あたりバルブ数</label>
            <input type="text" id="" name="number_of_valves" value="{{ old('number_of_valves') }}">
            @error('number_of_valves')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="">最高出力（kW）</label>
            <input type="text" id="" name="max_power_km" value="{{ old('max_power_km') }}">
            @error('max_power_km')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="">最高出力（PS）</label>
            <input type="text" id="" name="max_power_ps" value="{{ old('max_power_ps') }}">
            @error('max_power_ps')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="">最高出力回転数（rpm）</label>
            <input type="text" id="" name="max_output_speed" value="{{ old('max_output_speed') }}">
            @error('max_output_speed')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="">最大トルク（N・m）</label>
            <input type="text" id="" name="max_torque_nm" value="{{ old('max_torque_nm') }}">
            @error('max_torque_nm')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="">最大トルク（kgf･m）</label>
            <input type="text" id="" name="max_torque_kgfm" value="{{ old('max_torque_kgfm') }}">
            @error('max_torque_kgfm')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="">最大トルク回転数（rpm）</label>
            <input type="text" id="" name="max_torque_rotation_speed" value="{{ old('max_torque_rotation_speed') }}">
            @error('max_torque_rotation_speed')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="">燃料タンク容量 (L)</label>
            <input type="text" id="" name="fuel_tank_capacity" value="{{ old('fuel_tank_capacity') }}">
            @error('fuel_tank_capacity')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="">燃料（種類）</label>
            <select name="fuel_type">
                <option value="" selected disabled>選択してください</option>
                @foreach($fuels as $value => $fuel)
                    <option value="{{ $value }}" {{ old('fuel_type') == $value ? 'selected' : '' }} >{{ $fuel }}</option>
                @endforeach
            </select>
            @error('fuel_type')
                    <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="">満タン時航続距離</label>
            <input type="text" id="" name="range" value="{{ old('range') }}">
            @error('range')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="">タイヤ（前）</label>
            <input type="text" id="" name="front_tire_size" value="{{ old('front_tire_size') }}">
            @error('front_tire_size')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="">タイヤ（後）</label>
            <input type="text" id="" name="rear_tire_size" value="{{ old('rear_tire_size') }}">
            @error('rear_tire_size')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="">備考</label>
            <input type="text" id="" name="remarks" value="{{ old('remarks') }}">
        </div>
        <button type="submit" class="registration">登録</button>
    </form>
    </div> 
</body>
</html>