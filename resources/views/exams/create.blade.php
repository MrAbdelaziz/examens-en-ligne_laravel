@extends('layouts.app', ['title' => __('Exam Management')])

@section('content')
    @include('exams.partials.header', ['title' => __('Add Exam')])   

    <style type="text/css">.required-fi{color:#f00;}</style>
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Exam Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('exam.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('exam.step2') }}" class="exam-add-form" autocomplete="off">
                            @csrf
                            <h6 class="heading-small text-muted mb-4">{{ __('Exam information') }}</h6>
                            <div class="pl-lg-4" id="step1-exam-form">
                                <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-title">{{ __('Title') }} <span class="required-fi">*</span></label>
                                    <input type="text" name="title" id="input-title" class="form-control form-control-alternative{{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="{{ __('Title') }}" value="{{ old('title') }}" required autofocus>
                                    @if ($errors->has('title'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-description">{{ __('Description') }} <span class="required-fi">*</span></label>
                                    <textarea name="description" id="input-description" class="form-control form-control-alternative{{ $errors->has('description') ? ' is-invalid' : '' }}" placeholder="{{ __('Description') }}" value="{{ old('description') }}" required></textarea>
                                    @if ($errors->has('description'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('tags') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-tags">{{ __('Tags') }} <span class="required-fi">*</span></label>
                                    <textarea name="tags" id="input-tags" class="form-control form-control-alternative{{ $errors->has('tags') ? ' is-invalid' : '' }}" placeholder="{{ __('Tags') }}" value="{{ old('tags') }}" required></textarea>
                                    @if ($errors->has('tags'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('tags') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('subcategory') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-subcategory">{{ __('Subcategory ') }} <span class="required-fi">*</span></label>
                                    <select name="subcategory" id="input-subcategory" class="form-control form-control-alternative{{ $errors->has('subcategory') ? ' is-invalid' : '' }}" required>
                                        @foreach ($categs as $categ)
                                            <option value="{{ $categ->id }}" {{ (old("$categ->id") == $categ->id ? "selected":"") }}>{{ $categ->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('subcategory'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('subcategory') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('number_questions') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-number-questions">{{ __('Number Of Questions') }} <span class="required-fi">*</span></label>
                                    <input type="number" min="1" max="100" name="number_questions" id="input-number-questions" class="form-control form-control-alternative{{ $errors->has('number_questions') ? ' is-invalid' : '' }}" placeholder="{{ __('Number Of Questions') }}" value="{{ old('number_questions') }}" required>
                                    @if ($errors->has('number_questions'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('number_questions') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('duration') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-duration">{{ __('Exam Duration') }} <span class="required-fi">*</span> <small>(Minutes)</small></label>
                                    <input type="number" min="1" max="100" name="duration" id="input-duration" class="form-control form-control-alternative{{ $errors->has('duration') ? ' is-invalid' : '' }}" placeholder="{{ __('Exam Duration') }}" value="{{ old('duration') }}" required>
                                    @if ($errors->has('duration'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('duration') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('minimum_score') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-minimum_score">{{ __('Passing Score') }} <span class="required-fi">*</span> <small>(_/100)</small></label>
                                    <input type="number" min="1" max="100" name="minimum_score" id="input-minimum_score" class="form-control form-control-alternative{{ $errors->has('minimum_score') ? ' is-invalid' : '' }}" placeholder="{{ __('Passing Score') }}" value="{{ old('minimum_score') }}" required>
                                    @if ($errors->has('minimum_score'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('minimum_score') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Next') }}</button>
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