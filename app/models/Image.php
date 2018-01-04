<?php

class Image extends \Eloquent {
    protected $fillable = ['article_id','doctor_id','image'];

    public function article(){

        return $this->belongsTo("Article");
    }

    public function saveImage ($filename,$articleid){
//          dd($destinationPath,$filename);
        $doctor_id = Auth::user()->id;


        $imagepath=$filename;


        $this->article_id = $articleid;
        $this->doctor_id = $doctor_id;

        $this->image = $imagepath;
        $this->save();
        return 'sucess';
    }




}