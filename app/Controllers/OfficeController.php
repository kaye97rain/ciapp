<?php
 
namespace App\Controllers;
 
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\HTTP\Response;
class OfficeController extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index()
    {
        $officeModel = new \App\Models\OfficeModel();
        $result = $officeModel->findAll();
 
        if (!$result) {
            return $this->response->setStatusCode(Response::HTTP_NOT_FOUND);
        }
 
        return $this->response->setStatusCode(Response::HTTP_OK)->setJSON($result);
    }
 
    /**
     * Return the properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function show($id = null)
    {
        $officeModel = new \App\Models\OfficeModel();
        $result = $officeModel->find($id);
 
        if (!$result) {
            return $this->response->setStatusCode(Response::HTTP_NOT_FOUND);
        }
 
        return $this->response->setStatusCode(Response::HTTP_OK)->setJSON($result);
    }
 
    /**
     * Return a new resource object, with default properties.
     *
     * @return ResponseInterface
     */
    public function new()
    {
        //test one
    }
 
    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create()
    {
        $officeModel = new \App\Models\OfficeModel();
        $data = $this->request->getJSON();

        if(!$officeModel -> validate($data)){
            $response = array(
                'status' => 'error',
                'message' => $officeModel->errors()
            );
            return $this->response->setStatusCode(Response::HTTP_BAD_REQUEST)->setJSON($response);
        }
        $officeModel ->insert($data);
        $response = array(
            'status' => 'success',
            'message' => 'Office added successfully'
        );
        
        return $this->response->setStatusCode(Response::HTTP_CREATED)->setJSON($response);
    }
 
    /**
     * Return the editable properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function edit($id = null)
    {
        //
    }
 
    /**
     * Add or update a model resource, from "posted" properties.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function update($id = null)
    {
        $officeModel = new \App\Models\OfficeModel();
        $data = $this->request->getJSON();

        if(!$officeModel -> validate($data)){
            $response = array(
                'status' => 'error',
                'message' => $officeModel->errors()
            );
            return $this->response->setStatusCode(Response::HTTP_BAD_REQUEST)->setJSON($response);
        }
        $officeModel ->update($id,$data);
        $response = array(
            'status' => 'success',
            'message' => 'Office updated successfully'
        );
        
        return $this->response->setStatusCode(Response::HTTP_OK)->setJSON($response);
    }
 
    /**
     * Delete the designated resource object from the model.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function delete($id = null)
    {
        $officeModel = new \App\Models\OfficeModel();
        $data = $officeModel->find($id);

        // if(!$data){
        //     $response = array(
        //         'status' => 'error',
        //         'message' => 'Office not found'
        //     );
        //     return $this->response->setStatusCode(Response::HTTP_NOT_FOUND)->setJSON($response);
        // }
        $officeModel ->delete($id);
        $response = array(
            'status' => 'success',
            'message' => 'Office deleted successfully'
        );
        
        return $this->response->setStatusCode(Response::HTTP_OK)->setJSON($response);
    }
}
 
