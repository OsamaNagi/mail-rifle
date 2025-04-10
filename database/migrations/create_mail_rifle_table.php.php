<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('mail_rifle', function (Blueprint $table) {
            $table->id();

            $table->text('from')->nullable();
            $table->text('to')->nullable();
            $table->text('cc')->nullable();
            $table->text('bcc')->nullable();
            $table->string('subject');
            $table->text('body');
            $table->text('headers')->nullable();
            $table->text('attachments')->nullable();

            $table->timestamp('sent_at')->nullable();
            $table->boolean('is_read')->default(false);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mail_rifle');
    }
};
