<?php

namespace App\Http\Controllers\Frontend\Blogs;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Blogs\Blog;
use App\Models\BlogTags\BlogTag;
use App\Models\BlogMapTags\BlogMapTag;
use App\Repositories\Frontend\Blogs\BlogsRepository;
use Carbon\Carbon;
use Session;

/**
 * Class BlogController.
 */
class BlogController extends Controller
{

    /**
     * @param \App\Repositories\Frontend\Blogs\BlogsRepository $blog
     */
    public function __construct(BlogsRepository $blog)
    {
        $this->blog = $blog;
    }

    /**
     * @param Request $slug
     *
     * @return mixed
     */
    public function getSingleBlog($slug)
    {
        $blog =  $this->blog->find($slug);

        if($blog)
        {

           return view('frontend.blog.single')->withBlog($blog);

        }
          abort(404);
    }

    /**
     * @param \App\Repositories\Frontend\Blogs\BlogsRepository $blog
     *
     * @return mixed
     */
    public function getIndex()
    {
         $blogs = $this->blog->all();

         return view('frontend.blog.index')->withBlogs($blogs);
     }

}
