<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Model\Role;
use App\Model\UserSkill;
use App\Model\UserExp;
use App\Model\UserEdu;
use App\Model\UserPortfolio;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

   /********************************************************************
    * 
	*  Users Controller
	*  Handels all User functionality on the website.
	* 
	*/

class UsersController extends Controller
{
	
    /*******************************************************************
     * 
     * Create a new controller instance.
     *
     * @return void
     * 
     */
    public function __construct()
    {
        $this->middleware('auth',
								['except' =>[
									'forgotPassword','resetForgotPassword','updateForgotPassword'
									]
								]);
    }
    
    /*******************************************************************
     * 
     * Taking all users to their dashboards.
     *
     */
    public function index()
    {
		$data = [];
		$user = Auth::user();
		
		//udating username
		if($user && $user->username == null){
			DB::table('users')
					->where('users.id',$user->id)
					->update([
								'username' => $user->name.'-'.$user->id,
							]);
		}
		
		if($user->role_id == 10){
			//for admin.
			$data['user'] = $user; 
			$data['users'] = DB::table('users')->count();
			
			return view('user.adminHome',compact('data'));
		}elseif($user->role_id == 15){
			//for public users.
			
			return view('user.publicUserHome',compact('data'));
		}elseif($user->role_id == 25){
			//for user.
			return view('user.userHome',compact('data'));
		}else{
			abort(404);
		}
    }
    
    /*******************************************************************
     * 
     * Add user.
     *
     */
    public function addUser(Request $request)
    {
		$user = Auth::user();
		if($user->role_id == 10){
			
			if ($request->isMethod('post')){
				$this->validate(request(), [
					'name' => ['required', 'string', 'max:255'],
					'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
					'password' => ['required', 'string', 'min:8', 'confirmed'],
				]);
				$role_id = request('role_id');
				if($role_id == 0){
					$role_id = 15;
				}
				$user = new User;    
				$user->name = request('name');
				$user->role_id = $role_id;
				$user->email = request('email');
				$user->is_approved = 1;
				$user->is_blocked = 0;
				$user->is_deleted = 0;
				$user->password = Hash::make(request('password'));
				$user->email_verified_at = date('Y-m-d h:i:s');
				$user->created_at = date('Y-m-d h:i:s');
				$user->updated_at = date('Y-m-d h:i:s');
				
				$user->save();
				return redirect('/admin/all/users')->with('success','User added successfully!');   
			}
			$data['user'] = $user;
			$data['roles'] = DB::table('roles')->get();
			return view('user.add', compact('data'));
		}else{
			abort(404);
		}
    }
    
    /*******************************************************************
     * 
     * View for all users.
     *
     */
    public function allUsers(Request $request)
    {
		$user = Auth::user();
		if($user->role_id == 10){
			return view('user.index');
		}else{
			abort(404);
		}
    }
    
    /*******************************************************************
     * 
     * Edit/Profile view for all users.
     * Step - 1
     *
     */
    public function view(Request $request ,$id)
    {
		$user = Auth::user();
		if($user->role_id == 10){
			$data['user'] = User::findOrFail($id);
			$data['user']->role = $this->getUserRole($data['user']->role_id);
			$data['templates'] = DB::table('templates')->get();
			return view('user.view',compact('data'));
		}else{
			abort(404);
		}
    }
    
    /*******************************************************************
     * 
     * Edit/Profile view for all users.
     * Step - 2
     *
     */
    public function step2(Request $request ,$id)
    {
		$user = Auth::user();
		if($user->role_id == 10){
			$data['user'] = User::findOrFail($id);
			$data['user']->role = $this->getUserRole($data['user']->role_id);
			$data['user_skills'] = DB::table('user_skills')
										->where('user_id',$id)	
										->get();
			return view('user.step2',compact('data'));
		}else{
			abort(404);
		}
    }
    
