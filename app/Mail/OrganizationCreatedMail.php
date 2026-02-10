<?php

namespace App\Mail;


use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Bus\Queueable;
use App\Models\Organization;
use App\Models\User;

class OrganizationCreatedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $organization;
    public $user;

    public function __construct(Organization $organization, User $user)
    {
        $this->organization = $organization;
        $this->user = $user;
    }

    public function build()
    {
        return $this->subject('Organization Setup Successful')
            ->view('emails.organization_created');
    }
}
