@extends('layouts.master', ['class' => 'bg-default'])
<!-- Header Search Section -->
@section('search')
<script>
   var element = document.getElementById("nv1");
    element.classList.add("active");
</script>
<div class="home">
    <div class="home_slider_container">
        <!-- Home Slider -->
        <div class="owl-carousel owl-theme home_slider">
            <!-- Home Slider Item -->
            <div class="owl-item">
                <div class="home_slider_background" style="background-image:url({{ asset('landing') }}/images/home_slider_1.jpg)"></div>
                <div class="home_slider_content">
                    <div class="container">
                        <div class="row">
                            <div class="col text-center">
                                <div class="home_slider_title">VERIFY YOUR SKILLS</div>
                                <div style="font-family:'Roboto Slab',serif;font-size: 36px;font-weight: 700;line-height: 1.2;color: #384158;">AND UNLOCK OPPORTUNITY</div>
                                <div class="home_slider_subtitle">Find Your Online Exam</div>
                                    <div class="home_slider_form_container">
                                        <form action="{{ route('search') }}" method="get" id="home_search_form_1" class="home_search_form d-flex flex-lg-row flex-column align-items-center justify-content-between">
                                            
                                            <div class="d-flex flex-row align-items-center justify-content-start">
                                                <input name="tag" type="search" class="home_search_input" placeholder="Keyword Search" required>
                                                <select name="cat" class="dropdown_item_select home_search_input">
                                                    <option value="" selected>Select A Category</option>
                                                    <!--@if(isset($subcategories))
                                                        @foreach($subcategories as $cat => $subcat)
                                                            <optgroup label="<?php // echo $cat; ?>">
                                                                <option value="{{ $cat }}">
                                                                    {{ 'All of ' . $cat }}
                                                                </option>
                                                            @foreach ($subcat as $subcatego)
                                                                <option value="{{ $subcatego->parent }}">
                                                                    {{ $subcatego->name }}
                                                                </option>
                                                            @endforeach
                                                            </optgroup>
                                                        @endforeach
                                                    @endif-->
                                                    @if(isset($subcategories))
                                                        @foreach($subcategories as $cat => $subcat)
                                                            <optgroup label="<?php echo $cat; ?>">
                                                                <option value="{{ $cat }}">
                                                                    {{ 'All of ' . $cat }}
                                                                </option>
                                                            </optgroup>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                            <button type="submit" class="home_search_button">search</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</div>
@endsection
<!-- Body Page Sections -->
@section('content')
    <div class="container" style="padding-top:30px;padding-bottom:30px;">
        <div class="row">
            <div class="col">
                <div class="section_title_container text-center">
                    <h2 class="section_title">Popular Categories</h2>
                    <div class="section_subtitle text-center">
    					<p class="text-center">Select the category you are interested in and find out which exams are available. </p>
    				</div>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top:30px;">
            @foreach ($categories as $categorie)
                <div class="category-list__item col-lg-2 col-md-3 col-sm-4 col-xs-6 ml-auto mr-auto">
                    <div class="category-list__item__image-container block block--animate">
                        <a href="{{ route('category',$categorie->id) }}" title="<?php echo $categorie->name; ?>">
                            <div class="category-list__item__image text-center">
                                @if(empty($categorie->icon))
                                    <span class="fas fa-laptop-code" style="font-size:240%"></span>
                                @else
                                    <span class="fas <?php echo $categorie->icon; ?>" style="font-size:240%"></span>
                                @endif
                            </div>
                        </a>
                    </div>
                    <div class="category-list__item__title text-center">
                        <a href="#" title="<?php echo $categorie->name; ?>"><?php echo $categorie->name; ?></a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- Popular Exams -->
    <div class="container" style="padding-top:30px;padding-bottom:30px;">
            <div class="row">
                <div class="col">
                    <div class="section_title_container text-center">
                        <h2 class="section_title">Popular Online Exams</h2>
                        <div class="section_subtitle"></div>
                    </div>
                </div>
            </div>
            <div class="row courses_row">
                @foreach ($exams as $exam)
                <div class="col-lg-4 course_col ml-auto mr-auto">
                    <div class="course">
                        <div class="course_image">
                            @if(empty($exam->cover))
                                <a href="{{ route('exam',$exam->id) }}" style="cursor:pointer;"><img src="{{ asset('img/default-exam.jpg') }}" alt="" class="img-fluid" style="width: 100%"></a>
                            @else
                                <a href="{{ route('exam',$exam->id) }}" style="cursor:pointer;"><img src="{{url('uploads/' . $exam->cover)}}" alt="" class="img-fluid" style="width: 100%"></a>
                            @endif
                        </div>
                        <div class="course_body" style="min-height:250px;">
                            <h3 class="course_title" style="text-transform:capitalize"><a href="{{ route('exam',$exam->id) }}">{{ $exam->title }}</a></h3>
                            <div class="course_teacher" style="text-transform:capitalize">{{ $exam->author }}</div>
                            <div class="course_text">
                                <p><?php echo substr($exam->description, 0, 150); ?></p>
                            </div>
                        </div>
                        <div class="course_footer">
                            <div class="course_footer_content d-flex flex-row align-items-center justify-content-start">
                                <div class="course_price ml-auto mt-2 mb-2">
                                    <a class="course_price" href="{{ route('exam',$exam->id) }}">Show Exam</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col examsall">
                    <div class="courses_button trans_200">
                        <a href="{{ route('categories') }}">view all exams</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid" style="background-color:#4f4f4f;padding-top:30px;padding-bottom:30px;">
            <div class="row">
                <div class="col">
                    <div class="section_title_container text-center">
                        <h2 class="section_title" style="color:white">Certification Process</h2>
                        <div class="section_subtitle"><p style="color:white;margin: 30px 5px 10px;text-align: center;">The world needs Superheroes. Will you answer the call?</p></div>
                    </div>
                </div>
            </div>
            <div class="row events_row">
                <div class="col-6-12 ml-auto mr-auto text-center" style="width:75%;  height:100%;">
                    <img class="img-fluid" src="/landing/images/CERTLOGO.png">
                </div>
            </div>
        </div>
        <div class="container" style="padding-top:30px;padding-bottom:30px;">
            <div class="row">
                <div class="col">
                    <div class="section_title_container text-center">
                        <h2 class="section_title">The Best Authors in Town</h2>
                        <div class="section_subtitle">
                            <p style="text-align:center;">A group of Professionals in their fields of Studies Equipped with Years of Experiences </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row team_row">
                @foreach ($authors as $author)
                    <div class="col-lg-3 col-md-6 team_col ml-auto mr-auto">
                        <div class="team_item">
                            <div class="team_image">
                                @if(empty($author->avatar))
                                    <img src="{{ asset('img/default-user.jpg') }}" alt="">
                                @else
                                    <img src="{{url('uploads/' . $author->avatar)}}" alt="">
                                @endif
                            </div>
                            <div class="team_body">
                                <div class="team_title"><a href="#">{{ $author->name }}</a></div>
                                <div class="team_subtitle">{{ $author->bio }}</div>
                                <div class="social_list">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
