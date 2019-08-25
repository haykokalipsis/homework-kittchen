<?php

namespace App;

use File;
use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Facades\Image as InterventionImage;

class Image extends Model
{

    protected $guarded = [];
    protected $fillable = ['border', 'original_path', 'resized_path', 'product_id'];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
//    ------------------------------------------------------------------------------------------------------------------

    public static function uploadImages($images, $product_id)
    {
//        Stex sovorakan uploadImage funkciayi patcharov nenc em arel vor store metod@ rodukti tex@ produkt ida stanum. Uxxi mi dzev vor ham es ham sovorakan upload@ nuyn dzev ashxaten

        $date = (String)date('Y/m') . '/';

        foreach ($images as $image) {
            if($image->isValid()) {
//                dd($image);
                $filename = str_random(10);
                $extension = $image->getClientOriginalExtension();

                // Names to be stored in table
                $originalName  = $filename.'_original_'.time().'.'.$extension;
                $thumbnailName = $filename.'_thumbnail_'.time().'.'.$extension;

                $originalNameToStore  = $date . $originalName;
                $thumbnailNameToStore = $date . $thumbnailName;

                // Directories where the images will be stored
                $original_path  = photos_path() . $originalName;
                $thumbnail_path = photos_path() . $thumbnailName;

                //Resize and move Image
                InterventionImage::make($image)
                    ->save($original_path);
                InterventionImage::make($image)
                    ->resize(300,300, function ($constraint) {
                        $constraint->aspectRatio();
                    })
                    ->save($thumbnail_path);

                self::store($originalNameToStore, $thumbnailNameToStore, $product_id);
            }
        }

    }


    public static function uploadImage($image, $product_id)
    {

        $date = (String)date('Y/m') . '/';

        if($image->isValid()) {
            $filename = str_random(10);
            $extension = $image->getClientOriginalExtension();

            // Names to be stored in table
            $originalName  = $filename.'_original_'.time().'.'.$extension;
            $thumbnailName = $filename.'_thumbnail_'.time().'.'.$extension;

            $originalNameToStore  = $date . $originalName;
            $thumbnailNameToStore = $date . $thumbnailName;

            // Directories where the images will be stored
            $original_path  = photos_path() . $originalName;
            $thumbnail_path = photos_path() . $thumbnailName;

            //Resize and move Image
            InterventionImage::make($image)
                ->save($original_path);
            InterventionImage::make($image)
                ->resize(300,300, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save($thumbnail_path);

            return self::store($originalNameToStore, $thumbnailNameToStore, $product_id);
        }

    }

    public static function store($originalName, $thumbnailName, $product_id)
    {
//        $product = Product::findOrFail($product_id, ['id']);

        $image = new static;
        $image->resized_path  = $thumbnailName;
        $image->original_path = $originalName;
        $image->product_id = $product_id;
        $image->save();

        return $image->id;
    }

}
