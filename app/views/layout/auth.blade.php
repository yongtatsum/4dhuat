<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <title>{{ Config::get('bidoboo.name') }}</title>
    <meta name="description" content="">
    <meta name="keywords" content="">    
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.ico') }}">
    
    <!-- Bootstrap -->
    {{ HTML::style('/assets/vendors/bootstrap/dist/css/bootstrap.min.css') }}
    <!-- Font Awesome -->
    {{ HTML::style('/assets/vendors/font-awesome/css/font-awesome.min.css') }}
    <!-- Custom Theme Style -->
    {{ HTML::style('/assets/css/admin/custom.min.css') }}
    

    @if( isset($styles['head']) )
      @foreach ($styles['head'] as $style)
        {{ HTML::style($style) }}
      @endforeach
    @endif  
  </head>

  <body class="login">

    {{ $body }}

    @if( isset($scripts['inline']) )
      @foreach ($scripts['inline'] as $script)
        {{ HTML::script($script) }}
      @endforeach
    @endif

    @if( isset($styles['inline']) )
      @foreach ($styles['inline'] as $style)
        {{ HTML::style($style) }}
      @endforeach
    @endif  

  </body>
</html>
