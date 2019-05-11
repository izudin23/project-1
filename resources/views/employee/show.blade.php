@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Details Employee</div>

                <div class="card-body">
                    <div class="list-group">
                        <ul class="list-group">
                            <li class="list-group-item"><strong>First Name : </strong>{{$employee->first_name}}</li>
                            <li class="list-group-item"><strong>Last Name : </strong>{{$employee->last_name}}</li>
                            <li class="list-group-item"><strong>Phone : </strong>{{$employee->phone}}</li>
                            <li class="list-group-item"><strong>Company : </strong>{{$employee->company->name}}</li>
                        </ul>
                    </div>
                    <a href="{{route('employees.edit',['employee'=>$employee]) }}" class="btn btn-warning mt-3">Edit Details</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection