<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<h6><?= validation_errors(); ?></h6>
<h6><?= $this->session->flashdata('error'); ?></h6>

<div class="row">
  <form action="<?= site_url('index.php/welcome/create'); ?>" method="post" enctype="multipart/form-data" class="col s12">
    <div class="row">
      <div class="input-field col s12">
        <input name="judul" id="judul" type="text" class="validate">
        <label for="judul">Title</label> 
      </div>
    </div>
    <div class="row">
      <div class="input-field col s12">
        <textarea name="deskripsi" id="deskripsi" class="materialize-textarea"></textarea>
        <label for="deskripsi">Description</label>
      </div>
    </div>
    <div class="row">
      <div class="input-field col s12">
        <input name="rating" id="rating" type="text" class="validate">
        <label for="rating">Rating</label>
      </div>
    </div>
    <div class="row">
      <div class="input-field col s12">
        <input name="tahun" id="tahun" type="number" class="validate">
        <label for="tahun">Year</label>
      </div>
    </div>
    <div class="row">
      <div class="input-field col s12">
        <input name="genre" id="genre" type="text" class="validate">
        <label for="genre">Genre</label> 
      </div>
    </div>
    <div class="file-field input-field">
      <div class="btn light-blue darken-4">
        <span>Select File</span>
        <input type="file" name="cover" accept=".jpg,.png,.jpeg"> 
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text">
      </div>
    </div>
    <div class="row">
      <div class="input-field col s12">
        <textarea name="trailer_url" id="trailer_url" class="materialize-textarea"></textarea>
        <label for="trailer_url">Trailer URL</label> 
      </div>
    </div>
    <div class="row center">
      <div class="input-field col s12">
        <button type="submit" class="btn light-blue darken-4">Create</button>
      </div>
    </div>
  </form>
</div>
