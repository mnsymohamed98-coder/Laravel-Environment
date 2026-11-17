
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Student Profile</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f4f8;
            margin: 0;
            text-align: center;
            color: #243047;
        }

        header {
            background: #2563eb;
            color: white;
            padding: 45px 20px;
        }

        nav {
            background: #1e40af;
            padding: 15px;
        }

        nav a {
            color: white;
            margin: 12px;
            text-decoration: none;
        }

        nav a:hover {
            text-decoration: underline;
        }

        .card {
            background: white;
            max-width: 650px;
            margin: 25px auto;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 12px #00000015;
        }

        .course-form {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            margin: 25px 0;
            flex-wrap: wrap;
        }

        .course-form input[type="text"] {
            padding: 12px;
            width: 250px;
            max-width: 100%;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 14px;
            box-sizing: border-box;
        }

        .add-btn {
            background: #2563eb;
            color: white;
            border: none;
            border-radius: 8px;
            padding: 12px 18px;
            font-size: 14px;
            cursor: pointer;
        }

        .add-btn:hover {
            background: #1d4ed8;
        }

        .course-list {
            max-width: 550px;
            margin: 20px auto;
        }

        .course-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            padding: 15px;
            margin-bottom: 12px;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
        }

        .course-name {
            font-size: 15px;
            font-weight: 500;
            text-align: left;
            overflow-wrap: anywhere;
        }

        .course-actions {
            display: flex;
            align-items: center;
            gap: 8px;
            flex-shrink: 0;
        }

        .course-actions form {
            margin: 0;
        }

        .edit-btn,
        .delete-btn,
        .cancel-btn {
            display: inline-block;
            padding: 9px 14px;
            border-radius: 7px;
            text-decoration: none;
            font-size: 13px;
            font-family: Arial, sans-serif;
            cursor: pointer;
            border: none;
            line-height: normal;
        }

        .edit-btn {
            color: #2563eb;
            background: #dbeafe;
        }

        .delete-btn {
            color: #dc2626;
            background: #fee2e2;
        }

        .cancel-btn {
            color: #374151;
            background: #e5e7eb;
        }

        .edit-btn:hover {
            background: #bfdbfe;
        }

        .delete-btn:hover {
            background: #fecaca;
        }

        .cancel-btn:hover {
            background: #d1d5db;
        }

        .error-message {
            color: #dc2626;
            font-size: 13px;
        }

        /* Users Management */

        .users-page {
            max-width: 750px;
            padding: 35px;
        }

        .users-subtitle {
            color: #64748b;
            margin-bottom: 25px;
        }

        .user-panel {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 25px;
            max-width: 500px;
            margin: 20px auto 30px;
            text-align: left;
        }

        .user-panel h3 {
            text-align: center;
            margin-top: 0;
            margin-bottom: 25px;
        }

        .user-form {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .user-form label {
            font-size: 14px;
            font-weight: bold;
            color: #334155;
        }

        .user-form input {
            width: 100%;
            box-sizing: border-box;
            padding: 13px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            font-size: 14px;
            margin-bottom: 10px;
            background: white;
        }

        .user-form input:focus {
            outline: none;
            border-color: #2563eb;
        }

        .user-submit {
            width: 100%;
            margin-top: 10px;
            padding: 14px;
        }

        .user-cancel {
            text-align: center;
        }

        .users-list-title {
            margin-top: 30px;
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
            color: #64748b;
            font-size: 13px;
        }

        .user-item {
            padding: 18px;
        }

        .users-empty {
            padding: 25px;
            background: #f8fafc;
            border: 1px dashed #cbd5e1;
            border-radius: 10px;
            color: #64748b;
        }

        .user-errors {
            color: #dc2626;
            font-size: 13px;
            margin-top: 15px;
        }

        footer {
            padding: 20px;
            color: #64748b;
        }

        @media (max-width: 500px) {
            .card {
                margin: 15px;
                padding: 20px 15px;
            }

            .course-item {
                flex-wrap: wrap;
            }

            .course-name {
                width: 100%;
                text-align: center;
            }

            .course-actions {
                justify-content: center;
                width: 100%;
            }

            .course-form input[type="text"] {
                width: 100%;
            }

            .users-page {
                padding: 20px 15px;
            }

            .user-panel {
                padding: 18px;
            }

            .user-item {
                flex-wrap: wrap;
                justify-content: center;
            }

            .user-info {
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>

<body>
    <header>
        <h1>My Student Profile</h1>
        <p>Welcome to my Laravel project!</p>
    </header>

    <nav>
        <a href="/#about">About</a>
        <a href="/#courses">Courses</a>
        <a href="/users">Users</a>
        <a href="/#skills">Skills</a>
        <a href="/#contact">Contact</a>
    </nav>

    @yield('content')

    <footer>
        <p>My First Laravel Project</p>
    </footer>
</body>
</html>
