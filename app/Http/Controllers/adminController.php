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
    public static $teams = array();
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

        //creates Teams Array from teams made
        $this->teamsArray();

        //checks the min value and corrects team sizes accordingly
        $this->checkMin($minPerTeam);

        //print_r($teams);
        $UserData = UserData::firstOrNew(['id' => Auth::user()->id]);
        $students = UserData::where('isAdmin', '=', false)->orderBy('team_id')->get();
        return view('adminTeamView', compact('students', 'UserData'));

    }

    public function teamStyleCount($style)
    {
        return UserData::where('isAdmin', '=', false)->where('team_style', '=', $style)->where('team_id', null)->count();
    }
    public function teamStyleSort($style)
    {
        return UserData::where('isAdmin', '=', false)->where('team_style', '=', $style)->where('team_id', null)
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
        global $teamsMade, $teams;
        $count = $this->teamStyleCount($style);

        if($count) {
            $totTeams = $count / $maxPerTeam;
            if ($count % $maxPerTeam) {
                $totTeams++;
            }

            $totTeams = intval($totTeams);
            $this->countCurrentTeams();
            $totTeams += $teamsMade;
            //echo $socTeams;

            $students = $this->teamStyleSort($style);

            $sAdded = 0;

            $students = $this->classSort($students);
            //print_r($socStudents);

            //Creates Initial Teams
            //echo $teamsMade;

            while ($teamsMade < $totTeams) {
                $teamsMade++; //This will be the same as the Team_id
                $mAdded = 0;

                while ($mAdded < $maxPerTeam && $sAdded < $count) {
                    $mAdded++;

                    $students[$sAdded]->update(['team_id' => $teamsMade]);
                    $sAdded++;
                }
                $teams[$teamsMade] = $mAdded;

            }
            return $students;
        }
        return null;

    }

    public function teamsArray()
    {
        global $teams;
        $students = UserData::where('isAdmin', false)->orderby('team_id')->get();
        $currentTeam = 0;
        $teams = array();
        foreach($students as $student)
        {
            if($student->team_id != $currentTeam || $student->team_id == false) {
                $currentTeam = $student->team_id;
                $teams[$currentTeam]=0;
            }
            $teams[$currentTeam]++;
        }
    }

    public function checkMin($minPerTeam)
    {
        global $teams;

        if($teams) {
            foreach ($teams as $team => $mCount) {
                while ($mCount < $minPerTeam) {
                    foreach ($teams as $tTeam => $tmCount) {
                        while ($tmCount > $minPerTeam && $mCount < $minPerTeam) {
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
        }
    }

    public function countCurrentTeams()
    {
        global $teamsMade,$teams;
        $students = UserData::where('isAdmin', false)->where('team_id', '>', 0)->orderby('team_id')->get();

        $currentTeam = 0;
        foreach($students as $student)
        {
            if($student->team_id != $currentTeam)
            {
                $currentTeam++;
                $teams[$currentTeam]=0;
            }
            $teams[$currentTeam]++;
        }

        $teamsMade = $currentTeam;
    }

    public function viewStudent($id){
        $userData = UserData::findOrFail($id);
        $numTeams = $this->countCurrentTeams();
        return view('studentView', compact('userData', 'numTeams'));
    }
}
