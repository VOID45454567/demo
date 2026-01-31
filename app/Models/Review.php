<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'user_id',
        'application_id',
        'text',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function application()
    {
        return $this->belongsTo(Application::class);
    }

    public static function makeReview($text, $application_id)
    {
        return self::create([
            'text' => $text,
            'application_id' => $application_id,
            'user_id' => auth()->user()->id,
        ]);
    }
}
