<?php namespace App\Http\Controllers;

use App\ChamadoCategory;
use App\ChamadoComentario;
use Illuminate\Http\Request;
use App\Mailers\AppMailer;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Chamado;

class ChamadoController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');
  }


  public function index()
  {
      $tickets = Chamado::paginate(10);
      $categories = ChamadoCategory::all();

      return view('chamado.index', compact('tickets', 'categories'));
  }

  public function close($ticket_id, AppMailer $mailer)
    {
        $ticket = Chamado::where('ticket_id', $ticket_id)->firstOrFail();

        $ticket->status = 'Fechado';

        $ticket->save();

        $ticketOwner = $ticket->user;

        $mailer->sendTicketStatusNotification($ticketOwner, $ticket);

        return redirect()->back()->with("status", "The ticket has been closed.");
    }

  public function create()
  {
    $userid = Auth::user()->roles()->first()->id;
    $items = (string)$userid;
    $pages = \DB::table('pages')
    ->where('extras->nome_usuario_dois', '=', $items)
    ->get();

    $categories = ChamadoCategory::all();

    return view('chamado.create', compact('categories', 'pages'));
  }

  public function store(Request $request, AppMailer $mailer)
    {
        $this->validate($request, [
                'title'     => 'required',
                'category'  => 'required',
                'priority'  => 'required',
                'message'   => 'required'
            ]);

            $ticket = new Chamado([
                'title'     => $request->input('title'),
                'user_id'   => Auth::user()->id,
                'ticket_id' => strtoupper(str_random(10)),
                'category_id'  => $request->input('category'),
                'priority'  => $request->input('priority'),
                'message'   => $request->input('message'),
                'status'    => "Aberto",
            ]);

            $ticket->save();

            $mailer->sendTicketInformation(Auth::user(), $ticket);

            return redirect()->back()->with("status", "A ticket with ID: #$ticket->ticket_id has been opened.");
    }

    public function userChamados()
    {
        $userid = Auth::user()->roles()->first()->id;
        $items = (string)$userid;
        $pages = \DB::table('pages')
        ->where('extras->nome_usuario_dois', '=', $items)
        ->get();

        $tickets = Chamado::where('user_id', Auth::user()->id)->paginate(10);
        $categories = ChamadoCategory::all();
        return view('chamado.user_chamados', compact('tickets', 'categories', 'pages'));
    }

    public function show($chamado_id)
    {

        $userid = Auth::user()->roles()->first()->id;
        $items = (string)$userid;
        $pages = \DB::table('pages')
        ->where('extras->nome_usuario_dois', '=', $items)
        ->get();


        $ticket = Chamado::where('ticket_id', $chamado_id)->firstOrFail();
        $comments = ChamadoComentario::all();
        $categorias = ChamadoCategory::all();


        return view('chamado.show', compact('ticket', 'category', 'categorias', 'comments', 'pages'));
    }

    public function showadmin($chamado_id)
    {

        $userid = Auth::user()->roles()->first()->id;
        $items = (string)$userid;
        $pages = \DB::table('pages')
        ->where('extras->nome_usuario_dois', '=', $items)
        ->get();


        $ticket = Chamado::where('ticket_id', $chamado_id)->firstOrFail();
        $comments = ChamadoComentario::all();

        $categorias = ChamadoCategory::all();


        return view('chamado.showadmin', compact('ticket', 'category', 'categorias', 'comments', 'pages'));
    }

}
