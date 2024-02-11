@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Update education') }}</div>

                <div class="card-body">
                    <div class="container">
                        <h2 class="mt-5 mb-4">Update education</h2>
                        <form action="{{route('education.update',$id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="degreeName">Degree Name:</label>
                                <input type="text" class="form-control" name="degreeName" value="{{$education->degreeName}}" required>
                            </div>
                            <div class="form-group">
                                <label for="institute">Institute:</label>
                                <input type="text" class="form-control" name="institute" value="{{$education->institute}}" required>
                            </div>
                            <div class="form-group">
                                <label for="passingYear">Passing Year:</label>
                                <input type="number" class="form-control" name="passingYear" value="{{$education->passingYear}}" required>
                            </div>
                            <div class="form-group">
                                <label for="studentID">CGPA:</label>
                                <input type="text" class="form-control" name="studentID" value="{{$education->studentID}}"
                                    required>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footerScript')
@if(Session::has('success'))
<script type="text/javascript">
$(function() {
    toastr.success("{{ Session::get('success') }}");
})
</script>
@endif
@if(Session::has('fail'))
<script type="text/javascript">
$(function() {
    toastr.error("{{ Session::get('fail') }}");
})
</script>
@endif
@stop