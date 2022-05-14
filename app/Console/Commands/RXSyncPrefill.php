<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\SyncPrefillRXController;

class RXSyncPrefill extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rx:sync-prefill';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync Prefill RXES';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info((new SyncPrefillRXController)->index());
        return Command::SUCCESS;
    }
}
