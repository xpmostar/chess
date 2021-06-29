
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <title>Document</title>
</head>
<body>

    <div class="container text-center">
    <div class="row">

        <div class="col-md-4 offset-md-4">

        <h1> {{ $player->ime }} </h1>
        <img class="rounded-circle" src="{{ $player->slikica }} " alt="">  

        @foreach ($partija as $part)
            <p>{{ $part->id }}</p>
        @endforeach


        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Igrac 1</th>
                <th scope="col">Igrac 2</th>
                <th scope="col">Pobjednik</th>
                <th scope="col">Vrijeme Odigravanja</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($partija as $partija)
                
            <tr>
                <th scope="row">{{ $partija->id }}</th>
                <td>{{ $partija->prviIgrac->ime ?? 'default' }}</td>
                <td>{{ $partija->drugiIgrac->ime ?? 'default'}}</td>
                <td>{{ $partija->pobjednik }}</td>
                <td>{{ $partija->created_at }}</td>
            </tr>

            @endforeach
            </tbody>
        </table>

    </div>

    </div>
    </div>
    
</body>
</html>