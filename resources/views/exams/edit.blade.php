@extends('layouts.app', ['title' => __('Exam Management')])

@section('content')
    @include('exams.partials.header', ['title' => __('Edit Exam')])   

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
                                <a href="{{ route('user.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ action('ExamController@update', $exam) }}" autocomplete="off">
                            {{csrf_field()}}
                            <input type="hidden" name="_method" value="PATCH">
                            <h6 class="heading-small text-muted mb-4">{{ __('Exam information') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                                    <label class="form-title-label" for="input-name">{{ __('Title') }}</label>
                                    <input type="text" name="title" id="input-name" class="form-control form-control-alternative{{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="{{ __('title') }}" value="{{ old('title', $exam->title) }}" required autofocus>

                                </div>
                                 <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                                    <label class="form-title-label" for="input-name">{{ __('Description') }}</label>
                                    <input type="text" name="description" id="input-name" class="form-control form-control-alternative{{ $errors->has('description') ? ' is-invalid' : '' }}" placeholder="{{ __('description') }}" value="{{ old('description', $exam->description) }}" required autofocus>

                                </div>

                                <div class="form-group{{ $errors->has('tags') ? ' has-danger' : '' }}">
                                    <label class="form-title-label" for="input-name">{{ __('Tags') }}</label>
                                    <input type="text" name="tags" id="input-name" class="form-control form-control-alternative{{ $errors->has('tags') ? ' is-invalid' : '' }}" placeholder="{{ __('tags') }}" value="{{ old('tags', $exam->tags) }}" required autofocus>

                                </div>

                                   <div class="form-group{{ $errors->has('duration') ? ' has-danger' : '' }}">
                                    <label class="form-title-label" for="input-name">{{ __('Duration') }}</label>
                                    <input type="text" name="duration" id="input-name" class="form-control form-control-alternative{{ $errors->has('duration') ? ' is-invalid' : '' }}" placeholder="{{ __('duration') }}" value="{{ old('duration', $exam->duration) }}" required autofocus>

                                </div>

                                <div class="form-group{{ $errors->has('minimum_score') ? ' has-danger' : '' }}">
                                    <label class="form-title-label" for="input-name">{{ __('Minimum score') }}</label>
                                    <input type="text" name="minimum_score" id="input-name" class="form-control form-control-alternative{{ $errors->has('minimum_score') ? ' is-invalid' : '' }}" placeholder="{{ __('minimum_score') }}" value="{{ old('minimum_score', $exam->minimum_score) }}" required autofocus>

                                </div>

                            <?php 
                            $user = DB::table('users')->find($exam->author);
                             ?>
                                <div class="form-group{{ $errors->has('author') ? ' has-danger' : '' }}">
                                    <label class="form-title-label" for="input-name">{{ __('Author') }}</label>
                                    <input type="text" name="author" id="input-name" class="form-control form-control-alternative{{ $errors->has('author') ? ' is-invalid' : '' }}" placeholder="{{ __('author') }}" value="{{ old('author', $user->name) }}" required autofocus>

                                </div>

                            <?php 
                            $sub = DB::table('subcategories')->find($exam->subcategory);
                             ?>
                                 <div class="form-group{{ $errors->has('subcategory') ? ' has-danger' : '' }}">
                                    <label class="form-title-label" for="input-name">{{ __('Subcategory') }}</label>
                                    <input type="text" name="subcategory" id="input-name" class="form-control form-control-alternative{{ $errors->has('subcategory') ? ' is-invalid' : '' }}" placeholder="{{ __('subcategory') }}" value="{{ old('subcategory', $sub->name) }}" required autofocus>

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