
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Student Profile</title>

    <link href="{{ asset('sb-admin-2/vendor/fontawesome-free/css/all.min.css') }}"
          rel="stylesheet">

    <link href="{{ asset('sb-admin-2/css/sb-admin-2.min.css') }}"
          rel="stylesheet">

    <style>
        .course-form {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            margin: 25px 0;
            flex-wrap: wrap;
        }

        .course-form input[type="text"] {
            width: 250px;
            max-width: 100%;
            padding: 12px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            box-sizing: border-box;
        }

        .add-btn {
            display: inline-block;
            background: #4e73df;
            color: white;
            border: none;
            border-radius: 8px;
            padding: 12px 18px;
            cursor: pointer;
            font-size: 14px;
        }

        .add-btn:hover {
            background: #2e59d9;
            color: white;
        }

        .card {
            border-radius: 12px;
            border: 1px solid #e3e6f0;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

        #about,
        #courses,
        #skills,
        #contact {
            width: 100%;
            max-width: 850px;
            margin: 25px auto;
            padding: 30px;
            box-sizing: border-box;
            text-align: center;
        }

        .course-list {
            width: 100%;
            max-width: 650px;
            margin: 20px auto;
        }

        .course-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            background: #f8f9fc;
            border: 1px solid #e3e6f0;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 12px;
        }

        .course-name {
            text-align: left;
            font-weight: 500;
            overflow-wrap: anywhere;
        }

        .course-actions {
            display: flex;
            gap: 8px;
            align-items: center;
            flex-shrink: 0;
        }

        .course-actions form {
            margin: 0;
        }

        .edit-btn,
        .delete-btn,
        .cancel-btn {
            display: inline-block;
            border: none;
            border-radius: 7px;
            padding: 9px 14px;
            text-decoration: none;
            cursor: pointer;
            font-size: 13px;
            font-family: Arial, sans-serif;
        }

        .edit-btn {
            background: #dbeafe;
            color: #2563eb;
        }

        .delete-btn {
            background: #fee2e2;
            color: #dc2626;
        }

        .cancel-btn {
            background: #e5e7eb;
            color: #374151;
        }

        .edit-btn:hover {
            background: #bfdbfe;
            text-decoration: none;
        }

        .delete-btn:hover {
            background: #fecaca;
        }

        .cancel-btn:hover {
            background: #d1d5db;
            text-decoration: none;
        }

        .error-message,
        .user-errors {
            color: #dc2626;
            font-size: 13px;
        }

        .users-page {
            width: 100%;
            max-width: 950px;
            margin: 25px auto;
            padding: 35px;
            box-sizing: border-box;
            text-align: center;
        }

        .users-page h2 {
            font-size: 28px;
            color: #3a3b45;
            margin-bottom: 12px;
        }

        .users-subtitle {
            color: #858796;
            margin-bottom: 25px;
        }

        .user-panel {
            width: 100%;
            max-width: 600px;
            margin: 25px auto 30px;
            padding: 30px;
            box-sizing: border-box;
            background: #f8f9fc;
            border: 1px solid #e3e6f0;
            border-radius: 12px;
            text-align: left;
        }

        .user-panel h3 {
            text-align: center;
            font-size: 22px;
            color: #3a3b45;
            margin-top: 0;
            margin-bottom: 25px;
        }

        .user-form {
            display: flex;
            flex-direction: column;
            width: 100%;
            gap: 10px;
        }

        .user-form label {
            display: block;
            font-weight: bold;
            font-size: 14px;
            color: #5a5c69;
            margin-bottom: 3px;
        }

        .user-form input {
            display: block;
            width: 100%;
            box-sizing: border-box;
            padding: 13px;
            border: 1px solid #d1d3e2;
            border-radius: 8px;
            margin-bottom: 10px;
            background: white;
            font-size: 14px;
        }

        .user-form input:focus {
            outline: none;
            border-color: #4e73df;
            box-shadow: 0 0 0 2px rgba(78, 115, 223, 0.1);
        }

        .user-submit {
            width: 100%;
            padding: 14px;
            margin-top: 10px;
            font-size: 15px;
        }

        .user-cancel {
            display: block;
            text-align: center;
            padding: 12px;
        }

        .users-list-title {
            margin-top: 30px;
            margin-bottom: 20px;
            font-size: 22px;
        }

        .users-page .course-list {
            width: 100%;
            max-width: 750px;
            margin: 20px auto;
        }

        .user-info {
            display: flex;
            flex-direction: column;
            gap: 6px;
            text-align: left;
            min-width: 0;
            overflow-wrap: anywhere;
        }

        .user-info span {
            font-size: 13px;
            color: #858796;
        }

        .user-item {
            padding: 18px;
        }

        .users-empty {
            padding: 30px;
            background: #f8f9fc;
            border: 1px dashed #d1d3e2;
            border-radius: 10px;
            color: #858796;
        }

        @media (max-width: 600px) {
            #about,
            #courses,
            #skills,
            #contact {
                padding: 18px;
                margin: 15px auto;
            }

            .course-item {
                flex-wrap: wrap;
                justify-content: center;
            }

            .course-name,
            .user-info {
                width: 100%;
                text-align: center;
            }

            .course-actions {
                justify-content: center;
                flex-wrap: wrap;
            }

            .course-form input[type="text"] {
                width: 100%;
            }

            .users-page {
                padding: 18px;
            }

            .user-panel {
                padding: 18px;
            }

            .user-panel h3 {
                font-size: 20px;
            }
        }
    </style>
