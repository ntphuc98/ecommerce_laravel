<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rows = range(1,20);
        foreach($rows as $index){
            $name = 'Danh mục ' . $index;
            Category::create([
                'name' => $name,
                'slug' => Str::of($name)->slug('-'),
                'parent_id' => rand(1,20),
            ]);
        }
    }
}
