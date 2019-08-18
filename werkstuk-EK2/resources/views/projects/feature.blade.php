@extends('layout')
@section('content')
    <h2>Make your project featured for 100 credits per day</h2><br><br>
    <div class="featured-price-calc">
        <div class="featured-price-sub">
            <p>Total price</p>
            <p class="feat-price" id="total">100</p>
            <p>credits</p>
        </div>
        <div class="featured-price-sub">
            <p>Your credits</p>
            <p class="feat-price">{{Auth::user()->credits}}</p>
            <p>credits</p>
        </div>
    </div>
    <form class="make-featured-form" action="/projects/featurize" method="post">
        {{csrf_field()}}
        <input type="hidden" value="{{$id}}" name="id">
        <label for="days">How many days would you like us to feature your project?</label>
        <input type="number" class="create-project-input" name="days" placeholder="1" id="days" value="1">
        <input type="submit" value="Pay" class="create-project-submit">
    </form>
    <br><br><br><br>
    <script>
        const days = document.querySelector('#days');
        const price = document.querySelector('#total');
        days.addEventListener('input', function(){
          price.innerHTML = days.value*100;
        })
    </script>
@endsection