    /*******************************************************************
     * 
     * Edit/ My Profile view for all users.
     * Step - 2
     *
     */
    public function myProfileStep2(Request $request)
    {
		$user = Auth::user();
		$user_role = [10,25];
		if(in_array($user->role_id, $user_role)){
			$id = $user->id;
			$data['user'] = User::findOrFail($id);                       
			$data['user']->role = $this->getUserRole($data['user']->role_id);
			$data['user_skills'] = DB::table('user_skills')
										->where('user_id',$id)	
										->get();
			return view('user.myProfileStep2',compact('data'));
		}else{
			abort(404);
		}
    }
    /*******************************************************************
     * 
     * Edit/Profile view for all users.
     * Step - 3
     *
     */
    public function step3(Request $request ,$id)
    {
		$user = Auth::user();
		if($user->role_id == 10){
			$data['user'] = User::findOrFail($id);
			$data['user']->role = $this->getUserRole($data['user']->role_id);
			$data['user_exp'] = DB::table('user_work_exp')
										->where('user_id',$id)	
										->get();
			$data['user_edu'] = DB::table('user_education')
										->where('user_id',$id)	
										->get();
			return view('user.step3',compact('data'));
		}else{
			abort(404);
		}
    }
    /*******************************************************************
     * 
     * Edit/ My Profile view for all users.
     * Step - 3
     *
     */
    public function myProfileStep3(Request $request)
    {
		$user = Auth::user();
		$user_role = [10,25];
		if(in_array($user->role_id, $user_role)){
			$id = $user->id;
			$data['user'] = User::findOrFail($id);
			$data['user']->role = $this->getUserRole($data['user']->role_id);
			$data['user_exp'] = DB::table('user_work_exp')
										->where('user_id',$id)	
										->get();
			$data['user_edu'] = DB::table('user_education')
										->where('user_id',$id)	
										->get();
			return view('user.myProfileStep3',compact('data'));
		}else{
			abort(404);
		}
    }
    /*******************************************************************
     * 
     * Edit/Profile view for all users.
     * Step - 4
     *
     */
    public function step4(Request $request ,$id)
    {
		$user = Auth::user();
		if($user->role_id == 10){
			$data['user'] = User::findOrFail($id);
			$data['user']->role = $this->getUserRole($data['user']->role_id);
			$data['user_portfolio'] = DB::table('user_portfolio')
											->where('user_id',$id)	
											->get();
			return view('user.step4',compact('data'));
		}else{
			abort(404);
		}
    }
    
    /*******************************************************************
     * 
     * Edit/ My Profile view for all users.
     * Step - 4
     *
     */
    public function myProfileStep4(Request $request )
    {
		$user = Auth::user();
		$user_role = [10,25];
		if(in_array($user->role_id, $user_role)){
			$id = $user->id;
			$data['user'] = User::findOrFail($id);
			$data['user']->role = $this->getUserRole($data['user']->role_id);
			$data['user_portfolio'] = DB::table('user_portfolio')
											->where('user_id',$id)	
											->get();
			return view('user.myProfileStep4',compact('data'));
		}else{
			abort(404);
		}
    }
    
    /*******************************************************************
     * 
     * Edit/Profile view for all users.
     * Step - 5
     *
     */
    public function step5(Request $request ,$id)
    {
		$user = Auth::user();
		if($user->role_id == 10){
			$data['user'] = User::findOrFail($id);
			$data['user']->role = $this->getUserRole($data['user']->role_id);
			$data['user_contracts'] = DB::table('user_contracts')
											->where('user_to',$id)
											->join('users','users.id','user_contracts.user_from')
											->select('user_contracts.*','users.name as to_name')
											->orderBy('created_at','ASC')
											->get();
			return view('user.step5',compact('data'));
		}else{
			abort(404);
		}
    }
    
    /*******************************************************************
     * 
     * Edit/ My Profile view for all users.
     * Step - 5
     *
     */
    public function myProfileStep5(Request $request)
    {
		$user = Auth::user();
		$user_role = [10,25];
		if(in_array($user->role_id, $user_role)){
			$id = $user->id;
			$data['user'] = User::findOrFail($id);
			$data['user']->role = $this->getUserRole($data['user']->role_id);
			$data['user_contracts'] = DB::table('user_contracts')
											->where('user_to',$id)
											->join('users','users.id','user_contracts.user_from')
											->select('user_contracts.*','users.name as to_name')
											->orderBy('created_at','ASC')
											->get();
			return view('user.myProfileStep5',compact('data'));
		}else{
			abort(404);
		}
    }
    
    /*******************************************************************
     * 
     * Get the user roles.
     *
     */
    public function getUserRole($role_id)
    {
		$data = DB::table('roles')
						->where('id','=',$role_id)
						->first();
		return $data;
	}
    
    /*******************************************************************
     * 
     * My Profile for all users.
     *
     */
    public function myProfile(Request $request)
    {
		$user = Auth::user();
		$user_role = [10,15,25];
		if(($user != null) && (in_array($user->role_id, $user_role))){
			$data['user'] = User::findOrFail($user->id);
			$data['user']->role = $this->getUserRole($data['user']->role_id);
			$data['templates'] = DB::table('templates')->get();
			return view('user.myProfile',compact('data'));
		}else{
			abort(404);
		}
    }
    
    /*******************************************************************
     * 
     * Update user Profile - admin for all users.
     *
     */
    public function updateUser(Request $request, $id)
    {
		$user = Auth::user();
		if($user->role_id == 10){
			if(request('email')){
				$this->validate($request, array(
					'name' => 'required',
					'email' => 'required',
					'phone' => 'required',
				));
				$user = User::findOrFail($id);
				$block_user = request('block_user');
				$approve_user = request('approve_user');
				
				if($block_user == null){
					$block_user = 1;
				}else{
					$block_user = 0;
				}
				if($approve_user == null){
					$approve_user = 0;
				}else{
					$approve_user = 1;
				}
				
				$user->name = request('name');
				$user->phone = request('phone');
				$user->dob = request('dob');
				$user->address = request('address');
				$user->language = request('language');
				$user->template_id = request('template_id');
				$user->obj = request('obj');
				$user->desc = request('desc');
				$user->website = request('web');
				$user->position = request('pos');
				$user->is_blocked = $block_user;
				$user->is_approved = $approve_user;
				$user->updated_at = date('Y-m-d h:i:s');
				$user->save();
			}
			
			if(request('name_1')){
				DB::table('user_skills')
									->where('user_id',$id)	
									->delete();
				for ($i = 1; $i <= 15; $i++) {
					if(request('name_'.$i)){
						$skill = new UserSkill;
						$skill->name = request('name_'.$i);
						$skill->user_id = $id;
						$skill->exp_rating = request('exp_rating_'.$i);
						$skill->created_at = date('Y-m-d h:i:s');
						$skill->updated_at = date('Y-m-d h:i:s');
						$skill->save();
					}
				}
			}
			
			if(request('w_name_1')){
				DB::table('user_work_exp')
									->where('user_id',$id)	
									->delete();
				for ($i = 1; $i <= 15; $i++) {
					if(request('w_name_'.$i)){
						$userExp = new UserExp;
						$userExp->name = request('w_name_'.$i);
						$userExp->user_id = $id;
						$userExp->position = request('position_'.$i);
						$userExp->duration = request('duration_'.$i);
						$userExp->desc = request('desc_'.$i);
						$userExp->created_at = date('Y-m-d h:i:s');
						$userExp->updated_at = date('Y-m-d h:i:s');
						$userExp->save();
					}
				}
			}
			
			if(request('e_name_1')){
				DB::table('user_education')
									->where('user_id',$id)
									->delete();
				for ($i = 1; $i <= 15; $i++) {
					if(request('e_name_'.$i)){
						$userEdu = new UserEdu;
						$userEdu->name = request('e_name_'.$i);
						$userEdu->user_id = $id;
						$userEdu->position = request('position_'.$i);
						$userEdu->duration = request('duration_'.$i);
						$userEdu->desc = request('desc_'.$i);
						$userEdu->created_at = date('Y-m-d h:i:s');
						$userEdu->updated_at = date('Y-m-d h:i:s');
						$userEdu->save();
					}
				}
			}
			
			if(request('p_name_1')){
				DB::table('user_portfolio')
									->where('user_id',$id)
									->delete();
				for ($i = 1; $i <= 15; $i++) {
					if(request('p_name_'.$i)){
						$portfolio = new UserPortfolio;
						if($request->hasFile('image_'.$i)){
							$request->validate([
								"'image_'.$i.'" => "mimes:jpeg,png,jpg,gif,svg|max:2048",
							]);
							$image = 'image_'.$i;
							$file = $request->$image;
							$fileName = time().'.'.$file->getClientOriginalExtension();
							
							// check and replace the file if already exists will go here.
							//~ dd($fileName);
							
							$file->move(public_path('images/portfolio/'), $fileName);
							$portfolio->image = $fileName;
						}
						
						$portfolio->name = request('p_name_'.$i);
						$portfolio->user_id = $id;
						
						$portfolio->desc = request('desc_'.$i);
						$portfolio->created_at = date('Y-m-d h:i:s');
						$portfolio->updated_at = date('Y-m-d h:i:s');
						$portfolio->save();
					}
				}
			}
			
			return back()->with('success','Data Updated Successfully!');
		}else{
			abort(404);
		}
    }
    
