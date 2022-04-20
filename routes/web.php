<?php
use Illuminate\Support\Facades\Route;

Auth::routes();
Route::get('/', 'HomeController@index')->name('index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/events/create_event', 'EventController@createEvent')->name('create_event')->middleware(['auth', 'UserMiddleware']);
Route::post('/events/insert_event', 'EventController@insertEvent')->name('insert_event')->middleware(['auth', 'UserMiddleware']);
Route::get('/events/details/{id}', 'EventController@eventDetail')->name('details')->middleware(['auth', 'UserMiddleware']);
Route::post('/events/insert_details', 'EventController@insertEventDetails')->name('insert_details')->middleware(['auth', 'UserMiddleware']);
Route::get('/events/create_tickets/{id}', 'EventController@eventTickets')->name('create_tickets')->middleware(['auth', 'UserMiddleware']);
Route::post('/events/insert_ticket', 'EventController@insertTicket')->name('insert_ticket')->middleware(['auth', 'UserMiddleware']);
Route::get('/events/publish/{id}', 'EventController@eventPublish')->name('create_publish')->middleware(['auth', 'UserMiddleware']);
Route::post('/events/insert_publish', 'EventController@insertPublish')->name('insert_publish')->middleware(['auth', 'UserMiddleware']);
Route::get('/events/edit_create_event/{id}', 'EventController@editCreateEvent')->name('edit_create_event')->middleware(['auth', 'UserMiddleware']);
Route::post('/events/update_create_event', 'EventController@updateevent')->name('update_create_event')->middleware(['auth', 'UserMiddleware']);
Route::get('/events/edit_details/{id}', 'EventController@editDetails')->name('edit_details')->middleware(['auth', 'UserMiddleware']);
Route::post('/events/update_details', 'EventController@updateDetails')->name('update_details')->middleware(['auth', 'UserMiddleware']);
Route::get('/events/edit_tickets/{id}', 'EventController@editTicket')->name('edit_tickets')->middleware(['auth', 'UserMiddleware']);
Route::post('/events/update_tickets', 'EventController@updateTicket')->name('update_tickets')->middleware(['auth', 'UserMiddleware']);
Route::get('/events/edit_publish/{id}', 'EventController@editPublic')->name('edit_publish')->middleware(['auth', 'UserMiddleware']);
Route::post('/events/update_publish', 'EventController@updatePublish')->name('update_publish')->middleware(['auth', 'UserMiddleware']);
Route::get('/events', 'EventController@events')->name('events')->middleware(['auth', 'UserMiddleware']);
Route::get('/events/search', 'EventController@searchEvents')->name('searchEvents')->middleware(['auth', 'UserMiddleware']);
Route::get('/events/create_organizer', 'OrganizerController@createOrganizer')->name('create_organizer')->middleware(['auth', 'UserMiddleware']);
Route::post('/events/insert_organizer', 'OrganizerController@insertOrganizer')->name('insert_organizer')->middleware(['auth', 'UserMiddleware']);
Route::get('/events/organizers', 'OrganizerController@organizers')->name('organizers')->middleware(['auth', 'UserMiddleware']);
Route::get('/user/view_organizer/{id}', 'OrganizerController@viewOrganizer')->name('view_organizer')->middleware(['auth', 'UserMiddleware']);
Route::get('/events/edit_organizer/{id}', 'OrganizerController@editOrganizer')->name('edit_organizer')->middleware(['auth', 'UserMiddleware']);
Route::post('/events/edit_organizer', 'OrganizerController@updateOrganizer')->name('update_organizer')->middleware(['auth', 'UserMiddleware']);
Route::get('/events/delete_organizer/{id}', 'OrganizerController@softDel')->name('delete_organizer')->middleware(['auth', 'UserMiddleware']);
Route::get('/events/account_settings', 'EventController@eventPlannerAccountSettings')->name('event_account_settings')->middleware(['auth', 'UserMiddleware']);
Route::post('/events/insert_account_settings', 'EventController@insertEventPlannerAccountSettings')->name('insert_event_account_settings')->middleware(['auth', 'UserMiddleware']);
Route::get('/events/tickets', 'EventController@eventTicketsType')->name('event_tickets')->middleware(['auth', 'UserMiddleware']);
Route::get('/events/orders', 'EventController@EventOrders')->name('event_orders')->middleware(['auth', 'UserMiddleware']);
Route::get('/events/event_dashboard/{id}', 'EventController@eventDashboard')->name('event_dashboard')->middleware(['auth', 'UserMiddleware']);
Route::get('/events/dashboard', 'EventController@dashboard')->name('dashboard')->middleware(['auth', 'UserMiddleware']);









Route::get('/events/postpone', function () {
    return view('event_planer/postpone');
})->name('postpone');

// User Routes

Route::get('/user/events', 'UserController@userEvents')->name('user_events');
Route::get('/user/view_event/{id}', 'UserController@userEventDetail')->name('user_view_event')->middleware(['auth']);
Route::post('/user/follow_organizer', 'OrganizerController@followOrganizer')->name('follow_organizer')->middleware(['auth', 'UserMiddleware']);
Route::post('/user/check_follow', 'OrganizerController@checkFollower')->name('check_follow')->middleware(['auth', 'UserMiddleware']);
Route::post('/user/unfollow', 'OrganizerController@unFollowOrganizer')->name('unfollow')->middleware(['auth', 'UserMiddleware']);
Route::post('/user/contact_organizer', 'OrganizerController@insertContactOrganizer')->name('contact_organizer')->middleware(['auth', 'UserMiddleware']);
Route::get('/user/contact_organizers', 'OrganizerController@ContactOrganizer')->name('contact_organizers')->middleware(['auth', 'UserMiddleware']);
Route::get('users/events/search', 'UserController@searchEvents')->name('userSearchEvents');
Route::post('/user/insert_account_setting', 'UserController@insertAccountSettings')->name('insert_account_setting')->middleware(['auth', 'UserMiddleware']);
Route::get('/user/account_settings', 'UserController@userAccountSettings')->name('user_account_settings')->middleware(['auth', 'UserMiddleware']);
Route::get('/user/view_user', 'UserController@userProfile')->name('view_user')->middleware(['auth', 'UserMiddleware']);
Route::post('/user/check_liked', 'UserController@checkLiked')->name('check_liked')->middleware(['auth', 'UserMiddleware']);
Route::post('/create/invoice', 'UserController@invoice')->name('invoice')->middleware(['auth', 'UserMiddleware']);
Route::get('/user/orders', 'UserController@userOrders')->name('users-orders')->middleware(['auth', 'UserMiddleware']);


// Admin Routes
Route::get('/admin/dashboard', 'AdminController@adminDashboard')->name('admin-dashboard')->middleware(['auth', 'AdminMiddleware']);
Route::get('/admin/events', 'AdminController@adminEvents')->name('admin_events')->middleware(['auth', 'AdminMiddleware']);
Route::get('/admin/participants/{id}', 'AdminController@showAdminParticipants')->name('participants')->middleware(['auth', 'AdminMiddleware']);
Route::get('/admin/event_planners', 'AdminController@adminOrganizer')->name('event_planners')->middleware(['auth', 'AdminMiddleware']);
Route::get('/admin/view_event_planner/{id}', 'AdminController@adminViewOrganizer')->name('view_event_planner')->middleware(['auth', 'AdminMiddleware']);
Route::get('/events/delete_organizer', 'AdminController@changeStatus')->name('isactive_organizer')->middleware(['auth', 'AdminMiddleware']);
Route::get('/admin/account_settings', 'AdminController@adminAccountSettings')->name('admin_account_settings')->middleware(['auth', 'AdminMiddleware']);
Route::post('/admin/insert_account_settings', 'AdminController@insertdminAccountSettings')->name('insert_admin_account_settings')->middleware(['auth', 'AdminMiddleware']);
Route::get('/admin/categories', 'AdminController@categories')->name('categories')->middleware(['auth', 'AdminMiddleware']);
Route::post('/admin/insert_category', 'AdminController@insertCategory')->name('insert_category')->middleware(['auth', 'AdminMiddleware']);
Route::get('/admin/create_category', 'AdminController@createCategory')->name('create_category')->middleware(['auth', 'AdminMiddleware']);
Route::get('/admin/edit_category/{id}', 'AdminController@editCategory')->name('edit_category')->middleware(['auth', 'AdminMiddleware']);
Route::post('/admin/update_category', 'AdminController@updateCategory')->name('update_category')->middleware(['auth', 'AdminMiddleware']);
Route::get('/admin/delete_category/{id}', 'AdminController@deleteCategory')->name('delete_category')->middleware(['auth', 'AdminMiddleware']);
Route::get('/admin/sub_categories', 'AdminController@subCategory')->name('sub_categories')->middleware(['auth', 'AdminMiddleware']);
Route::get('/admin/create_sub_category', 'AdminController@createSubCategories')->name('create_sub_category')->middleware(['auth', 'AdminMiddleware']);
Route::post('/admin/insert_sub_category', 'AdminController@insertSubCategory')->name('insert_sub_category')->middleware(['auth', 'AdminMiddleware']);
Route::get('/admin/edit_sub_category/{id}', 'AdminController@editSubCategory')->name('edit_sub_category')->middleware(['auth', 'AdminMiddleware']);
Route::post('/admin/update_sub_category', 'AdminController@updateSubCategory')->name('update_sub_category')->middleware(['auth', 'AdminMiddleware']);
Route::get('/admin/delete_sub_category/{id}', 'AdminController@deleteSubCategory')->name('delete_sub_category')->middleware(['auth', 'AdminMiddleware']);
Route::get('/admin/account_approvals', 'AdminController@accountsApproval')->name('account_approvals')->middleware(['auth', 'AdminMiddleware']);
Route::get('/admin/accounts_status', 'AdminController@accountsApprovalStatus')->name('isactive_accounts')->middleware(['auth', 'AdminMiddleware']);
Route::get('/admin/edit_event_planner/{id}', 'AdminController@addDistribution')->name('edit_event_planner')->middleware(['auth', 'AdminMiddleware']);
Route::post('/admin/update_event_planner', 'AdminController@insertDistribution')->name('update_event_planner')->middleware(['auth', 'AdminMiddleware']);
Route::get('/admin/distribution/{id}', 'AdminController@distribution')->name('distribution')->middleware(['auth', 'AdminMiddleware']);










Route::get('/admin/global_sales_report', function () {
    return view('admin/global_sales_report');
})->name('global_sales_report');

Route::get('/admin/event_sales_report', function () {
    return view('admin/event_sales_report');
})->name('event_sales_report');


Route::get('/admin/mass_emailing', function () {
    return view('admin/mass_emailing');
})->name('mass_emailing');



// Event Planner Routes



Route::get('/events/copy_event', function () {
    return view('event_planer/copy_event');
})->name('copy_event');



Route::get('/events/view_event', function () {
    return view('event_planer/view_event');
})->name('view_event');

Route::get('/events/order_form', function () {
    return view('event_planer/order_form');
})->name('order_form');

Route::get('/events/create_order_form', function () {
    return view('event_planer/create_order_form');
})->name('create_order_form');

Route::get('/events/sales_report', function () {
    return view('event_planer/sales_report');
})->name('sales_report');

Route::get('/events/analytics', function () {
    return view('event_planer/analytics');
})->name('analytics');

Route::get('/events/event_calendar', function () {
    return view('event_planer/event_calendar');
})->name('event_calendar');

Route::get('/events/payment_options', function () {
    return view('event_planer/payment_options');
})->name('payment_options');






