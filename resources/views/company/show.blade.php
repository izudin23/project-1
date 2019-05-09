@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Companies</div>

                <div class="card-body">
                    <div class="card mb-3">
                        <div class="row no-gutters">

                            @if($company->logo)
                            <div class="col-md-4">
                                <img src="{{asset('storage/'.$company->logo)}}" class="card-img" alt="...">
                            </div>
                            @endif
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Name : {{$company->name}}</h5>
                                    <p class="card-text">Email : {{$company->email}}</p>
                                    <p class="card-text"><small class="text-muted">website : {{$company->website}}</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="{{route('companies.edit',['company'=>$company])}}" class="btn btn-warning">Edit Company </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection