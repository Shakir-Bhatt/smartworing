<?php

namespace App\Console\Commands;

use App\Services\PropertyService;
use Illuminate\Console\Command;

class SyncProperties extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'syncProperties';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to sync properties data from api';
    private $pages = 5;  # No. of pages to sync

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
    public function handle(){

        $pageNumber = 1;
        do {
            $propertyService = new PropertyService();
            $propertyService->syncProperties($pageNumber);
            $pageNumber += 1;

        } while($pageNumber <= $this->pages);
        
    }
}
