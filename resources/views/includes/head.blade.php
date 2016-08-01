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

<link href="https://fonts.googleapis.com/css?family=Ubuntu:400,700&amp;subset=latin,cyrillic-ext" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=PT+Sans">
<link rel="profile" href="http://gmpg.org/xfn/11" />

<link rel="icon" href="/favicon.png">
<link rel="icon" href="/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">

<link href="{{ elixir('css/all.css') }}" rel="stylesheet">