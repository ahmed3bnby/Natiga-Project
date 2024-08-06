<!DOCTYPE html>
<html>
<head>
    <title>Student Search</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1 class="mt-5">Search Students</h1>
    <form action="{{ route('students.search') }}" method="GET">
        <div class="form-group">
            <input type="text" name="query" class="form-control" placeholder="Enter student name or رقم الجلوس">
        </div>
        <button type="submit" class="btn btn-primary">Search</button>
    </form>

    @if(session('error'))
        <div class="alert alert-danger mt-3">
            {{ session('error') }}
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    @if(isset($students) && $students->isNotEmpty())
        <h2 class="mt-5">Search Results:</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>رقم الجلوس</th>
                    <th>الاسم</th>
                    <th>الدرجة</th>
                    <th>ناجح / راسب</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                    <tr>
                        <td>{{ $student->number }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->grade }}</td>
                        <td>{{ $student->student_case_desc }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
</body>
</html>
