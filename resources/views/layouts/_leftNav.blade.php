<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <div class="user-details">
            <div class="text-center">
                <img src="{{ asset('assets/images/users/avatar-1.jpg') }}" alt="" class="img-circle">
            </div>
            <div class="user-info">
                <div class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Kenny Rigdon</a>
                    <ul class="dropdown-menu">
                        <li><a href="javascript:void(0)"> Profile</a></li>
                        <li><a href="javascript:void(0)"> Settings</a></li>
                        <li><a href="javascript:void(0)"> Lock screen</a></li>
                        <li class="divider"></li>
                        <li><a href="javascript:void(0)"> Logout</a></li>
                    </ul>
                </div>

                <p class="text-muted m-0"><i class="fa fa-dot-circle-o text-success"></i> Online</p>
            </div>
        </div>
        <!--- Divider -->
        <div id="sidebar-menu">
            <ul>
                <li>
                    <a href="index.html" class="waves-effect"><i class="ti-home"></i><span> Dashboard </span></a>
                </li>


                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="ti-files"></i><span> Teachers </span><span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('teacher.index') }}">List</a></li>
                        <li><a href="{{ route('teacher.create') }}">Create New</a></li>

                    </ul>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="ti-files"></i><span> Course </span><span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('course.index') }}">List</a></li>
                        <li><a href="{{ route('course.create') }}">Create New</a></li>
                    </ul>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="ti-wand"></i> <span> Rooms </span> <span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('room.index') }}">List</a></li>
                        <li><a href="{{ route('room.create') }}">Create New</a></li>
                    </ul>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="ti-files"></i><span> Departments </span><span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('department.index') }}">List</a></li>
                        <li><a href="{{ route('department.create') }}">Create New</a></li>

                    </ul>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="ti-files"></i><span> Semester </span><span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('semester.index') }}">List</a></li>
                        <li><a href="{{ route('semester.create') }}">Create New</a></li>

                    </ul>
                </li>


            </ul>
        </div>
        <div class="clearfix"></div>
    </div> <!-- end sidebarinner -->
</div>