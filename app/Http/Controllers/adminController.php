<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\UserData;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\Admin;
use Request;
use Input;

class adminController extends Controller
{
    /**
     * adminController constructor.
     */
    public function __construct()
    {
        //$this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
        //
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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

    public function teamPage(){
        $students = UserData::orderBy('team_id')->get();
        //$thing =  head($students->toArray());
        //return $students->first()->team_id;



        return view('adminTeamView', compact('students'));
        $users = UserData::orderBy('name')->get();
        return $users;

    }


    public function generateTeams()
    {
        $maxPerTeam = Input::get('mMax');
        $minPerTeam = Input::get('mMin');
        $studentCount = UserData::count();
        $totTeams = $studentCount/$maxPerTeam;
        if($studentCount % $maxPerTeam){
            $totTeams++;
        }


        $totTeams = intval($totTeams);

        //echo $totTeams;
        $students = UserData::all();
        $teamsMade = 0;
        $sAdded = 0;

        $teams = array();

        while($teamsMade < $totTeams){
            $teamsMade++; //This will be the same as the Team_id
            $mAdded=0;

            while($mAdded < $maxPerTeam && $sAdded < $studentCount){
                $mAdded++;

                $students[$sAdded]->update(['team_id' => $teamsMade]);
                $sAdded++;
            }
            $teams[$teamsMade] = $mAdded;

        }

        foreach($teams as $team => $mCount)
        {
            while($mCount < $minPerTeam)
            {
                foreach($teams as $tTeam => $tmCount)
                {
                    while($tmCount > $minPerTeam && $mCount < $minPerTeam)
                    {
                        $UserData = UserData::firstOrNew(['team_id' => $tTeam]);
                        $UserData->update(['team_id' => $team]);
                        $tmCount--;
                        $mCount++;
                        $teams[$team]++;
                        $teams[$tTeam]--;
                    }
                }
            }
        }

        //print_r($teams);
        $students = UserData::orderBy('team_id')->get();
        return view('adminTeamView', compact('students'));

    }
}
