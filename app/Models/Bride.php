<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bride extends Model
{
    protected $guarded = [];

    public function invitation()
    {
        return $this->belongsTo(Invitation::class);
    }
}
