<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use App\Models\Workspace;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:generate-sitemap';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate the sitemap for SpaceHub';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $sitemap = Sitemap::create();

        // Add static pages based on actual routes
        $sitemap->add(Url::create('/')
            ->setPriority(1.0)
            ->setChangeFrequency('weekly'));

        $sitemap->add(Url::create('/explore')
            ->setPriority(0.9)
            ->setChangeFrequency('daily'));

        $sitemap->add(Url::create('/detail')
            ->setPriority(0.8)
            ->setChangeFrequency('weekly'));

        // Add dynamic workspace detail pages
        Workspace::all()->each(function (Workspace $workspace) use ($sitemap) {
            $sitemap->add(Url::create("/detail/{$workspace->id}")
                ->setPriority(0.8)
                ->setLastModificationDate($workspace->updated_at)
                ->setChangeFrequency('weekly'));
        });

        $sitemap->writeToFile(public_path('sitemap.xml'));
        $this->info('Sitemap generated successfully');
    }
}
