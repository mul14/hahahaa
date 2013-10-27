<?php

class UserController extends \BaseController
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        Event::fire('tasks.create');
        $users = $this->user->paginate();
        return View::make('users.index', compact('users'));
    }

    public function create()
    {
        return View::make('users.create');
    }

    public function store()
    {
        // $input = Input::all();

        // $rules = [
        //     ['username' => 'required']
        // ];

        // $validator = Validator::make($input, $rules);

        // try {
        //     if ($validator->passes()) return 'Pass';
        //     if ($validator->fails()) return 'fail';

        //     $this->user->validate();

        // } catch (Exception $e) {
        //     return $e;
        // }

        // $user = User::find(1);
        $user = (object) ['email' => 'mul14.net@gmail.com', 'name' => 'Mulia Arifandy Nasution'];

        // Event ini di-register-kan di app/observers.php
        Event::fire('users.create', $user);

        // Redirect::back()->with('flash_message');
    }

    public function show($id)
    {
        $user = $this->user->find($id);
        return View::make('users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = $this->user->find($id);
        return View::make('users.edit', compact('user'));
    }

    public function update($id)
    {

    }

    public function destroy($id)
    {

    }

    public function login()
    {
        return View::make('users.login');
    }

    public function auth()
    {
        $input['email'] = Input::get('email');
        $input['password'] = Input::get('password');

        $auth = Auth::attempt($input);

        if ($auth) {
            $user = $this->user->where('email', $input['email'])->first();

            // dd($user);
            Auth::login($user);

            return Redirect::intended('/');
        }

        return Redirect::back()->withInput();
    }

    public function logout()
    {
        Auth::logout();
        return Redirect::home();
    }

    public function profile()
    {
        dd(Auth::user()->toArray());
    }
}
