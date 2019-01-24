@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Lønkort</div>
                <div class="card-body">
                    
                    @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
					@endif
					
					<div class="card" >
						<div class="card-body">
                            <div class="tg-wrap">
                                <table class="tg" style="width: 100%;" >
                            
                                    <colgroup>
                                        <col style="width: 110px">
                                        <col style="width: 108px">
                                        <col style="width: 418px">
                                        <col style="width: 578px">
                                    </colgroup>

                                    @foreach ($myStamps as $myStamp)

                                    <tr>
                                        <td class="tg-iwtr"> <strong> Dato: </strong> {{$myStamp->getStartTimeFormatted("d-m-Y")}} </td>
                                        <td class="tg-yzt1"> <strong> Start: </strong> {{$myStamp->getStartTimeFormatted("H:i")}} </td>
                                        <td class="tg-yzt1"> <strong> Slut: </strong> {{$myStamp->getEndTimeFormatted("H:i")}} </td>
                                        <td class="tg-yzt1"> <strong> Pause: </strong> {{$myStamp->pause}} </td>
                                        <td class="tg-yzt1"> <strong> Status: </strong> {{$myStamp->status}} </td>
                                        @if($myStamp->status != 'rejected')
                                        <td class="tg-yzt1"> <strong> Total: </strong> {{$myStamp->getPayableHours()}} </td>
                                        @else 
                                        <td class="tg-yzt1"> <strong> Total: </strong> <p style="color: red"> 00:00 </p> </td>
                                        @endif
                                    </tr>

                                    @endforeach
                                    <tr>
                                        {{-- TODO: Fix this --}} 
                                        <td> </td> <td> </td> <td> </td> <td> </td> <td> </td>
                                            <td class="tg-yzt1"> <strong> Total Hours: {{$myStamp->getSum(Auth::User(), $month)}} </strong> </td>
                                    </tr>
                                </table>
                            </div>
                                <form method="POST" action="{{route('myStampsPost')}}">
                                        @csrf
                                        <input type="hidden" name="userId" value="{{Auth::user()->id}}">
                                        Jeg vil se: <select name="month" id="month">
                                            <option value="month" selected disabled>Vælg måned</option>
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
                                        </select> måned
                                        <button class="button btn btn-primary" type="submit">Vælg denne måned</button>
                            </div>				
						</div>
					</div>					
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('footer')
<style type="text/css">
    .tg  {border-collapse:collapse;border-spacing:0;border-color:#ffffff;}
    .tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 10px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ffffff;}
    .tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:0px 0px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ffffff;}
    .tg .tg-iwtr{background-color:#34cdf9;color:#ffffff;vertical-align:top;}
    .tg .tg-yzt1{background-color:#efefef;vertical-align:top}
    .tg .tg-cxkv{background-color:#ffffff}
    .tg .tg-bsv2{background-color:#efefef}
    .tg .tg-3we0{background-color:#ffffff;vertical-align:top}
    .tg .tg-yw4l{vertical-align:top}
    @media all and (max-width: 479px) {
      table,
      thead,
      tbody,
      th,
      td,
      tr {
        display: block	;
       
      }
    </style>
@endsection
