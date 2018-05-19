<?php

namespace App\Console\Commands;

use App\Aaulyp\Services\AdminHelper;
use Illuminate\Console\Command;

class PurgeTokens extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'token:purge';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete tokens that are expired or inactive';

    /**
     * @var AdminHelper
     */
    protected $adminHelper;

    /**
     * Create a new command instance.
     *
     * @param AdminHelper $adminHelper
     */
    public function __construct(AdminHelper $adminHelper)
    {
        parent::__construct();

        $this->adminHelper = $adminHelper;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->adminHelper->deleteExpiredTokens();
    }
}
