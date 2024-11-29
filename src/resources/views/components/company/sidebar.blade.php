<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="#">Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item dropdown">
                <a href="#"
                    class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            <li class="menu-header">Starter</li>

            <li class="{{ Request::is('admin/company') ? 'active' : '' }}">
                <a href="#"
                    class="nav-link has-dropdown"><i class="far fa-building"></i> <span>Companies</span></a>

                <ul class="dropdown-menu">
                    <li class="{{ Request::is('bootstrap-alert') ? 'active' : '' }}">
                        <a class="nav-link"
                        href="{{ route('company.index') }}">List</a>
                        <a class="nav-link"
                            href="{{ route('company.create') }}">Create</a>
                    </li>
                </ul>
            </li>

            <li class="{{ Request::is('admin/jobs') ? 'active' : '' }}">
                <a href="#"
                    class="nav-link has-dropdown"><i class="fas fa-handshake"></i> <span>Jobs</span></a>

                <ul class="dropdown-menu">
                    <li class="{{ Request::is('bootstrap-alert') ? 'active' : '' }}">
                        <a class="nav-link"
                        href="{{ route('job.index') }}">List</a>
                        <a class="nav-link"
                            href="{{ route('job.create') }}">Create</a>
                    </li>
                </ul>
            </li>
            <li class="{{ Request::is('admin/cclasscontact') ? 'active' : '' }}">
                <a href="#"
                    class="nav-link has-dropdown"><i class="fas fa-user-tie"></i> <span>C-Class</span></a>

                <ul class="dropdown-menu">
                    <li class="{{ Request::is('bootstrap-alert') ? 'active' : '' }}">
                        <a class="nav-link"
                        href="{{ route('cclasscontact.index') }}">List</a>
                        <a class="nav-link"
                            href="{{ route('cclasscontact.create') }}">Create</a>
                    </li>
                </ul>
            </li>
        </ul>

    </aside>
</div>
