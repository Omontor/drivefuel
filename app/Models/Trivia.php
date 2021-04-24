<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Trivia extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'trivia';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'questionarie_id',
        'content',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function questionarie()
    {
        return $this->belongsTo(Questionarie::class, 'questionarie_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
