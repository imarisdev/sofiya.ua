<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App;
use DB;
use Request;
use Config;
use Response;
use App\Models\Articles as Articles;
use App\Models\Pages as Pages;
use App\Models\Street as Street;
use App\Models\House as House;
use App\Models\Plans as Plans;

class Sitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate sitemap.xml';

    /**
     * Create a new command instance.
     *
     * @param  DripEmailer  $drip
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

        $sitemap = App::make("sitemap");

        $sitemap->setCache('sitemap', Config::get('app.cache.long'));

        $host = Request::root();

        if (!$sitemap->isCached()) {
            $sitemap->add($host . '/', date('c'), '1.0', 'daily');

            // Articles
            $articles = Articles::select('id', 'title', 'slug', 'type', 'created_at')
                ->orderBy('created_at', 'desc')
                ->get();
            foreach ($articles as $article) {
                $sitemap->add($host . $article->link(), $article->created_at, '0.4', 'monthly');
            }

            // Pages
            $pages = Pages::select('id', 'title', 'slug', 'created_at')
                ->orderBy('created_at', 'desc')
                ->get();
            foreach ($pages as $page) {
                $sitemap->add($host . '/' . $page->slug, $page->created_at, '0.4', 'monthly');
            }

            // Streets
            $streets = Street::select('id', 'title', 'slug')
                ->get();
            foreach ($streets as $street) {
                $sitemap->add($host . '/ulitsy/' . $street->id . '-' . $street->slug, null, '0.4', 'monthly');
            }

            // Houses
            $houses = House::select('id', 'title', 'slug')
                ->where('status', '=', 1)
                ->get();
            foreach ($houses as $house) {
                $sitemap->add($host . '/sofievskaya-borshagovka/' . $house->id . '-' . $house->slug , null, '0.4', 'monthly');
            }

            // Plans
            $plans = Plans::select('id', 'title', 'slug', 'plans_type')
                ->where('status', '=', 1)
                ->get();
            foreach ($plans as $plan) {
                $sitemap->add($host . $plan->pathLink() , null, '0.4', 'monthly');
            }
        }

        // Generate sitemap file
        $sitemap->store('xml', 'sitemap');

        //return Response::make($sitemap->render('xml')->original, 200, array('content-type'=>'application/xml'));

        header("Content-Type: text/xml");
        echo $sitemap->render('xml')->original;

    }
}