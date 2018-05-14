<?php

namespace App\Repositories\Frontend\Blogs;

use App\Exceptions\GeneralException;
use App\Models\BlogCategories\BlogCategory;
use App\Models\BlogMapCategories\BlogMapCategory;
use App\Models\BlogMapTags\BlogMapTag;
use App\Models\Blogs\Blog;
use App\Models\BlogTags\BlogTag;
use App\Repositories\BaseRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

/**
 * Class BlogsRepository.
 */
class BlogsRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Blog::class;


    /**
     * return all blogs with pagination .
     */
    public function all()
    {
        $blogs = Blog::latest()->where('status','Published')
                               ->paginate(3);
        return $blogs;
    }


    /**
     * return single blog.
     */
    public function find($slug)
    {
        $blog= Blog::where('slug','=',$slug)->first();

        if($blog)
         {

             $blog->addPageViewThatExpiresAt(Carbon::now()->addHours(2));

             return $blog;
         }

        return false;
    }

}
