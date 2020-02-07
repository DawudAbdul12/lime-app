<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;

class TeamController extends Controller
{

     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::all();
        $page = "all_team";
        return view('admin.team.all_teams',compact('teams','page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page ="add_team";
        return view('admin.team.add_team',compact('page'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
             
            $fullname = $request->input('fullname');
            // IMAGE PROCESSOR
                if ($request->hasFile('pic')) {
                        
                    $image = $request->file('pic');
                    $image_name = $fullname.'.'.$image->getClientOriginalExtension();
                    $destinationPath = public_path('/team_profile');
                    $image->move($destinationPath, $image_name);
        
                }else{

                    $image_name = "";
                }
            
            //BING PARAM

                $Team = new Team;
                $Team->full_name = $fullname;
                $Team->position = $request->input('position');
                $Team->bio = $request->input('content');
                $Team->profile_pic = $image_name; 
                $Team->email = $request->input('email');
                $Team->linkedin = $request->input('linkedin');
                $Team->fb = $request->input('fb');
                $Team->twitter = $request->input('twitter');
                $Team->ig = $request->input('ig');
                $Team->tag = $request->input('tag');
                $Team->visibility = $request->input('visibility');
                $Team->publish = $request->input('publish');

            // SAVE
              $Team->save();
             // AFTER
              $success = 'You Have Added a Team Member Successfully .';
             //PAGE NAME
              $page = "add_team";

            return view('admin.team.add_team',compact('success','page'));

        } catch (\Exception $e) {

          return $e->getMessage();
         
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $team = team::find($id);
        $page = "edit_team";
        return view('admin.team.edit_team',compact('team','page'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $Team = Team::find($id);

            $fullname = $request->input('fullname');
            // IMAGE PROCESSOR
                if ($request->hasFile('pic')) {
                        
                    $image = $request->file('pic');
                    $image_name = $fullname.rand().'.'.$image->getClientOriginalExtension();
                    $destinationPath = public_path('/team_profile');
                    $image->move($destinationPath, $image_name);
                    $Team->profile_pic = $image_name; 
        
                }

            //BING PARAM
                $Team->full_name = $fullname;
                $Team->position = $request->input('position');
                $Team->bio = $request->input('content');
                $Team->email = $request->input('email');
                $Team->linkedin = $request->input('linkedin');
                $Team->fb = $request->input('fb');
                $Team->twitter = $request->input('twitter');
                $Team->ig = $request->input('ig');
                $Team->tag = $request->input('tag');
                $Team->visibility = $request->input('visibility');
                $Team->publish = $request->input('publish');

            // SAVE
              $Team->save();

             // AFTER
              $team = Team::find($id);
              $success = 'Upaded Successfully .';
             //PAGE NAME
              $page = "edit_team";

            return view('admin.team.edit_team',compact('success','page','team'));

        } catch (\Exception $e) {

          return $e->getMessage();
         
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{

                $team = Team::find($id)->delete();
                // AFTER DELETE
                $teams = Team::all();
                $success = 'Deleted  Succefully .';
                //###################  PAGE NAME #########################
                $page = "all_team";   
                
                return view('admin.team.all_team',compact('teams','success','page'));

        }catch(\Exception $e) {

               return $e->getMessage();
       }
    }
}
