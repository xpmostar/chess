<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            
            Edit Category

        </h2>
    </x-slot>

    <div class="py-12">
        
    <div class="container">
        <div class="row">

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Tag</div>

                <div class="card-body">

                <form action="{{ url('tag/update/' . $tags->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                      <label for="tag">Update Tag Name</label>
                      <input name="tag_name" type="text" class="form-control" id="tag" aria-describedby="emailHelp" placeholder="Enter email" value="{{ $tags->tag_name }}">

                    </div>
                    <button type="submit" class="btn btn-primary">Edit Tag </button>
                  </form>
                  
                </div>

            </div>
        </div>

        </div>
    </div>

    </div>
</x-app-layout>
