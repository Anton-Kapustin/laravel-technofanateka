<?php

namespace App\Http\Service;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserRequest;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;





class UserService {

	protected $selectColumns = ['id', 'first_name', 'last_name', 'age', 'gender'];
	protected $PermissionDenied = 'Permission Denied';
	protected $successful = 'Successful';
	protected $saveFailed = 'Save failed';
	protected $danger = 'danger';
	protected $success = 'success';

    /**
     * @param User $userModel
     * @param Service $service
    */
    public function __construct(User $userModel, Service $service)
    {
        $this->userModel = $userModel;
        $this->service = $service;
    }

	public function getUserFromDb(int $id) {
		$userProfile = User::where('id', $id)
				->select($this->selectColumns)
				->first();
		if (Auth::user()->can('view', $userProfile)) {
			return $userProfile;
		}
		return [$this->danger => $this->PermissionDenied];
		
	}

	public function getAllUsersFromDb() {
		if(Auth::user()->can('viewAny', User::class)) {
			$allUsers = User::select($this->selectColumns)->get();
			return $allUsers->toArray();
		}
		return [$this->danger => $this->PermissionDenied];

	}

	public function getUserProfileItems(int $id) {
		$user = $this->getAuthUser();
		$userModel = $this->getUserFromDb($id);
		if ($user->can('view', $userModel)) {
			return $userModel;
		}
		return [$this->danger => $this->PermissionDenied];
	}

	public function getUserProfileItemsForEdit(int $id) {
		$user = $this->getAuthUser();
		$userModel = $this->getUserFromDb($id);
		if (!($user->can('update', $userModel))) {
			return [$this->danger => $this->PermissionDenied];
		}
		return $userModel;
		
	}


	public function updateUserInDb(UserRequest $userRequest) {
		$user = $this->getAuthUser();
		$fileIndex = 'title_image';
		$userModel = User::where('id', $userRequest->id)
		    ->select($this->selectColumns)
		    ->first();
		if(!($user->can('update', $userModel))) {
		    return [$this->danger => $this->PermissionDenied];
		}
		$requestArray = $userRequest->all();
		unset($requestArray['_token']);
		unset($requestArray['_method']);
		unset($requestArray['id']);
		foreach ($requestArray as $column => $item) {
			$userModel->$column = $item;
		}  
		if ($userModel->save()) {
		    return [$this->success => $this->successful]; 
		}
		return [$this->danger => $this->saveFailed]; 
	}
		
	private function getAuthUser() {
		return Auth::user();
	}

}