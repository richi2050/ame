<?php

class InsuranceController extends \BaseController
{

    /**
     * Display a listing of the resource.
     * GET /insurace
     *
     * @return Response
     */
    public function index()
    {
        $nacionalidad = array();
        $nacionalidad += array('0' => '-- Nacionalidad --');
        $nacionalidad += Nationalitie::getAll();

        $products = array();
        $products += array('0' => '-- Selecciona el producto --');
        $products += Product::getCombpro();

        $job = array();
        $job += array('0' => '-- Selecciona el ocupación --');
        $job += Job::getComboJob();

        return View::make('insurance.index')
            ->with('nacionalidad', $nacionalidad)
            ->with('products', $products)
            ->with('job', $job);
        //return View::make('insurance.index')->with(array('products',$products,'nacionalidad',$nacionalidad));

    }

    /**
     * Show the form for creating a new resource.
     * GET /insurace/create
     *
     * @return Response
     */
    public function create()
    {

        echo '<pre>';
        //print_r($_REQUEST);
        print_r(Input::all());
        echo'</pre>';
    }

    /**
     * Store a newly created resource in storage.
     * POST /insurace
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     * GET /insurace/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * GET /insurace/{id}/edit
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * PUT /insurace/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        //
    }



    /**
     * Remove the specified resource from storage.
     * DELETE /insurace/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    public function combo(){

        $form = '';
        $valor =$_REQUEST['valor'];
        for($i=1 ;$i<= $valor;$i++){
            //$form .='<input type="texto" name="ki[]">';
           $form .='<div class="panel panel-default" id="panel_'.$i.'">'.
                                                                    '<div class="panel-heading">'.
                                                                        '<h4 class="panel-title">'.
                                                                             '<a data-toggle="collapse" data-parent="#accordion" href="#collapse'.$i.'">' .
                                                                                  '<span class="glyphicon glyphicon-list-alt">'.
                                                                                  '</span> Datos del Asegurado ' . $i.
                                                                                  ' '.
                                                                              '</a>' .
                                                                               ''.
                                                                              '<span id="elimina" class="glyphicon glyphicon-remove"  data-flag="panel_'.$i.'" style="align:left;cursor:pointer;"> .</span> ' .
                                                                               ''.
                                                                        '</h4>'.
                                                                    '</div>'.
                                                                    '<div id="collapse'.$i.'" class="panel-collapse collapse">' .
                    
                                                                       '<div class="panel-body">' .
                                                                        
                                                                                     '           <input type="text" name="ricardoluog[]" id="ricardoluog">' .
                '<input type="text" name="lname">'.
                    
                    
                                                                       '</div>'.
                                                                    '</div>'.
                                                                 '</div>';

        }
        
       
                            
        //var_dump($form);
        
                        
        return $form;
    }


}