
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
        .card {
            background: white;
            max-width: 650px;
            margin: 25px auto;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 12px #00000015;
        }
        footer {
            padding: 20px;
            color: #64748b;
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
        <p>I am a university student learning web development.</p>
    </section>

    <section class="card" id="courses">
        <h2>My Courses</h2>
        <p>Web Development | Programming | Database</p>
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
