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
                        <form method="post" action="{{ route('exam.store') }}" class="exam-add-form" autocomplete="off">
                            @csrf
                            @for($quest=1;$quest<=$exam['number_questions'];$quest++)
                                <div class="mb-4 mt-3">
                                    <h6 style="display:inline;" class="heading">{!! __('Q') . $quest . __('. ') . $exam['questions'][$quest]['content_area_one'] !!}</h6>
                                    @if(!empty($exam['questions'][$quest]['content_area_two']))
                                        <h6 style="display:inline;" class="heading">{{ __(' | ') }}</h6><h6 style="display:inline;" class="heading-small text-muted">{!! $exam['questions'][$quest]['content_area_two'] !!}</h6>
                                    @endif
                                </div>
                                <div class="pl-lg-4" id="step3-exam-question-answers-{!! $quest !!}">
                                    @for($ans=1;$ans<=$exam['questions'][$quest]['nbr_answers'];$ans++)
                                        <div class="form-group{{ $errors->has('content_q{!! $quest !!}_a{!! $ans !!}') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-q{!! $quest !!}-a{!! $ans !!}">{{ __('Answer ') . $ans . __('/') . $exam['questions'][$quest]['nbr_answers'] }} <span class="required-fi">*</span></label>
                                            <textarea name="content_q{!! $quest !!}_a{!! $ans !!}" id="input-q{!! $quest !!}-a{!! $ans !!}" class="form-control form-control-alternative{{ $errors->has('content_q{!! $quest !!}_a{!! $ans !!}') ? ' is-invalid' : '' }}" placeholder="{{ __('Answer') }}" value="{{ old('content_q{!! $quest !!}_a{!! $ans !!}') }}" required></textarea>
                                            @if ($errors->has('content_q{!! $quest !!}_a{!! $ans !!}'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('content_q{!! $quest !!}_a{!! $ans !!}') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    @endfor
                                    <div class="form-group{{ $errors->has('correct_answers_q{!! $quest !!}') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-correct_answers_q{!! $quest !!}">{{ __('Choose the correct answers') }} <span class="required-fi">*</span></label>
                                        <select name="correct_answers_q{!! $quest !!}[]" id="input-correct_answers_q{!! $quest !!}" class="custom-select form-control form-control-alternative{{ $errors->has('correct_answers_q{!! $quest !!}') ? ' is-invalid' : '' }}" size="4" multiple required>
                                            @for($anslist=1;$anslist<=$exam['questions'][$quest]['nbr_answers'];$anslist++)
                                                <option value="{{ $anslist }}" {{ (old("correct_answers_q{!! $quest !!}[$anslist-1]") == $anslist ? "selected":"") }}>{{ __('Answer ') . $anslist . __('/') . $exam['questions'][$quest]['nbr_answers'] }}</option>
                                            @endfor
                                        </select>
                                        @if ($errors->has('correct_answers_q{!! $quest !!}'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('correct_answers_q{!! $quest !!}') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            @endfor

                            <div class="text-center">
                                <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        @include('layouts.footers.auth')
    </div>
@endsection