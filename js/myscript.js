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
                     if(response=='Success'){
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

    $(document).on('click','.tsbtn_delete',function(e){
        e.preventDefault();
        let status=confirm("Are you sure to delete trainee course");
        if(status){
            let id=$(this).parent().attr('id');
            $.ajax({
                method:'post',
                url:'delete_trainee_course.php',
                data:{id:id},
                success:function(response){
                    if(response=='success'){
                        alert("Successfully deleted");
                        location.href='trainee_course.php';
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

    $(document).on('click','.pjbtn_delete',function(e){
        e.preventDefault();
        let status=confirm("Are you sure to delete project");
        if(status){
            let id=$(this).parent().attr('id');
            $.ajax({
                method:'post',
                url:'delete_project.php',
                data:{id:id},
                success:function(response){
                    if(response=='success'){
                        alert("Successfully deleted");
                        location.href='project.php';
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

    $(document).on('click','.ptbtn_delete',function(e){
        e.preventDefault();
        let status=confirm("Are you sure to delete project trainee");
        if(status){
            let id=$(this).parent().attr('id');
            $.ajax({
                method:'post',
                url:'delete_project_trainee.php',
                data:{id:id},
                success:function(response){
                    if(response=='success'){
                        alert("Successfully deleted");
                        location.href='project_trainee.php';
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

    $.ajax({
        url:'report_chart.php',
        method:'post',
        success:function(response){
            let batch=JSON.parse(response);
            let year=[];
            let data=[];
            for(let index=0;index<batch.length;index++){
                year[index]=batch[index].year;
                data[index]=batch[index].total;
            }
            var ctx = document.getElementById("chartjs-dashboard-line").getContext("2d");
			var gradient = ctx.createLinearGradient(0, 0, 0, 225);
			gradient.addColorStop(0, "rgba(215, 227, 244, 1)");
			gradient.addColorStop(1, "rgba(215, 227, 244, 0)");
			// Line chart
			new Chart(document.getElementById("chartjs-dashboard-line"), {
				type: "line",
				data: {
                    //x-coordinate
					labels: year,
					datasets: [{
						label: "Batches",
						fill: true,
						backgroundColor: gradient,
						borderColor: window.theme.primary,
						data: data
					}]
				},
				options: {
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					tooltips: {
						intersect: false
					},
					hover: {
						intersect: true
					},
					plugins: {
						filler: {
							propagate: false
						}
					},
					scales: {
						xAxes: [{
							reverse: true,
							gridLines: {
								color: "rgba(0,0,0,0.0)"
							}
						}],
						yAxes: [{
							ticks: {
								stepSize: 2
							},
							display: true,
							borderDash: [3, 3],
							gridLines: {
								color: "rgba(0,0,0,0.0)"
							}
						}]
					}
				}
			});
        },
        error:function(message){

        }
    })

    $.ajax({
        url:'report_pie.php',
        method:'post',
        success:function(response){
            let result=JSON.parse(response);
            console.log(result);
            let name=[];
            let trainee=[];
            for(let index=0;index<result.length;index++){
                name[index]=result[index].name;
                trainee[index]=result[index].total;
            }
            //console.log(name);
            //console.log(trainee);
            new Chart(document.getElementById("chartjs-dashboard-pie"), {
				type: "pie",
				data: {
					labels: name,
					datasets: [{
						data: trainee,
						backgroundColor: [
							window.theme.primary,
							window.theme.warning,
							window.theme.danger
						],
						borderWidth: 5
					}]
				},
				options: {
					responsive: !window.MSInputMethodContext,
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					cutoutPercentage: 75
				}
			});
        },
        error:function(message)
        {

        }
    })

    // $(document).on('click','.send',function(e){
    //     e.preventDefault();
    //     let status=confirm("Are you sure to send");
    //     if(status){
    //         let id=$(this).parent().attr('id');
    //         $.ajax({
    //             method:'post',
    //             url:'edit_send.php',
    //             data:{id:id},
    //             success:function(response){
    //                 if(response=='success'){
    //                     location.href="trainee_course.php";
    //                 }
    //                 else
    //                 {
    //                    alert("successfully");
    //                 }
    //             },
    //             error:function(error){

    //             }
    //         })
    //     }
        
    // })

});

$(document).ready(function(){
    var i=0;

    $('#addmore').click(function(event){
    event.preventDefault();

    $.ajax({
        method:'post',
        url:'get_trainee_course.php',
        success:function(response){
            let trainees=JSON.parse(response)
            console.log(trainees)
            
            let row="<div class='row'>";
           row+="<div class='col-md-10'>";
           row+="<label class='form-label'>Trainee Name</label>";
           row+="<select name='trainee_course_id[]0' id='trainee_course_id0' class='form-select'>"
           let name=[];
           let id=[];
            for(let index=0;index<trainees.length;index++){
                id[index]=trainees[index].id;
                name[index]=trainees[index].name;
                row+="<option value='"+id[index]+"'>"+name[index]+"</option>"
            } 
           row+="</select>";
           row+="<div class='col-md-2 mt-3'>";
           row+="<button class='btn btn-danger removebtn'>Remove Btn</button>";
           row+="</div>";
           row+="</div>";
           row+="</div>";

           $('#trainee').append(row);

           
        },
        error:function(error){
    
        }
    })
    
    })

    $(document).on('click','.removebtn',function(event){
        event.preventDefault();
        console.log("button is remove");
        $(this).parent().parent().remove();
    })
});

$(document).ready(function(){
    $(document).on('click','.addmore',function(e){
        e.preventDefault();
        console.log("btn click");
        let id=$(this).parent().attr('id');
        console.log(id)
        $.ajax({
            url:'get_trainee.php',
            method:'post',
            data:{id:id},
            success:function(response){
                $('.rows').append(response);
            },
            error:function(message){
            }
        })
        
    })
    $(document).on('click','.removebtn',function(event){
                event.preventDefault();
                console.log("button is remove");
                $(this).parent().parent().remove();
            })
})

$(document).ready(function(){
    $(document).on('click','.addmore1',function(e){
        e.preventDefault();
        console.log("btn click");
        let id=$(this).parent().attr('id');
        console.log(id)
        $.ajax({
            url:'get_project_trainee.php',
            method:'post',
            data:{id:id},
            success:function(response){
                $('.project').append(response);
            },
            error:function(message){
            }
        })
        
    })
    $(document).on('click','.removebtn',function(event){
                event.preventDefault();
                console.log("button is remove");
                $(this).parent().parent().remove();
            })
})