    /*******************************************************************
     * 
     * Update My Profile for all users.
     *
     */
    public function updateMyProfile(Request $request, $id)
    {
		$user = Auth::user();
		$user_role = [10,15,25];
		if(($user != null) && (in_array($user->role_id, $user_role))){
			$id = $user->id;
			if(request('email')){
				$this->validate($request, array(
					'name' => 'required',
				));
				
				$user = User::findOrFail($id);
				$block_user = request('block_user');
				$approve_user = request('approve_user');
				
				if($block_user == null){
					$block_user = 1;
				}else{
					$block_user = 0;
				}
				if($approve_user == null){
					$approve_user = 0;
				}else{
					$approve_user = 1;
				}
				
				$user->name = request('name');
				$user->phone = request('phone');
				$user->dob = request('dob');
				$user->address = request('address');
				$user->language = request('language');
				$user->template_id = request('template_id');
				$user->obj = request('obj');
				$user->desc = request('desc');
				$user->website = request('web');
				$user->position = request('pos');
				$user->is_blocked = $block_user;
				$user->is_approved = $approve_user;
				$user->updated_at = date('Y-m-d h:i:s');
				$user->save();
			}
			
			if(request('name_1')){
				DB::table('user_skills')
									->where('user_id',$id)	
									->delete();
				for ($i = 1; $i <= 15; $i++) {
					if(request('name_'.$i)){
						$skill = new UserSkill;
						$skill->name = request('name_'.$i);
						$skill->user_id = $id;
						$skill->exp_rating = request('exp_rating_'.$i);
						$skill->created_at = date('Y-m-d h:i:s');
						$skill->updated_at = date('Y-m-d h:i:s');
						$skill->save();
					}
				}
			}
			
			if(request('w_name_1')){
				DB::table('user_work_exp')
									->where('user_id',$id)	
									->delete();
				for ($i = 1; $i <= 15; $i++) {
					if(request('w_name_'.$i)){
						$userExp = new UserExp;
						$userExp->name = request('w_name_'.$i);
						$userExp->user_id = $id;
						$userExp->position = request('position_'.$i);
						$userExp->duration = request('duration_'.$i);
						$userExp->desc = request('desc_'.$i);
						$userExp->created_at = date('Y-m-d h:i:s');
						$userExp->updated_at = date('Y-m-d h:i:s');
						$userExp->save();
					}
				}
			}
			
			if(request('e_name_1')){
				DB::table('user_education')
									->where('user_id',$id)
									->delete();
				for ($i = 1; $i <= 15; $i++) {
					if(request('e_name_'.$i)){
						$userEdu = new UserEdu;
						$userEdu->name = request('e_name_'.$i);
						$userEdu->user_id = $id;
						$userEdu->position = request('position_'.$i);
						$userEdu->duration = request('duration_'.$i);
						$userEdu->desc = request('desc_'.$i);
						$userEdu->created_at = date('Y-m-d h:i:s');
						$userEdu->updated_at = date('Y-m-d h:i:s');
						$userEdu->save();
					}
				}
			}
			
			if(request('p_name_1')){
				DB::table('user_portfolio')
									->where('user_id',$id)
									->delete();
				for ($i = 1; $i <= 15; $i++) {
					if(request('p_name_'.$i)){
						$portfolio = new UserPortfolio;
						if($request->hasFile('image_'.$i)){
							$request->validate([
								"'image_'.$i.'" => "mimes:jpeg,png,jpg,gif,svg|max:2048",
							]);
							$image = 'image_'.$i;
							$file = $request->$image;
							$fileName = time().'.'.$file->getClientOriginalExtension();
							
							// check and replace the file if already exists will go here.
							//~ dd($fileName);
							
							$file->move(public_path('images/portfolio/'), $fileName);
							$portfolio->image = $fileName;
						}
						
						$portfolio->name = request('p_name_'.$i);
						$portfolio->user_id = $id;
						
						$portfolio->desc = request('desc_'.$i);
						$portfolio->created_at = date('Y-m-d h:i:s');
						$portfolio->updated_at = date('Y-m-d h:i:s');
						$portfolio->save();
					}
				}
			}
			
			
			return back()->with('success','Data Updated Successfully!');
		}else{
			abort(404);
		}
    }
    
