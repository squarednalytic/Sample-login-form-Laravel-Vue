public function children()
{
    return $this->hasMany(Menu::class, 'parent_id');
}
