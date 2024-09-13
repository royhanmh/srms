<div class="vertical-menu">

    <div data-simplebar class="h-100">
        @php

            $data = App\Models\User::findOrFail(Auth::user()->id);
        @endphp
        <!-- User details -->
        <div class="user-profile text-center mt-3">
            <div class="">
                <img src="{{ empty($data->image) ? asset('uploads/no_image.png') : asset('uploads/admin_profiles/' . $data->image) }}"alt=""
                    class="avatar-md rounded-circle">
            </div>
            <div class="mt-3">
                <h4 class="font-size-16 mb-1">{{ $data->name }}</h4>
                <span class="text-muted"><i class=" align-middle font-size-14 text-success"></i>
                    {{ $data->email }}</span>
            </div>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="/admin/dashboard" class="waves-effect">
                        <i class="ri-dashboard-line"></i><span class="badge rounded-pill bg-success float-end">3</span>
                        <span>Dashboard</span>
                    </a>
                </li>



                <li class="menu-title">Appearance</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-account-circle-line"></i>
                        <span>Student Classes</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('create.class') }}">Create Class</a></li>
                        <li><a href="{{ route('manage.class') }}">Manage Class</a></li>

                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-profile-line"></i>
                        <span>Subjects</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('create.subject') }}">Create Subject</a></li>
                        <li><a href="{{ route('manage.subject') }}">Manage Subject</a></li>

                    </ul>
                </li>

                <li class="menu-title">Components</li>



            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
