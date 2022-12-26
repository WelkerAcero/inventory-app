<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## STEPS BY VIDEO TO DEPLOY A LARAVEL APP ON PRODUCTION - 000WebHosting Server:

- https://www.youtube.com/watch?v=WXdu5HapyyE

## STEPS TO DEPLOY A LARAVEL APP ON PRODUCTION - 000WebHosting Server:

- Open file manager 000webhost
- Go to laravel project and copy "unzipper.php" which is in unzipper-master folder
- Paste unzipper.php on public_html folder on the 000WebHosting Server manager
- Zip the App or the local project and upload it on public_html also
- Go to your domain: our case is = claudia-shopping-store.000webhostapp.com/unzipper.php
- Now all project folders and files to '/' folder root
- Delete the default public_html
- Rename the 'public' project folder to 'public_html'
- Open App/providers then edit AppServiceProvider.php file and edit it to:
    public function register()
    {      
        $this->app->bind('path.public', function () {
            return base_path('public_html');
        });    
    } 
- 

## Contributing
- Anggie Liseth Castellanos Camacho
- Welker José Pérez Acero

