<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            
            Hi <b> {{ Auth::user()->name }} </b> <br>

            Hey mate, you were created <b> {{ Auth::user()->created_at->diffForHumans() }}

            <div>
                Total Users: {{ count($users) }}
            </div>

        </h2>
    </x-slot>

    <div class="py-12">
        
    <div class="container">
        <div class="row">
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
                @foreach ($users as $user )
                      
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td>{{ ucfirst($user->name) }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>{{ $user->updated_at }}</td>
                        <td>{{ ucfirst($user->role) }}</td>
                    </tr>

                @endforeach
            </tbody>
          </table>
        </div>
    </div>

    </div>
</x-app-layout>
