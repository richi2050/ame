<?php

class ProductController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /product
	 *
	 * @return Response
	 */
	public function index()
	{
		$producto = Product::orderBy('id', 'desc')->paginate(5);
        return View::make('products.index')->with('producto', $producto);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /product/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('products.create');
	}



    public function save(){
        if (Request::isMethod('post')){
            $data = Input::all();

            $rules = array(
                'nombre'          => 'required|min:4|unique:products,name',
                'descripcion'    => 'required|max:200',
            );
            $validator = Validator::make($data,$rules);

            if($validator->passes()) {
                $product = new Product();
                $product->name = $data['nombre'];
                $product->description= $data['descripcion'];
                $product->actived      = $data['Activación'];

                $product->save();
                Flash::success('Datos actualizados');
                return Redirect::back()->withInput();

            }
            else{
                Flash::error('Verifica los siguientes Errores.');
                return Redirect::back()->withInput()->withErrors($validator->messages());
            }

        }
    }

	/**
	 * Store a newly created resource in storage.
	 * POST /product
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /product/{id}
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
	 * GET /product/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $producto = Product::find($id);
        return View::make('products.edit')->with('datos', $producto);

    }

	/**
	 * Update the specified resource in storage.
	 * PUT /product/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update()
	{

        if (Request::isMethod('post')){
            $data = Input::all();

            $rules = array(
                'name'          => 'required|min:4',
                'description'    => 'required|max:200',
            );
            $validator = Validator::make($data,$rules);

            if($validator->passes()) {
                $product = Product::find(Input::get('id'));
                $product->name = $data['name'];
                $product->description= $data['description'];
                $product->actived      = $data['Activación'];

                $product->save();
                Flash::success('Datos actualizados');
                return Redirect::back()->withInput();

            }
            else{
                    Flash::error('Verifica los siguientes Errores.');
                    return Redirect::back()->withInput()->withErrors($validator->messages());
                }

            }



		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /product/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{

        $product = Product::find($id);
        $product->actived = 0;
        $product->save();
        //$user->delete();
        /*if($user->delete){*/
        Flash::success('Dato eliminado');
        /*}else{
            Flash::error('Ocurrio algun problema al eliminar');
        }*/
        return Redirect::back();

	}

}