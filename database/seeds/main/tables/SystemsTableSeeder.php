<?php
use App\Models\Main\System;
use Illuminate\Database\Seeder;
	
class SystemsTableSeeder extends Seeder 
{
	public function run()
	{
		echo 'Tuncating Systems Table' . PHP_EOL;
        System::truncate();
       ;
        echo 'Adding embrasse-moi' . PHP_EOL;
        System::create([
            'name' => 'Craig Iannazzi',
            'company' => 'Embrasse-Moi',
            'email' => 'ci@embrasse-moi.com',
            'password' => bcrypt('iluv2tow'),
            'phone' => '585-383-1170',
            'address' => '1 N Main Street, Pittsford NY, 14534',
        ]);
        echo 'Adding Craiglorious LLC' . PHP_EOL;
        System::create( [
            'name' => 'Craig Iannazzi',
            'company' => 'Craiglorious, LLC',
            'email' => 'craig@craiglorious.com',
            'password' => bcrypt('iluv2tow'),
            'phone' => '585-484-1170',
            'address' => '111 Adams Street, Rochester, NY 14608',
        ]);
        echo 'Adding IE Destinations' . PHP_EOL;
        System::create([
            'name' => 'Patrisha Iannazzi',
            'company' => 'Iannazzi Enterprises',
            'email' => 'travel@iedestinations.com',
            'password' => bcrypt('iluv2tow'),
            'phone' => '585-624-1285',
            'address' => '450 Smith Road, Pittsford, NY 14534',
        ]);




        //echo 'Seeding Systems Table' . PHP_EOL;
        Factory('App\Models\Main\System', 5)->create();
        echo 'Seeded Systems Table' . PHP_EOL;
	}
}