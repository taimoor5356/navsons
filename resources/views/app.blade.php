@php
    $generaleSetting = App\Models\GeneraleSetting::first();

    $defaultTitle = 'Navsons | Fresh Fruits, Vegetables, Meat and Grocery Delivery';
    $defaultDescription = 'Order fresh fruits, vegetables, meat, seafood, dairy products and daily grocery essentials online from Navsons with fast home delivery in Islamabad, Rawalpindi and surrounding areas.';

    $title = $generaleSetting?->title ?: $defaultTitle;
    $description = $defaultDescription;
    $favicon = $generaleSetting?->favicon ?? asset('assets/favicon.png');
    $logo = $generaleSetting?->logo ?? asset('assets/logo.png');
    $canonicalUrl = url('/');
@endphp
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#0d2d6c">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="base-url" content="{{ url('/') }}">
    <meta name="app-url" content="{{ url('/') }}">

    <title>{{ $title }}</title>
    <meta name="description" content="{{ $description }}" />
    <meta name="keywords" content="Navsons, Navsons Islamabad, Navsons Pakistan, Navsons online, Navsons delivery, fresh fruits Islamabad, fresh vegetables Islamabad, fresh meat Islamabad, halal meat Islamabad, online grocery Islamabad, grocery delivery Islamabad, fresh food delivery Islamabad, buy fresh fruits online Islamabad, buy fresh meat online Pakistan, organic food Islamabad, fresh fruits home delivery Islamabad, same day grocery delivery Islamabad, hormone free meat Islamabad, farm fresh vegetables Islamabad, grocery delivery DHA, fresh fruits Bahria Town Islamabad, online grocery Pakistan, fresh meat delivery Rawalpindi, grocery shopping Islamabad online, organic fruits Pakistan, premium meat Islamabad, fresh produce delivery Pakistan, quality groceries Islamabad" />
    <meta name="robots" content="index, follow" />
    <link rel="canonical" href="{{ $canonicalUrl }}" />

    <!-- Open Graph -->
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="Navsons" />
    <meta property="og:url" content="{{ $canonicalUrl }}" />
    <meta property="og:title" content="{{ $title }}" />
    <meta property="og:description" content="{{ $description }}" />
    <meta property="og:image" content="{{ $logo }}" />

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="{{ $title }}" />
    <meta name="twitter:description" content="{{ $description }}" />
    <meta name="twitter:image" content="{{ $logo }}" />

    <link rel="shortcut icon" href="{{ $favicon }}" type="image/x-icon">

    <script type="application/ld+json">
        {!! json_encode([
            '@context' => 'https://schema.org',
            '@type' => 'GroceryStore',
            'name' => 'Navsons',
            'url' => $canonicalUrl,
            'logo' => $logo,
            'image' => $logo,
            'description' => $description,
        ]) !!}
    </script>

    @vite('resources/css/app.css')
</head>

<body>
    <div id="app"></div>

    @vite('resources/js/app.js')
</body>

</html>
