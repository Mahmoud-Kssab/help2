<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;
class SettingDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          Setting::create([
            'about_us' => 'a',
            'phone' => '011',
            'email' => 'a@a.com',
            'fb_link' => 'a@a.com',
            'tw_link' => 'a@a.com',
            'youtube_link' => 'a@a.com',
            'inst_link' => 'a@a.com',
            'whatsapp_link' => 'a@a.com',
            'google_plus_link' => 'a@a.com'
        ]);
    }
}
