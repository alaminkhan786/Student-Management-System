@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card mb-4  border-danger">
                <div class="card-header bg-danger text-white">
                    {{ __('Create Education') }}
                </div>

                <div class="card-body">
                    <form action="{{ route('store.education') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="degreeName">Degree Name:</label>
                            <input type="text" class="form-control" name="degreeName" placeholder="Enter your Degree Name" required>
                        </div>
                        <div class="form-group">
                            <label for="institute">Institute:</label>
                            <input type="text" class="form-control" name="institute" placeholder="Enter your Institute" required>
                        </div>
                        <div class="form-group">
                            <label for="passingYear">Passing Year:</label>
                            <input type="number" class="form-control" name="passingYear" placeholder="Enter your Passing Year" required>
                        </div>
                        <div class="form-group">
                            <label for="studentID">CGPA:</label>
                            <input type="text" class="form-control" name="studentID" placeholder="Enter your CGPA" required>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-warning">Submit</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card  border-danger">
                <div class="card-header bg-danger text-white">
                    {{ __('Education List') }}
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <th>Degree Name</th>
                            <th>Institute</th>
                            <th>Passing Year</th>
                            <th>CGPA</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </thead>
                        <tbody>
                            @forelse($education as $edu)
                            <tr>
                                <td>{{ $edu->degreeName }}</td>
                                <td>{{ $edu->institute }}</td>
                                <td>{{ $edu->passingYear }}</td>
                                <td>{{ $edu->studentID }}</td>
                                <td>
                                    <a href="{{ route('education.edit', $edu->id) }}" class="btn btn-success btn-sm">Edit</a>
                                </td>
                                <td>
                                    <form action="{{ route('education.delete', $edu->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-dark btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center">No education records found.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footerScript')
@if(Session::has('success'))
<script>
    $(function() {
        toastr.success("{{ Session::get('success') }}");
    });
</script>
@endif

@if(Session::has('fail'))
<script>
    $(function() {
        toastr.error("{{ Session::get('fail') }}");
    });
</script>
@endif
@stop
