@extends('layout')

@section('content')

<h1>Registrering</h1>

<div class="stamp">
    <table class="table">
        <thead>
    
            <tr>
                <th>Dato</th>        
            </tr>
    
            <tr>
                <th>Tid</th>
            </tr>

            <tr>
                <th>Afdeling</th>
            </tr>

        </thead>

    </table>

</div>

    <button href="{{route('beginShift')}}" type="button">Stempel Ind</button>

@endsection