<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRouteLogEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('route_log_entries', function (Blueprint $table) {
            $table->id();
            $table->string('ip_address');
            $table->bigInteger('redirect_route_id')->unsigned();
            $table->index('redirect_route_id');
            $table->foreign('redirect_route_id')->references('id')->on('redirect_routes')->onDelete('cascade');
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
        Schema::dropIfExists('route_log_entries');
    }
}
