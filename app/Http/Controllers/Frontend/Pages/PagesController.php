<?php

namespace App\Http\Controllers\Frontend\Pages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Blogs\Blog;
use App\Models\BlogCategories\BlogCategory;
use App\Repositories\Frontend\Pages\PagesRepository;
use App\Models\BlogTags\BlogTag;
use Mail;


/**
 * Class PagesController.
 */
class PagesController extends Controller
{
    
    /**
     * @param \App\Repositories\Frontend\Pages\PagesRepository $blog
     */
    public function __construct(PagesRepository $page)
    {
        $this->page = $page;
    }


    /**
     * @return \Illuminate\View\View
     */
    public function getAboutPage()
    { 
    	return view('frontend.pages.about');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function getContactPage()
    {
    	return view('frontend.pages.contact');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function getPages()
    {
         $pages = $this->page->all();

         return view('frontend.partials._nav')->withPages($pages);
    }

    /**
     * @param Request $slug
     *
     * @return mixed
     */
    public function getSinglePage($page_slug)
    {
        $page =  $this->page->find($page_slug);

        return view('frontend.partials._nav')->withPage($page);
    }


}
