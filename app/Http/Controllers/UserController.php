<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Yajra\DataTables\DataTables;


class userController extends Controller
{

   public function index()
   {
      if (Auth::user()->is_admin == "1") {
         return View::make('user.listuser');
      } else {
         return View::make('product.index');
      }
   }

   public function getuserdatatable(request $request)
   {
      $data = User::select(
         'id',
         'name',
         'email',
         'password',
         'is_admin',
         'created_at',
         'updated_at',
      );
      $datatable = DataTables::of($data)
         ->editColumn('is_admin', function ($data) {
            return $data->is_admin == 1 ? 'admin' : 'customer';
         })
         ->editColumn('updated_at', function ($data) {
            return date_format(date_create($data->updated_at), 'd-M-Y H:i:s');
         })
         ->addColumn('action', function ($data) {
            return '<a href="" class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" role="button" data-toggle="dropdown">
         <i class="dw dw-more"> </i></a>
         <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
         <a class="dropdown-item "   aria-hidden="true" href="users/edituser/' . Crypt::encrypt($data->id) . '" type="button"><i class="icon-copy fa fa-edit" aria-hidden="true">  </i> Edit  </a> 
         <a class="dropdown-item "  aria-hidden="true" href=""  data-toggle="modal" data-target="#exampleModalAMx' . $data->id . 'c41" type="button"> <i class="icon-copy fa fa-trash-o" aria-hidden="true">   </i> Delete</a> 
         </div>
         <div class="modal fade bd-example-modal-sm" id="exampleModalAMx' . $data->id . 'c41" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
               <div class="modal-content">
                  <div class="modal-body text-center font-18">
                     <h4 class="padding-top-30 mb-30 weight-500">Are you sure you want to delete?</h4>
                     <div class="padding-bottom-30 row">
						      <div class="col-6">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                        <div class="col-6"> 
                           <a type="button" class="btn btn-danger" href="users/deleteuser/' . Crypt::encrypt($data->id) . '">Delete</a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div> ';
         })
         ->rawColumns(['action'])
         ->make(true);
      return $datatable;
   }

   public function insertuser(Request $datauser)
   {
      $datauser->validate([
         'name' => 'required',
         'email' => 'email',
         'password' => 'required|min:6|max:18',
         'conf_password' => 'required_with:password|same:password'
      ]);
      $checkemail = DB::connection('mysql')->table('users')->where('email', $datauser->email)->first();
      if ($checkemail  == null) {
         $user = new User();
         $user->name = $datauser->name;
         $user->email = $datauser->email;
         $user->is_admin = 2;
         $user->created_at =  date('Y-m-d H:i:s');
         $user->updated_at =  date('Y-m-d H:i:s');
         $user->password =  Hash::make($datauser->password);
         $user->save();
         Session::flash('success', 'user has been created');
         return  redirect()->route('users');
      } else {
         $datauser->validate([
            'email' => 'max:1',
         ]);
      }
   }
   public function edituser($index)
   {
      $user_id = Crypt::decrypt($index);
      $data = DB::connection('mysql')->table('users')->where('id', $user_id)->get();
      return View::make('user.edituser')->with('data', $data);
   }
   public function changeuser_password($index)
   {
      $user_id = Crypt::decrypt($index);
      $data = DB::connection('mysql')->table('users')->where('id', $user_id)->get();
      return View::make('user.changepassword')->with('data', $data);
   }

   public function updatepassword(Request $dataEdit)
   {
      $dataEdit->validate([
         'name' => 'required',
         'password' => 'required|min:6|max:18',
         'conf_password' => 'required_with:password|same:password'
      ]);
      DB::connection('mysql')->table('users')->where('id', $dataEdit->id)->update([
         'name' => $dataEdit->name,
         'updated_at' => date('Y-m-d H:i:s'),
         'password' => Hash::make($dataEdit->password),
      ]);
      Session::flash('success', 'password has been updated');
      return redirect()->route('change_password', ['id' => Crypt::encrypt($dataEdit->id)]);
   }


   public function updateuser(Request $dataEdit)
   {
      if (Auth::user()->is_admin == '1') {
         $dataEdit->validate([
            'name' => 'required',
            'email' => 'email',
         ]);
         DB::connection('mysql')->table('users')->where('id', $dataEdit->id)->update([
            'name' => $dataEdit->name,
            'is_admin' => $dataEdit->is_admin,
            'updated_at' => date('Y-m-d H:i:s'),
         ]);
         Session::flash('success', 'user has been updated');
         return  redirect()->route('users');
      } else {
         Session::flash('danger', 'you dont have permission to change role');
         return  redirect()->route('product');
      }
   }

   public function deleteuser($index)
   {
      $user_id = Crypt::decrypt($index);
      $data = DB::connection('mysql')->table('users')->where('id', $user_id)->get();
      DB::connection('mysql')->table('users')->delete($user_id);
      Session::flash('danger', ' ' . $data[0]->email . '  has been deleted');
      return redirect()->route('users');
   }
}
