<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
</head>
<body>

    <div class="container">

    <h1>Players</h1>

    <div class="container">
    <div class="row">

        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Ime</th>
                <th scope="col">Broj Pobjeda</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($players as $player)
                
            <tr>
                <th scope="row">{{ $player->id }}</th>
                <td>{{ $player->ime }}</td>
                <td>{{ $player->brojPobjeda }}</td>
            </tr>

            @endforeach
            </tbody>
        </table>

    </div>
    </div>

    <div class="row">

    <form class="form-inline" action="{{ route('store.player') }}" method="POST">
        @csrf
        <div class="form-group">
          <label for="name">Ime</label>
          <input class="form-control" type="text" name="ime" placeholder="Ime" id='name'>
        </div>

        <div class="form-group">
            <label for="brojPobjeda">Broj Pobjeda</label>
            <input class="form-control" type="number" name="brojPobjeda" placeholder="Broj Pobjeda" id='brojPobjeda'>
          </div>
        
        <button type="submit" class="btn btn-primary mt-3">Submit</button>

      </div>
      </form>




    </div>
</body>
</html>