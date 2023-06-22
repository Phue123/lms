<?php
include_once __DIR__.'/../models/course.php';
class CourseController extends Course{

    public function getCourses(){
        return $this->getCoursesList();
    }
    public function getCourseAdmin(){
        return $this->getCoursesAdmin();
    }
    public function addCourse($name,$cat_id,$outline){
        return $this->createCourse($name,$cat_id,$outline);
    }
    public function getCourseInfoAdmin($id){
        return $this->getCourseInfo($id);
    }
    public function updateCourse($id,$name,$cat_id,$outline){
        return $this->setCourses($id,$name,$cat_id,$outline);
    }
    public function deleteCourse($id){
        return $this->deleteCourseInfo($id);
    }
    public function getCoursesInfoBatch(){
        return $this->getCourseInfoBatch();
    }
}
?>