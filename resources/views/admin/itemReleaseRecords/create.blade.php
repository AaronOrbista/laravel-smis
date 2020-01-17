@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.itemReleaseRecord.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.item-release-records.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="control_number_id">{{ trans('cruds.itemReleaseRecord.fields.control_number') }}</label>
                <select class="form-control select2 {{ $errors->has('control_number') ? 'is-invalid' : '' }}" name="control_number_id" id="control_number_id" required>
                    @foreach($control_numbers as $id => $control_number)
                        <option value="{{ $id }}" {{ old('control_number_id') == $id ? 'selected' : '' }}>{{ $control_number }}</option>
                    @endforeach
                </select>
                @if($errors->has('control_number_id'))
                    <div class="invalid-feedback">
                        {{ $errors->first('control_number_id') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.itemReleaseRecord.fields.control_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="received_by">{{ trans('cruds.itemReleaseRecord.fields.received_by') }}</label>
                <input class="form-control {{ $errors->has('received_by') ? 'is-invalid' : '' }}" type="text" name="received_by" id="received_by" value="{{ old('received_by', '') }}" required>
                @if($errors->has('received_by'))
                    <div class="invalid-feedback">
                        {{ $errors->first('received_by') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.itemReleaseRecord.fields.received_by_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('claimed') ? 'is-invalid' : '' }}">
                    <input class="form-check-input" type="checkbox" name="claimed" id="claimed" value="1" required {{ old('claimed', 0) == 1 ? 'checked' : '' }}>
                    <label class="required form-check-label" for="claimed">{{ trans('cruds.itemReleaseRecord.fields.claimed') }}</label>
                </div>
                @if($errors->has('claimed'))
                    <div class="invalid-feedback">
                        {{ $errors->first('claimed') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.itemReleaseRecord.fields.claimed_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="date_issued_id">{{ trans('cruds.itemReleaseRecord.fields.date_issued') }}</label>
                <select class="form-control select2 {{ $errors->has('date_issued') ? 'is-invalid' : '' }}" name="date_issued_id" id="date_issued_id" required>
                    @foreach($date_issueds as $id => $date_issued)
                        <option value="{{ $id }}" {{ old('date_issued_id') == $id ? 'selected' : '' }}>{{ $date_issued }}</option>
                    @endforeach
                </select>
                @if($errors->has('date_issued_id'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date_issued_id') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.itemReleaseRecord.fields.date_issued_helper') }}</span>
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