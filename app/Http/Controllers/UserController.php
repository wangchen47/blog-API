<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginPost;
use App\Repositories\Interfaces\UserInterface;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Validator;
use Laravel\Passport\HasApiTokens;


/**
 * @property UserInterface user
 */
class UserController extends Controller
{
  use HasApiTokens, Notifiable;

  public function __construct(UserInterface $user)
  {
    $this->user = $user;
  }

  public function register(Request $request)
    {
      $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:32',
        'password' => 'required|string|min:6',
      ],
      $message = [
        'required' => ':attribute不能为空',
        'string' => ':attribute必须为字符串',
        'max' => ':attribute最大不超过 :max。',
        'min'=> ':attribute最小为 :min。',
      ],
      $attributes = [
        'name' => '用户名',
        'password' => '密码',
      ]);

      if ($validator->fails()) {
        return redirect('register')
          ->withErrors($validator)
          ->withInput();
      }

      $name = $request->input('name');
      $password = $request->input('password');
      $query = User::create(['name' => $name, 'password' =>  sha1($password)]);

      return response()->json($query,200);
    }

    public function login(LoginPost $request)
    {
      $name = $request->input('name');
      $password = $request->input('password');

      $fauser = $this->user->findUserByName($name);

      //查询姓名是否注册
      if (!isset($fauser)) {
        return response()->json([
          'status' => 401,
          'message' => '姓名不存在',
          'type' => 'name'
        ]);
      }

      //验证密码
      $saltPassword = sha1($password);
      if ($fauser->password != $saltPassword) {
        return response()->json([
          'status' => 401,
          'message' => '姓名或密码错误',
          'type' => 'password'
        ]);
      }


      $token  = $fauser->createToken('token')->accessToken;

      return response()->json([
        'data' => $fauser,
        'token' => $token,
        'status' => 200

      ]);
    }
}
