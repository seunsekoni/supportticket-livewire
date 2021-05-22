<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupportTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('support_tickets', function (Blueprint $table) {
            $table->id();
            $table->string('question');
            $table->timestamps();
        });

        Schema::table('comments', function (Blueprint $table) {
            $table->unsignedBigInteger('support_ticket_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('support_tickets');

        Schema::table('comments', function (Blueprint $table) {
            $table->dropColumn('support_ticket_id');
        });
    }
}
