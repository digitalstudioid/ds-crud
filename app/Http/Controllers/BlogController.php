<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Blog;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;

class BlogController extends Controller
{
    public function index() {
      // we need to show all data from "blog" table
      $blogs = Blog::all();
      // show data to our view
      return view('blog.index',['blogs' => $blogs]);
    }

    // edit data function
    public function editItem(Request $req) {
      $blog = Blog::find ($req->id);
      $blog->title = $req->title;
      $blog->description = $req->description;
      $blog->save();
      return response()->json($blog);
    }

    // add data into database
    public function addItem(Request $req) {
      $rules = array(
        'title' => 'required',
        'description' => 'required'
      );
      // for Validator
      $validator = Validator::make ( Input::all (), $rules );
      if ($validator->fails())
      return Response::json(array('errors' => $validator->getMessageBag()->toArray()));

      else {
        $blog = new Blog();
        $blog->title = $req->title;
        $blog->description = $req->description;
        $blog->save();
        return response()->json($blog);
      }
    }
    
    // delete item
    public function deleteItem(Request $req) {
      Blog::find($req->id)->delete();
      return response()->json();
    }
}