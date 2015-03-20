<?php
class UserController extends BaseController{
		
	
		
	function all(){
		$users = User::all();

		return View::make('users',['users' => $users]);

	}
	
	function specific($username){
		$user = User::whereUsername($username)->first();
		if($user==NULL)
			return "User Not Found";
		return $user->username;
	}




	function notifications(){
		if($user = $this->isLogged()){

			return View::make('usernotifications',['user' =>$user]);

		}
		  return Redirect::intended('./login');


	}
	function index(){

		if($user = $this->isLogged()){

		
			
			return View::make('usermain',['user' =>$user ]);
		
		}
		  return Redirect::intended('./login');



	}
	function links1(){

		if($user = $this->isLogged()){
			return View::make('userlinks',['user' =>$user]);

		} return Redirect::intended('./login');

	
	}
	function stats(){
		if($user = $this->isLogged()){
			return View::make('userstats',['user' =>$user]);
		}
		 return Redirect::intended('./login');


	}
	function profile(){

	$user = $this->isLogged();
			$userID = $this->toUserID($user->username);
			

			return View::make('userprofile',['user' =>$user]);
		
		
	}
	function profile1($message){

		if($user = $this->isLogged()){
			$userID = $this->toUserID($user->username);
		
			return View::make('userprofile',['message' =>$message, 'user' =>$user]);
		
		}
		 return Redirect::intended('./login');
	}
	function security(){
		if($user = $this->isLogged()){
			return View::make('usersecurity',['user' =>$user]);
		}
		 return Redirect::intended('./login');	
	}





		function  isLogged(){

		if(!Session::has('user') )
			return 0;

		$u  = Session::get('user');
		//echo "$u->username";
		//echo "$u->password";
		if($u == NULL)
			return 0;	
		$user = array(
        'username' => $u->username,
        'password' => $u->password

 		  );

		if (Auth::attempt($user)){
				
				if(Auth::check()){
					$user = User::whereUsername($u->username)->first();
					$user->password =  $u->password;
					return $user;

				}
			}
		
		return 0;

	}
function isUsernameAlreadyExits($username){
		$user = User::whereUsername($username)->first();
		if($user==NULL)
			return false;
		return true;


	}
	
	function isEmailAlreadyExits($email){
		$user = User::whereEmail($email)->first();
		if($user==NULL)
			return false;
		return true;


	}

	function toUserID($username){

		$user = User::whereUsername($username)->first();
			if($user==NULL)
				 return 0;
		return $user->ID;

	}
	function register(){
		try {
		
			
			$email = Input::get('email');
			$username = Input::get('username');
			$password = Input::get('password');
			$apassword = Input::get('rpassword');
			$message = "";
		

			if(empty($email) || empty($username) || empty($password) || empty($apassword) )
					throw new Exception("*fields are Mandotory");
			
			if($password != $apassword)
				throw new Exception("Both Password Not Matched");

			if($this->isUsernameAlreadyExits($username))
					throw new Exception("Username Already Registered");
			if($this->isEmailAlreadyExits($email))
					throw new Exception("Email Already Registered");
			else{
				
				
			
			
				

				$this->registerUser($username,$password,$email);
					
			return View::make('login',['message' => "You are Registered Sucess fully"]);
				
			}

			return View::make('register',['message' => $message,'username' => $username,'email' => $email]);
		}catch(Exception $e){
			$message = $e->getMessage();
			return View::make('register',['message' => $message,'username' => $username,'email' => $email ]);


		}


	}

function registerUser($username,$password,$email){
		
		
		$password = Hash::make($password);
                 $isAdmin = 0;
		User::insert(
                           
			array(
				'username' => $username,
				'password' => $password,
				'email' =>$email,
                                'isAdmin' =>$isAdmin
			)
		);
                
		

	}	

 
function logout(){
		
		Auth::logout();
		Session::flush();
		 return Redirect::intended('./login');
		
	}

	function login(){
		$username = Input::get('username');
		$password = Input::get('password');
		
		$user = array(
        'username' => Input::get('username'),
        'password' => Input::get('password')

 		  );   




		
		
		if (Auth::attempt($user,true)){
				
				if(Auth::check()){
					$user = User::whereUsername($username)->first();
					$user->password  = $password;
					Session::put('user', $user);
			
					
					  return Redirect::intended('user');

				}


			//	Auth::user()->login();
			//	 Auth::user()->lastLogin = Carbon::now();
			//	  Auth::user()->save();
				//return $email = Auth::user()->email;
			 
			}

			 return  View::make('login',['message' => "WRONG DETAILS"]);
			

	}

	function updatePersonel(){
			if($user = $this->isLogged()){
				$name = Input::get('name');
				$email = Input::get('email');
				
				if(!empty($name))
					User::where('id', $user->id)->update(array('name' => $name ));
				
				if(empty($email))
					return  $this->profile1("Email Field Cannot be Empty");

				if($email != $user->email && $this->isEmailAlreadyExits($email) )
				{

					return  $this->profile1("Email is already Registered with some other Account");
				}


				User::where('ID', $user->ID)->update(array('email' => $email ));


			return $this->profile1("Sucessfully Updated");

		}
		  return Redirect::intended('./login');



	}

	
	function updatePassword(){
			if($user = $this->isLogged()){

			$cpassword = Input::get('cpassword');
			$npassword = Input::get('npassword');
			$apassword = Input::get('rpassword');
				
			//	return "c : $cpassword n: n$npassword r:$apassword";
			if(empty($cpassword) || empty($npassword) || empty($apassword))
			return $this->profile1( "*Fields are Mandotory" );
			
			if($cpassword != $user->password)
				
				return	$this->profile1("*Current Password Not Matched" );
			
			if($apassword != $npassword)
				return	$this->profile1("*Both new Password Not Matched" );
			
			$npassword = Hash::make($npassword);

			User::where('id', $user->id)
			->update(array('password' => $npassword));
			
				
			return	$this->profile1("Password Update Sucessfully");
			
	

			return $this->profile();

		}
		  return Redirect::intended('./login');



	}



}

?>