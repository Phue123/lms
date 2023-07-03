<?php
include_once __DIR__.'/../models/course.php';
class CourseController extends Course{

    public function getCourses(){
        return $this->getCoursesList();
    }
    public function getCourseAdmin(){
        return $this->getCoursesAdmin();
    }
    public function addCourse($name,$cat_id,$outline,$image){
        if($image['error']==0)
        {
            $filename=$image['name'];
            $extension=explode('.',$filename);
            $filetype=end($extension);
            $filesize=$image['size'];
            $allowed_types=['jpg','jpeg','svg','png'];
            $temp_file=$image['tmp_name'];
            if(in_array($filetype,$allowed_types)){
                if($filesize <= 2000000)
                {
                    $timestamp=microtime();
                    $filename=$timestamp.$filename;
                    if(move_uploaded_file($temp_file,'../uploads/' . $filename))
                    return $this->createCourse($name,$cat_id,$outline,$filename);
                }
            }
        }
    }
    public function getCourseInfoAdmin($id){
        return $this->getCourseInfo($id);
    }
    public function updateCourse($id,$name,$cat_id,$outline,$image){
        if($image['error']==0)
        {
            $filename=$image['name'];
            $extension=explode('.',$filename);
            $filetype=end($extension);
            $filesize=$image['size'];
            $allowed_types=['jpg','jpeg','svg','png'];
            $temp_file=$image['tmp_name'];
            if(in_array($filetype,$allowed_types)){
                if($filesize <= 2000000)
                {
                    $timestamp=microtime();
                    $filename=$timestamp.$filename;
                    if(move_uploaded_file($temp_file,'../uploads/' . $filename))
                    return $this->setCourses($id,$name,$cat_id,$outline,$filename);
                }
            }
        }
    }
    public function deleteCourse($id){
        return $this->deleteCourseInfo($id);
    }
    public function getCoursesInfoBatch(){
        return $this->getCourseInfoBatch();
    }

    public function getCourseInfoTrainees()
    {
        return $this->getCourseInfoTrainee();
    }
}
?>