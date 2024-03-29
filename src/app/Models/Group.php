<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Log;

class Group extends Model
{
    use HasFactory;
    protected $table = 'm_group';

    protected $fillable = [
        'group_name'
    ];

    // グローバルスコープ定義
    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope('active', function (Builder $builder) {
            $builder->where('m_group.is_active', 1);
        });
    }

    public function getList()
    {
        $data = Group::
            orderBy('id', 'asc')
            ->get();

        return $data;
    }
}
