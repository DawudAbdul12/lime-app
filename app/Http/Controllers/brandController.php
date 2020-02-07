<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;

class brandController extends Controller
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
    //
    $brands = Brand::all();
    //###################  PAGE NAME #########################
    $page = "brand";

    return view('admin.brand.brands',compact('brands','page'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        try{

            $title = $request->input('title');
  
              // IMAGE PROCESSOR
                  if ($request->hasFile('image')) {

                      $image = $request->file('image');
                      $image_name = str_slug($title).'-'.time().'.'.$image->getClientOriginalExtension();
                      $destinationPath = public_path('/brand_img');
                      $image->move($destinationPath, $image_name);

          
                  }else{
  
                      $image_name = "";
                  }
          
             // END  IMAGE PROCESSOR
              
              //BING PARAM
  
                  $brand = new Brand;
                  $brand->title = $title;
                  $brand->publish = $request->input('publish');
                  $brand->content = $request->input('content');
                  $brand->image = $image_name;
  
              //END BING PARAM
  
              // SAVE
                $brand->save();
            
           //
              $brands = Brand::all();
              $success = 'You Have Added a New Brand Successfully .';
              //###################  PAGE NAME #########################
              $page = "brand";

              return view('admin.brand.brands',compact('success','brands','page'));
          
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
         //
         $brand = brand::find($id);
         $brands = Brand::all();
         //###################  PAGE NAME #########################
         $page = "brand";

         return view('admin.brand.edit_brand',compact('brands','brand','page'));
         
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
        //
        //
        try{

            $brand = Brand::find($id);
               
            $title = $request->input('title');
  
            // IMAGE PROCESSOR
                if ($request->hasFile('image')) {

                    $image = $request->file('image');
                    $image_name = str_slug($title).'-'.time().'.'.$image->getClientOriginalExtension();
                    $destinationPath = public_path('/brand_img');
                    $image->move($destinationPath, $image_name);
            
                    $brand->image = $image_name;

        
                }else{

                    $image_name = "";
                }

                  $brand->title = $title;
                  $brand->publish = $request->input('publish');
                  $brand->content = $request->input('content');

                // SAVE
                $brand->save();
          
            // AFTER UPDATE
            $brands = Brand::all();
            $success = 'Updated  Successfully .';
             //###################  PAGE NAME #########################
            $page = "brand";

            return view('admin.brand.edit_brand',compact('brand','brands','success','page'));
        
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
        //
        try{
           
            $brand = Brand::find($id)->delete();
             // AFTER DELETE
             $brands = brand::all();
             $success = 'Updated  Successfully .';
              //###################  PAGE NAME #########################
             $page = "brand";
             return view('admin.brand.brands',compact('brands','success','page'));
    
            }catch(\Exception $e) {
                
            return $e->getMessage();
        }

    }


}
