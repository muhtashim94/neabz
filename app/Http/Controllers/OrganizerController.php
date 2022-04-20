<?php

namespace App\Http\Controllers;

use App\ContactOrganizers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Organizer;
use App\EventType;
use App\EventCategory;
use App\EventSubCategory;
use App\EventDateTime;
use App\Tags;
use App\Events;
use App\EventPublish;
use App\EventTickets;
use App\EventTags;
use App\OrganizerFollowers;
use App\TimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class OrganizerController extends Controller
{
    public function createOrganizer()
    {
        return view('event_planer.create_organizer');
    }

    public function insertOrganizer(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => "required",
            'website' => "required",
            'image' => "required|mimes:jpeg,png|max:10192",
            'website' => "required",
            'bio' => "required",
            'description' => "required",
        ]);
        $randomString = Str::random(3);
        $organizer=new Organizer();
        $organizer->user_id=Auth::user()->id;
        $organizer->name=$request->name;
        $organizer->website=$request->website;
        $organizer->soft_del=1;

        if ($request->has('img')) {
            $image = $request->img;
            if ($image) {
                $file_name = $randomString . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('assets/images/organizerImages'), $file_name);
                $organizer->image = 'assets/images/organizerImages/' . $file_name;
            }
        }
        $organizer->bio=$request->bio;
        $organizer->description=$request->description;
        $organizer->save();
        return redirect()->route('organizers');
    }

    public function organizers()
    {
        $organizers= Organizer::where([['soft_del', 1],['user_id', Auth::User()->id]])->get();
        return view('event_planer.organizers', compact('organizers'));
    }

    public function viewOrganizer($id)
    {
        $dt = Carbon::now()->toDateString();
        $organizer= Organizer::where('id', $id)->first();
        $eventCounts=Events::where([['organizer_id', $organizer->id],['user_id', Auth::User()->id]])->count();
        $UpComingEvents = DB::table('events')
         ->where([['events.organizer_id', $organizer->id],['events.user_id', Auth::User()->id]])
        ->where('events.status', 1)
        ->where('event_start','>=', $dt)
        ->join('event_date_times', 'events.id', '=', 'event_date_times.event_id')
        ->join('event_tickets', 'events.id', '=', 'event_tickets.event_id')
        ->select('events.*', 'event_date_times.event_start', 'event_tickets.price')
        ->paginate(12);

        $pastEvents = DB::table('events')
        ->where([['events.organizer_id', $organizer->id],['events.user_id', Auth::User()->id]])
        ->where('events.status', 1)
        ->where('event_start','<', $dt)
        ->join('event_date_times', 'events.id', '=', 'event_date_times.event_id')
        ->join('event_tickets', 'events.id', '=', 'event_tickets.event_id')
        ->select('events.*', 'event_date_times.event_start', 'event_tickets.price')
        ->paginate(12);
        $checkFollower=OrganizerFollowers::where([['organizer_id', $id], ['user_id', Auth::user()->id]])->first();
        $totalFollowers=OrganizerFollowers::where('organizer_id', $id)->count();

        return view('user.view_organizer', compact('organizer','eventCounts','UpComingEvents','pastEvents','checkFollower','totalFollowers'));
    }

    public function editOrganizer($id)
    {
        $organizer= Organizer::where('id', $id)->first();
        return view('event_planer.edit_organizer', compact('organizer', 'id'));
    }

    public function updateOrganizer(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => "required",
            'website' => "required",
            'image' => "required|mimes:jpeg,png|max:10192",
            'website' => "required",
            'bio' => "required",
            'description' => "required",
        ]);
        $randomString = Str::random(3);
        $organizer=Organizer::find($request->organizer_id);
        $organizer->user_id=Auth::user()->id;
        $organizer->name=$request->name;
        $organizer->website=$request->website;

        if ($request->has('img')) {
            $image = $request->img;
            if ($image) {
                $file_name = $randomString . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('assets/images/organizerImages'), $file_name);
                $organizer->image = 'assets/images/organizerImages/' . $file_name;
            }
        }
        $organizer->bio=$request->bio;
        $organizer->description=$request->description;
        $organizer->save();
        return redirect()->route('organizers');
    }

    public function softDel($id)
    {
        $organizer=Organizer::find($id);
        $organizer->soft_del=0;
        $organizer->save();
        return redirect()->route('organizers');

    }

    public function followOrganizer(Request $request)
    {
        $followOrganizer= new OrganizerFollowers();
        $followOrganizer->user_id= Auth::user()->id;
        $followOrganizer->organizer_id= $request->organizer_id;
        $followOrganizer->save();
        return Response("success");
    }


    public function unFollowOrganizer(Request $request)
    {
        $followOrganizer=OrganizerFollowers::where('organizer_id',$request->organizer_id);
        $followOrganizer->delete();
        return Response("success");
    }

    public function checkFollower(Request $request)
    {
        $response="";
        $checkFollower=OrganizerFollowers::where([['organizer_id', $request->organizer_id], ['user_id', Auth::user()->id]])->first();

        if($request->arg == 0)
        {
            $followOrganizer= new OrganizerFollowers();
            $followOrganizer->user_id= Auth::user()->id;
            $followOrganizer->organizer_id= $request->organizer_id;
            $followOrganizer->save();

            return $response="saved";
        }
        else{
            $followOrganizer=OrganizerFollowers::where('organizer_id',$request->organizer_id);
            $followOrganizer->delete();
            return $response="deleted";
        }

        return Response($response);
    }

    public function insertContactOrganizer(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => "required",
            'email' => "required|email",
            'contact_reason' => "required",
            'website' => "message",

        ]);
        $contactOrganizer= new ContactOrganizers();
        $contactOrganizer->user_id=Auth::user()->id;
        $contactOrganizer->organizer_id=$request->organizer;
        $contactOrganizer->name=$request->name;
        $contactOrganizer->email=$request->email;
        $contactOrganizer->contact_reason=$request->contact_reason;
        $contactOrganizer->message=$request->message;
        $contactOrganizer->save();
        return Redirect()->back()->withErrors(['msg' => 'The Message']);

    }

    public function ContactOrganizer()
    {
        $contactOrganizers=ContactOrganizers::where('user_id', Auth::user()->id)->get();
        return view('event_planer.contact_organizers', compact('contactOrganizers'));

    }
}
