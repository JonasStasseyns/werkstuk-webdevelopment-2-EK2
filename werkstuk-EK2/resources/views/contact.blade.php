@extends('layout')

@section('content')
<div class="contact-form-container">
    @if ($sent)
        <p class="sent-confirmation">Your message has been sent.</p>
    @endif
    <form class="contact-form" method="post" action="/contact">
        {{csrf_field()}}

        <label for="name">Name</label>
        <input type="text" class="contact-name-input" name="name" id="name">

        <label for="email">Email</label>
        <input type="email" class="contact-email-input" name="email" id="email">

        <label for="message">Message</label>
        <textarea name="message" id="message" class="contact-message-input"></textarea>

        <input type="submit" class="contact-submit" value="Send">
    </form>
</div>
@endsection