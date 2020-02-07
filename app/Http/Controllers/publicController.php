<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Team;
use App\Product;
use App\Blog;
use App\Album;
use App\AlbumGallery;
use App\Slider;
use App\Brand;
use App\ProductCategory;
use App\ProductGallery;

// use App\Sponsor;
// use App\subscriber;

class publicController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //INDEX PAGE
        $today = now();// today's time and date
        $projects = Product::WHERE('publish', '<=', $today)->WHERE('visibility', '=', 'Public')->WHERE('featured', '=', 'Yes')->orderBy('created_at', 'ASC')->take(5)->get(); // Project
        $brands = Brand::WHERE('publish', '=', "Yes")->orderBy('created_at', 'ASC')->get(); // Brand

        // $teams = Team::WHERE('publish', '<=', $today)->WHERE('visibility', '=', 'Public')->orderBy('created_at', 'ASC')->take(3)->get(); // Team
        // $news = Blog::WHERE('publish', '<=', $today)->WHERE('visibility', '=', 'Public')->orderBy('created_at', 'ASC')->take(3)->get(); // News
        // $sliders = Slider::WHERE('publish', '<=', $today)->WHERE('visibility', '=', 'Public')->orderBy('created_at', 'ASC')->get(); // Slider

        // RETURN
        return view('lime.index',compact('brands','projects'));// return data
    }


    public function skillset()
    {
            // RETURN
            return view('lime.skillset');// return page
    }


    
    public function phsychos()
    {
        //  TEAMS
            $today = now();// today's time and date
            $teams = Team::WHERE('publish', '<=', $today)->WHERE('visibility', '=', 'Public')->paginate(12); // teams

        // RETURN
            return view('lime.phsychos',compact('teams'));// return data
    }


    public function contact()
    {
        // CONTACT US
        return view('lime.contact');
    }


    public function juice()
    {
        //JUICE PAGE
        $today = now();// today's time and date
        $parentCategories = ProductCategory::WHERE('publish', '=', "Yes")->WHERE('parent', '=', 0 )->orderBy('created_at', 'DESC')->get(); // parent categories
        $childrenCategories = ProductCategory::WHERE('publish', '=', "Yes")->WHERE('parent', '<>', 0 )->orderBy('created_at', 'DESC')->get(); // children categories
        $projects = Product::WHERE('publish', '<=', $today)->WHERE('visibility', '=', 'Public')->orderBy('created_at', 'ASC')->paginate(6); // Project
        $active = "all"; // active page
        $subcategory = ""; // active subcategory


        // $projects = Product::WHERE('publish', '<=', $today)->WHERE('visibility', '=', 'Public')->WHERE('featured', '=', 'Yes')->orderBy('created_at', 'ASC')->take(5)->get(); // Project
        // $projects = Product::WHERE('publish', '<=', $today)->WHERE('visibility', '=', 'Public')->WHERE('featured', '=', 'Yes')->orderBy('created_at', 'ASC')->take(5)->get(); // Project
        // $brands = Brand::WHERE('publish', '=', "Yes")->orderBy('created_at', 'ASC')->get(); // Brand

        // $teams = Team::WHERE('publish', '<=', $today)->WHERE('visibility', '=', 'Public')->orderBy('created_at', 'ASC')->take(3)->get(); // Team
        // $news = Blog::WHERE('publish', '<=', $today)->WHERE('visibility', '=', 'Public')->orderBy('created_at', 'ASC')->take(3)->get(); // News
        // $sliders = Slider::WHERE('publish', '<=', $today)->WHERE('visibility', '=', 'Public')->orderBy('created_at', 'ASC')->get(); // Slider

        // RETURN
        return view('lime.juice',compact('parentCategories','childrenCategories','projects','active','subcategory'));// return data

        //return view('lime.juice');// return data

    }




    
    public function juice_category($slug)
    {
        //JUICE PAGE
        $today = now();// today's time and date
        $parentCategories = ProductCategory::WHERE('publish', '=', "Yes")->WHERE('parent', '=', 0 )->orderBy('created_at', 'DESC')->get(); // parent categories

        $activeCategory = ProductCategory::WHERE('publish', '=', "Yes")->WHERE('parent', '=', 0 )->WHERE('slug', '=', $slug )->orderBy('created_at', 'DESC')->first(); // Active categories

        $childrenCategories = ProductCategory::WHERE('publish', '=', "Yes")->WHERE('parent', '=', $activeCategory->id )->orderBy('created_at', 'DESC')->get(); // children under active categories

        $projects = Product::query();
      
        foreach ($childrenCategories as $key => $value) {
           
            if($key == 0){

                 $projects = $projects->WHERE('visibility', '=',  'public')->WHERE('publish', '<=', $today)->WHERE('category', 'like', '%'.$value->id.'%');

            }else{

                $projects = $projects->union(Product::WHERE('visibility', '=',  'public')->WHERE('publish', '<=', $today)->WHERE('category', 'like', '%'.$value->id.'%'));
            }
        }
        if( count($childrenCategories) > 0){
            $projects = $projects->orderBy('created_at', 'ASC')->paginate(6);;
        }

        $active = $slug; // active page
        $subcategory = ""; // active subcategory

      
        // RETURN
        return view('lime.juice',compact('parentCategories','childrenCategories','projects','active','subcategory'));// return data

    }




    public function juice_subcategory($category,$subcategory)
    {
        //JUICE PAGE
        $today = now();// today's time and date
        $parentCategories = ProductCategory::WHERE('publish', '=', "Yes")->WHERE('parent', '=', 0 )->orderBy('created_at', 'DESC')->get(); // parent categories

        $activeCategory = ProductCategory::WHERE('publish', '=', "Yes")->WHERE('parent', '=', 0 )->WHERE('slug', '=', $category )->orderBy('created_at', 'DESC')->first(); // Active categories

        $childrenCategories = ProductCategory::WHERE('publish', '=', "Yes")->WHERE('parent', '=', $activeCategory->id )->orderBy('created_at', 'DESC')->get(); // children under active categories

        $subCat = ProductCategory::WHERE('publish', '=', "Yes")->WHERE('parent', '<>', 0 )->WHERE('slug', '=', $subcategory )->orderBy('created_at', 'DESC')->first(); //  active sub categories

        $projects = Product::query();
        $projects = $projects->WHERE('visibility', '=',  'public')->WHERE('publish', '<=', $today)->WHERE('category', 'like', '%'.$subCat->id.'%')->orderBy('created_at', 'ASC')->paginate(6);

        $active = $category; // active page

        // RETURN
        return view('lime.juice',compact('parentCategories','childrenCategories','projects','active','subcategory'));// return data

    }




    
    public function single_project($slug)
    {
        // SINGLE PROJECT

            $today = now();// today's time and date

            $slug = str_slug($slug); // slug again for security purpose

            $project = Product::WHERE('publish', '<=', $today)->WHERE('visibility', '=', 'Public')->WHERE('slug', '=', $slug)
            ->firstorfail(); // single Product

            $images = ProductGallery::WHERE('product_id',  $project->id)->get();

        // RETURN
            return view('lime.single-juice',compact('project','images'));// return data
    }

     public function single_news($slug)
    {
        // SINGLE News

            $today = now();// today's time and date
            $slug = str_slug($slug); // slug again for security purpose
            $blog = Blog::WHERE('publish', '<=', $today)->WHERE('visibility', '=', 'Public')->WHERE('slug', '=', $slug)->firstorfail(); // single news
            $news = Blog::WHERE('publish', '<=', $today)->WHERE('visibility', '=', 'Public')->WHERE('slug', '!=', $slug)->orderBy('created_at', 'DESC')->take(3)->get(); // Related News

        // RETURN
            return view('frontend.single-news',compact('blog','news'));// return data
    }


    public function gallery()
    {
        //  GALLERY
            $today = now();// today's time and date
            $gallery = Album::WHERE('publish', '<=', $today)->WHERE('visibility', '=', 'Public')->paginate(12); // albums
        // RETURN
            return view('frontend.gallery',compact('gallery'));// return data
    }

    public function gallery_single($slug)
    {
        //  SINGLE GALLERY
            $today = now();// today's time and date
            $slug = str_slug($slug); // slug again for security purpose
            $gallery = Album::WHERE('publish', '<=', $today)->WHERE('visibility', '=', 'Public')->WHERE('slug', '=', $slug)->firstorfail(); // albums
            $images = AlbumGallery::WHERE('album_id', '=', $gallery->id)->orderBy('id', 'Asc')->get(); // Album Images

        // RETURN
            return view('frontend.album',compact('gallery','images'));// return data
    }

    public function team()
    {
        //  TEAM
            $today = now();// today's time and date
            $teams = Team::WHERE('publish', '<=', $today)->WHERE('visibility', '=', 'Public')->orderBy('id', 'ASC')->paginate(15); // ALl Members
        
        // RETURN
            return view('frontend.team',compact('teams'));// return data
    }

    public function product()
    {
        //  PRODUCTS
            $today = now();// today's time and date
            $products = Product::WHERE('publish', '<=', $today)->WHERE('visibility', '=', 'Public')->orderBy('id', 'ASC')->paginate(15); // ALL PRODUCTS
        
        // RETURN
            return view('frontend.products',compact('products'));// return data
    }

    public function blog()
    {
        //  NEWS
            $today = now();// today's time and date
            $news = Blog::WHERE('publish', '<=', $today)->WHERE('visibility', '=', 'Public')->orderBy('publish', 'ASC')->paginate(15); // ALL NEWS
        // RETURN
            return view('frontend.news',compact('news'));// return data
    }

     public function about()
    {
        // ABOUT-US
        return view('frontend.about-us');
    }

   
}
