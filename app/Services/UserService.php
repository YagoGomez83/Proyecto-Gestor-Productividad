<?php
// UserService.php
namespace App\Services;

use App\Repositories\UserRepository;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function createUser(array $data)
    {
        $data['password'] = bcrypt($data['password']);
        $this->userRepository->store($data);
    }

    public function updateUser($id, array $data)
    {
        // Si hay una nueva contraseña, cifrarla
        if (isset($data['password']) && !empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        } else {
            // Si no se proporciona contraseña, eliminarla del array de datos
            unset($data['password']);
        }
        $this->userRepository->update($id, $data);
    }

    public function deleteUser($id)
    {
        $this->userRepository->delete($id);
    }
    public function getOperatorsByGroup($groupId, $role)

    {
        if ($role == 'supervisor') {
            return $this->userRepository->getUsersByGroup($groupId);
        }
        if ($role == 'coordinator') {
            return $this->userRepository->getAllUsers();
        }
        return $this->userRepository->getUsersByGroup($groupId);
    }

    public function getEditPageData($id)
    {
        $user = $this->userRepository->find($id);
        $cities = $this->userRepository->getAllCities();
        $groups = $this->userRepository->getAllGroups();
        $centers = $this->userRepository->getAllCenters();

        return compact('user', 'cities', 'groups', 'centers');
    }
}
