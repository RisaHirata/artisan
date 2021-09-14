<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Profile;

class ProfileController extends Controller
{
    public function add()
    {
        return view('admin.profile.create');
    }
    
    public function create(Request $request)
  {

      $this->validate($request, Profile::$rules);

      $profile = new Profile;
      $form = $request->all();

      unset($form['_token']);
     
      // データベースに保存する
      $profile->fill($form);
      $profile->save();

      return redirect('admin/profile/create');
  }

  public function edit(Request $request)
  {
      $profile = profile::find($request->id);
      if (empty($profile)) {
        abort(404);    
      }
      return view('admin.profile.edit', ['news_form' => $profile]);
  }


  public function update(Request $request)
  {
      // Validationをかける
      $this->validate($request, profile::$rules);
      // News Modelからデータを取得する
      $profile = profile::find($request->id);
      // 送信されてきたフォームデータを格納する
      $profile_form = $request->all();
      unset($profile_form['_token']);

      // 該当するデータを上書きして保存する
      $profile->fill($profile_form)->save();

      return redirect('admin/profile');
  }
}


