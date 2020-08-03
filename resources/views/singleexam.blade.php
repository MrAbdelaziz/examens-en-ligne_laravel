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
                                        <div class="product-block-details__button">
                                            @auth
                                                @if(App\Http\Controllers\PublicController::GetExaminationStatus(Auth::user()->id, $exams['0']->id) == 'Unregistered')
                                                <form method="post" action="{{ route('registertoexam',['id'=>$exams['0']->id,'user'=>Auth::user()->id,]) }}">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $exams['0']->id }}" />
                                                    <input type="hidden" name="user" value="{{ Auth::user()->id }}" />
                                                    <button type="submit" class="btn btn-lg courses_button trans_200" title="{{ $exams['0']->title }}"><span style="color: #ffffff;font-weight: bold;letter-spacing: 0.7px;">Register to exam</span><i class="material-icons md-24">arrow_forward</i></button>
                                                </form>
                                                @elseif(App\Http\Controllers\PublicController::GetExaminationStatus(Auth::user()->id, $exams['0']->id) == 'RegisteredPendding')
                                                <a class="btn btn-lg btn-warning courses_button trans_200 disabled" aria-disabled="true" title="{{ $exams['0']->title }}"><span style="color: #ffffff;font-weight: bold;letter-spacing: 0.7px;">Registration is pending</span></a>
                                                @elseif(App\Http\Controllers\PublicController::GetExaminationStatus(Auth::user()->id, $exams['0']->id) == 'RegisteredRejected')
                                                <a class="btn btn-lg btn-danger courses_button trans_200 disabled" aria-disabled="true" title="{{ $exams['0']->title }}"><span style="color: #ffffff;font-weight: bold;letter-spacing: 0.7px;">Registration is rejected</span></a>
                                                @elseif(App\Http\Controllers\PublicController::GetExaminationStatus(Auth::user()->id, $exams['0']->id) == 'RegisteredOutOfTime')
                                                <a class="btn btn-lg btn-secondary courses_button trans_200 disabled" aria-disabled="true" title="{{ $exams['0']->title }}"><span style="color: #ffffff;font-weight: bold;letter-spacing: 0.7px;">Out of time of exam</span></a>
                                                @elseif(App\Http\Controllers\PublicController::GetExaminationStatus(Auth::user()->id, $exams['0']->id) == 'RegisteredAndPassedAndPenddingCertif')
                                                <a class="btn btn-lg btn-dark courses_button trans_200 disabled" aria-disabled="true" title="{{ $exams['0']->title }}"><span style="color: #ffffff;font-weight: bold;letter-spacing: 0.7px;">Certification is pending</span></a>
                                                @elseif(App\Http\Controllers\PublicController::GetExaminationStatus(Auth::user()->id, $exams['0']->id) == 'RegisteredAndPassedAndNotCertified')
                                                <a class="btn btn-lg btn-dark courses_button trans_200 disabled" aria-disabled="true" title="{{ $exams['0']->title }}"><span style="color: #ffffff;font-weight: bold;letter-spacing: 0.7px;">Certification has refused</span></a>
                                                @elseif(App\Http\Controllers\PublicController::GetExaminationStatus(Auth::user()->id, $exams['0']->id) == 'RegisteredAndPassedAndCertified')
                                                <form method="post" action="{{ route('home_path') . '/certif/generate.php' }}">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $exams['0']->id }}" />
                                                    <input type="hidden" name="user" value="{{ Auth::user()->id }}" />
                                                    <button type="submit" class="btn btn-lg courses_button trans_200" title="{{ $exams['0']->title }}"><span style="color: #ffffff;font-weight: bold;letter-spacing: 0.7px;">Download the certificate</span></button>
                                                </form>
                                                @elseif(App\Http\Controllers\PublicController::GetExaminationStatus(Auth::user()->id, $exams['0']->id) == 'RegisteredAccepted')
                                                <form method="post" action="{{ route('passexam',['id'=>$exams['0']->id,'user'=>Auth::user()->id,]) }}">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $exams['0']->id }}" />
                                                    <input type="hidden" name="user" value="{{ Auth::user()->id }}" />
                                                    <button type="submit" class="btn btn-lg courses_button trans_200" title="{{ $exams['0']->title }}"><span style="color: #ffffff;font-weight: bold;letter-spacing: 0.7px;">Start The Exam</span><i class="material-icons md-24">arrow_forward</i></button>
                                                </form>
                                                @endif
                                            @endauth
                                            @guest
                                                <a href="{{ route('login') }}" class="btn btn-lg courses_button trans_200" title="Supply Chain Management: A Decision-Making Framework"><span>LOG IN</span><i class="material-icons md-24">arrow_forward</i></a>
                                            @endguest
                                        </div>
                                    </div>
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
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="product-resume product-resume--learn-more" id="resume">
                                    <h2 class="product-resume__title">About the exam</h2>
                                    <div class="product-resume__content">
                                        <p></p>
                                        <p>{{ $exams['0']->description }}</p>
                                        <p></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row"></div>
                    </div>
                </div>
            </div>
            <div id="product-review">
                <div class="product-review">
            </div>
        </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="product-interested_by__more">
                            <a href="{{ route('categories') }}">
                                <i class="fas fa-plus"></i>
                                <!--<i class="material-icons md-18">add</i>-->
                                <span>See others exams</span>
                            </a>
                        </div>
                    </div>
                </div>
        <!--<div class="product-interested_by">
            <div class="row">
                <div class="col-xs-12">
                    <!--<h4 class="product-interested_by__title">You may be interested by...</h4>--
                </div>
            </div>
            <div class="product-list owl-carousel owl-loaded owl-drag">
                <div class="row">



                    <!-- one exam --
                    <div class="col-md-4">
                        <div class="owl-stage-outer">
                            <div class="owl-item cloned" style="width: 360px; margin-right: 30px;">
                                <div class="product-item">
                                    <a href="/en/mooc/understanding-blockchain-and-its-implications/" title="Blockchain: Understanding Its Uses and Implications">
                                        <div class="product-item__image-container">
                                            <img src="../1" data-no-retina="">
                                        </div>
                                        <div class="product-item__ribbon-container">
                                            <div class="product-item__ribbon" style="background:#5e72e4"><span>Exam</span></div>
                                        </div>
                                        <div class="product-item__content">
                                            <div class="product-item__title">
                                                Blockchain 1: Understanding Its Uses and Implications
                                            </div>
                                            <div class="product-item__price">
                                                <i class="material-icons color--mantis">money_off</i>
                                                <span>Free</span>
                                            </div>
                                            <div class="product-item__note">
                                                <div class="stars  ">
                                                    <a class="course_price" href="../1" style="font-size:14px;margin:5px;">Show Exam</a>
                                                </div>
                                            </div> 
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- one exam --



                </div>
                <div class="owl-nav disabled">
                    <button type="button" role="presentation" class="owl-prev"><span aria-label="Previous">‹</span></button><button type="button" role="presentation" class="owl-next"><span aria-label="Next">›</span></button>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="product-interested_by__more">
                            <a href="{{ route('categories') }}">
                                <i class="material-icons md-18">add</i>
                                <span>See others exams</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                            $(document).ready(function () {
                                $('.product-list').owlCarousel({
                                    responsive: {
                                        0: {
                                            items: 1,
                                            loop: true                    },
                                        768: {
                                            items: 2,
                                            loop: true                    },
                                        992: {
                                            items: 3,
                                            loop: true                    }
                                    },
                                    slideBy: 3,
                                    margin: 30,
                                    autoplay: true,
                                    autoplayTimeout: 5000,
                                    smartSpeed: 500,
                                    autoplayHoverPause: true
                                });
                            });
            </script>
        </div>-->
    </section>
    <footer></footer>
    <script src="/landing/js/jquery-3.3.1.min.js"></script>
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
