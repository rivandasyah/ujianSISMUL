<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<h6><?php echo validation_errors(); ?></h6>
<h6><?php echo $this->session->flashdata('error'); ?></h6>

<div class="row">
  <form action="<?php echo site_url('index.php/welcome/update/' . $post->id); ?>" method="post" enctype="multipart/form-data">
    <div class="row">
      <div class="input-field col s12">
        <input name="judul" id="judul" type="text" class="validate" value="<?php echo $post->judul; ?>"> <!-- Ganti 'name' menjadi 'judul' -->
        <label for="judul">Item Name</label>
      </div>
      <div class="input-field col s12">
        <textarea name="deskripsi" id="deskripsi" class="materialize-textarea"><?php echo $post->deskripsi; ?></textarea> <!-- Ganti 'description' menjadi 'deskripsi' -->
        <label for="deskripsi">Description</label>
      </div>
      <div class="input-field col s12">
        <input name="tahun" id="tahun" type="text" class="validate" value="<?php echo $post->tahun; ?>"> <!-- Ganti 'year' menjadi 'tahun' -->
        <label for="tahun">Year</label>
      </div>
      <div class="center col s12">
        <img class="responsive-img" id="image" style="max-height:30vh;" src="<?php echo site_url('upload/post/' . $post->cover); ?>"> <!-- Menampilkan cover yang ada -->
      </div>
      <div class="file-field input-field col s12">
        <div class="btn light-blue darken-4">
          <span>Image</span>
          <input name="cover" type="file" id="cover">
        </div>
        <div class="file-path-wrapper">
          <input class="file-path validate" type="text" onchange="thumbnail();" name="file">
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input name="rating" id="rating" type="text" class="validate" value="<?php echo $post->rating; ?>">
          <label for="rating">Rating</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input name="genre" id="genre" type="text" class="validate" value="<?php echo $post->genre; ?>">
          <label for="genre">Genre</label>
        </div>
      </div>
      <div id="yt-preview" class="center-align" style="margin-top:20px;">
        <?php
        if ($post->trailer_url != '') {
          echo embedYouTubeVideo($post->trailer_url);
        }
        ?>
      </div>
      <div class="input-field col s12">
        <textarea name="trailer_url" id="trailer_url" class="materialize-textarea"><?php echo $post->trailer_url; ?></textarea>
        <label for="trailer_url">Trailer URL</label>
      </div>
    </div>
    <div class="col s12 center">
      <button class="btn light-blue darken-4" type="submit">Submit</button>
    </div>
  </form>
</div>

<script type="text/javascript">
  var elem = document.querySelector('#deskripsi');
  M.textareaAutoResize(elem);

  function thumbnail() {
    var preview = document.querySelector('#image');
    var file = document.querySelector('input[type=file]').files[0];
    var reader = new FileReader();

    reader.onloadend = function() {
      preview.src = reader.result;
    }

    if (file) {
      reader.readAsDataURL(file);
    } else {
      preview.src = "";
    }
  }
</script>

<?php
function embedYouTubeVideo($videoID)
{
  $embedURL = 'https://www.youtube.com/embed/' . $videoID;
  return '<iframe width="560" height="315" src="' . $embedURL . '" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>';
}
?>