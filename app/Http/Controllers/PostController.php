<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    private $makers = ['HONDA' => 'HONDA', 'YAMAHA' => 'YAMAHA', 'SUZUKI' => 'SUZUKI', 'KAWASAKI' => 'KAWASAKI'];
    private $fuels = ['レギュラー' => 'レギュラー', 'ハイオク' => 'ハイオク'];


    public function index()
    {
        // $posts = POST::all();
        $posts = Post::withCount('comments')->get();

        return view('posts.index')->with(['posts' => $posts]);
    }

    public function create() {

        $makers = $this->makers;
        $fuels = $this->fuels;

        return view('posts.create', compact('makers', 'fuels'));
    }

    public function edit() {

        $posts = Post::withCount('comments')->orderBy('id', 'asc')->get();

        return view('posts.edit')->with(['posts' => $posts]);


    }

    public function editId(Post $post) {

        $makers = $this->makers;
        $fuels = $this->fuels;
        

        return view('posts.editId', compact('post', 'makers', 'fuels'));
    }

    public function commentId(Post $post) {

        return view('posts.commentId')->with(['post' => $post]);
    }

    public function store(PostRequest $request) {
        $post = new Post();
        $post->maker = $request->maker;
        $post->car_model = $request->car_model;
        $post->model = $request->model;
        $post->price = $request->price;
        $post->release_date = $request->release_date;
        $post->full_length = $request->full_length;
        $post->overall_width = $request->overall_width;
        $post->overall_height = $request->overall_height;
        $post->seat_height = $request->seat_height;
        $post->weight = $request->weight;
        $post->fuel_economy = $request->fuel_economy;
        $post->engine_type = $request->engine_type;
        $post->number_of_cylinders = $request->number_of_cylinders;
        $post->cylinder_arrangement = $request->cylinder_arrangement;
        $post->cooling_method = $request->cooling_method;
        $post->engine_displacement = $request->engine_displacement;
        $post->cam_valve_drive_system = $request->cam_valve_drive_system;
        $post->number_of_valves = $request->number_of_valves;
        $post->max_power_km = $request->max_power_km;
        $post->max_power_ps = $request->max_power_ps;
        $post->max_output_speed = $request->max_output_speed;
        $post->max_torque_nm = $request->max_torque_nm;
        $post->max_torque_kgfm = $request->max_torque_kgfm;
        $post->max_torque_rotation_speed = $request->max_torque_rotation_speed;
        $post->fuel_tank_capacity = $request->fuel_tank_capacity;
        $post->fuel_type = $request->fuel_type;
        $post->range = $request->range;
        $post->front_tire_size = $request->front_tire_size;
        $post->rear_tire_size = $request->rear_tire_size;
        $post->remarks = $request->remarks;
        $post->save();

        return redirect()->route('posts.edit');

    }



    public function update(PostRequest $request, Post $post) {

        $post->maker = $request->maker;
        $post->car_model = $request->car_model;
        $post->model = $request->model;
        $post->price = $request->price;
        $post->release_date = $request->release_date;
        $post->full_length = $request->full_length;
        $post->overall_width = $request->overall_width;
        $post->overall_height = $request->overall_height;
        $post->seat_height = $request->seat_height;
        $post->weight = $request->weight;
        $post->fuel_economy = $request->fuel_economy;
        $post->engine_type = $request->engine_type;
        $post->number_of_cylinders = $request->number_of_cylinders;
        $post->cylinder_arrangement = $request->cylinder_arrangement;
        $post->cooling_method = $request->cooling_method;
        $post->engine_displacement = $request->engine_displacement;
        $post->cam_valve_drive_system = $request->cam_valve_drive_system;
        $post->number_of_valves = $request->number_of_valves;
        $post->max_power_km = $request->max_power_km;
        $post->max_power_ps = $request->max_power_ps;
        $post->max_output_speed = $request->max_output_speed;
        $post->max_torque_nm = $request->max_torque_nm;
        $post->max_torque_kgfm = $request->max_torque_kgfm;
        $post->max_torque_rotation_speed = $request->max_torque_rotation_speed;
        $post->fuel_tank_capacity = $request->fuel_tank_capacity;
        $post->fuel_type = $request->fuel_type;
        $post->range = $request->range;
        $post->front_tire_size = $request->front_tire_size;
        $post->rear_tire_size = $request->rear_tire_size;
        $post->remarks = $request->remarks;
        $post->save();

        return redirect()->route('posts.edit');

    }

    public function destroy(Post $post) {
        $post->delete();

        return redirect()->route('posts.edit');
    }

    public function editComment(Post $post) {

        return view('posts.editComment')->with(['post' => $post]);

    }

    public function csvImportForm()
    {
        return view('posts.csvImportForm');
    }

    public function csvImport(Request $request)
    {

        // アップロードされたCSVファイルを取得
        $file = $request->file('csv_file');

        //ファイルが存在するか
        if(!$file || !$file->isValid()) {
            return back()->with('error', 'CSVファイルがアップロードされていません。');
        }

        // 一時パスを取得
        $path = $file->getRealPath();

        //CSVを開く
        if(($handle = fopen($path, 'r')) !== false) {
            $header = null;
            $data = [];



            while(($row = fgetcsv($handle, 1000, ',')) !== false) {

            // UTF-8に変換
            $row = array_map(function($value) {
                return mb_convert_encoding($value, 'UTF-8', 'auto');
            }, $row);

                if(!$header) {
                    // 1行目のヘッダー取得、BOM、空白除去
                    $header = array_map(function($h) {
                        $h = preg_replace('/^\xEF\xBB\xBF/', '', $h);
                        return trim($h);
                    }, $row);
                    // $header = $row; // 1行目をヘッダーとして扱う
                } else {
                    // カラムが数が一致する場合のみ処理
                    if(count($row) === count($header)) {
                        $item = array_map('trim', $row);
                        $data[] = array_combine($header, $item);
                    }
                    
                }
            }

            fclose($handle);

            try {
                //　データベースへ挿入
                foreach($data as $item) {
                    DB::table('posts')->insert($item);
                }
                return back()->with('success', 'CSVのインポートが完了しました!');
            } catch(\Exception $e) {
                Log::error('CSVインポートエラー: ' . $e->getMessage());
                return back()->with('error', 'データベース登録中にエラーが発生しました。');
            }
        }

        return back()->with('error', 'CSVの読み込みに失敗しました!');
    }
}
