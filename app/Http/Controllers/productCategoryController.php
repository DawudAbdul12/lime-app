<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductCategory;

class productCategoryController extends Controller
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
    $parent = ProductCategory::WHERE('parent', 0)->get();
    $categories = ProductCategory::all();
    //###################  PAGE NAME #########################
    $page = "product_categories";

    return view('admin.product.category.categories',compact('categories','parent','page'));


    }

  

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            
             // SLUG
              // To check whether two pieces of content with the same title.
                  $results = ProductCategory::WHERE('title', $request->input('title'))->get();
                  $slug = $this->checker_slug($request->input('title'), $old_slug = null,$results);
              // END OF SLUG
  
              
              //BING PARAM
  
                  $category = new ProductCategory;
                  $category->title = $request->input('title');
                  $category->slug =  $slug;
                  $category->parent = $request->input('parent');
                  $category->position = $request->input('position'); 
                  $category->publish = $request->input('publish');
                  $category->content = $request->input('content');
  
              //END BING PARAM
  
              // SAVE
                $category->save();
            
           //
              $parent = ProductCategory::WHERE('parent', 0)->get();
              $categories = ProductCategory::all();
              $success = 'You Have Added a New Category Successfully .';
              //###################  PAGE NAME #########################
              $page = "product_categories";

              return view('admin.product.category.categories',compact('categories','parent','success','page'));
          
        
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
         $category = ProductCategory::find($id);
         $parent = ProductCategory::WHERE('parent', 0)->get();
         $categories = ProductCategory::all();
         //###################  PAGE NAME #########################
         $page = "product_categories";
         return view('admin.product.category.edit_category',compact('categories','parent','category','page'));
         
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
      
            $category = ProductCategory::find($id);

            // SLUG
            // To check whether two pieces of content with the same title.
                $results = ProductCategory::WHERE('title', $request->input('title'))->get();
                $slug = $this->checker_slug($request->input('title'), $category->slug, $results);
            // END OF SLUG
               
                $category->title = $request->input('title');
                $category->slug =  $slug;
                $category->parent = $request->input('parent');
                $category->position = $request->input('position'); 
                $category->publish = $request->input('publish');
                $category->content = $request->input('content');

                // SAVE
                $category->save();
          
            // AFTER UPDATE
            $parent = ProductCategory::WHERE('parent', 0)->get();
            $categories = ProductCategory::all();
            $category = ProductCategory::find($id);
            $success = 'Updated  Successfully .';
             //###################  PAGE NAME #########################
            $page = "product_categories";

            return view('admin.product.category.edit_category',compact('categories','parent','success','category','page'));
        
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
            $category = ProductCategory::find($id)->delete();
             // AFTER DELETE
             $parent = ProductCategory::WHERE('parent', 0)->get();
             $categories = ProductCategory::all();
             $success = 'Updated  Successfully .';
              //###################  PAGE NAME #########################
             $page = "product_categories";
             return view('admin.product.category.categories',compact('categories','parent','success','page'));
    
           
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
