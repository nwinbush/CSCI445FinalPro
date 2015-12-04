@extends('app')

@section('content')
<table class="table table-striped table-bordered">

    <div class="panel-body">
        <form class="form-horizontal" role="form" method="POST" action="admin">
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
            <div>
                <label style="float:left; margin-top:10px; margin-right: 10px;">Members Per Team</label>
                {!!Form::selectRange('members', 3, 5)!!}
            </div>
            {!! Form::submit('Generate Teams', ['class' => 'btn btn-primary form-control']) !!}
        </form>
    </div>
    <br>
    <?php $currentTeam = $students->first()->team_id; ?>
    <h1><?php if(empty($currentTeam)){
            echo "Students not on a team";
        } else{
                echo $currentTeam;
        }?>
    </h1>


    <th>Name</th>
    <th>Team id</th>
    <th>Team style</th>
    <th>Preferred Language</th>
    <th>Highest Programming Class Taken</th>
    <th>Taken Algorithms</th>
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
                <th>Team id</th>
                <th>Team style</th>
                <th>Preferred Language</th>
                <th>Highest Programming Class Taken</th>
                <th>Taken Algorithms</th>
                </tr>";

            }


        ?>

        <tr>
            <td>{{ $UserData->name }}</td>
            <td>{{ $UserData->team_id }}</td>
            <td>{{ $UserData->team_style }}</td>
            <td>{{ $UserData->preferred_language }}</td>
            <td>{{ $UserData->taken_programming_class }}</td>
            <td><?php
                if($UserData->taken_algorithms )
                    echo "Yes";
                else if($UserData->taken_algorithms == false & $UserData->team_style == false)
                    {}
                else
                    echo "No";
                ?>
            </td>
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
