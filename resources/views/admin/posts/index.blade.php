{{-- <html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Posts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>
<body>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html> --}}

@extends('layouts.admin')

@section('title', 'Posts Page')

@section('content')

<div class="content"><!-- For Components documentaion -->

    <a href="{{ route('admin.posts.create') }}" class="btn btn-info btn-sm text-white">New Post</a>

    <!-- Products Inventory -->
    <div class="card card-default">
      <div class="card-header">
        <h2>Post Page</h2>


      </div>
      <div class="card-body">

        @if(session('alert-success'))
            <div class="alert alert-success">{{ session()->get('alert-success') }}</div>
        @endif

        @if( count($posts) > 0)

            <table id="productsTable" class="table" style="width:100%">
                <thead>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                    @foreach($posts as $serialNo => $post)
                    <tr>
                        <td>
                            <img src="{{ asset('storage/uploads/images/'. $post->image) }}" style="width: 70px;">
                        </td>

                        @php
                            $firstLine = substr($post->title, 0, 7);
                            $secondLine = substr($post->title, 7, 12);
                            $thirdLine = substr($post->title, 12);
                        @endphp

                        <td>{{ $firstLine }} <br> {{ $secondLine }} <br> {{ $thirdLine }} </td>
                        <td>{{ $post->category }}</td>
                        <td>{{ Str::limit($post->description, 10) }}</td>

                        <td style="display: flex">
                            <a href="{{ route('admin.posts.show', $post->id) }}" class="btn btn-info btn-sm text-white">Show</a> &nbsp;
                            <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-primary btn-sm text-white">Edit</a> &nbsp;

                            <form class="post-delete-form" method="post" action="{{ route('admin.posts.destroy', $post->id) }}">
                                @csrf
                                @method('DELETE')
                                <button class="delBtn btn btn-danger btn-sm">Delete</button>
                            </form>

                        </td>

                        {{-- <td>{{ Str::limit($post->description, 10, '***') }}</td> --}}

                        {{-- https://laravel.com/docs/10.x/strings#method-str --}}

                    </tr>
                    @endforeach
                </tbody>
            </table>

        @else
            <h3 class="text-danger text-center">No post found.</h3>
        @endif

        <div>
            {{ $posts->links() }}
        </div>


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

                    $('.post-delete-form').submit();

                }
            });


        })

    });
</script>
@endsection
