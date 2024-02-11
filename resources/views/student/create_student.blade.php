@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg p-3 mb-5 bg-white rounded">
                <div class="card-header bg-danger text-white text-center h4">{{ __('Create Student') }}</div>

                <div class="card-body">
                    <h2 class="text-center mb-4">Create Student</h2>
                    <form action="{{ route('store.student') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter your name" required>
                        </div>
                        <div class="mb-3">
                            <label for="roll" class="form-label">Roll:</label>
                            <input type="text" class="form-control" name="roll" placeholder="Enter your roll number" required>
                        </div>
                        <div class="mb-3">
                            <label for="age" class="form-label">Age:</label>
                            <input type="number" class="form-control" name="age" placeholder="Enter your age" required>
                        </div>
                        <div class="mb-3">
                            <label for="gender" class="form-label">Gender:</label>
                            <select class="form-select" name="gender" required>
                                <option value="" disabled selected>Select</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone:</label>
                            <input type="tel" class="form-control" name="phone" placeholder="Enter your phone number" required>
                        </div>
                        <div class="mb-3">
                            <label for="district" class="form-label">District:</label>
                            <input type="text" class="form-control" name="district" placeholder="Enter your district" required>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footerScript')
@if(Session::has('success'))
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        toastr.success("{{ Session::get('success') }}");
    });
</script>
@endif
@if(Session::has('fail'))
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        toastr.error("{{ Session::get('fail') }}");
    });
</script>
@endif
@stop
