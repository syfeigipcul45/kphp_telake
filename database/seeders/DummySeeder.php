<?php

namespace Database\Seeders;

use App\Models\HeroImage;
use App\Models\SubMenu;
use Illuminate\Database\Seeder;

class DummySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $urls = [
            'https://images.unsplash.com/photo-1448375240586-882707db888b?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1770&q=80',
            'https://images.unsplash.com/photo-1425913397330-cf8af2ff40a1?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1674&q=80'
        ];

        for($i = 0; $i < count($urls); $i++) {
            HeroImage::create([
                'url_hero' => $urls[$i],
                'title' => 'What is Lorem Ipsum?',
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'
            ]);
        }

        $submenuProfile = [
            'Hutan Kaltim',
            'Visi dan Misi',
            'Struktur Organisasi'
        ];

        for($i = 0; $i < count($submenuProfile); $i++) {
            SubMenu::create([
                'name' => $submenuProfile[$i],
                'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s,',
                'parent_menu' => 'profile'
            ]);
        }

        $submenuDept = [
            'Sekretariat',
            'Perencanaan dan Pemanfaatan Kawasan Hutan',
            'Perlindungan dan Konservasi Sumber Daya Alam Ekosistem',
            'Pengelolaan Daerah Aliran Sungai dan Rehabilitasi Hutan Lahan',
            'Penyuluhan dan Pemberdayaan Masyarakat Hutan'
        ];

        for($i = 0; $i < count($submenuDept); $i++) {
            SubMenu::create([
                'name' => $submenuDept[$i],
                'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s,',
                'parent_menu' => 'dept'
            ]);
        }

        $submenuArea = [
            'Potensi',
            'Risalah'
        ];

        for($i = 0; $i < count($submenuArea); $i++) {
            SubMenu::create([
                'name' => $submenuArea[$i],
                'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s,',
                'parent_menu' => 'area'
            ]);
        }

        $submenuEvent = [
            'Tata Usaha',
            'Tata Hutan dan Perencanaan',
            'Perhutanan Sosial',
            'Penanggulangan Kebakaran Hutan dan Lahan',
            'Perlindungan dan Pengamanan Hutan',
            'Rehabilitasi Hutan dan Lahan'
        ];

        for($i = 0; $i < count($submenuEvent); $i++) {
            SubMenu::create([
                'name' => $submenuEvent[$i],
                'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s,',
                'parent_menu' => 'event'
            ]);
        }
    }
}
