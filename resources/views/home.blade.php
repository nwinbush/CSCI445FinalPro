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
                            <label class="col-md-4 control-label">Taken Programming Classes up to</label>
                            @if($UserData->taken_programming_class != NULL)
                                CSCI {{ $UserData->taken_programming_class }}
                            @endif

                        </div>

                        <div class="row">
                            <label class="col-md-4 control-label">Taken Algorithms</label>
                            <?php
                                if($UserData->taken_algorithms)
                                    echo "Yes";
                                elseif(!is_null($UserData->taken_algorithms))
                                    echo "No";
                            ?>
                        </div>


                        <div class="row" style="text-align: center;">
                            <a href="edit" class="btn btn-primary" style="margin: 0 auto;">Edit Info</a></td>
                        </div>


                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection