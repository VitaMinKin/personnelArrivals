<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurrentAlertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('current_alerts', function (Blueprint $table) {
            $table->id();
            $table->smallInteger("alert_signal_id")->references("id")->on("alert_signals")->onDelete("cascade")->onUpdate("cascade");
            $table->date("begin_date");
            $table->time("begin_time");
            $table->text("limitation");
            $table->text("reported_officer");
            $table->text("accepted_officer");
            $table->timestamp("cancelled")->nullable();
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
        Schema::dropIfExists('current_alerts');
    }
}
