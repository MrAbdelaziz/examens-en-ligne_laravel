@extends('layouts.master', ['class' => 'bg-default'])
@section('search')
@endsection
@section('content')
<style>
.catalog-product-view .product-header {
    background: url(/landing/images/page-header.jpg) no-repeat;
        background-size: auto;
    background-size: cover;
    height: auto;
    min-height: 190px;
}
.catalog-product-view .product-header .page-header__title h1 {
    display: table-cell;
    height: 84px;
    line-height: 28px;
    margin: 0;
    vertical-align: middle;
    padding: 40px 0px !important;
}
.page-header__title, .page-header h1 {
    color: #fff;
    margin-top: 100px;
    color: #fff;
    font-size: 26px;
    font-weight: 700;
}
h2, h3 {
    color: #5e72e4 !important;
    font-size: 30px !important;
    padding: 15px 0px;
}
</style>
<div class="catalog-product-view" id="catalog_product_view">
    <header>
        <div class="page-header product-header" id="product-header">
            <div class="container" style="margin-top:50px;">
                <div class="row">
                    <div class="col-xs-12 col-sm-5">
                        <div class="product-header__tag__container">
                            <div class="product-header__tag color--white" style="background:#5e72e4">Resource : Exam</div>
                            <div class="product-header__tag background-color--tradewind color--white">Status : Active</div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-md-8">
                        <div class="page-header__title">
                            <h1>{{ $exams['0']->title }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <section>
        <div id="main-container" class="container">
            <div class="product-infos">
                <div class="row">
                    <div class="col-xs-12 col-sm-push-7 col-sm-5 col-md-push-8 col-md-4">
                        <div class="product-block-column__container">
                            <div class="product-block-column" style="">
                                <div class="block block-details product-block-details" style="border-color:#5e72e4">
                                    <div class="block-details__media" style="">
                                        <div class="block-details__video">
                                            @if(empty($exams['0']->cover))
                                                <img src="{{ asset('img/default-exam.jpg') }}" style="width:100%;max-height: 210px;" class="img-fluid">
                                            @else
                                                <img src="{{ url('uploads/' . $exam['0']->cover) }}" class="img-fluid">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="product-block-details__button__container">
                                        <div class="product-block-details__button mt-3 mb-3 text-center">
                                            <!--<span class="ml-auto mr-auto" style="color:#3081a9;font-size:30px;font-weight:bold;">00:13:25</span>-->







                                            <style>
                                                li {
                                                  display: inline-block;
                                                  font-size: 12px;
                                                  list-style-type: none;
                                                  padding: 1em;
                                                  text-transform: uppercase;
                                                }
                                                li span {
                                                  display: block;
                                                  font-size: 25px;
                                                }
                                            </style>
                                            <span class="ml-auto mr-auto" style="color:#3081a9;font-size:30px;font-weight:bold;">
                                                <h6 style="margin:30px 10px 10px 10px;color:#384158;">You still have</h6>
                                                <ul>
                                                    <li><span id="hours"></span>Hours</li>
                                                    <li><span id="minutes"></span>Minutes</li>
                                                    <li><span id="seconds"></span>Seconds</li>
                                                </ul>
                                            </span>
                                        </div>
                                    </div>
                                    <script type="text/javascript">
                                        // counter
                                        const second = 1000,
                                        minute = second * 60,
                                        hour = minute * 60,
                                        day = hour * 24;
                                        let time_in_minutes = "<?php echo $exams['0']->duration; ?>";
                                        let startdt = Date.parse(new Date());
                                        let enddt = new Date(startdt + time_in_minutes*60*1000);
                                        let countDown = new Date(enddt).getTime(),
                                        x = setInterval(function() {
                                            let now = new Date().getTime(),
                                            distance = countDown - now;
                                            document.getElementById('hours').innerText = Math.floor((distance % (day)) / (hour)),
                                            document.getElementById('minutes').innerText = Math.floor((distance % (hour)) / (minute)),
                                            document.getElementById('seconds').innerText = Math.floor((distance % (minute)) / second);
                                        }, second);
                                        // submit if timeout
                                        let varTimerInMiliseconds = "<?php echo $exams['0']->duration * 60000; ?>";
                                        setTimeout(function(){ 
                                            document.getElementById("ExamForm").submit();
                                        }, varTimerInMiliseconds);
                                    </script>
                                    <div class="block-details__content product-block-details__content">
                                        <div class="block-details__content__item">
                                            <i class="material-icons md-18">date_range</i>
                                            <span>Creadted At {{ $exams['0']->created_at }}</span>
                                        </div>
                                            <div class="block-details__content__item">
                                                <i class="material-icons md-18">event_note</i>
                                                <span>Updated At {{ $exams['0']->updated_at }}</span>
                                            </div>
                                            <div class="block-details__content__item">
                                                <i class="material-icons md-18">list</i>
                                                <span>{{ $exams['0']->number_questions }} Questions</span>
                                            </div>
                                            <div class="block-details__content__item">
                                                <i class="material-icons md-18">access_time</i>
                                                <span>{{ $exams['0']->duration }} Minutes</span>
                                            </div>
                                            <div class="block-details__content__item">
                                                <i class="material-icons md-18">credit_card</i>
                                                <span>Free Access</span>
                                            </div>
                                            <div class="block-details__content__item">
                                                <i class="material-icons md-18">verified_user</i>
                                                <span>Free Certification</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-pull-5 col-sm-7 col-md-pull-4 col-md-7">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="product-key-infos">
                                        <!--<h2 class="product-key-infos__title">Key information</h2>-->
                                        <div class="product-key-infos__content">
                                            <div class="row">
                                                <div class="col-xs-6 col-sm-4">
                                                    <div class="product-key-infos__item">
                                                        <i class="material-icons xs-24 sm-36 color--curious-blue">credit_card</i>
                                                        <span><b>Free</b> access</span>
                                                    </div>
                                                </div>
                                                <div class="col-xs-6 col-sm-4">
                                                    <div class="product-key-infos__item">
                                                        <i class="material-icons xs-24 sm-36 color--tradewind">verified_user</i>
                                                        <span><b>Free</b> Certification</span>
                                                    </div>
                                                </div>
                                                <div class="col-xs-6 col-sm-4">
                                                <div class="product-key-infos__item">
                                                    <i class="material-icons xs-24 sm-36 color--burt-sienna">timer</i>
                                                    <span><b>{{ $exams['0']->duration }}</b> minutes in total</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <form method="post" id="ExamForm" action="{{ route('sendpass',['id'=>$exams['0']->id, 'user'=>Auth::user()->id,]) }}">
                        @csrf
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="product-resume product-resume--learn-more" id="resume" style="padding: 20px;">
                                    <?php $y=0; ?>
                                    @foreach($content["questions"] as $questkey=>$quest)
                                    <!-- Start Qestion -->
                                    <h3 class="product-resume__title" style="display:inline;font-size:24px !important;">Q{{  $questkey+1 }} : </h3>
                                    <h3 style="display:inline;color:#384158 !important;font-size:24px !important;">{{ $quest['content_area_one'] }}</h3>
                                    <hr style="margin-bottom:5px;"/>
                                    <h6 style="color:#9c9c9c !important;margin: 0px 30px;padding: 12px 0px;border-bottom: 1px solid #eee;text-align: center;">{{ $quest['content_area_two'] }}</h6>
                                    <div class="product-resume__content" style="line-height: 25px;font-size: 16px;margin: 20px 5px 30px 5px;">
                                        @foreach($content["answers"][$questkey] as $ansrkey=>$ansr)
                                        <?php $y++; ?>
                                            @if(App\Http\Controllers\PublicController::getNbrCorrectAnswers($quest['id'])==1)
                                            <div class="form-group">
                                                <input type="radio" id="{{ 'FormControlInput' . $y }}" name="q_{{ $questkey+1 }}"
                                                <?php
                                                    if($ansr['is_correct_answer']==0){
                                                        $aaa=$ansr['is_correct_answer']+33;
                                                        echo ' value="' . $aaa . '" ';
                                                    }elseif($ansr['is_correct_answer']==1){
                                                        $bbb=$ansr['is_correct_answer']+65;
                                                        echo ' value="' . $bbb . '" ';
                                                    }
                                                ?>
                                                >
                                                <label for="{{ 'FormControlInput' . $y }}"> {{ $ansr["content"] }}</label>
                                            </div>
                                            @else
                                            <div class="form-group">
                                                <input type="checkbox" id="{{ 'FormControlInput' . $y }}" name="q_{{ $questkey+1 }}[]"
                                                <?php
                                                    if($ansr['is_correct_answer']==0){
                                                        $aaa=$ansr['is_correct_answer']+33;
                                                        $ccc=App\Http\Controllers\PublicController::getNbrCorrectAnswers($quest['id']);
                                                        echo ' value="' . $ccc . '.' . $aaa . '" ';
                                                    }elseif($ansr['is_correct_answer']==1){
                                                        $bbb=$ansr['is_correct_answer']+65;
                                                        $ddd=App\Http\Controllers\PublicController::getNbrCorrectAnswers($quest['id']);
                                                        echo ' value="' . $ddd . '.' . $bbb . '" ';
                                                    }
                                                ?>
                                                >
                                                <label for="{{ 'FormControlInput' . $y }}"> {{ $ansr["content"] }}</label>
                                            </div>
                                            @endif
                                        @endforeach
                                    </div>
                                    <!-- End Qestion -->
                                    <hr style="margin-bottom:50px;border:0;"/>
                                    @endforeach
                                    <hr/>
                                    <input type="hidden" name="examid" value="<?php echo $exams['0']->id; ?>"/>
                                    <div class="text-center" style="margin:10px;">
                                        <button type="submit" class="btn btn-lg courses_button trans_200" title="{{ $exams['0']->title }}" style="margin:0 !important;"><i class="far fa-paper-plane"></i> <span style="color: #ffffff;font-weight: bold;letter-spacing: 0.7px;">SEND</span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer></footer>
    <script src="{{ asset('landing') }}/js/jquery-3.3.1.min.js"></script>
    <script>
        $(document).ready(function () {
            $(window).scroll(function () {
                fixedFeedColumn();
            }).resize(function() {
                fixedFeedColumn();
            });
            fixedFeedColumn();
        });

        var allowFixedFeedColumn = false;

        function fixedFeedColumn() {
            var documentScrollTop = $(document).scrollTop();
            var heigthMenu = $('#navbar-top').outerHeight() | 0;
            var heigthMedia = $('.block-details__media').outerHeight() | 0;
            var feedColumn = $('.product-block-column__container');
            var margin = 60;

            var widthFeed = feedColumn.width();
            var topPositionFeed = feedColumn.offset().top + heigthMedia;

            var heightFeedContainer = feedColumn.children().height() - heigthMedia;
            var heightMainContainer = feedColumn.closest('.row').height();
            var topPositionMainContainer = feedColumn.closest('.row').offset().top;
            var bottomPositionMainContainer = topPositionMainContainer + heightMainContainer - documentScrollTop;

            if (!allowFixedFeedColumn && ((heightFeedContainer * 2) - heightMainContainer) > 50) { // 50 is a margin
                return;
            }

            allowFixedFeedColumn = true;

            if ((topPositionFeed - documentScrollTop - heigthMenu - margin < 0) && ($(window).width() > 767)) {

                var top = '';
                var bottom = '';

                if (bottomPositionMainContainer - (heightFeedContainer + heigthMenu + margin) > 0) { //Fix in bottom
                    top = margin + heigthMenu + 'px';
                } else {
                    bottom = $(window).height() - bottomPositionMainContainer + 15 + 'px';
                }

                feedColumn.addClass('product-block-column__container--fixed');
                feedColumn.children().css({'width': widthFeed, 'top': top, 'bottom': bottom});
            } else {
                feedColumn.removeClass('product-block-column__container--fixed');
                feedColumn.children().css({'width': '', 'bottom': '', 'top': ''});
            }
        }

        fixedFeedColumn();
    </script>
@endsection
