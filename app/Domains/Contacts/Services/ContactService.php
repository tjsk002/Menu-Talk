<?php

namespace App\Domains\Contacts\Services;

use App\Models\ContactForm;

class ContactService implements ContactServiceInterface
{
    public function __construct(private ContactForm $contactForm)
    {
    }

    public function create(array $args)
    {
        return $this->contactForm->create($args);
    }
}