    /*******************************************************************
     * 
     * Reset any user Password for admin.
     *
     */
    public function resetUserPassword(Request $request, $id)
    {
        $user = Auth::user();
        if($user->role_id == 10){
			$user = User::findOrFail($id);
			$data['user'] = $user;
			$data['user']->role = $this->getUserRole($data['user']->role_id);
        	return view('user.resetUserPassword', compact('user','data'));
		}else{
			abort(404);
		}
    }
    
    /*******************************************************************
     * 
     * Reset Password for my profile.
     *
     */
    public function resetPassword()
    {
        $user = Auth::user();
        $user_role = [10,15,25];
		if(($user != null) && (in_array($user->role_id, $user_role))){
			$data['user'] = $user;
			$data['user']->role = $this->getUserRole($data['user']->role_id);
        	return view('user.myProfileResetPassword', compact('user','data'));
		}else{
			abort(404);
		}
    }
    
    /*******************************************************************
     * 
     * Update User Password - admin for all users.
     *
     */
    public function updateUserPassword(Request $request, $id)
    {
		$user = Auth::user();
        if($user->role_id == 10){
			$user = User::findOrFail($id);
			$this->validate(request(), [
				'password' => ['required', 'string', 'min:6', 'confirmed'],
			]);
			
			$user->password = Hash::make(request('password'));

			$user->save();
			return back()->with('success','User Profile Updated Successfully!');
        }else{
			abort(404);
		}
    } 
    
    /*******************************************************************
     * 
     * Update Password from my profile for all users.
     *
     */
    public function updatePassword(Request $request, $id)
    {
		$user = Auth::user();
        $user_role = [10,15,25];
		if(($user != null) && (in_array($user->role_id, $user_role))){
			$this->validate(request(), [
				'password' => ['required', 'string', 'min:6', 'confirmed'],
			]);
			
			$user->password = Hash::make(request('password'));

			$user->save();
			Auth::logout();
			return redirect('/login');
        }else{
			abort(404);
		}
    } 
    
    /*******************************************************************
     * 
     * Forgot Password for all users.
     *
     */
    public function forgotPassword(Request $request)
    {
		if ($request->isMethod('post')){
			$this->validate(request(), [
				'email' => ['required'],
			]);
			
			$email = request('email');
			$data['user'] = DB::table('users')
								->where('email','=',$email)
								->first();
			//~ dd($data);
			if($data['user'] != null){
				$random_string1 = md5(uniqid(rand(), true));
				$random_string2 = md5(uniqid(rand(), true));
				$random_string3 = md5(uniqid(rand(), true));
				$random_string4 = md5(uniqid(rand(), true));
				$random_string = $random_string1.$random_string2.$random_string3.$random_string4;
				$data['user'] = DB::table('users')
										->where('email', $email)
										->update([
											'password_reset_token' => $random_string,
											'updated_at' => date('Y-m-d H:i:s')
										]);
				
				//send password reset link in email.
				
				
				return redirect('/login')->with('success','Please check your email for password reset link.');
			}else{
				return back()->with('error','Please check your email and try again.');
			}
        }else{
			abort(404);
		}
    } 
    
