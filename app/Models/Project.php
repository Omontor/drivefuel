<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public $table = 'projects';

    public static $searchable = [
        'name',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'brand_id',
        'name',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function projectRoutes()
    {
        return $this->hasMany(Route::class, 'project_id', 'id');
    }

    public function projectQuestionaries()
    {
        return $this->hasMany(Questionarie::class, 'project_id', 'id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
