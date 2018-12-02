<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Auth;
use App\Categorie;
use App\TypeDePublication;
use App\Publication;
use App\Image;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        schema::defaultStringLength(191);

        $image = Image::all();
        $categorie = Categorie::all();
        $typeDePublication = TypeDePublication::all();
        $publication = Publication::all();
        view()->share('image',$image);
        view()->share('categorie',$categorie);
        view()->share('typeDePublication',$typeDePublication);
        view()->share('publication',$publication);

        if(Auth::check())
            {
                view()->share('user',Auth::user());
            }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
