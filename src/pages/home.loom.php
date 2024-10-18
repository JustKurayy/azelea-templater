<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loom Templater test</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="@asset('css/style.css')">
</head>
<body>
    <h1>Items List</h1>
    @foreach ($items as $item)
        <p>Item: @yield('item ', $item)</p>
    @endforeach
    <h1>@lang('number')</h1>
    @for ($i = 0; $i < 5; $i++)
        <p>Number: @yield($i)</p>
    @endfor
    @if (true)
        <p>if = true</p>
    @endif
    @flashes('m')
    <div class="login-container flex justify-center items-center">
        @class('form')->show("flex flex-col")
    </div>
    <script src="@asset('js/script.js')"></script>
</body>

</html>