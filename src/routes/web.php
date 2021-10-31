<?php

use Illuminate\Support\Facades\Route;
use WireBlade\Controllers\{ButtonController, IconsController, WireBladeAssetsController};

Route::name('wireblade.')->prefix('/wireblade')->group(function () {
    Route::get('icons/{style}/{icon}', [IconsController::class, 'getIcon'])
        ->where('style', '(outline|solid)')
        ->name('icons');

    Route::get('button', [ButtonController::class, 'render'])->name('render.button');

    Route::get('assets/scripts', [WireBladeAssetsController::class, 'scripts'])->name('assets.scripts');
    Route::get('assets/styles', [WireBladeAssetsController::class, 'styles'])->name('assets.styles');
});
