<?php
class User{
    public int $id;
    public ?string $name;
    public function __construct(int $id, ?string $name){
        $this->id = $id;
        $this->name = $name;
    }

public function conseguir_nombre() : string{
    return $this->name ?? "John";
}
}
$user = new User(1234, null);
var_dump($user->id);
var_dump($user->name);

echo $user->conseguir_nombre();