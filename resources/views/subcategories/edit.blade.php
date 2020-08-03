@extends('layouts.app', ['title' => __('Subcategory Management')])

@section('content')
    @include('subcategories.partials.header', ['title' => __('Edit Subcategory')])   

    <style type="text/css">.required-fi{color:#f00;}</style>
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Subcategory Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('subcategory.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('subcategory.update', $subcategory) }}" autocomplete="off">
                            @csrf
                            @method('put')
                            <h6 class="heading-small text-muted mb-4">{{ __('subcategory information') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Name') }} <span class="required-fi">*</span></label>
                                    <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', $subcategory->name) }}" required autofocus>
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('parent') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-parent">{{ __('Parent Category') }} <span class="required-fi">*</span></label>
                                    <select name="parent" id="input-parent" class="form-control form-control-alternative{{ $errors->has('parent') ? ' is-invalid' : '' }}" required>
                                        @foreach ($categs as $categ)
                                            <option value="{{ $categ->id }}" {{ (old('parent', $categ->id) == $categ->id ? "selected":"") }}>{{ $categ->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('parent'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('parent') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-description">{{ __('Description') }} <span class="required-fi">*</span></label>
                                    <textarea name="description" id="input-description" class="form-control form-control-alternative{{ $errors->has('description') ? ' is-invalid' : '' }}" placeholder="{{ __('Description') }}" required>{{ old('description', $subcategory->description) }}</textarea>
                                    @if ($errors->has('description'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('tags') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-tags">{{ __('Tags') }} <span class="required-fi">*</span></label>
                                    <textarea name="tags" id="input-tags" class="form-control form-control-alternative{{ $errors->has('tags') ? ' is-invalid' : '' }}" placeholder="{{ __('Tags') }}" required>{{ old('tags', $subcategory->tags) }}</textarea>
                                    @if ($errors->has('tags'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('tags') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection