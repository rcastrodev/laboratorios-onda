<?php

use App\Product;
use App\Category;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'category_id'   => Category::first()->id,
            'name'          => 'Electroerosión',
            'description'   => '<p>Proveemos y disponemos de amplia gama de grados de grafitos isotrópicos calidad TOYOTANSO que se utilizan en una gran variedad de aplicaciones en la industria donde la excelencia es reconocida por nuestros clientes. Los grafitos de LAIKEN SA pueden ser entregados como manufacturas mecanizadas de precisión en centros de mecanizado CNC según la especificación del cliente o como materiales semielaborados.</p>',
            'order' => 'A1'
        ]);
    }
}

