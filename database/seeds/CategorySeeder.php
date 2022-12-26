<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name'      => 'Grafito isostátic0/ electroerosión',
            'outstanding'   => 1,
            'image'     => 'images/category/image28.png',
            'order'     => 'AA'
        ]);

        Category::create([
            'name'      => 'Grafitos para Aplicaciones Mecánicas',
            'outstanding'   => 1,
            'image'     => 'images/category/image29.png',
            'order'     => 'BB'
        ]);

        Category::create([
            'name'      => 'Grafitos para Aplicaciones Eléctricas',
            'outstanding'   => 1,
            'image'     => 'images/category/image30.png',
            'order'     => 'CC'
        ]);

        Category::create([
            'name'      => 'Grafito Flexible 
            para sellos y empaquetaduras',
            'outstanding'   => 1,
            'image'     => 'images/category/image31.png',
            'order'     => 'DD'
        ]);

        Category::create([
            'name'      => 'Grafitos para Acerias / Fundiciones Gris y Nodular',
            'outstanding'   => 1,
            'image'     => 'images/category/image32.png',
            'order'     => 'EE'
        ]);

        Category::create([
            'name'      => 'Grafitos para Fundición / Extrusión de Metales No Ferrosos',
            'outstanding'   => 1,
            'image'     => 'images/category/image33.png',
            'order'     => 'FF'
        ]);

        Category::create([
            'name'      => 'Grafitos para Aplicaciones en Lubricación',
            'outstanding'   => 1,
            'image'     => 'images/category/image34.png',
            'order'     => 'JJ'
        ]);

        Category::create([
            'name'      => 'Otras Aplicaciones del Grafito',
            'outstanding'   => 1,
            'image'     => 'images/category/image35.png',
            'order'     => 'HH'
        ]);
    }
}
