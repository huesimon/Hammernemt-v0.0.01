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
						<h4 class="card-title"> Card title</h4>
							<p class="card-text">
								card text
							</p>				
							<a href="#"class="btn btn-success"> LINK  </a>
						</div>
					</div>					
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
