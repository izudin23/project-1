@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Employees</div>

                <div class="card-body">
                    <a href="{{route('employees.create')}}" class="btn btn-success">Add Employee </a>
                    <table class="table table-bordered mt-3">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Company</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($employees as $employee)
                            <tr>
                                <th scope="row">{{$employee->id}}</th>
                                <td>{{{$employee->first_name}}}</td>
                                <td>{{$employee->last_name}}</td>
                                <td>{{$employee->phone}}</td>
                                <td>{{$employee->company->name}}</td>

                                <td>
                                    <a href="{{route('employees.show',['employee'=>$employee]) }}" class="btn btn-info mb-2">details</a>
                                    <a href="{{route('employees.edit',['employee'=>$employee]) }}" class="btn btn-warning mb-2">Edit</a>
                                    <form action="{{route('employees.destroy',['employee'=>$employee])}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $employees->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection