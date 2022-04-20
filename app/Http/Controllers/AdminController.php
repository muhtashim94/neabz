<?php

namespace App\Http\Controllers;

use App\AdminAccountSettings;
use App\Countrie;
use App\EventBridgeSubCategory;
use App\EventCategory;
use App\Events;
use App\EventSubCategory;
use App\OrderTicket;
use App\Organizer;
use App\OrganizerFollowers;
use App\State;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;


class AdminController extends Controller
{
    public function adminDashboard()
    {
        return view('admin.adminDashboard');
    }

    public function adminEvents()
    {
        $adminEvents=[];
        $count=0;
       $admins = DB::table('events')
       ->join('event_tickets', 'events.id', '=', 'event_tickets.event_id')
        ->join('event_date_times', 'events.id', '=', 'event_date_times.event_id')
        ->select('events.*', 'event_date_times.event_start', 'event_date_times.start_time', 'event_date_times.event_type','event_tickets.available_quantity')
        ->get();
        foreach($admins as $adminEvent)
        {
            $adminEvents[$count]=$adminEvent;
            $adminEvents[$count]->ticketsPurchased= OrderTicket::where('event_id', $adminEvent->id)->count();
            $adminEvents[$count]->percentage=  ( $adminEvents[$count]->ticketsPurchased/ $adminEvent->available_quantity) * 100;
            $count++;
        }
        return view('admin.events', compact('adminEvents'));
    }

    public function showAdminParticipants($id)
    {
        $showEventTickets=OrderTicket::where('event_id', $id)->get();
        return view('admin/participants', compact('showEventTickets'));
    }

    public function adminOrganizer()
    {
        $adminOrganizers=[];
        $ors=Organizer::all();
        $count=0;
        foreach($ors as $or)
        {
            $adminOrganizers[$count]=$or;
            $adminOrganizers[$count]['totalFollowers']=OrganizerFollowers::where('organizer_id', $or->id)->count();
            $count++;
        }
        return view('admin.event_planners', compact('adminOrganizers'));
    }

    public function adminViewOrganizer($id)
    {
        $dt = Carbon::now()->toDateString();
        $organizer= Organizer::where('id', $id)->first();
        $UpComingEvents = DB::table('events')
         ->where('events.organizer_id', $organizer->id)
        ->where('events.status', 1)
        ->where('event_date_times.event_start','>=', $dt)
        ->join('event_date_times', 'events.id', '=', 'event_date_times.event_id')
        ->select('events.*', 'event_date_times.event_start', 'event_date_times.start_time', 'event_date_times.event_type')
        ->get();

        $pastEvents = DB::table('events')
        ->where('events.organizer_id', $organizer->id)
        ->where('events.status', 1)
        ->where('event_date_times.event_start','<', $dt)
        ->join('event_date_times', 'events.id', '=', 'event_date_times.event_id')
        ->select('events.*', 'event_date_times.event_start', 'event_date_times.start_time', 'event_date_times.event_type')
        ->get();
        return view('admin.view_event_planner', compact('organizer','UpComingEvents','pastEvents'));
    }

    public function softDel($id)
    {
        $organizer=Organizer::find($id);
        $organizer->soft_del=1;
        $organizer->save();
        return redirect()->route('event_planners');

    }

    public function changeStatus(Request $request)
    {
        $user = Organizer::find($request->user_id);
        $user->soft_del = $request->status;
        $user->save();

        return response()->json(['success'=>'Status change successfully.']);
    }

    public function adminAccountSettings()
    {
        $adminAccount=AdminAccountSettings::where('user_id', Auth::user()->id)->first();
        $states= State::all();
        $countries=Countrie::all();

        return view('admin.account_settings', compact('states', 'countries','adminAccount'));
    }

