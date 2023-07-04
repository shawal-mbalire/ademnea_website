
<!DOCTYPE html>
   <html lang="en">
   <head>
       <meta charset="UTF-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
   
        <title>AdeMNEA</title>
        @include('layouts.links')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   </head>
   <body>
   
      @include('layouts.navbar')
      @include('layouts.sidebar')
   
   <!-- Main Content -->
   <div class="p-4 sm:ml-64 bg-white mt-5">
      @yield('content')
   </div>
   
   
   <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.6/flowbite.min.js"></script>
   
   @include('layouts.scripts')

    @yield("page_scripts")
       
   </body>
   </html>

