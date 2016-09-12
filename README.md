## Laravel Csv ##

### Description ###

This package will help you to export data to CSV with **Laravel 5.2**
 
### Installation ###
 
Add Csv Package to your **composer.json** file to require Bootstrap :
```
    require : {
        "laravel/framework": "5.2.*",
        "codeuz/csv": "dev-master"
    }
```
 
Update Composer :
```
    composer update
```
 
The next required step is to add the service provider to **config/app.php** :
```
    Codeuz\Csv\CsvServiceProvider::class
```
 
### Use ###

The last required step is to export data to CSV in your Controller :
```
    $csv->setHeaders(['firstname' => 'User Firstname'])->setData([['firstname' => 'John', 'lastname' => 'Martin'], ['firstname' => 'Tom', 'age' => '33']])->setFilename('users')->export();
```
 
Congratulations, you have successfully installed Csv Package !
