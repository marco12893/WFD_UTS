<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use App\Models\Ticket;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function submit(Request $request)
    {
        $validated = $request->validate(
            [
                'passanger_name'=>'required|string',
                'passenger_phone'=>'required|string|max:14',
                'seat_number'=>'required|string|max:3',
                'flight_id' => 'required|exists:flights,id'
            ]
        );

        try {
            Ticket::create($validated);
            return redirect()->route('index')->with('success', 'Ticket added successfully');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Failed to create ticket');
        }
    }
    public function board(Request $request, Ticket $ticket)
    {
        try {
            if ($ticket->is_boarding) {
                return redirect()->route('ticket', $ticket->flight_id)
                    ->with('info', 'Passenger already boarded');
            }
    
            $ticket->update([
                'is_boarding' => true,
                'boarding_time' => Carbon::now()
            ]);
    
            return redirect()->route('ticket', $ticket->flight_id)
                ->with('success', 'Boarding successful');
    
        } catch (\Exception $e) {
            return redirect()->route('ticket', $ticket->flight_id)
                ->with('error', 'Failed to process boarding: ' . $e->getMessage());
        }
    }
    public function delete(Request $request, Ticket $ticket)
    {
        
        try {
            if ($ticket->is_boarding) {
                return redirect()->route('ticket', $ticket->flight_id)
                    ->with('error', 'Cannot delete ticket - passenger already boarded');
            }
    
            $ticket->delete();
    
            return redirect()->route('ticket', $ticket->flight_id)
                ->with('success', 'Ticket deleted successfully');
    
        } catch (\Exception $e) {
            return redirect()->route('ticket', $ticket->flight_id)
                ->with('error', 'Failed to delete ticket: ' . $e->getMessage());
        }
    }
}
