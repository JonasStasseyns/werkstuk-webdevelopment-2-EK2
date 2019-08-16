@extends('layout')

@section('content')
    <h2>{{$project->title}} - Funding status</h2>
    <div class="funding-status">
        <div class="your-credits">
            <p>{{$project->current}} credits of {{$project->target}} credits funded</p><br>
            <p><strong>Your credits:</strong> {{Auth::user()->credits}}</p>
        </div>
        <div class="progress-container">
            <h3>Progress</h3>
            <div class="progress-parent">
                <div class="progress" style="width: {{$project->current/$project->target*100}}%;"><strong>{{round($project->current/$project->target*100)}}%</strong></div>
            </div>
        </div>
    </div>
    <div class="purchase-credits-section">
        <div class="purchase-10 purchase-credits-option-container">
            <h3 class="buy-title">Donate 20 credits</h3>
            <strong>Benefits:</strong><br><br>
            <ul class="donate-benefits-ul">
                <li>1 product or ticket</li>
            </ul>
            <a href="/donate/{{$project->id}}/20" class="buy-credits-link">
                <button class="buy-credits">Donate</button>
            </a>
        </div>
        <div class="purchase-25 purchase-credits-option-container">
            <h3 class="buy-title">Donate 50 credits</h3>
            <strong>You get:</strong><br><br>
            <ul class="donate-benefits-ul">
                <li>1 premium-product or ticket</li>
                <li>1 hardcover manual</li>
            </ul>
            <a href="/donate/{{$project->id}}/50" class="buy-credits-link">
                <button class="buy-credits">Donate</button>
            </a>
        </div>
        <div class="purchase-50 purchase-credits-option-container">
            <h3 class="buy-title">Donate 100 credits</h3>
            <strong>You get:</strong><br><br>
            <ul class="donate-benefits-ul">
                <li>2 premium-products or tickets</li>
                <li>1 hardcover manual</li>
                <li>1 DLC or accessory</li>
            </ul>
            <a href="/donate/{{$project->id}}/100" class="buy-credits-link">
                <button class="buy-credits">Donate</button>
            </a>
        </div>
        @if ($project->donated)
            <div class="overlay">
                <div class="modal">
                    <h3>Thank you for your donation!</h3><br>
                    <p>Your donation was received successfully. You will be sent a confirmation email.</p>
                    <a href="/" class="buy-credits-link">
                        <button class="buy-credits">Home</button>
                    </a>
                    <a href="/projects/{{$project->id}}" class="buy-credits-link">
                        <button class="buy-credits">Project page</button>
                    </a>
                </div>
            </div>
        @endif
    </div>
@endsection