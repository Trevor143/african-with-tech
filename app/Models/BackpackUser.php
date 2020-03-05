<?php

namespace App\Models;

use App\Image;
use App\User;
use App\UserSocials;
use Backpack\CRUD\app\Models\Traits\InheritsRelationsFromParentModel;
use Backpack\CRUD\app\Notifications\ResetPasswordNotification as ResetPasswordNotification;
use Illuminate\Notifications\Notifiable;

class BackpackUser extends User
{
    use InheritsRelationsFromParentModel;
    use Notifiable;

    protected $table = 'users';
    protected $guarded =[];

    /**
     * Send the password reset notification.
     *
     * @param string $token
     *
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    /**
     * Get the e-mail address where password reset links are sent.
     *
     * @return string
     */
    public function getEmailForPasswordReset()
    {
        return $this->email;
    }

    /**
     * Get the user's image.
     */
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function getUserPictureAttribute(){
        if (backpack_user()->image){
            $url = config('APP_URL');
            $image = backpack_user()->image->imageable_url;
            return $image;
        }
        else
            return 'uploads/6.png';
    }

    public function social()
    {
        return $this->hasMany(UserSocials::class);

    }
}
