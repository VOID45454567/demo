<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
        "course_id",
        "user_id",
        "payment_method",
        "prefer_date",
        "status",
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    public static function setStatus($status, $id)
    {
        return self::whereId($id)->update(["status" => $status]);
    }
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    public function getStatus(string|null $status = null)
    {
        $statusToMap = null;
        is_null($status)
            ? $statusToMap = $this->status
            : $statusToMap = $status;
        return match ($statusToMap) {
            'created' => 'Новая',
            'pending' => 'Идет обучение',
            'completed' => 'Обучение завершенно',
            default => $statusToMap,
        };

    }
    public function getPaymentMethod()
    {
        return match ($this->payment_method) {
            'by_number' => 'По номеру',
            'cash' => 'Наличные',
        };
    }
}
