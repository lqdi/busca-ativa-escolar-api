<?php

namespace BuscaAtivaEscolar;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Frequency extends Model
{
    use SoftDeletes;

    protected $fillable = ['id', 'qty_presence', 'qty_enrollment', 'classes_id'];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $hidden = ['updated_at', 'deleted_at'];

    protected $table = "frequency";

    /**
     * The class this frequency belongs to.
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function classe()
    {
        return $this->hasOne('BuscaAtivaEscolar\Classe', 'id', 'classes_id');
    }

}