@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Create Supplier
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.suppliers.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="company_name">Company Name</label>
                <input class="form-control {{ $errors->has('company_name') ? 'is-invalid' : '' }}" type="text" name="company_name" id="company_name" value="{{ old('company_name', '') }}" required>
                @if($errors->has('company_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('company_name') }}
                    </div>
                @endif
                <span class="help-block">''</span>
            </div>
            <div class="form-group">
                <label class="required" for="tin_number">TIN Number</label>
                <input class="form-control {{ $errors->has('tin_number') ? 'is-invalid' : '' }}" type="text" name="tin_number" id="tin_number" value="{{ old('tin_number', '') }}" required>
                @if($errors->has('tin_number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tin_number') }}
                    </div>
                @endif
                <span class="help-block">''</span>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" name="address" id="address" value="{{ old('address', '') }}">
                @if($errors->has('address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('address') }}
                    </div>
                @endif
                <span class="help-block">''</span>
            </div>
        
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection