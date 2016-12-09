<?php
namespace ExtensionsValley\Pages;

use ExtensionsValley\Pages\Validators\PagesValidation;
use ExtensionsValley\Pages\Models\Pages;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PagesController extends Controller
{



    public function __construct()
    {


    }

    public function addPages()
    {

        $title = 'Add New Page';

        return \View::make('Pages::admin.pagesform', compact('title'));
    }

    /**
     * Create a new pages instance after a valid registration.
     *
     * @param  array $data
     * @return pages
     */
    protected function savePages(Request $request)
    {

        $validation = \Validator::make($request->all(), with(new PagesValidation)->getRules());

        if ($validation->fails()) {
            return redirect()->route('extensionsvalley.admin.addpages',['accesstoken'=>\Input::get('accesstoken')])->withErrors($validation)->withInput();
        }

        $title = $request->input('title');
        $status = $request->input('status');
        $content = $request->input('content');
        $layout = $request->input('layout');
        $slug = preg_replace('/[^A-Za-z0-9-]+/', '-',$request->input('slug'));
        $created_by = \Auth::guard('admin')->user()->id;
        $updated_by = \Auth::guard('admin')->user()->id;

        Pages::create([
            'title' => $title,
            'layout' => $layout,
            'content' => $content,
            'slug' => $slug,
            'created_by' => $created_by,
            'updated_by' => $updated_by,
            'status' => $status,
        ]);
        return redirect('admin/ExtensionsValley/pages/list/pages')->with(['message' => 'Details added successfully!']);
    }

    public function editPages($id)
    {

        $title = 'Edit Pages';
        $pages = Pages::findOrFail($id);
        return \View::make('Pages::admin.pagesform', compact('title', 'pages'));
    }

    public function viewPages($id)
    {

        $title = 'View Pages Content';
        $pages = Pages::findOrFail($id);
        $viewmode = 'view';
        return \View::make('Pages::admin.pagesform', compact('title', 'pages', 'viewmode'));
    }

    public function updatePages(Request $request)
    {

        $pages_id = $request->input('pages_id');
        $title = $request->input('title');
        $status = $request->input('status');
        $content = $request->input('content');
        $layout = $request->input('layout');
        $old_slug = $request->input('old_slug');
        $slug = preg_replace('/[^A-Za-z0-9-]+/', '-',$request->input('slug'));
        $updated_by = \Auth::guard('admin')->user()->id;
        $pages = Pages::findOrFail($pages_id);
        $validation = \Validator::make($request->all()
            , with(new PagesValidation)->getUpdateRules($pages));
        if ($validation->fails()) {
            return redirect()->route('extensionsvalley.admin.editpages', ['id' => $pages->id,'accesstoken'=>\Input::get('accesstoken')])->withErrors($validation)->withInput();
        }

        Pages::Where('id', $pages->id)->update([
            'title' => $title,
            'layout' => $layout,
            'content' => $content,
            'slug' => $slug,
            'updated_by' => $updated_by,
            'status' => $status,
            ]);

        if($old_slug != $slug){
            $this->updateMenuSlug($old_slug,$slug);
        }

        return redirect('admin/ExtensionsValley/pages/list/pages')->with(['message' => 'Details updated successfully!']);

    }

    public function updateMenuSlug($old_slug,$slug){

        if (\Schema::hasTable('menu_items')) {
            \DB::table('menu_items')->Where('source',$old_slug)->update(['source' => $slug]);
        }

    }

}
