@extends('layouts.admin')

@section('title', 'Users Page')

@section('content')

<div class="content"><!-- For Components documentaion -->

    <a href="{{ route('admin.users.create') }}" class="btn btn-info btn-sm text-white mb-2">New User</a>

    <!-- Products Inventory -->
    <div class="card card-default">
      <div class="card-header">
        <h2>User Page</h2>


      </div>
      <div class="card-body">

        @if(session('alert-success'))
            <div class="alert alert-success">{{ session()->get('alert-success') }}</div>
        @endif

        @if( count($users) > 0)

            <table id="productsTable" class="table" style="width:100%">
                <thead>
                    <th>Name</th>
                    <th>email</th>
                    <th>Created At</th>
                    <th class="text-center">Actions</th>
                </thead>
                <tbody>
                    @foreach($users as $serialNo => $user)
                    <tr>

                        <td>{{ $user->name }} </td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at->diffForHumans() }}</td>

                        <td class="text-center">
                            <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-info btn-sm text-white">Show</a>
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary btn-sm text-white">Edit</a>

                            <form style="display:inline-block" class="user-delete-form" method="user" action="{{ route('admin.users.destroy', $user->id) }}">
                                @csrf
                                @method('DELETE')
                                <button class="delBtn btn btn-danger btn-sm">Delete</button>
                            </form>

                        </td>

                        {{-- <td>{{ Str::limit($user->description, 10, '***') }}</td> --}}

                        {{-- https://laravel.com/docs/10.x/strings#method-str --}}

                    </tr>
                    @endforeach
                </tbody>
            </table>

        @else
            <h3 class="text-danger text-center">No user found.</h3>
        @endif

        {{-- <div>
            {{ $users->links() }}
        </div> --}}


    </div>
    </div>

</div>

@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function() {

        $('.delBtn').click(function(e) {


            e.preventDefault();

            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                if (result.isConfirmed) {

                    $('.user-delete-form').submit();

                }
            });


        })

    });
</script>
@endsection
