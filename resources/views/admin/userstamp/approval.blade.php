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
					@foreach ($userStamps as $stamp)


					<div class="card" >
						<div class="card-body">
						<h4 class="card-title">Ejer: {{ $stamp->getUserName()}}</h4>
						<table class="table table-striped">
								<thead>
								  <tr>
									<th scope="col">#</th>
									<th scope="col">Navn</th>
									<th scope="col">Start tid</th>
									<th scope="col">Slut tid</th>
									<th scope="col">Pause</th>
									<th scope="col">Total</th>
								  </tr>
								</thead>
								<tbody>
								  <tr>
								  	<td> {{ $stamp->id}} </td>
									<td> {{ $stamp->getUserName()}} </td>
									<td> {{ $stamp->getStartTimeFormatted('H:i:s')}} </td>
									<td> {{ $stamp->getEndTimeFormatted('H:i:s')}} </td>
									<td> {{ $stamp->pause}} </td>
									<td> {{ $stamp->getPayableHours()}} </td>
								  </tr>
								</tbody>
							  </table>
				
							<a href={{route('adminApproveUserStamp', ['id' => $stamp->id] )}} class="btn btn-success"> Godkend </a>
							<a href={{route('adminRejectUserStamp', ['id' => $stamp->id] )}} class="btn btn-danger"> Afvis </a>
						</div>
					</div>
					@endforeach

					
                </div>
            </div>
        </div>
    </div>
</div>
@endsection