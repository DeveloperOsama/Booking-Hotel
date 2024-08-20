<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Booking;
use App\Models\Gallary;
use App\Models\Contact;

class HomeController extends Controller
{
    public function room_details($id){
        $room = Room::find($id);

        return view('home.room_details', compact('room'));
    }

    public function add_booking(Request $request, $id){

        $request->validate([

            'startDate' => 'required|date',
            'endDate' => 'date|after:startDate',
        ]);

        $data = new Booking;

        $data->room_id = $id;

        $data->name = $request->name;

        $data->email = $request->email;

        $data->phone = $request->phone;

        // checking between dates before booking
        $startDate = $request->startDate;
        $endDate = $request->endDate;

        $isBooked = Booking::where('room_id','$id')
        ->where('start_date','<=' ,$endDate)
        ->where('end_date','>=' ,$startDate)->exists();

        if($isBooked){
            return redirect()->back()->with('message', 'Room Booked is already
            booked please try different dates');
        }
        else{

            $data->start_date = $request->startDate;

            $data->end_date = $request->endDate;

            $data->save();

            return redirect()->back()->with('message', 'Room Booked Successfully');
        }
    }

    public function contactUs(Request $request)
    {
        $contact = new Contact();

        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->message = $request->message;

        $contact->save();

        return redirect()->back()->with('message', 'Message sent successfully');
    }


    public function our_rooms(){
        $room = Room::all();

        return view('home.our_rooms', compact('room'));
    }

    public function hotel_gallary(){

        $gallary = Gallary::all();

        return view('home.hotel_gallary', compact('gallary'));
    }

    public function contact_us(){

        return view('home.hotel_contact');
    }

    public function hotel_about(){

        return view('home.hotel_about');
    }
}
