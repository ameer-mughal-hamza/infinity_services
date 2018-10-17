<?php

namespace App\Http\Controllers;

use Image;
use App\Consumer;
use Illuminate\Http\Request;

class ConsumerController extends Controller
{
    public function registerUser(Request $request)
    {
        $consumer = new Consumer();
        $consumer->email = $request->email;
        $consumer->save();
        return $consumer;
    }

    public function userProfileData($email)
    {
        $consumer = Consumer::where('email', '=', $email)->get();
        return $consumer;
    }

    public function saveProfile(Request $request)
    {
//        dd($request->all());
        $consumer = Consumer::where('email', '=', $request->email)->first();
        $consumer->email = $request->email;
        $consumer->fullname = $request->fullname;
        $consumer->mobile_number = $request->mobile_number;
        $consumer->area = $request->area;
        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(300, 300)->save($location);
            $consumer->image_url = $filename;
        }
        $consumer->save();
    }

    public function index()
    {
        return view('admin.consumer.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Consumer $consumer
     * @return \Illuminate\Http\Response
     */
    public function show(Consumer $consumer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Consumer $consumer
     * @return \Illuminate\Http\Response
     */
    public function edit(Consumer $consumer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Consumer $consumer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Consumer $consumer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Consumer $consumer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Consumer $consumer)
    {
        //
    }
}
