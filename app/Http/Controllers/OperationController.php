<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use Validator;

class OperationController extends Controller
{
    //DISPALT USERS LIST
    public function index(Request $request){
        $data['flash']=$this->getFlash($request);
    	$data['users'] = User::all();
    	return view('page.list',$data);
    } 

    //DISPLAY ADD FORM
    public function add(Request $request){
        $data['flash']=$this->getFlash($request);
        $data['url'] = url('create');
    	return view('page.addform',$data);
    }

    //CREATE USER
    public function create(Request $request){
        $validator = $this->formValidator($request);
        if ($validator->fails()) {
            $this->setFlash("Resolve Below Given Error.","danger",$request);
            return redirect('form')->withInput()->with([
                'field_errors' => $validator->errors()
            ]);
        }else{
            $request_array = $request->toArray(); 
            $request_array['dob'] =date("Y-m-d",strtotime($request_array['dob']));
            $ddd=User::create($request_array);
            $this->setFlash("User Added Successful.","success",$request);
            return redirect('list');
        }
    }

    //DISPLAY EDIT FORM
    public function edit($id,Request $request){
        $data['flash']=$this->getFlash($request);
        if($id){
            $data['url'] = url('update/'.$id);
            $data['_old_input'] = User::find($id);
            if(isset($data['_old_input'])){
                $data['_old_input'] = $data['_old_input']->toArray();
                $data['_old_input']['dob'] =date("m/d/Y",strtotime($data['_old_input']['dob']));
                return view('page.addform',$data);
            }else{
                $this->setFlash("Wrong User Given.","danger",$request);        
            }    
        }else{
            $this->setFlash("Wrong User Given.","danger",$request);
        }
        return redirect('list');
    }

    //UPDATE USER
    public function update($id,Request $request){
        if(isset($id) && !empty($id)){
            $users=User::find($id);
            if(isset($users) && !empty($users)){
                $validator = $this->formValidator($request);
                $this->setFlash("Resolve Below Given Error.","danger",$request);
                if ($validator->fails()) {
                    $this->setFlash("Resolve Below Given Error.","danger",$request);
                    return redirect('edit/'.$id)->withInput()->with(['field_errors' => $validator->errors()
                    ]);
                }

                $users->first_name = $request->first_name;
                $users->last_name = $request->last_name;
                $users->email_id = $request->email_id;
                $users->contact_number = $request->contact_number;
                $users->place_birth = $request->place_birth;
                $users->dob = $request->dob;
                $users->status = $request->status;
                $users->address = $request->address;
                $users->save();
                $this->setFlash("User Edidted Successfully.","success",$request);
            }else{
                $this->setFlash("Wrong User Given.","danger",$request);
            }
        }else{
            $this->setFlash("Wrong User Given.","danger",$request);
        }
        
        return redirect('list');
    }

    //DELETE USER
    public function delete(Request $request,$id){
        $users=User::find($id);
        if(isset($users)){
            $users->delete(); 
            $this->setFlash("User Deleted Successfully.","success",$request);
        }else{
            $this->setFlash("Wrong User Given.","danger",$request);
        }
        return redirect('list');
    }

    // VALIDATE FORM
    public function formValidator($request){
        $validator =Validator::make($request->all(), [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email_id' => 'required|email|unique:users|max:255',
            'contact_number' => 'required|size:10|unique:users',
            'place_birth' => 'required',
            'dob' => 'required|date_format:m/d/Y',
            'status' => 'required',
            'address' => 'required',
        ]);
        return $validator;
    }

    //SET FLASH DATA
    public function setFlash($msg,$type,$request){
        $flash['msg'] = $msg;
        $flash['type'] = $type;   
        $request->session()->flash('flash', $flash);
    }

    //GET FLASH DATA
    public function getFlash($request){
        return $request->session()->get('flash');   
    }

    //Perform Ajax Operation
    public function ajax(Request $request){
        $id = $request->toArray();
        $user = $users=User::find($id['id']);
        if(isset($user)){
            if($user->status == 'active'){
                $user->status = 'inactive';
                $data='inactive';
            }else{
                $user->status = 'active';
                $data='active';
            }
            $user->save();
        }
        echo json_encode($data); exit;
    }


}
