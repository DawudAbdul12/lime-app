<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BlogCategory;

class BlogCategoryController extends Controller
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
    $parent = Blogcategory::WHERE('parent', 0)->get();
    $categories = Blogcategory::all();
    //###################  PAGE NAME #########################
    $page = "categories";

    return view('admin.blog.category.categories',compact('categories','parent','page'));
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
            
              // SLUG
              // To check whether two pieces of content with the same title.
                  $results = Blogcategory::WHERE('title', $request->input('title'))->get();
                  $slug = $this->checker_slug($request->input('title'), $old_slug = null,$results);
              // END OF SLUG
  
              // IMAGE PROCESSOR
                  if ($request->hasFile('image')) {

                      $image = $request->file('image');
                      $image_name = $slug.'.'.$image->getClientOriginalExtension();
                      $destinationPath = public_path('/category_img');
                      $image->move($destinationPath, $image_name);

          
                  }else{
  
                      $image_name = "";
                  }
          
             // END  IMAGE PROCESSOR
              
              //BING PARAM
  
                  $category = new Blogcategory;
                  $category->title = $request->input('title');
                  $category->slug =  $slug;
                  $category->parent = $request->input('parent');
                  $category->position = $request->input('position'); 
                  $category->publish = $request->input('publish');
                  $category->content = $request->input('content');
                  $category->image = $image_name;
  
              //END BING PARAM
  
              // SAVE
                $category->save();
            
           //
              $parent = Blogcategory::WHERE('parent', 0)->get();
              $categories = Blogcategory::all();
              $success = 'You Have Added a New Category Successfully .';
              //###################  PAGE NAME #########################
              $page = "categories";

              return view('admin.blog.category.categories',compact('categories','parent','success','page'));
          
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
         $category = Blogcategory::find($id);
         $parent = Blogcategory::WHERE('parent', 0)->get();
         $categories = Blogcategory::all();
         //###################  PAGE NAME #########################
         $page = "edit_category";
         return view('admin.blog.category.edit_category',compact('categories','parent','category','page'));
         
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

            $category = Blogcategory::find($id);

            // SLUG
            // To check whether two pieces of content with the same title.
                $results = Blogcategory::WHERE('title', $request->input('title'))->get();
                $slug = $this->checker_slug($request->input('title'), $category->slug, $results);
            // END OF SLUG
               
               
            // IMAGE PROCESSOR
                if ($request->hasFile('image')) {
                        
                    $image = $request->file('image');
                    $image_name = $slug.time().'.'.$image->getClientOriginalExtension();
                    $destinationPath = public_path('/category_img');
                    $image->move($destinationPath, $image_name);
                    // bind image
                    $category->image = $image_name;
                }
        
                $category->title = $request->input('title');
                $category->slug =  $slug;
                $category->parent = $request->input('parent');
                $category->position = $request->input('position'); 
                $category->publish = $request->input('publish');
                $category->content = $request->input('content');

                // SAVE
                $category->save();
          
            // AFTER UPDATE
            $parent = Blogcategory::WHERE('parent', 0)->get();
            $categories = Blogcategory::all();
            $category = Blogcategory::find($id);
            $success = 'Updated  Successfully .';
             //###################  PAGE NAME #########################
            $page = "edit_category";

            return view('admin.blog.category.edit_category',compact('categories','parent','success','category','page'));
        
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
           
            $category = Blogcategory::find($id)->delete();
             // AFTER DELETE
             $parent = Blogcategory::WHERE('parent', 0)->get();
             $categories = Blogcategory::all();
             $success = 'Updated  Successfully .';
              //###################  PAGE NAME #########################
             $page = "categories";
             return view('admin.blog.category.categories',compact('categories','parent','success','page'));
    
            }catch(\Exception $e) {
                
            return $e->getMessage();
        }

    }

    public function checker_slug($name, $old_slug = null,$results){
        // To check whether  
      $q_count = count($results);
      $count=1;
      if($q_count > 0){
        
            foreach ($results as $key => $result) {
            if($q_count > 1 && $key == 0){
            $slug_name = $result['title'];
            }else{
             $slug_name = $result['title']."-".$count++;
            }
            // convert to slug
            $new_slug = str_slug($slug_name);
            if($new_slug == $old_slug){
                break;
            }
            }

            return $new_slug;

      }else{

            $new_slug =  str_slug($name);
            return $new_slug;

      }

    }
}
