<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\ProjectRequest;
use App\Projects;
use Breadcrumbs;
use App\Processes;

class ProjectController extends Controller
{
    public function getIndex(Request $req){
        $searchWord = $req->get('search');
        // $numList = $req->get('numList');
        $rs = Projects::where('status','!=','0')
                ->where('name','like','%'.$searchWord.'%')
                ->orderBy('id', 'asc')
                ->paginate(10);
        return view('project')->with('data',$rs);
        // return $rs;
    }

    /*public function searchAll(Request $req){
        $keyWord = $req->get('search');
        $numList = $req->get('numList');
        $rs = Project::where('status','!=','0')
                ->where('name','like','%'.$keyWord.'%')
                ->orderBy('created_at', 'asc')
                ->paginate($numList);

        return view('project')->with('data',$rs);
    }*/

    public function view($pjName){
        $rs = Projects::where('name','like',$pjName)->first(); 
        $rs->processes = Projects::find($rs->id)->processes()->get();
        return view('projectView')->with('data',$rs);
        // return $rs;
    }


    public function edit($pjName){
        $rs = Projects::where('name','like',$pjName)->first();
        return view('projectEdit')->with('data',$rs);
    }

    public function postEdit($pjName,ProjectRequest $req){
        $project = new Projects();
        $project->name = $req->input('name');
        $project->startDate = $req->input('startDate');
        $project->expireDate = $req->input('expireDate');
        $project->type = $req->input('type');
        $project->status = $req->input('status');
        
        if($project->where('name','=',$pjName)->update(
            ['name'     =>$project->name,
            'startDate' =>$project->startDate,
            'expireDate'=>$project->expireDate,
            'type'      =>$project->type,
            'status'    =>$project->status
            ])
        ){
            $alert = ['type'=>'success','title'=>'สำเร็จ','message'=>'แก้ไขข้อมูลเรียบร้อย'];
            return redirect()->intended('project/view/'.$project->name)->with('alert',$alert );
        }else{
            $alert = ['type'=>'danger','title'=>'ผิดพลาด','message'=>'ไม่สามารถแก้ไขข้อมูลได้'];
            return redirect()->intended('project/view/'.$project->name)->with('alert',['type'=>'error','message'=>'']);
        }
    }

    public function create(){
        return view('projectCreate');
    }

    public function postCreate(ProjectRequest $req){
    	$project = new Projects();
    	$project->name = $req->input('name');
    	$project->startDate = $req->input('startDate');
    	$project->expireDate = $req->input('expireDate');
    	$project->type = $req->input('type');
    	$project->status = $req->input('status');

    	if($project->save()){
    		$alert = ['type'=>'success','title'=>'สำเร็จ','message'=>'บันทึกโครงการ เรียบร้อย'];
            return redirect('project')->with('alert',$alert );
		}else{
    		$alert = ['type'=>'danger','title'=>'ผิดพลาด','message'=>'ไม่สามารถบันทึก โครงการได้'];
            return redirect('project/create')->with('alert',['type'=>'error','message'=>'']);
		}
    }

   
}
