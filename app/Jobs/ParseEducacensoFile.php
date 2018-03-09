<?php
/**
 * busca-ativa-escolar-api
 * EducacensoController.php
 *
 * Copyright (c) LQDI Digital
 * www.lqdi.net - 2018
 *
 * @author Aryel Tupinamba <aryel.tupinamba@lqdi.net>
 *
 * Created at: 05/03/2018, 14:54
 */

namespace BuscaAtivaEscolar\Jobs;

use BuscaAtivaEscolar\Attachment;
use BuscaAtivaEscolar\Child;
use BuscaAtivaEscolar\Comment;
use BuscaAtivaEscolar\Data\AlertCause;
use BuscaAtivaEscolar\INEP\EducacensoImporter;
use BuscaAtivaEscolar\Tenant;
use BuscaAtivaEscolar\User;
use Excel;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Log;

class ParseEducacensoFile implements ShouldQueue {

    use InteractsWithQueue, Queueable, SerializesModels;

    public $tenant;
    public $file;

    public function __construct(Tenant $tenant, Attachment $attachment) {
        $this->tenant = $tenant;
        $this->file = $attachment;
    }

    public function handle() {
	    $importer = new EducacensoImporter($this->tenant, $this->file->getFile());
	    $importer->process();
    }
}
