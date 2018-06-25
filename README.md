<!--h-->
# HistoryTracker
[![Codacy Badge](https://api.codacy.com/project/badge/Grade/71c1e5e3e2c940fa8f3fb0ebda9db1fb)](https://www.codacy.com/app/laravel-enso/HistoryTracker?utm_source=github.com&utm_medium=referral&utm_content=laravel-enso/HistoryTracker&utm_campaign=badger)
[![StyleCI](https://styleci.io/repos/85500161/shield?branch=master)](https://styleci.io/repos/85500161)
[![License](https://poser.pugx.org/laravel-enso/historytracker/license)](https://packagist.org/packages/laravel-enso/historytracker)
[![Total Downloads](https://poser.pugx.org/laravel-enso/historytracker/downloads)](https://packagist.org/packages/laravel-enso/historytracker)
[![Latest Stable Version](https://poser.pugx.org/laravel-enso/historytracker/version)](https://packagist.org/packages/laravel-enso/historytracker)
<!--/h-->

Simple to use, customizable Laravel Model history tracking utility trait

[Laravel Enso](https://github.com/laravel-enso/Enso) already includes this package

### Details

The trait helps keep track of the changes made to a model by saving a snapshot for each relevant update of the model to a different 'history' table.

The records in the history table are linked via FK to the original model.

### Usage
You can choose the attributes you want to track from the model by declaring them as fillable in the history model.

When the model is created an initial snapshot of the desired attributes is saved. When the model is updated, if any one of the tracked attributes has changed, a new snapshot/history entry is persisted.  

1. Create a histories table, such as `model_histories` - where model is what you need to keep track of.

2. Create a corresponding history model, such as `ModelHistory` and add as fillable the attributes you want tracked:

    ```php 
        protected $fillable = ['tracked', 'attributes', 'list'];
    ```

    Don't forget to also have the FK column for the relationship to tracked model.

3. Use the trait in the tracked model:

    ```php
       use HistoryTracker;
    ```

4. Add the `$historyModel` property to the tracked model:

    ```php
       protected  = ModelHistory::class;
    ```

The trait also defines a relationship to the history model instances, so you can access the snapshots by calling `histories`:

```php
    $myModel->histories
```  

### Notes

[Laravel Enso](https://github.com/laravel-enso/Enso) already included and ready to use out of the box.
The package itself has no other dependencies beyond Laravel.

<!--h-->
### Contributions

are welcome. Pull requests are great, but issues are good too.

### License

This package is released under the MIT license.
<!--/h-->