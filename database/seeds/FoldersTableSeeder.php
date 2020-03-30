<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class FoldersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = DB::table('users')->first();
        $titles = ['店舗', '法人', '百貨店', 'セミナー', 'プログラム', 'プレス関係', 'NL', 'SNS', '海外EC', 'POP-UP','その他'];

        foreach ($titles as $title) {
            DB::table('folders')->insert([
                'title' => $title,
                'user_id' => $user->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
