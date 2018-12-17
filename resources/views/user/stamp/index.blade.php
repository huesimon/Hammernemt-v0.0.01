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
                                Dato: {{\Carbon\Carbon::now()}}
                            </p>
                            
                            <p class="card-text">
                                Tid: 
                            </p>

                            <p class="card-text">
                                Afdeling: {{$user->getDepartmentTitle()}}
                            </p>
                            			
							<a href='#' class="btn btn-primary"> Stempling </a>
						</div>
					</div>					
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
