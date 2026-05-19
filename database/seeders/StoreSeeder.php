<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Lunar\Models\Attribute;
use Lunar\Models\AttributeGroup;
use Lunar\Models\Currency;
use Lunar\Models\Language;
use Lunar\Models\Price;
use Lunar\Models\Product;
use Lunar\Models\ProductType;
use Lunar\Models\ProductVariant;
use Lunar\Models\TaxClass;
use Lunar\FieldTypes\Text;
use Lunar\FieldTypes\TranslatedText;
use Illuminate\Support\Collection;

class StoreSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Asegurar Lenguaje Ingles (requerido por Lunar)
        $en = Language::firstOrCreate([
            'code' => 'en',
        ], [
            'name' => 'English',
            'default' => true,
        ]);

        // 2. Asegurar Lenguaje Espanol
        $es = Language::firstOrCreate([
            'code' => 'es',
        ], [
            'name' => 'Espanol',
            'default' => false,
        ]);

        if (!Language::where('default', true)->exists()) {
            $es->update(['default' => true]);
        }

        // 3. Configurar Moneda MXN
        $mxn = Currency::firstOrCreate([
            'code' => 'MXN',
        ], [
            'name' => 'Peso Mexicano',
            'exchange_rate' => 1.0,
            'decimal_places' => 2,
            'enabled' => true,
            'default' => true,
        ]);

        // Asegurar que USD no sea la default si queremos MXN
        Currency::where('code', 'USD')->update(['default' => false]);
        $mxn->update(['default' => true]);

        // 4. Tax Class
        $taxClass = TaxClass::firstOrCreate([
            'name' => 'Default Tax Class',
        ]);

        // 5. AttributeGroup (crear si no existe)
        $group = AttributeGroup::whereHandle('details')->first();
        if (!$group) {
            $group = AttributeGroup::create([
                'attributable_type' => Product::morphName(),
                'name' => collect(['en' => 'Details', 'es' => 'Detalles']),
                'handle' => 'details',
                'position' => 1,
            ]);
        }

        // 6. Atributos
        $nameAttr = Attribute::firstOrCreate([
            'handle' => 'name',
            'attribute_type' => 'product',
        ], [
            'attribute_group_id' => $group->id,
            'position' => 1,
            'name' => ['en' => 'Name', 'es' => 'Nombre'],
            'type' => Text::class,
            'required' => true,
            'searchable' => true,
            'filterable' => true,
            'system' => false,
            'configuration' => [],
            'description' => ['en' => '', 'es' => ''],
        ]);

        $descAttr = Attribute::firstOrCreate([
            'handle' => 'description',
            'attribute_type' => 'product',
        ], [
            'attribute_group_id' => $group->id,
            'position' => 2,
            'name' => ['en' => 'Description', 'es' => 'Descripcion'],
            'type' => Text::class,
            'required' => false,
            'searchable' => true,
            'filterable' => false,
            'system' => false,
            'configuration' => [],
            'description' => ['en' => '', 'es' => ''],
        ]);

        // 7. Product Type
        $productType = ProductType::firstOrCreate([
            'name' => 'Servicio',
        ]);

        // Vincular atributos al tipo de producto
        $productType->mappedAttributes()->syncWithoutDetaching([$nameAttr->id, $descAttr->id]);

        // 8. Lista de Servicios
        $serviciosData = [
            [
                'name' => 'Mantenimiento Preventivo PC',
                'desc' => 'Limpieza interna completa, cambio de pasta termica y optimizacion de sistema para computadoras de escritorio.',
                'price' => 350.00,
                'category' => 'hardware',
            ],
            [
                'name' => 'Formateo e Instalacion de Windows',
                'desc' => 'Instalacion limpia de sistema operativo, drivers actualizados y paqueteria basica para que tu equipo vuele.',
                'price' => 450.00,
                'category' => 'software',
            ],
            [
                'name' => 'Limpieza de Laptop Profunda',
                'desc' => 'Atencion especializada para laptops: eliminacion de polvo en ventiladores y lubricacion de bisagras.',
                'price' => 500.00,
                'category' => 'hardware',
            ],
            [
                'name' => 'Configuracion de Redes/WiFi',
                'desc' => 'Mejora la senal de tu casa u oficina. Configuracion de repetidores y optimizacion de canales WiFi.',
                'price' => 250.00,
                'category' => 'networks',
            ],
            [
                'name' => 'Instalacion de Software Especializado',
                'desc' => 'Asistencia en la instalacion de programas complejos como AutoCAD, SolidWorks o suites de Adobe.',
                'price' => 200.00,
                'category' => 'software',
            ],
            [
                'name' => 'Soporte Tecnico Remoto (1hr)',
                'desc' => 'Solucion de problemas de software, virus o errores de sistema mediante conexion remota segura.',
                'price' => 150.00,
                'category' => 'support',
            ],
            [
                'name' => 'Consultoria en Armado de PC',
                'desc' => 'Te ayudo a elegir las mejores piezas segun tu presupuesto para tu proxima PC Gamer o de trabajo.',
                'price' => 100.00,
                'category' => 'hardware',
            ],
            [
                'name' => 'Recuperacion de Archivos',
                'desc' => 'Intento de recuperacion de fotos o documentos borrados accidentalmente de memorias USB o discos duros.',
                'price' => 400.00,
                'category' => 'support',
            ],
        ];

        foreach ($serviciosData as $data) {
            // Crear Producto
            $product = Product::create([
                'product_type_id' => $productType->id,
                'status' => 'published',
                'attribute_data' => [
                    'name' => new Text($data['name']),
                    'description' => new Text($data['desc']),
                ],
            ]);

            // Crear Variante
            $variant = ProductVariant::create([
                'product_id' => $product->id,
                'sku' => strtoupper(str_replace(' ', '-', $data['name'])) . '-' . rand(100, 999),
                'tax_class_id' => $taxClass->id,
                'stock' => 999,
            ]);

            // Agregar Precio
            Price::create([
                'priceable_type' => 'product_variant',
                'priceable_id' => $variant->id,
                'currency_id' => $mxn->id,
                'price' => $data['price'] * 100,
            ]);

            // Agregar Imagen (asumimos que estan en public/images/seed/)
            $imagePath = public_path("images/seed/{$data['category']}.png");
            if (file_exists($imagePath)) {
                $product->addMedia($imagePath)
                    ->preservingOriginal()
                    ->toMediaCollection('images');
            }
        }
    }
}
