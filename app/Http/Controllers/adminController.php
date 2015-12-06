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
    public static $teamsMade = 0;
    /**
     * adminController constructor.
     */

    public function __construct()
    {
        //$this-

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

        $UserData = UserData::firstOrNew(['id' => Auth::user()->id]);
        $students = UserData::where('isAdmin', '=', false)->orderBy('team_id')->get();

        //$thing =  head($students->toArray());
        //return $students->first()->team_id;



        return view('adminTeamView', compact('students', 'UserData'));

    }


    public function generateTeams()
    {
        global $teamsMade;
        $teamsMade = 0;

        $maxPerTeam = Input::get('mMax');
        $minPerTeam = Input::get('mMin');
        //creates initial teams
        $this->makeInitTeams('social', $maxPerTeam);
        $this->makeInitTeams('competitive', $maxPerTeam);
        $this->makeInitTeams('dontcare', $maxPerTeam);
        //Makes sure teams are not below min count

        /*foreach($teams as $team => $mCount)
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
        }*/

        //print_r($teams);
        $UserData = UserData::firstOrNew(['id' => Auth::user()->id]);
        $students = UserData::where('isAdmin', '=', false)->orderBy('team_id')->get();
        return view('adminTeamView', compact('students', 'UserData'));

    }

    public function teamStyleCount($style)
    {
        return UserData::where('isAdmin', '=', false)->where('team_style', '=', $style)->count();
    }
    public function teamStyleSort($style)
    {
        return UserData::where('isAdmin', '=', false)->where('team_style', '=', $style)
            ->orderby('taken_programming_class')->get();
    }

    public function classSort($students)
    {
        $classStudents = array();
        foreach($students as $student)
        {
            array_push($classStudents, $student);
        }


        shuffle($classStudents);

        return $classStudents;
    }

    public function makeInitTeams($style, $maxPerTeam)
    {
        global $teamsMade;
        $count = $this->teamStyleCount($style);


        $teams = $count/$maxPerTeam;
        if($count % $maxPerTeam){
            $teams++;
        }

        $totTeams = intval($teams);
        //echo $socTeams;

        $students = $this->teamStyleSort($style);

        $sAdded = 0;

        $teams = array();
        $students = $this->classSort($students);
        //print_r($socStudents);

        //Creates Initial Teams
        //echo $teamsMade;
        $totTeams += $teamsMade;
        echo "<br> totTeams: ".$totTeams." totStudents: ".$count;
        while($teamsMade < $totTeams){
            $teamsMade++; //This will be the same as the Team_id
            $mAdded=0;

            while($mAdded < $maxPerTeam && $sAdded < $count){
                $mAdded++;

                $students[$sAdded]->update(['team_id' => $teamsMade]);
                $sAdded++;
            }
            $teams[$teamsMade] = $mAdded;

        }

        return $students;
    }
}
