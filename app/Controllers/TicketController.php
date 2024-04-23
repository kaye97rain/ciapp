<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\HTTP\Response;

class TicketController extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index()
    {
        $ticketModel = new \App\Models\TicketModel();
        $result = $ticketModel->findAll();
 
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
        
        $ticketModel = new \App\Models\ticketModel();
        $result = $ticketModel->find($id);
 
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
        //
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create()
    {
        $ticketModel = new \App\Models\ticketModel();
        $data = $this->request->getJSON();

        if(!$ticketModel -> validate($data)){
            $response = array(
                'status' => 'error',
                'message' => $ticketModel->errors()
            );
            return $this->response->setStatusCode(Response::HTTP_BAD_REQUEST)->setJSON($response);
        }
        $ticketModel ->insert($data);
        $response = array(
            'status' => 'success',
            'message' => 'ticket added successfully'
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
        $ticketModel = new \App\Models\TicketModel();
        $data = $this->request->getJSON();

        if(!$ticketModel -> validate($data)){
            $response = array(
                'status' => 'error',
                'message' => $ticketModel->errors()
            );
            return $this->response->setStatusCode(Response::HTTP_BAD_REQUEST)->setJSON($response);
        }
        $ticketModel ->update($id,$data);
        $response = array(
            'status' => 'success',
            'message' => 'ticket updated successfully'
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
        $ticketModel = new \App\Models\ticketModel();
        $data = $ticketModel->find($id);

        // if(!$data){
        //     $response = array(
        //         'status' => 'error',
        //         'message' => 'Office not found'
        //     );
        //     return $this->response->setStatusCode(Response::HTTP_NOT_FOUND)->setJSON($response);
        // }
        $ticketModel ->delete($id);
        $response = array(
            'status' => 'success',
            'message' => 'ticket deleted successfully'
        );
        
        return $this->response->setStatusCode(Response::HTTP_OK)->setJSON($response);
    }
}
