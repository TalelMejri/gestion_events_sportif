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
        Schema::create('athletes', function (Blueprint $table) {
            $table->id();
            $table->string("nom",60);
            $table->string("prenom",60);
            $table->enum("genre",['HOMME','FEMME']);
            $table->string("photo")->nullable();
            $table->integer("score")->default(0)->unsigned();
            $table->foreignId("categorie_id")->constrained()->onDelete("cascade");
            $table->foreignId("equipe_id")->constrained()->onDelete("cascade");
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
        Schema::dropIfExists('athletes');
    }
};
