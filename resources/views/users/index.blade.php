@extends('layouts.app', ['title' => __('User Management')])

@section('content')
    @php $path=$therole @endphp
    @include('layouts.headers.breadcrumb')
    
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ $therole }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                @if(Auth::user()->role_id == 1 || Auth::user()->role_id == 2)
                                <a href="{{ route('user.create') }}" class="btn btn-sm btn-primary">{{ __('Add user') }}</a>
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
                                    <th scope="col">{{ __('Image') }}</th>
                                    <th scope="col">{{ __('Name') }}</th>
                                    <th scope="col">{{ __('Email') }}</th>
                                    <th scope="col">{{ __('Role') }}</th>
                                    <th scope="col">{{ __('Status') }}</th>
                                    <th scope="col">{{ __('Sign-up Date') }}</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($items))
                                @foreach ($items as $user)
                                    <tr>
                                        <td>
                                            <span class="avatar avatar-sm rounded-circle">
                                                <img src="http://i.pravatar.cc/200" alt="" style="max-width: 100px; border-radiu: 25px">
                                            </span>
                                        </td>
                                        <td>{{ $user->name }}</td>
                                        <td><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>
                                        <td>
                                            @if($user->role_id == 1)
                                                {{ __('Administrator') }}
                                            @elseif($user->role_id == 2)
                                                {{ __('Supervisor') }}
                                            @elseif($user->role_id == 3)
                                                {{ __('Author') }}
                                            @elseif($user->role_id == 4)
                                                {{ __('Member') }}
                                            @else
                                                {{ __('-') }}
                                            @endif
                                        </td>
                                        <td>
                                            @if($user->status == 1)
                                                <span class="badge badge-dot mr-4 badge-success"><i class="bg-success"></i><span class="status">Active</span></span>
                                            @elseif($user->status == 2)
                                                <span class="badge badge-dot mr-4 badge-warning"><i class="bg-warning"></i><span class="status">Pending</span></span>
                                            @elseif($user->status == 3)
                                                <span class="badge badge-dot mr-4 badge-danger"><i class="bg-danger"></i><span class="status">Inactive</span></span>
                                            @endif
                                        </td>
                                        <td>{{ $user->created_at->format('d/m/Y H:i') }}</td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    @if ($user->id != auth()->id())
                                                        <!-- Edit -->
                                                        <a class="dropdown-item" href="{{ route('user.edit', $user) }}">{{ __('Edit') }}</a>
                                                        @if($user->status == 1)
                                                            <!-- Deactivate -->
                                                            <form action="{{ route('user.deactivate') }}" method="post">
                                                                @csrf
                                                                <input type="hidden" name="id" value="{!! $user->id !!}">
                                                                <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to deactivate this user?") }}') ? this.parentElement.submit() : ''">{{ __('Deactivate') }}</button>
                                                            </form>
                                                        @elseif($user->status == 2 || $user->status == 3)
                                                            <!-- Activate -->
                                                            <form action="{{ route('user.activate') }}" method="post">
                                                                @csrf
                                                                <input type="hidden" name="id" value="{!! $user->id !!}">
                                                                <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to activate this user?") }}') ? this.parentElement.submit() : ''">{{ __('Activate') }}</button>
                                                            </form>
                                                        @endif
                                                        <!-- Delete -->
                                                        <form action="{{ route('user.destroy', $user) }}" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this user?") }}') ? this.parentElement.submit() : ''">{{ __('Delete') }}</button>
                                                        </form>
                                                    @else
                                                        <a class="dropdown-item" href="{{ route('user.edit', $user) }}">{{ __('Edit') }}</a>
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