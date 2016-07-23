<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Repositories\ColaboradorRepository;
use App;
use Input;

class ColaboradorController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ColaboradorRepository $colaboradores)
    {
        $this->middleware('auth');
        
        $this->colaboradores = $colaboradores;
    }
    
    /**
     * Display a list of all of the user's task.
     *
     * @param  Request  $request
     * @return Response
     */
    public function index(Request $request)
    {
        $users = User::pluck('name', 'id');

        return view('colaboradores.index', [
            'colaboradores' => $this->colaboradores->forUser($request->user()),
            'users' => $users,
        ]);
    }
    
    public function preview(Request $request)
    {
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML('<h1>Test</h1>');
        return $pdf->download('invoice.pdf');
    }
   
   /**
    * Create a new task.
    *
    * @param  Request  $request
    * @return Response
    */
   public function store(Request $request)
   {
       $this->validate($request, [
           'nome' => 'required|max:255',
           //'codigo' => 'required|max:11|digits'
       ]);

       $request->user()->colaboradores()->create([
           'nome' => $request->nome,
           'codigo' => $request->input('usersList'),
       ]);

       return redirect('/colaboradores');
   }
   
    /**
    * Destroy the given task.
    *
    * @param  Request  $request
    * @param  Task  $task
    * @return Response
    */
   public function destroy(Request $request, Colaborador $colaborador)
   {
        $this->authorize('destroy', $colaborador);
        
        $colaborador->delete();

        return redirect('/colaboradores');
   }
}
