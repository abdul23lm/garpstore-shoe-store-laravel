@extends('frontEnd.layouts.master')
@section('title','Review Order Page')
@section('slider')
@endsection
@section('content')
<br>
<br>
    <div class="container">
        <h3 class="text-center">YOUR ORDER HAS BEEN PLACED</h3>
        <p class="text-center">Your order number is <b>GSOFC1219-0{{$who_buying->id}}</b> and total payment is <b>Rp. {{$who_buying->grand_total}}</b> </p>
        <p class="text-center">Please make payment by Transfer</p>
        <div class="text-center">
            <input type="image" name="submit" width="150"
                   src="{{asset('divisima/img/bca.png')}}"

        </form>
        <h3 class="text-center">3333 8888 22 11</h3>
        <h4 class="text-center">a/n PT. GarpStore Indonesia</h4>

        </div>
    </div>
    <div style="margin-bottom: 20px;"></div>
    <br>
<br>
@endsection
