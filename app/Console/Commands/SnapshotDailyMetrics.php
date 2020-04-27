<?php
/**
 * busca-ativa-escolar-api
 * SnapshotDailyMetrics.php
 *
 * Copyright (c) LQDI Digital
 * www.lqdi.net - 2017
 *
 * @author Aryel Tupinambá <aryel.tupinamba@lqdi.net>
 *
 * Created at: 10/02/2017, 18:56
 */

namespace BuscaAtivaEscolar\Console\Commands;


use BuscaAtivaEscolar\Child;
use BuscaAtivaEscolar\Reports\Reports;
use DateInterval;
use DatePeriod;
use DateTime;

class SnapshotDailyMetrics extends Command {

    protected $signature = 'snapshot:daily_metrics {date?}';
    protected $description = 'Builds the daily metrics snapshot in ElasticSearch';
    private $rel;

    public function handle(Reports $reports) {
        $this->rel = $reports;

        $begin = new DateTime('2019-01-01');
        $end = new DateTime('2019-12-31');

        $interval = DateInterval::createFromDateString('1 day');
        $period = new DatePeriod($begin, $interval, $end);

        foreach ($period as $dt) {

            Child::with(['currentCase', 'currentStep', 'submitter', 'city'])->chunk(500, function ($children) {
                $today = $this->argument('date') ?? date('Y-m-d');

                $this->info("[index] Building children index: {$today}...");

                foreach ($children as $child) {
                    $this->comment("[index:{$today}] Child #{$child->id} - {$child->name}");
                    $this->rel->buildSnapshot($child, $today);
                }
            });

        }

        $this->info("[index] Index built!");

    }

}