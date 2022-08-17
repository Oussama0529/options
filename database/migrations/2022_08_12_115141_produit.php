<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Produit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('diag_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });
        
        Schema::create('diag_lots', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });
        
        Schema::create('diag_produit_types', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('name');
            $table->string('picture')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();

        });
        Schema::create('diag_cerfas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('picture')->nullable();
            $table->timestamps();
        });
        Schema::create('diag_produits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();;
            $table->unsignedBigInteger('type_produit_id')->nullable();;
            $table->unsignedBigInteger('cat_id')->nullable();
            $table->unsignedBigInteger('cerfa_id')->nullable();
            $table->unsignedBigInteger('lot_id')->nullable();

            $table->string('name');
            $table->string('classe', 3)->nullable();
            
            $table->text('note')->nullable();
            $table->text('tags')->nullable();
            $table->string('picture')->nullable();
            $table->timestamp('verified_at')->nullable();

            $table->boolean('verified')->default(0);
            $table->boolean('archived')->default(0);
            $table->softDeletes($column = 'deleted_at', $precision = 0);

            $table->timestamps();

            $table->foreign('type_produit_id')->references('id')->on('diag_produit_types')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('cat_id')->references('id')->on('diag_categories')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('cerfa_id')->references('id')->on('diag_cerfas')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('lot_id')->references('id')->on('diag_lots')->onDelete('restrict')->onUpdate('restrict');
        });
        Schema::create('diag_produit_options', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('produit_id');
            
            $table->string('name')->nullable();

            $table->string('unite', 5);
            $table->double('masse_volumique')->nullable();
            $table->double('carbonne')->nullable();
            $table->double('longueur')->nullable();
            $table->double('largeur')->nullable();
            $table->double('epaisseur')->nullable();
            $table->double('volume')->nullable();

            $table->string('code_dechet', 20)->nullable();

            $table->boolean('verified')->default(0);
            $table->softDeletes($column = 'deleted_at', $precision = 0);
            $table->timestamps();

            $table->foreign('produit_id')->references('id')->on('diag_produits')->onDelete('restrict')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diag_categories');
        Schema::dropIfExists('diag_lots');
        Schema::dropIfExists('diag_produit_types');
        Schema::dropIfExists('diag_cerfas');

        Schema::dropIfExists('diag_produits');
        Schema::dropIfExists('diag_produit_options');
    }
}