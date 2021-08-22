<?php

namespace Database\Seeders;

use App\Models\Option;
use Illuminate\Database\Seeder;

class OptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $option = Option::create([
            'author_id' => 1,
            'logo' => 'https://www.av.se/Static/images/placeholder.png',
            'favicon' => 'https://lh3.googleusercontent.com/proxy/w1VIjdBya1SjyZOqwIrEelKiINIT-UB5zTw0VomhxENk16Ox8gpdpeH0a5Vlu4UfK0iRb4Ts2idlb85QCQ5KIhHapa2W3eVMYrk1RY5K2GiOlQ',
            'phone' => '0813434343434',
            'email' => 'developer@kaltim.com',
            'address' => 'Alamat',
            'twitter' => 'https://twitter.com',
            'facebook' => 'https://facebook.com',
            'instagram' => 'https://instagram.com',
            'youtube' => 'https://youtube.com'
        ]);
    }
}
