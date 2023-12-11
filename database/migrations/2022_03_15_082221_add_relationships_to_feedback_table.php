<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipsToFeedbackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('feedback', function (Blueprint $table) {
            $table  ->foreign('id_complaint')
                    ->references('id')
                    ->on('complaint')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');

            $table  ->foreign('id_agency')
                    ->references('id')
                    ->on('agency')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('feedback', function (Blueprint $table) {
            $table->dropForeign('feedback_id_complaint_foreign');
            $table->dropForeign('feedback_id_agency_foreign');
        });
    }
}
