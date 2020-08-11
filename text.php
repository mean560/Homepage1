 <!-- <embed src="2894-7702-1-PB.pdf" type="application/pdf" width="100%" height="800px" /> -->
  <div class="row">
      <div class="col-xs-8 col-xs-offset-2 well">
          <form action="upload.php" method="post" enctype="multipart/form-data">
              <legend>Select File to Upload:</legend>
              <div class="form-group">
                  <input type="file" name="file1" />
              </div>
              <div class="form-group">
                  <input type="submit" name="submit" value="Upload" class="btn btn-info" />
              </div>
              <?php if (isset($_GET['st'])) { ?>
                  <div class="alert alert-danger text-center">
                      <?php if ($_GET['st'] == 'success') {
                            echo "File Uploaded Successfully!";
                        } else {
                            echo 'Invalid File Extension!';
                        } ?>
                  </div>
              <?php } ?>
          </form>
      </div>
  </div>