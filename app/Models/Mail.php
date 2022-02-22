<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mail extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'subject',
        'recipient',
        'message',
        'user_id',
    ];
    
    /**
     * Create the relationship between an email and a user.
     *
     * @return void
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
