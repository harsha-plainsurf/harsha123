<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location:/index.php");
}
?>

<!DOCTYPE html>

<html lang = "en">
    <head>
        <script src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <title>Eduversity Education Category Flat Bootstrap Responsive Website Template | Contact : W3layouts</title>

    </head>

    <?php include_once './includes/global_css.php'; ?>
    <body>


        <!-- header -->
        <header>
            <?php include_once './includes/header2.php'; ?>
        </header>

        <!-- //header -->
        <!-- inner banner -->
        <?php include_once './includes/inner_banner.php'; ?>
        <!-- inner banner -->

        <!-- breadcrumbs -->
        <?php include_once './includes/breadcrumbs.php'; ?>	
        <!-- //breadcrumbs -->



        <div class="container">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>firstname</th>
                        <th>lastname</th>
                        <th>email</th>
                        <th>phone</th>
                        <th>description</th>
                        <th>optradio</th>
                        <th>action</th>

                    </tr>
                </thead>

                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "form";

//first step
                $conn = new mysqli('localhost', 'root', '', 'form');
                if ($conn->connect_error) {
                    die("connection failed" . $conn->connect_error);
                }

                $sql = "SELECT firstname, lastname, email, phone, description, optradio,id FROM contact";
                $result = $conn->query($sql);




                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <tr id="<?php echo $row['id'] ?>">
                        <td><?php echo $row['firstname'] ?></td>
                        <td><?php echo $row['lastname'] ?></td>
                        <td><?php echo $row['email'] ?></td>
                        <td><?php echo $row['phone'] ?></td>
                        <td><?php echo $row['description'] ?></td>
                        <td><?php echo $row['optradio'] ?></td>
                        <td><button class="btn btn-danger btn-sm remove">Delete</button></td>
                    </tr>
                <?php } ?>
            </table>
        </div>


        <script type = "text/javascript" language = "javascript">
            $(".remove").click(function () {
                var id = $(this).parents("tr").attr("id");
                if (confirm('Are you sure to remove this record ?'))
                {
                    $.ajax({
                        url: '/delete.php',
                        type: 'GET',
                        data: {id: id},
                        error: function () {
                            alert('Something is wrong');
                        },
                        success: function (data) {
                            $("#" + id).remove();
                            alert("Record removed successfully");
                        }
                    });
                }
            });
        </script>
        
          

        <!-- footer -->	
        <footer>
            <?php include_once './includes/footer.php'; ?>
        </footer>
        <!-- footer -->
        <!-- Login modal -->
        <?php include_once './includes/login.php'; ?>
        <!-- //Login modal -->

        <!-- Register modal -->
        <?php include_once './includes/register.php'; ?>
        <!-- //Register modal -->

        <!-- Gloabl JS Start -->
        <?php include_once './includes/global_js.php'; ?>	
        <!-- Gloabl JS End -->

    </body>
</html>