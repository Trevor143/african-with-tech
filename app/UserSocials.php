<?php

namespace App;

use App\Models\BackpackUser;
use Illuminate\Database\Eloquent\Model;

class UserSocials extends Model
{
    public $guarded =[];

    public function user(){
        return $this->belongsTo(BackpackUser::class);
    }
}
