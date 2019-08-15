@extends('layout')

@section('content')
    <div class="current-credits-details">
        <h2>Wallet</h2>
        <div><br>
            <h3>Available credits</h3>
            <p>{{$user->credits}}</p>
        </div>
    </div>
    <div class="purchase-credits-section">
            <div class="purchase-10 purchase-credits-option-container">
                <p class="buy-title">Buy 10 credits</p>
                <h3 class="buy-price">€ 10</h3>
                <p class="save-amount">You save 0%</p>
                <a href="/credits/buy/10" class="buy-credits-link">
                    <button class="buy-credits">Purchase</button>
                </a>
            </div>
            <div class="purchase-25 purchase-credits-option-container">
                <p class="buy-title">Buy 25 credits</p>
                <h3 class="buy-price">€ 24,50</h3>
                <p class="save-amount">You save 2%</p>
                <a href="/credits/buy/25" class="buy-credits-link">
                    <button class="buy-credits">Purchase</button>
                </a>
            </div>
            <div class="purchase-50 purchase-credits-option-container">
                <p class="buy-title">Buy 50 credits</p>
                <h3 class="buy-price">€ 49</h3>
                <p class="save-amount">You save 2%</p>
                <a href="/credits/buy/50" class="buy-credits-link">
                    <button class="buy-credits">Purchase</button>
                </a>
            </div>
            <div class="purchase-100 purchase-credits-option-container">
                <p class="buy-title">Buy 100 credits</p>
                <h3 class="buy-price">€ 95</h3>
                <p class="save-amount">You save 5%</p>
                <a href="/credits/buy/100" class="buy-credits-link">
                    <button class="buy-credits">Purchase</button>
                </a>
            </div>
            <div class="purchase-250 purchase-credits-option-container">
                <p class="buy-title">Buy 250 credits</p>
                <h3 class="buy-price">€ 230</h3>
                <p class="save-amount">You save 8%</p>
                <a href="/credits/buy/250" class="buy-credits-link">
                    <button class="buy-credits">Purchase</button>
                </a>
            </div>
    </div>
@endsection