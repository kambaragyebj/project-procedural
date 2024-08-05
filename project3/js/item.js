
  $(document).ready(function(){

       display();
  
      // fetch record from the database and display on the table

       function display(){

           var action = "display";

            $.ajax({
               url : "display.php",
               method : "POST",
               data : {action:action },
               success:function(data){
                
                  $("#result").html(data);
             

              }

            });
       }

       // Add new item input fields

        $(document).on('click','#add',function(){
             
            $('#myModal').modal('toggle');
        });

      // submit new item to the database

      $('#save').click(function(){
          var id         = $('#userId').val(); 
          var item_name  =  $('#item_name').val();
          var qnt_number =  $('#qnt_number').val();
          console.log(id);
        
          if(item_name !='' && qnt_number !=''){

                $.ajax({
                    url      : 'insert.php',
                    method   : 'post', 
                    data     : {item_name : item_name , qnt_number: qnt_number , id: id},
                    success  : function(data){

                                   $('#myModal').modal('toggle');
                                   //alert(data);
                                   display(); 

                               }
                });

           } else{
               

               alert ("Please enter item and quantity Fields");

            }


       });
  
      
      // Delete item from the database /  Qns : Should we allow users to delete record permanently from the database 

      $(document).on('click','.delete',(function(){ 

           var id  = $(this).data('id');

           var action = "Delete";

           console.log(id);

          if(confirm("Are you sure you want to remove this item from the database?")){


                $.ajax({

                 url : "delete.php",

                 method : "POST",

                 data : {id:id,action:action},

                 success:function(data){
                      
                      display();

                      //alert(data);

                }

                });
                   

              } else{
                 

                return false;
               
              }
      

        }));

      // Update quantity 

      $(document).on('click','.update',function(){
             
             // append value in the contentedible field
              var id         = $(this).data('id'); 
              var qnt_no     = $('#'+id).children('td[data-target=qnt_number]').text();

              // Get quantity  value from the contenteditbale
              $('#qnt_number').val(qnt_no);
              $('#userId').val(id);
              var edited = $('#qnt_number').val();

              console.log(edited);
              $.ajax({
                    url      : 'update.php',
                    method   : 'post', 
                    data     : {edited : edited , id: id},
                    success  : function(data){

                                $('#'+id).children('td[data-target=qnt_number]').text();
                                 alert(data);
                                 display(); 

                     }
             });
        });

      
  });
