<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;

class NotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */

    public $subject;
    public $body;
    private User $user;
    public $isButton;
    public $buttonText;
    public $buttonUrl;

    public function __construct($subject, $body, $user, $isButton, $buttonText, $buttonUrl)
    {
        $this->subject  = $subject;
        $this->body = $body;
        $this->user = $user;
        $this->isButton = $isButton;
        $this->buttonText = $buttonText;
        $this->buttonUrl = $buttonUrl;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME')), 
            subject: $this->subject
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.notification',
            with: [
                'subject' => $this->subject,
                'body' => $this->body,
                'user' => $this->user,
                'isButton' => $this->isButton,
                'buttonText' => $this->buttonText,
                'buttonUrl' => $this->buttonUrl,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
