<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamilyHeadsTable extends Migration
{
    public function up()
    {
        Schema::create('family_heads', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname');
            // $table->date('birthdate');
            $table->string('mobile_no', 15);
            $table->text('address');
            $table->string('state');
            $table->string('city');
            $table->string('pincode', 10);
            $table->enum('marital_status', ['Married', 'Unmarried']);
            // $table->date('wedding_date')->nullable();
            $table->json('hobbies')->nullable();
            $table->string('photo')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('family_heads');
    }
}
