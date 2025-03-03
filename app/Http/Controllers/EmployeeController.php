<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\User;
use Storage;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    public function getEmployees(Request $request)
    {
        if ($request->ajax()) {
            $employees = Employee::select(['id', 'name', 'email', 'joining_date', 'department', 'designation', 'status', 'created_at']);
    
            return DataTables::of($employees)
                ->addColumn('full_name', function ($employee) {
                    return $employee->name;
                })
                ->addColumn('email', function ($employee) {
                    return $employee->email;
                })
                ->addColumn('joining_date', function ($employee) {
                    return $employee->joining_date;
                })
                ->addColumn('department', function ($employee) {
                    return $employee->department;
                })
                ->addColumn('designation', function ($employee) {
                    return $employee->designation;
                })
                ->addColumn('status', function ($employee) {
                    $badgeClass = $employee->status === 'active' ? 'bg-success-subtle text-success' : 'bg-danger-subtle text-danger';
                    return '<span class="badge '.$badgeClass.' text-uppercase">'.$employee->status.'</span>';
                })
                ->addColumn('action', function ($employee) {
                    return '
                        <div class="d-flex gap-2">
                            <button class="btn btn-sm btn-success edit-item-btn" data-id="'.$employee->id.'" data-bs-toggle="modal" data-bs-target="#showModal">Edit</button>
                            <button class="btn btn-sm btn-danger remove-item-btn" data-id="'.$employee->id.'" data-bs-toggle="modal" data-bs-target="#deleteRecordModal">Remove</button>
                        </div>';
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        }
    
        return view('content.laravel-example.list-clientdocuments');
    }
    

    public function store(Request $request)
    {
        \Log::info('store hitted');
        // Validate input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'avatar' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
            'department' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'status' => 'nullable',
        ]);
    
        // Handle Avatar Upload
        $avatarPath = null;
        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
        }

        // Create Employee
        Employee::create([
            'name' => $request->name,
            'email' => $request->email,
            'department' => $request->department,
            'designation' => $request->designation,
            'joining_date' => now(), 
            'status'=> $request->status,
        ]);
    
        return response()->json(['success' => true, 'message' => 'Employee added successfully']);
    }
     
    public function destroy($id)
{
    try {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return response()->json(['success' => true, 'message' => 'Employee deleted successfully!']);
    } catch (\Exception $e) {
        return response()->json(['success' => false, 'message' => 'Error deleting employee!']);
    }
}

public function edit($id)
{
    $employee = Employee::find($id);
    if (!$employee) {
        return response()->json(['success' => false, 'message' => 'Employee not found!']);
    }
    return response()->json(['success' => true, 'employee' => $employee]);
}

public function update(Request $request, $id)
{
    $employee = Employee::find($id);
    if (!$employee) {
        return response()->json(['success' => false, 'message' => 'Employee not found!']);
    }

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:employees,email,' . $id,
        'department' => 'required|string|max:255',
        'designation' => 'required|string|max:255',
        'status' => 'required|in:active,inactive',
        'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
    ]);

    if ($request->hasFile('avatar')) {
        $avatarPath = $request->file('avatar')->store('avatars', 'public');
        $employee->avatar = asset('storage/' . $avatarPath);
    }

    $employee->update($request->except(['avatar']));

    return response()->json(['success' => true, 'message' => 'Employee updated successfully!']);
}   
}