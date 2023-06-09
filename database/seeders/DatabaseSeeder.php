<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // Table user
        DB::table('users')->insert([
            [
                'name' => 'NguyenVanPhuoc',
                'email' => 'nguyenvanphuoc.261203@gmail.com',
                'password'=> Hash::make('123456'),
                'role'=>'0'
            
            ],
            [
                'name' => 'LeBachLinh',
                'email' => 'voduykha01012003@gmail.com',
                'password'=> Hash::make('123456'),
                'role'=>'1'

            ]
        ]);
         // Table protypes
        DB::table('protypes')->insert([
            [
                'type_name' => 'Giày Đi Bộ',
            
            ],
            [
                'type_name' => 'Giày Chạy Bộ',

            ],
            [
                'type_name' => 'Giày Đá Banh',

            ],
            [
                'type_name' => 'Giày Bóng Chuyền',

            ],
            [
                'type_name' => 'Giày Cầu Lông',

            ],
        ]);
         // Table manufactures
        DB::table('manufactures')->insert([
            [
                'manu_name' => 'Nike',

            ],
            [
                'manu_name' => 'Adidas',

            ],
            [
                'manu_name' => 'Puma',

            ],
            [
                'manu_name' => 'Jordan ',

            ],
            [
                'manu_name' => 'Reebok',

            ]
        ]);
         // Table products
        DB::table('products')->insert([
            // $table->id();
            // $table->string('name');//tên sản phẩm
            // $table->integer('manu_id');//id hãng(brand)
            // $table->integer('type_id');//id loại
            // $table->integer('id_review');//id reviewer
            // $table->integer('price')->nullable();//giá
            // $table->integer('qty');//số lượng
            // $table->integer('sell_number')->nullable();//số lượng bán
            // $table->string('image');//ảnh
            // $table->text('description')->nullable();//mô tả
            // $table->integer('feature');
            // $table->double('discount')->nullable();//giảm giá
            [
                'name' => ' Yonex Giày Cầu Lông Nam Nữ 57X Cao Cấp, Siêu Nhẹ Thoáng Khí Mẫu Mới Nhất Năm 2022 65Z3 Momota_Màu Trắng ',
                'manu_id' => 1,
                'type_id' => 1,
                'qty' => 20,
                'price' => 699000,
                'sell_number' => 0,
                'image' => 'hinh1.jpg',
                'description' => ' Yonex Giày Cầu Lông Nam Nữ 57X Cao Cấp, Siêu Nhẹ Thoáng Khí Mẫu Mới Nhất Năm 2022 65Z3 Momota_Màu Trắng ',
                'feature' => 0,
                'discount' => 20,

            ],
            [
                'name' => ' Yonex Giày Cầu Lông Nam Nữ 57X Cao Cấp, Siêu Nhẹ Thoáng Khí Mẫu Mới Nhất Năm 2022 65Z3 Momota_Màu Trắng ',
                'manu_id' => 1,
                'type_id' => 1,
                'qty' => 20,
                'price' => 699000,
                'sell_number' => 0,
                'image' => 'hinh2.jpg',
                'description' => ' Yonex Giày Cầu Lông Nam Nữ 57X Cao Cấp, Siêu Nhẹ Thoáng Khí Mẫu Mới Nhất Năm 2022 65Z3 Momota_Màu Trắng ',
                'feature' => 1,
                'discount' => 20,

            ],
            [
                'name' => ' Yonex Giày Cầu Lông Nam Nữ 57X Cao Cấp, Siêu Nhẹ Thoáng Khí Mẫu Mới Nhất Năm 2022 65Z3 Momota_Màu Trắng ',
                'manu_id' => 2,
                'type_id' => 1,
                'qty' => 20,
                'price' => 699000,
                'sell_number' => 0,
                'image' => 'hinh3.jpg',
                'description' => ' Yonex Giày Cầu Lông Nam Nữ 57X Cao Cấp, Siêu Nhẹ Thoáng Khí Mẫu Mới Nhất Năm 2022 65Z3 Momota_Màu Trắng ',
                'feature' => 0,
                'discount' => 20,

            ],
            [
                'name' => ' Yonex Giày Cầu Lông Nam Nữ 57X Cao Cấp, Siêu Nhẹ Thoáng Khí Mẫu Mới Nhất Năm 2022 65Z3 Momota_Màu Trắng ',
                'manu_id' => 3,
                'type_id' => 1,
                'qty' => 20,
                'price' => 699000,
                'sell_number' => 0,
                'image' => 'hinh4.jpg',
                'description' => ' Yonex Giày Cầu Lông Nam Nữ 57X Cao Cấp, Siêu Nhẹ Thoáng Khí Mẫu Mới Nhất Năm 2022 65Z3 Momota_Màu Trắng ',
                'feature' => 1,
                'discount' => 20,

            ],
            [
                'name' => ' Yonex Giày Cầu Lông Nam Nữ 57X Cao Cấp, Siêu Nhẹ Thoáng Khí Mẫu Mới Nhất Năm 2022 65Z3 Momota_Màu Trắng ',
                'manu_id' => 4,
                'type_id' => 1,
                'qty' => 20,
                'price' => 699000,
                'sell_number' => 0,
                'image' => 'hinh5.jpg',
                'description' => ' Yonex Giày Cầu Lông Nam Nữ 57X Cao Cấp, Siêu Nhẹ Thoáng Khí Mẫu Mới Nhất Năm 2022 65Z3 Momota_Màu Trắng ',
                'feature' => 0,
                'discount' => 20,

            ], [
                'name' => ' Yonex Giày Cầu Lông Nam Nữ 57X Cao Cấp, Siêu Nhẹ Thoáng Khí Mẫu Mới Nhất Năm 2022 65Z3 Momota_Màu Trắng ',
                'manu_id' => 1,
                'type_id' => 2,
                'qty' => 20,
                'price' => 699000,
                'sell_number' => 0,
                'image' => 'hinh1.jpg',
                'description' => ' Yonex Giày Cầu Lông Nam Nữ 57X Cao Cấp, Siêu Nhẹ Thoáng Khí Mẫu Mới Nhất Năm 2022 65Z3 Momota_Màu Trắng ',
                'feature' => 0,
                'discount' => 20,

            ],
            [
                'name' => ' Yonex Giày Cầu Lông Nam Nữ 57X Cao Cấp, Siêu Nhẹ Thoáng Khí Mẫu Mới Nhất Năm 2022 65Z3 Momota_Màu Trắng ',
                'manu_id' => 1,
                'type_id' => 2,
                'qty' => 20,
                'price' => 699000,
                'sell_number' => 0,
                'image' => 'hinh2.jpg',
                'description' => ' Yonex Giày Cầu Lông Nam Nữ 57X Cao Cấp, Siêu Nhẹ Thoáng Khí Mẫu Mới Nhất Năm 2022 65Z3 Momota_Màu Trắng ',
                'feature' => 1,
                'discount' => 20,

            ],
            [
                'name' => ' Yonex Giày Cầu Lông Nam Nữ 57X Cao Cấp, Siêu Nhẹ Thoáng Khí Mẫu Mới Nhất Năm 2022 65Z3 Momota_Màu Trắng ',
                'manu_id' => 2,
                'type_id' => 3,
                'qty' => 20,
                'price' => 699000,
                'sell_number' => 0,
                'image' => 'hinh3.jpg',
                'description' => ' Yonex Giày Cầu Lông Nam Nữ 57X Cao Cấp, Siêu Nhẹ Thoáng Khí Mẫu Mới Nhất Năm 2022 65Z3 Momota_Màu Trắng ',
                'feature' => 0,
                'discount' => 20,

            ],
            [
                'name' => ' Yonex Giày Cầu Lông Nam Nữ 57X Cao Cấp, Siêu Nhẹ Thoáng Khí Mẫu Mới Nhất Năm 2022 65Z3 Momota_Màu Trắng ',
                'manu_id' => 3,
                'type_id' => 4,
                'qty' => 20,
                'price' => 699000,
                'sell_number' => 0,
                'image' => 'hinh4.jpg',
                'description' => ' Yonex Giày Cầu Lông Nam Nữ 57X Cao Cấp, Siêu Nhẹ Thoáng Khí Mẫu Mới Nhất Năm 2022 65Z3 Momota_Màu Trắng ',
                'feature' => 1,
                'discount' => 20,

            ],
            [
                'name' => ' Yonex Giày Cầu Lông Nam Nữ 57X Cao Cấp, Siêu Nhẹ Thoáng Khí Mẫu Mới Nhất Năm 2022 65Z3 Momota_Màu Trắng ',
                'manu_id' => 4,
                'type_id' => 5,
                'qty' => 20,
                'price' => 699000,
                'sell_number' => 0,
                'image' => 'hinh5.jpg',
                'description' => ' Yonex Giày Cầu Lông Nam Nữ 57X Cao Cấp, Siêu Nhẹ Thoáng Khí Mẫu Mới Nhất Năm 2022 65Z3 Momota_Màu Trắng ',
                'feature' => 1,
                'discount' => 20,

            ],
        ]);
        //Table product_detail
        DB::table('product_detail')->insert([
            [
                'product_id' => 1,
                'color' => 'blue',
                'size' => '40',
            ],
            [
                'product_id' => 1,
                'color' => 'red',
                'size' => '41',
            ],
            [
                'product_id' => 1,
                'color' => 'green',
                'size' => '39',
            ],
            [
                'product_id' => 2,
                'color' => 'blue',
                'size' => '37',
            ],
            [
                'product_id' => 2,
                'color' => 'yellow',
                'size' => '40',
            ],
            [
                'product_id' => 3,
                'color' => 'violet',
                'size' => '38',
            ],
        ]);
        //Table review||customer comments
        DB::table('review')->insert([
            [
                'product_id' => 1,
                'email' => 'vi@gmail.com',
                'name_reviewer' => 'Thế Vĩ',
                'content' => 'Nice !',
                'rating' => 4,
            ],
            [
                'product_id' => 1,
                'email' => 'phuoc@gmail.com',
                'name_reviewer' => 'Văn Phước',
                'content' => 'The product is beautiful',
                'rating' => 4,
            ],
            [
                'product_id' => 2,
                'email' => 'thuong@gmail.com',
                'name_reviewer' => 'Minh Thưởng',
                'content' => 'Excelent !',
                'rating' => 4,
            ],
        ]);
        
    }
}
