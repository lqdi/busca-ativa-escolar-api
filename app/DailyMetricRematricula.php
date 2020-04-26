<?php


namespace BuscaAtivaEscolar;

use Illuminate\Database\Eloquent\Model;

class DailyMetricRematricula extends Model
{
    protected $table = "daily_metrics";

    public $timestamps = false;

    protected $fillable = [
        'tenant_id',
        'date',
        'region',
        'state',
        'city',
        'count',
        'data',
    ];

    protected $casts = [
        'data' => 'array',
    ];
}