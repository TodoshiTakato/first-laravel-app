<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name', 'Laravel') }}</title>

<!-- Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
<link rel="dns-prefetch" href="//fonts.gstatic.com">

<!-- Styles -->
<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" >
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<script src="https://kit.fontawesome.com/e0d1ba7353.js" crossorigin="anonymous"></script>
<script src="{{ asset('js/app.js') }}" defer></script>
