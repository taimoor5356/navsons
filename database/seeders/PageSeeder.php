<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pages = [
            [
                'title' => 'Products',
                'slug' => 'products',
                'url' => 'products',
                'description' => null,
                'is_active' => true,
                'is_default' => true,
                'is_editable' => false,
            ],
            [
                'title' => 'Shops',
                'slug' => 'shops',
                'url' => 'shops',
                'description' => null,
                'is_active' => true,
                'is_default' => true,
                'is_editable' => false,
            ],
            [
                'title' => 'Most Popular',
                'slug' => 'most-popular',
                'url' => 'most-popular',
                'description' => null,
                'is_active' => true,
                'is_default' => true,
                'is_editable' => false,
            ],
            [
                'title' => 'Best Deal',
                'slug' => 'best-deal',
                'url' => 'best-deal',
                'description' => null,
                'is_active' => true,
                'is_default' => true,
                'is_editable' => false,
            ],
            [
                'title' => 'Contact',
                'slug' => 'contact-us',
                'url' => 'contact-us',
                'description' => null,
                'is_active' => true,
                'is_default' => true,
                'is_editable' => false,
            ],
            [
                'title' => 'Blogs',
                'slug' => 'blogs',
                'url' => 'blogs',
                'description' => null,
                'is_active' => true,
                'is_default' => true,
                'is_editable' => false,
            ],
            [
                'title' => 'About Us',
                'slug' => 'about-us',
                'url' => 'about-us',
                'description' => $this->aboutUsContent(),
                'is_active' => true,
                'is_default' => true,
                'is_editable' => true,
            ],
            [
                'title' => 'Privacy Policy',
                'slug' => 'privacy-policy',
                'url' => 'privacy-policy',
                'description' => $this->privacyPolicyContent(),
                'is_active' => true,
                'is_default' => true,
                'is_editable' => true,
            ],
            [
                'title' => 'Terms and Conditions',
                'slug' => 'terms-and-conditions',
                'url' => 'terms-and-conditions',
                'description' => $this->termsAndConditionsContent(),
                'is_active' => true,
                'is_default' => true,
                'is_editable' => true,
            ],
            [
                'title' => 'Return policy / Refund Policy',
                'slug' => 'return-and-refund-policy',
                'url' => 'page/return-and-refund-policy',
                'description' => null,
                'is_active' => true,
                'is_default' => false,
                'is_editable' => true,
            ],
            [
                'title' => 'Shipping & Delivery Policy',
                'slug' => 'shipping-and-delivery-policy',
                'url' => 'page/shipping-and-delivery-policy',
                'description' => null,
                'is_active' => true,
                'is_default' => false,
                'is_editable' => true,
            ],
        ];

        foreach ($pages as $page) {
            Page::updateOrCreate(['slug' => $page['slug']], $page);
        }
    }

    private function aboutUsContent(): string
    {
        return <<<'HTML'
<p>Navsons is a home-grown grocery delivery service on a mission to make fresh, quality food easy to access for every household in Islamabad, Rawalpindi and the surrounding areas. What started as a simple idea — bringing farm-fresh fruits, vegetables, meat and everyday essentials straight to your door — has grown into a service trusted by families across the twin cities.</p>

<h2>Our Promise</h2>
<p>Whether you're stocking up for the week or need something delivered today, Navsons is here to make grocery shopping simple, reliable and fresh — every single time.</p>
HTML;
    }

    private function privacyPolicyContent(): string
    {
        return <<<'HTML'
<div class="lang-en">
<p><em>Last updated: 17 July 2026</em></p>

<p>Navsons ("we", "us", "our") operates the navsons.com website and mobile ordering platform for grocery, fruit, vegetable and meat delivery in Islamabad, Rawalpindi and nearby areas. This Privacy Policy explains what information we collect from you, how we use it, and the choices you have.</p>

<h2>1. Information We Collect</h2>
<ul>
<li><strong>Account details:</strong> your name, phone number, email address and password when you register.</li>
<li><strong>Delivery information:</strong> your delivery address(es) and location, so we can get your order to you.</li>
<li><strong>Order details:</strong> items you purchase, order history, and special instructions.</li>
<li><strong>Payment information:</strong> if you pay online, your payment is processed by our payment partner directly — we do not store your full card details on our servers.</li>
<li><strong>Communication:</strong> messages you send us through customer support, live chat, or support tickets.</li>
<li><strong>Technical information:</strong> device type, browser, and app usage data, used only to keep the site working properly and to improve it.</li>
</ul>

<h2>2. How We Use Your Information</h2>
<ul>
<li>To process and deliver your orders.</li>
<li>To contact you about your order (e.g. confirmations, delivery updates, delays).</li>
<li>To provide customer support and resolve complaints.</li>
<li>To send you offers or promotions — only if you have not opted out.</li>
<li>To improve our products, services and website experience.</li>
<li>To prevent fraud and keep our platform secure.</li>
</ul>

<h2>3. Sharing Your Information</h2>
<p>We do not sell your personal information. We only share it where necessary:</p>
<ul>
<li>With our delivery riders and partner shops, so your order can be fulfilled.</li>
<li>With payment gateway providers, to process online payments securely.</li>
<li>With service providers who help us run our platform (e.g. SMS/notification services).</li>
<li>When required by law or to protect the rights and safety of Navsons and our customers.</li>
</ul>

<h2>4. Cookies</h2>
<p>Our website uses cookies and similar technologies to keep you logged in, remember your cart, and understand how our site is used. You can control cookies through your browser settings, though some features may not work properly if cookies are disabled.</p>

<h2>5. Data Security</h2>
<p>We take reasonable technical and organisational measures to protect your personal information from unauthorised access, loss or misuse. However, no method of transmission over the internet is 100% secure, and we encourage you to keep your account password confidential.</p>

<h2>6. Your Rights</h2>
<ul>
<li>You can access and update your account information at any time from your profile.</li>
<li>You can request correction or deletion of your personal data by contacting us.</li>
<li>You can opt out of marketing messages at any time.</li>
</ul>

<h2>7. Children's Privacy</h2>
<p>Our services are intended for use by adults who can place and pay for orders. We do not knowingly collect personal information from children.</p>

<h2>8. Changes to This Policy</h2>
<p>We may update this Privacy Policy from time to time to reflect changes in our practices. Any changes will be posted on this page with an updated date.</p>

<h2>9. Contact Us</h2>
<p>If you have any questions about this Privacy Policy or how we handle your information, please contact us:</p>
<ul>
<li>Phone: +92 300 0055563</li>
<li>Email: info@navsons.com</li>
<li>Address: Islamabad, Pakistan</li>
</ul>
</div>
<div class="lang-ur">
<p><em>آخری تازہ کاری: 17 جولائی 2026</em></p>

<p>نیوسنز ("ہم"، "ہمارا") navsons.com ویب سائٹ اور موبائل ایپ کے ذریعے اسلام آباد، راولپنڈی اور گردونواح میں گروسری، پھل، سبزی اور گوشت کی ڈیلیوری فراہم کرتا ہے۔ یہ پرائیویسی پالیسی بتاتی ہے کہ ہم آپ سے کون سی معلومات اکٹھی کرتے ہیں، انہیں کیسے استعمال کرتے ہیں، اور آپ کے پاس کیا اختیارات ہیں۔</p>

<h2>1. ہم کون سی معلومات اکٹھی کرتے ہیں</h2>
<ul>
<li><strong>اکاؤنٹ کی تفصیلات:</strong> رجسٹریشن کے وقت آپ کا نام، فون نمبر، ای میل ایڈریس اور پاس ورڈ۔</li>
<li><strong>ڈیلیوری کی معلومات:</strong> آپ کا ڈیلیوری ایڈریس اور لوکیشن، تاکہ ہم آپ کا آرڈر آپ تک پہنچا سکیں۔</li>
<li><strong>آرڈر کی تفصیلات:</strong> آپ کی خریدی گئی اشیاء، آرڈر کی تاریخ، اور خصوصی ہدایات۔</li>
<li><strong>ادائیگی کی معلومات:</strong> اگر آپ آن لائن ادائیگی کرتے ہیں تو یہ ہمارے پیمنٹ پارٹنر کے ذریعے براہ راست پراسیس ہوتی ہے — ہم آپ کے مکمل کارڈ کی تفصیلات اپنے سرورز پر محفوظ نہیں کرتے۔</li>
<li><strong>رابطہ:</strong> وہ پیغامات جو آپ کسٹمر سپورٹ، لائیو چیٹ، یا سپورٹ ٹکٹ کے ذریعے ہمیں بھیجتے ہیں۔</li>
<li><strong>تکنیکی معلومات:</strong> ڈیوائس کی قسم، براؤزر، اور ایپ کے استعمال کا ڈیٹا، جو صرف ویب سائٹ کو درست طریقے سے چلانے اور بہتر بنانے کے لیے استعمال ہوتا ہے۔</li>
</ul>

<h2>2. ہم آپ کی معلومات کیسے استعمال کرتے ہیں</h2>
<ul>
<li>آپ کے آرڈرز کو پراسیس اور ڈیلیور کرنے کے لیے۔</li>
<li>آپ کے آرڈر کے بارے میں رابطہ کرنے کے لیے (مثلاً تصدیق، ڈیلیوری اپڈیٹس، تاخیر)۔</li>
<li>کسٹمر سپورٹ فراہم کرنے اور شکایات حل کرنے کے لیے۔</li>
<li>آپ کو آفرز یا پروموشنز بھیجنے کے لیے — صرف اس صورت میں جب آپ نے اس سے انکار نہ کیا ہو۔</li>
<li>اپنی مصنوعات، خدمات اور ویب سائٹ کے تجربے کو بہتر بنانے کے لیے۔</li>
<li>دھوکہ دہی کو روکنے اور اپنے پلیٹ فارم کو محفوظ رکھنے کے لیے۔</li>
</ul>

<h2>3. آپ کی معلومات کا اشتراک</h2>
<p>ہم آپ کی ذاتی معلومات فروخت نہیں کرتے۔ ہم یہ صرف ضرورت کے مطابق شیئر کرتے ہیں:</p>
<ul>
<li>ہمارے ڈیلیوری رائیڈرز اور پارٹنر دکانوں کے ساتھ، تاکہ آپ کا آرڈر مکمل ہو سکے۔</li>
<li>پیمنٹ گیٹ وے فراہم کنندگان کے ساتھ، آن لائن ادائیگیوں کو محفوظ طریقے سے پراسیس کرنے کے لیے۔</li>
<li>ان سروس فراہم کنندگان کے ساتھ جو ہمارے پلیٹ فارم کو چلانے میں مدد کرتے ہیں (مثلاً ایس ایم ایس/نوٹیفیکیشن سروسز)۔</li>
<li>جب قانون کا تقاضا ہو یا نیوسنز اور ہمارے صارفین کے حقوق و تحفظ کے لیے ضروری ہو۔</li>
</ul>

<h2>4. کوکیز</h2>
<p>ہماری ویب سائٹ آپ کو لاگ اِن رکھنے، آپ کی کارٹ یاد رکھنے، اور یہ سمجھنے کے لیے کہ ہماری سائٹ کیسے استعمال ہوتی ہے، کوکیز اور اسی طرح کی ٹیکنالوجیز استعمال کرتی ہے۔ آپ اپنے براؤزر کی سیٹنگز کے ذریعے کوکیز کو کنٹرول کر سکتے ہیں، تاہم اگر کوکیز غیر فعال ہوں تو کچھ فیچرز درست طریقے سے کام نہیں کر سکتے۔</p>

<h2>5. ڈیٹا کی حفاظت</h2>
<p>ہم آپ کی ذاتی معلومات کو غیر مجاز رسائی، نقصان یا غلط استعمال سے بچانے کے لیے مناسب تکنیکی اور انتظامی اقدامات کرتے ہیں۔ تاہم انٹرنیٹ پر کوئی بھی طریقہ 100 فیصد محفوظ نہیں ہوتا، اس لیے ہم آپ کو اپنے اکاؤنٹ کا پاس ورڈ خفیہ رکھنے کی ترغیب دیتے ہیں۔</p>

<h2>6. آپ کے حقوق</h2>
<ul>
<li>آپ کسی بھی وقت اپنے پروفائل سے اپنے اکاؤنٹ کی معلومات تک رسائی حاصل کر سکتے اور انہیں اپڈیٹ کر سکتے ہیں۔</li>
<li>آپ ہم سے رابطہ کر کے اپنے ذاتی ڈیٹا کی تصحیح یا حذف کرنے کی درخواست کر سکتے ہیں۔</li>
<li>آپ کسی بھی وقت مارکیٹنگ پیغامات سے انکار کر سکتے ہیں۔</li>
</ul>

<h2>7. بچوں کی رازداری</h2>
<p>ہماری خدمات ان بالغ افراد کے استعمال کے لیے ہیں جو آرڈر دے سکتے اور ادائیگی کر سکتے ہیں۔ ہم دانستہ طور پر بچوں سے ذاتی معلومات اکٹھی نہیں کرتے۔</p>

<h2>8. اس پالیسی میں تبدیلیاں</h2>
<p>ہم اپنے طریقہ کار میں تبدیلیوں کی عکاسی کے لیے وقتاً فوقتاً اس پرائیویسی پالیسی کو اپڈیٹ کر سکتے ہیں۔ کوئی بھی تبدیلی اپڈیٹ شدہ تاریخ کے ساتھ اسی صفحے پر شائع کی جائے گی۔</p>

<h2>9. ہم سے رابطہ کریں</h2>
<p>اگر اس پرائیویسی پالیسی یا ہمارے آپ کی معلومات کو سنبھالنے کے طریقے کے بارے میں آپ کے کوئی سوالات ہیں تو براہ کرم ہم سے رابطہ کریں:</p>
<ul>
<li>فون: 0055563 300 92+</li>
<li>ای میل: info@navsons.com</li>
<li>پتہ: اسلام آباد، پاکستان</li>
</ul>
</div>
HTML;
    }

    private function termsAndConditionsContent(): string
    {
        return <<<'HTML'
<div class="lang-en">
<p><em>Last updated: 17 July 2026</em></p>

<p>These Terms and Conditions ("Terms") govern your use of the navsons.com website and mobile ordering platform, operated by Navsons ("we", "us", "our"), which offers fresh fruits, vegetables, meat, seafood, dairy and grocery delivery in Islamabad, Rawalpindi and nearby areas. By creating an account or placing an order with us, you agree to these Terms.</p>

<h2>1. Using Our Platform</h2>
<ul>
<li>You must provide accurate and complete information when creating an account.</li>
<li>You are responsible for keeping your account password confidential and for all activity under your account.</li>
<li>You must be able to lawfully enter into a purchase agreement to place an order.</li>
</ul>

<h2>2. Orders and Pricing</h2>
<ul>
<li>Product prices, availability and images are shown at the time of ordering and may change without prior notice.</li>
<li>Placing an order is an offer to buy; we confirm the order once it is accepted and processed.</li>
<li>We reserve the right to cancel or limit any order — for example due to stock unavailability, pricing errors, or suspected fraud — and will inform you if this happens.</li>
<li>Weights for fresh produce, meat and seafood are approximate; minor variation between the ordered and delivered weight may occur.</li>
</ul>

<h2>3. Delivery</h2>
<ul>
<li>We aim to deliver within the estimated time shown at checkout, but delivery times are not guaranteed and may vary due to traffic, weather or order volume.</li>
<li>Please ensure someone is available at the delivery address to receive the order, or provide clear delivery instructions.</li>
<li>Delivery is currently available only within our supported service areas.</li>
</ul>

<h2>4. Payments</h2>
<ul>
<li>We accept cash on delivery and online payment through our supported payment partners.</li>
<li>Online payments are processed securely by our payment gateway provider; we do not store your full card details.</li>
<li>You agree to pay the full amount shown at checkout, including any applicable delivery charges.</li>
</ul>

<h2>5. Cancellations, Returns and Refunds</h2>
<ul>
<li>You may cancel an order before it has been dispatched for delivery by contacting customer support.</li>
<li>If any item is missing, damaged, incorrect, or not up to acceptable quality upon delivery, please report it to us within 24 hours so we can arrange a replacement or refund.</li>
<li>Refunds for online payments are processed back to the original payment method and may take a few business days to reflect.</li>
</ul>

<h2>6. Promotions and Discounts</h2>
<p>Any discount codes, offers or promotions are subject to their own specific terms, validity period, and may be withdrawn or changed at any time without prior notice.</p>

<h2>7. User Conduct</h2>
<p>You agree not to misuse the platform, including but not limited to: submitting false information, attempting to interfere with the website's security or operation, or using the platform for any unlawful purpose.</p>

<h2>8. Intellectual Property</h2>
<p>All content on navsons.com, including the logo, design, text and images, is owned by or licensed to Navsons and may not be copied or used without our permission.</p>

<h2>9. Limitation of Liability</h2>
<p>While we take reasonable care to ensure product quality and timely delivery, Navsons is not liable for indirect or consequential losses arising from delays, unavailability of the website, or issues beyond our reasonable control.</p>

<h2>10. Changes to These Terms</h2>
<p>We may update these Terms from time to time. Continued use of the platform after changes are posted means you accept the updated Terms.</p>

<h2>11. Contact Us</h2>
<p>If you have questions about these Terms, please contact us:</p>
<ul>
<li>Phone: +92 300 0055563</li>
<li>Email: info@navsons.com</li>
<li>Address: Islamabad, Pakistan</li>
</ul>
</div>
<div class="lang-ur">
<p><em>آخری تازہ کاری: 17 جولائی 2026</em></p>

<p>یہ شرائط و ضوابط ("شرائط") navsons.com ویب سائٹ اور موبائل ایپ کے استعمال پر لاگو ہوتی ہیں، جسے نیوسنز ("ہم"، "ہمارا") چلاتا ہے اور اسلام آباد، راولپنڈی اور گردونواح میں تازہ پھل، سبزیاں، گوشت، سی فوڈ، ڈیری اور گروسری کی ڈیلیوری فراہم کرتا ہے۔ اکاؤنٹ بنانے یا ہمارے پاس آرڈر دینے سے آپ ان شرائط سے اتفاق کرتے ہیں۔</p>

<h2>1. ہمارا پلیٹ فارم استعمال کرنا</h2>
<ul>
<li>اکاؤنٹ بناتے وقت آپ کو درست اور مکمل معلومات فراہم کرنی ہوں گی۔</li>
<li>اپنے اکاؤنٹ کے پاس ورڈ کو خفیہ رکھنا اور اپنے اکاؤنٹ کے تحت ہونے والی تمام سرگرمی کی ذمہ داری آپ پر ہے۔</li>
<li>آرڈر دینے کے لیے آپ کا قانونی طور پر خرید و فروخت کا معاہدہ کرنے کے قابل ہونا ضروری ہے۔</li>
</ul>

<h2>2. آرڈرز اور قیمتیں</h2>
<ul>
<li>مصنوعات کی قیمتیں، دستیابی اور تصاویر آرڈر کے وقت دکھائی جاتی ہیں اور بغیر پیشگی اطلاع کے تبدیل ہو سکتی ہیں۔</li>
<li>آرڈر دینا خریداری کی پیشکش ہے؛ ہم آرڈر قبول اور پراسیس ہونے کے بعد اس کی تصدیق کرتے ہیں۔</li>
<li>ہمیں کسی بھی آرڈر کو منسوخ یا محدود کرنے کا حق حاصل ہے — مثلاً اسٹاک کی عدم دستیابی، قیمت کی غلطی، یا مشکوک دھوکہ دہی کی صورت میں — اور ایسا ہونے پر ہم آپ کو مطلع کریں گے۔</li>
<li>تازہ پیداوار، گوشت اور سی فوڈ کا وزن تخمینی ہوتا ہے؛ آرڈر کیے گئے اور ڈیلیور کیے گئے وزن میں معمولی فرق ہو سکتا ہے۔</li>
</ul>

<h2>3. ڈیلیوری</h2>
<ul>
<li>ہماری کوشش ہوتی ہے کہ چیک آؤٹ پر دکھائے گئے تخمینی وقت کے اندر ڈیلیوری کریں، لیکن ٹریفک، موسم یا آرڈرز کی تعداد کی وجہ سے ڈیلیوری کے وقت میں فرق آ سکتا ہے اور اس کی ضمانت نہیں دی جاتی۔</li>
<li>براہ کرم یقینی بنائیں کہ آرڈر وصول کرنے کے لیے ڈیلیوری ایڈریس پر کوئی موجود ہو، یا واضح ڈیلیوری ہدایات فراہم کریں۔</li>
<li>ڈیلیوری فی الحال صرف ہمارے سروس ایریاز میں دستیاب ہے۔</li>
</ul>

<h2>4. ادائیگیاں</h2>
<ul>
<li>ہم کیش آن ڈیلیوری اور ہمارے معاون پیمنٹ پارٹنرز کے ذریعے آن لائن ادائیگی قبول کرتے ہیں۔</li>
<li>آن لائن ادائیگیاں ہمارے پیمنٹ گیٹ وے فراہم کنندہ کے ذریعے محفوظ طریقے سے پراسیس ہوتی ہیں؛ ہم آپ کے مکمل کارڈ کی تفصیلات محفوظ نہیں کرتے۔</li>
<li>آپ چیک آؤٹ پر دکھائی گئی مکمل رقم، بشمول کسی بھی قابل اطلاق ڈیلیوری چارجز کی ادائیگی سے اتفاق کرتے ہیں۔</li>
</ul>

<h2>5. منسوخی، واپسی اور رقم کی واپسی</h2>
<ul>
<li>آپ کسٹمر سپورٹ سے رابطہ کر کے آرڈر ڈیلیوری کے لیے روانہ ہونے سے پہلے اسے منسوخ کر سکتے ہیں۔</li>
<li>اگر ڈیلیوری پر کوئی چیز غائب، خراب، غلط، یا معیار کے مطابق نہ ہو، تو براہ کرم 24 گھنٹوں کے اندر ہمیں اطلاع دیں تاکہ ہم تبدیلی یا رقم کی واپسی کا انتظام کر سکیں۔</li>
<li>آن لائن ادائیگیوں کی رقم کی واپسی اصل ادائیگی کے طریقے میں کی جاتی ہے اور اسے ظاہر ہونے میں چند کاروباری دن لگ سکتے ہیں۔</li>
</ul>

<h2>6. پروموشنز اور رعایتیں</h2>
<p>کوئی بھی ڈسکاؤنٹ کوڈز، آفرز یا پروموشنز ان کی اپنی مخصوص شرائط اور میعاد کے تابع ہیں، اور بغیر پیشگی اطلاع کے کسی بھی وقت واپس لی یا تبدیل کی جا سکتی ہیں۔</p>

<h2>7. صارف کا طرزِ عمل</h2>
<p>آپ پلیٹ فارم کے غلط استعمال سے اتفاق نہیں کرتے، بشمول لیکن صرف اسی تک محدود نہیں: غلط معلومات فراہم کرنا، ویب سائٹ کی سیکیورٹی یا آپریشن میں مداخلت کی کوشش کرنا، یا پلیٹ فارم کو کسی غیر قانونی مقصد کے لیے استعمال کرنا۔</p>

<h2>8. دانشورانہ ملکیت</h2>
<p>navsons.com پر موجود تمام مواد، بشمول لوگو، ڈیزائن، متن اور تصاویر، نیوسنز کی ملکیت ہیں یا اسے لائسنس یافتہ ہیں اور ہماری اجازت کے بغیر کاپی یا استعمال نہیں کیے جا سکتے۔</p>

<h2>9. ذمہ داری کی حد</h2>
<p>اگرچہ ہم مصنوعات کے معیار اور بروقت ڈیلیوری کو یقینی بنانے کے لیے مناسب احتیاط برتتے ہیں، نیوسنز تاخیر، ویب سائٹ کی عدم دستیابی، یا ہمارے معقول کنٹرول سے باہر مسائل کی وجہ سے ہونے والے بالواسطہ نقصانات کا ذمہ دار نہیں ہے۔</p>

<h2>10. ان شرائط میں تبدیلیاں</h2>
<p>ہم وقتاً فوقتاً ان شرائط کو اپڈیٹ کر سکتے ہیں۔ تبدیلیاں شائع ہونے کے بعد پلیٹ فارم کا مسلسل استعمال اپڈیٹ شدہ شرائط کی قبولیت ظاہر کرتا ہے۔</p>

<h2>11. ہم سے رابطہ کریں</h2>
<p>اگر ان شرائط کے بارے میں آپ کے کوئی سوالات ہیں تو براہ کرم ہم سے رابطہ کریں:</p>
<ul>
<li>فون: 0055563 300 92+</li>
<li>ای میل: info@navsons.com</li>
<li>پتہ: اسلام آباد، پاکستان</li>
</ul>
</div>
HTML;
    }
}
