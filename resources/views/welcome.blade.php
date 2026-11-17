
@extends('layouts.app')

@section('content')

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

@endsection
