@php
    $generaleSetting = App\Models\GeneraleSetting::first();

    $title = $generaleSetting?->title ?? config('app.name', 'Navsons | Online Grocery Shopping - Fresh Deliveries from Farm to Kitchen');
    $favicon = $generaleSetting?->favicon ?? asset('assets/favicon.png');
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
    <!-- description -->
     <!-- description should be for fresh fruits, vegetables, meat, seafood, dairy products and all grocery items. -->
    <meta name="description" content="Fresh fruits, Fresh vegetables, Fresh meat, Fresh seafood, Fresh dairy products and all grocery items." />
    <meta name="keywords" content="Navsons, Navsons Islamabad, Navsons Pakistan, Navsons online, Navsons delivery, fresh fruits Islamabad, fresh vegetables Islamabad, fresh meat Islamabad, halal meat Islamabad, online grocery Islamabad, grocery delivery Islamabad, fresh food delivery Islamabad, buy fresh fruits online Islamabad, buy fresh meat online Pakistan, organic food Islamabad, fresh fruits home delivery Islamabad, same day grocery delivery Islamabad, hormone free meat Islamabad, farm fresh vegetables Islamabad, grocery delivery DHA, fresh fruits Bahria Town Islamabad, online grocery Pakistan, fresh meat delivery Rawalpindi, grocery shopping Islamabad online, organic fruits Pakistan, premium meat Islamabad, fresh produce delivery Pakistan, quality groceries Islamabad" />

    <title>{{ $title }}</title>
    <link rel="shortcut icon" href="{{ $favicon }}" type="image/x-icon">

    @vite('resources/css/app.css')
</head>

<body>
    <div id="app"></div>

    @vite('resources/js/app.js')
</body>

</html>
