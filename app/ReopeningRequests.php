<?php

namespace BuscaAtivaEscolar;

use BuscaAtivaEscolar\Traits\Data\IndexedByUUID;
use Illuminate\Database\Eloquent\Model;

class ReopeningRequests extends Model
{
    use IndexedByUUID;

    const STATUS_APPROVED = "approved";
    const STATUS_REQUESTED = "requested";

    protected $table = "reopening_requests";

    protected $fillable = [
        'requester_id',
        'recipient_id',
        'child_id',
        'status',
        'interrupt_reason'

    ];

    /**
     * The User request of this Reopening Request
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function requester()
    {
        return $this->hasOne('BuscaAtivaEscolar\User', 'id', 'requester_id');
    }

    /**
     * The User recipient that accpeted the request
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function recipient()
    {
        return $this->hasOne('BuscaAtivaEscolar\User', 'id', 'recipient_id');
    }


    /**
     * The Child of the case to be reopened
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function child()
    {
        return $this->hasOne('BuscaAtivaEscolar\Child', 'id', 'child_id');
    }


}