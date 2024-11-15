Schema::create('audit_trails', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained()->onDelete('cascade');
    $table->string('username');
    $table->string('menu_name');
    $table->string('method');
    $table->timestamp('activity_time');
    $table->text('data_changes')->nullable();
    $table->timestamps();
});
