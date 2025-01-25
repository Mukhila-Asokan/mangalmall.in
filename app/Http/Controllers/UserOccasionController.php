<?php

namespace App\Http\Controllers;

use App\Models\UserOccasion;
use App\Http\Requests\StoreUserOccasionRequest;
use App\Http\Requests\UpdateUserOccasionRequest;
Use App\Models\OccasionType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

Use session;

class UserOccasionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
     
        $userid = Auth::user()->id;  

        $occasiontype = OccasionType::where('delete_status','0')->get();
        $useroccasion = UserOccasion::where('userid',$userid)->get();

        return view('occasion',compact('occasiontype','useroccasion','userid'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $occasion = new UserOccasion;
         $occasion->userid = $request->userid;
         $occasion->occasiontypeid = $request->occasiontype;
         $occasion->notes = $request->message;
         $occasion->occasiondate = $request->occasiondate;
         $occasion->status = 'Active';
         $occasion->delete_status = 0;
         $occasion->save();  

         return redirect('home/occasion')->with('success', 'Occasion Type successfully created');
    }

    /**
     * Display the specified resource.
     */
    public function show(UserOccasion $userOccasion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserOccasion $userOccasion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserOccasionRequest $request, UserOccasion $userOccasion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserOccasion $userOccasion)
    {
        //
    }
}
