<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BlogCategory;
use App\Blog;

class blogController extends Controller
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
        $blogs = Blog::all();
        //###################  PAGE NAME #########################
        $page = "all_blogs";
        return view('admin.blog.all_blogs',compact('blogs','page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         //
         $parent = Blogcategory::WHERE('parent', 0)->get();
         $categories = Blogcategory::all();
         //###################  PAGE NAME #########################
         $page = "add_blog";
        //###################  ALL SHOPS #########################
        
         return view('admin.blog.add_blog',compact('categories','parent','page'));
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
            // SLUG
            // To check whether two pieces of content with the same title.
                $results = Blog::WHERE('title', $request->input('title'))->get();
                $slug = $this->checker_slug($request->input('title'), $old_slug = null,$results);
            // END OF SLUG

            // IMAGE PROCESSOR
                if ($request->hasFile('pic')) {
                        
                    $image = $request->file('pic');
                    $image_name = $slug.'.'.$image->getClientOriginalExtension();
                    $destinationPath = public_path('/blog_images');
                    $image->move($destinationPath, $image_name);
        
                }else{

                    $image_name = "";
                }
        
           // END  IMAGE PROCESSOR
            
            //BING PARAM

                $blog = new Blog;
                $blog->title = $request->input('title');
                $blog->slug =  $slug;
                $blog->content = $request->input('content');
                $blog->pic = $image_name; 
                $blog->category = $request->input('category');
                $blog->tag = $request->input('tag');
                $blog->visibility = $request->input('visibility');
                $blog->publish = $request->input('publish');
                $blog->featured = $request->input('featured');
                $blog->author = $request->input('author');

            //END BING PARAM

            // SAVE
              $blog->save();
          
            //
            $parent = Blogcategory::WHERE('parent', 0)->get();
            $categories = Blogcategory::all();
            $success = 'You Have Added a New Blog Successfully .';
             //###################  PAGE NAME #########################
             $page = "add_blog";

            return view('admin.blog.add_blog',compact('categories','parent','success','page'));

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
        $blog = Blog::find($id);
       // $parent = Blogcategory::WHERE('parent', 0)->get();
        $categories = Blogcategory::all();
         //###################  PAGE NAME #########################
         $page = "edit_blog";

        return view('admin.blog.edit_blog',compact('categories','blog','page'));
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
         try{
           
             $blog = Blog::find($id);
          // SLUG
          // To check whether two pieces of content with the same title.
              $results = Blog::WHERE('title', $request->input('title'))->get();
              $slug = $this->checker_slug($request->input('title'), $blog->slug,$results);
          // END OF SLUG

          // IMAGE PROCESSOR
              if ($request->hasFile('pic')) {
                      
                  $image = $request->file('pic');
                  $image_name = $slug.time().'.'.$image->getClientOriginalExtension();
                  $destinationPath = public_path('/blog_images');
                  $image->move($destinationPath, $image_name);
                  $blog->pic = $image_name; 

              }else{

                  $image_name = "";
              }
      
         // END  IMAGE PROCESSOR
          
          //BING PARAM
              $blog->title = $request->input('title');
              $blog->slug =  $slug;
              $blog->content = $request->input('content');
              $blog->category = $request->input('category');
              $blog->tag = $request->input('tag');
              $blog->visibility = $request->input('visibility');
              $blog->publish = $request->input('publish');
              //$blog->publish = now();
              $blog->featured = $request->input('featured');
              $blog->author = $request->input('author') ;

          //END BING PARAM

          // SAVE
            $blog->save();
        
          //
          $blog = Blog::find($id);
          $parent = Blogcategory::WHERE('parent', 0)->get();
          $categories = Blogcategory::all();
          $success = 'You Have Updated a Blog Successfully .';
           //###################  PAGE NAME #########################
           $page = "edit_blog";
          return view('admin.blog.edit_blog',compact('categories','parent','success','blog','page'));
      
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

            $blog = Blog::find($id)->delete();
             // AFTER DELETE
            $categories = Blogcategory::all();
            $success = 'Deleted  Succefully .';
             //###################  PAGE NAME #########################
             $page = "all_blogs";   
            
            return view('admin.blog.all_blogs',compact('categories','success','page'));

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
