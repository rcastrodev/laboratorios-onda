<?php

use App\Content;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** Home  */
        /** Slider */
        Content::create([
            'section_id' => 1,
            'order'     => 'AA',
            'image'     => 'images/home/Rectangle3248.png',
            'content_1' => 'Laboratorios Onda',
            'content_2' => 'Productos de carbón y grafito'
        ]);

        Content::create([
            'section_id'    => 2,
            'image'         => 'images/home/image81.png',
            'content_1'     => 'Representante exclusivo',
        ]);
        
        Content::create([
            'section_id'    => 3,
            'image'         => 'images/home/Rectangle3288.png',
            'content_1'     => 'Nosotros',
            'content_2'     => '<p>Somos una compañía Argentina líder en la producción y comercialización de materiales y equipos de control de corrosión, manufacturas y equipos de grafito, recubrimientos especiales y sistemas de alivio de presión.</p>'
        ]);

        /** Fin home page */

        /** Empresa  */

        Content::create([
            'section_id'    => 4,
            'image'         => 'images/company/Rectangle3288.png',
            'content_1'     => 'Nosotros',
            'content_2'     => '<p>Somos una compañía Argentina líder en la producción y comercialización de materiales y equipos de control de corrosión, manufacturas y equipos de grafito, recubrimientos especiales y sistemas de alivio de presión.</p><p>Laboratorios Onda fue fundada en 1985 en Buenos Aires, Argentina, país miembro del Mercosur. Más de treinta años de experiencia en la investigación y desarrollo de productos de excelente calidad, nos permiten brindar las mejores soluciones para la industria. Contamos con personal altamente calificado y entrenado para brindarles a nuestros clientes el soporte técnico y la ayuda necesaria a lo largo de sus emprendimientos</p>'
        ]);

        Content::create([
            'section_id'    => 5,
            'content_1' => 'SOBRE NOSOTROS',
        ]);
    
        Content::create([
            'section_id'    => 6,
            'order'         => 'AA',
            'image'         => 'images/company/Group3714.png',
            'content_1'     => 'Misión',
            'content_2'     => '<p>Proveer al mercado nacional herrajes de la más alta calidad y mayor valor agregado posible para poder obtener la máxima satisfacción de nuestros clientes.</p>',
        ]);

        Content::create([
            'section_id'    => 6,
            'order'         => 'BB',
            'image'         => 'images/company/Group3716.png',
            'content_1'     => 'Visión',
            'content_2'     => '<p>Consitutirnos en la empresa Líder del mercado de Herrajes Argentinos, estando siempre a la vanguardia de la moda en nuestros constantes desarrollos</p>',
        ]);

        Content::create([
            'section_id'    => 6,
            'order'         => 'CC',
            'image'         => 'images/company/Group3713.png',
            'content_1'     => 'Calidad',
            'content_2'     => '<p>Realizamos trabajos de urgencia de ser necesario fines de semana o nocturnos,para su mejor eficiencia en la producción.</p>',
        ]);
        

        Content::create([
            'section_id'    => 7,
            'order'         => 'AA',
            'image'         => 'images/industry/Rectangle4057.png',
            'content_1'     => 'Metalúrgica',
        ]);

        Content::create([
            'section_id'    => 7,
            'order'         => 'BB',
            'image'         => 'images/industry/Rectangle4058.png',
            'content_1'     => 'Petroquímica & gas',
        ]);

        Content::create([
            'section_id'    => 7,
            'order'         => 'CC',
            'image'         => 'images/industry/Rectangle4059.png',
            'content_1'     => 'minería',
        ]);

        Content::create([
            'section_id'    => 7,
            'order'         => 'DD',
            'image'         => 'images/industry/Rectangle4060.png',
            'content_1'     => 'ferrocarriles',
        ]);
        
        Content::create([
            'section_id'    => 7,
            'order'         => 'EE',
            'image'         => 'images/industry/Rectangle4061.png',
            'content_1'     => 'aluminio',
        ]);

        Content::create([
            'section_id'    => 7,
            'order'         => 'FF',
            'image'         => 'images/industry/Rectangle4062.png',
            'content_1'     => 'papelera',
        ]);

        Content::create([
            'section_id'    => 7,
            'order'         => 'GG',
            'image'         => 'images/industry/Rectangle4063.png',
            'content_1'     => 'vidrio',
        ]);


        Content::create([
            'section_id'    => 7,
            'order'         => 'HH',
            'image'         => 'images/industry/Rectangle4064.png',
            'content_1'     => 'matricería',
        ]);


        Content::create([
            'section_id'    => 8,
            'order'         => 'AA',
            'image'         => 'images/clients/image51.png',
        ]);

        Content::create([
            'section_id'    => 8,
            'order'         => 'BB',
            'image'         => 'images/clients/image52.png',
        ]);

        Content::create([
            'section_id'    => 8,
            'order'         => 'CC',
            'image'         => 'images/clients/image53.png',
        ]);

        Content::create([
            'section_id'    => 8,
            'order'         => 'DD',
            'image'         => 'images/clients/image54.png',
        ]);

        Content::create([
            'section_id'    => 8,
            'order'         => 'EE',
            'image'         => 'images/clients/image77.png',
        ]);

        Content::create([
            'section_id'    => 8,
            'order'         => 'FF',
            'image'         => 'images/clients/image78.png',
        ]);

        Content::create([
            'section_id'    => 8,
            'order'         => 'JJ',
            'image'         => 'images/clients/image79.png',
        ]);

        Content::create([
            'section_id'    => 8,
            'order'         => 'HH',
            'image'         => 'images/clients/image80.png',
        ]);

       
    }
}

    