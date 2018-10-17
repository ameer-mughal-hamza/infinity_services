<?php

namespace App\Http\Controllers;

use App\Service;
use App\Subservice;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function api_index()
    {
        $services = Service::all();
        return $services;
    }

    public function index()
    {
        $sub_services = Subservice::all();
        $services = Service::all();
        return view('admin.services.index', compact('sub_services', 'services'));
    }

    public function create()
    {
        $sub_services = Subservice::all();
        return view('admin.services.create', compact('sub_services'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:3',
            'description' => 'required|min:200'
        ]);
        $service = new Service();
        $service->service_name = $request->title;
        $service->description = $request->description;
        $service->status = '1';
        $service->save();
        $service->subservices()->attach($request->service_subtype);

        $sub_services = Subservice::all();
        $services = Service::all();

        return view('admin.services.index');
    }

    public function show(Service $service)
    {
        //
    }

    public function edit(Service $service)
    {
        //
    }

    public function update(Request $request, Service $service)
    {
        //
    }

    public function destroy(Service $service)
    {
        //
    }
}
