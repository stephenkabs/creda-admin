<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Users</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="/assets/images/favicon.png">

    <!-- Responsive Table css -->
    <link href="/assets/libs/admin-resources/rwd-table/rwd-table.min.css" rel="stylesheet" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />

    <!-- Icons Css -->
    <link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />


</head>

<body style="background: radial-gradient(circle, rgb(13, 64, 84) 30%, rgb(6, 24, 57) 100%);"  data-sidebar="dark">
    @include('toast.success_toast')
    <div class="modal fade" id="statusModal" tabindex="-1" aria-labelledby="statusModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="statusForm" method="POST" action="">
                    @csrf
                    @method('PATCH')
                    <div class="modal-header">
                        <h5 class="modal-title" id="statusModalLabel">Change User Status</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to <span id="statusAction"></span> the status of <strong id="userName"></strong>?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Yes, <span id="statusActionConfirm"></span></button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="deleteForm" method="POST" action="">
                    @csrf
                    @method('DELETE')
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Delete User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete this user?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Yes, Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@include('loader.loader')

<!-- Begin page -->
<div id="layout-wrapper">

@include('includes.header')

@include('includes.sidebar')

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">
                <div class="row">

                    <!-- Copy and Paste this section for more items -->
                    <div class="col-lg-4 col-md-6 mb-4">
                        <a href="/user/create" style="text-decoration: none;">
                            <div class="d-flex align-items-center p-3"
                                style="background-color: white; border: 1px solid #ccc; border-radius: 10px;">
                                <div class="icon-container me-3"
                                    style="width: 50px; height: 50px; display: flex; justify-content: center; align-items: center; background-color: #f5f5f5; border-radius: 5px;">
                                    <i class="dripicons-plus" style="font-size: 24px; color: #555;"></i>
                                </div>
                                <div>
                                    <h6 class="mb-0">Add User</h6>
                                    <p class="mb-0 text-muted">This is the Settings section for user</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- Repeatable Icon Section -->
                    <div class="col-lg-4 col-md-6 mb-4">
                        <a href="/windows/due_subscriptions" style="text-decoration: none;">
                            <div class="d-flex align-items-center p-3"
                                style="background-color: white; border: 1px solid #ccc; border-radius: 10px; cursor: pointer;">
                                <div class="icon-container me-3"
                                    style="width: 50px; height: 50px; display: flex; justify-content: center; align-items: center; background-color: #f5f5f5; border-radius: 5px;">
                                    <i class="ion ion-md-funnel" style="font-size: 24px; color: #555;"></i>
                                </div>
                                <div>
                                    <h6 class="mb-0">Due Mobile Transfers Users</h6>
                                    <p class="mb-0 text-muted">Navigate Due Subscribers Users</p>
                                </div>
                            </div>
                        </a>
                    </div>




                    <!-- Add more items as needed -->
                    <div class="col-lg-4 col-md-6 mb-4">
                        <a href="/windows/bank_payments" style="text-decoration: none;">
                            <div class="d-flex align-items-center p-3"
                                style="background-color: white; border: 1px solid #ccc; border-radius: 10px;">
                                <div class="icon-container me-3"
                                    style="width: 50px; height: 50px; display: flex; justify-content: center; align-items: center; background-color: #f5f5f5; border-radius: 5px;">
                                    <i class="ion ion-md-business" style="font-size: 24px; color: #555;"></i>
                                </div>
                                <div>
                                    <h6 class="mb-0">Due User Paid on Stripe</h6>
                                    <p class="mb-0 text-muted">Manage Subscribers paid via Stripe</p>
                                </div>
                            </div>
                        </a>
                    </div>








                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">





                                {{-- <h4 class="card-title"><a class="btn btn-info btn-sm waves-effect waves-light" href="/role"><i class="dripicons-arrow-thin-left"></i></a> <a class="btn btn-info btn-sm waves-effect waves-light" href="/user/create"><i class="dripicons-plus"></i></a></h4> --}}

{{-- @if ( session('status'))

<div class="alert alert-success">{{ session('status') }}</div>

@endif --}}

