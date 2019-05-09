@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Companies</div>

            <div class="card-body">
                <a href="{{route('companies.create')}}" class="btn btn-success">Add Company </a>
                <table class="table table-bordered mt-3">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">website</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($companies as $company)
                        <tr>
                            <th scope="row">{{$company->id}}</th>
                            <td>{{$company->name}}</td>
                            <td>{{$company->email}}</td>
                            <td>{{$company->website}}</td>
                            <td>
                                <a href="{{route('companies.show',['company'=>$company]) }}" class="btn btn-warning btn-sm m-1">Edit</a>
                                <!-- delete data -->
                                <form action="{{route('companies.destroy',['company'=>$company]) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
                                </form>
                                <!-- delete data -->
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection