<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['title_am', 'title_ru', 'title_en', 'parent_id', 'image'];

    public function fields()
    {
        return $this->belongsToMany('App\Field', 'category_field');
    }

    public function sections() 
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    public function parent( )
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

//    public function products()
//    {
//        return $this->hasManyThrough('App\Product', 'App\Category', 'id', 'parent_id');
//    }

    public function products()
    {
        return $this->hasMany('App\Product');
    }

//----------------------------------------------------------------------------------------------------------------------
    public static function add($request)
    {
        $category = new static;
        $category->fill($request->except(['image']));

        if ($request->hasFile('image'))
            $category->image = $category->uploadImage($request->file('image'));

        $category->save();

        return $category;
    }


    public function uploadImage($image)
    {
        if ($image == null)
            return;

        $this->removeImage();

        $filename = time().'-' . str_random(10) . '.' . $image->extension();
        $image->move(public_path('img/categories/'), $filename);
        return $filename;
    }


    public function removeImage()
    {
//        if ($this->image != null)
//            Storage::delete('uploads/' . $this->img);
// Or
//        $image_path = public_path('img/categories') . $this->img;
//        if(File::exists($image_path))
//            File::delete($image_path);
//
// Or
        $image_path = public_path('img/categories/') . $this->image;
//        dd($image_path);
        if (file_exists($image_path))
            @unlink($image_path);
    }
}