<div >
    <div >
        <!-- Search input field -->
        <div class="mb-3">
            <input type="text" id="search-input" class="form-control" placeholder="Search by Name, Country, or Role" />
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th data-priority="1">Names</th>
                    <th data-priority="1">Country/City</th>
                    <th data-priority="1">Roles</th>
                    <th data-priority="6">Action</th>
                </tr>
            </thead>
            <tbody id="table-body">
                @foreach ($users as $user)
                    <tr>
                        <td>
                            {{ $user->name }}<br>
                            <span style="font-size: 11px; color:rgb(112, 112, 112);">Email: {{ $user->email }}</span>
                        </td>



                        <td>
                            {{ $user->country_id ?? 'No Country' }}<br>
                            <span style="font-size: 11px; color:rgb(112, 112, 112);">City: {{ $user->city }}</span>
                        </td>

                        <td>
                            @if (!empty($user->getRoleNames()))
                                @foreach ($user->getRoleNames() as $rolename)
                                    <a class="btn btn-info btn-sm waves-effect">{{ $rolename }}</a>
                                @endforeach
                            @endif
                        </td>

                        <td>
                            <!-- Edit Button -->
                            <a href="{{ route('user.edit', $user->slug) }}" class="btn btn-primary  waves-effect">
                                <i class="dripicons-document-edit"></i>
                            </a>

                            <!-- Show Button -->
                            <a href="{{ route('user.show', $user->slug) }}" class="btn btn-secondary  waves-effect">
                                <i class="dripicons-preview"></i>
                            </a>

                            <button type="button"
                            class="btn btn-{{ $user->active ? 'danger' : 'success' }} waves-effect waves-light"
                            data-bs-toggle="modal"
                            data-bs-target="#statusModal"
                            data-user-name="{{ $user->name }}"
                            data-user-slug="{{ $user->slug }}"
                            data-active="{{ $user->active }}">
                        <i class="dripicons-{{ $user->active ? 'ban' : 'checkmark' }}"></i>
                        {{ $user->active ? 'Deactivate' : 'Activate' }}
                    </button>



                    <button type="button"
                    class="btn btn-danger  waves-effect"
                    data-bs-toggle="modal"
                    data-bs-target="#deleteModal"
                    data-route="{{ route('user.destroy', $user->slug) }}">
                <i class="dripicons-trash"></i>
            </button>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>



        <!-- Status Modal -->
        <div class="modal fade" id="statusModal" tabindex="-1" aria-labelledby="statusModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form id="statusForm" method="POST" action="">
                        @csrf
                        @method('PATCH')
                        <div class="modal-header">
                            <h5 class="modal-title" id="statusModalLabel">Change User Status</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure you want to <span id="statusAction"></span> the status of <strong id="userName"></strong>?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Yes, <span id="statusActionConfirm"></span></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- <script>
            // Populate modal with user data
            const statusModal = document.getElementById('statusModal');
            statusModal.addEventListener('show.bs.modal', function (event) {
                const button = event.relatedTarget;
                const userName = button.getAttribute('data-user-name');
                const userId = button.getAttribute('data-user-id');
                const isActive = button.getAttribute('data-active') == '1';

                const actionText = isActive ? 'deactivate' : 'activate';

                // Update modal content
                document.getElementById('userName').textContent = userName;
                document.getElementById('statusAction').textContent = actionText;
                document.getElementById('statusActionConfirm').textContent = actionText;

                // Update form action
                const form = document.getElementById('statusForm');
                form.action = `/users/${userId}/status`;
            });
        </script> --}}

    </div>
</div>




