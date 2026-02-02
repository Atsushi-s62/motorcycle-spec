<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    <title>バイク性能比較表</title>
</head>
<body>
    <header>
        <h1>バイク性能比較一覧  | 編集画面</h1>
    </header>

    <div id="new-registaration"><a href="{{ route('posts.create') }}">新規登録</a></div>

    <div class="scroll-container">
        <table>
            <thead>
                <tr>
                    <th class="primary">ID</th>
                    <th class="maker">メーカー</th>
                    <th class="car-model">車種</th>  <!-- メーカー-車種-価格  -->
                    <th class="model">型式</th>
                    <th class="price">価格</th>
                    <th class="release-date">発売日</th>
                    <th class="full-length">全長(mm)</th>
                    <th class="overall-width">全幅(mm)</th>
                    <th class="overall-height">全高(mm)</th>
                    <th class="seat-height">シート高 (mm)</th>
                    <th class="weight">車両重量 (kg)</th>
                    <th class="fuel-economy">燃料消費率(WMTCモード)(km/L)</th>
                    <th class="engine-type">原動機種類</th>
                    <th class="number-of-cylinders">気筒数</th>
                    <th class="cylinder-arrangement">シリンダ配列</th>
                    <th class="cooling-method">冷却方式</th>
                    <th class="engine-displacement">排気量 (cc)</th>
                    <th class="cam-valve-drive-system">カム・バルブ駆動方式</th>
                    <th class="number-of-valves">気筒あたりバルブ数</th>
                    <th class="max-power-km">最高出力（kW）</th>
                    <th class="max-power-ps">最高出力（PS）</th>
                    <th class="max-output-speed">最高出力回転数（rpm）</th>
                    <th class="max-torque-nm">最大トルク（N・m）</th>
                    <th class="max-torque-kgfm">最大トルク（kgf･m）</th>
                    <th class="max-torque-rotation-speed">最大トルク回転数（rpm）</th>
                    <th class="fuel-tank-capacity">燃料タンク容量 (L)</th>
                    <th class="fuel-type">燃料（種類）</th>
                    <th class="range">満タン時航続距離</th>
                    <th class="front-tire-size">タイヤ（前）</th>
                    <th class="rear-tire-size">タイヤ（後）</th>
                    <th class="remarks">備考</th>
                    <th class="comment">コメント</th>
                    <th class="edit">編集</th>
                    <th class="delete">削除</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->maker }}</td>
                        <td>{{ $post->car_model }}</td>
                        <td>{{ $post->model }}</td>
                        <td>{{ $post->price }}</td>
                        <td>{{ $post->release_date }}</td>
                        <td>{{ $post->full_length }}</td>
                        <td>{{ $post->overall_width }}</td>
                        <td>{{ $post->overall_height }}</td>
                        <td>{{ $post->seat_height }}</td>
                        <td>{{ $post->weight }}</td>
                        <td>{{ $post->fuel_economy }}</td>
                        <td>{{ $post->engine_type }}</td>
                        <td>{{ $post->number_of_cylinders }}</td>
                        <td>{{ $post->cylinder_arrangement }}</td>
                        <td>{{ $post->cooling_method }}</td>
                        <td>{{ $post->engine_displacement }}</td>
                        <td>{{ $post->cam_valve_drive_system }}</td>
                        <td>{{ $post->number_of_valves }}</td>
                        <td>{{ $post->max_power_km }}</td>
                        <td>{{ $post->max_power_ps }}</td>
                        <td>{{ $post->max_output_speed}}</td>
                        <td>{{ $post->max_torque_nm }}</td>
                        <td>{{ $post->max_torque_kgfm }}</td>
                        <td>{{ $post->max_torque_rotation_speed }}</td>
                        <td>{{ $post->fuel_tank_capacity }}</td>
                        <td>{{ $post->fuel_type }}</td>
                        <td>{{ $post->range }}</td>
                        <td>{{ $post->front_tire_size }}</td>
                        <td>{{ $post->rear_tire_size }}</td>
                        <td>{{ $post->remarks }}</td>
                        <td><a href="{{ route('posts.edit.comment', $post) }}">{{ $post->comments_count }}件</a></td>
                        <td><a href="{{ route('posts.edit.id', $post) }}"><button>編集</button></a></td>
                        <form method="post" action="{{ route('posts.destroy', $post) }}">
                            @method('DELETE')
                            @csrf
                        <td><button>削除</button></td>
                        </form>

                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>

    <form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit">ログアウト</button>
</form>

</body>
</html>