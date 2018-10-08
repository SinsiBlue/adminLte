<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{url('css/app.css')}}">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

</head>

<body class="bg-dark container">
    <div class="pt-5">
        <h1 class="text-light my-5 text-center">le blog du bogoss</h1>
        <p class="text-light text-justify">lorem ipsum dolor, sit amet consectetur adipisicing elit. Illum iste beatae
            natus modi vel laudantium sed totam cumque ad! Rerum dicta alias excepturi voluptas sed. Lorem ipsum dolor
            sit amet consectetur adipisicing elit. Nesciunt aut perspiciatis ex provident aperiam distinctio dolorum
            nobis, rem amet? Eius aperiam voluptatibus error repellat doloribus!</p>
        <div class="text-right pb-3">
            <a href="{{url('home')}}">login</a>
        </div>
    </div>

        @foreach ($posts->chunk(3) as $chunk)
        <div class="row mb-4">
            @foreach ($chunk as $post)

            <div class="col-4">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{$post->titre}}</h5>
                        <p class="card-text">{{$post->description}}</p>
                    </div>

                    <div class="card-body d-flex align-items-center mb-4" style="height: 18rem; overflow: hidden">
                    <img class="card-img-top" src="{{Storage::url($post->imageUrl)}}" alt="image {{$post->titre}}">
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endforeach
</body>

</html>
