<?php
include('./db.php');
$connect = dbConnect();

$sql = "SELECT * FROM posts";
$query = mysqli_query($connect, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="icon.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arizonia&family=Josefin+Sans:wght@400;700&family=Julee&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="adjustments.css">
    <link href="styles.css" rel="stylesheet">

    <title>Bake My Day</title>

</head>

<body>

    <!-- Header & Nav -->

    <header>
        <section class="flex justify-center bg-pink-100 items-center text-gray-800">
            <div class="container flex justify-between items-center py-2">
                <div class="md:text-sm">
                    <p><strong>SUBSCRIBE</strong> To receive updates on latest posts!</p>
                </div>
                <div>
                    <form action="">
                        <input class="p-1 rounded outline-0" type="text" placeholder="First Name">
                        <input class="p-1 rounded outline-0" type="email" placeholder="E-Mail Address">
                        <button class="bg-pink-500 hover:bg-pink-400 px-4 py-2 rounded text-white"><a href="#">Subscribe</a>
                        </button>
                    </form>
                </div>
            </div>
        </section>
        <section class="container items-center mx-auto text-center">
            <h1 class="blog-title">Bake My Day</h1>
            <p class="blog-tagline">Every recipe is a masterpiece!</p>
        </section>
    </header>

    <nav class=" text-gray-800 py-4 flex justify-center">
        <div class="container flex justify-center items-center">
            <a href="index.php" class="px-4 py-2 hover:text-pink-500 mr-4">Home</a>
            <a href="#" class="px-4 py-2 hover:text-pink-500 mr-4">Recipes</a>
            <a href="#" class="px-4 py-2 hover:text-pink-500 mr-4">About</a>
            <a href="#" class="px-4 py-2 hover:text-pink-500 mr-4">Contact</a>
            <a href="#" class="px-4 py-2 hover:text-pink-500 mr-4">FAQ</a>
            <a href="#" class="px-4 py-2 hover:text-pink-500 mr-4">Search</a>
        </div>
    </nav>

    <main class="container mx-auto flex py-4 my-4">
        <section class="sm:w-full md:w-2/3 xl:w-3/4">

            <h2 class="text-2xl font-bold mb-4">Create A New Entry...</h2>
            <div class="-mx-2">
                <div class="w-100 px-2 mb-4">
                    <div class="bg-white rounded p-4 border-2 border-pink-200">

                        <form action="./post_validate.php?method=add" method="POST">
                            <div class="mb-4">
                                <label for="" class="text-pink-400 font-bold">Title:</label>
                                <input type="text" name="title" class="mt-1 rounded border-2 border-gray-100 outline-1 outline-pink-400 w-full p-2" placeholder="Title of your post">
                            </div>
                            <div class="mb-4">
                                <label for="" class="text-pink-400 font-bold">Content:</label>
                                <textarea name="content" id="" cols="30" rows="10" class="mt-1 rounded border-2 border-gray-100 outline-1 outline-pink-400  w-full p-2" placeholder="Write your content here"></textarea>
                            </div>
                            <div class="mb-4">
                                <label for="" class="text-pink-400 font-bold">Cover Image URL/Link:</label>
                                <input name="img_link" type="text" class="mt-1 rounded border-2 border-gray-100  outline-1 outline-pink-400 w-full p-2" placeholder="https://">
                            </div>

                            <button type="submit" class="bg-pink-500 hover:bg-pink-200 px-4 py-2 rounded text-white"><a href="#">Post Entry</a>
                            </button>
                        </form>

                    </div>
                </div>
            </div>

            <h2 class="text-2xl font-bold mt-12 mb-4 pt-3">Latest Posts...</h2>
            <div class="flex flex-wrap -mx-2 flex-col-reverse">

                <?php
                if (mysqli_num_rows($query) > 0) {
                    while ($row = mysqli_fetch_assoc($query)) {
                        // echo "id: $row[id] title: $row[title] content: $row[content] img_link: $row[img_link] <br>";
                        echo "
                            <div class='w-full px-2 mb-4'>
                                <div class='bg-white rounded p-4 border-2 border-pink-200'>

                                    <img src='$row[img_link]' class='w-full h-100 object-cover'>

                                    <h3 class='text-xl font-bold mt-4'>$row[title]</h3>

                                    <p class='text-gray-600 mb-4'>$row[content]</p>

                                    <button class='bg-pink-500 hover:bg-pink-400 mt-4 px-4 py-2 rounded text-white'><a href='./update_post.php?postID=$row[id]'>Update Entry</a>
                                    </button>

                                    <button class='bg-pink-500 hover:bg-pink-400 mt-4 px-4 py-2 rounded text-white'><a href='./post_validate.php?method=delete&postID=$row[id]'>Delete Entry</a>
                                    </button>

                                </div>
                            </div>
                        ";
                    }
                } else {
                    echo "<div>No result</div>";
                }
                ?>

            </div>
        </section>

        <section class="sm:w-full md:w-1/3 md:ml-4 xl:ml-12 xl:w-1/4 mt-6">
            <!-- About Author -->
            <div class="w-full bg-gray-100 border-2 border-pink-200 rounded p-6 mt-6">
                <h2 class="text-2xl font-bold mb-4">About the Author</h2>
                <div class="flex items-center mb-4">
                    <img src="./img/profile.jpg" alt="Author profile picture" class="w-12 h-12 rounded-full mr-4">
                    <div>
                        <p class="text-lg font-medium">Mary Jane Salem</p>
                        <p class="text-sm text-gray-600">Baking Enthusiast & Blogger</p>
                    </div>
                </div>
                <p class="text-sm text-gray-600 mb-4">
                    Hi there! I'm Jane, a baking enthusiast and self-taught baker who's obsessed with all things sweet and delicious. I started this blog as a way to share my love for baking and showcase my favorite recipes, from classic chocolate chip cookies to show-stopping layer cakes. When I'm not in the kitchen whipping up a new treat, you can find me experimenting with new ingredients and techniques or trying out recipes from my favorite cookbooks. Join me on this sweet journey and let's bake some memories together!
                </p>
                <button class="bg-pink-500 hover:bg-pink-400 px-4 py-2 rounded text-white"><a href="#">Read More</a>
                </button>
            </div>

        </section>

    </main>

    <!-- Footer -->

    <footer class="bg-pink-100 pt-5">
        <div class="container mx-auto text-center mt-6">
            <h3 class="text-xl font-medium text-gray-800 mb-4">Sweet Treats Await!</h3>
            <p class="text-sm text-gray-600 mb-8">Join me on my journey through the world of baking!</p>
            <div class="flex justify-center">
                <button class="bg-pink-500 hover:bg-pink-400 px-4 py-2 rounded text-white"><a href="#">Subscribe</a>
                </button>
            </div>
        </div>
        <div class="container mx-auto flex items-center justify-between mt-6">
            <p class="text-sm text-gray-600">&copy; 2023 Bake My Day</p>
            <div class="flex items-center">
                <a href="#" class="text-pink-500 hover:text-pink-600 mr-4">Facebook</a>
                <a href="#" class="text-pink-500 hover:text-pink-600 mr-4">Twitter</a>
                <a href="#" class="text-pink-500 hover:text-pink-600">Instagram</a>
            </div>
        </div>
    </footer>

</body>

</html>

