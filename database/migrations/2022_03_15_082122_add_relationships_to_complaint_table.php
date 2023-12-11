<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipsToComplaintTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('complaint', function (Blueprint $table) {
            $table  ->foreign('id_user')
                    ->references('id')
                    ->on('users')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');

            $table  ->foreign('id_agency')
                    ->references('id')
                    ->on('agency')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');

            $table  ->foreign('id_category')
                    ->references('id')
                    ->on('category')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');

            $table  ->foreign('id_region')
                    ->references('id')
                    ->on('region')
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
        Schema::table('complaint', function (Blueprint $table) {
            $table->dropForeign('complaint_id_user_foreign');
            $table->dropForeign('complaint_id_agency_foreign');
            $table->dropForeign('complaint_id_category_foreign');
            $table->dropForeign('complaint_id_region_foreign');
            $table->dropForeign('complaint_id_status_foreign');
        });
    }
}
