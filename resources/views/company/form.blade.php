@csrf
<div class="form-group row">
    <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

    <div class="col-md-6">
        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name')??$company->name }}">

        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

    <div class="col-md-6">
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ?? $company->email}}">
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="website" class="col-md-4 col-form-label text-md-right">Website</label>

    <div class="col-md-6">
        <input id="website" type="text" class="form-control @error('website') is-invalid @enderror" name="website" value="{{ old('website') ?? $company->website}}">
    </div>
</div>

<div class="form-group row">
    <label for="logo" class="col-md-4 col-form-label text-md-right">Logo</label>

    <div class="col-md-6">
        <input id="logo" type="file" class="form-control @error('logo') is-invalid @enderror" name="logo" value="{{ old('logo') }}">
    </div>


</div>