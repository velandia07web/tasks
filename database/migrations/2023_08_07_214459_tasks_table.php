<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            /* $table->string('id_developer');
            $table->string('id_statuses'); */
            $table->date('end_date');
            $table->date('start_date')->nullable();
            $table->string('Report')->nullable(); // Agregar campo 'fecha_inicio'
            $table->string('upload_files', 255)->nullable(); // Agregar campo 'subir_archivos'
            $table->timestamps();
            /*$table->string('fecha inicio ');
            $table->string('subir archivos');*/

            $table->foreignId('developer')
                  ->nullable()
                  ->constrained('developers')
                  ->cascadeOnUpdate()
                  ->nullOnDelete();

            $table->foreignId('statuses')
                  ->nullable()
                  ->constrained('statuses')
                  ->cascadeOnUpdate()
                  ->nullOnDelete();


            

                  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
