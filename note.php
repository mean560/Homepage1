<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Note</title>

    <link rel="stylesheet" href="notecss.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


<body>


    <div class="middle">
        <aside class="left">
            <!-- <embed src="EJ1217886.pdf" type="application/pdf" width="100%" height="800px" /> -->
            <div class="middle_right" align="left">
                <div class="col-xs-12 well">
                    <form method="post" enctype="multipart/form-data">
                        <div class="form-upload">
                            <i class="fas fa-file-upload" style="font-size:54px;"></i>
                            <font style="font-size:32px;">Upload File</font>
                            <input type="hidden" value="1000000000" name="MAX_FILE_SIZE" />
                        </div>
                        <div class="form-file">
                            <input type="file" name="uploadfile" />
                        </div>

                        <input type="submit" name="submit" value="Upload" class="btn" />

                    </form>
                </div>
                <?php if (isset($_POST['submit'])) {

                    $target_path = "uploads/";
                    $target_path = $target_path . basename($_FILES['uploadfile']['name']);
                    if (move_uploaded_file($_FILES['uploadfile']['tmp_name'], $target_path)) {
                        $conn = new mysqli("localhost", "root", "", "user_db");
                        $sql = "Insert into upload(`name`) values('$target_path')";
                        if ($conn->query($sql) == TRUE) {
                            echo "<br><br>";
                        } else {
                            echo "ERROR:" . $sql . $conn->error;
                        }

                        $sql = "SELECT name FROM upload ORDER BY id DESC LIMIT 1";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $path = $row['name'];
                                echo "<embed src='$path' width='100%' height='700px' >";
                            }
                        }
                        $conn->close();
                    }
                } ?>
            </div>

        </aside>

        <aside class="right">
            <div class="w3-padding">
                <i class="far fa-edit" style="font-size:56px;"></i>
                <font style="position:relative;">Note</font>
            </div>
            <div class="backpage">
                <a href="#" class="my-link">
                    <span class="my-image-text">
                        <i class="fas fa-angle-left" style="font-size:14px;"></i>
                        <font style="font-size:16px;">Back to all pages</font>
                    </span>
                </a>
            </div>
            <div class="input-note">
                <input class="w3-input" type="text" id="postTitle" placeholder="Title your page..."><br>
                <textarea class="form-control" id="postContent" rows="15" placeholder="Start typing..."></textarea><br>
                <input type='hidden' id='postid' value='0'>
            </div>
            <div class="input-group">
                <input type='button' id='submit2' value='Save' class="btn">
            </div>
        </aside>
    </div>

    <!-- Script -->
    <script type="text/javascript">
        $(document).ready(function() {
            var timer;
            var timeout = 5000; // Timout duration
            $('#postTitle,#postContent').keyup(function() {

                if (timer) {
                    clearTimeout(timer);
                }
                timer = setTimeout(saveData, timeout);

            });

            $('#submit2').click(function() {
                saveData();
            });
        });

        // Save data
        function saveData() {

            var postid = $('#postid').val();
            var title = $('#postTitle').val().trim();
            var content = $('#postContent').val().trim();

            if (title != '' || content != '') {
                // AJAX request
                $.ajax({
                    url: 'autosave.php',
                    type: 'post',
                    data: {
                        postid: postid,
                        title: title,
                        content: content
                    },
                    success: function(response) {
                        $('#postid').val(response);
                    }
                });
            }
        }
    </script>

</body>

</html>