<!-- Pagination Controls -->
<div id="pagination" class="text-center" style="margin-top: 20px;"></div>
<script>
document.addEventListener("DOMContentLoaded", function () {
    const rowsPerPage = 5; // Number of rows per page
    const searchInput = document.getElementById("search-input"); // Search input field
    const tableBody = document.getElementById("table-body");
    const pagination = document.getElementById("pagination");

    const rows = Array.from(tableBody.getElementsByTagName("tr"));
    let filteredRows = rows;
    const totalRows = filteredRows.length;
    const totalPages = Math.ceil(totalRows / rowsPerPage);

    // Function to render the table rows for the selected page
    function renderTable(page) {
        tableBody.innerHTML = ""; // Clear the table body
        const start = (page - 1) * rowsPerPage;
        const end = start + rowsPerPage;

        // Append the relevant rows for the page
        filteredRows.slice(start, end).forEach(row => tableBody.appendChild(row));
    }

    // Function to render pagination controls
    function renderPagination() {
        pagination.innerHTML = ""; // Clear the pagination container

        const totalFilteredPages = Math.ceil(filteredRows.length / rowsPerPage);

        for (let i = 1; i <= totalFilteredPages; i++) {
            const button = document.createElement("button");
            button.textContent = i;
            button.className = "btn btn-sm btn-info mx-1";
            button.addEventListener("click", () => {
                renderTable(i); // Render the selected page
                setActiveButton(i); // Set the active page button
            });

            if (i === 1) button.classList.add("active");
            pagination.appendChild(button);
        }
    }

    // Function to set the active page button
    function setActiveButton(page) {
        Array.from(pagination.getElementsByTagName("button")).forEach(btn => {
            btn.classList.remove("active");
        });
        pagination.getElementsByTagName("button")[page - 1].classList.add("active");
    }

    // Real-time search function
    function filterTable() {
        const query = searchInput.value.toLowerCase();
        filteredRows = rows.filter(row => {
            const name = row.querySelector("td:nth-child(1)").textContent.toLowerCase();
            const country = row.querySelector("td:nth-child(2)").textContent.toLowerCase();
            const roles = row.querySelector("td:nth-child(3)").textContent.toLowerCase();
            return name.includes(query) || country.includes(query) || roles.includes(query);
        });

        // Re-render the table with filtered rows and update pagination
        renderTable(1);
        renderPagination();
    }

    // Event listener for the search input field
    searchInput.addEventListener("input", filterTable);

    // Initialize the table and pagination controls
    renderTable(1); // Render the first page
    renderPagination(); // Generate pagination buttons
});


</script>

                            </div>
                        </div>
                    </div>
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



<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

<!-- JAVASCRIPT -->
<script src="/assets/libs/jquery/jquery.min.js"></script>
<script src="/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/assets/libs/metismenu/metisMenu.min.js"></script>
<script src="/assets/libs/simplebar/simplebar.min.js"></script>
<script src="/assets/libs/node-waves/waves.min.js"></script>

<!-- Responsive Table js -->
<script src="/assets/libs/admin-resources/rwd-table/rwd-table.min.js"></script>

<!-- Init js -->
<script src="/assets/js/pages/table-responsive.init.js"></script>

{{-- <script>
    // Event listener for delete button click
    $('#deleteMinistryModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var route = button.data('route'); // Extract route from data-* attribute
        var modal = $(this);

        // Update the form action with the correct route
        modal.find('#deleteMinistryForm').attr('action', route);
    });
</script> --}}


<script>
    // Handle status modal population (Activate/Deactivate user)
    const statusModal = document.getElementById('statusModal');
    statusModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        const userName = button.getAttribute('data-user-name');
        const userSlug = button.getAttribute('data-user-slug');
        const isActive = button.getAttribute('data-active') == '1'; // Checking if active is true (1)

        // Determine action text for status change
        const actionText = isActive ? 'deactivate' : 'activate';

        // Set modal content dynamically
        document.getElementById('userName').textContent = userName;
        document.getElementById('statusAction').textContent = actionText;
        document.getElementById('statusActionConfirm').textContent = actionText;

        // Update the form's action URL with the user slug
        const form = document.getElementById('statusForm');
        form.action = `/user/${userSlug}/status`; // Form action URL for updating status
    });

    // Handle delete modal population
    const deleteModal = document.getElementById('deleteModal');
    deleteModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        const route = button.getAttribute('data-route'); // Route to delete the user

        // Set the delete form's action URL dynamically
        const form = document.getElementById('deleteForm');
        form.action = route; // Use the provided route for deletion
    });
</script>
@include('toast.error_success_js')



<script src="/assets/js/app.js"></script>

{{-- @if(Session::has('message'))

<script>
    swal("Hi!, {{$profileData->first_name}}", "{{ Session::get('message') }}",'success',{
        button:true,
        button:"Close",
    });


</script>

@endif --}}



</body>

</html>
