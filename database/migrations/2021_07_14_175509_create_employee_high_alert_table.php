<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeHighAlertTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_high_alert', function (Blueprint $table) {
            $table->integer("employee_id")->references("id")->on("employees")->onDelete("cascade")->onUpdate("cascade");
            $table->integer("high_alert_id")->references("id")->on("high_alerts")->onDelete("casscade")->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_high_alert');
    }
}
