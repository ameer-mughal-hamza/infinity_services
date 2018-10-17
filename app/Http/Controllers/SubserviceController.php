<?php

namespace App\Http\Controllers;

use App\Service;
use App\Subservice;
use Illuminate\Http\Request;

class SubserviceController extends Controller
{
    public function api_index($title)
    {
        $array = array();
        $services = Service::where('service_name', '=', $title)->get();
        foreach ($services as $service) {
            foreach ($service->subservices as $subservice) {
                $array[] = $subservice;
//            $array[] = $service;
            }
        }
        return $array;
    }

    public function index()
    {
        return 'index';
    }


    public function create()
    {
        return view('admin.sub_services.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:3|unique:subservices',
            'description' => 'required|min:200',
            'price' => 'required',
        ]);
        $sub_service = new Subservice();
        $sub_service->title = $request->title;
        $sub_service->description = $request->description;
        $sub_service->price = $request->price;
        $sub_service->save();
        return view('admin.sub_services.create');
    }

    public function show(Subservice $subService)
    {
        return 'show';
    }


    public function edit(Subservice $subService)
    {
        return 'edit';
    }

    public function update(Request $request, Subservice $subService)
    {
        return 'update';
    }


    public function destroy($id)
    {
        $sub_service = Subservice::find($id);
        $sub_service->delete();
        return view('admin.sub_services.create');
    }
}
