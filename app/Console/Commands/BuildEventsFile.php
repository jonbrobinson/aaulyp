<?php

namespace App\Console\Commands;

use App\Aaulyp\Services\EventsBuilder;
use Illuminate\Console\Command;

class BuildEventsFile extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'events:buildFile';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Builds Event File of current events';

    /**
     * Event Builder Service
     */
    protected $eventBuilder;

    /**
     * Create a new command instance.
     *
     * @param EventsBuilder $eventsBuilder
     */
    public function __construct(EventsBuilder $eventsBuilder)
    {
        parent::__construct();

        $this->eventBuilder = $eventsBuilder;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $timestamp = strtotime('now -2 hours');
        $this->eventBuilder->deleteFilesByTimestamp($timestamp);
        $this->eventBuilder->buildEventsFile();
    }
}
