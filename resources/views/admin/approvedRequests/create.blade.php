@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.approvedRequest.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.approved-requests.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="control_number">{{ trans('cruds.approvedRequest.fields.control_number') }}</label>
                <input class="form-control {{ $errors->has('control_number') ? 'is-invalid' : '' }}" type="text" name="control_number" id="control_number" value="{{ old('control_number', '') }}" required>
                @if($errors->has('control_number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('control_number') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.approvedRequest.fields.control_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="requestor_id">{{ trans('cruds.approvedRequest.fields.requestor') }}</label>
                <select class="form-control select2 {{ $errors->has('requestor') ? 'is-invalid' : '' }}" name="requestor_id" id="requestor_id" required>
                    @foreach($requestors as $id => $requestor)
                        <option value="{{ $id }}" {{ old('requestor_id') == $id ? 'selected' : '' }}>{{ $requestor }}</option>
                    @endforeach
                </select>
                @if($errors->has('requestor_id'))
                    <div class="invalid-feedback">
                        {{ $errors->first('requestor_id') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.approvedRequest.fields.requestor_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="item_id">{{ trans('cruds.approvedRequest.fields.item') }}</label>
                <select class="form-control select2 {{ $errors->has('item') ? 'is-invalid' : '' }}" name="item_id" id="item_id" required>
                    @foreach($items as $id => $item)
                        <option value="{{ $id }}" {{ old('item_id') == $id ? 'selected' : '' }}>{{ $item }}</option>
                    @endforeach
                </select>
                @if($errors->has('item_id'))
                    <div class="invalid-feedback">
                        {{ $errors->first('item_id') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.approvedRequest.fields.item_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description_id">{{ trans('cruds.approvedRequest.fields.description') }}</label>
                <select class="form-control select2 {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description_id" id="description_id">
                    @foreach($descriptions as $id => $description)
                        <option value="{{ $id }}" {{ old('description_id') == $id ? 'selected' : '' }}>{{ $description }}</option>
                    @endforeach
                </select>
                @if($errors->has('description_id'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description_id') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.approvedRequest.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="brand_id">{{ trans('cruds.approvedRequest.fields.brand') }}</label>
                <select class="form-control select2 {{ $errors->has('brand') ? 'is-invalid' : '' }}" name="brand_id" id="brand_id">
                    @foreach($brands as $id => $brand)
                        <option value="{{ $id }}" {{ old('brand_id') == $id ? 'selected' : '' }}>{{ $brand }}</option>
                    @endforeach
                </select>
                @if($errors->has('brand_id'))
                    <div class="invalid-feedback">
                        {{ $errors->first('brand_id') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.approvedRequest.fields.brand_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="quantity">{{ trans('cruds.approvedRequest.fields.quantity') }}</label>
                <input class="form-control {{ $errors->has('quantity') ? 'is-invalid' : '' }}" type="number" name="quantity" id="quantity" value="{{ old('quantity') }}" step="1" required>
                @if($errors->has('quantity'))
                    <div class="invalid-feedback">
                        {{ $errors->first('quantity') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.approvedRequest.fields.quantity_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="unit">{{ trans('cruds.approvedRequest.fields.unit') }}</label>
                <input class="form-control {{ $errors->has('unit') ? 'is-invalid' : '' }}" type="text" name="unit" id="unit" value="{{ old('unit', '') }}">
                @if($errors->has('unit'))
                    <div class="invalid-feedback">
                        {{ $errors->first('unit') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.approvedRequest.fields.unit_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="price">{{ trans('cruds.approvedRequest.fields.price') }}</label>
                <input class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" type="number" name="price" id="price" value="{{ old('price') }}" step="0.01">
                @if($errors->has('price'))
                    <div class="invalid-feedback">
                        {{ $errors->first('price') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.approvedRequest.fields.price_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="date_requested">{{ trans('cruds.approvedRequest.fields.date_requested') }}</label>
                <input class="form-control date {{ $errors->has('date_requested') ? 'is-invalid' : '' }}" type="text" name="date_requested" id="date_requested" value="{{ old('date_requested') }}" required>
                @if($errors->has('date_requested'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date_requested') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.approvedRequest.fields.date_requested_helper') }}</span>
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