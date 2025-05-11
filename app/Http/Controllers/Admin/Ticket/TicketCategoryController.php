<?php

namespace App\Http\Controllers\Admin\Ticket;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Ticket\TicketCategoryRequest;
use App\Models\Ticket\TicketCategory;
use Illuminate\Http\Request;

class TicketCategoryController extends Controller
{

    private $user;

    public function __construct()
    {
        $this->user = auth()->user();
        //  $this->middleware('can:index-categoryContent')->only(['index']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if ($this->user->can('index-ticketCategory')) {
            $ticketCategories = TicketCategory::all();
            return view('admin.ticket.category.index', compact('ticketCategories'));
        } else {
            abort(403);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if ($this->user->can('index-ticketCategory')) {
            return view('admin.ticket.category.create');
        } else {
            abort(403);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TicketCategoryRequest $request)
    {
        if ($this->user->can('index-ticketCategory')) {
            $inputs = $request->all();
            $ticketCategory = TicketCategory::create($inputs);
            return redirect()->route('admin.ticket.category.index')->with('swal-success', 'دسته بندی جدید شما با موفقیت ثبت شد');
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
    public function edit(TicketCategory $ticketCategory)
    {
        if ($this->user->can('index-ticketCategory')) {
            return view('admin.ticket.category.edit', compact('ticketCategory'));
        } else {
            abort(403);
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TicketCategoryRequest $request, TicketCategory $ticketCategory)
    {
        if ($this->user->can('index-ticketCategory')) {
            $inputs = $request->all();
            $ticketCategory->update($inputs);
            return redirect()->route('admin.ticket.category.index')->with('swal-success', 'دسته بندی شما با موفقیت ویرایش شد');
        } else {
            abort(403);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TicketCategory $ticketCategory)
    {
        if ($this->user->can('index-ticketCategory')) {
            $result = $ticketCategory->delete();
            return redirect()->route('admin.ticket.category.index')->with('swal-success', 'دسته بندی شما با موفقیت حذف شد');

        } else {
            abort(403);
        }
    }


    public function status(TicketCategory $ticketCategory)
    {
        if ($this->user->can('index-ticketCategory')) {
            $ticketCategory->status = $ticketCategory->status == 0 ? 1 : 0;
            $result = $ticketCategory->save();
            if ($result) {
                if ($ticketCategory->status == 0) {
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
