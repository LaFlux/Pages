<?php
namespace ExtensionsValley\Pages;

use ExtensionsValley\Pages\Models\Pages;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use ExtensionsValley\Basetheme\Helpers\ThemeHelper;

class FrontPageController extends Controller
{

    protected $themeHelper;

    public function __construct(ThemeHelper $themehelper)
    {
        $this->themeHelper = $themehelper;
    }

    public function getPage($slug)
    {

        $themeHelper = $this->themeHelper;
        $page = Pages::Where('slug',$slug)->Where('status',1)->WhereNull('deleted_at')->first();

        if(sizeof($page) == 0){
            abort(404);
        }
        $title = $page->title;


        return \View::make('Pages::front.page', compact('title','page','themeHelper'));
    }



}
