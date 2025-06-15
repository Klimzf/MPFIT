<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        // Получаем все категории
        $lightCategory = Category::where('name', 'легкий')->first();
        $fragileCategory = Category::where('name', 'хрупкий')->first();
        $heavyCategory = Category::where('name', 'тяжелый')->first();

        // Товары
        $products = [
            [
                'name' => 'Смартфон Samsung Galaxy S21',
                'category_id' => $fragileCategory->id,
                'price' => 79999.99,
                'description' => 'Флагманский смартфон с AMOLED-экраном и тройной камерой'
            ],
            [
                'name' => 'Ноутбук ASUS ROG Strix',
                'category_id' => $heavyCategory->id,
                'price' => 124999.50,
                'description' => 'Игровой ноутбук с процессором Intel Core i9 и видеокартой RTX 3080'
            ],
            [
                'name' => 'Кофеварка DeLonghi',
                'category_id' => $lightCategory->id,
                'price' => 34990.00,
                'description' => 'Автоматическая кофемашина для приготовления эспрессо и капучино'
            ],
            [
                'name' => 'Фитнес-браслет Xiaomi Mi Band 6',
                'category_id' => $lightCategory->id,
                'price' => 3499.90,
                'description' => 'Умный браслет с мониторингом сна и пульса'
            ],
            [
                'name' => 'Холодильник LG DoorCooling+',
                'category_id' => $heavyCategory->id,
                'price' => 89999.00,
                'description' => 'Двухкамерный холодильник с системой No Frost'
            ],
            [
                'name' => 'Фарфоровый сервиз на 6 персон',
                'category_id' => $fragileCategory->id,
                'price' => 24999.99,
                'description' => 'Элегантный столовый сервиз из высококачественного фарфора'
            ],
            [
                'name' => 'Электрический гриль Tefal',
                'category_id' => $lightCategory->id,
                'price' => 12990.50,
                'description' => 'Компактный гриль для здорового приготовления пищи'
            ],
            [
                'name' => 'Стиральная машина Bosch',
                'category_id' => $heavyCategory->id,
                'price' => 57990.00,
                'description' => 'Стиральная машина с загрузкой 8 кг и классом энергопотребления A+++'
            ],
            [
                'name' => 'Наушники Sony WH-1000XM4',
                'category_id' => $fragileCategory->id,
                'price' => 29999.99,
                'description' => 'Беспроводные наушники с активным шумоподавлением'
            ],
            [
                'name' => 'Электросамокат Xiaomi Pro 2',
                'category_id' => $lightCategory->id,
                'price' => 39990.00,
                'description' => 'Мощный электросамокат с запасом хода 45 км'
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
