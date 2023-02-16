<!-- Sweet Alert -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php
include('./db.php');
$connect = dbConnect();


$method = $_GET['method'];
switch($method) {
    case 'delete':
        if(isset($_GET['postID'])) {
            $post = $_GET['postID'];
            $sql = "DELETE FROM posts WHERE id = $post";
            if (mysqli_query($connect, $sql)) {
                 header('Location: ./index.php');
            } else {
                 echo "An error occured.";
            }
        }
        break;
    case 'add':
        if (isset($_POST['title'], $_POST['content'], $_POST['img_link'])) {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $img_link = $_POST['img_link'];
            $sql = "INSERT INTO posts (title, content, img_link) VALUES ('$title', '$content', '$img_link')";
        
            if (mysqli_query($connect, $sql)) {
                ?>
                <script>
                    swal({
                        title: "Success",
                        text: "Data inserted",
                        icon: "success",
                        button: "Aww yiss!",
                    });
                </script>
                <?php
                header('Location: ./index.php');
            } else {
                echo "An error occured.";
            }
        }
        break;
    case 'edit':
        if (isset($_POST['postID'])) {
            $postID = $_POST['postID'];
            $title = $_POST['title'];
            $content = $_POST['content'];
            $img_link = $_POST['img_link'];
            $sql = "UPDATE posts SET title = '$title', content = '$content', img_link = '$img_link' WHERE id = $postID";
            if (mysqli_query($connect, $sql)) {
                header('Location: ./index.php');
            } else {
                echo "An error occured.";
            }
        }
    default:
        echo "Unknown Method.";
}

?>