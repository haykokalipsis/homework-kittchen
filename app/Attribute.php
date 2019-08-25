<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    public $table = 'attributes';
    public $timestamps = false;

    static public function store($field_list, $fields, $product)
    {
//        foreach (request()->input('additional_fields') as $fieldName) {
//            $productAttributes = new Attribute;
//            $productAttributes->product_id = $product->id;
//            $productAttributes->title = $fieldName;
//            $productAttributes->value = $request->input($fieldName);
//            $productAttributes->save();
//        }

        foreach ($field_list as $fieldName) {

            $attributes = new static;
//            $attributes->product_id = $product->id;
            $attributes->title = $fieldName;
            $attributes->value = $fields[$fieldName];

            $product->pattributes()->save($attributes);
        }
    }

    public static function storeAnna($request)
    {
        $category = Category::findOrfail($request->input('category_id'));
        $field_list = $category->fields;
        $product = Product::findOrFail($request->input('product_id'));

        foreach ($field_list as $fieldName) {
            $attributes = new static;
//            $attributes->product_id = $product->id;
            $attributes->title = $fieldName->title;
            $attributes->value = $request->input($fieldName->name);

            $product->pattributes()->save($attributes);
        }
    }
}
