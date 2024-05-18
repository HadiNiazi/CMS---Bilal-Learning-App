@extends('layouts.admin')

@section('title', 'Show Page')

@section('content')

<div class="content"><!-- For Components documentaion -->

    <a href="{{ route('admin.posts.index') }}" class="btn btn-info btn-sm text-white">Go Back</a>

    <!-- Products Inventory -->
    <div class="card card-default">
      <div class="card-header">
        <h2>Posts Details</h2>
      </div>

            <div class="card-body">


                <table>
                    <thead>
                       <tr>
                        <th>Title:</th>
                        <td>{{ $post->title }}</td>
                       </tr>

                       <tr>
                        <th>Category:</th>
                        <td>{{ $post->category }}</td>

                       </tr>

                       <tr>
                        <th>Description: &nbsp; </th>
                        <td>{{ $post->description }}</td>

                       </tr>

                    </thead>
                </table>


            </div>
        </div>
    </div>

@endsection
