@extends('layouts.app', ['title' => __('Exam Management')])

@section('content')
    @php $path="Exams" @endphp
    @include('layouts.headers.breadcrumb')
    
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Exams') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                @if(Auth::user()->role_id == 1 || Auth::user()->role_id == 2 || Auth::user()->role_id == 3)
                                <a href="{{ route('exam.create') }}" class="btn btn-sm btn-primary">{{ __('Add exam') }}</a>
                                @endif
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
                                    <th scope="col">{{ __('Name') }}</th>
                                    <th scope="col">{{ __('Category') }}</th>
                                    <th scope="col">{{ __('Author') }}</th>
                                    <th scope="col">{{ __('Status') }}</th>
                                    <th scope="col">{{ __('Creation Date') }}</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($items) && !empty($items))
                                @foreach ($items as $exam)
                                    <tr>
                                        <td>{{ $exam->title }}</td>
                                        <td>{{ $exam->subcategorie['name'] }}</td>
                                        <td>{{ $exam->user['name'] }}</td>
                                        <td>
                                            @if($exam->status == 1)
                                                <span class="badge badge-dot mr-4 badge-success"><i class="bg-success"></i><span class="status">Published</span></span>
                                            @elseif($exam->status == 2)
                                                <span class="badge badge-dot mr-4 badge-warning"><i class="bg-warning"></i><span class="status">Pending</span></span>
                                            @elseif($exam->status == 3)
                                                <span class="badge badge-dot mr-4 badge-danger"><i class="bg-danger"></i><span class="status">Deactivated</span></span>
                                            @endif
                                        </td>
                                        <td>{{ $exam->created_at->format('d/m/Y H:i') }}</td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    @if(Auth::user()->role_id == 1 || Auth::user()->role_id == 2 || Auth::user()->role_id == 3)
                                                    <!-- Edit -->
                                                    <a class="dropdown-item" href="{{ route('exam.edit', $exam) }}">{{ __('Edit') }}</a>
                                                    @endif
                                                    @if(Auth::user()->role_id == 1 || Auth::user()->role_id == 2)
                                                    @if($exam->status == 1)
                                                        <!-- Deactivate -->
                                                        <form action="{{ route('exam.deactivate') }}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{!! $exam->id !!}">
                                                            <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to deactivate this exam?") }}') ? this.parentElement.submit() : ''">{{ __('Deactivate') }}</button>
                                                        </form>
                                                    @elseif($exam->status == 2 || $exam->status == 3)
                                                        <!-- Activate -->
                                                        <form action="{{ route('exam.activate') }}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{!! $exam->id !!}">
                                                            <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to activate this exam?") }}') ? this.parentElement.submit() : ''">{{ __('Activate') }}</button>
                                                        </form>
                                                    @endif
                                                    <!-- Delete -->
                                                    <form action="{{ route('exam.destroy', $exam) }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this exam?") }}') ? this.parentElement.submit() : ''">{{ __('Delete') }}</button>
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