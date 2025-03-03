@extends('layouts.master')
@section('title') @lang('translation.list-js') @endsection
@section('css')
    <link href="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
<meta name="csrf-token" content="{{ csrf_token() }}">

@section('content')
    @component('components.breadcrumb')
    @slot('li_1') Tables @endslot
    @slot('title') Listjs @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Add, Edit & Remove</h4>
                </div>

                <div class="card-body">
                    <div class="listjs-table" id="customerList">
                        <div class="row g-4 mb-3">
                            <div class="col-sm-auto">
                                <button type="button" class="btn btn-success add-btn" id="create-btn" data-bs-toggle="modal"
                                    data-bs-target="#showModal">
                                    <i class="ri-add-line align-bottom me-1"></i> Add
                                </button>
                                <button class="btn btn-soft-danger" onclick="deleteMultiple()">
                                    <i class="ri-delete-bin-2-line"></i>
                                </button>
                            </div>
                            <div class="col-sm">
                                <div class="d-flex justify-content-sm-end">
                                    <div class="search-box ms-2">
                                        <input type="text" class="form-control search" placeholder="Search...">
                                        <i class="ri-search-line search-icon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive table-card mt-3 mb-1">
                            <table id="employeeTable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Date Joined</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody></tbody> <!-- No static data, loaded via AJAX -->
                            </table>


                            <div class="noresult" style="display: none">
                                <div class="text-center">
                                    <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                        colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px">
                                    </lord-icon>
                                    <h5 class="mt-2">Sorry! No Result Found</h5>
                                    <p class="text-muted mb-0">We've searched more than 150+ Orders but didn't find any
                                        matching records.</p>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <div class="pagination-wrap hstack gap-2">
                                <a class="page-item pagination-prev disabled" href="javascript:void(0);">Previous</a>
                                <ul class="pagination listjs-pagination mb-0"></ul>
                                <a class="page-item pagination-next" href="javascript:void(0);">Next</a>
                            </div>
                        </div>
                    </div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div><!-- end col -->
    </div><!-- end row -->


    <div class="row">
        <div class="col-xl-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Data Attributes + Custom</h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <p class="text-muted">Use data attributes and other custom attributes as keys</p>
                    <div id="users">
                        <div class="row mb-2">
                            <div class="col">
                                <div>
                                    <input class="search form-control" placeholder="Search" />
                                </div>
                            </div>
                            <div class="col-auto">
                                <button class="btn btn-light sort" data-sort="name">
                                    Sort by name
                                </button>
                            </div>
                        </div>

                        <div data-simplebar style="height: 242px;" class="mx-n3">
                            <ul class="list list-group list-group-flush mb-0">
                                <li class="list-group-item" data-id="1">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <h5 class="fs-13 mb-1"><a href="#" class="link name text-body">Jonny
                                                    Stromberg</a></h5>
                                            <p class="born timestamp text-muted mb-0" data-timestamp="12345">1986</p>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <div>
                                                <img class="image avatar-xs rounded-circle" alt=""
                                                    src="{{ URL::asset('build/images/users/avatar-1.jpg') }}">
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <!-- end list item -->
                                <li class="list-group-item" data-id="2">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <h5 class="fs-13 mb-1"><a href="#" class="link name text-body">Jonas
                                                    Arnklint</a></h5>
                                            <p class="born timestamp text-muted mb-0" data-timestamp="23456">1985</p>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <div>
                                                <img class="image avatar-xs rounded-circle" alt=""
                                                    src="{{ URL::asset('build/images/users/avatar-2.jpg') }}">
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <!-- end list item -->
                                <li class="list-group-item" data-id="3">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <h5 class="fs-13 mb-1"><a href="#" class="link name text-body">Martina Elm</a>
                                            </h5>
                                            <p class="born timestamp text-muted mb-0" data-timestamp="34567">1986</p>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <div>
                                                <img class="image avatar-xs rounded-circle" alt=""
                                                    src="{{ URL::asset('build/images/users/avatar-3.jpg') }}">
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <!-- end list item -->
                                <li class="list-group-item" data-id="4">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <h5 class="fs-13 mb-1"><a href="#" class="link name text-body">Gustaf
                                                    Lindqvist</a></h5>
                                            <p class="born timestamp text-muted mb-0" data-timestamp="45678">1983</p>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <div>
                                                <img class="image avatar-xs rounded-circle" alt=""
                                                    src="{{ URL::asset('build/images/users/avatar-4.jpg') }}">
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <!-- end list item -->
                            </ul>
                            <!-- end ul list -->
                        </div>
                    </div>
                </div><!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->

        <div class="col-xl-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Existing List</h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <p class="text-muted">Basic Example with Existing List</p>
                    <div id="contact-existing-list">
                        <div class="row mb-2">
                            <div class="col">
                                <div>
                                    <input class="search form-control" placeholder="Search" />
                                </div>
                            </div>
                            <div class="col-auto">
                                <button class="btn btn-light sort" data-sort="contact-name">
                                    Sort by name
                                </button>
                            </div>
                        </div>

                        <div data-simplebar style="height: 242px;" class="mx-n3">
                            <ul class="list list-group list-group-flush mb-0">
                                <li class="list-group-item" data-id="01">
                                    <div class="d-flex align-items-start">
                                        <div class="flex-shrink-0 me-3">
                                            <div>
                                                <img class="image avatar-xs rounded-circle" alt=""
                                                    src="{{ URL::asset('build/images/users/avatar-1.jpg') }}">
                                            </div>
                                        </div>

                                        <div class="flex-grow-1 overflow-hidden">
                                            <h5 class="contact-name fs-13 mb-1"><a href="#" class="link text-body">Jonny
                                                    Stromberg</a></h5>
                                            <p class="contact-born text-muted mb-0">New updates for ABC Theme</p>
                                        </div>

                                        <div class="flex-shrink-0 ms-2">
                                            <div class="fs-11 text-muted">06 min</div>
                                        </div>
                                    </div>
                                </li>
                                <!-- end list item -->
                                <li class="list-group-item" data-id="02">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0 me-3">
                                            <div>
                                                <img class="image avatar-xs rounded-circle" alt=""
                                                    src="{{ URL::asset('build/images/users/avatar-2.jpg') }}">
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 overflow-hidden">
                                            <h5 class="contact-name fs-13 mb-1"><a href="#" class="link text-body">Jonas
                                                    Arnklint</a></h5>
                                            <p class="contact-born text-muted mb-0">Bug Report - abc theme</p>
                                        </div>
                                        <div class="flex-shrink-0 ms-2">
                                            <div class="fs-11 text-muted">12 min</div>
                                        </div>
                                    </div>
                                </li>
                                <!-- end list item -->
                                <li class="list-group-item" data-id="03">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0 me-3">
                                            <div>
                                                <img class="image avatar-xs rounded-circle" alt=""
                                                    src="{{ URL::asset('build/images/users/avatar-3.jpg') }}">
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h5 class="contact-name fs-13 mb-1"><a href="#" class="link text-body">Martina
                                                    Elm</a></h5>
                                            <p class="contact-born text-muted mb-0">Nice to meet you</p>
                                        </div>
                                        <div class="flex-shrink-0 ms-2">
                                            <div class="fs-11 text-muted">28 min</div>
                                        </div>
                                    </div>
                                </li>
                                <!-- end list item -->
                                <li class="list-group-item" data-id="04">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0 me-3">
                                            <div>
                                                <img class="image avatar-xs rounded-circle" alt=""
                                                    src="{{ URL::asset('build/images/users/avatar-4.jpg') }}">
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h5 class="contact-name fs-13 mb-1"><a href="#" class="link text-body">Gustaf
                                                    Lindqvist</a></h5>
                                            <p class="contact-born text-muted mb-0">I've finished it! See you so</p>
                                        </div>
                                        <div class="flex-shrink-0 ms-2">
                                            <div class="fs-11 text-muted">01 hrs</div>
                                        </div>
                                    </div>
                                </li>
                                <!-- end list item -->
                            </ul>
                            <!-- end ul list -->
                        </div>
                    </div>
                </div><!-- end card -->
            </div>
            <!-- end col -->
        </div>
        <!-- end col -->

        <div class="col-xl-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Fuzzy Search</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <p class="text-muted">Example of how to use the fuzzy search plugin</p>
                    <div id="fuzzysearch-list">
                        <input type="text" class="fuzzy-search form-control mb-2" placeholder="Search" />

                        <div data-simplebar style="height: 242px;">
                            <ul class="list mb-0">
                                <li>
                                    <p class="name">Guybrush Threepwood</p>
                                </li>
                                <li>
                                    <p class="name">Elaine Marley</p>
                                </li>
                                <li>
                                    <p class="name">LeChuck</p>
                                </li>
                                <li>
                                    <p class="name">Stan</p>
                                </li>
                                <li>
                                    <p class="name">Voodoo Lady</p>
                                </li>
                                <li>
                                    <p class="name">Herman Toothrot</p>
                                </li>
                                <li>
                                    <p class="name">Meathook</p>
                                </li>
                                <li>
                                    <p class="name">Carla</p>
                                </li>
                                <li>
                                    <p class="name">Otis</p>
                                </li>
                                <li>
                                    <p class="name">Rapp Scallion</p>
                                </li>
                                <li>
                                    <p class="name">Rum Rogers Sr.</p>
                                </li>
                                <li>
                                    <p class="name">Men of Low Moral Fiber</p>
                                </li>
                                <li>
                                    <p class="name">Murray</p>
                                </li>
                                <li>
                                    <p class="name">Cannibals</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-xl-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Pagination</h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <p class="text-muted">Example of how to use the pagination plugin</p>

                    <div class="listjs-table" id="pagination-list">
                        <div class="mb-2">
                            <input class="search form-control" placeholder="Search" />
                        </div>

                        <div class="mx-n3">
                            <ul class="list list-group list-group-flush mb-0">
                                <li class="list-group-item">
                                    <div class="d-flex align-items-center pagi-list">
                                        <div class="flex-shrink-0 me-3">
                                            <div>
                                                <img class="image avatar-xs rounded-circle" alt=""
                                                    src="{{ URL::asset('build/images/users/avatar-1.jpg') }}">
                                            </div>
                                        </div>

                                        <div class="flex-grow-1 overflow-hidden">
                                            <h5 class="fs-13 mb-1"><a href="#" class="link text-body">Jonny Stromberg</a>
                                            </h5>
                                            <p class="born timestamp text-muted mb-0">Front end Developer</p>
                                        </div>

                                        <div class="flex-shrink-0 ms-2">
                                            <div>
                                                <button type="button" class="btn btn-sm btn-light"><i
                                                        class="ri-mail-line align-bottom"></i> Message</button>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <!-- end list item -->
                                <li class="list-group-item">
                                    <div class="d-flex align-items-center pagi-list">
                                        <div class="flex-shrink-0 me-3">
                                            <div>
                                                <img class="image avatar-xs rounded-circle" alt=""
                                                    src="{{ URL::asset('build/images/users/avatar-2.jpg') }}">
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 overflow-hidden">
                                            <h5 class="fs-13 mb-1"><a href="#" class="link text-body">Jonas Arnklint</a>
                                            </h5>
                                            <p class="born fs-12 timestamp text-muted mb-0">Backend Developer</p>
                                        </div>
                                        <div class="flex-shrink-0 ms-2">
                                            <div>
                                                <button type="button" class="btn btn-sm btn-light"><i
                                                        class="ri-mail-line align-bottom"></i> Message</button>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <!-- end list item -->
                                <li class="list-group-item">
                                    <div class="d-flex align-items-center pagi-list">
                                        <div class="flex-shrink-0 me-3">
                                            <div>
                                                <img class="image avatar-xs rounded-circle" alt=""
                                                    src="{{ URL::asset('build/images/users/avatar-3.jpg') }}">
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h5 class="fs-13 mb-1"><a href="#" class="link text-body">Martina Elm</a></h5>
                                            <p class="born fs-12 timestamp text-muted mb-0">UI/UX Designer</p>
                                        </div>
                                        <div class="flex-shrink-0 ms-2">
                                            <div>
                                                <button type="button" class="btn btn-sm btn-light"><i
                                                        class="ri-mail-line align-bottom"></i> Message</button>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <!-- end list item -->
                                <li class="list-group-item">
                                    <div class="d-flex align-items-center pagi-list">
                                        <div class="flex-shrink-0 me-3">
                                            <div>
                                                <img class="image avatar-xs rounded-circle" alt=""
                                                    src="{{ URL::asset('build/images/users/avatar-4.jpg') }}">
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h5 class="fs-13 mb-1"><a href="#" class="link text-body">Gustaf Lindqvist</a>
                                            </h5>
                                            <p class="born fs-12 timestamp text-muted mb-0">Full Stack Developer</p>
                                        </div>
                                        <div class="flex-shrink-0 ms-2">
                                            <div>
                                                <button type="button" class="btn btn-sm btn-light"><i
                                                        class="ri-mail-line align-bottom"></i> Message</button>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <!-- end list item -->
                                <li class="list-group-item">
                                    <div class="d-flex align-items-center pagi-list">
                                        <div class="flex-shrink-0 me-3">
                                            <div>
                                                <img class="image avatar-xs rounded-circle" alt=""
                                                    src="{{ URL::asset('build/images/users/avatar-1.jpg') }}">
                                            </div>
                                        </div>

                                        <div class="flex-grow-1 overflow-hidden">
                                            <h5 class="fs-13 mb-1"><a href="#" class="link text-body">Jonny Stromberg</a>
                                            </h5>
                                            <p class="born timestamp text-muted mb-0">Front end Developer</p>
                                        </div>

                                        <div class="flex-shrink-0 ms-2">
                                            <div>
                                                <button type="button" class="btn btn-sm btn-light"><i
                                                        class="ri-mail-line align-bottom"></i> Message</button>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <!-- end list item -->
                                <li class="list-group-item">
                                    <div class="d-flex align-items-center pagi-list">
                                        <div class="flex-shrink-0 me-3">
                                            <div>
                                                <img class="image avatar-xs rounded-circle" alt=""
                                                    src="{{ URL::asset('build/images/users/avatar-2.jpg') }}">
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 overflow-hidden">
                                            <h5 class="fs-13 mb-1"><a href="#" class="link text-body">Jonas Arnklint</a>
                                            </h5>
                                            <p class="born fs-12 timestamp text-muted mb-0">Backend Developer</p>
                                        </div>
                                        <div class="flex-shrink-0 ms-2">
                                            <div>
                                                <button type="button" class="btn btn-sm btn-light"><i
                                                        class="ri-mail-line align-bottom"></i> Message</button>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <!-- end list item -->
                            </ul>
                            <!-- end ul list -->

                            <div class="d-flex justify-content-center">
                                <div class="pagination-wrap hstack gap-2">
                                    <a class="page-item pagination-prev disabled" href="javascript:void(0);">
                                        Previous
                                    </a>
                                    <ul class="pagination listjs-pagination mb-0"></ul>
                                    <a class="page-item pagination-next" href="javascript:void(0);">
                                        Next
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div><!-- end card -->
            </div>
            <!-- end col -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->

    <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light p-3">
                    <h5 class="modal-title" id="exampleModalLabel">Add Employee</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        id="close-modal"></button>
                </div>
                <form id="employeeForm" class="needs-validation" novalidate enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="employee_id" id="employee_id">

                        <div class="mb-3">
                            <label for="name-field" class="form-label">Full Name</label>
                            <input type="text" name="name" id="name-field" class="form-control"
                                placeholder="Enter Full Name" required>
                            <div class="invalid-feedback">Please enter a full name.</div>
                        </div>

                        <div class="mb-3">
                            <label for="email-field" class="form-label">Email</label>
                            <input type="email" name="email" id="email-field" class="form-control" placeholder="Enter Email"
                                required>
                            <div class="invalid-feedback">Please enter a valid email.</div>
                        </div>

                        <div class="mb-3">
                            <label for="department-field" class="form-label">Department</label>
                            <input type="text" name="department" id="department-field" class="form-control"
                                placeholder="Enter Department" required>
                            <div class="invalid-feedback">Please enter a department.</div>
                        </div>

                        <div class="mb-3">
                            <label for="designation-field" class="form-label">Designation</label>
                            <input type="text" name="designation" id="designation-field" class="form-control"
                                placeholder="Enter Designation" required>
                            <div class="invalid-feedback">Please enter a designation.</div>
                        </div>

                        <div class="mb-3">
                            <label for="avatar-field" class="form-label">Avatar</label>
                            <input type="file" name="avatar" id="avatar-field" class="form-control" accept="image/*">
                            <div class="mt-2">
                                <img id="avatar-preview" src="#" alt="Avatar Preview" class="img-thumbnail d-none"
                                    width="100">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="status-field" class="form-label">Status</label>
                            <select class="form-control" name="status" id="status-field" required>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="hstack gap-2 justify-content-end">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success" id="save-btn">Save Employee</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade zoomIn" id="deleteRecordModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        id="btn-close"></button>
                </div>
                <div class="modal-body">
                    <div class="mt-2 text-center">
                        <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                            colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                        <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                            <h4>Are you Sure ?</h4>
                            <p class="text-muted mx-4 mb-0">Are you Sure You want to Remove this Record ?</p>
                        </div>
                    </div>
                    <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                        <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn w-sm btn-danger " id="delete-record">Yes, Delete It!</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end modal -->
