@extends('layouts.app', ['title' => __('Certification Management')])

@section('content')
    @php $path="Certifications" @endphp
    @include('layouts.headers.breadcrumb')
    
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Certifications') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <!--<a href="{{ route('certification.create') }}" class="btn btn-sm btn-primary">{{ __('Add Certification') }}</a>-->
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-12">
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    </div>

                    <div class="table-responsive py-4">
                        <table class="table align-items-center table-flush" id="datatable-basic" class="display">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">{{ __('User') }}</th>
                                    <th scope="col">{{ __('Exam') }}</th>
                                    <th scope="col">{{ __('Inscription Date') }}</th>
                                    <th scope="col">{{ __('Time Spent - Minutes') }}</th>
                                    <th scope="col">{{ __('Score - %') }}</th>
                                    <th scope="col">{{ __('Certification Status') }}</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($items))
                                @foreach ($items as $certification)
                                    <tr>
                                        <td>{{ $certification->user['name'] }}</td>
                                        <td>{{ $certification->exam['title'] }}</td>
                                        <td>{{ $certification->created_at->format('d/m/Y H:i') }}</td>
                                        <td>
                                            <?php
                                                $from=\Carbon\Carbon::parse($certification->start_date);
                                                $to=\Carbon\Carbon::parse($certification->end_date);
                                            ?>
                                            {{ $to->diffInMinutes($from, true) }}
                                        </td>
                                        <td>{{ $certification->score }}</td>
                                        <td>
                                            <?php $statusss=''; ?>
                                            @if($certification->certification_status == 1)
                                                <span class="badge badge-dot mr-4 badge-success"><i class="bg-success"></i><span class="status">Certified</span></span>
                                                <?php $statusss='1'; ?>
                                            @elseif($certification->certification_status == 2 && \Carbon\Carbon::parse($certification->limit_start_exam_date)>\Carbon\Carbon::now())
                                                <span class="badge badge-dot mr-4 badge-warning"><i class="bg-warning"></i><span class="status">Pending</span></span>
                                                <?php $statusss='2'; ?>
                                            @elseif($certification->certification_status == 3 || \Carbon\Carbon::parse($certification->limit_start_exam_date)<=\Carbon\Carbon::now())
                                                <span class="badge badge-dot mr-4 badge-danger"><i class="bg-danger"></i><span class="status">Not Certified</span></span>
                                                <?php $statusss='3'; ?>
                                            @endif
                                        </td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    @if(Auth::user()->role_id == 1 || Auth::user()->role_id == 2)
                                                    @if($statusss == '2')
                                                    <form action="{{ route('certification.accept') }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{!! $certification->id !!}">
                                                        <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to accept this Certification?") }}') ? this.parentElement.submit() : ''">{{ __('Certifying') }}</button>
                                                    </form>
                                                    <form action="{{ route('certification.reject') }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{!! $certification->id !!}">
                                                        <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to refuse this Certification?") }}') ? this.parentElement.submit() : ''">{{ __('Refuse Certifying') }}</button>
                                                    </form>
                                                    @endif
                                                    @endif
                                                    @if(Auth::user()->role_id == 4 && $certification->certification_status == 1)
                                                    <form action="{{ route('home_path') . '/certif/generate.php' }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $certification->exam_id }}" />
                                                        <input type="hidden" name="user" value="{{ $certification->user_id }}" />
                                                        <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to download this Certification?") }}') ? this.parentElement.submit() : ''">{{ __('Download the certificate') }}</button>
                                                    </form>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                        <script type="text/javascript">
                            $(document).ready(function(){$('#datatable-basic').DataTable();});
                        </script>
                    </div>
                </div>
            </div>
        </div>
            
        @include('layouts.footers.auth')
    </div>
@endsection