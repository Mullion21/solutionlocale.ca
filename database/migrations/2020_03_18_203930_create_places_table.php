<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('places', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->string('name');
            $table->string('address');
            $table->string('province');
            $table->string('region');
            $table->string('city');
            $table->string('countryCode');
            $table->string('postalCode');
            $table->decimal('long', 10, 7);
            $table->decimal('lat', 10, 7);
            $table->string('phoneNumber');
            $table->string('additionnalPhoneNumber');
            $table->string('email');
            $table->string('url');
            $table->text('instructions');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('places');
    }
}