@endsection
@section('script')

    <script src="{{ URL::asset('build/libs/prismjs/prism.js') }}"></script>
    <script src="{{ URL::asset('build/libs/list.js/list.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/list.pagination.js/list.pagination.min.js') }}"></script>

    <!-- listjs init -->
    <script src="{{ URL::asset('build/js/pages/listjs.init.js') }}"></script>

    <script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

    <script>

        $(document).ready(function () {
            $('#avatar-field').change(function () {
                let reader = new FileReader();
                reader.onload = function (e) {
                    $('#avatar-preview').attr('src', e.target.result).removeClass('d-none');
                };
                if (this.files[0]) {
                    reader.readAsDataURL(this.files[0]);
                }
            });
        });
       
        $(document).ready(function () {
            let employeeTable = $('#employeeTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('employees.getEmployees') }}",
                columns: [
                    { data: "id", name: "id" },
                    { data: "full_name", name: "full_name" },
                    { data: "email", name: "email" },
                    {
                        data: "joining_date",
                        name: "joining_date",
                        render: function (data) {
                            if (!data) return "N/A";
                            let date = new Date(data);
                            return date.toLocaleDateString("en-GB", {
                                day: "2-digit",
                                month: "short",
                                year: "numeric"
                            });
                        }
                    },
                    { data: "status", name: "status", orderable: false, searchable: false },
                    { data: "action", name: "action", orderable: false, searchable: false }
                ]
            });

    // Open Modal for Add Employee
    $('#showModal').on('show.bs.modal', function (event) {
        let button = $(event.relatedTarget); 
        let employeeId = button.data('id'); 

        if (employeeId) {
            // Edit Mode
            $.ajax({
                url: "{{ route('employees.edit', '') }}/" + employeeId,
                type: "GET",
                success: function (response) {
                    if (response.success) {
                        let employee = response.employee;
                        $('#employee_id').val(employee.id);
                        $('#name-field').val(employee.name);
                        $('#email-field').val(employee.email);
                        $('#department-field').val(employee.department);
                        $('#designation-field').val(employee.designation);
                        $('#status-field').val(employee.status);

                        if (employee.avatar) {
                            $('#avatar-preview').attr('src', employee.avatar).removeClass('d-none');
                        } else {
                            $('#avatar-preview').addClass('d-none');
                        }

                        $('#exampleModalLabel').text('Edit Employee');
                        $('#save-btn').text('Update Employee');
                    }
                }
            });
        } else {
            // Add Mode
            $('#employeeForm')[0].reset();
            $('#employee_id').val('');
            $('#avatar-preview').addClass('d-none');
            $('#exampleModalLabel').text('Add Employee');
            $('#save-btn').text('Save Employee');
        }
    });

    // Submit Form 
    $('#employeeForm').submit(function (event) {
        event.preventDefault();
        let form = this;
        let formData = new FormData(form);
        let employeeId = $('#employee_id').val();
        let url = employeeId ? "{{ route('employees.update', '') }}/" + employeeId : "{{ route('employees.store') }}";
        let method = employeeId ? "POST" : "POST";

        $.ajax({
            url: url,
            type: method,
            data: formData,
            processData: false,
            contentType: false,
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            beforeSend: function () {
                $('#save-btn').prop('disabled', true).html('<i class="fa fa-spinner fa-spin"></i> Saving...');
            },
            success: function (response) {
                if (response.success) {
                    $('#showModal').modal('hide');
                    employeeTable.ajax.reload();
                    Swal.fire("Success!", response.message, "success");
                } else {
                    Swal.fire("Error!", "Unexpected response!", "error");
                }
            },
            error: function (xhr) {
                let errorMessage = "Something went wrong!";
                if (xhr.responseJSON && xhr.responseJSON.errors) {
                    errorMessage = Object.values(xhr.responseJSON.errors).map(e => e[0]).join("\n");
                }
                Swal.fire("Error!", errorMessage, "error");
            },
            complete: function () {
                $('#save-btn').prop('disabled', false).html(employeeId ? 'Update Employee' : 'Save Employee');
            }
        });
    });

    // Open Delete Modal
    let deleteId = null;
    $(document).on("click", ".remove-item-btn", function () {
        deleteId = $(this).data("id");
        $("#deleteRecordModal").modal("show");
    });

    // Confirm Delete
    $("#delete-record").click(function () {
        if (deleteId) {
            $.ajax({
                url: "{{ route('employees.destroy', '') }}/" + deleteId,
                type: "DELETE",
                headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") },
                success: function (response) {
                    if (response.success) {
                        $("#deleteRecordModal").modal("hide");
                        employeeTable.ajax.reload();
                        Swal.fire("Deleted!", response.message, "success");
                    } else {
                        Swal.fire("Error!", response.message, "error");
                    }
                },
                error: function () {
                    Swal.fire("Error!", "Something went wrong!", "error");
                }
            });
        }
    });
});

    </script>


@endsection