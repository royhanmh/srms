@extends('admin.dashboard')
@section('admin')
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Create Student Class</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Create Class</a></li>
                            <li class="breadcrumb-item active">Class</li>
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

                        <h4 class="card-title">Student Class- Create</h4>

                        <form action="{{ route('store.class') }}" method="POST">
                            @csrf
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Class Name</label>
                                <div class="col-sm-10">
                                    <input class="form-control " type="text" name="class_name" required>
                                    <p style="font-style: italic">Eg - First, Second, Third etc</p>
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Section</label>
                                <div class="col-sm-10">
                                    <input class="form-control " type="text" name="section" required>
                                    <p style="font-style: italic">Eg - First, A, B, C etc</p>
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
