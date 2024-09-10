<b>Name</b> : {{$contactForm->name ?? ''}} <br>
<b>Email</b> : {{$contactForm->email ?? ''}} <br>
<b>Number</b> : {{$contactForm->phone_number ?? ''}} <br>
<b>Message</b> <br>
: {!! nl2br($contactForm->message ?? '') !!}