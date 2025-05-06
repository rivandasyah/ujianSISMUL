<ul class="collection">
    <?php foreach ($home_post as $data) :?>
        <li class="collection-item avatar">
            <img src="<?=site_url('upload/post/'.$data['cover'])?>" alt="" class="circle">
            <p class="title"><?= $data['judul']; ?></p> 
            <p class="rating"><?= $data['rating']; ?></p> 
            <small> <?= $data['deskripsi']; ?> </small> 
            <a href="<?=site_url('welcome/index/'.$data['id'])?>" class="secondary-content">
                <i class="material-icons">visibility</i>   
            </a>
            <div class="panel-body">
            <?php 
            if ($data['trailer_url'] != ''){  
                echo embedYouTubeVideo($data['trailer_url']); 
            }
            ?>   
            </div>
        </li>   
    <?php endforeach;?>
</ul>

<button class="btn red">
    <a onclick="return confirm('Apakah kamu yakin ingin menghapus semua data ini ?')" href="<?php echo site_url('welcome/deleteAll')?>"> DELETE ALL</a>
</button>

<?php
    function embedYouTubeVideo($videoID) {
        $embedURL = 'https://www.youtube.com/embed/'.$videoID;
        return '<iframe width="560" height="315" src="'.$embedURL.'" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>';
    }
?>