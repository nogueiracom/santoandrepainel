<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class ComunicadoArticle extends Model
{
    use CrudTrait;
    use Sluggable, SluggableScopeHelpers;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'comunicado';
    protected $primaryKey = 'id';
    public $timestamps = true;
    // protected $guarded = ['id'];
    protected $fillable = ['slug', 'title', 'content', 'image', 'status', 'category_id', 'featured', 'date', 'photos'];
    // protected $hidden = [];
    // protected $dates = [];
    protected $casts = [
        'featured'  => 'boolean',
        'date'      => 'date'
    ];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'slug_or_title',
            ],
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    public function category()
    {
        return $this->belongsTo('App\Models\ComunicadoCategory', 'category_id');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Models\ComunicadoTag', 'article_tag');
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    public function scopePublished($query)
    {
        return $query->where('status', 'PUBLISHED')
                    ->where('date', '<=', date('Y-m-d'))
                    ->orderBy('date', 'DESC');
    }

    /*
    |--------------------------------------------------------------------------
    | ACCESORS
    |--------------------------------------------------------------------------
    */

    // The slug is created automatically from the "title" field if no slug exists.
    public function getSlugOrTitleAttribute()
    {
        if ($this->slug != '') {
            return $this->slug;
        }

        return $this->title;
    }

    public function updateImageOrder($order) {
  		$new_images_attribute = [];

  		foreach ($order as $key => $image) {
  		    $new_images_attribute[$image['id']] = $image['path'];
  		}
  		$new_images_attribute = json_encode($new_images_attribute);

  		$this->attributes['images'] = $new_images_attribute;
  		$this->save();
  	}

      public function removeImage($image_id, $image_path, $disk)
      {
        // delete the image from the db
        $images = json_encode(array_except($this->images, [$image_id]));
        $this->attributes['images'] = $images;
        $this->save();

        // delete the image from the folder
        if (Storage::disk($disk)->has($image_path)) {
            Storage::disk($disk)->delete($image_path);
        }
      }


      // public function setImagesAttribute($value)
      // {
      //     $attribute_name = "images";
      //     $disk = "public";
      //     $destination_path = "empreendimento";
      //     $this->uploadMultipleFilesToDisk($value, $attribute_name, $disk, $destination_path);
      // }


    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
