@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
    
    <div class="container-fluid mt--6">
       
        <div class="row mt-5">
            <div class="col-xl-8 mb-5 mb-xl-0">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Rcent Membres</h3>
                            </div>
                            <div class="col text-right">
                                <a href="{{ route('user.role','members') }}" class="btn btn-sm btn-primary">See all</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">name of membre</th>
                                    <th scope="col">email of membre</th>
                                    <th scope="col">status of membre</th>
              
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $usr)
                                <tr>
                                    <th scope="row">
                                        {{ $usr->name }}
                                    </th>
                                    <td>
                                        {{ $usr->email }}
                                    </td>
                                      <td>
                                        @if($usr->status==1)
                                            <span class="badge badge-dot mr-4 badge-success"><i class="bg-success"></i><span class="status">Active</span></span>
                                        @elseif($usr->status==2)
                                            <span class="badge badge-dot mr-4 badge-warning"><i class="bg-warning"></i><span class="status">Pending</span></span>
                                        @elseif($usr->status==3)
                                            <span class="badge badge-dot mr-4 badge-danger"><i class="bg-danger"></i><span class="status">Inactive</span></span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">finished examinations</h3>
                            </div>
                            <div class="col text-right">
                                <a href="{{ route('home_path') }}/dashboard/certification" class="btn btn-sm btn-primary">See all</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Member</th>
                                    <th scope="col">score</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($examinations as $exm)
                                <tr>
                                    <th scope="row">
                                        {{ App\Http\Controllers\HomeController::getusername($exm->user_id) }}
                                    </th>
                                    <td>
                                        {{ $exm->score }}
                                    </td>
                               
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush