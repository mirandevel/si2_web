<?php

namespace Database\Seeders;

use App\Models\Empresa;
use App\Models\Garantia;
use App\Models\Marca;
use App\Models\Producto;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $empresasId = Empresa::all()->pluck('id')->toArray();
        $empresasCount = count($empresasId) - 1;
        $marcasId = Marca::all()->pluck('id')->toArray();
        $marcasCount = count($marcasId) - 1;
        $garantiasId = Garantia::all()->pluck('id')->toArray();
        $garantiasCount = count($garantiasId) - 1;

        Producto::create([
            'nombre' => 'silla 1',
            'descripcion' => 'Este modelo 3D se creó originalmente con Sketchup 13 y luego se convirtió a todos los demás formatos 3D. El formato nativo es .skp La escena 3dsmax es la versión 3ds Max 2016, renderizada con Vray 3.00 Eames DSW Vitra',
            'precio' => 250,
            'url_imagen' => 'gs://si-2-5abca.appspot.com/products-images/image-silla1.jpg',
            'url_3d' => 'gs://si-2-5abca.appspot.com/3d-models-obj/3d-model-silla1.obj',
            'calificacion' => 3,
            'cantidad' => 20,
            'empresa_id' => $empresasId[mt_rand(0, $empresasCount)],
            'marca_id' => $marcasId[mt_rand(0, $marcasCount)],
            'garantia_id' => $garantiasId[mt_rand(0, $garantiasCount)],
        ]);
        Producto::create([
            'nombre' => 'silla 2',
            'descripcion' => 'La geometría se agrupa. Pivote del grupo colocado en la parte inferior del cuadro delimitador. Sin luces, cámaras y geometría innecesaria u oculta en la escena. La pila no está contraída.',
            'precio' => 200,
            'url_imagen' => 'gs://si-2-5abca.appspot.com/products-images/image-silla2.jpg',
            'url_3d' => 'gs://si-2-5abca.appspot.com/3d-models-obj/3d-model-silla2.obj',
            'calificacion' => 2,
            'cantidad' => 10,
            'empresa_id' => $empresasId[mt_rand(0, $empresasCount)],
            'marca_id' => $marcasId[mt_rand(0, $marcasCount)],
            'garantia_id' => $garantiasId[mt_rand(0, $garantiasCount)],
        ]);
        Producto::create([
            'nombre' => 'silla 3',
            'descripcion' => 'Este modelo 3D es parte de la aclamada colección Design Connected que incluye más de 6500 muebles exclusivos cuidadosamente seleccionados. Echa un vistazo a nuestra gama completa de modelos 3D para ver más iconos de mediados de siglo, clásicos contemporáneos y obras maestras de diseñadores.',
            'precio' => 150,
            'url_imagen' => 'gs://si-2-5abca.appspot.com/products-images/image-silla3.jpg',
            'url_3d' => 'gs://si-2-5abca.appspot.com/3d-models-obj/3d-model-silla3.obj',
            'calificacion' => 3,
            'cantidad' => 25,
            'empresa_id' => $empresasId[mt_rand(0, $empresasCount)],
            'marca_id' => $marcasId[mt_rand(0, $marcasCount)],
            'garantia_id' => $garantiasId[mt_rand(0, $garantiasCount)],
        ]);
        Producto::create([
            'nombre' => 'mesa 1',
            'descripcion' => 'Las unidades de los archivos son centímetros y todos los modelos se escalan con precisión para representar las dimensiones del objeto de la vida real.',
            'precio' => 499,
            'url_imagen' => 'gs://si-2-5abca.appspot.com/products-images/image-mesa1.jpg',
            'url_3d' => 'gs://si-2-5abca.appspot.com/3d-models-obj/3d-model-mesa1.obj',
            'calificacion' => 2,
            'cantidad' => 28,
            'empresa_id' => $empresasId[mt_rand(0, $empresasCount)],
            'marca_id' => $marcasId[mt_rand(0, $marcasCount)],
            'garantia_id' => $garantiasId[mt_rand(0, $garantiasCount)],
        ]);
        Producto::create([
            'nombre' => 'mesa 2',
            'descripcion' => 'Todos los modelos de Design Connected 3d se crearon originalmente en el renderizador 3ds Max y V-Ray.',
            'precio' => 399,
            'url_imagen' => 'gs://si-2-5abca.appspot.com/products-images/image-mesa2.jpg',
            'url_3d' => 'gs://si-2-5abca.appspot.com/3d-models-obj/3d-model-mesa2.obj',
            'calificacion' => 3,
            'cantidad' => 35,
            'empresa_id' => $empresasId[mt_rand(0, $empresasCount)],
            'marca_id' => $marcasId[mt_rand(0, $marcasCount)],
            'garantia_id' => $garantiasId[mt_rand(0, $garantiasCount)],
        ]);
        Producto::create([
            'nombre' => 'sofa 1',
            'descripcion' => 'Muestra de modelo moderno de sofá de tres plazas con texturas incluidas.',
            'precio' => 599,
            'url_imagen' => 'gs://si-2-5abca.appspot.com/products-images/image-sofa1.jpg',
            'url_3d' => 'gs://si-2-5abca.appspot.com/3d-models-obj/3d-model-sofa1.obj',
            'calificacion' => 4,
            'cantidad' => 28,
            'empresa_id' => $empresasId[mt_rand(0, $empresasCount)],
            'marca_id' => $marcasId[mt_rand(0, $marcasCount)],
            'garantia_id' => $garantiasId[mt_rand(0, $garantiasCount)],
        ]);
        Producto::create([
            'nombre' => 'cama 1',
            'descripcion' => 'Una cama genérica (dos lugares) hecha en una mezcla entre Marvelous Designer y Rhinoceros. Encontrarás en el archivo algunos detalles bonitos como la manta del colchón, etc.',
            'precio' => 899,
            'url_imagen' => 'gs://si-2-5abca.appspot.com/products-images/image-cama1.jpg',
            'url_3d' => 'gs://si-2-5abca.appspot.com/3d-models-obj/3d-model-cama1.obj',
            'calificacion' => 4,
            'cantidad' => 35,
            'empresa_id' => $empresasId[mt_rand(0, $empresasCount)],
            'marca_id' => $marcasId[mt_rand(0, $marcasCount)],
            'garantia_id' => $garantiasId[mt_rand(0, $garantiasCount)],
        ]);
        Producto::create([
            'nombre' => 'mesa 3',
            'descripcion' => 'Mesa de comedor Leilani Tulip modelo 3d.',
            'precio' => 299,
            'url_imagen' => 'gs://si-2-5abca.appspot.com/products-images/image-mesa3.jpg',
            'url_3d' => 'gs://si-2-5abca.appspot.com/3d-models-obj/3d-model-cama1.obj',
            'calificacion' => 3,
            'cantidad' => 29,
            'empresa_id' => $empresasId[mt_rand(0, $empresasCount)],
            'marca_id' => $marcasId[mt_rand(0, $marcasCount)],
            'garantia_id' => $garantiasId[mt_rand(0, $garantiasCount)],
        ]);
        Producto::create([
            'nombre' => 'sofa 2',
            'descripcion' => 'El sofá de 2 plazas Calmo ofrece una amplia sensación de comodidad, donde las líneas rectas convergen con discretos detalles curvos. Los cómodos cojines completan el cuadro en esta expresión sobria de elegancia.',
            'precio' => 599,
            'url_imagen' => 'gs://si-2-5abca.appspot.com/products-images/image-sofa2.jpg',
            'url_3d' => 'gs://si-2-5abca.appspot.com/3d-models-obj/3d-model-sofa2.obj',
            'calificacion' => 4,
            'cantidad' => 59,
            'empresa_id' => $empresasId[mt_rand(0, $empresasCount)],
            'marca_id' => $marcasId[mt_rand(0, $marcasCount)],
            'garantia_id' => $garantiasId[mt_rand(0, $garantiasCount)],
        ]);
        Producto::create([
            'nombre' => 'cama 2',
            'descripcion' => 'Flex Form Design Materiales / texturas de la cama incluidos configuración de iluminación incluida',
            'precio' => 799,
            'url_imagen' => 'gs://si-2-5abca.appspot.com/products-images/image-cama2.png',
            'url_3d' => 'gs://si-2-5abca.appspot.com/3d-models-obj/3d-model-cama2.obj',
            'calificacion' => 3,
            'cantidad' => 28,
            'empresa_id' => $empresasId[mt_rand(0, $empresasCount)],
            'marca_id' => $marcasId[mt_rand(0, $marcasCount)],
            'garantia_id' => $garantiasId[mt_rand(0, $garantiasCount)],
        ]);
        Producto::create([
            'nombre' => 'silla 4',
            'descripcion' => 'Silla de madera',
            'precio' => 199,
            'url_imagen' => 'gs://si-2-5abca.appspot.com/products-images/image-silla4.jpg',
            'url_3d' => 'gs://si-2-5abca.appspot.com/3d-models-obj/3d-model-silla4.obj',
            'calificacion' => 3,
            'cantidad' => 42,
            'empresa_id' => $empresasId[mt_rand(0, $empresasCount)],
            'marca_id' => $marcasId[mt_rand(0, $marcasCount)],
            'garantia_id' => $garantiasId[mt_rand(0, $garantiasCount)],
        ]);
        Producto::create([
            'nombre' => 'mesa 4',
            'descripcion' => 'Mesa Fendi',
            'precio' => 99,
            'url_imagen' => 'gs://si-2-5abca.appspot.com/products-images/image-mesa4.jpg',
            'url_3d' => 'gs://si-2-5abca.appspot.com/3d-models-obj/3d-model-mesa4.obj',
            'calificacion' => 3,
            'cantidad' => 15,
            'empresa_id' => $empresasId[mt_rand(0, $empresasCount)],
            'marca_id' => $marcasId[mt_rand(0, $marcasCount)],
            'garantia_id' => $garantiasId[mt_rand(0, $garantiasCount)],
        ]);
        Producto::create([
            'nombre' => 'silla 5',
            'descripcion' => 'Una silla simple, mi primer modelo 3d gratuito. 60 cm de ancho x 58 cm de profundidad x 87 cm de alto.',
            'precio' => 99,
            'url_imagen' => 'gs://si-2-5abca.appspot.com/products-images/image-silla5.jpg',
            'url_3d' => 'gs://si-2-5abca.appspot.com/3d-models-obj/3d-model-silla5.obj',
            'calificacion' => 3,
            'cantidad' => 26,
            'empresa_id' => $empresasId[mt_rand(0, $empresasCount)],
            'marca_id' => $marcasId[mt_rand(0, $marcasCount)],
            'garantia_id' => $garantiasId[mt_rand(0, $garantiasCount)],
        ]);
        Producto::create([
            'nombre' => 'mesa 5',
            'descripcion' => 'Mesa de comedor Joco de Walter Knoll | Modelo 3d producido por Design Connected | www.designconnected.com',
            'precio' => 199,
            'url_imagen' => 'gs://si-2-5abca.appspot.com/products-images/image-mesa5.jpg',
            'url_3d' => 'gs://si-2-5abca.appspot.com/3d-models-obj/3d-model-mesa5.obj',
            'calificacion' => 3,
            'cantidad' => 12,
            'empresa_id' => $empresasId[mt_rand(0, $empresasCount)],
            'marca_id' => $marcasId[mt_rand(0, $marcasCount)],
            'garantia_id' => $garantiasId[mt_rand(0, $garantiasCount)],
        ]);
        Producto::create([
            'nombre' => 'mesa 6',
            'descripcion' => 'Solo un modelo simple de mesa de café. El tablero de la mesa es de mármol Calacatta.',
            'precio' => 399,
            'url_imagen' => 'gs://si-2-5abca.appspot.com/products-images/image-mesa6.jpg',
            'url_3d' => 'gs://si-2-5abca.appspot.com/3d-models-obj/3d-model-mesa6.obj',
            'calificacion' => 4,
            'cantidad' => 15,
            'empresa_id' => $empresasId[mt_rand(0, $empresasCount)],
            'marca_id' => $marcasId[mt_rand(0, $marcasCount)],
            'garantia_id' => $garantiasId[mt_rand(0, $garantiasCount)],
        ]);
        Producto::create([
            'nombre' => 'cama 3',
            'descripcion' => 'Los materiales son rojo licuadora para madera.',
            'precio' => 599,
            'url_imagen' => 'gs://si-2-5abca.appspot.com/products-images/image-cama3.jpg',
            'url_3d' => 'gs://si-2-5abca.appspot.com/3d-models-obj/3d-model-cama3.obj',
            'calificacion' => 4,
            'cantidad' => 20,
            'empresa_id' => $empresasId[mt_rand(0, $empresasCount)],
            'marca_id' => $marcasId[mt_rand(0, $marcasCount)],
            'garantia_id' => $garantiasId[mt_rand(0, $garantiasCount)],
        ]);
        Producto::create([
            'nombre' => 'cama 4',
            'descripcion' => 'Modelo de cama 3D con un diseño moderno. -Perfecto para fusionar en sus proyectos de interiores y lograr dormitorios realistas',
            'precio' => 499,
            'url_imagen' => 'gs://si-2-5abca.appspot.com/products-images/image-cama4.jpg',
            'url_3d' => 'gs://si-2-5abca.appspot.com/3d-models-obj/3d-model-cama4.obj',
            'calificacion' => 4,
            'cantidad' => 42,
            'empresa_id' => $empresasId[mt_rand(0, $empresasCount)],
            'marca_id' => $marcasId[mt_rand(0, $marcasCount)],
            'garantia_id' => $garantiasId[mt_rand(0, $garantiasCount)],
        ]);
        Producto::create([
            'nombre' => 'silla 6',
            'descripcion' => 'Representado en V-Ray 2.40.04',
            'precio' => 159,
            'url_imagen' => 'gs://si-2-5abca.appspot.com/products-images/image-silla6.jpg',
            'url_3d' => 'gs://si-2-5abca.appspot.com/3d-models-obj/3d-model-silla6.obj',
            'calificacion' => 4,
            'cantidad' => 19,
            'empresa_id' => $empresasId[mt_rand(0, $empresasCount)],
            'marca_id' => $marcasId[mt_rand(0, $marcasCount)],
            'garantia_id' => $garantiasId[mt_rand(0, $garantiasCount)],
        ]);
        Producto::create([
            'nombre' => 'sofa 3',
            'descripcion' => 'Acogedor y cómodo sofá ideal para loft',
            'precio' => 299,
            'url_imagen' => 'gs://si-2-5abca.appspot.com/products-images/image-sofa3.jpg',
            'url_3d' => 'gs://si-2-5abca.appspot.com/3d-models-obj/3d-model-sofa3.obj',
            'calificacion' => 4,
            'cantidad' => 35,
            'empresa_id' => $empresasId[mt_rand(0, $empresasCount)],
            'marca_id' => $marcasId[mt_rand(0, $marcasCount)],
            'garantia_id' => $garantiasId[mt_rand(0, $garantiasCount)],
        ]);
        Producto::create([
            'nombre' => 'mesa 7',
            'descripcion' => 'Mesa de madera simple y liviana, 100x160x70 cm, perfecta para muebles de oficina contemporáneos.',
            'precio' => 199,
            'url_imagen' => 'gs://si-2-5abca.appspot.com/products-images/image-mesa7.jpg',
            'url_3d' => 'gs://si-2-5abca.appspot.com/3d-models-obj/3d-model-mesa7.obj',
            'calificacion' => 3,
            'cantidad' => 25,
            'empresa_id' => $empresasId[mt_rand(0, $empresasCount)],
            'marca_id' => $marcasId[mt_rand(0, $marcasCount)],
            'garantia_id' => $garantiasId[mt_rand(0, $garantiasCount)],
        ]);
        Producto::create([
            'nombre' => 'cama 5',
            'descripcion' => 'Modelos HQ Suficientemente detallados para renderizados en primer plano.',
            'precio' => 599,
            'url_imagen' => 'gs://si-2-5abca.appspot.com/products-images/image-cama5.jpg',
            'url_3d' => 'gs://si-2-5abca.appspot.com/3d-models-obj/3d-model-cama5.obj',
            'calificacion' => 4,
            'cantidad' => 29,
            'empresa_id' => $empresasId[mt_rand(0, $empresasCount)],
            'marca_id' => $marcasId[mt_rand(0, $marcasCount)],
            'garantia_id' => $garantiasId[mt_rand(0, $garantiasCount)],
        ]);
        Producto::create([
            'nombre' => 'sofa 4',
            'descripcion' => 'Sofá Pleasant Curve',
            'precio' => 299,
            'url_imagen' => 'gs://si-2-5abca.appspot.com/products-images/image-sofa4.jpg',
            'url_3d' => 'gs://si-2-5abca.appspot.com/3d-models-obj/3d-model-sofa4.obj',
            'calificacion' => 3,
            'cantidad' => 26,
            'empresa_id' => $empresasId[mt_rand(0, $empresasCount)],
            'marca_id' => $marcasId[mt_rand(0, $marcasCount)],
            'garantia_id' => $garantiasId[mt_rand(0, $garantiasCount)],
        ]);
        Producto::create([
            'nombre' => 'sofa 5',
            'descripcion' => 'Este sofá se utiliza para el diseño de modelos de productos o conjuntos de interiores.',
            'precio' => 399,
            'url_imagen' => 'gs://si-2-5abca.appspot.com/products-images/image-sofa5.jpg',
            'url_3d' => 'gs://si-2-5abca.appspot.com/3d-models-obj/3d-model-sofa5.obj',
            'calificacion' => 4,
            'cantidad' => 26,
            'empresa_id' => $empresasId[mt_rand(0, $empresasCount)],
            'marca_id' => $marcasId[mt_rand(0, $marcasCount)],
            'garantia_id' => $garantiasId[mt_rand(0, $garantiasCount)],
        ]);
        Producto::create([
            'nombre' => 'sofa 6',
            'descripcion' => 'Modelo de sofá Friheten, se incluyen materiales sencillos.',
            'precio' => 399,
            'url_imagen' => 'gs://si-2-5abca.appspot.com/products-images/image-sofa6.jpg',
            'url_3d' => 'gs://si-2-5abca.appspot.com/3d-models-obj/3d-model-sofa6.obj',
            'calificacion' => 3,
            'cantidad' => 45,
            'empresa_id' => $empresasId[mt_rand(0, $empresasCount)],
            'marca_id' => $marcasId[mt_rand(0, $marcasCount)],
            'garantia_id' => $garantiasId[mt_rand(0, $garantiasCount)],
        ]);
        Producto::create([
            'nombre' => 'armario 1',
            'descripcion' => 'Armarios de armario modernos en negro mate',
            'precio' => 399,
            'url_imagen' => 'gs://si-2-5abca.appspot.com/products-images/image-armario1.jpg',
            'url_3d' => 'gs://si-2-5abca.appspot.com/3d-models-obj/3d-model-armario1.obj',
            'calificacion' => 3,
            'cantidad' => 24,
            'empresa_id' => $empresasId[mt_rand(0, $empresasCount)],
            'marca_id' => $marcasId[mt_rand(0, $marcasCount)],
            'garantia_id' => $garantiasId[mt_rand(0, $garantiasCount)],
        ]);
        Producto::create([
            'nombre' => 'biblioteca 1',
            'descripcion' => 'Un activo de baja poli y listo para jugar. Adecuado para la escena de la escuela / clase en tu juego.',
            'precio' => 495,
            'url_imagen' => 'gs://si-2-5abca.appspot.com/products-images/image-biblioteca1.jpg',
            'url_3d' => 'gs://si-2-5abca.appspot.com/3d-models-obj/3d-model-biblioteca1.obj',
            'calificacion' => 3,
            'cantidad' => 28,
            'empresa_id' => $empresasId[mt_rand(0, $empresasCount)],
            'marca_id' => $marcasId[mt_rand(0, $marcasCount)],
            'garantia_id' => $garantiasId[mt_rand(0, $garantiasCount)],
        ]);
        Producto::create([
            'nombre' => 'armario 2',
            'descripcion' => 'Armario detallado 2 - con ropa y cajas',
            'precio' => 345,
            'url_imagen' => 'gs://si-2-5abca.appspot.com/products-images/image-armario2.jpg',
            'url_3d' => 'gs://si-2-5abca.appspot.com/3d-models-obj/3d-model-armario2.obj',
            'calificacion' => 3,
            'cantidad' =>15,
            'empresa_id' => $empresasId[mt_rand(0, $empresasCount)],
            'marca_id' => $marcasId[mt_rand(0, $marcasCount)],
            'garantia_id' => $garantiasId[mt_rand(0, $garantiasCount)],
        ]);
    }
}
