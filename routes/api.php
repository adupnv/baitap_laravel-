

        <?php									

        use Illuminate\Http\Request;									
        use Illuminate\Support\Facades\Route;									
       	
        use App\Http\Controllers\TikiControlle;														
                                            
        Route::middleware('auth:api')->get('/user', function (Request $request) {									
        return $request->user();									
        });									
                                            
        // create api									
        Route::get('/get-Tiki',[App\Http\Controllers\TikiController::class,'getTiki']);									
                                            
                                            
                                            
        Route::get('/get-Tiki/{id}', [App\Http\Controllers\TikiController::class,'getOneTiki']);									
        Route::post('/add-Tiki',[App\Http\Controllers\TikiController::class,'addTiki']);									
        Route::delete('/delete-Tiki/{id}',[App\Http\Controllers\TikiController::class,'deleteTiki']);									
        Route::put('/edit-Tiki/{id}',[App\Http\Controllers\TikiController::class,'editTiki']);									
                                            
        Route::post('/upload-image',[App\Http\Controllers\TikiController::class,'uploadImage']);									
                                            
                                                                                        