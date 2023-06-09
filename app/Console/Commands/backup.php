<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class backup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:backup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'used for backup of sql files';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
         $filename="data".strtotime(now()).".sql";
         $data="mysqldump -u root project>".storage_path()."/app/public/dbback/".$filename;
         exec($data);
   }
}
