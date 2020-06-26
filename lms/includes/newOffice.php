<div class="modal fade" id="officeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
      
            <div class="modal-header bg-dark" style="color:aliceblue;">
              <h5 class="modal-title" id="exampleModalCenterTitle">New Office</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
      
            <div class="modal-body">
      
                    <form method="POST">
                            <div class="form-group">
                          <label for="exampleInputEmail1">Department</label>

                          <select class="form-control" name="department">
                          <option selected>Select</option>
                         <?php  
                         while($d=mysqli_fetch_array($result)){
                         
                          echo '<option value="'.$d['department_id'].'">'.$d['department_name'].'</option>';
                         
                        }
                           ?>
                          </select>
                          <small id="emailHelp" class="form-text text-muted">New Office name.</small>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Office Name</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" name="office" aria-describedby="emailHelp" required placeholder="Enter Here">
                          <small id="emailHelp" class="form-text text-muted">New Office name.</small>
                        </div>
                      
                        <!-- <div class="form-group">
                          <label for="exampleInputPassword1">Acronym</label>
                          <input type="text" class="form-control" name="officeAcro" id="exampleInputPassword1" required placeholder="Acronym">
                        <small id="emailHelp" class="form-text text-muted">Office Acronym</small>
                      </div> -->
                        
                        <input class="btn btn-outline-dark btn-lg btn-block" name="newOffice" type="submit">
                      </form>

        </div>
    </div>
  </div>
</div>
