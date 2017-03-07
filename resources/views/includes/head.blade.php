<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{{ $seo['title'] or 'ЖК София' }}</title>
<meta name="description" content="{{ $seo['description'] or '' }}" />
<meta name="keywords" content="{{ $seo['keywords'] or '' }}" />
<meta name="csrf-token" content="{{ csrf_token() }}"/>
@if(!empty($seo['canonical']))
<link rel="canonical" href="{{ $seo['canonical'] }}" />
@else
<link rel="canonical" href="{{ Request::url() }}" />
@endif

@include('includes.head-pages')

<link rel="icon" href="/favicon.png">
<link rel="icon" href="/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">

<link href="{{ elixir('css/all.css') }}" rel="stylesheet">

<script>
    window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
    ]); ?>
</script>

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-5Q4STN');</script>
<!-- End Google Tag Manager -->