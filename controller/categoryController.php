<?php
include_once __DIR__.'/../models/category.php';

class Categorycontroller extends Category{

    public function getCategories(){
        return $this->getCategoriesList();
    }
    public function getCategorysAdmin(){
        return $this->getCategoryAdmin();
    }
    public function addCategory($name){
        return $this->createCategory($name);
    }

    public function getCategoryInfoAdmin($id){
        return $this->getCategoriesInfo($id);
    }
    public function updateCategoryAdmin($id,$name){
        return $this->updateCategory($id,$name);
    }
    public function deleteCategory($id){
        return $this->deleteCategoryInfo($id);
    }
}
?>