<!doctype html>
<html ng-app="app" ng-strict-di>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">





    <link rel="apple-touch-icon" sizes="57x57" href="img/icons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="img/icons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="img/icons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="img/icons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="img/icons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="img/icons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="img/icons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="img/icons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="img/icons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="img/icons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href=img/icons"/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href=img/icons"/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href=img/icons"/favicon-16x16.png">
    <link rel="manifest" href="ing/icons/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="img/icons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">






    <link rel="stylesheet" href="{!! asset('css/vendor.css') !!}">
    <link rel="stylesheet" href="{!! asset('css/app.css') !!}">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    {{--<link href='https://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>--}}
    <title>    @{{ Page.title() }} </title>

    <!--[if lte IE 10]>
    <script type="text/javascript">document.location.href = '/unsupported-browser'</script>
    <![endif]-->
</head>
<body id="bootstrap-overrides">

    <div ui-view="header"></div>
    <div ui-view="main"></div>
    <div ui-view="footer"></div>

    <script src="{!! asset('js/vendor.js') !!}"></script>
    <script src="{!! asset('js/partials.js') !!}"></script>
    <script src="{!! asset('js/app.js') !!}"></script>

    {{--livereload--}}
    @if ( env('APP_ENV') === 'local' )
    <script type="text/javascript">
        document.write('<script src="'+ location.protocol + '//' + (location.host.split(':')[0] || 'localhost') +':35729/livereload.js?snipver=1" type="text/javascript"><\/script>')
    </script>
    @endif
</body>
</html>
