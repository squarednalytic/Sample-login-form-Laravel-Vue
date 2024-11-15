Schema::create('menus', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->string('route')->nullable();
    $table->foreignId('parent_id')->nullable()->constrained('menus')->onDelete('cascade');
    $table->timestamps();
});
