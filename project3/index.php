
<html>
  <head>
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta content="utf-8" http-equiv="encoding">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
      <script type="text/javascript" src="js/item.js"></script>

  </head>
  <body>
    <div class=".flex-container">
      <div class="d-flex flex-row justify-content-center mt-3 mb-2">
        <div class="col-md-8">
          <h1 class="text-center">My awesome shopping list</h1>
          <br>
          <div id ="smoke"></div>
          <!-- Display live table -->
           <div id="result"></div>

              <div class="input-group mb-3">
                 <button class="btn btn-primary" id="add" type="button">Add new item</button> 
              </div>
        </div>
      </div>
    </div>
       <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Please add your shopping Items</h4>
          </div>
          <div class="modal-body">
              <div class="form-group">
                <label>Item</label>
                <input type="text" id="item_name" class="form-control">
              </div>
              <div class="form-group">
                <label>Quantity</label>
                <input type="text" id="qnt_number" class="form-control">
              </div>

               <input type="hidden" id="userId" class="form-control">

          </div>
          <div class="modal-footer">
            <a href="#" id="save" class="btn btn-primary pull-right">Submit</a>
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          </div>
        </div>

        <!-- set up the modal to start hidden and fade in and out -->
      <div id="myModal2" class="modal fade">
          <div class="modal-dialog">
              <div class="modal-content">
                  <!-- dialog body -->
                  <div class="modal-body">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      Hello world!
                  </div>
                  <!-- dialog buttons -->
                  <div class="modal-footer"><button type="button" class="btn btn-primary">OK</button></div>
              </div>
          </div>
      </div>
       

      </div>
    </div>

  </body>
</html>
