@extends('admin.dashboard')
@section('admin')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Manage Students</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Manage</a></li>
                        <li class="breadcrumb-item active">Students</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="card">
        <div class="card-body">

            <h4 class="card-title">Students Data</h4>


            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Student Name</th>
                        <th>Roll ID</th>
                        <th>Class</th>
                        <th>Reg Date</th>
                        <th>Status</th>
                        <th>Action</th>

                    </tr>
                </thead>


                <tbody>

                    @foreach ($students as $key => $student)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td><img class="rounded-circle header-profile-user" style="width:35px; height: 35px; padding: 0"
                                    src="{{ empty($student->image) ? asset('uploads/no_image.png') : asset('uploads/student_images/' . $student->image) }}"
                                    alt="">
                            </td>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->roll_id }}</td>
                            <td>{{ $student->class_id }}</td>
                            <td>{{ $student->created_at }}</td>
                            <td>
                                @if ($student->status == 'active')
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Inactive</span>
                                @endif
                            </td>
                            <td class="text-center"><a href="{{ route('edit.subject', $student->id) }}"
                                    class="fas fa-edit btn btn-info btn-sm py-2"></a>
                                <a href="{{ route('delete.subject', $student->id) }}" id="delete"
                                    class="fas fa-trash-alt btn btn-danger btn-sm py-2"></a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>

        </div>
    </div>
@endsection
