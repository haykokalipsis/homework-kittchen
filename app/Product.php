<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Product extends Model
{
//    protected $with = ['pattributes'];
    protected $fillable = ['title', 'description', 'status', 'published', 'address_address', 'address_latitude','address_longitude', 'price', 'currency', 'tel', 'category_id', 'user_id'];
    protected $guarded = ['id'];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function fields()
    {
        return $this->belongsToMany('App\Field', 'product_field')
            ->withPivot(['title', 'value']);
    }

    public function images()
    {
        return $this->hasMany('App\Image');
    }

    public function lastImage()
    {
//        return $this->hasOne('App\Image')->latest(); работает + $product->lastImage->resized_path ?? '' мне этот нравится
//        return $this->hasMany('App\Image'); работает + $product->lastImage->first()->resized_path ?? ''
        return $this->hasOne('App\Image')->latest()->withDefault();
    }

    public function mainImage()
    {
        return $this->hasOne('App\Image')
            ->orderBy('border', 'asc')
            ->orderBy('created_at', 'asc')
            ->withDefault();
    }
//    ------------------------------------------------------------------------------------------------------------------
    public static function add($request)
    {
        $product = new static;
        $product->fill($request->only($product->fillable));
        $product->published = 1;

        $result = static::checkWords($request->input('description'));

        if( ! $result)
            $product->status = 'inactive';
        else
            $product->status = 'active';

        if ( ! auth()->user()->products()->save($product))
            return false;

        if ( ! $product->updateAdditionalFieldsAnna($request))
            return false;

        return $product;
    }

    public function updateProduct($request)
    {
        $this->fill($request->only($this->fillable));
        $this->published = 1;

        $result = static::checkWords($request->input('description'));

        if( ! $result)
            $this->status = 'inactive';
        else
            $this->status = 'active';

        if ( ! auth()->user()->products()->save($this))
            return false;

        if ( ! $this->updateAdditionalFieldsAnna($request))
            return false;

        return $this;
    }

    public function updateAdditionalFieldsAnna($request)
    {
        $category = Category::findOrfail($request->input('category_id'));
        $field_list = $category->fields;
//        $product = Product::findOrFail($request->input('product_id'));

        foreach ($field_list as $field) {
            $syncData[$field->id] = [
                'title' => $field->title,
                'value' => $request->input($field->name)
            ];

            $this->fields()->sync($syncData);
        }

        return true;
    }

    public static function checkWords($text)
    {
        $words = ['shtap', 'pup'];
        foreach ($words as $word) {
            $template = '~.?' . $word . '.?~';
            preg_match_all($template, $text, $matches);
            if( ! empty($matches[0]))
                return false;
        }

        return true;
    }


    public static function removeProduct($product)
    {
        Product::removeProductImages($product);
        $product->delete();
    }

    public static function removeProductImages($product)
    {
        $images = $product->images;

        foreach ($images as $image) {
            if (File::isFile(public_path('img/products/') . $image->original_path)) {
                File::delete(public_path('img/products/') . $image->original_path);
            }

            if (File::isFile(public_path('img/products/') . $image->resized_path)) {
                File::delete(public_path('img/products/') . $image->resized_path);
            }
        }

        $product->images()->delete();
    }


}
