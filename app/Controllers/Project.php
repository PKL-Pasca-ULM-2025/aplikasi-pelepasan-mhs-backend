<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourcePresenter;

class Project extends ResourcePresenter
{
   protected $modelName = 'App\Models\ProjectModel';
 
    /**
     * Present a view of resource objects
     *
     * @return mixed
     */
    public function index()
    {
        return view('projects/index', ['projects' => $this->model->orderBy('created_at', 'asc')->findAll()]);
    }
 
    /**
     * Present a view to present a specific resource object
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function show($id = null)
    {
        return view('projects/show', ['project' => $this->model->find($id)]);
    }
 
    /**
     * Present a view to present a new single resource object
     *
     * @return mixed
     */
    public function new()
    {
        return view('projects/create');
    }
 
    /**
     * Process the creation/insertion of a new resource object.
     * This should be a POST.
     *
     * @return mixed
     */
    public function create()
    {
 
        $data = [
            'name' => $this->request->getPost('name'),
            'description'    => $this->request->getPost('description'),
        ];
         
        if ($this->model->insert($data) === false)
        {
            return redirect()->back()->withInput()->with('errors', $this->model->errors());
        }
 
        return redirect()->back()->with('success', 'Saved Successfully!');
    }
 
    /**
     * Present a view to edit the properties of a specific resource object
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        return view('projects/edit', ['project' => $this->model->find($id)]);
    }
 
    /**
     * Process the updating, full or partial, of a specific resource object.
     * This should be a POST.
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function update($id = null)
    {
 
        $data = [
            'name' => $this->request->getPost('name'),
            'description'    => $this->request->getPost('description'),
        ];
 
        if ($this->model->where('id', $id)->set($data)->update() === false)
        {
            return redirect()->back()->withInput()->with('errors', $this->model->errors());
        }
 
        return redirect()->back()->with('success', 'Updated Successfully!');
    }
 
    /**
     * Present a view to confirm the deletion of a specific resource object
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function remove($id = null)
    {
        //
    }
 
    /**
     * Process the deletion of a specific resource object
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $this->model->delete($id);
        return redirect()->back()->with('success', 'Deleted Successfully!');
    }
}
