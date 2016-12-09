<?php
namespace ExtensionsValley\Pages\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pages extends Model
{

    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pages';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'slug', 'content', 'status','layout','created_by','updated_by'];


    public static function getPages()
    {

        return self::Where('deleted_at', NULL)
            ->Where('status', 1)
            ->pluck('title', 'id');
    }

    public static function getPageswithSlug()
    {

        return self::Where('deleted_at', NULL)
            ->Where('status', 1)
            ->pluck('title', 'slug');
    }

    //Prevent relation breaking
    public static function getRlationstatus($cid)
    {

       return 0;

    }


}
