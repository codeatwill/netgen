<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Model\Role;
use App\Model\UserExp;
use App\Model\UserEdu;
use App\Model\UserSkill;
use App\Model\UserContract;
use App\Model\UserPortfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    /*******************************************************************
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
		
    }

    /*******************************************************************
     * 
     * Show's the dynamic profile page.
     *
     */
    public function getPages(Request $request,$slug)
    {
		$data = [];
		$data['loggedInUser'] =  Auth::user();
		
		$data['users'] = $user = User::where('username',$slug)
											->firstOrFail();
		
		$data['templates'] = DB::table('templates')
								->where('id',$user->template_id)
								->first();
		
		$data['user_skills'] = DB::table('user_skills')
										->where('user_id',$user->id)
										->get();
		
		$data['user_exp'] = DB::table('user_work_exp')
										->where('user_id',$user->id)
										->get();
		
		$data['user_edu'] = DB::table('user_education')
									->where('user_id',$user->id)
									->get();
		
		$data['user_portfolio'] = DB::table('user_portfolio')
											->where('user_id',$user->id)
											->get();
		
        return view('page.getPages', compact('data'));
    }
    
    /*******************************************************************
     * 
     *Ssubmit Contracts.
     *
     */
    public function submitContract(Request $request,$user_id)
    {
		if ($request->isMethod('post')){
			$findUser = User::findOrFail($user_id);
			
			$this->validate(request(), [
				'name' => ['required', 'string', 'max:255'],
				'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
				'phone' => ['required', 'string', 'max:255'],
				'msg' => ['required'],
			]);
			$user = Auth::user();
			
			$user_contracts = new UserContract;    
			
			$user_contracts->user_to = $user_id;
			if($user){
				$user_contracts->user_from = $user->id;
			}else{
				$user_contracts->user_from = null;
			}
			$user_contracts->name = request('name');
			$user_contracts->email = request('email');
			$user_contracts->phone_number = request('phone');
			$user_contracts->msg = request('msg');
			
			$user_contracts->created_at = date('Y-m-d h:i:s');
			$user_contracts->updated_at = date('Y-m-d h:i:s');
			
			$user_contracts->save();
			
			return back()->with('success','Data Updated Successfully!');
		}else{
			abort(404);
		}
    }
}
