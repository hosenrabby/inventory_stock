<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @include('layout.links')

</head>
<body>
    @include('layout.sidebar')

    @include('layout.header')


    <div class="col-md-12 text-center">
          @include('flash_message')
    </div>
    @yield('content')


    @include('layout.footer')
    @include('layout.script')

</body>
</html>
