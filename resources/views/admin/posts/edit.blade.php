@extends('layouts.admin')

@section('title', 'Edit Page')

@section('content')

<div class="content"><!-- For Components documentaion -->

    <a href="{{ route('admin.posts.index') }}" class="btn btn-info btn-sm text-white">Go Back</a>

    <!-- Products Inventory -->
    <div class="card card-default">
      <div class="card-header">
        <h2>Edit Post</h2>
      </div>

      <div class="card-body">


        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        @if(session('alert-success'))
            <div class="alert alert-success">{{ session()->get('alert-success') }}</div>
        @endif


        {{-- <form method="post" action="{{ url('posts/store') }}"> --}}

            <form method="post" action="{{ route('admin.posts.update', $post->id) }}">

            @csrf
            @method('PATCH')
            {{-- <input type="hidden" name="csrf-token" value="{{ csrf_token() }}"> --}}

            <div class="mb-3">
              <label>Title</label>
              <input type="text" name="title" class="form-control" value="{{ $post->title }}">
              @error('title')
                <span class="text-danger">{{ $message }}</span>
              @enderror

            </div>

            <div class="mb-3">
                <label>Category</label>
                {{-- <select name="category" class="form-control">
                    <option  value="" disabled selected>Choose Category</option>
                    <option @if($post->category == 'it') selected @endif value="it">IT</option>
                    <option @if($post->category == 'sport') selected @endif  value="sport">Sport</option>
                </select> --}}

                <select name="category" class="form-control">
                    <option  value="" disabled selected>Choose Category</option>
                    <option @selected($post->category == 'it') value="it">IT</option>
                    <option @selected($post->category == 'sport' ) value="sport">Sport</option>
                </select>

                @error('category')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

            </div>

            <div class="mb-3">
                <label>Description</label>
                <textarea name="description" class="form-control" cols="10" rows="3">{{ $post->description }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>


            </div>
        </div>
    </div>

@endsection
