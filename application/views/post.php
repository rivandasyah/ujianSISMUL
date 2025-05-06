<div class="row">
  <div class="col s12">
    <div class="row center">
      <h1><?= $post->judul; ?></h1> <!-- Ganti 'name' menjadi 'judul' -->
    </div>
    <div class="row">
      <div class="center col s6">
        <a href="<?= site_url('welcome/delete/'.$post->id); ?>" class="red-text">Delete</a>
      </div>
      <div class="center col s6">
        <a href="<?= site_url('welcome/update/'.$post->id); ?>" class="blue-text">Update</a>
      </div>
    </div>
    <div class="row center">
      <img src="<?= site_url('upload/post/'.$post->cover); ?>" alt="Post's Image" class="circle" width="100vw" height="100vh"> <!-- Menampilkan cover -->
    </div>
    <div class="row">
      <p><?= $post->deskripsi; ?></p> <!-- Menampilkan deskripsi -->
      <p><strong>Rating: </strong><?= $post->rating; ?></p> <!-- Menampilkan rating -->
      <p><strong>Genre: </strong><?= $post->genre; ?></p> <!-- Menampilkan genre -->
    </div>
    <div class="panel-body">
      <?php 
      if ($post->trailer_url != '') {  // Cek apakah ada trailer_url
        echo embedYouTubeVideo($post->trailer_url); 
      }
      ?>   
    </div>
  </div>
</div>
