<?php

namespace App\Containers\Category\Data\Seeders;

use App\Containers\Category\Models\Category;
use App\Ship\Parents\Seeders\Seeder;
use Faker\Factory;

class CategorySeeder extends Seeder
{
    public function run()
    {
      if (config('app.env') == 'production') {
        return 0;
      }

      /** @var int $categoriesCount */
      $categoriesCount = Category::count();

      if ($categoriesCount > 0) {
        return 0;
      }

      $countOfCategories = env('SEEDER_CATEGORIES', 10);

      $faker = Factory::create();

      for ($i = 1; $i <= $countOfCategories; $i++) {
        $category = Category::create([
          'title' => $faker->word,
        ]);

        echo ($countOfCategories-$i)." left --> category: ".$category->title." created\r\n";
      }
    }
}
