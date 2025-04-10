<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use App\Models\Ticket;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FlightController extends Controller
{
    public function index(): View
    {
        $flights = Flight::all();

        return view('index', ['flights'=>$flights]);
    }
    public function ticket(Flight $flight): View
    {
        $tickets = $flight->tickets;
        $boardingCount = Ticket::where('flight_id', $flight->id)->where('is_boarding', true)->count();
        return view('detail', ['flight'=>$flight, 'tickets'=>$tickets, 'boardingCount'=>$boardingCount]);
    }
    public function book(Flight $flight): View
    {
        return view('book', ['flight'=>$flight]);
    }
}
