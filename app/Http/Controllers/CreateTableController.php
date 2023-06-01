<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class CreateTableController extends Controller
{
    public function table()
    {
        if (!Schema::hasTable('Landlord')) {
            Schema::create('Landlord', function ($table) {
                $table->increments('Landlord_id');
                $table->string('Name');
                $table->string('Email');
                $table->integer('Phone');
                $table->string('Address');
                $table->string('Password');
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('Tenant')) {
            Schema::create('Tenant', function ($table) {
                $table->increments('Tenant_id');
                $table->string('Name');
                $table->string('Email');
                $table->integer('Phone');
                $table->string('Address');
                $table->string('Password');
                $table->timestamps();
            });
        }

        echo "Tạo bảng thành công";
    }
}
