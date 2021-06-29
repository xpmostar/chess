<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            
            All Category

        </h2>
    </x-slot>

    <div class="py-12">
        
    <div class="container">
        <div class="row">
            <div class="col-md-8">

            @if(session('success'))

            <b> {{ session('success') }} </b>

            @endif

            <div class="card">

                <div class="card-header">All Tags</div>
        <table class="table">
            <thead>

              <tr>
                <th scope="col">ID</th>
                <th scope="col">User</th>
                <th scope="col">Tag Name</th>
              </tr>
            </thead>
            <tbody>
                   @foreach ($tags as $tag)
                       
                    <tr>
                        <td> {{ $tag->id }} </td>
                        <td> {{ $tag->user->name }} </td>
                        <td> {{ $tag->tag_name }} </td>

                        <td>
                          <a href="{{ url('tag/edit/'.$tag->id) }}" class="btn btn-info">Edit</a>
                          <a href="" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>

                   @endforeach   

            </tbody>
          </table>

        </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Add Tag</div>

                <div class="card-body">

                <form action="{{ route('store.tag') }}" method="POST">
                    @csrf
                    <div class="form-group">
                      <label for="tag">Tag</label>
                      <input name="tag_name" type="text" class="form-control" id="tag" aria-describedby="emailHelp" placeholder="Enter email">

                    </div>
                    <button type="submit" class="btn btn-primary">Add Category </button>
                  </form>
                  
                </div>

            </div>
        </div>

        </div>
    </div>

    </div>
</x-app-layout>
