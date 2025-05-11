<?php

namespace App\Http\Controllers\admin\ticket;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Ticket\TicketRequest;
use App\Models\Ticket\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{

    private $user;

    public function __construct()
    {
        $this->user = auth()->user();
    }

    public function newTickets()
    {
        //   dd('s');
        if ($this->user->can('index-ticket')) {
            $tickets = Ticket::where('seen', 0)->get();
            foreach ($tickets as $newTicket) {
                $newTicket->seen = 1;
                $result = $newTicket->save();
            }
            return view('admin.ticket.index', compact('tickets'));
        } else {
            abort(403);
        }
    }

    public function openTickets()
    {
        if ($this->user->can('index-ticket')) {
            $tickets = Ticket::where('status', 0)->get();
            return view('admin.ticket.index', compact('tickets'));
        } else {
            abort(403);
        }
    }

    public function closeTickets()
    {
        if ($this->user->can('index-ticket')) {
            $tickets = Ticket::where('status', 1)->get();
            return view('admin.ticket.index', compact('tickets'));
        } else {
            abort(403);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if ($this->user->can('index-ticket')) {
            $tickets = Ticket::whereNull('ticket_id')->paginate(2);
            return view('admin.ticket.index', compact('tickets'));
        } else {
            abort(403);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        if ($this->user->can('show-ticket')) {
            return view('admin.ticket.show', compact('ticket'));
        } else {
            abort(403);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function answer(TicketRequest $request, Ticket $ticket)
    {
        if ($this->user->can('show-ticket')) {
            $ticketAdmin = auth()->user()->ticketAdmin;
            // dd($ticketAdmin);
            if ($ticketAdmin != null) {
                $inputs = $request->all();
                $inputs['subject'] = $ticket->subject;
                $inputs['description'] = $request->description;
                $inputs['seen'] = 1;
                $inputs['reference_id'] = $ticketAdmin->id;
                $inputs['user_id'] = $ticket->user_id;
                $inputs['category_id'] = $ticket->category_id;
                $inputs['priority_id'] = $ticket->priority_id;
                $inputs['ticket_id'] = $ticket->id;
                $ticket = Ticket::create($inputs);
                return redirect()->route('admin.ticket.index')->with('swal-success', '  پاسخ شما با موفقیت ثبت شد');
            } else {
                abort(403);
            }
        } else {
            abort(403);
        }
    }

    public function change(Ticket $ticket)
    {
        if ($this->user->can('change-ticket')) {
            $ticket->status = $ticket->status == 0 ? 1 : 0;
            $result = $ticket->save();
            return redirect()->route('admin.ticket.index')->with('swal-success', 'تغییر شما با موفقیت حذف شد');
        } else {
            abort(403);
        }
    }
}
