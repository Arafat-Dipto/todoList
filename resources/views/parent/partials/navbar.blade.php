<!-- Navigation -->
<nav class="navbar navbar-fixed-top" role="navigation" style="background-color: #2795e9">
    <div class="navbar-header">
        <a class="navbar-brand text-white" href=""></a>
    </div>

    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>

    <ul class="nav navbar-nav navbar-left navbar-top-links">
        <li><a href="{{ url('/parent/dashboard') }}"><i class="fa fa-home fa-fw"></i> Todo</a></li>
    </ul>

    <ul class="nav navbar-right navbar-top-links">
        <li class="dropdown ">
            <a href="{{ route('parent.addTaskShow') }}">
                <i class="fa fa-angle-double-down"></i>
            </a>

        </li>
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i> {{ \Illuminate\Support\Facades\Auth::user()->username }} <b class="caret"></b>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li class="divider"></li>
                <li><a href="{{ url('/logout') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>
            </ul>
        </li>
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li>
                    <a href="{{ url('/parent/dashboard') }}" class="active"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                </li>
                    <li>
                        <a href="{{ route('parent.addTaskShow') }}"><i class="fa fa-table fa-fw"></i> Add a task</a>
                    </li>
                <li>
                    <a href="{{ route('parent.showCreateReward') }}"><i class="fa fa-table fa-fw"></i> Create Reward</a>
                </li>
                <li>
                    <a href="{{ url('parent/showTask') }}"><i class="fa fa-table fa-fw"></i> Manage Tasks</a>
                </li>
                <li>
                    <a href="{{ url('parent/showReward') }}"><i class="fa fa-table fa-fw"></i> Manage Rewards</a>
                </li>
                <li>
                    <a href="{{ url('parent/showSubmittedTask') }}"><i class="fa fa-table fa-fw"></i> Submitted Tasks</a>
                </li>



            </ul>
        </div>
    </div>
</nav>