@csrf
<div class="form-group row">
    <label for="first_name" class="col-md-4 col-form-label text-md-right">First Name</label>

    <div class="col-md-6">
        <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') ?? $employee->first_name }}">

        @error('first_name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="last_name" class="col-md-4 col-form-label text-md-right">Last Name</label>

    <div class="col-md-6">
        <input id="last_name" type="last_name" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name')?? $employee->last_name }}">
        @error('last_name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="phone" class="col-md-4 col-form-label text-md-right">Phone</label>

    <div class="col-md-6">
        <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone')?? $employee->phone }}">
        @error('phone')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="company_id" class="col-md-4 col-form-label text-md-right">Company</label>

    <div class="col-md-6">
        <select class="form-control @error('company_id') is-invalid @enderror" id=" company_id" name="company_id">
            <option value="" disabled selected>Select Company</option>
            @foreach($companies as $company)
            <option value="{{$company->id}}" {{ $company->id == $employee->company_id ? 'selected' : '' }}>{{$company->name}}</option>
            @endforeach
        </select>
        @error('company_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>


</div>