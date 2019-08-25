<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'email', 'password', 'country', 'city', 'surname', 'type', 'tel', 'category_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function products()
    {
        return $this->hasMany('App\Product');
    }

    public function favouriteProducts()
    {
        return $this->belongsToMany('App\Product', 'favourites', 'user_id','product_id');
    }
//    ------------------------------------------------------------------------------------------------------------------
    public function updateData($data)
    {
        $data = array_filter($data);
//        if (isset($data['password']) )
//            $data['password'] = bcrypt($data['password']);
        $this->fill($data);

        $this->save();
    }

    public function removeUser()
    {
        $this->removeImage();
        $this->delete();
    }

    public function removeImage()
    {
        $image_path = public_path('img/users/') . $this->image;

        if (file_exists($image_path))
            @unlink($image_path);
    }

    public function updateImage($image)
    {
        if ($image == null)
            return;

        $this->removeImage();

        $filename = time().'-' . str_random(10) . '.' . $image->extension();
        $image->move(public_path('img/users/'), $filename);
        $this->image = $filename;
        $this->save();
    }

    public function getImage()
    {
        if( ! $this->image)
            return '/img/users/default.jpg';

        return '/img/users/' . $this->image;
    }

    public function hasFavouriteProduct($product_id)
    {
        return ! is_null(
            $this->favouriteProducts()
                ->where('product_id', $product_id)
                ->first()
        );
    }
}
