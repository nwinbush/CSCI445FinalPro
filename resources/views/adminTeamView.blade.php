@extends('app')

@section('content')
<table class="table table-striped table-bordered">
    <h1>Administering User: {{$UserData->name}}</h1>

    <br>
    <?php $currentTeam = $students->first()->team_id;

        if(empty($currentTeam)){ ?>
        <div class="panel-body">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form class="form-horizontal" role="form" method="POST" action="admin">
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/
                    <div style="vertical-align:middle; line-height:2em; margin:10px;">
                <label style="float:left; margin-right: 10px;">Max Members Per Team</label>
                {!!Form::selectRange('mMax', 2, 10, null, ['style' => 'width:50px;'])!!}
                </div>
                <div style="vertical-align:middle; line-height:2em; margin: 10px;">
                    <label style="float:left; margin-right: 16px;">Min Members Per Team</label>

                    {!!Form::selectRange('mMin', 2, 10, null, ['style' => 'margin-left:3px; width:50px;'])!!}
                </div>
                {!! Form::submit('Generate Teams', array('class' => 'btn btn-primary form-control', 'style' => 'width:250px; ')) !!}
            </form>
        </div>
    <?php
            echo "<h1>Students not on a team</h1>";
        } else{
            echo "<h1>Team ".$currentTeam."</h1>";
        }
    ?>

    <th>Name</th>
    <th>Team style</th>
    <th>Preferred Language</th>
    <th>Highest Programming Class Taken</th>
    <th>Taken Algorithms</th>
    <th>View Student</th>
    </tr>

    <br>
    @foreach($students as $UserData)
        <?php
            if($UserData->team_id != $currentTeam){
                $currentTeam = $UserData->team_id;
                echo
                "</table>
                <h1>Team $currentTeam</h1>
                <table class='table table-striped table-bordered'>
                <tr>
                <th>Name</th>
                <th>Team style</th>
                <th>Preferred Language</th>
                <th>Highest Programming Class Taken</th>
                <th>Taken Algorithms</th>
                <th>View Student</th>
                </tr>";

            }


        ?>

        <tr>
            <td>{{ $UserData->name }}</td>
            <td>
                <?php

                $style = $UserData->team_style;
                if($style == 'dontcare')
                    echo "Don't Care";
                else if(is_null($style))
                {
                    $UserData->update(['team_style' => 'dontcare']);
                    echo "Don't Care";
                }
                else
                    echo ucfirst($style);
                ?>
            </td>
            <td>
                <?php
                    $language = $UserData->preferred_language;
                    if($language == 'c')
                        echo "C/C++";
                    elseif($language == 'java')
                        echo ucfirst($language);
                    elseif($language == 'python')
                        echo ucfirst($language);
                ?>
            </td>
            <td>{{ $UserData->taken_programming_class }}</td>
            <td><?php
                if($UserData->taken_algorithms )
                    echo "Yes";
                else if(!is_null($UserData->taken_algorithms))
                    echo "No";
                ?>
            </td>
            <td><a href="{{ action('adminController@viewStudent', [$UserData->id]) }}" class="btn btn-primary">Show Student</a></td>
        </tr>
    @endforeach
</table>


@stop

{{--
Schema::create('UserData', function (Blueprint $table) {
$table->increments('id');
$table->integer('user_id')->references('id')->on('users');
$table->string('name');
$table->string('preferred_language')->references('languages')->on('language')->nullable();
$table->string('team_style')->references('teamStyle')->on('style')->nullable();
$table->integer('team_id')->references('id')->on('teams')->nullable();
$table->string('taken_programming_class')->references('course_num')->on('classes')->nullable();
$table->boolean('taken_algorithms')->nullable();
$table->boolean('isAdmin');
$table->nullableTimestamps();
});--}}
