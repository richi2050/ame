<?php

class CodigoController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /codigo
	 *
	 * @return Response
	 */
	public function index()
	{
        $term = trim(strip_tags($_REQUEST['query']));
        //dd($term);
        $data = Codigo::where("CodigoPostal","LIKE","$term%")->orderBy('CodigoPostal','asc')->get();

        $matches = array();
        foreach($data as $city){

        		$city['id'] = $city['id'];
        		$city['cp'] = $city['CodigoPostal'];
                $city['value'] = "{$city['CodigoPostal']},{$city['estado']},{$city['municipio']},{$city['poblacion']}";
        		$city['municipio'] = $city['municipio'];
        		$city['estado'] = $city['estado'];
        		$city['poblacion'] = $city['poblacion'];
        		$matches[] = $city;

        }

        $matches = array_slice($matches, 0, 1000);

        //dd($data);
        //$matches = array_slice($data, 0, 1000);
        return json_encode($matches);
		//dd($term);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /codigo/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /codigo
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /codigo/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /codigo/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /codigo/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /codigo/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}