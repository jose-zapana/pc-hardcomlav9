<?php

namespace App\Mail;

use App\Category;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CategoryMail extends Mailable
{
    use Queueable, SerializesModels;

    public $category;
    public $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( Category $category, User $user )
    {
        $this->category = $category;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.categoryCreated');
    }
}
