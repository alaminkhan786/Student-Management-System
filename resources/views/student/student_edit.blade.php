@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card  border-danger">
                <div class="card-header bg-danger text-white">{{ __('Update Student') }}</div>

                <div class="card-body">
                    <div class="container">
                        <h2 class="mt-5 mb-4">Update Student</h2>
                        <form action="{{ route('student.update', $id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="name" class="form-label">Name:</label>
                                <input type="text" class="form-control" name="name" value="{{ $student->name }}"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="roll" class="form-label">Roll:</label>
                                <input type="text" class="form-control" name="roll" value="{{ $student->roll }}"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="age" class="form-label">Age:</label>
                                <input type="number" class="form-control" name="age" value="{{ $student->age }}"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="gender" class="form-label">Gender:</label>
                                <select class="form-control" name="gender" required>
                                    <option value="{{ $student->gender }}">{{ $student->gender }}</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone:</label>
                                <input type="tel" class="form-control" name="phone" value="{{ $student->phone }}"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="district" class="form-label">District:</label>
                                <input type="text" class="form-control" name="district"
                                    value="{{ $student->district }}" required>
                            </div>
                            <button type="submit" class="btn btn-warning">Update</button>
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
