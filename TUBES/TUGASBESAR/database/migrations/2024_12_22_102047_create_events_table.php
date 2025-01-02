<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name'); 
            $table->date('event_date'); 
            $table->time('start_time'); 
            $table->time('end_time'); 
            $table->string('location'); 
            $table->string('category'); 
            $table->integer('max_participants'); 
            $table->integer('price')->default(0);
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); 
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn('price');
        });
    }
}
