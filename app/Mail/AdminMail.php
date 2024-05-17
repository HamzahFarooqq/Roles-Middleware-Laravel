<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Contracts\Queue\ShouldQueue;

class AdminMail extends Mailable 
{
    use Queueable, SerializesModels;
    public $post;
    /**
     * Create a new message instance.
     */
    // public function __construct($post)
    // {
        
    //     $this->post = $post;
    // }
    public function __construct()
    {
        
        
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            // from: new Address('hamxah@gmail.com', 'hamxah farooq'),
            // replyTo: [
            //     new Address('ADMIN_FAROOQQ@GMAIL.COM', 'farooqq'),
            // ],
            

            from: 'test@gmail.com',
            to: 'tst@gmail.com',
            subject: 'A new Post has been created.',
        );

     


    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'admin_mail',
            // with:[
            //     'post' => $this->post,
            // ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [
            // Attachment::fromStorage('app/git-test.txt')->as('git-syllabus.txt'),
        ];
    }
}
