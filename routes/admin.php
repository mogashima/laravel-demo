<?php

use App\Http\Controllers\Admin\AdminNoticeController;
use Illuminate\Support\Facades\Route;


// 端末
Route::controller(AdminNoticeController::class)->group(function () {
    Route::get('/notice', 'index')->name('admin.notice.index');
    Route::get('/notice/create', 'create')->name('admin.notice.create');
    Route::get('/notice/{notice}', 'show')->name('admin.notice.show');
    Route::get('/notice/{notice}/edit', 'edit')->name('admin.notice.edit');
    Route::post('/notice', 'store')->name('admin.notice.store');
    Route::put('/notice/{notice}', 'update')->name('admin.notice.update');
    Route::delete('/notice/{notice}', 'destroy')->name('admin.notice.destroy');
});


