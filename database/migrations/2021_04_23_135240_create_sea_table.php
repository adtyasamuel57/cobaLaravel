<?php

use Egulias\EmailValidator\Exception\CharNotAllowed;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sea', function (Blueprint $table) {
            $table->id();
            $table->float('Tinggi Gelombang',8,2);
            $table->float('Arus',8,2);
            $table->float('Kuat Getaran',8,2);
            $table->float('Hasil',8,2);
            $table->Char('Status',10);
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
        Schema::dropIfExists('sea');
    }
}
