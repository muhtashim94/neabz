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
use App\EventPlannerAccountSetting;
use App\Tags;
use App\Events;
use App\EventPublish;
use App\EventTickets;
use App\EventTags;
use App\OrderTicket;
use App\State;
use App\TimeZone;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    public function createEvent()
    {
        $organizers= Organizer::where([['soft_del', 1],['user_id', Auth::User()->id]])->get();
        $eventTypes= EventType::all();
        $eventCategories= EventCategory::all();
        $eventSubCategories= EventSubCategory::all();
        $tags= Tags::all();
        $timeZones= TimeZone::all();
        return view('event_planer.create_event', compact('organizers', 'eventTypes','eventCategories','eventSubCategories','tags','timeZones'));
    }

    public function insertEvent(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'title' => "required",
        ]);

        $event = new Events();
        $event->title = $request->title;
        $event->user_id = Auth::user()->id;
        $event->organizer_id = $request->organizer_id;
        $event->type_id = $request->type_id;
        $event->category_id = $request->category_id;
        $event->sub_category_id = $request->sub_category_id;
        $event->location_type = $request->location_get;
        if($request->location_get== "venue")
        {
            $event->location = $request->location;
        }

        $event->time_zone_id = $request->time_zone_id;
        $event->status = 1;
        $event->save();
        if ($request->input('tags')) {
        $tagsCount = count($request->tags);

        for ($i = 0; $i < $tagsCount; $i++) {
            $eventTags= new EventTags();

            $eventTags->event_id = $event->id;
            $eventTags->event_tag_id = $request['tags'][$i];
            $eventTags->save();
        }
    }

        $eventDateTime= new EventDateTime();
        $eventDateTime->event_id = $event->id;
        $eventDateTime->event_type = $request->event_type;

        if($request->event_type== "single_event")
        {
            $eventDateTime->event_start = $request->event_start;
            $eventDateTime->start_time = $request->start_time;
            $eventDateTime->event_end = $request->event_end;
            $eventDateTime->end_time = $request->end_time;
            $eventDateTime->display_start_time = $request->display_start_time;
        }
        $eventDateTime->display_end_time = $request->display_end_time;
        $eventDateTime->save();
        $eventId=$event->id;
        return redirect()->route('details', ['id'=>  $eventId]);



    }

    public function eventDetail($id)
    {
        return view('event_planer/details', compact('id'));
    }

    public function insertEventDetails(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'title' => "required|mimes:jpeg,png|max:10192",
        ]);

        $event = Events::find($request->event_id);

        $event->event_summary= $request->summary;
        $event->event_details= $request->details;
        $event->status = 1;
        if ($request->has('image')) {
            $image = $request->image;
            if ($image) {
                $file_name = $request->event_id . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('assets/images/eventImages'), $file_name);
                $event->event_image = 'assets/images/eventImages/' . $file_name;
            }
        }

        $event->save();
        $eventId=$request->event_id;
        return redirect()->route('create_tickets', ['id'=>  $eventId]);
    }

    public function eventTickets($id)
    {
        return view('event_planer.create_tickets', compact('id'));
    }

    public function insertTicket(Request $request)
    {
        $eventTicket = new EventTickets();
        $eventTicket->type = $request->ticket_type;
        $eventTicket->event_id = $request->event_id;
        $eventTicket->name = $request->name;
        $eventTicket->available_quantity = $request->available_quantity;
        $eventTicket->price = $request->price;
        $eventTicket->ticket_available = $request->ticket_available;
        $eventTicket->sales_start_date_time = $request->sales_start_date_time;
        $eventTicket->sale_end_date_time = $request->sale_end_date_time;
        $eventTicket->description = $request->description;
        $eventTicket->visibility = $request->visibility;
        $eventTicket->max_ticket = $request->max_ticket;
        $eventTicket->min_ticket = $request->min_ticket;
        $eventTicket->sale_channel = $request->sale_channel;
        $eventTicket->eticket = $request->eTicket;
        $eventTicket->will_call = $request->will_call;
        $eventTicket->status = 1;
        $eventTicket->save();
        $eventId=$request->event_id;
        return redirect()->route('create_publish', ['id'=>  $eventId]);

    }

    public function eventPublish($id)
    {
        $event=Events::where('id', $id)->first();
        $eventTicket=EventTickets::where('event_id', $id)->first();
        return view('event_planer.publish', compact('id', 'event','eventTicket'));
    }

    public function insertPublish(Request $request)
    {
        $publish= new EventPublish();
        $publish->event_id=$request->event_id;
        $publish->public=$request->public;
        $publish->audience=$request->audience;
        $publish->publish=$request->publish;
        $publish->date=$request->date;
        $publish->time=$request->time;
        $publish->privacy=$request->privacy;
        $publish->save();

        return redirect()->route('events');

    }

    public function events()
    {
        $events=[];

        $organizers= Organizer::where([['soft_del', 1],['user_id', Auth::User()->id]])->get();
        $events = DB::table('events')
            ->join('event_date_times', 'events.id', '=', 'event_date_times.event_id')
            ->where('user_id', Auth::user()->id)
            ->select('events.*', 'event_date_times.event_start', 'event_date_times.start_time')
            ->get();

        return view('event_planer.events', compact('events','organizers'));
    }

    public function searchEvents(Request $request)
    {
        $events = Events::where("user_id", Auth::user()->id)->where(function($query) use ($request){
            if($request->has('search') && $request['search']){
                $query->where('title', 'LIKE', '%'.$request['search']."%");
            }
            if($request->has('status') && $request['status']){
                $query->where('status', $request['status']);
            }
            if($request->has('organizer') && $request['organizer']){
                $query->where('organizer_id', $request['organizer']);
            }
            return $query;
        })->with('getEventDateNTime')->get();

        $output = [];
        $statusText="";
        $statusTextColor="";
        if ($events) {

            foreach($events as  $event) {
                if ($event->status==1){
                    $statusText = "Published";
                    $statusTextColor="green";
                }
                elseif($event->status==2){
                    $statusText = "Draft";
                    $statusTextColor="red";
                }
                elseif($event->status == 3){
                    $statusText = "Past";
                    $statusTextColor="yellow";
                }
                else{
                    $statusText = "undefined";
                    $statusTextColor="undefined";
                }
                array_push($output, "<tr>
                    <td>
                        <img class='img-square' src='".asset($event->event_image)."'
                            style='width: auto; height: 86px;' alt='User Avatar'>

                        <div class='event_details'>
                            <p>$event->title </p>
                            <p>$event->location </p>
                            <p><time> ".Carbon::parse($event->event_start)->toDayDateTimeString() ."</time>
                            </p>
                        </div>
                    </td>
                    <td>
                        <p>25 / 124</p>
                        <p>
                        <div class='progress'>
                            <div class='progress-bar' role='progressbar' style='width: 25%'
                                aria-valuenow='25' aria-valuemin='0' aria-valuemax='100'></div>
                        </div>
                        </p>
                    </td>
                    <td>$12.00</td>
                    <td>
                    <i class='fa-solid fa-circle' style='color: ".$statusTextColor.";'></i> ".$statusText."

                    </td>
                    <td>
                        <div class='dropdown'>
                            <button class='btn btn-default dropdown-toggle' type='button'
                                id='dropdownMenu1' data-toggle='dropdown' aria-haspopup='true'
                                aria-expanded='true'>
                                Actions
                                <span class='caret'></span>
                            </button>
                            <ul class='dropdown-menu' aria-labelledby='dropdownMenu1'>

                                <li><a href=".route('user_view_event', $event->id).">View</a></li>
                                <li><a
                                        href=".route('edit_create_event',$event->id).">Edit</a>
                                </li>

                            </ul>
                        </div>
                    </td>

                </tr>");
            }
        }
        return Response($output);
        // $events->with('getEventDateNTime')->first();
    }

    public function editCreateEvent($id)
    {

        $event=[];
        $organizers= Organizer::where([['soft_del', 0],['user_id', Auth::User()->id]])->get();
        $eventTypes= EventType::all();
        $eventCategories= EventCategory::all();
        $eventSubCategories= EventSubCategory::all();
        $tags= Tags::all();
        $timeZones= TimeZone::all();
        $ev=Events::where('id', $id)->first();
        $eventDateTime=EventDateTime::where('event_id', $id)->first();
        $eventTags=EventTags::where('event_id', $id)->get();
        $event= $ev;
        $event['eventDateTime']=$eventDateTime;
        $event['eventTags']=$eventTags;
        return view('event_planer.edit_create_event', compact('organizers', 'eventTypes','eventCategories','eventSubCategories','tags','timeZones','event','id'));
    }

    public function updateevent(Request $request)
    {

        $dEventTags = EventTags::where('event_id', $request->event_id)->get();
        if (isset($delInstituteDegrees)) {
            $dEventTags = EventTags::where('event_id', $request->event_id)->delete();
        }
        $validator = Validator::make($request->all(), [
            'title' => "required",
        ]);

        $event = Events::find($request->event_id);

        $event->title = $request->title;
        $event->organizer_id = $request->organizer_id;
        $event->type_id = $request->type_id;
        $event->category_id = $request->category_id;
        $event->sub_category_id = $request->sub_category_id;
        $event->location_type = $request->location_get;
        if($request->location_get== "venue")
        {
            $event->location = $request->location;
        }
        $event->time_zone_id = $request->time_zone_id;
        $event->status = 1;
        $event->save();

        if ($request->input('tags')) {
        $tagsCount = count($request->tags);
        for ($i = 0; $i < $tagsCount; $i++) {
            $eventTags=EventTags::where('event_id', $request->event_id)->first();
            $eventTags->event_id = $event->id;
            $eventTags->event_tag_id = $request['tags'][$i];
            $eventTags->save();
        }
    }

        $eventDateTime=EventDateTime::where('event_id', $request->event_id)->first();
        $eventDateTime->event_id = $event->id;
        $eventDateTime->event_type = $request->event_type;

        if($request->event_type== "single_event")
        {
            $eventDateTime->event_start = $request->event_start;
            $eventDateTime->start_time = $request->start_time;
            $eventDateTime->event_end = $request->event_end;
            $eventDateTime->end_time = $request->end_time;
            $eventDateTime->display_start_time = $request->display_start_time;
        }
        $eventDateTime->display_end_time = $request->display_end_time;
        $eventDateTime->save();
        $eventId=$event->id;
        return redirect()->route('edit_details', ['id'=>  $eventId]);
    }

    public function editDetails($id)
    {
        $event = Events::find($id);

        return view('event_planer.edit_details', compact('id','event'));
    }

    public function updateDetails(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => "required|mimes:jpeg,png|max:10192",
        ]);

        $event = Events::find($request->event_id);

        $event->event_summary= $request->summary;
        $event->event_details= $request->details;
        $event->status = 1;
        if ($request->has('image')) {
            $image = $request->image;
            if ($image) {
                $file_name = $request->event_id . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('assets/images/eventImages'), $file_name);
                $event->event_image = 'assets/images/eventImages/' . $file_name;
            }
        }

        $event->save();
        $eventId=$request->event_id;
        return redirect()->route('edit_tickets', ['id'=>  $eventId]);
    }

    public function editTicket($id)
    {
        $eventTicket=EventTickets::where('event_id', $id)->first();
        return view('event_planer.edit_tickets', compact('id','eventTicket'));
    }

    public function updateTicket(Request $request)
    {

        $eventTicket = EventTickets::where('event_id', $request->event_id)->first();
        $eventTicket->type = $request->ticket_type;
        $eventTicket->event_id = $request->event_id;
        $eventTicket->name = $request->name;
        $eventTicket->available_quantity = $request->available_quantity;
        $eventTicket->price = $request->price;
        $eventTicket->ticket_available = $request->ticket_available;
        $eventTicket->sales_start_date_time = $request->sales_start_date_time;
        $eventTicket->sale_end_date_time = $request->sale_end_date_time;
        $eventTicket->description = $request->description;
        $eventTicket->visibility = $request->visibility;
        $eventTicket->max_ticket = $request->max_ticket;
        $eventTicket->min_ticket = $request->min_ticket;
        $eventTicket->sale_channel = $request->sale_channel;
        $eventTicket->eticket = $request->eTicket;
        $eventTicket->will_call = $request->will_call;
        $eventTicket->status = 1;

        $eventTicket->save();
        $eventId=$request->event_id;
        return redirect()->route('edit_publish', ['id'=>  $eventId]);

    }

    public function editPublic($id)
    {
        $event=Events::where('id', $id)->first();
        $eventTicket=EventTickets::where('event_id', $id)->first();
        $eventPublish=EventPublish::where('event_id', $id)->first();


        return view('event_planer.edit_publish', compact('id','event','eventTicket','eventPublish'));
    }


    public function updatePublish(Request $request)
    {
        $publish= EventPublish::where('event_id', $request->event_id)->first();
        $publish->event_id=$request->event_id;
        $publish->public=$request->public;
        $publish->audience=$request->audience;
        $publish->publish=$request->publish;
        $publish->date=$request->date;
        $publish->time=$request->time;
        $publish->privacy=$request->privacy;
        $publish->save();
        return redirect()->route('events');
    }

    public function eventPlannerAccountSettings()
    {
        $eventAccountSettings=EventPlannerAccountSetting::where('user_id', Auth::user()->id)->first();
        $countries=Countrie::all();
        $states=State::all();

        return view('event_planer.account_settings', compact('countries','states','eventAccountSettings'));
    }

    public function insertEventPlannerAccountSettings(Request $request)
    {
        $eventAccountSettings=EventPlannerAccountSetting::where('user_id', Auth::user()->id)->first();

        if($eventAccountSettings==null)
        {
            $eventAccountSettings= new EventPlannerAccountSetting();
            $eventAccountSettings->user_id=Auth::user()->id;
            $eventAccountSettings->prefix=$request->prefix;
            $eventAccountSettings->first_name=$request->first_name;
            $eventAccountSettings->last_name=$request->last_name;
            $eventAccountSettings->suffix=$request->suffix;
            $eventAccountSettings->home_phone=$request->home_phone;
            $eventAccountSettings->cell_phone=$request->cell_phone;
            $eventAccountSettings->job_title=$request->job_title;
            $eventAccountSettings->company=$request->company;
            $eventAccountSettings->website=$request->website;
            $eventAccountSettings->blog=$request->blog;
            $eventAccountSettings->home_address_one=$request->home_address_one;
            $eventAccountSettings->home_address_two=$request->home_address_two;
            $eventAccountSettings->home_address_city=$request->home_address_city;
            $eventAccountSettings->home_address_country=$request->home_address_country;
            $eventAccountSettings->home_address_zip_code=$request->home_address_zip_code;
            $eventAccountSettings->home_address_state=$request->home_address_state;
            $eventAccountSettings->billing_address_one=$request->billing_address_one;
            $eventAccountSettings->billing_address_two=$request->billing_address_two;
            $eventAccountSettings->billing_address_city=$request->billing_address_city;
            $eventAccountSettings->billing_address_country=$request->billing_address_country;
            $eventAccountSettings->billing_address_zip=$request->billing_address_zip;
            $eventAccountSettings->billing_address_state=$request->billing_address_state;
            $eventAccountSettings->shipping_address_one=$request->shipping_address_one;
            $eventAccountSettings->shipping_address_two=$request->shipping_address_two;
            $eventAccountSettings->shipping_address_city=$request->shipping_address_city;
            $eventAccountSettings->shipping_address_country=$request->shipping_address_country;
            $eventAccountSettings->shipping_address_zip=$request->shipping_address_zip;
            $eventAccountSettings->shipping_address_state=$request->shipping_address_state;
            $eventAccountSettings->work_address_one=$request->work_address_one;
            $eventAccountSettings->work_address_two=$request->work_address_two;
            $eventAccountSettings->work_address_city=$request->work_address_city;
            $eventAccountSettings->work_address_country=$request->work_address_country;
            $eventAccountSettings->work_address_zip=$request->work_address_zip;
            $eventAccountSettings->work_address_state=$request->work_address_state;
            if ($request->has('img')) {
                $image = $request->img;
                if ($image) {
                    $file_name = Auth::user()->id . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('assets/images/eventProfile'), $file_name);
                    $eventAccountSettings->img = 'assets/images/eventProfile/' . $file_name;
                }
            }
            $eventAccountSettings->save();
            return redirect()->back()->with('message', 'Profile has been updated!');
        }
        else
        {
            $eventAccountSettings= EventPlannerAccountSetting::where('user_id', Auth::user()->id)->first();
            $eventAccountSettings->user_id=Auth::user()->id;
            $eventAccountSettings->prefix=$request->prefix;
            $eventAccountSettings->first_name=$request->first_name;
            $eventAccountSettings->last_name=$request->last_name;
            $eventAccountSettings->suffix=$request->suffix;
            $eventAccountSettings->home_phone=$request->home_phone;
            $eventAccountSettings->cell_phone=$request->cell_phone;
            $eventAccountSettings->job_title=$request->job_title;
            $eventAccountSettings->company=$request->company;
            $eventAccountSettings->website=$request->website;
            $eventAccountSettings->blog=$request->blog;
            $eventAccountSettings->home_address_one=$request->home_address_one;
            $eventAccountSettings->home_address_two=$request->home_address_two;
            $eventAccountSettings->home_address_city=$request->home_address_city;
            $eventAccountSettings->home_address_country=$request->home_address_country;
            $eventAccountSettings->home_address_zip_code=$request->home_address_zip_code;
            $eventAccountSettings->home_address_state=$request->home_address_state;
            $eventAccountSettings->billing_address_one=$request->billing_address_one;
            $eventAccountSettings->billing_address_two=$request->billing_address_two;
            $eventAccountSettings->billing_address_city=$request->billing_address_city;
            $eventAccountSettings->billing_address_country=$request->billing_address_country;
            $eventAccountSettings->billing_address_zip=$request->billing_address_zip;
            $eventAccountSettings->billing_address_state=$request->billing_address_state;
            $eventAccountSettings->shipping_address_one=$request->shipping_address_one;
            $eventAccountSettings->shipping_address_two=$request->shipping_address_two;
            $eventAccountSettings->shipping_address_city=$request->shipping_address_city;
            $eventAccountSettings->shipping_address_country=$request->shipping_address_country;
            $eventAccountSettings->shipping_address_zip=$request->shipping_address_zip;
            $eventAccountSettings->shipping_address_state=$request->shipping_address_state;
            $eventAccountSettings->work_address_one=$request->work_address_one;
            $eventAccountSettings->work_address_two=$request->work_address_two;
            $eventAccountSettings->work_address_city=$request->work_address_city;
            $eventAccountSettings->work_address_country=$request->work_address_country;
            $eventAccountSettings->work_address_zip=$request->work_address_zip;
            $eventAccountSettings->work_address_state=$request->work_address_state;
            if ($request->has('img')) {
                $image = $request->img;
                if ($image) {
                    $file_name = Auth::user()->id . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('assets/images/eventProfile'), $file_name);
                    $eventAccountSettings->img = 'assets/images/eventProfile/' . $file_name;
                }
            }
            $eventAccountSettings->save();
            return redirect()->back()->with('message', 'Profile has been updated!');
        }
    }

    public function EventOrders()
    {
        $eventOrders=OrderTicket::where('user_id', Auth::user()->id)->get();
        return view('event_planer.orders', compact('eventOrders'));
    }

    public function eventTicketsType()
    {
        return view('event_planer.tickets');
    }

    public function eventDashboard($id)
    {
        $event=Events::where('id', $id)->first();
        $totalRevenue=OrderTicket::where("event_id", $id)->sum('ticket_price');
        $ticketsPurchased= OrderTicket::where('event_id', $id)->sum('no_of_tickets');
        $ticket=EventTickets::where('event_id', $id)->first();
        $percentage=  ($ticketsPurchased/  $ticket->available_quantity) * 100;
        $eventOrders=OrderTicket::where([['user_id', Auth::user()->id],["event_id", $id]])->get();
        return view('event_planer.event_dashboard', compact('totalRevenue','percentage','ticket','ticketsPurchased','eventOrders','event'));
    }

    public function dashboard()
    {
        $dt = Carbon::now()->toDateString();
        $totalEvents=Events::where('user_id', Auth::user()->id)->count();
        $UpComingEvents = DB::table('events')
        ->where('events.status', 1)
        ->where('event_date_times.event_start','>=', $dt)
        ->join('event_date_times', 'events.id', '=', 'event_date_times.event_id')
        ->select('events.*', 'event_date_times.event_start', 'event_date_times.start_time', 'event_date_times.event_type')
        ->count();

        $pastEvents = DB::table('events')
        ->where('events.status', 1)
        ->where('event_date_times.event_start','<', $dt)
        ->join('event_date_times', 'events.id', '=', 'event_date_times.event_id')
        ->select('events.*', 'event_date_times.event_start', 'event_date_times.start_time', 'event_date_times.event_type')
        ->count();
        $eventOrders=OrderTicket::where('user_id', Auth::user()->id)->get();
        $totalOrders=$eventOrders->count();

        $tickets= DB::table('events')
        ->where('events.user_id', Auth::user()->id)
        ->join('event_tickets', 'events.id', '=', 'event_tickets.event_id')
        ->select('event_tickets.*','events.id as e_id')->get();

        $count=0;

        foreach( $tickets as  $ticket)
        {
            $tickets[$count]=$ticket;
            $tickets[$count]->ticketsPurchased= OrderTicket::where('event_id', $ticket->e_id)->sum('no_of_tickets');
            $count++;
        }

        return view('event_planer.dashboard', compact('totalEvents','UpComingEvents','pastEvents','eventOrders','totalOrders','tickets'));
    }





}
