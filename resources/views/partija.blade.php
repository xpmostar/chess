<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>
<body>

    <div class="container">

    <h1>Partije</h1>

    <div class="container">
    <div class="row">

        <div class="col-md-8">

            @if (session('success'))
            <div class="alert alert-warning" role="alert">
                {{ session('success') }}
            </div>
            @endif

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

                @php
                    $temp = 0;
                @endphp
                @foreach ($partije as $partija)

                @if ($partija->created_at->minute > $temp)
                    <tr>
                        <td>{{ $partija->created_at }}</td>
                    </tr>
                @endif
                @php
                    $temp = $partija->created_at->minute;
                @endphp

                <tr>
                    <th scope="row">{{ $partija->id }}</th>
                    <td><a href="{{ url('players/'. $partija->prviIgrac->id) }}"> {{ $partija->prviIgrac->ime ?? 'default' }} </a> </td>
                    <td><a href="{{ url('players/'. $partija->drugiIgrac->id) }}"> {{ $partija->drugiIgrac->ime ?? 'default'}} </a> </td>
                    <td>{{ $partija->pobjednik }}</td>
                    <td>{{ $partija->created_at }}</td>
                    
                    <td>
                    <form action="{{ url('partije/'.$partija->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger"> Delete </button>
                    </form>
                    </td>
                </tr>

                @endforeach
                </tbody>
            </table>

            <form class="form-inline" action="{{ route('store.partija') }}" method="POST">
                @csrf
                <h3 class="h3">Dodaj Partiju</h3>
                <div class="form-group mt-3">
                <select name='igrac1' class="form-select" aria-label="Default select example">
                    <option selected>Igrac 1</option>

                    @foreach ($data as $dat)
                        
                        <option value="{{ $dat->id }}">{{ $dat->ime }}</option>

                    @endforeach

                </select>
                </div>
                <div class="form-group mt-3">

                <select name='igrac2' class="form-select" aria-label="Default select example">
                    <option selected>Igrac 2</option>

                    @foreach ($data as $dat)
                        
                        <option value="{{ $dat->id }}">{{ $dat->ime }}</option>

                    @endforeach

                </select>
                </div>
                
                <div class="form-group mt-3">
                    <input class="form-control" type="number" name="pobjednik" placeholder="Pobjednik" id='pobjednik'>
                </div>

                <button type="submit" class="btn btn-primary mt-3">Submit</button>
        
            </form>

        </div>

        <div class="col-md-4">
            <table class="table table-dark text-center">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Ime</th>
                    <th scope="col">Pobjede</th>
                    <th scope="col">Procenat Pobjeda</th>
                    <th scope="col">Glava</th>
                  </tr>
                </thead>
                <tbody>
                @php ($i = 1)
                @foreach ($data as $dat)
                    
                  <tr>
                    <th scope="row">{{ $i++; }}</th>
                    <td>{{ $dat->ime }}</td>
                    <td>{{ $dat->brojPobjeda }}</td>
                    
                    @if ($dat->brojPobjeda != 0 && $dat->brojOdigranih != 0)
                    <td>{{ round(($dat->brojPobjeda / $dat->brojOdigranih)*100, 1) }} %</td>
                    @else <td>N/A</td>
                    @endif

                    <td> <img style="border-radius:50%;" width='50' height='50' src="{{ $dat->slikica }}" alt=""> </td>
                  
                </tr>

                @endforeach
                </tbody>
              </table>

              <form class="form-inline mt-5" action="{{ route('store.player') }}" method="POST">
                @csrf
                <h3 class="h3">Dodaj Igraca</h3>
                <div class="form-group">
                  <input class="form-control" type="text" name="ime" placeholder="Ime" id='name'>
                </div>

                <div class="form-group">
                    <input class="form-control" type="text" name="slikica" placeholder="Slikica" id='slikica'>
                  </div>
                <button type="submit" class="btn btn-primary mt-3">Submit</button>
        
              </div>
              </form>
        </div>

    

    </div>
    </div>

</body>
</html>