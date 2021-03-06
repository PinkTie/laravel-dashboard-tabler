<?php
namespace pinktie\Presets\Tabler;

use Illuminate\Container\Container;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Foundation\Console\Presets\Preset;
use Illuminate\Support\Arr;

class TablerPreset extends Preset
{
    /**
     * Install the preset.
     */
     
    public static function install()
    {
        static::updatePackages();
        static::updateAssets();
        static::updateBootstrapping();
    }
    
    /**
     * Install the preset and auth views.
     */
     
    public static function installAuth()
    {
        static::install();
        static::scaffoldAuth();
    }
    
    /**
     * Update the given package array.
     *
     * @param array $packages
     *
     * @return array
     */
    protected static function updatePackageArray(array $packages)
    {
        return [
            'bootstrap' => '^4.1.0',
            'popper.js' => '^1.14.3',
            'jquery' => '^3.2',
        ] + Arr::except($packages, ['bootstrap-sass']);
    }
    
    /**
     * Update the Sass files for the application.
     */
    protected static function updateAssets()
    {
        copy(__DIR__.'/tabler-stub/sass/app.scss', resource_path('assets/sass/app.scss'));
        copy(__DIR__.'/tabler-stub/sass/_variables.scss', resource_path('assets/sass/_variables.scss'));
        (new Filesystem())->copyDirectory(__DIR__.'/tabler-stub/sass/tabler', resource_path('assets/sass/tabler'));
        (new Filesystem())->copyDirectory(__DIR__.'/tabler-stub/fonts', resource_path('assets/fonts'));
    }
    
    /**
     * Update the bootstrapping files.
     */
    protected static function updateBootstrapping()
    {
        copy(__DIR__.'/tabler-stub/webpack.mix.js', base_path('webpack.mix.js'));
        copy(__DIR__.'/tabler-stub/bootstrap.js', resource_path('assets/js/bootstrap.js'));
    }
    
    /**
     * Export the authentication views.
     */
    protected static function scaffoldAuth()
    {
        file_put_contents(app_path('Http/Controllers/HomeController.php'), static::compileControllerStub());
        file_put_contents(
            base_path('routes/web.php'),
            "\nAuth::routes();\n\nRoute::get('/home', 'HomeController@index')->name('home');\n\n",
            FILE_APPEND
        );
        (new Filesystem())->copyDirectory(__DIR__.'/tabler-stub/views', resource_path('views'));
    }
    
    /**
     * Compiles the HomeController stub.
     *
     * @return string
     */
    protected static function compileControllerStub()
    {
        return str_replace(
            '{{namespace}}',
            Container::getInstance()->getNamespace(),
            file_get_contents(__DIR__.'/tabler-stub/controllers/HomeController.stub')
        );
    }
}
