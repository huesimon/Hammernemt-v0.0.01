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
					@foreach ($tradeableShfits as $tradeableShift)


					<div class="card" >
						<div class="card-body">
						<h4 class="card-title"> {{ $tradeableShift->getOriginalOwnerName()}}</h4>
							<p class="card-text">
								{!! $tradeableShift->getShift()->getTimeFormattedDateStartEndNewLine() !!}
							</p>
							@if (!is_null($tradeableShift->comment))
								<p class="card-text">
									Kommentar: {{$tradeableShift->comment}}		
								</p>					
							@endif
				
							<a href={{route('acceptTrade', ['id' => $tradeableShift->id] )}} class="btn btn-primary"> Anmod om vagt</a>
						</div>
					</div>
					@endforeach

					
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
