<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/js/app.js')
</head>

<body>
    
</body>
</html>
<section class="container">
    <div class="row">
        <div class="" style="">
            <img src="{{ $product->thumb }}" class="card-img-top"  style=" width: 10rem;" alt="...">
            <div class="card-body">
              <h5 class="card-title">{{ $product->title }}</h5>
              <h6>{{ $product->series }}</h6>
              <span>{{ $product->type }} </span>
              <span>{{ $product->price }} </span>
              <p class="">{{ $product->description }}</p>
            </div>
        </div>
    </div>
</section>