<?php

use Ajtarragona\TComponents\Livewire\Docs;

Route::group(['prefix' => 'ajtarragona/t-components','middleware' => ['web']], function () {
	
	
	// Route::get('/{section?}', Docs::class)->name('t-components.docs.home')->where('section', '(.*)');
	Route::get('/testAjax', 'Ajtarragona\TComponents\Controllers\DocsController@testAjax')->name('t-components.testAjax');
	Route::post('/testAjax', 'Ajtarragona\TComponents\Controllers\DocsController@testAjax')->name('t-components.testAjaxPost');
	Route::get('/testForm', 'Ajtarragona\TComponents\Controllers\DocsController@testForm')->name('t-components.testForm');
	Route::post('/testForm', 'Ajtarragona\TComponents\Controllers\DocsController@testForm')->name('t-components.testForm');
	Route::post('/validatedForm', 'Ajtarragona\TComponents\Controllers\DocsController@validatedForm')->name('t-components.validatedForm');
	Route::get('/layout/{layout}', 'Ajtarragona\TComponents\Controllers\DocsController@setLayout')->name('t-components.setLayout');
	
	Route::get('/{t_page?}', Docs::class)->name('t-components.docs');
	
});
