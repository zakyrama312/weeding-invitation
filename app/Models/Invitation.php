<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    protected $guarded = [];

    public function brides()
    {
        return $this->hasOne(Bride::class);
    }

    public function envelopes()
    {
        return $this->hasMany(Envelope::class);
    }

    public function guests()
    {
        return $this->hasMany(Guest::class);
    }

    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }

    public function guestbooks()
    {
        return $this->hasMany(Guestbook::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
