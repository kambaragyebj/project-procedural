<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>ADD and Display dropdown list</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
   <script type="text/javascript" src="js/list.js"></script>
</head>
<body>
   <div class="container">

      <div class="row">
         <h1 class="text-success mt-5 mb-5 text-center">BOOK BUS TICKETS NOW</h1>
         <div class="col-md-6 offset-3">
         
            
            <form action="action.php" method="post" id="booking">
               <div class="mb-3">
                  <label class="form-label" for="add_category">Add Category</label>
                  <input type="text" class="form-control" name="add_category" placeholder="Add Category"  required />
               </div>
               <div class="mb-3">
                  <label class="form-label" for="status">Status</label>
                  <input type="checkbox" name="status" />
               </div>
               <input type="submit" name="save_category" class="btn btn-success mb-5" value="Add">
               <div class="mb-3">
                  <label class="form-label" for="category">Select Category</label>

                  <select multiple="multiple" name="formCountries[]" id="myselect">
                  <!-- <select type="select" class="form-control" id="category"  required> -->
                  <!-- <select name="categories" id="categories" multiple> -->
                     <option>Select Category</option>
                    <?php
                        //Include Configuration File
                        include_once "config.php";

                        $query = "SELECT * FROM categories WHERE status = '1'";
                        $result = $con->query($query);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {         
                     ?>
                            <!-- <option value="<?php //echo $row['id'] ?>"><?php //echo $row['category_name'] ?></option> -->
                            <option value="<?php echo $row['category_name'] ?>"><?php echo $row['category_name'] ?></option>
                    <?php
                            }
                        }
                    ?>
                  
                   </select>     
               </div>
               <input type="submit" name="submit" id="add" class="btn btn-primary mb-5" value="Submit">
            </form>
         </div>
      </div>
   </div>
</body>
</html>