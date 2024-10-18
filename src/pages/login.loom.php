<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="@asset('css/style.css')">
</head>
<body>
    <div class="login-container flex flex-col gap-2 justify-center items-center">
        @flashes('')
        @class('form')->show("flex flex-col")
    </div>
</body>
</html>
