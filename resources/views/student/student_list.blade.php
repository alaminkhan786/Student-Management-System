@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center ">
        <div class="col-md-8 ">
            <div class="card  border-danger">
                <div class="card-header bg-danger text-white">{{ __('Create Student') }}</div>

                <div class="card-body">
                    <div class="container">
                        <h2 class="mt-5 mb-4">Create Student</h2>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Roll</th>
                                        <th>Age</th>
                                        <th>Gender</th>
                                        <th>Phone</th>
                                        <th>District</th>
                                        <th>Created By</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($students as $student)
                                    <tr>
                                        <td>{{$student->name}}</td>
                                        <td>{{$student->roll}}</td>
                                        <td>{{$student->age}}</td>
                                        <td>{{$student->gender}}</td>
                                        <td>{{$student->phone}}</td>
                                        <td>{{$student->district}}</td>
                                        <td>{{$student->user->name}}</td>
                                        <td>
                                            <a href="{{route('student.edit',$student->id)}}"
                                                class="btn btn-warning btn-sm">Edit</a>
                                        </td>
                                        <td>
                                            <form action="{{route('student.delete',$student->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
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
