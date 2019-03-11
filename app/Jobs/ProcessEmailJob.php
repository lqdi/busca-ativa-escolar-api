<?php

namespace BuscaAtivaEscolar\Jobs;

use BuscaAtivaEscolar\EmailJob;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Log;

class ProcessEmailJob implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    public $emailJob;

    /**
     * ProcessEmailJob constructor.
     * @param EmailJob $job
     */
    public function __construct(EmailJob $emailJob)
    {
        $this->emailJob = $emailJob;
    }

    /**
     * Handles a queued email job
     * @throws \Exception
     */
    public function handle() {

        try {

            Log::debug("EmailJob({$this->emailJob->id}) - begin processing");
            $this->emailJob->handle();
            Log::debug("EmailJob({$this->emailJob->id}) - completed processing");

        } catch (\Exception $ex) {

            Log::error("EmailJob({$this->emailJob->id}) - failed: " . $ex->getMessage());
            $this->emailJob->setStatus(EmailJob::STATUS_FAILED);
            $this->emailJob->saveError($ex);
            $this->emailJob->save();
            throw $ex;

        }

    }
}
