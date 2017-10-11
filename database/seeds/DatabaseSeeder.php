<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Products; // 商品テーブル

// 全体のレコード生成
class DatabaseSeeder extends Seeder
{
    public function run()
    {
        Model::unguard();

        // $this->call(UserTableSeeder::class);
        $this->call(ProductsTableSeeder::class);

        Model::reguard();
    }
}
// 商品テーブルを生成
class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        // 既存の商品レコードは全削除
        DB::table('products')->delete();

        $products = array(
            array(
                'product_code'=>'1',
                'product_name'=>'718ケイマン',
                'product_price'=>'6550000',
                'product_detail'=>'',
                'product_image'=>'1'
            ),
            array(
                'product_code'=>'1',
                'product_name'=>'718ケイマンS',
                'product_price'=>'8490000',
                'product_detail'=>'',
                'product_image'=>'2'
            ),
            array(
                'product_code'=>'2',
                'product_name'=>'718ボクスター',
                'product_price'=>'6940000',
                'product_detail'=>'220 kW (300 PS) / 6,500 rpm',
                'product_image'=>'3'
            ),
            array(
                'product_code'=>'2',
                'product_name'=>'718ボクスターS',
                'product_price'=>'8800000',
                'product_detail'=>'257 kW (350 PS) / 6,500 rpm',
                'product_image'=>'4'
            ),
            array(
                'product_code'=>'3',
                'product_name'=>'911ターボ',
                'product_price'=>'22670000',
                'product_detail'=>'397 kW (540 PS) / 6,400 rpm',
                'product_image'=>'5'
            ),
            array(
                'product_code'=>'3',
                'product_name'=>'911ターボS',
                'product_price'=>'26300000',
                'product_detail'=>'427 kW (580 PS) / 6,750 rpm',
                'product_image'=>'6'
            ),
            array(
                'product_code'=>'3',
                'product_name'=>'911ターボ カブリオレ',
                'product_price'=>'25330000',
                'product_detail'=>'397 kW (540 PS) / 6,400 rpm',
                'product_image'=>'7'
            ),
            array(
                'product_code'=>'3',
                'product_name'=>'911ターボS カブリオレ',
                'product_price'=>'28960000',
                'product_detail'=>'427 kW (580 PS) / 6,750 rpm',
                'product_image'=>'8'
            ),
            array(
                'product_code'=>'4',
                'product_name'=>'911ターボS エクスクルーシブシリーズ',
                'product_price'=>'33400000',
                'product_detail'=>'446 kW (607 PS) / 6,750 rpm',
                'product_image'=>'9'
            ),
            array(
                'product_code'=>'4',
                'product_name'=>'911GT3',
                'product_price'=>'21150000',
                'product_detail'=>'368 kW (500 PS) / 8,250 rpm',
                'product_image'=>'10'
            ),
            array(
                'product_code'=>'5',
                'product_name'=>'911GT2 RS',
                'product_price'=>'36560000',
                'product_detail'=>'515 kW (700 PS) / 7,000 rpm',
                'product_image'=>'11'
            ),

        );

        DB::table('products')->insert($products);

    }

}
