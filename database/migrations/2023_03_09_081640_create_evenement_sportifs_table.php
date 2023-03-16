<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evenement_sportifs', function (Blueprint $table) {
            $table->id();
            $table->string("nom",100);
            $table->text("description");
            $table->string("lieu",100);
            $table->string("poster");
            $table->date("dateDebut");
            $table->date("dateFin");
            /*$table->foreignId("user_id");
            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade");*/
            $table->foreignId("user_id")->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('evenement_sportifs');
    }
};
