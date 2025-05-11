<?php

namespace App\Http\Controllers\Admin\Ticket;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Ticket\TicketPriorityRequest;
use App\Models\Ticket\TicketPriority;
use Illuminate\Http\Request;

class TicketPriorityController extends Controller
{
    private $user;

    public function __construct()
    {
        $this->user = auth()->user();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if ($this->user->can('index-ticketPriority')) {
            $ticketPriorities = TicketPriority::all();
            return view('admin.ticket.priority.index', compact('ticketPriorities'));
        } else {
            abort(403);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if ($this->user->can('index-ticketPriority')) {
            return view('admin.ticket.priority.create');
        } else {
            abort(403);
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TicketPriorityRequest $request)
    {
        if ($this->user->can('index-ticketPriority')) {
            $inputs = $request->all();
            $ticketPriority = TicketPriority::create($inputs);
            return redirect()->route('admin.ticket.priority.index')->with('swal-success', 'اولویت  جدید شما با موفقیت ثبت شد');
        } else {
            abort(403);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TicketPriority $ticketPriority)
    {
        if ($this->user->can('index-ticketPriority')) {
            return view('admin.ticket.priority.edit', compact('ticketPriority'));
        } else {
            abort(403);
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TicketPriorityRequest $request, TicketPriority $ticketPriority)
    {
        if ($this->user->can('index-ticketPriority')) {
            $inputs = $request->all();
            $ticketPriority->update($inputs);
            return redirect()->route('admin.ticket.priority.index')->with('swal-success', 'اولویت شما با موفقیت ویرایش شد');
        } else {
            abort(403);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TicketPriority $ticketPriority)
    {
        if ($this->user->can('index-ticketPriority')) {
            $result = $ticketPriority->delete();
            return redirect()->route('admin.ticket.priority.index')->with('swal-success', 'اولویت شما با موفقیت حذف شد');
        } else {
            abort(403);
        }
    }


    public function status(TicketPriority $ticketPriority)
    {
        if ($this->user->can('index-ticketPriority')) {
            $ticketPriority->status = $ticketPriority->status == 0 ? 1 : 0;
            $result = $ticketPriority->save();
            if ($result) {
                if ($ticketPriority->status == 0) {
                    return response()->json(['status' => true, 'checked' => false]);
                } else {
                    return response()->json(['status' => true, 'checked' => true]);
                }
            } else {
                return response()->json(['status' => false]);
            }
        } else {
            abort(403);
        }

    }
}
