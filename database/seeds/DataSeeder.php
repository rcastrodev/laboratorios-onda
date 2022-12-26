<?php

use App\Data;
use App\Company;
use Illuminate\Database\Seeder;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Data::create([
            'company_id'    => Company::first()->id,
            'address'       => 'Hilarión de la Quintana 3649, B1636AOE Olivos, Provincia de Buenos Aires',
            'email'         => 'info@labonda.com',
            'phone1'        => '+5401147991691|011 4799 1691',
            'phone3'        => '+5401147991691',
            'logo_header'   => 'images/data/LogoLabOnda1.png',
            'logo_footer'   => 'images/data/LogoLabOnda2.png'
        ]);
         
    }
}
