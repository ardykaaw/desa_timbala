<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Service;

class ServiceNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $service;
    public $adminEmail;

    /**
     * Create a new message instance.
     */
    public function __construct(Service $service, $adminEmail)
    {
        $this->service = $service;
        $this->adminEmail = $adminEmail;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Layanan Baru Ditambahkan - ' . $this->service->name,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.service-notification',
            with: [
                'service' => $this->service,
                'adminEmail' => $this->adminEmail,
            ]
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
