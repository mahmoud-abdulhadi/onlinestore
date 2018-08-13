<?php


use App\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $categories = [
            'Kindle E-Readers & Books',
            'Music',
            'Clothing,Shoes & Jewelry',
            'Electronics',
            'Computers & Office',
            'Appstore for Android',
            'Movies,Music & Games'
      ];

      foreach ($categories as $category) {
            Category::create([
                'name' => $category,
                'slug' => str_slug($category)
            ]);
      }
    }
}
