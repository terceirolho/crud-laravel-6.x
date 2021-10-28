<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateProductRequest;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdtadeProductRequest;

class ProductController extends Controller
{

  //dependencias
    protected $request;
    public function __construct(Request $request)
    {
        
        //instancia de request
        $this->request = $request;

        //aplica em todos metodos de controller
        //$this-> middleware('auth');

        //listagem de produtos publica
       /* $this-> middleware('auth')->only([
            'create', 'store'
        ]);*/
 

        //aderir exceçoes
        // $this-> middleware('auth')-> except([
        //     'index', 'show'
    
        // ]);
    }
   
   /** */

     //http://app-laravel.test/products
    public function index()
    {
        // passar uma string
       $teste =  123;
       $teste2 = 321;
       $teste3 = [1,2,3,4,5];
       $products = ['tv', 'sofa', 'forno', 'sofa'];

        return view('admin.pages.products.index', compact('teste', 'teste2', 'teste3', 'products'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.pages.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Requests\StoreUpdateProductRequest  $request
     * @return \Illuminate\Http\Response
     */

     //request cria um objeto request e joga pra dentro de request
    public function store(StoreUpdateProductRequest $request)
    {

        dd('ok');
        /*

        $request->validate([
           'name' => 'required|min:3|max:255', 
           'description' => 'nullable|min:3|max:10000', 
           'photo' => 'required|image', 
        ]);

        */

       //mostra dados da requisição
       // dd($request->all());

       //dd($request->only(['name_', 'description']));
       //dd($request->description_);
       //dd($request->name_);
       //dd($request->has('teste'));
       //dd($request->input('teste', 'default'));
       //dd($request->except('_token', 'name_'));
       
       if ($request->file('photo')->isValid()) {
           //fazer upload com patch

         //     dd($request->file('photo')->store('products'));
         $nameFile = $request->name . '.' . $request->photo->extension();
         //nome customizado
         dd($request->file('photo')->storeAs('products', $nameFile));

         }

    
          
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //http://app-laravel.test/products/create2
    public function show($id)
    {
        return "Detalhes do produto {$id}";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.pages.products.edit', compact ('id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     // vai apresentar o que ta dentro de edit
    public function update(Request $request, $id)
    {
        dd("editando o produto {$id}");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
