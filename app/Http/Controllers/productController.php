<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductGallery;
use App\ProductCategory;

class productCOntroller extends Controller
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
    {   $products = Product::all();
        $page = "all_product";
        return view('admin.product.all_products',compact('page','products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $parent = ProductCategory::WHERE('parent', 0)->get();
        $categories = ProductCategory::all();
        // page
        $page = "add_product";
        return view('admin.product.add_product',compact('categories','parent','page'));
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
            $results = Product::WHERE('name', $request->input('product_name'))->get();
            $slug = $this->checker_slug($request->input('product_name'), $old_slug = null, $results);

            // IMAGE PROCESSOR
                if ($request->hasFile('pic')) {
                        
                    $image = $request->file('pic');
                    $image_name = $slug.'.'.$image->getClientOriginalExtension();
                    $destinationPath = public_path('/product_images');
                    $image->move($destinationPath, $image_name);
        
                }else{

                    $image_name = "";
                }
            
            //BING PARAM

                $product = new Product;
                $product->name = $request->input('product_name');
                $product->slug = $slug;
                $product->content = $request->input('content');
                $product->pic = $image_name; 
                $product->tag = $request->input('tag');
                $product->visibility = $request->input('visibility');
                $product->publish = $request->input('publish');
                $product->category = implode(",",$request->input('category'));
                $product->featured = $request->input('featured');

            // SAVE
              $product->save();


            // GALLARY SECTION

            // GALLERY
             if($request->hasFile('picx')){

                $pics = $request->file('picx');

                foreach($pics as $pic){

                    $image_name = $slug.rand().'.'.$pic->getClientOriginalExtension();
                    $destinationPath = public_path('/product_images');
                    $pic->move($destinationPath, $image_name);
                    // STORE 
                    $gallery = new ProductGallery;
                    $gallery->product_id = $product->id;
                    $gallery->img = $image_name;
                    $gallery->save();
                    
                }

            }

        // AFTER

        // categories
        $parent = ProductCategory::WHERE('parent', 0)->get();
        $categories = ProductCategory::all();
        // message
        $success = 'Added  Successfully .';
        //PAGE NAME
        $page = "add_product";

        return view('admin.product.add_product',compact('categories','parent','success','page'));

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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {    // categories
        $parent = ProductCategory::WHERE('parent', 0)->get();
        $categories = ProductCategory::all();
        // product
        $product = Product::find($id);
        $images = ProductGallery::WHERE('product_id', $id)->get();
        // page
        $page = "edit_product";
        // return 
        return view('admin.product.edit_product', compact('categories','parent','product','images','page'));
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

           $product = Product::find($id);

           $results = Product::WHERE('name', $request->input('product_name'))->get();
           $slug = $this->checker_slug($request->input('product_name'), $product->slug, $results);

           // IMAGE PROCESSOR
               if ($request->hasFile('pic')) {
                       
                   $image = $request->file('pic');
                   $image_name = $slug.'.'.$image->getClientOriginalExtension();
                   $destinationPath = public_path('/product_images');
                   $image->move($destinationPath, $image_name);
                   //bind image
                   $product->pic = $image_name; 
       
               }
           
           //BING PARAM

              
               $product->name = $request->input('product_name');
               $product->slug = $slug;
               $product->content = $request->input('content');
               $product->tag = $request->input('tag');
               $product->visibility = $request->input('visibility');
               $product->publish = $request->input('publish');
               $product->featured = $request->input('featured');
               $product->category = implode(",",$request->input('category'));

           // SAVE
             $product->save();


           // GALLARY SECTION

           // GALLERY
            if($request->hasFile('picx')){

               $pics = $request->file('picx');

               foreach($pics as $pic){

                   $image_name = $slug.rand().'.'.$pic->getClientOriginalExtension();
                   $destinationPath = public_path('/product_images');
                   $pic->move($destinationPath, $image_name);
                   // STORE 
                   $gallery = new ProductGallery;
                   $gallery->product_id = $product->id;
                   $gallery->img = $image_name;
                   $gallery->save();
                   
               }

           }

       // AFTER

       // categories
        $parent = ProductCategory::WHERE('parent', 0)->get();
        $categories = ProductCategory::all();

       // product
       $product = Product::find($id);
       $images = ProductGallery::WHERE('product_id', $id)->get();
       $success = 'Updated  Successfully .';

       //PAGE NAME
       $page = "edit_product";

       return view('admin.product.edit_product',compact('categories','parent','product','images','success','page'));

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
            $team = Product::find($id)->delete();
            // product gallery
            $images = ProductGallery::WHERE('product_id', $id)->delete();
            // AFTER DELETE
            $products = Product::all();
            $success = 'Deleted  Succefully .';
            //###################  PAGE NAME #########################
            $page = "all_product";   
            
            return view('admin.product.all_products',compact('products','success','page'));

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
        $delete_img = ProductGallery::find($request->input('id'))->delete();
        return "Deleted";
    }


    public function checker_slug($name, $old_slug = null,$results){
        // To check whether  
      $q_count = count($results);
      $count=1;
      if($q_count > 0){
        
            foreach ($results as $key => $result) {
            if($q_count > 1 && $key == 0){
            $slug_name = $result['name'];
            }else{
             $slug_name = $result['name']."-".$count++;
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
