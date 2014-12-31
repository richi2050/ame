<?php

class ConfigController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /config
	 *
	 * @return Response
	 */
	public function index()
	{
        $datos="";
        $datos = Configuration::all();



		return View::make('config.index')->with('datos',$datos);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /config/create
	 *
	 * @return Response
	 */
	public function create()
	{
        $data = Input::all();
        $reglas = array(
            'Ip'    => 'required|ip|min:9|max:15'
        );
         $validador = Validator::make($data, $reglas);

        if ($validador->passes()) {

            $val= Configuration::where('label','=', 'Ip')->get();
           // dd(count($val));
            if(count($val)>=1){

                $config = Configuration::find($val[0]->id);
            }
            else{
                $config = new Configuration;
            }




            $config->label= 'Ip';
            $config->value= $data['Ip'];
            //dd($config);
            $config->save();
                Flash::success('Datos actualizados');
                return Redirect::back()->withInput();

        }else{
            //dd($validador->messages());
            Flash::error('Verifica los siguientes Errores.');
            return Redirect::back()->withInput()->withErrors($validador->messages());
        }
    }

	/**
	 * Store a newly created resource in storage.
	 * POST /config
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /config/{id}
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
	 * GET /config/{id}/edit
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
	 * PUT /config/{id}
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
	 * DELETE /config/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}