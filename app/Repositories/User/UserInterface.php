<?php
namespace App\Repositories\User;

use App\User;

interface UserInterface {

    public function CreateUser(array $post_data);

    public function UpdateUser(User $user, array $post_data);

    public function GetUserById($userid);

}