    public function insertdminAccountSettings(Request $request)
    {
        $randomString = Str::random(3);

        $validation =Validator::make($request->all(),[

            'img' => 'required|mimes:jpeg,jpg,png,gif|required|max:10000',
            'prefix' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'suffix' => 'required',
            'home_phone' => 'required',
            'cell_phone' => 'required',
            'job_title' => 'required',
            'company' => 'required',
            'website' => 'required',
            'blog' => 'required',
            'address_one' => 'required',
            'address_two' => 'required',
            'city' => 'required',
            'country' => 'required',
            'zip' => 'required|numeric',
            'state' => 'required',

        ]);

        if ($validation->fails()) {
            return back()->with('errors', $validation->errors());
        } else {

        $adminAccount=new AdminAccountSettings();
        $adminAccount->user_id=Auth::user()->id;
        $adminAccount->prefix=$request->prefix;
        $adminAccount->suffix=$request->suffix;
        $adminAccount->first_name=$request->first_name;
        $adminAccount->last_name=$request->last_name;
        $adminAccount->home_phone=$request->home_phone;
        $adminAccount->cell_phone=$request->cell_phone;
        $adminAccount->job_title=$request->job_title;
        $adminAccount->company=$request->company;
        $adminAccount->website=$request->website;
        $adminAccount->blog=$request->blog;
        $adminAccount->address_one=$request->address_one;
        $adminAccount->address_two=$request->address_two;
        $adminAccount->city=$request->city;
        $adminAccount->country=$request->country;
        $adminAccount->zip=$request->zip;
        $adminAccount->state=$request->state;

        if ($request->has('img')) {
            $image = $request->img;
            if ($image) {
                $file_name = $randomString . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('assets/images/organizerImages'), $file_name);
                $adminAccount->image = 'assets/images/organizerImages/' . $file_name;
            }
        }
        $adminAccount->save();
        return redirect()->back()->with('success', 'Profile Updated!');
    }
    }

    public function categories()
    {
        $categories=EventCategory::all();
        return view('admin.categories', compact('categories'));
    }

    public function createCategory()
    {
        return view('admin/create_category');
    }


    public function insertCategory(Request $request)
    {
        $validation =Validator::make($request->all(),[

            'category' => 'required',

        ]);

        if ($validation->fails()) {
            return back()->with('errors', $validation->errors());
        } else {

            $category= new EventCategory();
            $category->name=$request->category;
            $category->save();
            return redirect()->route('categories');
        }
    }

    public function editCategory($id)
    {
        $category= EventCategory::find($id);

        return view('admin.edit_category', compact('category'));
    }

    public function updateCategory(Request $request)
    {
        $category= EventCategory::find($request->category_id);
        $category->name=$request->category;
        $category->save();
        return redirect()->route('categories');
    }

    public function deleteCategory($id)
    {

        $eventBridgeSubCategory= EventBridgeSubCategory::where('event_category_id',$id)->first();
        if(isset($eventBridgeSubCategory))
        {
            return Redirect::back()->with('error', 'Cant be deleted because sub category exist');
        }
        $category=EventCategory::find($id);

        $category->delete();
        return redirect()->route('categories')->with('success', '   Category deleted');;
    }

    public function subCategory()
    {
        $eventBridgeSubCategory= EventBridgeSubCategory::all();
        return view('admin/sub_categories', compact('eventBridgeSubCategory'));
    }

    public function createSubCategories()
    {
        $eventCategories=EventCategory::all();
        return view('admin.create_sub_category', compact('eventCategories'));
    }

    public function insertSubCategory(Request $request)
    {
        $validation =Validator::make($request->all(),[

            'subcategory' => 'required',
            'category' => 'required',

        ]);

        if ($validation->fails()) {
            return back()->with('errors', $validation->errors());
        } else {

            $eventBridgeSubCategory= new EventBridgeSubCategory();
            $eventBridgeSubCategory->event_category_id=$request->category;
            $eventBridgeSubCategory->event_sub_category_id=$request->subcategory;
            $eventBridgeSubCategory->save();
            return redirect()->route('sub_categories');
        }
    }

    public function editSubCategory($id)
    {
        $eventCategories=EventCategory::all();
        $eventBridgeSubCategory= EventBridgeSubCategory::find($id);

        return view('admin.edit_sub_category', compact('eventCategories','eventBridgeSubCategory'));
    }

    public function updateSubCategory(Request $request)
    {

        $eventBridgeSubCategory= EventBridgeSubCategory::find($request->eventbridgeid);

        $eventBridgeSubCategory->event_category_id=$request->category;
        $eventBridgeSubCategory->event_sub_category_id=$request->subcategory;
        $eventBridgeSubCategory->save();
        return redirect()->route('sub_categories');
    }

    public function deleteSubCategory($id)
    {
        $eventSubCategory= Events::where('sub_category_id',$id)->first();
        if(isset($eventSubCategory))
        {
            return Redirect::back()->with('error', 'Cant be deleted because events exist of same category');
        }
        $subcategory=EventBridgeSubCategory::find($id);
        $subcategory->delete();
        return redirect()->route('sub_categories')->with('success', '  Sub Category deleted');;
    }

    public function accountsApproval()
    {
        $users=User::where('type', 1)->get();
        return view('admin.account_approvals', compact('users'));
    }

    public function accountsApprovalStatus(Request $request)
    {
        $user = User::find($request->user_id);
        $user->status = $request->status;
        $user->save();
        return response()->json(['success'=>'Status change successfully.']);

    }

     public function addDistribution($id)
     {
         $dist=Organizer::where('id', $id)->first();
        return view('admin.edit_event_planner', compact('id', 'dist'));
     }

     public function insertDistribution(Request $request)
     {

         $dist= Organizer::find($request->organizer_id);
         $dist->distribution = $request->distribution;
         $dist->save();
        return redirect()->route('event_planners');
     }

     public function distribution($id)
     {
        $distribution=OrderTicket::where("event_id", $id)->first();
        $totalRevenue=OrderTicket::where("event_id", $id)->sum('ticket_price');
        $adminCommision=OrderTicket::where("event_id", $id)->sum('admin_commission');
        $distribution['events']=Events::where("id", $id)->first();

        return view('admin/distribution', compact('distribution','adminCommision','totalRevenue'));
     }


}
