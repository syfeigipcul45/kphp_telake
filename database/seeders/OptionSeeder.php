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
            'youtube' => 'https://youtube.com',
            'profile_url' => 'https://www.youtube.com/watch?v=UN3f628tJ4U',
            'profile_title' => 'Profil KPHP Kaltim',
            'profile_description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.'
        ]);
    }
}
