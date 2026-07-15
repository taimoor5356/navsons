<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\Shop;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BulkProductSeeder extends Seeder
{
    private const TOTAL_PRODUCTS = 1000;

    private const CHUNK_SIZE = 250;

    /**
     * Every product this seeder creates gets a `code` starting with this
     * prefix. Re-running the seeder soft-deletes anything already tagged
     * with it (plus the old pre-rewrite "... #123" fake names) before
     * inserting a fresh batch, so it's safe to run repeatedly — including
     * against a live database — without ever touching real merchant
     * products, which will never coincidentally share this code prefix.
     */
    private const SEED_CODE_PREFIX = 'SEED-';

    /**
     * Real, category-appropriate product names (with the actual Pakistani
     * varieties for fruits/vegetables), each tagged with an 'image' key that
     * points into data/product_images.php for a real representative photo.
     *
     * 'units' are realistic pack sizes appended to the item name (e.g.
     * "Sindhri Mango (1 KG)") to generate enough distinct-looking SKUs
     * without resorting to placeholder numbering.
     */
    private array $categoryProducts = [
        'Fruits' => [
            'units' => ['250g', '500g', '1 KG', '2 KG', '5 KG'],
            'items' => [
                ['name' => 'Sindhri Mango', 'image' => 'mango'],
                ['name' => 'Chaunsa Mango', 'image' => 'mango'],
                ['name' => 'Anwar Ratol Mango', 'image' => 'mango'],
                ['name' => 'Langra Mango', 'image' => 'mango'],
                ['name' => 'Dusehri Mango', 'image' => 'mango'],
                ['name' => 'Saroli Mango', 'image' => 'mango'],
                ['name' => 'Fajri Mango', 'image' => 'mango'],
                ['name' => 'Basrai Banana', 'image' => 'banana'],
                ['name' => 'Sindhi Banana', 'image' => 'banana'],
                ['name' => 'Kala Kulu Apple', 'image' => 'apple'],
                ['name' => 'Mashadi Apple', 'image' => 'apple'],
                ['name' => 'Golden Delicious Apple', 'image' => 'apple'],
                ['name' => 'Red Delicious Apple', 'image' => 'apple'],
                ['name' => 'Ambri Apple', 'image' => 'apple'],
                ['name' => 'Allahabadi Guava', 'image' => 'guava'],
                ['name' => 'Safeda Guava', 'image' => 'guava'],
                ['name' => 'Kinnow', 'image' => 'kinnow'],
                ['name' => 'Musambi Sweet Lime', 'image' => 'sweet-lime'],
                ['name' => 'Malta Orange', 'image' => 'orange'],
                ['name' => 'Kagzi Lemon', 'image' => 'lemon'],
                ['name' => 'Aaru Peach', 'image' => 'peach'],
                ['name' => 'Khubani Apricot', 'image' => 'apricot'],
                ['name' => 'Aloo Bukhara Plum', 'image' => 'plum'],
                ['name' => 'Sundar Khani Grapes', 'image' => 'grapes'],
                ['name' => 'Kishmishi Grapes', 'image' => 'grapes'],
                ['name' => 'Tarbooz Watermelon', 'image' => 'watermelon'],
                ['name' => 'Kharbooza Muskmelon', 'image' => 'muskmelon'],
                ['name' => 'Anar Pomegranate', 'image' => 'pomegranate'],
                ['name' => 'Papaya', 'image' => 'papaya'],
                ['name' => 'Anannas Pineapple', 'image' => 'pineapple'],
                ['name' => 'Nashpati Pear', 'image' => 'pear'],
                ['name' => 'Aseel Dates', 'image' => 'dates'],
                ['name' => 'Zahidi Dates', 'image' => 'dates'],
                ['name' => 'Litchi', 'image' => 'litchi'],
                ['name' => 'Jamun', 'image' => 'jamun'],
                ['name' => 'Chiku Sapodilla', 'image' => 'chiku'],
                ['name' => 'Strawberry', 'image' => 'strawberry'],
                ['name' => 'Anjeer Fig', 'image' => 'fig'],
                ['name' => 'Falsa', 'image' => 'falsa'],
                ['name' => 'Ber Jujube', 'image' => 'ber'],
                ['name' => 'Coconut', 'image' => 'coconut'],
            ],
        ],

        'Vegetables' => [
            'units' => ['250g', '500g', '1 KG', '2 KG', '5 KG'],
            'items' => [
                ['name' => 'Aloo Potato', 'image' => 'potato'],
                ['name' => 'Tamatar Tomato', 'image' => 'tomato'],
                ['name' => 'Pyaz Onion', 'image' => 'onion'],
                ['name' => 'Band Gobi Cabbage', 'image' => 'cabbage'],
                ['name' => 'Phool Gobi Cauliflower', 'image' => 'cauliflower'],
                ['name' => 'Palak Spinach', 'image' => 'spinach'],
                ['name' => 'Bhindi Okra', 'image' => 'okra'],
                ['name' => 'Baingan Eggplant', 'image' => 'eggplant'],
                ['name' => 'Gajar Carrot', 'image' => 'carrot'],
                ['name' => 'Mooli Radish', 'image' => 'radish'],
                ['name' => 'Shalgham Turnip', 'image' => 'turnip'],
                ['name' => 'Matar Green Peas', 'image' => 'peas'],
                ['name' => 'Kheera Cucumber', 'image' => 'cucumber'],
                ['name' => 'Lauki Bottle Gourd', 'image' => 'bottle-gourd'],
                ['name' => 'Karela Bitter Gourd', 'image' => 'bitter-gourd'],
                ['name' => 'Tori Ridge Gourd', 'image' => 'ridge-gourd'],
                ['name' => 'Kaddu Pumpkin', 'image' => 'pumpkin'],
                ['name' => 'Hari Mirch Green Chili', 'image' => 'green-chili'],
                ['name' => 'Lehsan Garlic', 'image' => 'garlic'],
                ['name' => 'Adrak Ginger', 'image' => 'ginger'],
                ['name' => 'Dhania Coriander', 'image' => 'coriander'],
                ['name' => 'Pudina Mint', 'image' => 'mint'],
                ['name' => 'Spring Onion', 'image' => 'spring-onion'],
                ['name' => 'Fasal Beans', 'image' => 'beans'],
                ['name' => 'Shimla Mirch Capsicum', 'image' => 'capsicum'],
                ['name' => 'Makai Corn', 'image' => 'corn'],
                ['name' => 'Chukandar Beetroot', 'image' => 'beetroot'],
                ['name' => 'Methi Fenugreek Leaves', 'image' => 'fenugreek'],
                ['name' => 'Arvi Taro', 'image' => 'taro'],
                ['name' => 'Sarson Saag Mustard Greens', 'image' => 'mustard-greens'],
                ['name' => 'Sohanjna Drumstick', 'image' => 'drumstick'],
                ['name' => 'Lettuce', 'image' => 'lettuce'],
            ],
        ],

        'Meat' => [
            'units' => ['250g', '500g', '1 KG', '2 KG'],
            'items' => [
                ['name' => 'Whole Chicken', 'image' => 'chicken-as-food'],
                ['name' => 'Chicken Boneless', 'image' => 'chicken-as-food'],
                ['name' => 'Chicken Breast', 'image' => 'chicken-as-food'],
                ['name' => 'Chicken Thigh', 'image' => 'chicken-as-food'],
                ['name' => 'Chicken Drumsticks', 'image' => 'chicken-as-food'],
                ['name' => 'Chicken Wings', 'image' => 'chicken-as-food'],
                ['name' => 'Chicken Steak', 'image' => 'chicken-as-food'],
                ['name' => 'Chicken Mince Qeema', 'image' => 'ground-meat'],
                ['name' => 'Chicken Liver', 'image' => 'chicken-liver'],
                ['name' => 'Chicken Karahi Cut', 'image' => 'chicken-as-food'],
                ['name' => 'Mutton Leg Raan', 'image' => 'lamb-and-mutton'],
                ['name' => 'Mutton Chops', 'image' => 'lamb-and-mutton'],
                ['name' => 'Mutton Mince Qeema', 'image' => 'ground-meat'],
                ['name' => 'Mutton Ribs', 'image' => 'lamb-and-mutton'],
                ['name' => 'Mutton Boti', 'image' => 'lamb-and-mutton'],
                ['name' => 'Mutton Karahi Cut', 'image' => 'lamb-and-mutton'],
                ['name' => 'Beef Boneless', 'image' => 'beef'],
                ['name' => 'Beef Mince Qeema', 'image' => 'ground-beef'],
                ['name' => 'Beef Steak', 'image' => 'beef'],
                ['name' => 'Beef Nihari Cut', 'image' => 'beef'],
                ['name' => 'Beef Ribs', 'image' => 'beef'],
                ['name' => 'Beef Shank Paya', 'image' => 'beef'],
            ],
        ],

        'Sea Food' => [
            'units' => ['250g', '500g', '1 KG', '2 KG'],
            'items' => [
                ['name' => 'Rohu Fish', 'image' => 'rohu-fish'],
                ['name' => 'Katla Fish', 'image' => 'katla-fish'],
                ['name' => 'Palla Fish Hilsa', 'image' => 'hilsa-fish'],
                ['name' => 'Singhara Fish', 'image' => 'catfish'],
                ['name' => 'Sole Fish', 'image' => 'sole-fish'],
                ['name' => 'Pomfret Fish', 'image' => 'pomfret-fish'],
                ['name' => 'Tilapia Fish', 'image' => 'tilapia-fish'],
                ['name' => 'Salmon Fish', 'image' => 'salmon-fish'],
                ['name' => 'Prawns Jhinga', 'image' => 'prawns'],
                ['name' => 'Crab', 'image' => 'crab'],
                ['name' => 'Squid', 'image' => 'squid'],
                ['name' => 'Fish Fillet', 'image' => 'fish-as-food'],
            ],
        ],

        'Dairy' => [
            'units' => ['250g', '500g', '1 KG', '500ml', '1 Litre'],
            'items' => [
                ['name' => 'Fresh Milk', 'image' => 'milk'],
                ['name' => 'Dahi Yogurt', 'image' => 'yogurt'],
                ['name' => 'Makhan Butter', 'image' => 'butter'],
                ['name' => 'Cheddar Cheese', 'image' => 'cheese'],
                ['name' => 'Malai Cream', 'image' => 'cream'],
                ['name' => 'Desi Ghee', 'image' => 'ghee'],
                ['name' => 'Paneer', 'image' => 'paneer'],
                ['name' => 'Lassi', 'image' => 'lassi'],
                ['name' => 'Khoya', 'image' => 'khoya'],
                ['name' => 'Cottage Cheese', 'image' => 'cottage-cheese'],
                ['name' => 'Whipping Cream', 'image' => 'whipped-cream'],
            ],
        ],

        'Bakery' => [
            'units' => ['Small', 'Regular', 'Family Pack', 'Pack of 6', 'Pack of 12'],
            'items' => [
                ['name' => 'White Bread', 'image' => 'white-bread'],
                ['name' => 'Brown Bread', 'image' => 'whole-wheat-bread'],
                ['name' => 'Naan', 'image' => 'naan'],
                ['name' => 'Bun', 'image' => 'bun'],
                ['name' => 'Rusk Toast', 'image' => 'rusk'],
                ['name' => 'Sponge Cake', 'image' => 'sponge-cake'],
                ['name' => 'Chocolate Cake', 'image' => 'chocolate-cake'],
                ['name' => 'Biscuits', 'image' => 'biscuit'],
                ['name' => 'Sheermal', 'image' => 'sheermal'],
                ['name' => 'Khatai Biscuits', 'image' => 'nankhatai'],
                ['name' => 'Bakarkhani', 'image' => 'bakarkhani'],
                ['name' => 'Donuts', 'image' => 'doughnut'],
            ],
        ],

        'Drinks' => [
            'units' => ['250ml', '500ml', '1 Litre', '1.5 Litre', 'Can'],
            'items' => [
                ['name' => 'Mango Juice', 'image' => 'mango'],
                ['name' => 'Apple Juice', 'image' => 'apple-juice'],
                ['name' => 'Orange Juice', 'image' => 'orange-juice'],
                ['name' => 'Cola Soft Drink', 'image' => 'cola'],
                ['name' => 'Lemon Soft Drink', 'image' => 'lemonade'],
                ['name' => 'Mineral Water', 'image' => 'bottled-water'],
                ['name' => 'Chai Patti Tea Leaves', 'image' => 'tea'],
                ['name' => 'Coffee', 'image' => 'coffee'],
                ['name' => 'Lassi Drink', 'image' => 'lassi'],
                ['name' => 'Rooh Afza Sharbat', 'image' => 'rooh-afza'],
                ['name' => 'Energy Drink', 'image' => 'energy-drink'],
                ['name' => 'Fresh Lime Soda', 'image' => 'lemonade'],
            ],
        ],

        'Pantry' => [
            'units' => ['500g', '1 KG', '2 KG', '5 KG', '10 KG'],
            'items' => [
                ['name' => 'Basmati Rice', 'image' => 'basmati'],
                ['name' => 'Sella Rice', 'image' => 'basmati'],
                ['name' => 'Atta Wheat Flour', 'image' => 'flour'],
                ['name' => 'Cheeni Sugar', 'image' => 'sugar'],
                ['name' => 'Masoor Daal', 'image' => 'lentil'],
                ['name' => 'Moong Daal', 'image' => 'lentil'],
                ['name' => 'Chana Daal', 'image' => 'lentil'],
                ['name' => 'Maash Daal', 'image' => 'lentil'],
                ['name' => 'Arhar Daal', 'image' => 'lentil'],
                ['name' => 'Cooking Oil', 'image' => 'vegetable-oil'],
                ['name' => 'Sarson Mustard Oil', 'image' => 'mustard-oil'],
                ['name' => 'Namak Salt', 'image' => 'salt'],
                ['name' => 'Haldi Turmeric Powder', 'image' => 'turmeric'],
                ['name' => 'Lal Mirch Red Chili Powder', 'image' => 'chili-powder'],
                ['name' => 'Garam Masala', 'image' => 'garam-masala'],
                ['name' => 'Zeera Cumin Seeds', 'image' => 'cumin'],
                ['name' => 'Dhania Powder Coriander Powder', 'image' => 'coriander'],
                ['name' => 'Seviyan Vermicelli', 'image' => 'vermicelli'],
                ['name' => 'Besan Gram Flour', 'image' => 'gram-flour'],
                ['name' => 'Chana Chickpeas', 'image' => 'chickpea'],
                ['name' => 'Rajma Kidney Beans', 'image' => 'kidney-bean'],
            ],
        ],

        'Frozen' => [
            'units' => ['250g', '500g', '1 KG', 'Family Pack'],
            'items' => [
                ['name' => 'Frozen Green Peas', 'image' => 'peas'],
                ['name' => 'Frozen Paratha', 'image' => 'paratha'],
                ['name' => 'Frozen Chicken Nuggets', 'image' => 'chicken-nugget'],
                ['name' => 'Frozen French Fries', 'image' => 'french-fries'],
                ['name' => 'Frozen Mixed Vegetables', 'image' => 'peas'],
                ['name' => 'Frozen Samosa', 'image' => 'samosa'],
                ['name' => 'Frozen Seekh Kabab', 'image' => 'seekh-kebab'],
                ['name' => 'Ice Cream', 'image' => 'ice-cream'],
                ['name' => 'Frozen Fish Fillet', 'image' => 'fish-as-food'],
                ['name' => 'Frozen Spring Rolls', 'image' => 'spring-roll'],
            ],
        ],

        'Quick Meals' => [
            'units' => ['Single Serving', 'Family Pack', 'Combo Meal'],
            'items' => [
                ['name' => 'Chicken Biryani', 'image' => 'biryani'],
                ['name' => 'Beef Pulao', 'image' => 'pilaf'],
                ['name' => 'Chicken Karahi', 'image' => 'karahi'],
                ['name' => 'Daal Chawal', 'image' => 'dal'],
                ['name' => 'Chicken Sandwich', 'image' => 'sandwich'],
                ['name' => 'Paratha Roll', 'image' => 'kathi-roll'],
                ['name' => 'Chicken Shawarma', 'image' => 'shawarma'],
                ['name' => 'Vegetable Pulao', 'image' => 'pilaf'],
                ['name' => 'Chicken Handi', 'image' => 'karahi'],
                ['name' => 'Nihari', 'image' => 'nihari'],
            ],
        ],

        'Home Items' => [
            'units' => ['Small', 'Regular', 'Large', 'Pack of 3', 'Refill Pack'],
            'items' => [
                ['name' => 'Dishwashing Liquid', 'image' => 'dishwashing-liquid'],
                ['name' => 'Laundry Detergent', 'image' => 'laundry-detergent'],
                ['name' => 'Toilet Tissue', 'image' => 'toilet-paper'],
                ['name' => 'Floor Cleaner', 'image' => 'dishwashing-liquid'],
                ['name' => 'Air Freshener', 'image' => 'air-freshener'],
                ['name' => 'Trash Bags', 'image' => 'bin-bag'],
                ['name' => 'Dish Sponge', 'image' => 'dishwashing-liquid'],
                ['name' => 'Glass Cleaner', 'image' => 'dishwashing-liquid'],
                ['name' => 'Fabric Softener', 'image' => 'fabric-softener'],
                ['name' => 'Mosquito Repellent', 'image' => 'mosquito-repellent'],
            ],
        ],

        'Kids' => [
            'units' => ['Small Pack', 'Regular Pack', 'Jumbo Pack', 'Pack of 6'],
            'items' => [
                ['name' => 'Baby Diapers', 'image' => 'diaper'],
                ['name' => 'Baby Wipes', 'image' => 'wet-wipe'],
                ['name' => 'Baby Formula Milk', 'image' => 'infant-formula'],
                ['name' => 'Baby Cereal', 'image' => 'baby-food'],
                ['name' => 'Baby Lotion', 'image' => 'lotion'],
                ['name' => 'Baby Shampoo', 'image' => 'shampoo'],
                ['name' => 'Kids Biscuits', 'image' => 'biscuit'],
                ['name' => 'Baby Powder', 'image' => 'baby-powder'],
            ],
        ],

        'Self Care' => [
            'units' => ['Travel Size', 'Regular', 'Large', 'Pack of 3'],
            'items' => [
                ['name' => 'Bathing Soap', 'image' => 'soap'],
                ['name' => 'Shampoo', 'image' => 'shampoo'],
                ['name' => 'Toothpaste', 'image' => 'toothpaste'],
                ['name' => 'Toothbrush', 'image' => 'toothbrush'],
                ['name' => 'Body Lotion', 'image' => 'lotion'],
                ['name' => 'Hand Wash', 'image' => 'liquid-soap'],
                ['name' => 'Face Wash', 'image' => 'soap'],
                ['name' => 'Hair Oil', 'image' => 'coconut-oil'],
                ['name' => 'Deodorant', 'image' => 'deodorant'],
                ['name' => 'Razor', 'image' => 'razor'],
            ],
        ],

        'Gifts' => [
            'units' => ['Small', 'Medium', 'Large', 'Deluxe'],
            'items' => [
                ['name' => 'Chocolate Gift Box', 'image' => 'chocolate'],
                ['name' => 'Gift Basket', 'image' => 'gift-basket'],
                ['name' => 'Greeting Card', 'image' => 'greeting-card'],
                ['name' => 'Scented Candle Set', 'image' => 'candle'],
                ['name' => 'Perfume Gift Set', 'image' => 'perfume'],
                ['name' => 'Teddy Bear Gift', 'image' => 'teddy-bear'],
            ],
        ],

        'Flowers' => [
            'units' => ['Small Bunch', 'Medium Bouquet', 'Large Bouquet', 'Premium Arrangement'],
            'items' => [
                ['name' => 'Rose Gulab', 'image' => 'rose'],
                ['name' => 'Jasmine Chameli', 'image' => 'jasmine'],
                ['name' => 'Marigold Gainda', 'image' => 'marigold'],
                ['name' => 'Lily', 'image' => 'lily'],
                ['name' => 'Tulip', 'image' => 'tulip'],
                ['name' => 'Orchid', 'image' => 'orchid'],
                ['name' => 'Sunflower', 'image' => 'sunflower'],
                ['name' => 'Carnation', 'image' => 'carnation'],
            ],
        ],

        'Pets' => [
            'units' => ['500g', '1 KG', '2 KG', 'Small Pack', 'Family Pack'],
            'items' => [
                ['name' => 'Dog Food', 'image' => 'dog-food'],
                ['name' => 'Cat Food', 'image' => 'cat-food'],
                ['name' => 'Bird Seed', 'image' => 'birdseed'],
                ['name' => 'Pet Shampoo', 'image' => 'shampoo'],
                ['name' => 'Pet Treats', 'image' => 'dog-food'],
                ['name' => 'Fish Food', 'image' => 'fish-food'],
            ],
        ],
    ];

    /**
     * Run the database seeds.
     *
     * Bulk-creates 1,000 real, category-appropriate products (round-robin
     * assignment across every existing category, then shuffled), each with
     * a real representative photo where one was resolvable.
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

        $productImages = file_exists(__DIR__ . '/data/product_images.php')
            ? require __DIR__ . '/data/product_images.php'
            : [];

        $removed = Product::where('code', 'like', self::SEED_CODE_PREFIX . '%')
            ->orWhere('name', 'like', '% #%')
            ->delete();

        if ($removed > 0) {
            $this->command->info("Removed {$removed} previously seeded product(s) before reseeding.");
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
            DB::transaction(function () use ($chunk, &$sequence, $shop, $bar, $productImages) {
                foreach ($chunk as $category) {
                    $config = $this->categoryProducts[$category->name] ?? null;

                    if (! $config) {
                        $bar->advance();

                        continue;
                    }

                    $sequence++;

                    $item = $config['items'][array_rand($config['items'])];
                    $unit = $config['units'][array_rand($config['units'])];
                    $name = "{$item['name']} ({$unit})";

                    $price = round(mt_rand(500, 50000) / 100, 2);
                    $hasDiscount = mt_rand(0, 1) === 1;
                    $discountPrice = $hasDiscount
                        ? round($price * (mt_rand(60, 90) / 100), 2)
                        : null;

                    $thumbnail = $productImages[$item['image']]
                        ?? ($category->icon_image ?: $category->image);

                    $product = Product::create([
                        'shop_id' => $shop->id,
                        'name' => $name,
                        'code' => self::SEED_CODE_PREFIX . str_pad((string) $sequence, 5, '0', STR_PAD_LEFT),
                        'price' => $price,
                        'discount_price' => $discountPrice,
                        'quantity' => mt_rand(10, 500),
                        'min_order_quantity' => 1,
                        'short_description' => $item['name'] . ' - fresh from the ' . $category->name . ' section.',
                        'description' => $item['name'] . ', a quality product from our ' . $category->name . ' selection.',
                        'product_thumbnail' => $thumbnail,
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
