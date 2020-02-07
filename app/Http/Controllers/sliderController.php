<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;

class sliderController extends Controller
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
        $page = "all_slider";
        $sliders = Slider::all();
        return view('admin.slider.all_slider',compact('page','sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page = "add_slider";
        return view('admin.slider.add_slider',compact('page'));
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
             
            $title = $request->input('title');
            // IMAGE PROCESSOR
                if ($request->hasFile('pic')) {
                        
                    $image = $request->file('pic');
                    $image_name = $title.rand().'.'.$image->getClientOriginalExtension();
                    $destinationPath = public_path('/slider_images');
                    $image->move($destinationPath, $image_name);
        
                }else{

                    $image_name = "";
                }
            
            //BING PARAM

                $slider = new Slider;
                $slider->title = $title;
                $slider->link = $request->input('link');
                $slider->btn_text = $request->input('btn_txt');
                $slider->content = $request->input('content');
                $slider->pic = $image_name;
                $slider->visibility = $request->input('visibility');
                $slider->publish = $request->input('publish');

            // SAVE
              $slider->save();
             // AFTER
              $success = 'Added Successfully .';
             //PAGE NAME
              $page = "add_slider";

            return view('admin.slider.add_slider',compact('success','page'));

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
        $page = "edit_slider";
        $slider = Slider::find($id);
        return view('admin.slider.edit_slider',compact('slider','page'));
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
            $slider =  Slider::find($id);
            $title = $request->input('title');
            // IMAGE PROCESSOR
                if ($request->hasFile('pic')) {
                        
                    $image = $request->file('pic');
                    $image_name = $title.rand().'.'.$image->getClientOriginalExtension();
                    $destinationPath = public_path('/slider_images');
                    $image->move($destinationPath, $image_name);
                    $slider->pic = $image_name;
        
                }
            //BING PARAM

                $slider->title = $title;
                $slider->link = $request->input('link');
                $slider->btn_text = $request->input('btn_txt');
                $slider->content = $request->input('content');
                $slider->visibility = $request->input('visibility');
                $slider->publish = $request->input('publish');

            // SAVE
              $slider->save();
             // AFTER
              $slider = Slider::find($id);
              $success = 'Updated Successfully .';
             //PAGE NAME
              $page = "edit_slider";

            return view('admin.slider.edit_slider',compact('success','slider','page'));

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

            $slider = Slider::find($id)->delete();
            // AFTER DELETE
            $sliders = Slider::all();
            $success = 'Deleted  Succefully .';
            //###################  PAGE NAME #########################
            $page = "all_slider";   
            
            return view('admin.slider.all_slider',compact('sliders','success','page'));

        }catch(\Exception $e) {

                return $e->getMessage();
        }
    }
}
