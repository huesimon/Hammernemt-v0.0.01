@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
					@endif
					@foreach ($shiftTrades as $trade)


					<div class="card" >
						<div class="card-body">
						<h4 class="card-title"> Fra: {{ $trade->getOriginalOwnerName()}}</h4>
						<h4 class="card-title"> Til: {{ $trade->getNewOwnerName()}}</h4>
							<p class="card-text">
								{!! $trade->getShift()->getTimeFormattedDateStartEndNewLine() !!}
							</p>
							@if (!is_null($trade->comment))
								<p class="card-text">
									Kommentar: {{$trade->comment}}			
								</p>					
							@endif
				
							<a href={{route('adminAcceptTrade', ['id' => $trade->id] )}} class="btn btn-success"> Godkend </a>
							<a href={{route('adminDeclineTrade', ['id' => $trade->id] )}} class="btn btn-danger"> Afvis </a>
						</div>
					</div>
					@endforeach

					
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- @foreach ($shiftTrades as $trade)
	<div class="card" >
		<div class="card-body">
		<h4 class="card-title"> Fra: {{ $trade->getOriginalOwnerName()}}</h4>
		<h4 class="card-title"> Til: {{ $trade->getNewOwnerName()}}</h4>
		
			<p class="card-text">
				{!! $trade->getShift()->getTimeFormattedDateStartEndNewLine() !!}
			</p>
			@if (!is_null($trade->comment))
				<p class="card-text">
					Kommentar: {{$trade->comment}}		
				</p>					
			@endif
			
			<a href={{route('adminAcceptTrade', ['id' => $trade->id] )}} class="btn btn-success"> Godkend vagt</a>
		</div>
	</div> --}}