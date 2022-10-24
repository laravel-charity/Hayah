@extends('layouts.master-admin')

@section('title','dashboard')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    i.fa-solid{
        color: #40ab95;
    }
    </style>

<div class="pcoded-content">
        <!-- [ Main Content ] start -->
        <div class="row justify-content-around">
            <!-- table card-1 start -->
            <div class="col-md-10 col-xl-5">
                <div class="card flat-card">
                    <div class="row-table justify-content-around">
                        <div class="col-sm-6 card-body br">
                            <div class="row">
                                <div class="col-sm-4">
                                    <i class="fa-solid fa-users"></i>
                                </div>
                                <div class="col-sm-8 text-md-center">
                                    <h5> {{ $users->count() }}</h5>
                                    <span>Users</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 card-body">
                            <div class="row">
                                <div class="col-sm-4">
                                    <i class="fa-solid fa-hands-holding-child"></i>
                                </div>
                                <div class="col-sm-8 text-md-center">
                                    <h5> {{ $volunteers->count() }}</h5>
                                    <span>Volunteers</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row-table">
                        <div class="col-sm-6 card-body br">
                            <div class="row">
                                <div class="col-sm-4">
                                    <i class="fa-sharp fa-solid fa-list-check"></i>
                                </div>
                                <div class="col-sm-8 text-md-center">
                                    <h5> {{ $projects->count() }}</h5>
                                    <span>Projects</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 card-body">
                            <div class="row">
                                <div class="col-sm-4">
                                    <i class="fa-solid fa-folder-tree"></i>
                                </div>
                                <div class="col-sm-8 text-md-center">
                                    <h5>{{ $category->count() }}</h5>
                                    <span>categories</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- table card-1 end -->
            <!-- table card-2 start -->
            <div class="col-md-10 col-xl-5">
                <div class="card flat-card">
                    <div class="row-table justify-content-around">
                        <div class="col-sm-6 card-body br">
                            <div class="row">
                                <div class="col-sm-4">
                                    <i class="fa-solid fa-hand-holding-dollar"></i>
                                </div>
                                <div class="col-sm-8 text-md-center">
                                    <h5>{{ $donations->count() }}</h5>
                                    <span>Donations</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 card-body">
                            <div class="row">
                                <div class="col-sm-4">
                                    <i class="fa-solid fa-money-bill"></i>
                                </div>
                                <div class="col-sm-8 text-md-center">
                                    <h5>{{ $donations->sum('amount') }}</h5>
                                    <span>JD</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row-table">
                        <div class="col-sm-6 card-body br">
                            <div class="row">
                                <div class="col-sm-4">
                                    <i class="fa-solid fa-envelope"></i>
                                </div>
                                <div class="col-sm-8 text-md-center">
                                    <h5>{{ $contacts->count() }}</h5>
                                    <span>Contacts</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 card-body">
                            <div class="row">
                                <div class="col-sm-4">
                                    <i class="fa-solid fa-user-plus"></i>
                                </div>
                                <div class="col-sm-8 text-md-center">
                                    <h5>{{ $newsletter->count() }}</h5>
                                    <span>Subscribers </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    <div class="row justify-content-around">
        <div class="col-xl-11 col-md-11">
            <div class="card table-card">
                <div class="card-header">
                    <h5>Upcoming Projects</h5>
                    <div class="card-header-right">
                        <div class="btn-group card-option">
                            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="feather icon-more-horizontal"></i>
                            </button>
                            <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                                <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i> maximize</span><span style="display:none"><i class="feather icon-minimize"></i> Restore</span></a></li>
                                <li class="dropdown-item minimize-card"><a href="#!"><span><i class="feather icon-minus"></i> collapse</span><span style="display:none"><i class="feather icon-plus"></i> expand</span></a></li>
                                <li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i> reload</a></li>
                                <li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i> remove</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th> details </th>
                                    <th>Description</th>
                                    <th>Starting Date</th>
                                    <th class="text-right">Priority</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($projectsView as $project )
                                    <tr>
                                        <td>
                                        <div class="d-inline-block align-middle">
                                            <img src="data:image/png;base64,{{ chunk_split(base64_encode($project->image)) }}" alt="Project image" class="wid-150 align-top m-r-15">
                                            <div class="d-inline-block">
                                                <h6>{{ $project->name }}</h6>
                                                <p class="text-muted m-b-0">{{ $project->category->name }}</p>
                                            </div>

                                        </div>
                                        </td>
                                        <td style="width: 200px; white-space:inherit;">{{ $project->description }}</td>
                                        <td>{{ $project->starting_date }}</td>
                                        <td class="text-right">{{ $project->status }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                     <a href="/admin/projects">
                        <div  class="text-right mx-2 align-items-center">View All  <i class="fa-solid fa-arrow-right " style="font-size: 1rem;"></i></div>
                    </a>

                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-around">
        <div class="col-xl-11 col-md-11">
            <div class="card table-card">
                <div class="card-header">
                    <h5>last donations</h5>
                    <div class="card-header-right">
                        <div class="btn-group card-option">
                            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="feather icon-more-horizontal"></i>
                            </button>
                            <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                                <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i> maximize</span><span style="display:none"><i class="feather icon-minimize"></i> Restore</span></a></li>
                                <li class="dropdown-item minimize-card"><a href="#!"><span><i class="feather icon-minus"></i> collapse</span><span style="display:none"><i class="feather icon-plus"></i> expand</span></a></li>
                                <li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i> reload</a></li>
                                <li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i> remove</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th> doner </th>
                                    <th>project</th>
                                    <th>amount</th>
                                    <th class="text-right">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($donationsView as $donation )
                                    <tr>
                                        <td>{{ @$donation->user->name }}</td>
                                        <td style="width: 200px; white-space:inherit;">{{ $donation->project->name }}</td>
                                        <td>{{ $donation->amount }}</td>
                                        <td class="text-right">{{ $donation->created_at }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <a href="/donations">
                        <div  class="text-right mx-2 align-items-center">View All  <i class="fa-solid fa-arrow-right " style="font-size: 1rem;"></i></div>
                    </a>

                </div>
            </div>
        </div>
    </div>
@endsection
