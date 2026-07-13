<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\Shop;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BulkProductSeeder extends Seeder
{
    private const TOTAL_PRODUCTS = 10000;

    private const CHUNK_SIZE = 500;

    private array $adjectives = [
        'Fresh', 'Organic', 'Premium', 'Golden', 'Farm Fresh', 'Natural', 'Crunchy',
        'Sweet', 'Spicy', 'Homestyle', 'Classic', 'Deluxe', 'Local', 'Seasonal',
        'Handpicked', 'Signature', 'Everyday', 'Family Size', 'Extra', 'Value',
    ];

    private array $nouns = [
        'Delight', 'Special', 'Pack', 'Blend', 'Selection', 'Basket', 'Box',
        'Bundle', 'Mix', 'Treat', 'Combo', 'Favorite', 'Choice', 'Essentials',
    ];

    /**
     * Run the database seeds.
     *
     * Bulk-creates ~10,000 products spread across every existing category
     * (round-robin assignment, then shuffled, so no category is skipped),
     * each using its category's icon_image as its own thumbnail.
     */
    public function run(): void
    {
        $shop = Shop::first();
        if (! $shop) {
            $this->command->error('No shop found. Seed a shop before running this seeder.');

            return;
        }

        $categories = Category::all();
        if ($categories->isEmpty()) {
            $this->command->error('No categories found. Seed categories before running this seeder.');

            return;
        }

        // Round-robin fill guarantees every category gets an (almost) even
        // share of products, then shuffle so the product/category pairing
        // looks random rather than sequential.
        $categoryAssignments = [];
        for ($i = 0; $i < self::TOTAL_PRODUCTS; $i++) {
            $categoryAssignments[] = $categories[$i % $categories->count()];
        }
        shuffle($categoryAssignments);

        DB::connection()->disableQueryLog();

        $bar = $this->command->getOutput()->createProgressBar(self::TOTAL_PRODUCTS);
        $bar->start();

        $chunks = array_chunk($categoryAssignments, self::CHUNK_SIZE);
        $sequence = 0;

        foreach ($chunks as $chunk) {
            DB::transaction(function () use ($chunk, &$sequence, $shop, $bar) {
                foreach ($chunk as $category) {
                    $sequence++;

                    $price = round(mt_rand(500, 50000) / 100, 2);
                    $hasDiscount = mt_rand(0, 1) === 1;
                    $discountPrice = $hasDiscount
                        ? round($price * (mt_rand(60, 90) / 100), 2)
                        : null;

                    $name = trim(sprintf(
                        '%s %s %s #%d',
                        $this->adjectives[array_rand($this->adjectives)],
                        $category->name,
                        $this->nouns[array_rand($this->nouns)],
                        $sequence
                    ));

                    $product = Product::create([
                        'shop_id' => $shop->id,
                        'name' => $name,
                        'price' => $price,
                        'discount_price' => $discountPrice,
                        'quantity' => mt_rand(10, 500),
                        'min_order_quantity' => 1,
                        'short_description' => 'Randomly generated ' . $category->name . ' product for demo purposes.',
                        'description' => 'This is a randomly seeded product belonging to the ' . $category->name . ' category.',
                        'product_thumbnail' => $category->icon_image ?: $category->image,
                        'is_active' => true,
                        'is_approve' => true,
                        'is_new' => true,
                        'unit' => 'pc',
                    ]);

                    $product->categories()->sync([$category->id]);

                    $bar->advance();
                }
            });
        }

        $bar->finish();
        $this->command->newLine(2);
        $this->command->info(sprintf(
            'Seeded %d products across all %d categories.',
            self::TOTAL_PRODUCTS,
            $categories->count()
        ));
    }
}
