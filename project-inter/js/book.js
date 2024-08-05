$(document).ready(function(){

    // display();


    $('#add').click(function(){
        // var id         = $('#userId').val(); 
        var item_name  =  $('#item_name').val();
        var qnt_number =  $('#qnt_number').val();
      

        if(item_name !='' && qnt_number !=''){

              $.ajax({
                  url      : 'add.php',
                  method   : 'post', 
                  data     : {item_name : item_name , qnt_number: qnt_number},
                  success  : function(data){
                             console.log(data);
                                 $("#error").html(data);
                                 $('#myModal').modal("show");
                                 display(); 

                             }
              });

         } else{
            $("#error").html(" Please enter item and quantity Fields");
            $('#myModal').modal("show");
        //   <div class="alert alert-primary" role="alert">
        //    Please enter item and quantity Fields
        //   </div>
            //  alert ("Please enter item and quantity Fields");

          }


     });


          // Update quantity 

      $(document).on('click','.update',function(){
             
             // append value in the contentedible field
              var id         = $(this).data('id'); 
              var qnt_no     = $('#'+id).children('td[data-target=qnt_number]').text();
              var item     = $('#'+id).children('td[data-target=item]').text();

              // Get quantity  value from the contenteditbale
              $('#qnt_number').val(qnt_no);
              $('#userId').val(id);
              var edited_qnty = $('#qnt_number').val();

              console.log(edited_qnty);
              $.ajax({
                    url      : 'update.php',
                    method   : 'post', 
                    data     : {edited_qnty : edited_qnty , id: id,item: item},
                    success  : function(data){

                                $("#error").html(data);
                                $('#myModal').modal("show");
                                // $('#'+id).children('td[data-target=qnt_number]').text();
                                //  alert(data);
                                 display(); 

                     }
             });
        });


        $(document).on('click','.delete',(function(){ 

            var id  = $(this).data('id');
 
            var action = "Delete";
 
            console.log(id);
 
           if(confirm("Are you sure you want to remove this item from the database?")){
 
                $.ajax({
                    type: "POST",
                    url:"delete.php", 
                    data : {id:id,action:action},
                }).done(function (data) {

                    $("#error").html(data);
                    $('#myModal').modal("show");
                    display();
                 
                }).fail(function (data) {
                      $("#error").html(
                        '<i class="header-text"> Failed deleted data !</i>'
                      );
                   
                });
 
               } else{
                  
 
                 return false;
                
               }
       
 
         }));


     function display(){

        var action = "display";

         $.ajax({
            url : "shopping_list.php",
            method : "POST",
            data : {action:action },
            success:function(data){
             
               $("#result").html(data);
          

           }

         });
    }


});