@extends('admin.dashboard')
@section('admin')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Manage Subject Combination</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Manage Subject</a></li>
                        <li class="breadcrumb-item active">Combination</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="card">
        <div class="card-body">

            <h4 class="card-title">Subject Combinations Data</h4>


            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Claas & Section</th>
                        <th>Subject</th>
                        <th>Status</th>
                        <th>Action</th>

                    </tr>
                </thead>


                <tbody>

                    @foreach ($results as $key => $result)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $result->class_name }} Section - {{ $result->section }}</td>
                            <td>{{ $result->subject_name }}</td>
                            <td>
                                @if ($result->status == 1)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Inactive</span>
                                @endif
                            </td>
                            <td class="text-center">
                                @if ($result->status == 1)
                                    <a href="{{ route('deactivate.subject.combination', $result->id) }}"
                                        class="fas fa-times btn btn-danger btn-lg py-2" title="Deactivate"></a>
                                @elseif ($result->status == 0)
                                    <a href="{{ route('deactivate.subject.combination', $result->id) }}"
                                        class="fas fa-check btn btn-info btn-lg py-2" title="Activate"></a>
                                @endif
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>

        </div>
    </div>
@endsection
