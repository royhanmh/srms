@extends('admin.dashboard')
@section('admin')
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Admin Password Change</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                            <li class="breadcrumb-item active">Password</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Admin Password - Update</h4>

                        <form action="{{ route('admin.password.update') }}" method="POST">
                            @csrf
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Old Password</label>
                                <div class="col-sm-10">
                                    <input
                                        class="form-control @error('old_password') is-invalid 
                                     @enderror"
                                        type="password" name="old_password">
                                    @error('old_password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">New Password</label>
                                <div class="col-sm-10">
                                    <input
                                        class="form-control @error('new_password') is-invalid 
                                     @enderror"
                                        type="password" name="new_password">
                                    @error('new_password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-search-input" class="col-sm-2 col-form-label">Confirm Password</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="password" name="new_password_confirmation">
                                </div>
                            </div>

                            <!-- end row -->
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Update Password</button>
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#Image').on('change', function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#ShowImage').attr('src', e.target.result)
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
