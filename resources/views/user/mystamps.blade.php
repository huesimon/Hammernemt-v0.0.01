@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Stemplinger</div>
                    <div class="row">
                        <div class="card-body" :class=" col" style="text-align: center">Indstemplet</div>
                        <div class="card-body" :class=" col" style="text-align: center">Udstemplet</div>
                        <div class="card-body" :class=" col" style="text-align: center">Pause</div>
                        <div class="card-body" :class=" col" style="text-align: center">Godkendt</div>
                    </div>
                    <div>
                        @foreach($myStamps as $myStamp)
                                <div class="row" :class="card-body">
                                    <div  class="col" style="text-align: center" >{{$myStamp->start_time}}</div>
                                    <div  class="col" style="text-align: center">{{$myStamp->end_time}}</div>
                                    <div  class="col" style="text-align: center">{{$myStamp->pause}}</div>
                                    <div  class="col" style="text-align: center">{{$myStamp->approved}}</div>
                                </div><br>
                        @endforeach
                    </div>
                    <div class="card-body">
                        <select>
                            <option disabled selected>Vælg måned</option>
                            <option value="1">Januar</option>
                            <option value="2">Febuar</option>
                            <option value="3">Marts</option>
                            <option value="4">April</option>
                            <option value="5">Maj</option>
                            <option value="6">Juni</option>
                            <option value="7">Juli</option>
                            <option value="8">August</option>
                            <option value="9">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                        </select>
                    </div>
                    </div>
            </div>
        </div>
    </div>

@endsection