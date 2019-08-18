<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class updateFeatured extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'featured:recalculate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Recalculates the featured projects time.';

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
     * @return mixed
     */
    public function handle()
    {
        //
        $this->info('BOLLETJE IS BEST WEL COOL JA WANT HALLO');
    }
}
