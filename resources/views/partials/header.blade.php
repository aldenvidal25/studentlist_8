<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>{{ $title !== "" ? $title : 'Student System'}}</title>
   @vite('resources/css/app.css') 
   <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body  style="background-image: url('https://images.unsplash.com/photo-1524178232363-1fb2b075b655?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=1200&ixid=MnwxfDB8MXxyYW5kb218MHx8c3R1ZGVudHN8fHx8fHwxNjc1MTUxODk0&ixlib=rb-4.0.3&q=80&utm_campaign=api-credit&utm_medium=referral&utm_source=unsplash_source&w=1900')" class="bg-gray-600 min-h-screen pt-12 pb-6 px-2 bg-center bg-cover bg-no-repeat font-mono">

   <x-messages />
