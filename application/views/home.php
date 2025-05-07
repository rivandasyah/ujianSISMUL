<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <style>
        .movie-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
            margin: 20px;
        }

        .movie-item {
            background-color: #333;
            border-radius: 10px;
            overflow: hidden;
            color: white;
            text-align: center;
            padding: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
            transition: transform 0.3s, box-shadow 0.3s; 
        }

        .movie-item:hover {
            transform: scale(1.05); 
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.7); 
        }

        .movie-item img {
            width: 100%;
            height: 250px; 
            object-fit: cover; 
            border-radius: 10px;
        }

        .movie-title {
            font-size: 18px;
            font-weight: bold;
            margin-top: 10px;
        }

        .movie-year-rating {
            font-size: 14px;
            color: #aaa;
            margin-top: 5px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .movie-rating {
            color: gold;
            font-weight: bold;
            margin-left: 5px; 
        }

        .star-icon {
            color: gold;
            font-size: 18px; 
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
            margin-bottom: 20px;
        }

        .delete-btn:hover {
            background-color: #B71C1C;
        }
    </style>
</head>
<body>
    <div class="movie-grid">
        <?php foreach ($home_post as $data) : ?>
            <div class="movie-item">
                <a href="<?= site_url('index.php/welcome/index/'.$data['id']); ?>" style="text-decoration: none; color: white;">
                    <img src="<?= site_url('upload/post/'.$data['cover']) ?>" alt="<?= $data['judul']; ?>">
                    
                    <div class="movie-title"><?= $data['judul']; ?></div>
                    <div class="movie-year-rating">
                        <div><?= $data['tahun']; ?> | 
                        <span class="movie-rating"><?= $data['rating']; ?></span></div>
                        <span class="star-icon material-icons">star</span> 
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>

    <button class="delete-btn">
        <a onclick="return confirm('Apakah kamu yakin ingin menghapus semua data ini ?')" href="<?php echo site_url('index.php/welcome/deleteAll'); ?>" class="delete-btn">DELETE ALL</a>
    </button>

</body>
</html>
