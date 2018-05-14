<?php

namespace App\Repositories\Frontend\Searches;

use App\Exceptions\GeneralException;
use App\Models\BlogCategories\BlogCategory;
use App\Models\BlogMapCategories\BlogMapCategory;
use App\Models\BlogMapTags\BlogMapTag;
use App\Models\Blogs\Blog;
use App\Models\BlogTags\BlogTag;
use App\Repositories\BaseRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class SearchRepository extends BaseRepository 
{

	/**
     * show result of searched blogs in search page by tag.
     */
    public function findByCategory($id)
    {
        $category = BlogCategory::find($id);

         if(!$category) {
             return false;
         }
 
         $blogs = $category->blogs;

         return $blogs;
    }

    /**
     * show result of searched blogs in search page by any keyword.
     */
    public function findByKeyword($request)
    {
         $s = $request->query('s');
        
         // Query result
         $blogs = Blog::where('name', 'like', "%$s%")
                        ->orWhere('content', 'like', "%$s%")
                        ->get();

        return $blogs;
    }

    /**
     * show result of searched blogs in search page by tag.
     */
    public function findByTag($id)
    {
         $tag = BlogTag::find($id);

         if(!$tag) {
             return false;
         }
 
         $blogs = $tag->blogs;

         return $blogs;
    }


    /**
     * show result of searched blogs in search page by month and year.
     */
    public function findByArchive($month,$year)
    {
         $blogs = Blog:: whereYear('created_at','=',$year)
         ->whereMonth('created_at','=',$month) 
         ->latest()->get();

         return $blogs;
    }

 }


 