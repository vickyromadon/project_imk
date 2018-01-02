<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$arr = ['Musical Instruments',
    			'Electronics & Appliances',
    			'Vehicles',
    			'Bikes & Scooters',
    			'Furnitures',
    			'Audio Visual Equipment',
    			'Office Furniture',
    			'Costumes, Dresses, and Accesories',
    			'Baby Accessories and Toys',
    			'Event and Weeding Supplies',
    			'Adventure Gear',
    			'Medical Supplies'
    		   ];

    	for($i=0; $i<12; $i++){
	        DB::table('tags')->insert([
	            'tag_name' => $arr[$i],
	        ]);
    	}

        DB::table('users')->insert([
                'name' => 'vicky',
                'email' => 'vicky@gmail.com',
                'password' => bcrypt('vicky123'),
                'first_name' => 'Vicky',
                'last_name' => 'Romadon',
                'Address' => 'Pasar Merah',
                'city' => 'Medan',
                'province' => 'Sumatera Utara',
                'number_phone' => '085261538606',
                'role' => 1
        ]);

        DB::table('stores')->insert([
                'store_name' => 'Toko Vicky',
                'slogan' => 'Pokok`ke Cincai Lah',
                'deskripsi' => 'Ditoko ini barang barangnya murah, Gampang disewakan dan Cincailah',
                'user_id' => 1
        ]);

        // for($i=0; $i<12; $i++){
        //     DB::table('produks')->insert([
        //         'tag_id'      => $i,
        //         'produk_name' => str_random(10),
        //         'price'       => 10000,
        //         'quantity'    => 10,
        //         'picture'     => 'default.png',
        //         'deskripsi'   => 'Lorem ipsum dolor sit amet.',
        //         'store_id'    => 1
        //     ]);
        // }


    }
}
