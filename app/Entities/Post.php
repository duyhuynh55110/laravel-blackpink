<?php

namespace App\Entities;

use DateTimeInterface;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Post.
 *
 * @package namespace App\Entities;
 */
class Post extends Model implements Transformable
{
    use SoftDeletes;
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];
    protected $guarded = [];
    public $timestamps = true;

    /**
     * Format return JSON date
     *
     * @param DateTimeInterface $date
     * @return string
     */
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    /**
     * Get post comments
     */
    public function comments() {
        return $this->hasMany(ENTITIES_PATH.'Comment', 'commentable_id', 'id')->where("reply_id", null)->orderBy("id", "desc");
    }
}
