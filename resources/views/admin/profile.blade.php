@extends('layouts.admin')

@section('title', 'Profile Page')

@section('content')
<div class="content"><!-- Card Profile -->


    <div class="row">

      <div class="col-xl-12">
        <!-- Account Settings -->
        <div class="card card-default">
          <div class="card-header">
            <h2 class="mb-5">Account Settings</h2>

          </div>

          <div class="card-body">

            <form method="post" action="{{ route('admin.profile.update') }}">
            @csrf

              <div class="row mb-2">

                <div class="col-lg-6">
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" id="firstName" placeholder="Enter name" value="{{ $user->name }}">
                  </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" value="{{ $user->email }}">
                    </div>
                </div>

              </div>

              <div class="form-group mb-4">
                <label>Old password</label>
                <input type="password" name="old_password" class="form-control" placeholder="*******">
              </div>

              <div class="form-group mb-4">
                <label for="newPassword">New password</label>
                <input type="password" name="password" class="form-control" id="newPassword" placeholder="*******">
              </div>

              <div class="form-group mb-4">
                <label for="conPassword">Confirm password</label>
                <input type="password" name="password_confirmation" class="form-control" id="conPassword" placeholder="*******">
              </div>

              <div class="d-flex justify-content-end mt-6">
                <button type="submit" class="btn btn-primary mb-2 btn-pill">Update Profile</button>
              </div>

            </form>
          </div>
        </div>




      </div>

    </div>
    </div>

            </div>

              <!-- Footer -->
              <footer class="footer mt-auto">
                <div class="copyright bg-white">
                  <p>
                    &copy; <span id="copy-year"></span> Copyright Mono Dashboard Bootstrap Template by <a class="text-primary" href="http://www.iamabdus.com/" target="_blank" >Abdus</a>.
                  </p>
                </div>
                <script>
                    var d = new Date();
                    var year = d.getFullYear();
                    document.getElementById("copy-year").innerHTML = year;
                </script>
              </footer>

          </div>
        </div>

                        <!-- Card Offcanvas -->
                        <div class="card card-offcanvas" id="contact-off" >
                          <div class="card-header">
                            <h2>Contacts</h2>
                            <a href="#" class="btn btn-primary btn-pill px-4">Add New</a>
                          </div>
                          <div class="card-body">

                            <div class="mb-4">
                              <input type="text" class="form-control form-control-lg form-control-secondary rounded-0" placeholder="Search contacts...">
                            </div>

                            <div class="media media-sm">
                              <div class="media-sm-wrapper">
                                <a href="user-profile.html">
                                  <img src="images/user/user-sm-01.jpg" alt="User Image">
                                  <span class="active bg-primary"></span>
                                </a>
                              </div>
                              <div class="media-body">
                                <a href="user-profile.html">
                                  <span class="title">Selena Wagner</span>
                                  <span class="discribe">Designer</span>
                                </a>
                              </div>
                            </div>

                            <div class="media media-sm">
                              <div class="media-sm-wrapper">
                                <a href="user-profile.html">
                                  <img src="images/user/user-sm-02.jpg" alt="User Image">
                                  <span class="active bg-primary"></span>
                                </a>
                              </div>
                              <div class="media-body">
                                <a href="user-profile.html">
                                  <span class="title">Walter Reuter</span>
                                  <span>Developer</span>
                                </a>
                              </div>
                            </div>

                            <div class="media media-sm">
                              <div class="media-sm-wrapper">
                                <a href="user-profile.html">
                                  <img src="images/user/user-sm-03.jpg" alt="User Image">
                                </a>
                              </div>
                              <div class="media-body">
                                <a href="user-profile.html">
                                  <span class="title">Larissa Gebhardt</span>
                                  <span>Cyber Punk</span>
                                </a>
                              </div>
                            </div>

                            <div class="media media-sm">
                              <div class="media-sm-wrapper">
                                <a href="user-profile.html">
                                  <img src="images/user/user-sm-04.jpg" alt="User Image">
                                </a>

                              </div>
                              <div class="media-body">
                                <a href="user-profile.html">
                                  <span class="title">Albrecht Straub</span>
                                  <span>Photographer</span>
                                </a>
                              </div>
                            </div>

                            <div class="media media-sm">
                              <div class="media-sm-wrapper">
                                <a href="user-profile.html">
                                  <img src="images/user/user-sm-05.jpg" alt="User Image">
                                  <span class="active bg-danger"></span>
                                </a>
                              </div>
                              <div class="media-body">
                                <a href="user-profile.html">
                                  <span class="title">Leopold Ebert</span>
                                  <span>Fashion Designer</span>
                                </a>
                              </div>
                            </div>

                            <div class="media media-sm">
                              <div class="media-sm-wrapper">
                                <a href="user-profile.html">
                                  <img src="images/user/user-sm-06.jpg" alt="User Image">
                                  <span class="active bg-primary"></span>
                                </a>
                              </div>
                              <div class="media-body">
                                <a href="user-profile.html">
                                  <span class="title">Selena Wagner</span>
                                  <span>Photographer</span>
                                </a>
                              </div>
                            </div>

                          </div>
@endsection
