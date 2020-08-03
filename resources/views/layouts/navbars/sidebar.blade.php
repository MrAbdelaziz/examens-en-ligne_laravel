<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <div class="sidenav-header d-flex align-items-center">
            <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ asset('/argon/img/brand/blue.png') }}" class="navbar-brand-img" alt="..."></a>
            <div class="ml-auto">
                <!-- Sidenav toggler -->
                <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
                    <div class="sidenav-toggler-inner">
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Navigation -->
                <ul class="navbar-nav">
                    <!-- Dashboard -->
                    <li class="nav-item">
                        @if (\Route::current()->getName() == 'home')
                        <a class="nav-link active" href="{{ route('home') }}">
                        @else
                        <a class="nav-link" href="{{ route('home') }}">
                        @endif
                            <i class="ni ni-shop text-primary"></i>
                            <span class="nav-link-text">{{ __('Dashboard') }}</span>
                        </a>
                    </li>
                    









                    @if(Auth::user()->role_id == 1 || Auth::user()->role_id == 2)
                    <!-- Posts -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">
                            <i class="far fa-paper-plane text-primary"></i>
                            <span class="nav-link-text">{{ __('Posts') }}</span>
                        </a>
                    </li>
                    <!-- Pages -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">
                            <i class="far fa-clone text-primary"></i>
                            <span class="nav-link-text">{{ __('Pages') }}</span>
                        </a>
                    </li>
                    <!-- Categories -->
                    <li class="nav-item">
                        @if (\Route::current()->getName() == 'category.index' || \Route::current()->getName() == 'subcategory.index' || \Route::current()->getName() == 'category.create' || \Route::current()->getName() == 'category.edit' || \Route::current()->getName() == 'subcategory.create' || \Route::current()->getName() == 'subcategory.edit' )
                        <a class="nav-link active" href="#navbar-categories" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-categories">
                        @else
                        <a class="nav-link" href="#navbar-categories" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-categories">
                        @endif
                            <i class="fas fa-stream text-primary"></i>
                            <span class="nav-link-text">{{ __('Categories') }}</span>
                        </a>
                        @if (\Route::current()->getName() == 'category.index' || \Route::current()->getName() == 'subcategory.index' || \Route::current()->getName() == 'category.create' || \Route::current()->getName() == 'category.edit' || \Route::current()->getName() == 'subcategory.create' || \Route::current()->getName() == 'subcategory.edit' )
                        <div class="collapse show" id="navbar-categories">
                        @else
                        <div class="collapse" id="navbar-categories">
                        @endif
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('category.index') }}">{{ __('Categories') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('subcategory.index') }}">{{ __('Subcategories') }}</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    @endif










                    <!-- Users -->
                    <li class="nav-item">
                        @if (\Route::current()->getName() == 'user.index' || \Route::current()->getName() == 'user.create' || \Route::current()->getName() == 'user.edit' || \Route::current()->getName() == 'user.role'  )
                        <a class="nav-link active" href="#navbar-users" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-users">
                        @else
                        <a class="nav-link" href="#navbar-users" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-users">
                        @endif
                            <i class="far fa-user text-primary"></i>
                            <span class="nav-link-text">{{ __('Users') }}</span>
                        </a>
                        @if (\Route::current()->getName() == 'user.index' || \Route::current()->getName() == 'user.create' || \Route::current()->getName() == 'user.edit' || \Route::current()->getName() == 'user.role' )
                        <div class="collapse show" id="navbar-users">
                        @else
                        <div class="collapse" id="navbar-users">
                        @endif
                            <ul class="nav nav-sm flex-column">
                                @if(Auth::user()->role_id == 1)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('user.role','administrators') }}">{{ __('Administrators') }}</a>
                                </li>
                                @endif
                                @if(Auth::user()->role_id == 1 || Auth::user()->role_id == 2)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('user.role','supervisors') }}">{{ __('Supervisors') }}</a>
                                </li>
                                @endif
                                @if(Auth::user()->role_id == 1 || Auth::user()->role_id == 2 || Auth::user()->role_id == 3)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('user.role','authors') }}">{{ __('Authors') }}</a>
                                </li>
                                @endif
                                @if(Auth::user()->role_id == 1 || Auth::user()->role_id == 2 || Auth::user()->role_id == 4)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('user.role','members') }}">{{ __('Members') }}</a>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </li>










                    <!-- Exams -->
                    <li class="nav-item">
                        @if (\Route::current()->getName() == 'exam.index' || \Route::current()->getName() == 'exam.create' || \Route::current()->getName() == 'exam.edit' || \Route::current()->getName() == 'exam.step2' || \Route::current()->getName() == 'exam.step3' )
                        <a class="nav-link active" href="{{ route('exam.index') }}">
                        @else
                        <a class="nav-link" href="{{ route('exam.index') }}">
                        @endif
                            <i class="far fa-edit text-primary"></i>
                            <span class="nav-link-text">{{ __('Exams') }}</span>
                        </a>
                    </li>










                    @if(Auth::user()->role_id == 1 || Auth::user()->role_id == 2 || Auth::user()->role_id == 4)
                    <!-- Inscriptions -->
                    <li class="nav-item">
                        @if (\Route::current()->getName() == 'inscription.index' )
                        <a class="nav-link active" href="{{ route('inscription.index') }}">
                        @else
                        <a class="nav-link" href="{{ route('inscription.index') }}">
                        @endif
                            <i class="far fa-id-card text-primary"></i>
                            <span class="nav-link-text">{{ __('Inscriptions') }}</span>
                        </a>
                    </li>
                    <!-- Certifications -->
                    <li class="nav-item">
                        @if (\Route::current()->getName() == 'certification.index' )
                        <a class="nav-link active" href="{{ route('certification.index') }}">
                        @else
                        <a class="nav-link" href="{{ route('certification.index') }}">
                        @endif
                            <i class="ni ni-paper-diploma text-primary"></i>
                            <span class="nav-link-text">{{ __('Certifications') }}</span>
                        </a>
                    </li>
                    @endif










                    @if(Auth::user()->role_id == 1)
                    <!-- Settings -->
                    <li class="nav-item">
                        @if (\Route::current()->getName() == 'setting.index' )
                        <a class="nav-link active" href="{{ route('setting.index') }}">
                        @else
                        <a class="nav-link" href="{{ route('setting.index') }}">
                        @endif
                            <i class="fas fa-sliders-h text-primary"></i>
                            <span class="nav-link-text">{{ __('Settings') }}</span>
                        </a>
                    </li>
                    @endif










                </ul>
            </div>
        </div>
    </div>
</nav>