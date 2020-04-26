<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeopleTableSeeder extends Seeder
{
    public function run()
    {
        $param = [
            'name' => 'taro',
            'mail' => 'taro@yamada.jp',
            'age' => 12,
        ];
        DB::table('people')->insert($param);

        $param = [
            'name' => 'kentyan',
            'mail' => 'imai@yuushi.jp',
            'age' => 7,
        ];
        DB::table('people')->insert($param);

        $param = [
            'name' => 'yumi',
            'mail' => 'yumi@fukui.jp',
            'age' => 28,
        ];
        DB::table('people')->insert($param);
    }
}
