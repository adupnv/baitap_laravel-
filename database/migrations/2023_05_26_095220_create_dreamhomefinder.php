<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Schema::hasTable('Lessor')) {
            Schema::create('Lessor', function ($table) {
                $table->increments('Lessor_id');
                $table->string('Lessor_name');
                $table->string('Lessor_email');
                $table->integer('Lessor_phone');
                $table->string('Lessor_address');
                $table->string('Lessor_password');
                $table->timestamps();
            });
        }
        if (!Schema::hasTable('Renter')) {
            Schema::create('Renter', function ($table) {
                $table->increments('Renter_id');
                $table->string('Renter_name');
                $table->string('Renter_email');
                $table->integer('Renter_phone');
                $table->string('Renter_address');
                $table->string('Renter_password');
                $table->timestamps();
            });
        }
        if (!Schema::hasTable('Apartment')) {
            Schema::create('Apartment', function ($table) {
                $table->increments('Apartment_id');
                $table->integer('Apartment_price');
                $table->integer('Address_id')->unsigned;
                $table->foreign('Address_id')->references('Apartment_id')->on('Apartment')->onDelete('cascade');
                $table->string('Apartment_description');
                $table->integer('Room_count');
                $table->integer('Apartment_Area');
                $table->string('Apartment_image');
                $table->integer('Lessor_id')->unsigned;
                $table->foreign('Lessor_id')->references('Apartment_id')->on('Apartment')->onDelete('cascade');
                $table->timestamps();
            });
        }
        if (!Schema::hasTable('Service')) {
            Schema::create('Service', function ($table) {
                $table->increments('Service_id');
                $table->string('Description');
                $table->string('Apartment_description');
                $table->integer('Service_price');
                $table->integer('Contact_info');
                $table->integer('Apartment_id')->unsigned;
                $table->foreign('Apartment_id')->references('Service_id')->on('Service')->onDelete('cascade');
                $table->timestamps();
            });
        }
        if (!Schema::hasTable('Contract')) {
            Schema::create('Contract', function ($table) {
                $table->increments('Contract_id');
                $table->integer('Lessor_id')->unsigned;
                $table->foreign('Lessor_id')->references('Contract_id')->on('Contract')->onDelete('cascade');
                $table->integer('Renter_id')->unsigned;
                $table->foreign('Renter_id')->references('Contract_id')->on('Contract')->onDelete('cascade');
                $table->integer('Apartment_id')->unsigned;
                $table->foreign('Apartment_id')->references('Contract_id')->on('Contract')->onDelete('cascade');
                $table->date('Start_date');
                $table->date('End_date');
                $table->integer('Price');
                $table->string('Payment_status');
               
                $table->timestamps();
            });
        }
        if (!Schema::hasTable('Issue')) {
            Schema::create('Issue', function ($table) {
                $table->increments('Issue_id');
                $table->integer('Renter_id')->unsigned;
                $table->foreign('Renter_id')->references('Contract_id')->on('Contract')->onDelete('cascade');
                $table->integer('Apartment_id')->unsigned;
                $table->foreign('Apartment_id')->references('Contract_id')->on('Contract')->onDelete('cascade');
                $table->string('Description');
                $table->date('Report_date');
                $table->integer('Price');
                $table->string('Status');
                $table->timestamps();
            });
        }
        if (!Schema::hasTable('Schedule')) {
            Schema::create('Schedule', function ($table) {
                $table->increments('Schedule_id');
                $table->integer('Apartment_id')->unsigned;
                $table->foreign('Apartment_id')->references('Contract_id')->on('Contract')->onDelete('cascade');
              
                $table->date('Maintenance_date');
                $table->date('Duration');
                $table->string('Progress');
                $table->timestamps();
            });
        }
        if (!Schema::hasTable('Rating')) {
            Schema::create('Rating', function ($table) {
                $table->increments('Rating_id');
                $table->integer('Renter_id')->unsigned;
                $table->foreign('Renter_id')->references('Contract_id')->on('Contract')->onDelete('cascade');
                $table->integer('Apartment_id')->unsigned;
                $table->foreign('Apartment_id')->references('Contract_id')->on('Contract')->onDelete('cascade');
                $table->integer('Rating_point');
                $table->string('Comments');
                $table->timestamps();
            });
        }
        if (!Schema::hasTable('Address')) {
            Schema::create('Address', function ($table) {
                $table->increments('Address_id');
                $table->string('District');
                $table->string('Street');
                $table->integer('Wards');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dreamhomefinder');
    }
};
