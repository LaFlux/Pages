<?php
namespace ExtensionsValley\Pages\Tables;

class PagesTable
{

    /**
     * The database table used by the model.
     *
     * @var string
     */

    public $page_title = "Manage Pages";

    public $table_name = "pages";

    public $acl_key = "extensionsvalley.pages.pages";

    public $namespace = 'ExtensionsValley\Pages\Tables\PagesTable';

    public $overrideview = "";

    public $model_name = 'ExtensionsValley\Pages\Models\Pages';

    public $listable = ['title' => 'Title', 'layout' => 'Layout','status' => 'Status', 'created_at' => 'Date'];
    public $show_toolbar = ['view' => 'Show'
        , 'add' => 'Add'
        , 'edit' => 'Edit'
        , 'publish' => 'Publish'
        , 'unpublish' => 'Unpublish'
        , 'trash' => 'Trash'
        , 'restore' => 'Restore'
        , 'forcedelete' => 'Force Delete'
    ];

    public $routes = ['add_route' => 'extensionsvalley/pages/addpages'
        , 'edit_route' => 'extensionsvalley/pages/editpages'
        , 'view_route' => 'extensionsvalley/pages/viewpages'
    ];

    public $advanced_filter = ['layout' => ""
            ,'filters' => [
            'filter_trashed' => 'filter_trashed'
        ]
    ];


    public function getQuery()
    {
        $filter_trashed = \Input::get('filter_trashed');
        $pages = \DB::table('pages')
                    ->select('id', 'title', 'layout','status', 'created_at');

        if($filter_trashed == 1){
            $pages = $pages->where('deleted_at','<>', NULL);
        }else{
            $pages = $pages->where('deleted_at', NULL);
        }

        return \Datatables::of($pages)
            ->editColumn('sl', '<input type="checkbox" name="cid[]" value="{{$id}}" class="cid_checkbox"/>')
            ->editColumn('status', '@if($status==1) <span class="glyphicon glyphicon-ok"> Published</span> @else <span class="glyphicon glyphicon-remove"> Unpublished</span> @endif')
            ->editColumn('created_at', '{{date("M-j-Y",strtotime($created_at))}}')
            ->make(true);
    }

}
