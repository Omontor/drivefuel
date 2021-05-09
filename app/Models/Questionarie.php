<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Questionarie extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public $table = 'questionaries';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'project_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function questionarieTrivia()
    {
        return $this->hasMany(Trivia::class, 'questionarie_id', 'id');
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
