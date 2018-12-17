@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Stempling</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
					
					<div class="card" >
						<div class="card-body">
						<h4 class="card-title"> {{$user->name}} </h4>
							<p class="card-text">
                                @if(is_null($userStamp))
                                Indstempling: {{\Carbon\Carbon::now()}}
                                @else
                                Indstempling: {{$userStamp->start_time}}
                                @endif
                            </p>
                            
                            <p class="card-text">
                                Udstempling: <span class="badge badge-danger">Afventer udstempling</span> 
                                
                            </p>

                            <p class="card-text">
                                Afdeling: {{$user->getDepartmentTitle()}}
                            </p>

                            <form method="POST" action="{{route('stampCreate', ['id'=> $user->id])}}">
                                @csrf
                                @if(is_null($userStamp))
                                <button type="submit" class="btn btn-primary">Stempling</button>
                                @else
                                <select name="pause" id="pause">
                                    <option value="Pause" selected disabled>Pause</option>
                                    <option value="0">0</option>
                                    <option value="15">15</option>
                                    <option value="30">30</option>
                                    <option value="45">45</option>
                                    <option value="60">60</option>
                                </select>
                                <button type="submit" class="btn btn-danger">Stempling</button>
                                @endif
                                
                            </form>

						</div>
					</div>					
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
