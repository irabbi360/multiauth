<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Mail;
use App\Notifications\UserRegisteredNotification;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            //generates a random string that is 20 characters long
            'token' => str_random(20)
        ]);

       /* $data['token']  = $user->token;

        Mail::send('mails.welcome', $data, function($message) use ($data)
        {
            $message->from('no-reply@site.com', "Site name");
            $message->subject("Welcome to site name");
            $message->to($data['email']);
        });


        return $user;*/
    }

    protected function registered(Request $request, $user) {
        $user->notify(new UserRegisteredNotification($user));
    }

   /* protected function register(Request $request){
        $input = $request->all();
        $validator = $this->validator($input);

        if ($validator->passes()) {
            $data = $this->create($input)->toArray();

            $data['token'] = str_random(25);

            $user = User::find($data['id']);
            $user->token = $data['token'];
            $user->save();

        //    Mail::send('mails.confirmation', $data, function ($message) use($data){
            Mail::send('mails.confirmation', $data, function ($message) use($data){
               $message->to($data['email']);
               $message->subject('Registration Confirmation');
            });
            return redirect(route('login'))->with('status', 'Confirmation email has been send. Please check your email');
        }
        return redirect(route('login'))->with('status', $validator->errors());
    }

    public function confirmation($email, $token) {
    //    $user = User::where('token', $token)->first();
        $user = new User;
        $the_user = $user->select()->where('email', '=', $email)->where('token', '=', $token->get);

        if (!is_null($the_user)) {
            $user->confirmed = 1;
            $user->token = '';
            $user->save();
            return redirect(route('login'))->with('status', 'Your account is actived');
        }
        return redirect(route('login'))->with('status', 'Something went wrong !!!');
    }*/

//    public function postRegister(Request $request) {
//        $rules = [
//            'name' => 'required|string|max:255',
//            'email' => 'required|string|email|max:255|unique:users',
//            'password' => 'required|string|min:6|confirmed',
//        ];
//
//        $message = [
//            'name.required' => 'Name required',
//        ];
//
//        $validator = Validator::make($request->all(), $rules, $message);
//
//        if ($validator->fails()) {
//            return $this->redirect('auth/register')->withErrors($validator)->withInput();
//        }
//        else {
//            $user = new User;
//            $user->name = $request->name;
//            $user->email = $request->email;
//            $user->password = $request->password;
//            $user->remember_token = str_random(100);
//            $user->confirm_token = str_random(100);
//            $user->save();
//
//            return redirect('auth/register');
//        }
//    }
}
