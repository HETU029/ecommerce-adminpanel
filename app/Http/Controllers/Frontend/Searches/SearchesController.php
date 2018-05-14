<?php

namespace App\Http\Controllers\frontend\Searches;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Blogs\Blog;
use App\Models\BlogCategories\BlogCategory;
use App\Repositories\Frontend\Searches\SearchRepository;
use App\Models\BlogTags\BlogTag;


/**
 * Class SearchesController.
 */
class SearchesController extends Controller
{

    protected $blogs;

    /**
     * @param \App\Repositories\Frontend\Searches\SearchesRepository $blog
     */
    public function __construct(SearchRepository $blogs)
    {
        $this->blogs = $blogs;
    }

    /**
     * @param Request $request keyword from view
     *
     * @return mixed
     */
    public function findByKeyword( Request $request ) 
    {

		     $blogs = $this->blogs->findByKeyword($request);
         if ($blogs) 
         {
		         return view('frontend.searches.index')->withBlogs($blogs);
         }

       abort(404);
    }

    /**
     * @param Request tag $id from view
     *
     * @return mixed
     */
    public function findByTag($id)
    {
    
         $blogs = $this->blogs->findByTag($id);
         if ($blogs) 
         {
             return view('frontend.searches.index')->withBlogs($blogs);
         }

       abort(404);
    }

    /**
     * @param Request category $id from view
     *
     * @return mixed
     */
    public function findByCategory($id)
    {

         $blogs = $this->blogs->findByCategory($id);
         if ($blogs) 
         {
             return view('frontend.searches.index')->withBlogs($blogs);
         }

       abort(404);
    }

    /**
     * @param Request $month and $year
     *
     * @return mixed
     */
    public function findByArchive($month,$year)
    {
      
         $blogs = $this->blogs->findByArchive($month,$year);
         if ($blogs) 
         { 
             return view('frontend.searches.index')->withBlogs($blogs);
         }
  
       abort(404);   
    }

}
