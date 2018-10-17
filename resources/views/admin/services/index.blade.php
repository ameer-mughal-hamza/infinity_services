@extends('admin.admin-layouts.admin-master')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ URL::to('css/default.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('css/index.css') }}">
@endsection
@section('content')

    <div class="container-fluid display-table">
        <div class="row display-table-row">
            @include('admin.admin-partials.admin-navbar')
            <div class="col-md-10 col-sm-11 display-table-cell valign-top">
                @include('admin.admin-partials.admin-header')
                <div id="dashboard-con">
                    <div class="row">
                        <div class="col-md-12 dashboard-left-cell">
                            <div class="admin-content-con">
                                <header class="clearfix">
                                    <h5 class="pull-left">Services</h5>
                                    <a class="btn btn-xs btn-primary pull-right" href="{{ route('service.create') }}"
                                       role="button">Create new
                                        service</a>
                                </header>
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Sub services</th>
                                        <th>Created</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($services as $service)
                                        <tr>
                                            <td>{{ $service->service_name }}</td>
                                            <td>
                                                <label class="blank_label">Refrigerator</label>
                                                <label class="blank_label">Bike Repairing</label>
                                                <label class="label_bg plus">+4</label>
                                            </td>
                                            <td>{{ date('M j, Y', strtotime($service->created_at))}}</td>
                                            <td>
                                                <a class="btn btn-xs btn-primary" href="" role="button">view</a>
                                                <a class="btn btn-xs btn-warning" href="" role="button">edit</a>
                                                <a class="btn btn-xs btn-danger" href="" role="button">delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="clearfix">
                                    <a href="" class="pull-right text-link">view all
                                        services</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="admin-content-con clearfix">
                                <header class="clearfix">
                                    <h5 class="pull-left">Sub Service</h5>
                                    <a class="btn btn-xs btn-primary pull-right"
                                       href="{{ route('sub_service.create') }}"
                                       role="button">Create new sub service</a>
                                </header>

                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Status</th>
                                        <th>Created</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($sub_services as $sub_service)
                                        <tr>
                                            <td>1</td>
                                            <td>{{ $sub_service->title }}</td>
                                            <td>{{ $sub_service->price }}</td>
                                            <td><a href="#" class="label label-default">pending</a></td>
                                            <td>{{ date('M j, Y', strtotime($sub_service->created_at))}}</td>
                                            <td>
                                                <form action="{{ route('sub_service.destroy' , $sub_service->id)}}"
                                                      method="POST">
                                                    {{ csrf_field() }}
                                                    <a href="{{ route('sub_service.destroy',['id' => $sub_service->id]) }}"
                                                       class="label label-danger">Delete</a>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="clearfix">
                                    <a href="" class="pull-right text-link">view all
                                        sub services</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <footer id="admin-footer" class="clearfix">
                        <div class="pull-left"><b>Copyright </b>&copy; 2018</div>
                        <div class="pull-right">infinity services</div>
                    </footer>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
@endsection