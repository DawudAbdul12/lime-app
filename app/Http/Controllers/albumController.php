<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;
use App\AlbumGallery;

class albumController extends Controller
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
        $albums = Album::all();
        $page = "all_album";
        return view('admin.album.all_album',compact('albums','page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page = "add_album";
        return view('admin.album.add_album',compact('page'));
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

            // 
           $results = Album::WHERE('title', $request->input('title'))->get();
           $slug = $this->checker_slug($request->input('title'), $old_slug = null, $results);

           // IMAGE PROCESSOR
               if ($request->hasFile('pic')) {
                       
                   $image = $request->file('pic');
                   $image_name = $slug.'.'.$image->getClientOriginalExtension();
                   $destinationPath = public_path('/gallery_images');
                   $image->move($destinationPath, $image_name);
       
               }else{

                   $image_name = "";
               }
           
           //BING PARAM

               $album = new Album;
               $album->title = $request->input('title');
               $album->slug = $slug;
               $album->content = $request->input('content');
               $album->banner = $image_name; 
               $album->tag = $request->input('tag');
               $album->visibility = $request->input('visibility');
               $album->publish = $request->input('publish');

           // SAVE
             $album->save();


           // GALLARY SECTION

           // GALLERY
            if($request->hasFile('picx')){

               $pics = $request->file('picx');

               foreach($pics as $pic){

                   $image_name = $slug.rand().'.'.$pic->getClientOriginalExtension();
                   $destinationPath = public_path('/gallery_images');
                   $pic->move($destinationPath, $image_name);
                   // STORE 
                   $gallery = new AlbumGallery();
                   $gallery->album_id = $album->id;
                   $gallery->img = $image_name;
                   $gallery->save();
                   
               }

           }

       // AFTER
       $success = 'Added  Successfully .';
       //PAGE NAME
       $page = "add_album";

       return view('admin.album.add_album',compact('success','page'));

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
        $album = Album::find($id);
        $images = AlbumGallery::WHERE('album_id', $id)->get();
        $page = "edit_album";
        return view('admin.album.edit_album', compact('album','images','page'));
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
           
          $album = Album::find($id);
            // 
           $results = Album::WHERE('title', $request->input('title'))->get();
           $slug = $this->checker_slug($request->input('title'), $album->slug, $results);

           // IMAGE PROCESSOR
               if ($request->hasFile('pic')) {
                       
                   $image = $request->file('pic');
                   $image_name = $slug.'.'.$image->getClientOriginalExtension();
                   $destinationPath = public_path('/gallery_images');
                   $image->move($destinationPath, $image_name);

                   $album->banner = $image_name; 
       
               }
           //BING PARAM
               $album->title = $request->input('title');
               $album->slug = $slug;
               $album->content = $request->input('content');
               $album->tag = $request->input('tag');
               $album->visibility = $request->input('visibility');
               $album->publish = $request->input('publish');

           // SAVE
             $album->save();


           // GALLARY SECTION

            if($request->hasFile('picx')){

               $pics = $request->file('picx');

               foreach($pics as $pic){

                   $image_name = $slug.rand().'.'.$pic->getClientOriginalExtension();
                   $destinationPath = public_path('/gallery_images');
                   $pic->move($destinationPath, $image_name);
                   // STORE 
                   $gallery = new AlbumGallery();
                   $gallery->album_id = $album->id;
                   $gallery->img = $image_name;
                   $gallery->save();
                   
               }

           }

       // AFTER
       $album = Album::find($id);
       $images = AlbumGallery::WHERE('album_id', $id)->get();
       $success = 'Updated  Successfully .';
       //PAGE NAME
       $page = "edit_album";

       return view('admin.album.edit_album',compact('album','images','success','page'));

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
            // product
            $album = Album::find($id)->delete();
            // product gallery
            $images = AlbumGallery::WHERE('album_id', $id)->delete();
            // AFTER DELETE
            $albums = Album::all();
            $success = 'Deleted  Succefully .';
            //###################  PAGE NAME #########################
            $page = "all_album";   
            
            return view('admin.album.all_album',compact('albums','success','page'));

        }catch(\Exception $e) {

                return $e->getMessage();
        }
    }

      /**
     * 
     *
     * 
     * 
     */
    public function delete_img(Request $request)
    {
        $delete_img = AlbumGallery::find($request->input('id'))->delete();
        return "Deleted";
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
