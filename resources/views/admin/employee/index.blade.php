@extends('layouts.master')  {{-- Extend Velzon master layout --}}

@section('title', 'Manage Employees')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Employee Management</h4>
                    <button class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#addEmployeeModal">
                        <i class="bx bx-plus"></i> Add Employee
                    </button>
                </div>
                <div class="card-body">
                    <table id="employeeTable" class="table table-bordered dt-responsive nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Avatar</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Department</th>
                                <th>Designation</th>
                                <th>Joining Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Data will be loaded via AJAX --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Employee Add Modal -->
<div class="modal fade" id="addEmployeeModal" tabindex="-1" aria-labelledby="addEmployeeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addEmployeeModalLabel">Add Employee</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="addEmployeeForm">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="department" class="form-label">Department</label>
                        <input type="text" class="form-control" id="department" name="department" required>
                    </div>
                    <div class="mb-3">
                        <label for="designation" class="form-label">Designation</label>
                        <input type="text" class="form-control" id="designation" name="designation" required>
                    </div>
                    <div class="mb-3">
                        <label for="joining_date" class="form-label">Joining Date</label>
                        <input type="date" class="form-control" id="joining_date" name="joining_date" required>
                    </div>
                    <div class="mb-3">
                        <label for="avatar" class="form-label">Avatar</label>
                        <input type="file" class="form-control" id="avatar" name="avatar">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save Employee</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
$(document).ready(function () {
    // Initialize DataTable
    var table = $('#employeeTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('employees.index') }}",
        columns: [
            { data: 'id', name: 'id' },
            { 
                data: 'avatar', 
                name: 'avatar',
                render: function(data) {
                    return `<img src="/storage/avatars/${data}" width="40" class="rounded-circle">`;
                }
            },
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'department', name: 'department' },
            { data: 'designation', name: 'designation' },
            { data: 'joining_date', name: 'joining_date' },
            { 
                data: 'id',
                render: function(data) {
                    return `<button class="btn btn-sm btn-warning editEmployee" data-id="${data}">Edit</button>
                            <button class="btn btn-sm btn-danger deleteEmployee" data-id="${data}">Delete</button>`;
                }
            }
        ]
    });

    // Handle Employee Addition
    $('#addEmployeeForm').on('submit', function (e) {
        e.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            url: "{{ route('employees.store') }}",
            method: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                $('#addEmployeeModal').modal('hide');
                table.ajax.reload();
                Swal.fire("Success", "Employee added successfully!", "success");
            },
            error: function(response) {
                Swal.fire("Error", "Something went wrong!", "error");
            }
        });
    });
});
</script>
@endsection