</head>

<body id="page-top">

<div id="wrapper">

    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion"
        id="accordionSidebar">

        <a class="sidebar-brand d-flex align-items-center justify-content-center"
           href="/">
            <div class="sidebar-brand-icon">
                <i class="fas fa-user-graduate"></i>
            </div>

            <div class="sidebar-brand-text mx-3">
                Student Profile
            </div>
        </a>

        <hr class="sidebar-divider my-0">

        <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
            <a class="nav-link" href="/">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <hr class="sidebar-divider">

        <div class="sidebar-heading">
            Management
        </div>

        <li class="nav-item">
            <a class="nav-link" href="/#courses">
                <i class="fas fa-fw fa-book"></i>
                <span>My Courses</span>
            </a>
        </li>

        <li class="nav-item {{ request()->is('users*') ? 'active' : '' }}">
            <a class="nav-link" href="/users">
                <i class="fas fa-fw fa-users"></i>
                <span>Users Management</span>
            </a>
        </li>

        <hr class="sidebar-divider">

        <div class="sidebar-heading">
            Profile
        </div>

        <li class="nav-item">
            <a class="nav-link" href="/#about">
                <i class="fas fa-fw fa-user"></i>
                <span>About Me</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="/#skills">
                <i class="fas fa-fw fa-code"></i>
                <span>My Skills</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="/#contact">
                <i class="fas fa-fw fa-envelope"></i>
                <span>Contact</span>
            </a>
        </li>

        <hr class="sidebar-divider d-none d-md-block">

        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0"
                    id="sidebarToggle"></button>
        </div>

    </ul>

    <div id="content-wrapper" class="d-flex flex-column">

        <div id="content">

            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <button id="sidebarToggleTop"
                        class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <span class="h5 mb-0 text-gray-800">
                    My Student Profile
                </span>

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">
                            <i class="fas fa-home fa-fw"></i>
                        </a>
                    </li>
                </ul>

            </nav>

            <div class="container-fluid">

                @if(!request()->is('users*'))
                    <h1 class="h3 mb-4 text-gray-800">
                        Dashboard
                    </h1>
                @endif

                @yield('content')

            </div>

        </div>

        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>My Student Profile - Laravel Project</span>
                </div>
            </div>
        </footer>

    </div>

</div>

<script src="{{ asset('sb-admin-2/vendor/jquery/jquery.min.js') }}"></script>

<script src="{{ asset('sb-admin-2/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<script src="{{ asset('sb-admin-2/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<script src="{{ asset('sb-admin-2/js/sb-admin-2.min.js') }}"></script>

</body>
</html>
