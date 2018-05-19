<?php

namespace App\Console\Commands;

use App\Aaulyp\Services\HealthChecker;
use Illuminate\Console\Command;

class HealthCheck extends Command
{
    private $guzzle;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'site:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Health Check Commnand to check page status';

    /**
     * Create a new command instance.
     *
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $hc = new HealthChecker();
        $hc->runGenSiteCheck();
    }
}
