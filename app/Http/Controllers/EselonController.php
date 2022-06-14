<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Eselon;

class EselonController extends Controller
{
  function index()
  {
      return view('pages.master.eselon.index');
  }
  
  function data(Request $req)
  {
    $model = Eselon::select();
    return datatables($model->get())->toJson();
  }
}
