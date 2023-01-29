<?php

use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $defaults = [
            ['key' => 'driver' , 'value' => 'mysql'],
            ['key' => "host" , 'value' => "localhost"],
            ['key' => "database" , 'value' => "db_name"],
            ['key' => "username" , 'value' => "root"],
            ['key' => "password" , 'value' => "root"],
            ['key' => "port" , 'value' => '8889'],
            ['key' => 'charset'   , 'value' => 'utf8'],
            ['key' => 'collation' , 'value' => 'utf8_unicode_ci'],
            ['key' => 'export' , 'value' => 'yes']
            // ['key' => 'prefix'    , 'value' => ' '],
            // ['key' => 'strict'    , 'value' => "false"],
        ];

        foreach ($defaults as $default) {
            $temp = factory(App\Models\Setting::class)->make($default);
            $temp->save();
        }

    }
}
