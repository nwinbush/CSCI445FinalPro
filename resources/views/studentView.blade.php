@extends('app')

@section('content')
    <h1>Welcome!</h1>
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Student Info</div>
                    <div class="panel-body">

                        <div class="row">
                            <label class="col-md-4 control-label">Name</label>{{ $UserData->name }}
                        </div>
                        <div class="row">
                            <label class="col-md-4 control-label">Team</label>{{ $UserData->team_id }}
                        </div>

                        <div class="row">
                            <label class="col-md-4 control-label">Preferred Language</label>
                            <?php

                                $language = $UserData->preferred_language;
                                if($language == 'c')
                                    echo "C/C++";
                                elseif($language == 'java')
                                    echo ucfirst($language);
                                elseif($language == 'python')
                                    echo ucfirst($language);
                            ?>
                        </div>

                        <div class="row">
                            <label class="col-md-4 control-label">Team Style</label>
                            <?php

                                $style = $UserData->team_style;
                                if($style == 'dontcare')
                                    echo "Don't Care";
                                else
                                    echo ucfirst($style);
                            ?>
                        </div>

                        <div class="row">
                            <label class="col-md-4 control-label">Taken Programming Classes up to</label>CSCI {{ $UserData->taken_programming_class }}
                        </div>

                        <div class="row">
                            <label class="col-md-4 control-label">Taken Algorithms</label>
                            <?php
                                if($UserData->taken_algorithms)
                                    echo "Yes";
                                else
                                    echo "No";
                            ?>
                        </div>

                        {!! Form::select('team_name', array('1' => '1', '2' => '2', '3' => '3')) !!}

                       <!--  <div class="row" style="text-align: center;">
                            <a href="submit" class="btn btn-primary" style="margin: 0 auto;"></a></td>
                        </div>
 -->
                        {!! Form::submit('Change Team', ['class' => 'btn btn-primary form-control']) !!}


                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection