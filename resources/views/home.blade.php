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
											<label class="col-md-4 control-label">Preferred Language</label>{{ $UserData->preferred_language }}
                    </div>
                    
										<div class="row">
											<label class="col-md-4 control-label">Team Style</label>{{ $UserData->team_style }}
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