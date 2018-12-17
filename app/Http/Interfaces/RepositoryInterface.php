<?php

namespace App\Http\Interfaces;

interface RepositoryInterface
{
    /**
     * Returns an index of entities.
     *
     * @return mixed
     */
    public function index();

    /**
     * Returns a single entity.
     * 
     * @param $id
     * 
     * @return mixed
     */
    public function show($id);

    /**
     * Stores and returns a single entity.
     * 
     * @param array $data
     * 
     * @return mixed
     */
    public function store(array $data);

    /**
     * Updates and returns a single entity.
     * 
     * @param       $id
     * @param array $data
     * 
     * @return mixed
     */
    public function update($id, array $data);

    /**
     * Deletes a specific entity.
     * 
     * @param $id
     * 
     * @return mixed
     */
    public function delete($id);
}