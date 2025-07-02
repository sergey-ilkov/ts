<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>{{ __('seo.' . $page . '.title') }}</title>
<meta name="description" content="{{ __('seo.' . $page . '.desc') }}">

<meta name="image" content="{{ asset('favicon-32x32.png') }}">
<meta property="og:type" content="website">
<meta property="og:title" content="{{ __('seo.' . $page . '.title') }}">
<meta property="og:description" content="{{ __('seo.' . $page . '.desc') }}">
<meta property="og:image" content="{{ asset('favicon-32x32.png') }}">
<meta property="og:url" content="{{ route($page) }}">
<meta property="og:site_name" content="{{ __('seo.' . $page . '.title') }}">


<meta name="msapplication-TileColor" content="#fff">
<meta name="msapplication-TileImage" content="{{ asset('ms-icon-144x144.png"') }}">
<meta name="theme-color" content="#171717">

<meta name="application-name" content="{{ __('seo.' . $page . '.title') }}">

<link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
<link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-icon-180x180.png') }}">

{{-- <link rel="manifest" href="{{ asset('manifest.json') }}"> --}}

{{-- <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "WebSite",
        "name": {{ __('seo.' . $page . '.title') }},     
    }
</script> --}}






