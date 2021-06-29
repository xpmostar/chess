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
            <div class="card">

                @if (session('success'))
                    
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>{{ session('success') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>   
                  </div>

                @endif

                <div class="card-header">All Categories</div>
        <table class="table">
            <thead>

              <tr>
                <th scope="col">SL NO</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Created At</th>
                <th scope="col">Updated At</th>
                <th scope="col">Role</th>
              </tr>
            </thead>
            <tbody>
                      
                    <tr>
                        <td> </td>
                    </tr>

            </tbody>
          </table>
        </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Add Category</div>

                <div class="card-body">

                <form action="{{ route('store.category') }}" method="POST">
                    @csrf
                    <div class="form-group">
                      <label for="exampleInputEmail1">Category</label>
                      <input name="category_name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">

                      @error('category_name')
                          <p> {{ $message  }} </p>
                      @enderror
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
