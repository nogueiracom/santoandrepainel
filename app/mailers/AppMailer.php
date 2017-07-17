<?php
namespace App\Mailers;

use App\Chamado;
use Illuminate\Contracts\Mail\Mailer;

class AppMailer {
    protected $mailer;
    protected $fromAddress = 'web@nogueiracom.com.br';
    protected $fromName = 'Support Ticket';
    protected $to;
    protected $subject;
    protected $view;
    protected $data = [];

    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function sendTicketInformation($user, Chamado $ticket)
    {
        $this->to = $user->email;
        $this->subject = "[Ticket ID: $ticket->ticket_id] $ticket->title";
        $this->view = 'emails.chamado_info';
        $this->data = compact('user', 'ticket');

        return $this->deliver();
    }

    public function deliver()
    {
        $this->mailer->send($this->view, $this->data, function($message) {
            $message->from($this->fromAddress, $this->fromName)
                    ->to($this->to)->subject($this->subject);
        });
    }

    public function sendTicketComments($ticketOwner, $user, Chamado $ticket, $comment)
    {
        $this->to = $ticketOwner->email;
        $this->subject = "RE: $ticket->title (Ticket ID: $ticket->ticket_id)";
        $this->view = 'emails.chamado_comentario';
        $this->data = compact('ticketOwner', 'user', 'ticket', 'comment');

        return $this->deliver();
    }

    public function sendTicketStatusNotification($ticketOwner, Chamado $ticket)
      {
          $this->to = $ticketOwner->email;
          $this->subject = "RE: $ticket->title (Ticket ID: $ticket->ticket_id)";
          $this->view = 'emails.chamado_status';
          $this->data = compact('ticketOwner', 'ticket');

          return $this->deliver();
      }
  }
