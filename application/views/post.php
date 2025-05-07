<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $post->judul; ?></title>

    <style>
        .post-container {
            position: relative;
            background-image: url('<?= site_url('upload/post/' . $post->cover); ?>');
            background-size: cover;
            background-position: center;
            padding: 100px 20px;
            color: white;
            border-radius: 10px;
            margin-bottom: 30px;
            text-align: center;
            z-index: 1;
        }

        .post-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            border-radius: 10px;
            background: rgba(0, 0, 0, 0.5);
            z-index: -1;
        }

        .post-header {
            text-align: center;
        }

        .post-title {
            font-size: 40px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .post-info {
            font-size: 18px;
            margin: 10px 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .post-info p {
            margin: 0 10px;
        }

        .post-info .rating {
            color: gold;
            font-weight: bold;
        }

        .post-info .genre {
            color: #aaa;
        }

        .post-description p {
            font-size: 18px;
            line-height: 1.6;
            margin: 10px 0;
        }

        .panel-body {
            text-align: center;
        }

        .action-buttons {
            position: absolute;
            top: 20px;
            right: 20px;
            z-index: 2;
        }

        .action-buttons button {
            background: none;
            border: none;
            color: white;
            font-size: 30px;
            cursor: pointer;
            margin-left: 10px;
            transition: transform 0.2s ease;
            padding: 5px 10px;
        }

        .action-buttons button:hover {
            transform: scale(1.1);
        }


        .delete-btn {
            background-color: #D32F2F;
            color: white;
            padding: 10px 20px;
            text-transform: uppercase;
            font-weight: bold;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            text-decoration: none;
            display: block;
            margin: 20px auto;
        }

        .delete-btn:hover {
            background-color: #B71C1C;
        }
    </style>
</head>

<body>
    <div class="post-container">
        <!-- Tombol X (Delete) dan + (Update) di pojok kanan atas -->
        <div class="action-buttons">
            <button onclick="window.location.href='<?= site_url('index.php/welcome/delete/' . $post->id); ?>'">x</button>
            <button onclick="window.location.href='<?= site_url('index.php/welcome/update/' . $post->id); ?>'">+</button>
        </div>

        <div class="post-header">
            <h1 class="post-title"><?= $post->judul; ?></h1>
        </div>

        <div class="post-info">
            <p><strong>Rating: </strong><span class="rating"><?= $post->rating; ?></span></p>
            <p><strong>Genre: </strong><span class="genre"><?= $post->genre; ?></span></p>
        </div>

        <div class="post-description">
            <p><?= $post->deskripsi; ?></p>
        </div>

        <div class="panel-body">
            <?php
            if ($post->trailer_url != '') {
                echo embedYouTubeVideo($post->trailer_url);
            }
            ?>
        </div>
    </div>

    <?php
    function embedYouTubeVideo($videoID)
    {
        $embedURL = 'https://www.youtube.com/embed/' . $videoID;
        return '<iframe width="560" height="315" src="' . $embedURL . '" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>';
    }
    ?>
</body>

</html>