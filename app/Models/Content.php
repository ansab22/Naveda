<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $fillable = ['key', 'data'];
    protected $casts = ['data' => 'array'];

    public static function getData(string $key): array
    {
        $row = static::where('key', $key)->first();
        return $row ? $row->data : [];
    }

    public static function setData(string $key, array $data)
    {
        return static::updateOrCreate(
            ['key' => $key],
            ['data' => $data]
        );
    }
}
