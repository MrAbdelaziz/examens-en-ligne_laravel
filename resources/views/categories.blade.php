@extends('layouts.master', ['class' => 'bg-default'])
@section('search')
@endsection
@section('content')
<div class="container-fluid">
    <section style="margin-top:100px;margin-bottom:80px;">
        <div id="main-container" class="container">
            <form name="search" method="get" class="product-search-form" id="product-search-form">
                <div class="search-container">
                    <div class="row">
                        <div class="col-xs-12">
                            <h3 style="margin: 0px 0px 35px 0px !important;"><?php echo '<span style="color:#5e72e4">Category : </span>' . 'All Categories'; ?></h3>
                            <nav class="navbar search-navbar">
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#search-mobile-collapse" aria-expanded="false"><i class="material-icons">filter_list</i></button>
                                </div>
                                <div class="collapse navbar-collapse">
                                    <div class="collapse" id="search-mobile-collapse">
                                        <ul class="nav navbar-nav" style="display:inline;width:100%;padding: 10px;font-size: 15px;letter-spacing: .5px;font-weight: bold;text-transform: uppercase;">
                                            <div class="row">
                                                <div class="col-md-4" style="border:0px;border-right:1px solid #eeeeee;width:33%;">
                                                    <li class="dropdown" id="search_locale-dropdown">
                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                                            <span>Category</span>
                                                        </a>
                                                        <div class="dropdown-menu">
                                                            <ul data-simplebar="">
                                                                @foreach ($categories as $category)
                                                                <li>
                                                                    <div class="pretty p-svg p-curve">
                                                                        <input type="radio" id="search_locale_0" name="search[locale][]" value="fr">
                                                                        <div class="state p-success">
                                                                            <svg class="svg svg-icon" viewBox="0 0 20 20">
                                                                                <path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,0,0.911L7.629,14.566z" style="stroke: white;fill:white;"></path>
                                                                            </svg>
                                                                            <label for="search_locale_0">{{ $category->name }}</label>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    </li>
                                                </div>
                                                <div class="col-md-4" style="border:0px;border-right:1px solid #eeeeee;width:33%;">
                                                    <li class="dropdown" id="search_locale-dropdown">
                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                                            <span>Subcategory</span>
                                                        </a>
                                                        <div class="dropdown-menu">
                                                            <ul data-simplebar="">
                                                                @foreach ($subcategories as $subcategory)
                                                                <li>
                                                                    <div class="pretty p-svg p-curve">
                                                                        <input type="radio" id="search_locale_0" name="search[locale][]" value="fr">
                                                                        <div class="state p-success">
                                                                            <svg class="svg svg-icon" viewBox="0 0 20 20">
                                                                                <path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,0,0.911L7.629,14.566z" style="stroke: white;fill:white;"></path>
                                                                            </svg>
                                                                            <label for="search_locale_0">{{ $subcategory->name }}</label>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    </li>
                                                </div>
                                                <div class="col-md-4" style="border:0px;width:33%;">
                                                    

















                                                </div>
                                            </div>
                                        </ul>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
                <input type="hidden" id="search_from" name="search[from]">
            </form>
            <div class="row">
                <div class="col-xs-12">
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
