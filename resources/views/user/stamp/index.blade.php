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
					


					<div class="card" >
						<div class="card-body">
						<h4 class="card-title"> CardTitle </h4>
							<p class="card-text">
                                Card Text
							</p>
											
							<a href='#' class="btn btn-primary"> Anmod om vagt</a>
						</div>
					</div>					
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
