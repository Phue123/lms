<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include_once __DIR__.'/../models/trainee_course.php';
include_once __DIR__.'/../vendor/PHPMailer/src/PHPMailer.php';
include_once __DIR__.'/../vendor/PHPMailer/src/SMTP.php';
include_once __DIR__.'/../vendor/PHPMailer/src/Exception.php';

class train_cosController extends TraineeCourse{
    public function getTrainCourseInfo()
    {
        return $this->getTrainCourse();
    }

    public function addTrainCourse($bname,$trainee_id,$joined_date,$status)
    {
        return $this->createTrainCourse($bname,$trainee_id,$joined_date,$status);
    }

    public function getTrainCourseAdmins($id)
    {
        return $this->getTrainCourseAdmin($id);
    }

    public function updateTraineeCourse($id,$bname,$tname,$joined_date,$status){
        return $this->setTraineeCourse($id,$bname,$tname,$joined_date,$status);
    }

    public function deleteTraineeCourse($id){
        return $this->deleteTraineeCourseInfo($id);
    }

    public function gettraineeByBatchs($pid){
        return $this->gettraineeByBatch($pid);
    }

    public function mailTrainee($id){
       $emailaddress=$this->getmailTrainee($id);
        $mailer=new PHPMailer(true);

        //Server setting
        $mailer->SMTPDebug=SMTP::DEBUG_SERVER;
        $mailer->isSMTP();
        $mailer->Host='smtp.gmail.com';
        $mailer->SMTPAuth=true;
        $mailer->SMTPSecure='tls';
        $mailer->Port=587;

        //Mail setting
        $mailer->Username="phuepwint293989@gmail.com";
        $mailer->Password="zwszunlpdalwfwqe";

        $mailer->SetFrom('phuepwint293989@gmail.com','Admin');
        $mailer->addAddress($emailaddress['email'],"TraineeName");

        $mailer->isHTML(true);
        $mailer->Subject="Testing for Registration";
        $mailer->Body="Batch name :". $emailaddress['bname']."<br> Joined Date :" . $emailaddress['joined_date'] ."<br> Duration : " . $emailaddress['duration']."<br> Course Outline : " . $emailaddress['outline']."<br>";
        $mailer->addEmbeddedImage('../uploads/'.$emailaddress['image'],'image');
        if($mailer->send()){
            echo '<script>alert("Successfully send")</script>';
            $sentEmail=$this->setEmailDetails($emailaddress['trainee_course_id']);
        return $sentEmail;
    }

    }

    public function NoOfTrainee(){
        return $this->getNoOfTrainee();
    }

    public function setEmailDetail($id){
        return $this->setEmailDetails($id);
    }

    public function gettrainees(){
        return $this->gettraineesInfo();
    }

}
?>