<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BloodRequest extends Model
{
    use HasFactory;

    protected $fillable = ['seeker_id', 'donor_id', 'status'];

    /**
     * help to find out seeker's info
     */
    public function seeker()
    {
        // user create relation with model
        return $this->belongsTo(User::class, 'seeker_id');
    }
}