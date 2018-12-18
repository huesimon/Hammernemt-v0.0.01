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
					


					<div class="card" >
						<div class="card-body">
						<form method="POST" action="{{route('adminCreateShift')}}">
							@csrf
								<div class="form-group">
									<label for="inputStartDate">Start dato: </label>
									<input type="date" class="form-control" id="inputStartDate" name="inputStartDate" aria-describedby="Insert date" value="{{\Carbon\Carbon::now()->format('Y-m-d')}}">
									<br>
									<label for="inputStartDate">Start tidspunkt: </label>
									<input type="time" class="form-control" name="inputStartTime" id="inputStartTime">
								</div>

								<div class="form-group">
									<label for="inputSlutDate">Slut dato: </label>
									<input type="date" class="form-control" id="inputEndDate" name="inputEndDate" aria-describedby="Insert date" placeholder="Indtast Slut dato" value="{{\Carbon\Carbon::now()->format('Y-m-d')}}">
									<br>
									<label for="inputStartDate">End tidspunkt: </label>
									<input type="time" class="form-control" name="inputEndTime" id="inputEndTime">
								</div>

								<div class="form-check form-check-inline">
									<label class="form-check-label">
										<input class="form-check-input" type="checkbox" id="checkboxMonday" value="1"> Mandag
									</label>
								</div>

								<div class="form-check form-check-inline">
									<label class="form-check-label">
										<input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="1"> Tirsdag
									</label>
								</div>

								<div class="form-check form-check-inline">
									<label class="form-check-label">
										<input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="1"> Onsdag
									</label>
								</div>

								<div class="form-check form-check-inline">
									<label class="form-check-label">
										<input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="1"> Torsdag
									</label>
								</div>

								<div class="form-check form-check-inline">
									<label class="form-check-label">
										<input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="1"> Fredag
									</label>
								</div>

								<div class="form-check form-check-inline">
									<label class="form-check-label">
										<input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="1"> Lørdag
									</label>
								</div>

								<div class="form-check form-check-inline">
									<label class="form-check-label">
										<input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="1"> Søndag
									</label>
								</div>

								<div class="form-group">
									<label for="inputUserId">Vælg person:</label>
									<select class="custom-select" id="inputUserId" name="inputUserId">
										<option selected>Vælg person</option>
										@foreach ($users as $user)
											<option value="{{$user->id}}"> {{$user->name}} </option>
										@endforeach
									</select>
								</div>

								
								<button type="submit" class="btn btn-primary">Opret</button>
							</form>
						</div>
					</div>					
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
