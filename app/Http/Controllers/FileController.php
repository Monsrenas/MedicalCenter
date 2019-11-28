<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
class FileController extends Controller
{
/**
* Update the avatar for the user.
*
* @param
Request
$request
* @return Response
*/
public function update(Request $request)
{ 
 $path = $request->photo->store();
 dd($path);
 dd(($request->hasFile($request->photo)));
 dd($request->file('photo')->isValid());
 $path = $request->photo->store('images','local');
 dd($path);
 return $path;
}
}