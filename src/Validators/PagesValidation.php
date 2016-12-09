<?php
namespace ExtensionsValley\Pages\Validators;

class PagesValidation
{

    public function getRules()
    {
        return [
            'title' => 'required|max:200',
            'slug' => 'required|max:200|unique:pages',
            'status' => 'required',
            'content' => 'required',
            'layout' => 'required',
        ];
    }

    public function getUpdateRules($pages)
    {
        return [
            'slug' => 'required|max:200|unique:pages,slug,' . $pages->id,
            'status' => 'required',
            'title' => 'required|max:200',
            'content' => 'required',
            'layout' => 'required',
        ];
    }

}
