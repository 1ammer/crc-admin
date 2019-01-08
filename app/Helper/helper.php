<?php
//use DB;
use Illuminate\Database\Eloquent\Model;
use App\AssignSubmit;
function marksSubmited($data){
    
            $date['result'] = App\Result::where('ass_id', $data['assID'])
                   ->where('user_id',    $data['user_id'])->first();
    if(!$date['result']) 
    return 0;
    else
        return 1;

}
//used in assiment submted
function AssimentSubmited1($data){
     
            $date['result'] = AssignSubmit::where('assignment_id', $data['assID'])
                   ->where('user_id',  Auth::user()->id)->first();
    if(!$date['result']) 
    return 0;
    else
        return 1;

}