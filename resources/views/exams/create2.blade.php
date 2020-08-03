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
                        <form method="post" action="{{ route('exam.step3') }}" class="exam-add-form" autocomplete="off">
                            @csrf
                            @for($quest=1;$quest<=$exam['number_questions'];$quest++)
                            <h6 class="heading-small text-muted mb-4">{!! __('Question ') . $quest . __('/') . $exam['number_questions'] !!}</h6>
                            <div class="pl-lg-4" id="step2-exam-question-{!! $quest !!}">
                                <div class="form-group{{ $errors->has('question_{!! $quest !!}') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-question-{!! $quest !!}">{{ __('Question') }} <span class="required-fi">*</span></label>
                                    <textarea name="question_{!! $quest !!}" id="input-question-{!! $quest !!}" class="form-control form-control-alternative{{ $errors->has('question_{!! $quest !!}') ? ' is-invalid' : '' }}" placeholder="{{ __('Question') }}" value="{{ old('question_{!! $quest !!}') }}" required></textarea>
                                    @if ($errors->has('question_{!! $quest !!}'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('question_{!! $quest !!}') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('complements_{!! $quest !!}') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-complements-{!! $quest !!}">{{ __('Complements') }}</label>
                                    <textarea name="complements_{!! $quest !!}" id="input-complements-{!! $quest !!}" class="form-control form-control-alternative{{ $errors->has('complements_{!! $quest !!}') ? ' is-invalid' : '' }}" placeholder="{{ __('Complements') }}" <!--value="{{ old('complements_{!! $quest !!}') }}"-->></textarea>
                                    @if ($errors->has('complements_{!! $quest !!}'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('complements_{!! $quest !!}') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('nbr_answers_{!! $quest !!}') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-number-nbr-answers-{!! $quest !!}">{{ __('Number Of Possible Answers') }} <span class="required-fi">*</span></label>
                                    <input type="number" min="2" max="20" name="nbr_answers_{!! $quest !!}" id="input-nbr-answers-{!! $quest !!}" class="form-control form-control-alternative{{ $errors->has('nbr_answers_{!! $quest !!}') ? ' is-invalid' : '' }}" placeholder="{{ __('Number Of Possible Answers') }}" value="{{ old('nbr_answers_{!! $quest !!}') }}" required>
                                    @if ($errors->has('nbr_answers_{!! $quest !!}'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('nbr_answers_{!! $quest !!}') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            @endfor

                            <div class="text-center">
                                <button type="submit" class="btn btn-success mt-4">{{ __('Next') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        @include('layouts.footers.auth')
    </div>
@endsection