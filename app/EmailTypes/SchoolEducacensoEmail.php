<?php
/**
 * Created by PhpStorm.
 * User: manoelfilho
 * Date: 2019-03-10
 * Time: 15:02
 */

namespace BuscaAtivaEscolar\EmailTypes;

use BuscaAtivaEscolar\EmailJob;
use BuscaAtivaEscolar\Mail\SchoolNotification;
use BuscaAtivaEscolar\School;
use Illuminate\Support\Facades\Mail;


class SchoolEducacensoEmail implements SendEmail
{

    const TYPE = "school_educacenso_email";

    /**
     * @var EmailJob The email job submitted
     */
    public $job;

    /**
     * @var User The user that is identified as the creator of emails
     */
    private $user;

    /**
     * @var School The school that is identified as the receiver of email
     */
    private $school;


    /**
     * Handles the sending of Educacenso's Emails
     * @param EmailJob $job
     * @throws \Exception
     */
    public function handle(EmailJob $job) {

        $this->job = $job;
        $this->user = auth()->user(); /* @var $user User */
        $this->school = School::whereSchoolEmail($this->job->school_email)->first();

        try {
            $message = new SchoolNotification($this->school);
            Mail::to($this->school->school_email)->cc($this->user->email)->send($message);
        } catch (\Exception $ex) {
            throw $ex;
        }

    }

}