<?php

declare(strict_types=1);

namespace MakwoodStudio\Project\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use MakwoodStudio\Project\Models\Project;

class NewProject extends Mailable
{
    use Queueable;
    use SerializesModels;

    /** Create a new message instance. */
    public function __construct(
        public Project $project
    ) {}

    /**
     * Get the attachments for the message.
     *
     * @return array<int, Attachment>
     */
    public function attachments(): array
    {
        return [];
    }

    /** Get the message content definition. */
    public function content(): Content
    {
        return new Content(
            view: 'project::mail.new-project',
        );
    }

    /** Get the message envelope. */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('jon@example.com', 'Jon Sugar'),
            subject: 'New Project',
        );
    }
}
