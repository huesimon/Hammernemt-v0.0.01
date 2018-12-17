@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
					
					<a href="#" class="btn btn-primary btn-lg btn-block">
						Stempling
					</a>
					
					<a href=" {{route('myCalendar', ['id' => Auth::user()->id])}} " class="btn btn-primary btn-lg btn-block">
						Vagtplan
					</a>

					<a href=" {{route('tradeList')}} " class="btn btn-primary btn-lg btn-block">
						Ledige vagter  <span class="badge badge-light"> {{$tradeableShifts->count()}} </span>
					</a>
					
				<a href=" {{route('myStamps', ['id' => Auth::user()->id ])}} " class="btn btn-primary btn-lg btn-block">
						Timeoversigt
					</a>

					<a href="#" class="btn btn-danger btn-lg btn-block">
						Admin
					</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
