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
						<h4 class="card-title"> {{$user->name}} {{\Carbon\Carbon::now()->format('Y-m-d')}}</h4>
							<p class="card-text">
                                @if(!isset($userStamp))
                                Indstempling: <span class="badge badge-danger">Afventer indstempling</span> 
                                @else
                                Indstempling: {{$userStamp->getStartTimeFormatted('H:i:s')}}
                                @endif
                            </p>
                            
                            <p class="card-text">
                                @if(!isset($userStamp->start_time))
                                Udstempling: 
                                @else
                                Udstempling: <span class="badge badge-danger">Afventer udstempling</span>
                                @endif 
                                
                            </p>

                            <p class="card-text">
                                Afdeling: {{$user->getDepartmentTitle()}}
                            </p>

                            <form method="POST" action="{{route('stampCreate', ['id'=> $user->id])}}">
                                @csrf
                                @if(!isset($userStamp))
                                <button type="submit" class="btn btn-primary">Indstempling</button>
                                @else
                                Jeg har i dag holdt: <select name="pause" id="pause">
                                    <option value="Pause" selected disabled>Vælg Pause</option>
                                    <option value="0">0</option>
                                    <option value="15">15</option>
                                    <option value="30">30</option>
                                    <option value="45">45</option>
                                    <option value="60">60</option>
                                </select> minutters pause
                                
                                <button type="submit" class="btn btn-danger">Udstempling</button>
                                
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