    /*******************************************************************
     * 
     * Reset Forgot Password for all users.
     *
     */
    public function resetForgotPassword(Request $request,$string)
    {
		if ($string){
			$data['user'] = DB::table('users')
								->where('password_reset_token','=',$string)
								->first();
			if($data['user'] != null){
				
				$date1 = strtotime($data['user']->updated_at);
				$date2 = strtotime(date('Y-m-d H:i:s'));
				
				$diff = abs($date2 - $date1);  
				$years = floor($diff / (365*60*60*24)); 
				$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24)); 
                $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));               
				$hours = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24)/ (60*60)); 
				if($hours < 2){
					$data['string'] = $string;
					return view('auth.passwords.reset', compact('data'));
				
				}else{
					return redirect('/login')->with('error','Sorry your link has been expired, Please try again.');
				}
			}else{
				return back()->with('error','Sorry your link has been expired, Please try again.');
			}
        }else{
			abort(404);
		}
    }
    
    /*******************************************************************
     * 
     * Reset Forgot Password for all users.
     *
     */
    public function updateForgotPassword(Request $request)
    {
		if ($request->isMethod('post')){
			$string = request('string');
			$data['user'] = DB::table('users')
								->where('password_reset_token','=',$string)
								->first();
			if($data['user'] != null){
				$data['string'] = $string;
				$this->validate(request(), [
					'password' => ['required', 'string', 'min:8', 'confirmed'],
				]);
				$user = User::findOrFail($data['user']->id);
				
				$user->password = Hash::make(request('password'));
				$user->password_reset_token = null;
				$user->save();
				
				return redirect('/login')->with('success','Your password has been reset successfully.');
				
			}else{
				return redirect('/login')->with('error','Sorry your link has been expired or changed, Please try again.');
			}
        }else{
			abort(404);
		}
    }
    
    /*******************************************************************
     * 
     * Users Datatable.
     *
     */
    public function usersDatatable(Request $request)
    {
		$user = Auth::user();
		if($user->role_id == 10){
			$users = DB::table('users')
								->orderby('users.id','DESC')
								->join('roles','roles.id','=','users.role_id')
								->select('users.*','roles.name as r_name')
								->get();
			return Datatables::of($users)
				->addColumn('id', function($row){
					return '#'.$row->id;
				})
				->addColumn('email', function($row){
					return $row->email;
				})
				->addColumn('name', function($row){
					return $row->name;
				})
				->addColumn('role', function($row){
					if($row->r_name == 'admin'){
						return '<span class="badge badge-danger">'.$row->r_name.'</span>';
					}elseif($row->r_name == 'user'){
						return '<span class="badge badge-success">'.$row->r_name.'</span>';
					}else{
						return '<span class="badge badge-warning">'.$row->r_name.'</span>';
					}
				})
				->addColumn('phone', function($row){
					return $row->phone;
				})
				->addColumn('status', function($row){
					
					if($row->is_approved == 1){
						$is_approved = '<span class="badge badge-success">Verified</span>';
					}else{
						$is_approved = '<span class="badge badge-danger">Not Verified</span>';
					}
					
					if($row->is_blocked == 0){
						$is_blocked = '<span class="badge badge-success">Active</span>';
					}else{
						$is_blocked = '<span class="badge badge-danger">Blocked</span>';
					}
					
					return $is_approved.' '.$is_blocked;
				})
				->addColumn('action', function($row){
					return '<span><a href="/admin/view/user/'.$row->id.'">View|Edit</a></span>';
				})
				->rawColumns(['action','status','name','role'])
				->make(true);
		}else{
			abort(404);
		}
    }
}
