<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="navbar-header">
        <a class="navbar-brand" href=""></a>
    </div>

    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>

    <ul class="nav navbar-nav navbar-left navbar-top-links">
        <li><a href="{{ url('/admin/dashboard') }}"><i class="fa fa-home fa-fw"></i> Todo</a></li>
    </ul>

    <ul class="nav navbar-right navbar-top-links">
        <li class="dropdown navbar-inverse">
            <a href="{{ url('/admin/dashboard') }}">
                <i class="fa fa-bell fa-fw"></i>
            </a>

        </li>
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i> {{ \Illuminate\Support\Facades\Auth::guard('admin')->user()->username }} <b class="caret"></b>
            </a>
            <ul class="dropdown-menu dropdown-user">

                <li><a href="{{ url('admin/logout') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>
            </ul>
        </li>
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">

                <li>
                    <a href="{{ route('admin.dashboard') }}" class="active"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                </li>

                <li>
                    <a href="{{ url('/admin/parent') }}"><i class="fa fa-table fa-fw"></i>Manage Dom</a>
                </li>

                <li>
                    <a href="{{ url('/admin/children') }}"><i class="fa fa-table fa-fw"></i>Manage Sub</a>
                </li>
                <li>
                    <a href="{{ url('/admin/task') }}"><i class="fa fa-table fa-fw"></i>Manage Tasks</a>
                </li>
                <li>
                    <a href="{{ url('/admin/submission') }}"><i class="fa fa-table fa-fw"></i>Manage Submissions</a>
                </li>

            </ul>
        </div>
    </div>
</nav>