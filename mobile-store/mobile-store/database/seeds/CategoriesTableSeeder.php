<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['cate_name'=>'Iphone',
                'cate_slug'=>Str::slug('iphone')],
            ['cate_name'=>'Samsung',
                'cate_slug'=>Str::slug('Samsung')],
        ];
        DB::table('vp_categories')->insert($data);
    }
}
