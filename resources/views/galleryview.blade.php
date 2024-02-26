<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gallery|view</title>
    {{-- online bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <link rel="stylesheet" href="assets/css/gallery_styles.css" type="text/css">
    <link rel="stylesheet" href="assets/css/lightbox.css" type="text/css">
</head>
<body>
    
   <div class="container">
      <br>
      <a href="/displayevent">Back to events</a>
      <br><br>
      @foreach ($names as $name )    
      <h2>{{ $name->title }}</h2>
      @endforeach

  <div class="containner">
    <div class="gallery">

        {{-- we will use a foreach here  --}}
        @foreach ($events as $event) 

        <a href="images/events/{{$event->photo_url}}" data-lightbox="models" data-title="{{$event->photo_url}}">
           <img src="images/events/{{$event->photo_url}}" alt="">
        </a> 

        @endforeach

    </div>
</div>
</div>
<script src="assets/js/lightbox-plus-jquery.js"></script>
</body>
</html>