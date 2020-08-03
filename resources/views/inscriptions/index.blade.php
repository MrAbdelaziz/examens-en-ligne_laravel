@extends('layouts.app', ['title' => __('Inscription Management')])

@section('content')
    @php $path="Inscriptions" @endphp
    @include('layouts.headers.breadcrumb')
    
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Inscriptions') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <!--<a href="{{ route('inscription.create') }}" class="btn btn-sm btn-primary">{{ __('Add Inscription') }}</a>-->
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
                                    <th scope="col">{{ __('Inscription Status') }}</th>
                                    <th scope="col">{{ __('Inscription date') }}</th>
                                    <th scope="col">{{ __('Period') }}</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($items) && !empty($items))
                                @foreach ($items as $inscription)
                                    <tr>
                                        <td>{{ $inscription->user['name'] }}</td>
                                        <td>{{ $inscription->exam['title'] }}</td>
                                        <td>
                                            @if($inscription->registration_status == 1)
                                                <span class="badge badge-dot mr-4 badge-success"><i class="bg-success"></i><span class="status">Accepted</span></span>
                                            @elseif($inscription->registration_status == 2)
                                                <span class="badge badge-dot mr-4 badge-warning"><i class="bg-warning"></i><span class="status">Pending</span></span>
                                            @elseif($inscription->registration_status == 3)
                                                <span class="badge badge-dot mr-4 badge-danger"><i class="bg-danger"></i><span class="status">Rejected</span></span>
                                            @endif
                                        </td>
                                        <td>{{ $inscription->created_at->format('d/m/Y H:i') }}</td>
                                        <td>{{ $inscription->possible_start_exam_date->format('d/m/Y H:i') }} - {{ $inscription->limit_start_exam_date->format('d/m/Y H:i') }}</td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    @if(Auth::user()->role_id == 1 || Auth::user()->role_id == 2)
                                                    @if($inscription->registration_status == 2 || $inscription->registration_status == 3)
                                                    <form action="{{ route('inscription.accept') }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{!! $inscription->id !!}">
                                                        <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to accept this inscription?") }}') ? this.parentElement.submit() : ''">{{ __('Accept') }}</button>
                                                    </form>
                                                    @endif
                                                    @if(($inscription->registration_status==2 || $inscription->registration_status==1) && empty($inscription->certification_status))
                                                    <form action="{{ route('inscription.reject') }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{!! $inscription->id !!}">
                                                        <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to reject this inscription?") }}') ? this.parentElement.submit() : ''">{{ __('Reject') }}</button>
                                                    </form>
                                                    @endif
                                                    @if($inscription->registration_status == 3 || $inscription->registration_status == 2)
                                                    <!-- Delete -- IF It's Rejected -->
                                                    <form action="{{ route('inscription.destroy', $inscription) }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this inscription?") }}') ? this.parentElement.submit() : ''">{{ __('Delete') }}</button>
                                                    </form>
                                                    @endif
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