<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Add new Word!</title>

        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        @vite(['resources/js/addWord.js', 'resources/css/addWord.css'])
    </head>
    <body>
        <div id="addWord">
            <app></app>
        </div>
    </body>
</html>
