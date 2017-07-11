<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerDecisionService();
        $this->registerCategorieService();
        $this->registerAboService();
        $this->registerUserService();
        $this->registerUpdateWorkerService();
        $this->registerAlertWorkerService();
    }

    /**
     * Decision
     */
    protected function registerDecisionService(){

        $this->app->singleton('App\Droit\Decision\Repo\DecisionInterface', function()
        {
            return new \App\Droit\Decision\Repo\DecisionEloquent( new \App\Droit\Decision\Entities\Decision );
        });
    }

    /**
     * Abo
     */
    protected function registerAboService(){

        $this->app->singleton('App\Droit\Abo\Repo\AboInterface', function()
        {
            return new \App\Droit\Abo\Repo\AboEloquent(
                new \App\Droit\Abo\Entities\Abo(),
                new \App\Droit\Abo\Entities\Abo_publish()
            );
        });
    }

    /**
     * Abo
     */
    protected function registerUserService(){

        $this->app->singleton('App\Droit\User\Repo\UserInterface', function()
        {
            return new \App\Droit\User\Repo\UserEloquent( new \App\Droit\User\Entities\User );
        });
    }

    /**
     * Categorie
     */
    protected function registerCategorieService(){

        $this->app->singleton('App\Droit\Categorie\Repo\CategorieInterface', function()
        {
            return new \App\Droit\Categorie\Repo\CategorieEloquent(
                new \App\Droit\Categorie\Entities\Categorie(),
                new \App\Droit\Categorie\Entities\Parent_categorie()
            );
        });
    }

    /**
     * Update Worker
     */
    protected function registerUpdateWorkerService(){

        $this->app->singleton('App\Droit\Bger\Worker\UpdateInterface', function()
        {
            return new \App\Droit\Bger\Worker\Update(
                \App::make('App\Droit\Decision\Repo\DecisionInterface'),
                new \App\Droit\Bger\Utility\Fetch(),
                new \App\Droit\Bger\Utility\Dispatch(),
                new \App\Droit\Bger\Utility\Clean()
            );
        });
    }

    /**
     * Search Worker
     */
    protected function registerSearchWorkerService(){

        $this->app->singleton('App\Droit\Bger\Worker\SearchInterface', function()
        {
            return new \App\Droit\Bger\Worker\Search(
                \App::make('App\Droit\Decision\Repo\DecisionInterface'),
                new \App\Droit\Bger\Utility\Clean()
            );
        });
    }

    /**
     * Alert Worker
     */
    protected function registerAlertWorkerService(){

        $this->app->singleton('App\Droit\Bger\Worker\AlertInterface', function()
        {
            return new \App\Droit\Bger\Worker\Alert(
                \App::make('App\Droit\Decision\Repo\DecisionInterface'),
                new \App\Droit\Bger\Utility\Clean()
            );
        });
    }

}
