<?php 

class UserController extends BaseController {
	
	public function login()
	{
		if($_POST)
		{
			$username = Input::get('username');
			$password = Input::get('password');
			$remember = Input::has('remember') ? true : false;
			$field = (strpos($username, '@') === false) ? 'username' : 'email';
			if(Auth::attempt( array($field => $username, 'password' => $password), $remember ))
			{
				notes::success('You have been logged in.');
			}
			else
			{
				notes::error('Wrong username or password.');
			}
		}
	}
	
	public function logout()
	{
		Auth::logout();
		notes::info('You have been logged out.');
		return Redirect::to('/');
	}
	
	public function signup()
	{
		$messages = new Illuminate\Support\MessageBag;
		if($_POST)
		{
			$values = array(
				'email' => Input::get('email'),
				'username' => Input::get('username'),
				'password' => Input::get('password')
			);
			$validator = Validator::make($values, array(
				'email' => array(
					'required',
					'email',
					'min:5',
					'max:50',
					'unique:users'
				),
				'username' => array(
					'required',
					'min:2',
					'max:30',
					'unique:users'
				),
				'password' => array(
					'required',
					'min:5',
					'max:50'
				)
			));
			
			if($validator->passes())
			{
				$user = new User;
				$user->username = Input::get('username');
				$user->email = Input::get('email');
				$user->password = Hash::make(Input::get('password'));
				$user->save();
				Auth::attempt(array(
					'username' => $user->username,
					'password' => Input::get('password')
				));
				notes::success('You have signed up. Welcome!');
				Redirect::to('/');
			}
			else
			{
				$messages = $validator->messages();
				notes::error('Whoops! The form contained errors. Please review it and submit again.');
			}
		}
		$this->bind('messages', $messages);
	}
	
}
