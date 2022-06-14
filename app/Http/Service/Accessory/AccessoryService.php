<?php


interface AccessoryService {
	public function getColumnsFromTable();
	public function storeInDb(array $arrayToStore);
	public function updateInDb(array $request, int $id) ;
	public function deleteFromDb(int $id);
	public function getFromDb(int $id = 0);
	public function getAll();
}
