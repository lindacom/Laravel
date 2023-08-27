<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Mail;

use Tests\TestCase;
use App\Mail\SupportTicket;

class ContactSupportTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

     /** @test */
    public function it_sends_a_support_email()
    {
     Mail::fake();

     //if I send a post request to this endpoint I expect an email to be sent

     $this->post('/contact', [
'name' => 'John Doe',
'email' => 'john@example.com',
'question' => 'help me',
'verification' => 5
     ]);

     Mail:: assertQueued(\App\Mail\SupportTicket::class);
    }


    public function it_requires_a_name()
    {
$this->withExceptionHandling();

       $this->post('/contact', [
'name' => '',
'email' => 'john@example.com',
'question' => 'help me',
'verification' => 5
     ])->assertSessionHasErrors('name');
    }

    public function it_requires_a_valid_email()
    {
$this->withExceptionHandling();

       $this->post('/contact', [
'name' => 'John Doe',
'email' => 'not an email',
'question' => 'help me',
'verification' => 5
     ])->assertSessionHasErrors('email');
    }

    public function it_requires_a_question()
    {
$this->withExceptionHandling();

       $this->post('/contact', [
'name' => 'John Doe',
'email' => 'john@doe.com',
'question' => '',
'verification' => 5
     ])->assertSessionHasErrors('question');
    }

}
