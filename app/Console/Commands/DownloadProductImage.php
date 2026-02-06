<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class DownloadProductImage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:download-product-image';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Downloads 20 random images into the products folder';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $folder = 'products';

        // Create directory if it doesn't exist (using the 'public' disk)
        if (!Storage::disk('public')->exists($folder)) {
            Storage::disk('public')->makeDirectory($folder);
            $this->info("Created directory: $folder");
        }

        $this->output->progressStart(20);

        for ($i = 1; $i <= 20; $i++) {
            $url = "https://picsum.photos/800/600?random=$i";

            // Fetch the image
            $response = Http::get($url);

            if ($response->successful()) {
                // Save to storage/app/public/products/img_X.jpg
                Storage::disk('public')->put("$folder/img_$i.jpg", $response->body());
            }

            $this->output->progressAdvance();
        }

        $this->output->progressFinish();
        $this->info('Download Complete!');
    }
}
