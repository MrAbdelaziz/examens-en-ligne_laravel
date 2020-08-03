@extends('layouts.master', ['class' => 'bg-default'])
@section('search')
@endsection
@section('content')
<div class="container-fluid">
    <section style="margin-top:100px;margin-bottom:80px;">
        <div id="main-container" class="container">
            <div class="row">
                <div class="col-xs-12">
                    <form method="get" class="product-search-form" id="product-search-form">
                        <div class="search-container">
                            <div class="row">
                                <div class="col-xs-12">
                                    <h3 style="margin: 0px 0px 20px 0px !important;"><?php echo '<span style="color:#5e72e4">Search of : </span>' . $_GET['tag']; ?></h3>
                                    <nav class="navbar search-navbar">
                                        <div class="navbar-header">
                                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#search-mobile-collapse" aria-expanded="false"><i class="material-icons">filter_list</i></button>
                                        </div>
                                        <div class="collapse navbar-collapse">
                                            <div class="collapse" id="search-mobile-collapse">
                                                <ul class="nav navbar-nav" style="display:inline;width:100%;padding: 5px;font-size: 15px;letter-spacing: .5px;font-weight: bold;text-transform: uppercase;">
                                                    <div class="row">
                                                        <div class="col-10" style="border:0px;border-right:1px solid #eeeeee;">
                                                            <li class="dropdown" id="search_locale-dropdown">
                                                                @if(!empty($tag))
                                                                <input type="search" name="tag" value="{{ $tag }}" style="width:100%;height:100%;min-height:30px;line-height:30px;margin:0;border:0;" placeholder="Search..." />
                                                                @else
                                                                    <input type="search" name="tag" style="width:100%;height:100%;min-height:30px;line-height:30px;margin:0;border:0;" placeholder="Search..." />
                                                                @endif
                                                            </li>
                                                        </div>
                                                        <div class="col-2 text-center">
                                                            <button type="submit" style="background:transparent;border:0;padding:4px 30%;color:#5e72e4;"><i class="fas fa-search"></i></button>
                                                        </div>
                                                    </div>
                                                </ul>
                                            </div>
                                        </div>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div id="search-results" class="search-results">
				        <div>
				            <div class="ais-infinite-hits row product-grid">
                                @foreach ($exams as $exam)
				                <div class="ais-infinite-hits--item col-xs-12 col-sm-6 col-md-4 col-lg-3">    
				                    <div class="product-item product-item--full block--animate">   
				                        <a href="{{ route('exam',$exam->id) }}" title="{{ $exam->title }}">          
				                            <div class="product-item__image-container">  
				                                @if(empty($exams['0']->cover))
                                                    <img src="{{ asset('img/default-exam.jpg') }}" style="width:100%" class="img-fluid" alt="{{ $exam->title }}" data-no-retina="">
                                                @else
                                                    <img src="{{ url('uploads/' . $exam->cover) }}" class="img-fluid" alt="{{ $exam->title }}" data-no-retina="">
                                                @endif
				                            </div>
                                            <div class="product-item__ribbon-container">
                                                <div class="product-item__ribbon" style="background:#19a8d9"><span>Exam</span></div>
                                            </div>          
				                            <div class="product-item__content">
                                                <div class="product-item__title">{{ $exam->title }}</div>  
				                                <div class="product-item__note"></div> 
				                                <div class="product-item__details">                
				                                    <div class="product-item__details__item">
                                                        <i class="material-icons md-18">list_alt</i> 
                                                        <span>{{ $exam->number_questions }} Questions</span>
				                                    </div>
                                                    <div class="product-item__details__item">     
				                                        <i class="material-icons md-18">access_time</i>           
				                                        <span>{{ $exam->duration }} minutes</span>
                                                    </div>         
				                                    <div class="product-item__details__item">
                                                        <i class="material-icons md-18">verified_user</i>      
				                                        <span>Free certification</span>
                                                    </div>
                                                </div>           
				                            </div>
                                        </a>
                                    </div>
                                </div>
                                @endforeach
				            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
