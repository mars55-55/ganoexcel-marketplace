<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Producto;

class ProductoSeeder extends Seeder
{
    public function run()
    {
        $productos = [
            [
                'nombre' => 'Café 3-1',
                'descripcion' => 'Café funcional para mejorar el estado de ánimo y energía.',
                'ingredientes' => 'Café, extractos naturales',
                'beneficios' => 'Contribuye al buen estado de ánimo, ayuda a mantener estables los niveles de energía, protege el hígado',
                'precio_unitario' => 12000,
                'precio_mayorista' => 10000,
                'categoria_id' => 1, // Bebidas Energéticas
                'imagen' => 'Cafe3-1.jpeg',
            ],
            [
                'nombre' => 'Gano rooibos drink',
                'descripcion' => 'Infusión para mejorar el tránsito intestinal.',
                'ingredientes' => 'Hojas de sen, menta, manzanilla',
                'beneficios' => 'Mejora el tránsito lento, combate la inflamación',
                'precio_unitario' => 10000,
                'precio_mayorista' => 8500,
                'categoria_id' => 2, // Infusiones y Tés Naturales
                'imagen' => 'Gasnorooibos.jpeg',
            ],
            [
                'nombre' => 'RESKINE COLLAGEN DRINK',
                'descripcion' => 'Suplemento para aliviar bronquitis, gripe y asma.',
                'ingredientes' => 'la bebida de colágeno marino puro de alta calidad que redefine el bienestar. Enriquecido con Gano PLUS, quinua, extracto de goji, aloe vera, manzana, espinaca, arándanos, fresas y frambuesas.',
                'beneficios' => 'Aporta vitamina E, B1, B2 y minerales como el hierro, calcio, zinc, fósforo, potasio y magnesio.',
                'precio_unitario' => 15000,
                'precio_mayorista' => 12000,
                'categoria_id' => 4, // Respiratorios Naturales
                'imagen' => 'Reskine.jpeg',
            ],
            [
                'nombre' => 'CÁPSULAS DE EXCELLIUM',
                'descripcion' => 'Suplemento para combatir el estrés y la fatiga.',
                'ingredientes' => 'hecho 100% del micelio de Ganoderma contiene polisacáridos y germanio orgánico',
                'beneficios' => 'Reduce el insomnio,Mejora el estado de ánimo y ayuda con la depresión y Previene la pérdida de visión',
                'precio_unitario' => 18000,
                'precio_mayorista' => 15000,
                'categoria_id' => 4, // Suplementos Alimenticios
                'imagen' => 'excellium.jpeg',
            ],
            [
                'nombre' => 'GANO TRANSPARENT SOAP',
                'descripcion' => 'Jabón natural para higiene profunda de la piel.',
                'ingredientes' => 'Áloe vera, glicerina, aceite de árbol de té',
                'beneficios' => 'Elimina bacterias, hidrata la piel, uso diario',
                'precio_unitario' => 7000,
                'precio_mayorista' => 6000,
                'categoria_id' => 5, // Aseo e Higiene Personal
                'imagen' => 'GanoTransparent.jpeg',
            ],
            [
                'nombre' => 'GANO LATTERICO',
                'descripcion' => 'Un vigorizante café negro con crema no láctea y sin azúcar',
                'ingredientes' => ' enriquecido con extracto de Ganoderma Lucidum que te ayudará a iniciar el día con toda la energía que necesitas. Una taza de gano latterico elevará tus días a un nivel superior de bienestar, con su aroma, cremosidad y sabor delicioso.',
                'beneficios' => 'Ayuda a mantener estables los niveles de energía',
                'precio_unitario' => 8000,
                'precio_mayorista' => 6500,
                'categoria_id' => 1, 
                'imagen' => 'latterico.jpeg',
            ],
            [
                'nombre' => 'EXFOLIANTE',
                'descripcion' => 'Exfoliante enriquecido con extracto de Ganoderma Lucidum ideal para limpiar, tratar, hidratar y embellecer tu piel desde la primera hora del día.
Sentirás         la diferencia.',
                'ingredientes' => 'Bicarbonato, aceites esenciales, almidón de maíz',
                'beneficios' => 'Previene el envejecimiento de la piel, activa la circulación y favorece la oxigenación de las células epidérmicas',
                'precio_unitario' => 10000,
                'precio_mayorista' => 8500,
                'categoria_id' => 5, // Aseo e Higiene Personal
                'imagen' => 'Exfoliante.jpeg',
            ],
        ];

        foreach ($productos as $producto) {
            Producto::create($producto);
        }
    }
}
