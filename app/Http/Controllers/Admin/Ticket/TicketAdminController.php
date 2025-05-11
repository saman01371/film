<?php

namespace App\Http\Controllers\Admin\Ticket;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Ticket\TicketAdmin;

class TicketAdminController extends Controller
{
    private $user;

    public function __construct()
    {
        $this->user = auth()->user();
    }

    public function index()
    {
        if ($this->user->can('index-ticketAdmin')) {
            $admins = User::where('user_type', 1)->get();
            return view('admin.ticket.admin.index', compact('admins'));
        } else {
            abort(403);
        }
    }


    public function set(User $admin)
    {
        if ($this->user->can('index-ticketAdmin')) {
            TicketAdmin::where('user_id', $admin->id)->first() ? TicketAdmin::where(['user_id' => $admin->id])->forceDelete() : TicketAdmin::create(['user_id' => $admin->id]);
            return redirect()->route('admin.ticket.admin.index')->with('swal-success', 'تغییر شما با موفقیت حذف شد');
        } else {
            abort(403);
        }
    }
}
