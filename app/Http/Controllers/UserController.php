<?php

namespace App\Http\Controllers;

use App\Countrie;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Organizer;
use App\EventType;
use App\EventCategory;
use App\EventSubCategory;
use App\EventDateTime;
use App\EventLiked;
use App\Tags;
use App\Events;
use App\EventPublish;
use App\EventTickets;
use App\EventTags;
use App\OrderTicket;
use App\OrganizerFollowers;
use App\State;
use App\TimeZone;
use App\UserAccountSetting;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class UserController extends Controller
{
    public function userEvents()
    {
        $organizers=Organizer::all();
        $dt = Carbon::now()->toDateString();
        $events = DB::table('events')
        ->where('events.status', 1)
        ->where('event_date_times.event_start','>=', $dt)
        ->leftJoin('event_likeds', 'events.id', '=', 'event_likeds.event_id')
        ->join('event_date_times', 'events.id', '=', 'event_date_times.event_id')
        ->join('event_tickets', 'events.id', '=', 'event_tickets.event_id')
        ->select('events.*', 'event_date_times.event_start', 'event_tickets.price','event_likeds.is_liked')
        ->paginate(12);

        return view('user.events', compact('events','organizers'));
    }

    public function searchEvents(Request $request)
    {
            $dt = Carbon::now()->toDateString();
            $events = DB::table('events')
            ->where('events.status', 1)
            ->where('event_date_times.event_start','>=', $dt)
            ->when($request, function($query) use ($request){
                    if($request->has('search') && $request['search']){
                        $query->where('events.title', 'LIKE', '%'.$request['search']."%");
                    }
                    if($request->has('ticket') && $request['ticket']){
                        $query->where('event_tickets.type', $request['ticket']);
                    }
                    if($request->has('organizer') && $request['organizer']){
                        $query->where('events.organizer_id', $request['organizer']);
                    }})
            ->leftJoin('event_likeds', 'events.id', '=', 'event_likeds.event_id')
            ->join('event_date_times', 'events.id', '=', 'event_date_times.event_id')
            ->join('event_tickets', 'events.id', '=', 'event_tickets.event_id')
            ->select('events.*', 'event_date_times.event_start', 'event_tickets.price', 'event_likeds.is_liked')
            ->paginate(12);


        $output = [];
        if ($events) {

            foreach($events as  $event) {
                $likeBtn = "";

                    if($event->is_liked == 1){
                        $likeBtn = '<a href="javascript:;" id="following_btn"
                        onclick="checkFollow(1,'.$event->id.');"
                        class="btn btn-warning">Un Like</a>';
                    }
                    else{
                        $likeBtn = '<a href="javascript:;" id="follow_btn"
                        onclick="checkFollow(0,'.$event->id.');"
                        class="btn btn-info">Like</a>';
                    }

                array_push($output, "<div class='col-md-4'>

                <div class='event-detail'
                    style='border: 2px solid #2e6da4;margin-inline-end: 72px;padding: 8px;border-radius: 9px;'>
                    <a href=".route('user_view_event', $event->id).">

                        <img class='img-square' src='".asset($event->event_image)."'
                            style='width: auto; height: 198px; max-width: 100%;' alt='User Avatar'>
                        <br>
                        <label for='event-name'>$event->title</label>
                    </a>
                    <p style='color: red;'> ".Carbon::parse($event->event_start)->toDayDateTimeString() ."</p>
                    <p>$event->location</p>
                    <div class='row'>
                        <div class='col-md-6'>
                            <p>Starts at $$event->price</p>
                        </div>
                        <div class='col-md-6'>
                            <div class='follow-btn-$event->id' id='follow-btn-$event->id'>
                            $likeBtn
                            </div>
                        </div>
                    </div>
                </div>

            </div>");
            }
        }
        return Response($output);

    }

    public function userEventDetail($id)
    {
        $event=Events::where('id', $id)->with('getEventDateNTime')->with('getEventTickets')->first();
        $event['eventTags']=EventTags::where('event_id', $id)->get();
        $checkFollower=OrganizerFollowers::where([['organizer_id', $event->organizer_id], ['user_id', Auth::user()->id]])->first();

        $dt = Carbon::now()->toDateString();
        $SuggestedEvents = DB::table('events')
        ->where('events.status', 1)
        ->where('event_start','>=', $dt)
        ->join('event_date_times', 'events.id', '=', 'event_date_times.event_id')
        ->join('event_tickets', 'events.id', '=', 'event_tickets.event_id')
        ->select('events.*', 'event_date_times.event_start', 'event_tickets.price')
        ->get();

        $userAccountSettings=UserAccountSetting::where('user_id', Auth::user()->id)->first();

        return view('user.view_event', compact('event', 'SuggestedEvents', 'checkFollower','userAccountSettings'));
    }

    public function userAccountSettings()
    {
        $accountSettings=UserAccountSetting::where('user_id', Auth::user()->id)->first();
        if(isset($accountSettings))
        {
            return view('user/account_settings', compact('accountSettings'));
        }

        return view('user/account_settings');
    }

    public function insertAccountSettings(Request $request)
    {
        $accountSettings=UserAccountSetting::where('user_id', Auth::user()->id)->first();

        if(isset($accountSettings))
        {
            $accountSettings=UserAccountSetting::where('user_id', Auth::user()->id)->first();
            $accountSettings->user_id=Auth::user()->id;
            $accountSettings->prefix=$request->prefix;
            $accountSettings->suffix=$request->suffix;
            $accountSettings->first_name=$request->first_name;
            $accountSettings->last_name=$request->last_name;
            $accountSettings->home_phone=$request->home_phone;
            $accountSettings->cell_phone=$request->cell_phone;
            $accountSettings->designation=$request->designation;
            $accountSettings->address=$request->address;
            if ($request->has('img')) {
                $image = $request->img;
                if ($image) {
                    $file_name = Auth::user()->id . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('assets/images/organizerprofile'), $file_name);
                    $accountSettings->img = 'assets/images/organizerprofile/' . $file_name;
                }
            }
            $accountSettings->save();
        }
        else
        {
            $accountSettings= new UserAccountSetting();
            $accountSettings->user_id=Auth::user()->id;
            $accountSettings->prefix=$request->prefix;
            $accountSettings->suffix=$request->suffix;
            $accountSettings->first_name=$request->first_name;
            $accountSettings->last_name=$request->last_name;
            $accountSettings->home_phone=$request->home_phone;
            $accountSettings->cell_phone=$request->cell_phone;
            $accountSettings->designation=$request->designation;
            $accountSettings->address=$request->address;
            if ($request->has('img')) {
                $image = $request->img;
                if ($image) {
                    $file_name = Auth::user()->id . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('assets/images/organizerprofile'), $file_name);
                    $accountSettings->img = 'assets/images/organizerprofile/' . $file_name;
                }
            }
            $accountSettings->save();
        }
        return Redirect()->back();
    }

    public function userProfile()
    {
        $userProfile=UserAccountSetting::where('user_id', Auth::user()->id)->first();
        $followers=OrganizerFollowers::where('user_id', Auth::user()->id)->get();
        $dt = Carbon::now()->toDateString();
        $likedEvents = DB::table('events')
        ->where('event_likeds.user_id', Auth::user()->id)
        ->where('events.status', 1)
        ->where('event_date_times.event_start','>=', $dt)
        ->join('event_likeds', 'events.id', '=', 'event_likeds.event_id')
        ->join('event_date_times', 'events.id', '=', 'event_date_times.event_id')
        ->join('event_tickets', 'events.id', '=', 'event_tickets.event_id')
        ->select('events.*', 'event_date_times.event_start', 'event_tickets.price','event_likeds.is_liked')
        ->get();

        return view('user/view_user', compact('userProfile','followers','likedEvents'));

    }


    public function checkLiked(Request $request)
    {
        $checkForEvent = Events::where('id',$request->event_id)->firstOrfail();
        if($checkForEvent->count() > 0){

            $checkLiked=EventLiked::where([
                'event_id'=> $checkForEvent->id,
                'user_id'=> Auth::user()->id
                ])->first();

            $data = [];
            if($checkLiked !== null)
            {
                $data['is_liked'] = ($request->arg == 1) ? 0:1;
                $checkLiked->update($data);
            }
            else {
                $data['user_id'] = Auth::user()->id;
                $data['event_id'] = $checkForEvent->id;
                $data['is_liked'] = ($request->arg == 0) ? 1:0;
                $createLikeEvent = EventLiked::create($data);
            }
            return response()->json([
                'success' => ($request->arg == 0) ? "Event unliked":"Event liked",
                'code' => 200
            ]);
        }

        // $response="";
        // $checkLiked=EventLiked::where([['event_id', $request->event_id], ['user_id', Auth::user()->id]])->first();

        // if($request->arg == 0)
        // {
        //     $eventLiked=EventLiked::where('event_id',$request->event_id)->first();
        //     $eventLiked->user_id= Auth::user()->id;
        //     $eventLiked->event_id= $request->event_id;
        //     $eventLiked->is_liked=1;
        //     $eventLiked->save();

        //     return $response="liked";
        // }
        // else{
        //     $eventLiked=EventLiked::where('event_id',$request->event_id)->first();
        //     $eventLiked->is_liked=0;
        //     $eventLiked->save();
        //     return $response="unliked";
        // }

        // return Response($response);
    }


    public function invoice(Request $request)
    {

        $validation = Validator::make($request->all(), [
            'total' => "required",
            'tickets' => "required",
            'event_id' => "required",
            'unitPrice' => "required",
            'first_name' => "required",
            'last_name' => "required",
            'email' => "required",
            'commission' => "required",
        ]);

        if ($validation->fails()) {
            return back()->with('errors', $validation->errors());
        } else {
            $orderTickets= new OrderTicket();
            $orderTickets->order_id= rand(10,1000);
            $orderTickets->user_id= Auth::user()->id;
            $orderTickets->event_id= $request->event_id;
            $orderTickets->no_of_tickets= $request->tickets;
            $orderTickets->ticket_price= $request->total;
            $orderTickets->admin_commission= ($request->total /100 ) * $request->commission;
            $orderTickets->organizer_commission= $request->total-  $orderTickets->admin_commission;
            $orderTickets->first_name= $request->first_name;
            $orderTickets->last_name= $request->last_name;
            $orderTickets->email= $request->email;
            $orderTickets->payment_status= $request->status;
            $orderTickets->order_status= 0;
            // dd($orderTickets);
            $orderTickets->save();
            return response()->json(["message" => "Order Completed", 'code' => 201]);

        }
    }

    public function userOrders()
    {
        $orderTickets=OrderTicket::where('user_id', Auth::user()->id)->get();
        return view('user.orders', compact('orderTickets'));
    }
}
