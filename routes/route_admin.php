<?php
        /**
         * Route dang ky dang nhap cho admin
         */
    Route::group(['prefix' => 'admin-auth', 'namespace'=>'Admin\Auth'], function (){
        Route::get('login','AdminLoginController@getLoginAdmin')->name('get.login.admin');
        Route::post('login','AdminLoginController@postLoginAdmin');
        Route::get('logout','AdminLoginController@getLogoutAdmin')->name('get.logout.admin');

    });

//    file manager cho admin
    Route::group(['prefix' => 'laravel-filemanager','middleware' => 'check_admin_login'], function () {
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });


    Route::group(['prefix' => 'api-admin', 'namespace'=>'Admin','middleware' => 'check_admin_login'], function (){
        Route::get('/', function () {
            return view('admin.index');
        });

        Route::get('statistical','AdminStatisticalController@index')->name('admin.statistical');

    /**
     * Route danh muc san pham(Category)
     */
    Route::group(['prefix' => 'category'], function (){
        Route::get('','AdminCategoryController@index')->name('admin.category.index');
//        Route hien thi form them moi
        Route::get('create','AdminCategoryController@create')->name('admin.category.create');
//        Route xu ly phan them moi
        Route::post('create','AdminCategoryController@store');

        //        Route update
        Route::get('update/{id}','AdminCategoryController@edit')->name('admin.category.update');
        Route::post('update/{id}','AdminCategoryController@store');
        Route::post('update/{id}','AdminCategoryController@update');

//        Xu ly trang thai
        Route::get('active/{id}','AdminCategoryController@active')->name('admin.category.active');
        Route::get('hot/{id}','AdminCategoryController@hot')->name('admin.category.hot');
//        Delete
        Route::get('delete/{id}','AdminCategoryController@delete')->name('admin.category.delete');
    });

    /**
     * Route keyword
     */
    Route::group(['prefix' => 'keyword'], function (){
        Route::get('','AdminKeywordController@index')->name('admin.keyword.index');

        Route::get('create','AdminKeywordController@create')->name('admin.keyword.create');

        Route::post('create','AdminKeywordController@store');

        Route::get('hot/{id}','AdminKeywordController@hot')->name('admin.keyword.hot');
        Route::get('update/{id}','AdminKeywordController@edit')->name('admin.keyword.update');
        Route::post('update/{id}','AdminKeywordController@update');

        Route::get('delete/{id}','AdminKeywordController@delete')->name('admin.keyword.delete');
    });

    /**
     * Route Attribue(thuoctinh)
     */
    Route::group(['prefix' => 'attribute'], function (){
        Route::get('','AttributeController@index')->name('admin.attribute.index');

        Route::get('create','AttributeController@create')->name('admin.attribute.create');

        Route::post('create','AttributeController@store');

        Route::get('hot/{id}','AttributeController@hot')->name('admin.attribute.hot');
        Route::get('update/{id}','AttributeController@edit')->name('admin.attribute.update');
        Route::post('update/{id}','AttributeController@update');

        Route::get('delete/{id}','AttributeController@delete')->name('admin.attribute.delete');
    });


    /**
     * Route Prodcut
     */
    Route::group(['prefix' => 'product'], function (){
        Route::get('','AdminProductController@index')->name('admin.product.index');
        Route::get('create','AdminProductController@create')->name('admin.product.create');
        Route::post('create','AdminProductController@store');
        Route::get('hot/{id}','AdminProductController@hot')->name('admin.product.hot');
        Route::get('active/{id}','AdminProductController@active')->name('admin.product.active');
        Route::get('update/{id}','AdminProductController@edit')->name('admin.product.update');
        Route::post('update/{id}','AdminProductController@update');
        Route::get('delete/{id}','AdminProductController@delete')->name('admin.product.delete');
        Route::get('delete-image/{id}','AdminProductController@deleteImage')->name('admin.product.delete_image');


    });

    /**
     * Route quản lý user
     */
    Route::group(['prefix' => 'user'], function (){
        Route::get('','AdminUserController@index')->name('admin.user.index');

        Route::get('update/{id}','AdminUserController@edit')->name('admin.user.update');
        Route::post('update/{id}','AdminUserController@update');

        Route::get('delete/{id}','AdminUserController@delete')->name('admin.user.delete');
    });


    /**
     * Route quản lý don hang
     */
    Route::group(['prefix' => 'transaction'], function (){
        Route::get('/','AdminTransactionController@index')->name('admin.transaction.index');
        Route::get('delete/{id}','AdminTransactionController@delete')->name('admin.transaction.delete');
        Route::get('view-transaction/{id}','AdminTransactionController@getTransactionDetail')->name('ajax.admin.transaction.detail');
        Route::get('order-delete/{id}','AdminTransactionController@deleteOrderItem')->name('ajax.admin.transaction.order_item');
        Route::get('action/{action}/{id}','AdminTransactionController@getAction')->name('admin.action.transaction');
    });


        /**
         * Route quan ly bai viet/tin tuc
         */
        Route::group(['prefix' => 'menu'], function (){
            Route::get('','AdminMenuController@index')->name('admin.menu.index');
//        Route hien thi form them moi
            Route::get('create','AdminMenuController@create')->name('admin.menu.create');
//        Route xu ly phan them moi
            Route::post('create','AdminMenuController@store');

            //        Route update
            Route::get('update/{id}','AdminMenuController@edit')->name('admin.menu.update');
            Route::post('update/{id}','AdminMenuController@store');
            Route::post('update/{id}','AdminMenuController@update');

//        Xu ly trang thai
            Route::get('active/{id}','AdminMenuController@active')->name('admin.menu.active');
            Route::get('hot/{id}','AdminMenuController@hot')->name('admin.menu.hot');
//        Delete
            Route::get('delete/{id}','AdminMenuController@delete')->name('admin.menu.delete');
        });

        Route::group(['prefix' => 'article'], function (){
            Route::get('','AdminArticleController@index')->name('admin.article.index');
            Route::get('create','AdminArticleController@create')->name('admin.article.create');
            Route::post('create','AdminArticleController@store');
            Route::get('update/{id}','AdminArticleController@edit')->name('admin.article.update');
            Route::post('update/{id}','AdminArticleController@store');
            Route::post('update/{id}','AdminArticleController@update');
            Route::get('active/{id}','AdminArticleController@active')->name('admin.article.active');
            Route::get('hot/{id}','AdminArticleController@hot')->name('admin.article.hot');
            Route::get('delete/{id}','AdminArticleController@delete')->name('admin.article.delete');
        });

    /**
            Route slide
     **/
        Route::group(['prefix' => 'slide'], function (){
            Route::get('','AdminSlideController@index')->name('admin.slide.index');
            Route::get('create','AdminSlideController@create')->name('admin.slide.create');
            Route::post('create','AdminSlideController@store');
            Route::get('update/{id}','AdminSlideController@edit')->name('admin.slide.update');
            Route::post('update/{id}','AdminSlideController@store');
            Route::post('update/{id}','AdminSlideController@update');
            Route::get('active/{id}','AdminSlideController@active')->name('admin.slide.active');
            Route::get('hot/{id}','AdminSlideController@hot')->name('admin.slide.hot');
            Route::get('delete/{id}','AdminSlideController@delete')->name('admin.slide.delete');
        });
        /**
        Route event
         **/
        Route::group(['prefix' => 'event'], function (){
            Route::get('','AdminEventController@index')->name('admin.event.index');
            Route::get('create','AdminEventController@create')->name('admin.event.create');
            Route::post('create','AdminEventController@store');

            Route::get('update/{id}','AdminEventController@edit')->name('admin.event.update');
            Route::post('update/{id}','AdminEventController@update');

            Route::get('delete/{id}','AdminEventController@delete')->name('admin.event.delete');
        });
});



