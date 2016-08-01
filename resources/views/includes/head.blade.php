<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{{ $seo['title'] or 'Ttile' }}</title>
<meta name="description" content="{{ $seo['description'] or '' }}" />
<meta name="keywords" content="{{ $seo['keywords'] or '' }}" />
<meta name="csrf-token" content="{{ csrf_token() }}"/>
@if(!empty($seo['canonical']))
    <link rel="canonical" href="{{ $seo['canonical'] }}" />
@endif

<link rel="icon" href="/favicon.png">
<link rel="icon" href="/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">


<link rel="stylesheet" type="text/css" href="/owl/owl-carousel.css">
<link rel="stylesheet" type="text/css" href="/owl/owl-theme.css">
<link rel="stylesheet" type="text/css" href="/css/animate.css">
<link rel="stylesheet" type="text/css" href="/css/style.css">


