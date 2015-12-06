<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\UserData;
use App\ClassesTaken;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
//use App\Http\Controllers\Auth;
use Request;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return 'HELLO';

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $UserData = UserData::findOrFail(['id' => $id]);

        $UserData->update(Request::all());

        return redirect('home');
    }

    public function updater()
    {
        $classesRequest = array_only(Request::all(), array('262', '261', '306', '406'));
        $requests = array_except(Request::all(), array('_token', '262', '261', '306', '406'));
        $UserData = UserData::firstOrNew(['id' => Auth::user()->id]);
        //test below
        //this adds the key/value pair to the array if it doesn't already exists, so we'll add no if they didn't select algorithms
        $requests = array_add($requests, 'taken_algorithms', false);
        $UserData->update($requests);
        //return $request;
        return view('home', compact('UserData'));
        //test above
        if($UserData->count() == 2){
            $request = array_add($request, 'id', Auth::user()->id);
            $request = array_add($request, 'name', Auth::user()->name);
            //return $request;
            UserData::create($request);
        }
        else{
            $UserData->update($request);
        }


        return view('home', compact('UserData'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function home(){
        //return "HELLO";
        //$UserData = UserData::findOrFail(Auth::user()->id);
        $UserData = UserData::firstOrNew(['id' => Auth::user()->id]);

        if ($UserData -> isAdmin) {
            $students = UserData::where('isAdmin', '=', false)->orderBy('team_id')->get();
            return view('adminTeamView', compact('students', 'UserData'));
        }
        return view('home', compact('UserData'));


    }

    public function edit(){
        $UserData = UserData::firstOrNew(['id' => Auth::user()->id]);

        return view('dataform', compact('UserData'));
    }
}
