$(document).ready(function(){
    $(document).on('click','.btn_delete',function(e){
        e.preventDefault();
        let status=confirm("Are you sure to delete?");
        if(status){
            let id=$(this).parent().attr('id');
            $.ajax({
                method:'post',
                url:'delete_category.php',
                data:{id:id},
                success:function(response){
                     if(response=='success'){
                        alert('Successfully deleted')
                        location.href='category.php';
                     }
                     else{
                        alert(response);
                     }
                },
                error:function(error){

                }
            })
        }
    })

    $(document).on('click','.coursebtn_delete',function(e){
        e.preventDefault();
        let status=confirm("Are you sure to delete course?");
        if(status){
            let id=$(this).parent().attr('id');
            $.ajax({
                method:'post',
                url:'delete_course.php',
                data:{id:id},
                success:function(result){
                     if(result=='success'){
                        alert('Successfully deleted')
                        location.href='course.php';
                     }
                     else{
                        alert(result);
                     }
                },
                error:function(error){
    
                }
            })
        }
    })

    $(document).on('click','.insbtn_delete',function(e){
        e.preventDefault();
        let status=confirm("Are you sure to delete instructor?");
        if(status){
            let id=$(this).parent().attr('id');
            $.ajax({
                method:'post',
                url:'delete_instructor.php',
                data:{id:id},
                success:function(result){
                     if(result=='success'){
                        alert('Successfully deleted')
                        location.href='instructor.php';
                     }
                     else{
                        alert(result);
                     }
                },
                error:function(error){
    
                }
            })
        }
    })

    $(document).on('click','.trainbtn_delete',function(e){
        e.preventDefault();
        let status=confirm("Are you sure to delete trainee?");
        if(status){
            let id=$(this).parent().attr('id');
            $.ajax({
                method:'post',
                url:'delete_trainee.php',
                data:{id:id},
                success:function(response){
                     if(response=='success'){
                        alert('Successfully deleted')
                        location.href='trainee.php';
                     }
                     else{
                        alert(response);
                     }
                },
                error:function(error){
    
                }
            })
        }
    })

    $(document).on('click','.batchbtn_delete',function(e){
        e.preventDefault();
        let status=confirm("Are you sure to delete batch");
        if(status){
            let id=$(this).parent().attr('id');
            $.ajax({
                method:'post',
                url:'delete_batch.php',
                data:{id:id},
                success:function(response){
                    if(response=='success'){
                        alert("Successfully deleted");
                        location.href='batch.php';
                    }
                    else
                    {
                        alert(response);
                    }
                },
                error:function(error){

                }
            })
        }
    })


    $('#table').DataTable();

});


