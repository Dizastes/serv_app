<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleAndPermissionController;
use App\Http\Controllers\LogsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('ref')->group(function () {
	Route::prefix('user')->group(function () {
		Route::get('/', [UserController::class, 'getUsers'])->middleware('checkRole:get-list-user');
		Route::delete('{id}/hard', [UserController::class, 'hardDeleteUser'])->middleware('checkRole:delete-user');
		Route::delete('{id}/soft', [UserController::class, 'softDeleteUser'])->middleware('checkRole:delete-user');
		Route::post('{id}/restore', [UserController::class, 'restoreDeletedUser'])->middleware('checkRole:delete-user');
		Route::put('{id}/changeUserRole', [UserController::class, 'changeUserRole'])->middleware('checkRole:update-user');
		Route::get('{id}/role', [UserController::class, 'getUserRoles'])->middleware('checkRole:read-user');
		Route::post('{id}/role', [UserController::class, 'giveUserRoles'])->middleware('checkRole:update-user');
		Route::delete('{id}/role/{role_id}/hard', [UserController::class, 'hardDeleteUserRole'])->middleware('checkRole:delete-user');
		Route::delete('{id}/role/{role_id}/soft', [UserController::class, 'softDeleteUserRole'])->middleware('checkRole:delete-user');
		Route::post('{id}/role/{role_id}/restore', [UserController::class, 'restoreDeletedUserRole'])->middleware('checkRole:delete-user');
		Route::put('updateInformation', [UserController::class, 'updateInformation'])->middleware('checkRole:read-user');
	});

	Route::prefix('policy')->group(function () {
		Route::prefix('role')->group(function () {
			Route::get('/', [RoleController::class, 'getRoles'])->middleware('checkRole:get-list-role');
			Route::get('{id}', [RoleController::class, 'getTargetRole'])->middleware('checkRole:read-role');
			Route::post('/', [RoleController::class, 'createRole'])->middleware('checkRole:create-role');
			Route::put('{id}', [RoleController::class, 'updateRole'])->middleware('checkRole:update-role');
			Route::delete('{id}/hard', [RoleController::class, 'hardDeleteRole'])->middleware('checkRole:delete-role');
			Route::delete('{id}/soft', [RoleController::class, 'softDeleteRole'])->middleware('checkRole:delete-role');
			Route::post('{id}/restore', [RoleController::class, 'restoreDeletedRole'])->middleware('checkRole:restore-role');
		});

		Route::prefix('role')->group(function () {
			Route::get('/', [PermissionController::class, 'getPermissions'])->middleware('checkRole:get-list-permission');
			Route::get('{id}', [PermissionController::class, 'getTargetPermission'])->middleware('checkRole:read-permission');
			Route::post('/', [PermissionController::class, 'createPermission'])->middleware('checkRole:create-permission');
			Route::put('{id}', [PermissionController::class, 'updatePermission'])->middleware('checkRole:update-permission');
			Route::delete('{id}/hard', [PermissionController::class, 'hardDeletePermission'])->middleware('checkRole:delete-permission');
			Route::delete('{id}/soft', [PermissionController::class, 'softDeletePermission'])->middleware('checkRole:delete-permission');
			Route::post('{id}/restore', [PermissionController::class, 'restoreDeletedPermission'])->middleware('checkRole:restore-permission');
		});

		Route::prefix('role/{id}/permission')->group(function () {
			Route::get('/', [RoleAndPermissionController::class, 'getRolePermission'])->middleware('checkRole:read-role');
			Route::get('{permission_id}', [RoleAndPermissionController::class, 'addRolePermission'])->middleware('checkRole:update-role');
			Route::delete('{permission_id}/hard', [RoleAndPermissionController::class, 'hardDeleteRolePermission'])->middleware('checkRole:update-role');
			Route::delete('{permission_id}/soft', [RoleAndPermissionController::class, 'softDeleteRolePermission'])->middleware('checkRole:update-role');
			Route::post('{permission_id}/restore', [RoleAndPermissionController::class, 'restoreDeletedRolePermission'])->middleware('checkRole:update-role');
		});
	});

	Route::prefix('log')->group(function () {
		Route::get('{model}/{id}/story', [LogsController::class, 'getLogs'])->middleware('checkRole:get-logs-user,delete-user');
		Route::get('{id}/restore', [LogsController::class, 'restoreRow']);
	});
});



Route::prefix('auth')->group(function () {

	Route::post('login', [MainController::class, "login"])->name('login');

	Route::post('register', [MainController::class, "register"])->middleware('check');

	Route::middleware('auth:api')->group(function () {

		Route::get('me', [MainController::class, "me"])->name('me');

		Route::post('out', [MainController::class, "out"]);

		Route::post('out_all', [MainController::class, "outAll"]);

		Route::get('tokens', [MainController::class, "getTokens"]);
	});

	Route::post('refreshCode', [MainController::class, "refreshCode"]);
	Route::post('verify', [MainController::class, "verifyCode"]);
});
