<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include_once __DIR__.'/../models/trainee.php';
include_once __DIR__.'/../vendor/PHPMailer/src/PHPMailer.php';
include_once __DIR__.'/../vendor/PHPMailer/src/SMTP.php';
include_once __DIR__.'/../vendor/PHPMailer/src/Exception.php';


class traineeController extends Trainee{
    public function getTraineeAdmin(){
        return $this->getTrainee();
    }
    public function addTraineeAdmin($name,$email,$phone,$city,$education,$remark)
    {
        return $this->addTrainee($name,$email,$phone,$city,$education,$remark);
    }
    public function getTraineeInfoAdmin($id){
        return $this->getTraineeInfo($id);
    }
    public function updateTrainee($id,$name,$email,$phone,$city,$education,$remark){
        return $this->setTrainee($id,$name,$email,$phone,$city,$education,$remark);
    }

    public function deleteTrainee($id){
        return $this->deleteTraineeInfo($id);
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

        $mailer->SetFrom('khaingswewin@hostmyanmar.net','Admin');
        $mailer->addAddress("phuepwint293989@gmail.com","TraineeName");

        $mailer->isHTML(true);
        $mailer->Subject="Testing for mail";
        $mailer->Body="Testing";
        if($mailer->send())
        return true;

    }
}
?>