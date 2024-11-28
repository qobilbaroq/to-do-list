<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index()
    {
        $activity = new Activity;
        $data = $activity->all();
        return view('home', compact('data'));
    }
    function add()
    {
        return view('add');
    }

    public function store(request $request)
    {
        ($request)->validate([
            'activity_name' => 'required|min:4|max:20|string'
        ], [
            'activity_name.required' => 'isian blok',
            'activity_name.min' => 'minimal 4 huruf lah',
            'activity_name.max' => 'ari maneh loba loba teing',

        ]);

        $activity = new Activity;
        $activity->activity_name = $request->activity_name;
        $activity->save();

        // $activity->create([
        //     'activity_name' => $request->activity_name
        // ]);

        return redirect('/')->with('success', 'activity has added!');
    }
    public function update(request $request, string $id)
    {
        $request->validate([
            'activity_name' => 'required|min:4|max:20|string'
        ], [
            'activity_name.required' => 'isian blok',
            'activity_name.min' => 'minimal 4 huruf lah',
            'activity_name.max' => 'ari maneh loba loba teing',

        ]);

        $activity = new Activity;
        $data = $activity->find($id);
        $data->activity_name = $request->activity_name;
        $data->save();
        return redirect('/')->with('success', 'activity has added!');
    }


    public function show(string $id)
    {
        $activity = new Activity;
        $data = $activity->find($id);
        if (!isset($data)) {
            return abort(404, 'activitiy has not found');
        }
        return view('update', compact('data'));
    }


    public function destroy(string $id)
    {
        $activity = new Activity;
        $data = $activity->find($id);
        $data->delete();
        return redirect('/')->with('success', 'activity has delete');
    }
}
