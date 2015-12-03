@extends('app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Team Data</div>
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


                           <form class="form-horizontal" role="form" method="POST" action="edit">
														<input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                            <br>
														<div>
                                <label style="margin-right: 15px; margin-bottom: 20px;">Preferred Language</label>
																{!! Form::select('preferred_language', array('c' => 'C/C++', 'java' => 'Java', 'python' => 'Python')) !!}
                                
                            </div>

                        
														<div>
                                <label style="float:left;">Classes Taken</label>
                                <div style="float:left; position: relative; left: 55px;">

                                    {!! Form::checkbox('261', '261') !!}    261
                                    {!! Form::checkbox('262', '262') !!}    262
                                    {!! Form::checkbox('306', '306') !!}    306
                                    {!! Form::checkbox('406', '406') !!}    406
                                </div>
                            </div>

                            <br>
														<br>
														<div>
                                <label style="float:left;">Team Style</label>
                                <div style="float:left; position: relative; left:78px; ">
                                    {!! Form::select('team_style', array('social' => 'Social Team', 'competitive' => 'Competitive Team', 'dontcare' => "Don't care")) !!}
                                </div>
                            </div>
														<br>
														<br>
														<br>

                            {!! Form::submit('Submit', ['class' => 'btn btn-primary form-control']) !!}
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
