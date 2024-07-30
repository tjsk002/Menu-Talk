<?php

namespace App\Mail;

use App\Models\ContactForm;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewContactUs extends Mailable
{
    use Queueable, SerializesModels;
    public ContactForm $contactForm;

    public function __construct(ContactForm $contactForm)
    {
        $this->contactForm = $contactForm;
    }

    public function build(){
        $title = $this->contactForm->getTitle() ? "[{$this->contactForm->getTitle()}]" : "";
        $subject = sprintf("[%s] {$this->contactForm->getLang()} | {$title}New Contact Us!", config('app.name'));
        return $this->subject($subject)->view('emails.notify.contact_us', array('contactForm', $this->contactForm));
    }
}