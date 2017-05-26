<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\ProcessRequest;
use App\Processes;
use App\Projects;


class ProcessController extends Controller{

    public function view($pjName,$pcName){
    	$rs=Processes::where('name','=',$pcName)->first();
    	$rs->pjName =  Processes::find($rs->id)->projects->name;
    	return view('processView')->with("data",$rs);
    	// return $rs;
    }

    public function edit($pjName,$pcName){
    	$rs=Processes::where('name','=',$pcName)->first();
    	$rs->pjName =  Processes::find($rs->id)->projects->name;
        return view('processEdit')->with('data',$rs);
    }

	public function postEdit($pjName,$pcName,ProcessRequest $req){
        $process = new Processes();
        $process->name = $req->input('name');
        $process->startDate = $req->input('startDate');
        $process->expireDate = $req->input('expireDate');
        $process->cost = $req->input('cost');
        $process->status = $req->input('status');
        if($process->where('name','=',$pcName)->update(
            ['name'     =>$process->name,
            'startDate' =>$process->startDate,
            'expireDate'=>$process->expireDate,
            'cost'      =>$process->cost,
            'status'    =>$process->status
            ])
        ){
            $alert = ['type'=>'success','title'=>'สำเร็จ','message'=>'แก้ไขข้อมูลเรียบร้อย'];
            return redirect()->intended('project/view/'.$pjName.'/process/view/'.$process->name)->with('alert',$alert );
        }else{
            $alert = ['type'=>'danger','title'=>'ผิดพลาด','message'=>'ไม่สามารถแก้ไขข้อมูลได้'];
            return redirect()->intended('project/view/'.$pjName.'/process/view/'.$process->name)->with('alert',['type'=>'error','message'=>'']);
        }
    }
    public function create($pjName){
    	$rs = new Projects();
    	$rs->pjName = $pjName;
        return view('processCreate')->with('data',$rs);
    }

    public function postCreate($pjName,ProcessRequest $req){
    	$rs = Projects::select('id')->where('name','=',$pjName)->first();
    	$process = new Processes();
    	$process->name = $req->input('name');
    	$process->projects_id = $rs->id;
    	$process->startDate = $req->input('startDate');
    	$process->expireDate = $req->input('expireDate');
    	$process->cost = $req->input('cost');
    	$process->status = $req->input('status');

    	if($process->save()){
    		return $process;
		}else{
    		return "Fail";
		}
		// return $process;
    }
}
