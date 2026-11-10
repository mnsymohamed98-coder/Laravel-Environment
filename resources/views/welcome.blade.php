
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
        }
    </style>
</head>

<body>

    <header>
        <h1>My Student Profile</h1>
        <p>Welcome to my first Laravel project!</p>
    </header>

    <nav>
        <a href="#about">About</a>
        <a href="#courses">Courses</a>
        <a href="#skills">Skills</a>
        <a href="#contact">Contact</a>
    </nav>

    <section class="card" id="about">
        <h2>About Me</h2>
        <p>
            I am a university student learning web development.
        </p>
    </section>

    <section class="card" id="courses">
        <h2>My Courses</h2>

        @if(isset($editingCourse))
            <h3>Update Course</h3>

            <form action="/courses/update"
                  method="POST"
                  class="course-form">
                @csrf

                <input type="hidden"
                       name="id"
                       value="{{ $editingCourse->id }}">

                <input type="text"
                       name="name"
                       value="{{ old('name', $editingCourse->name) }}"
                       required
                       maxlength="100">

                <button type="submit" class="add-btn">
                    Update
                </button>

                <a href="/#courses" class="cancel-btn">
                    Cancel
                </a>
            </form>
        @else
            <form action="/courses"
                  method="POST"
                  class="course-form">
                @csrf

                <input type="text"
                       name="name"
                       placeholder="Enter course name..."
                       value="{{ old('name') }}"
                       required
                       maxlength="100">

                <button type="submit" class="add-btn">
                    Add Course
                </button>
            </form>
        @endif

        @error('name')
            <p class="error-message">{{ $message }}</p>
        @enderror

        <h3>Courses List</h3>

        <div class="course-list">
            @forelse($courses as $course)
                <div class="course-item">

                    <span class="course-name">
                        {{ $course->name }}
                    </span>

                    <div class="course-actions">

                        <a href="/courses/edit/{{ $course->id }}#courses"
                           class="edit-btn">
                            Edit
                        </a>

                        <form action="/courses/delete/{{ $course->id }}"
                              method="POST">
                            @csrf

                            <button type="submit"
                                    class="delete-btn">
                                Delete
                            </button>
                        </form>

                    </div>
                </div>
            @empty
                <p>No courses added yet.</p>
            @endforelse
        </div>
    </section>

    <section class="card" id="skills">
        <h2>My Skills</h2>
        <p>HTML | CSS | PHP | Laravel</p>
    </section>

    <section class="card" id="contact">
        <h2>Contact Me</h2>
        <p>Feel free to contact me for future projects.</p>
    </section>

    <footer>
        <p>My First Laravel Project</p>
    </footer>

</body>
</html>
