@extends('layouts.admin')

@section('title', 'Create Page')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
@endsection

@section('content')

<div class="content"><!-- For Components documentaion -->

    <a href="{{ route('admin.users.index') }}" class="btn btn-info btn-sm text-white mb-2">Go Back</a>

    <!-- Products Inventory -->
    <div class="card card-default">
      <div class="card-header">
        <h2>Create User</h2>
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


                {{-- <form method="user" action="{{ url('users/store') }}"> --}}

                    <form method="post" action="{{ route('admin.users.store') }}" enctype="multipart/form-data">

                    @csrf
                    {{-- <input type="hidden" name="csrf-token" value="{{ csrf_token() }}"> --}}

                    <div class="mb-3">
                      <label>Name</label>
                      <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Enter name">
                      @error('name')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>


                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" email="email" class="form-control" value="{{ old('email') }}" placeholder="Enter email">
                        @error('email')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <div class="input-group mb-3">
                            <input class="form-control password" name="password" id="password" class="block mt-1 w-full" type="password" name="password" placeholder="*******" required />
                            <span class="input-group-text togglePassword" id="">
                                <i data-feather="eye" style="cursor: pointer"></i>
                            </span>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Confirm Password</label>
                        <div class="input-group mb-3">
                            <input class="form-control password" name="password_confirmation" id="password" class="block mt-1 w-full" type="password" name="password" placeholder="*******" required />
                            <span class="input-group-text togglePassword" id="">
                                <i data-feather="eye" style="cursor: pointer"></i>
                            </span>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div>
    </div>

@endsection

@section('scripts')
<script>
     feather.replace({ 'aria-hidden': 'true' });

    $(".togglePassword").click(function (e) {
        e.preventDefault();
        var type = $(this).parent().parent().find(".password").attr("type");
        console.log(type);
        if(type == "password"){
            $("svg.feather.feather-eye").replaceWith(feather.icons["eye-off"].toSvg());
            $(this).parent().parent().find(".password").attr("type","text");
        }else if(type == "text"){
            $("svg.feather.feather-eye-off").replaceWith(feather.icons["eye"].toSvg());
            $(this).parent().parent().find(".password").attr("type","password");
        }
    });
</script>
@endsection
