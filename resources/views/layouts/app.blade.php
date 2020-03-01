<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="{{asset('css/app.css')}}">
        <title>{{config('app.name')}}</title>

    </head>
    <body>
      @include('inc.navbar')
      @include('inc.banner')
      <div class="container">  
        @include('inc.messages')
        @yield('content')
      </div>
      <div class="container">
        @yield('listContent')
      </div>
    </body>
</html>
