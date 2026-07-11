<?php

namespace App\Console\Commands;
use Illuminate\Support\Facades\File;

use Illuminate\Console\Command;

class DeployBuild extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'deploy-build';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        // exec('npm run build');

        $source = public_path('build');
        $destination = base_path('public_html/build');

        // ✅ Ensure destination exists
        if (!File::exists($destination)) {
            File::makeDirectory($destination, 0755, true);
        }

        // ✅ Clean old build (important)
        if (File::exists($destination)) {
            File::deleteDirectory($destination);
        }

        // ✅ Copy fresh build
        File::copyDirectory($source, $destination);

        $this->info('Build deployed successfully!');
    }
}
