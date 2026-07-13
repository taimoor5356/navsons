<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryIconImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * Backfills the new icon_image column with each category's existing image.
     */
    public function run(): void
    {
        Category::query()->whereNotNull('image')->each(function (Category $category) {
            $category->update(['icon_image' => $category->image]);
        });

        $this->command->info('Category icon_image backfilled from image.');
    }
}
