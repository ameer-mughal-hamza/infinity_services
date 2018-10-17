@extends('admin.admin-layouts.admin-master')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ URL::to('css/default.css') }}">
@endsection
@section('content')
    <div class="container-fluid display-table">
        <div class="row display-table-row">
            @include('admin.admin-partials.admin-navbar')
            <div class="col-md-10 col-sm-11 display-table-cell valign-top">
                @include('admin.admin-partials.admin-header')
                <div id="content">
                    <header>
                        <h2 class="page_title">Create new service</h2>
                    </header>
                    <div class="content-inner">
                        <div class="form-wrapper">
                            <form action="{{ route('service.store') }}" method="POST">
                                <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                                    <label class="sr-only">Title</label>
                                    <input type="text" class="form-control" name="title" id="title"
                                           placeholder="Enter servive title here...">
                                    @if($errors->has('title'))
                                        <span class="help-block">{{ $errors->first('title') }}</span>
                                    @endif
                                </div>
                                <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                                    <label class="sr-only">Description</label>
                                    <textarea class="form-control" name="description" id="description"
                                              placeholder="Enter Description here..."
                                              rows="10">{{ old('description') }}</textarea>
                                    @if($errors->has('description'))
                                        <span class="help-block">{{ $errors->first('description') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="sr-only">Description</label>
                                    <select class="form-control" multiple name="service_subtype[]"
                                            id="service_subtype[]">
                                        <option value="" disabled>Default</option>
                                        @foreach($sub_services as $sub_service)
                                            <option value="{{ $sub_service->id }}">{{ $sub_service->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="clearfix">
                                    {{ csrf_field() }}
                                    <input type="submit" class="btn btn-primary pull-right" value="Save">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
@endsection