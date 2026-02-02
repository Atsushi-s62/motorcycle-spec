<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    <title>バイク性能比較表</title>
</head>
<body>

    
    <h1>
        <a href="{{ route('posts.index') }}">バイク性能比較一覧</a>
    </h1>

    <p id="intro">
        国内４大メーカーの現行で販売されているバイク仕様比較表です（ＥＶ車除く）。<br>
        比較表のおおまかな使い方については下の【使い方ガイド】のボタンをクリックすると表示されます。
    </p>

    <div id="guide-open">使い方ガイド</div>

    

    <section id="guide-text" class="hidden">
        <p>初期画面ではすべてのバイクが比較表に表示されています。<br>
        メーカー別、排気量別のボタンを押すごとに該当する項目を表示・非表示にできるので好みの条件を指定してお使いください。<br>
        表の項目に【アイコン】があるものはソート機能を使うことができ、クリックごとに
        昇順、降順とデータの並べ替えができます。<br>
        車種が表示されている同じセルの一番下にそれぞれにコメントのリンクがあります。<br>
        クリックするとコメント投稿フォームと投稿歴があればコメントが表示されます。
        車種に関する感想等、自由に投稿することができます。<br>
        発売日に関してはカラーチェンジも含めた最新モデルの発売日になっています。<br>
        </p>
        <div id="guide-close">閉じる</div>
    </section>

    <div id="mask" class="hidden"></div>

    {{-- メーカー別 --}}
    <div class="by-maker">
        <p>メーカー別</p>
            <ul>
                <li class="btn m-honda active" data-bymaker="HONDA">HONDA</li>
                <li class="btn m-yamaha active" data-bymaker="YAMAHA">YAMAHA</li>
                <li class="btn m-suzuki active" data-bymaker="SUZUKI">SUZUKI</li>
                <li class="btn m-kawasaki active" data-bymaker="KAWASAKI">KAWASAKI</li>
            </ul>
    </div>

    {{-- 排気量別 --}}
    <div class="by-displacement">
        <p>排気量別</p>
            <ul>
                <li class="btn cc active" data-bycc="over400">401cc以上</li>
                <li class="btn cc active" data-bycc="251-400">251～400cc</li>
                <li class="btn cc active" data-bycc="126-250">126～250cc</li>
                <li class="btn cc active" data-bycc="51-125">51～125cc</li>
                <li class="btn cc active" data-bycc="under50">50cc以下</li>
                <li class="btn cc active"data-bycc="new-standard">新基準原付</li>
            </ul>
    </div>

    <table>
        <thead>
            <tr>
                <th>
                    <span>車種</span><br>
                    <span data-sort="price" class="sort">価格 (税込)</span><br>
                    <span>(発売日)</span>
                </th> 
                <th>
                    <span data-sort="full-length" class="sort">全長</span>
                    <br>✕<br>
                    <span data-sort="overall-width" class="sort">全幅</span>
                    <br>✕<br>
                    <span data-sort="overall-height" class="sort">全高</span>
                </th>
                <th data-sort="seat-height" class="sort">シート高</th>
                <th data-sort="weight" class="sort">重量</th>
                <th data-sort="fuel-economy" class="sort">
                    <span>燃費</span><br>
                    <span>(WMTCモード)</span>
                </th>
                <th>エンジン</th>    <!--冷却方式-原動機種類-カム-バルブ数-シリンダ-気筒数　→例: 水冷4ストロークDOHC4並列（直列）4　-->
                <th data-sort="engine-displacement" class="sort">排気量</th>
                <th data-sort="max-power-ps" class="sort">最高出力</th>    <!-- 最高出力（kW）-最高出力（PS）-最高出力回転数（rpm） →例: 83[113] / 7,750 -->
                <th data-sort="max-torque-kgfm" class="sort">最大トルク</th>  <!-- 最大トルク（N・m）-最大トルク（kgf･m）-最大トルク回転数（rpm） →例: 112[11.4] / 6,250 -->
                <th data-sort="fuel-tank-capacity" class="sort">
                    <span>タンク容量</span><br>
                    <span>(燃料種類)</span>
                </th>
                <th data-sort="range" class="sort">航続距離</th>
                <th>タイヤサイズ</th>
            </tr>
        </thead>
        <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>
                            <p data-maker="{{ $post->maker }}"><span class="maker-tag">{{ $post->maker }}</span></p>
                            <p data-car-model="{{ $post->car_model }}">
                                <a href="https://www.google.com/search?q={{ $post->maker }}+{{ $post->car_model }}" target="_blank">
                                    {{ $post->car_model }}
                                </a>    
                            </p>
                            <p data-price="{{ $post->price }}">¥{{ number_format($post->price) }}円</p>
                            <p data-relase-date="{{ $post->release_date }}">( {{ $post->release_date }} )</p>
                            <p><a href="{{ route('posts.commentId', $post) }}">コメント({{ $post->comments_count }}件)</a></p>
                        </td>

                        <td data-full-length="{{ $post->full_length }}"
                            data-overall-width="{{ $post->overall_width }}"
                            data-overall-height="{{ $post->overall_height }}"               
                                {{ number_format($post->full_length) }}mm<br>✕<br>
                                {{ number_format($post->overall_width) }}mm<br>✕<br>
                                {{ number_format($post->overall_height) }}mm
                        </td>
                        <td data-seat-height="{{ $post->seat_height }}">{{ $post->seat_height }}mm</td>
                        <td data-weight="{{ $post->weight }}">{{ $post->weight }}kg</td>
                        <td data-fuel-economy="{{ $post->fuel_economy }}">{{ $post->fuel_economy }}km/L</td>

                        <td data-cooling-method="{{ $post->cooling_method }}"
                            data-engine-type="{{ $post->engine_type }}"
                            data-cylinder-arrangement="{{ $post->cylinder_arrangement }}"
                            data-number-of-cylinders="{{ $post->number_of_cylinders }}"
                            data-cam_valve-drive-system="{{ $post->cam_valve_drive_system }}"
                            data-number-of-valves="{{ $post->number_of_valves }}"
                        >       {{ $post->cooling_method }}
                                {{ $post->engine_type }}
                            @if ($post->cylinder_arrangement == '単気筒')
                                {{ $post->cylinder_arrangement }}<br>
                            @else
                                {{ $post->cylinder_arrangement }}
                                {{ $post->number_of_cylinders }}気筒<br> 
                            @endif
                                {{ $post->cam_valve_drive_system }}
                                {{ $post->number_of_valves }}バルブ        
                        </td>
                        <td data-engine-displacement="{{ $post->engine_displacement }}">{{ number_format($post->engine_displacement) }}cc</td>

                        <td data-max-power-km="{{ $post->max_power_km }}"
                            data-max-power-ps="{{ $post->max_power_ps }}"
                            data-max-output-speed="{{ $post->max_output_speed }}"
                        >       {{ $post->max_power_km }}kW
                                ({{ $post->max_power_ps }}PS) / <br>
                                {{ number_format($post->max_output_speed) }}rpm
                        </td>

                        <td data-max-torque-nm="{{ $post->max_torque_nm }}"
                            data-max-torque-kgfm="{{ $post->max_torque_kgfm }}"
                            data-max-torque-rotation-speed="{{ $post->max_torque_rotation_speed }}"
                        >                  
                                {{ $post->max_torque_nm }}N・m
                                ({{ $post->max_torque_kgfm }}kgf・m) / <br>
                                {{ number_format($post->max_torque_rotation_speed) }}rpm
                        </td>

                        <td data-fuel-tank-capacity="{{ $post->fuel_tank_capacity }}"
                            data-fuel-type="{{ $post->fuel_type }}"
                        >                  
                                {{ $post->fuel_tank_capacity }}L<br>
                                ({{ $post->fuel_type }})
                        </td>
                        <td data-range="{{ $post->range }}">{{ $post->range }}km</td>

                        <td data-front-tire-size="{{ $post->front_tire_size }}"
                            data-rear-tire-size="{{ $post->rear_tire_size }}"
                        >
                                前:{{ $post->front_tire_size }}<br>
                                後:{{ $post->rear_tire_size }}
                        </td>
                    </tr>
                @endforeach
        </tbody>
    </table>

    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>