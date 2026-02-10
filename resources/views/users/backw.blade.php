<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Edit</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="/assets/images/favicon.png">

    <!-- Bootstrap Css -->
    <link href="/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />

    <!-- Icons Css -->
    <link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />


</head>

<body style="background: radial-gradient(circle, rgb(13, 64, 84) 30%, rgb(6, 24, 57) 100%);"  data-sidebar="dark">
@include('includes.validation')
    @include('loader.loader')

<!-- Begin page -->
<div id="layout-wrapper">

    @include('includes.header')

    @include('includes.sidebar')

    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="card-title"><a class="btn btn-info waves-effect waves-light" href="/user"><i class="dripicons-arrow-thin-left"></i></a></h4><br>


                                <form class="row needs-validation" action="{{ route('user.update', $user->slug) }}" novalidate method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <!-- First Column -->
                                    <div class="col-md-6">
                                        <!-- Name -->
                                        <div class="mb-3 position-relative">
                                            <label class="form-label">Name</label>
                                            <input name="name" type="text" class="form-control" value="{{ $user->name }}" required />
                                        </div>

                                        <!-- Email -->
                                        <div class="mb-3 position-relative">
                                            <label class="form-label">Email</label>
                                            <input name="email" type="email" class="form-control" readonly value="{{ $user->email }}" required />
                                        </div>

                                        <!-- City -->
                                        <div class="mb-3 position-relative">
                                            <label class="form-label">City</label>
                                            <input name="city" type="text" class="form-control" value="{{ $user->city }}" required />
                                        </div>

                                        <!-- Country -->
                                        <div class="mb-3 position-relative">
                                            <label class="form-label">Country</label>
                                            <select name="country_id" class="form-select" required>
                                                <option>{{ $user->country_id }}</option>
                                                @foreach ($countries as $item)
                                                    <option>{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                                                            <!-- City -->
                                                                            <div class="mb-3 position-relative">
                                                                                <label class="form-label">Image</label>
                                                                                <input name="image" type="file" class="form-control" value="{{ $user->image }}"  />
                                                                            </div>


                                    </div>




                                    <!-- Second Column -->
                                    <div class="col-md-6">
                                        <!-- Roles -->
                                        <div class="mb-3 position-relative">
                                            <label class="form-label">Roles</label>
                                            <select name="roles[]" class="form-select" multiple>
                                                @foreach ($roles as $role)
                                                    <option value="{{ $role }}" {{ in_array($role, $userRoles) ? 'selected' : '' }}>
                                                        {{ $role }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <!-- Password Fields -->
                                        <div class="mb-3 position-relative">
                                            <label class="form-label">Old Password</label>
                                            <input name="old_password" type="password" class="form-control" placeholder="Enter Old Password" />
                                        </div>
                                        <div class="mb-3 position-relative">
                                            <label class="form-label">New Password</label>
                                            <input name="password" id="new-password" type="password" class="form-control" placeholder="Enter New Password" />
                                        </div>
                                        <div class="mb-3 position-relative">
                                            <label class="form-label">Confirm New Password</label>
                                            <input name="password_confirmation" id="confirm-password" type="password" class="form-control" placeholder="Confirm New Password" />
                                        </div>
                                    </div>


                                    <!-- Submit Buttons -->
                                    <div class="col-md-12 text-end">
                                        <button type="submit" class="btn btn-info waves-effect waves-light">Update Profile</button>
                                        <button type="reset" class="btn btn-secondary waves-effect ms-1">Cancel</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                    {{-- <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="card-title">This Month Expenses: ZMW </h4>
                                <p class="card-title-desc">{{ $profileData->last_name }}, the above amount is the expenses you have used so far.</p>



                            </div>
                        </div>
                    </div> --}}
                    <!-- end col -->
                    <!-- end col -->
                </div>
                <!-- end row -->

            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        @include('includes.taskbar')
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

<!-- Right Sidebar -->
<div class="right-bar">
    <div data-simplebar class="h-100">
        <div class="rightbar-title px-3 py-4">
            <a href="javascript:void(0);" class="right-bar-toggle float-end">
                <i class="mdi mdi-close noti-icon"></i>
            </a>
            <h5 class="m-0">Settings</h5>
        </div>

        <!-- Settings -->
        <hr class="mt-0" />
        <h6 class="text-center mb-0">Choose Demo</h6>

        <div class="p-4">
            <div class="mb-2">
                <img src="/assets/images/layouts/layout-1.jpg" class="img-fluid img-thumbnail" alt="">
            </div>
            <div class="form-check form-switch mb-3">
                <input type="checkbox" class="form-check-input theme-choice" id="light-mode-switch" checked />
                <label class="form-check-label" for="light-mode-switch">Light Mode</label>
            </div>

            <div class="mb-2">
                <img src="/assets/images/layouts/layout-2.jpg" class="img-fluid img-thumbnail" alt="">
            </div>
            <div class="form-check form-switch mb-3">
                <input type="checkbox" class="form-check-input theme-choice" id="dark-mode-switch" data-bsStyle="/assets/css/bootstrap-dark.min.css" data-appStyle="/assets/css/app-dark.min.css" />
                <label class="form-check-label" for="dark-mode-switch">Dark Mode</label>
            </div>

            <div class="mb-2">
                <img src="/assets/images/layouts/layout-3.jpg" class="img-fluid img-thumbnail" alt="">
            </div>
            <div class="form-check form-switch">
                <input type="checkbox" class="form-check-input theme-choice" id="rtl-mode-switch" data-appStyle="/assets/css/app-rtl.min.css" />
                <label class="form-check-label" for="rtl-mode-switch">RTL Mode</label>
            </div>

            <h6 class="mt-4">Select Custom Colors</h6>
            <div class="d-flex">

            <ul class="list-unstyled mb-0">
                <li class="form-check">
                    <input class="form-check-input theme-color" type="radio" name="theme-mode"
                    id="theme-default" value="default" onchange="document.documentElement.setAttribute('data-theme-mode', 'default')" checked>
                    <label class="form-check-label" for="theme-default">Default</label>
                </li>
                <li class="form-check">
                    <input class="form-check-input theme-color" type="radio" name="theme-mode"
                    id="theme-orange" value="orange" onchange="document.documentElement.setAttribute('data-theme-mode', 'orange')">
                    <label class="form-check-label" for="theme-orange">Orange</label>
                </li>
                <li class="form-check">
                    <input class="form-check-input theme-color" type="radio" name="theme-mode"
                    id="theme-teal" value="teal" onchange="document.documentElement.setAttribute('data-theme-mode', 'teal')">
                    <label class="form-check-label" for="theme-teal">Teal</label>
                </li>
            </ul>

            <ul class="list-unstyled mb-0 ms-4">
                <li class="form-check">
                    <input class="form-check-input theme-color" type="radio" name="theme-mode"
                    id="theme-purple" value="purple" onchange="document.documentElement.setAttribute('data-theme-mode', 'purple')">
                    <label class="form-check-label" for="theme-purple">Purple</label>
                </li>
                <li class="form-check">
                    <input class="form-check-input theme-color" type="radio" name="theme-mode"
                    id="theme-green" value="green" onchange="document.documentElement.setAttribute('data-theme-mode', 'green')">
                    <label class="form-check-label" for="theme-green">Green</label>
                </li>
                <li class="form-check">
                    <input class="form-check-input theme-color" type="radio" name="theme-mode"
                    id="theme-red" value="red" onchange="document.documentElement.setAttribute('data-theme-mode', 'red')">
                    <label class="form-check-label" for="theme-red">Red</label>
                </li>
            </ul>

            </div>
            <!-- <div class="form-check form-check-inline">
                <input class="form-check-input theme-color" type="radio" name="theme-mode"
                    id="theme-default" value="default" onchange="document.documentElement.setAttribute('data-theme-mode', 'default')" checked>
                <label class="form-check-label" for="theme-default">Default</label>
            </div> -->

            <!-- <div class="form-check form-check-inline">
                <input class="form-check-input theme-color" type="radio" name="theme-mode"
                    id="theme-teal" value="teal" onchange="document.documentElement.setAttribute('data-theme-mode', 'teal')">
                <label class="form-check-label" for="theme-teal">Teal</label>
            </div> -->

            <!-- <div class="form-check form-check-inline">
                <input class="form-check-input theme-color" type="radio" name="theme-mode"
                    id="theme-orange" value="orange" onchange="document.documentElement.setAttribute('data-theme-mode', 'orange')">
                <label class="form-check-label" for="theme-orange">Orange</label>
            </div> -->

            <!-- <div class="form-check form-check-inline">
                <input class="form-check-input theme-color" type="radio" name="theme-mode"
                    id="theme-purple" value="purple" onchange="document.documentElement.setAttribute('data-theme-mode', 'purple')">
                <label class="form-check-label" for="theme-purple">Purple</label>
            </div> -->

            <!-- <div class="form-check form-check-inline">
                <input class="form-check-input theme-color" type="radio" name="theme-mode"
                    id="theme-green" value="green" onchange="document.documentElement.setAttribute('data-theme-mode', 'green')">
                <label class="form-check-label" for="theme-green">Green</label>
            </div> -->

            <!-- <div class="form-check form-check-inline">
                <input class="form-check-input theme-color" type="radio" name="theme-mode"
                    id="theme-red" value="red" onchange="document.documentElement.setAttribute('data-theme-mode', 'red')">
                <label class="form-check-label" for="theme-red">Red</label>
            </div> -->
        </div>

    </div>
    <!-- end slimscroll-menu-->
</div>
<!-- /Right-bar -->

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

<!-- JAVASCRIPT -->
<script src="/assets/libs/jquery/jquery.min.js"></script>
<script src="/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/assets/libs/metismenu/metisMenu.min.js"></script>
<script src="/assets/libs/simplebar/simplebar.min.js"></script>
<script src="/assets/libs/node-waves/waves.min.js"></script>

<script src="/assets/libs/parsleyjs/parsley.min.js"></script>

<script src="/assets/js/pages/form-validation.init.js"></script>

<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js"></script>

{{-- <script>
    Dropzone.autoDiscover = false;
    const dropzone = new Dropzone("#dropzone", {
        url: "{{ route('user.store') }}", // Replace with your image upload route
        method: "POST",
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        },
        paramName: "image", // The name of the file parameter
        maxFiles: 1,
        acceptedFiles: "image/*",
        dictDefaultMessage: "Drag and drop an image here or click to upload",
        success: function (file, response) {
            console.log("Successfully uploaded:", response);
        },
        error: function (file, response) {
            console.error("Error uploading:", response);
        }
    });
</script> --}}



<script src="/assets/js/app.js"></script>
@include('includes.image_js')

</body>

</html>
