<?php

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /user
	 *
	 * @return Response
	 */
	public function index()
	{
        $users = User::orderBy('id', 'desc')->paginate(15);
        return View::make('users.index')->with('user', $users);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /user/create
	 *
	 * @return Response
	 */
	public function create()
	{
	    return View::make('users.create');
	}

    public function save(){
        $data = Input::all();
        var_dump($data);

        if (Request::isMethod('post')){
            $data = Input::all();
            //var_dump($data);
            $rules = array(
                'nombre'         => 'required|min:4',
                'apellido'       => 'required|min:4',
                'usuario'        => 'required|max:20|unique:users,user',
                'correo'         => 'required|max:50|email|unique:users,email',
                'contraseña'     => 'required|min:8',
                'password_again' => 'required|same:contraseña'
            );

            $validator = Validator::make($data,$rules);
            if($validator->passes()){

                //print_r(Input::get('id'));

                $user = new User();
                $user->name         = $data['nombre'];
                $user->first_name   = $data['apellido'];
                $user->user         = $data['usuario'];
                $user->email        = $data['correo'];
                $user->actived      = $data['Activación'];

                    $user->password =  Hash::make($data['contraseña']);

                $user->save();

                Flash::success('Datos Guardados');
                return Redirect::back()->withInput();

            }else{
                Flash::error('Verifica los siguientes Errores.');
                return Redirect::back()->withInput()->withErrors($validator->messages());
            }
        }

    }

	/**
	 * Store a newly created resource in storage.
	 * POST /user
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /user/{id}
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
	 * GET /user/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $datos = User::find($id);
        return View::make('users.edit')->with('datos', $datos);
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /user/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update()
	{
        if (Request::isMethod('post')){
            $data = Input::all();
            //var_dump($data);
            $rules = array(
                'name'          => 'required|min:4',
                'first_name'    => 'required|min:4',
                'user'          => 'required|max:20',
                'email'         => 'required|max:50',
            );

            if ($data['password'] != "") {
                $rules2 = array('password' => 'required|min:8', 'password_again' => 'required|same:password');
                $rules = array_merge($rules, $rules2);
            }

            $validator = Validator::make($data,$rules);
            if($validator->passes()){

                //print_r(Input::get('id'));

                $user = User::find(Input::get('id'));
                $user->name         = $data['name'];
                $user->first_name   = $data['first_name'];
                $user->user         = $data['user'];
                $user->email        = $data['email'];
                $user->actived      = $data['Activación'];
                if ($data['password'] != "") {
                    $user->password =  Hash::make($data['password']);
                }
                $user->save();

                Flash::success('Datos actualizados');
                return Redirect::back()->withInput();

            }else{
                Flash::error('Verifica los siguientes Errores.');
                return Redirect::back()->withInput()->withErrors($validator->messages());
            }
        }
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /user/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $user = User::find($id);
        $user->actived = 0;
        $user->save();
        //$user->delete();
        /*if($user->delete){*/
            Flash::success('Dato eliminado');
        /*}else{
            Flash::error('Ocurrio algun problema al eliminar');
        }*/
        return Redirect::back();
	}


    /**
     * Programador: Ricardo Lugo Recillas
     * fecha:10/12/2014
     * descripcion: obtiene los datos de usuario autentificado.
     * @return mixed
     */
	public function profile($id){
        if(Auth::user()->id ==  $id){
            $datos = User::find($id);
        }else{
            $datos = User::find(Auth::user()->id);
        }

		return View::make('users.profile')->with('datos', $datos);
	}

    /**
     * Programador: Ricardo Lugo Recillas
     * fecha:10/12/2014
     * descripcion:actualizacion de datos de perfil del usuario
     * @return mixed
     */
    public function profileSave(){
        if (Request::isMethod('post')){
            $data = Input::all();
            //print_r($data);
            $rules = array(
                'name'          => 'required|min:4',
                'first_name'    => 'required|min:4',
                'user'          => 'required|max:20',
                'email'         => 'required|max:50',
            );

            if ($data['password'] != "") {
                $rules2 = array('password' => 'required|min:8', 'password_again' => 'required|same:password');
                $rules = array_merge($rules, $rules2);
            }

            $validator = Validator::make($data,$rules);
            if($validator->passes()){



                $user = User::find(Input::get('id'));
                $user->name         = $data['name'];
                $user->first_name   = $data['first_name'];
                $user->user         = $data['user'];
                $user->email        = $data['email'];
                if ($data['password'] != "") {
                    $user->password =  Hash::make($data['password']);
                }
                $user->save();

                Flash::success('Datos actualizados');
                return Redirect::back()->withInput();

            }else{
                Flash::error('Verifica los siguientes Errores.');
                return Redirect::back()->withInput()->withErrors($validator->messages());
            }





        }
    }



    public function changePassword($id){
        return View::make('users.change')->with('id', $id);
    }


    public function savePassword(){
        $data=Input::all();
        if (Request::isMethod('post')){
            $rules = array(
                'Contraseña' => 'required|min:8',
                'Verifica' => 'required|same:Contraseña');

            $validator = Validator::make($data,$rules);



            if($validator->passes()){
                $user = User::find(Input::get('id'));
                $user->password =  Hash::make($data['Contraseña']);
                Flash::success('Datos actualizados');
                return Redirect::back()->withInput();
            }else{
                Flash::error('Verifica los siguientes errores');
                return Redirect::back()->withInput()->withErrors($validator->messages());
            }


        }


    }



    public function prueba(){
        $users = User::orderBy('id', 'desc')->paginate(15);
        if(Request::ajax()){

            $query = empty($_GET['query'])? '' :$_GET['query'];
            if($query != ""){
                //$where = where('name', 'LIKE', "%".$query."%");
            }
            $users = User::where('name', 'LIKE', "".$query."%")->orderBy('id', 'desc')->paginate(15);
                //var_dump($_GET);
            $renderPagination = View::make('users.lista')->with('user', $users)->render();
            return Response::json(array('renderPagination' => $renderPagination));

        }
        else {
            return View::make('users.prueba')->with('user', $users);
        }



    }

}