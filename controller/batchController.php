<?php
include_once __DIR__.'/../models/batch.php';

class batchController extends batch{
    public function getBatchLists(){
        return $this->getBatchList();
    }
    public function addBatches($name,$start_date,$duration,$fee,$discount,$course_id)
    {
        return $this->createBatches($name,$start_date,$duration,$fee,$discount,$course_id);
    }
    public function getBatchInfo($id){
        return $this->getBatchInfos($id);
    }
    public function updateBatch($id, $name, $start_date, $duration, $fee, $discount, $course_id)
    {
        return $this->updateBatchInfo($id, $name, $start_date, $duration, $fee, $discount, $course_id);
    }
    public function deleteBatch($id){
        return $this->deleteBatchInfo($id);
    }
}
?>