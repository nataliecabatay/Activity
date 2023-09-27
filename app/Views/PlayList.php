<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <div class="px-3 my-3">
        <h4 class="bg-info-subtle rounded-3 text-center bg-opacity-50 py-3 text-primary fw-bolder">Music
            Player</h4>
    </div>
    <div class="container">
       <a href="<?php echo base_url('/')?>" class="text-dark text-decoration-none fw-bolder fs-5 d-block mb-5"> <i class="bi bi-chevron-left"></i> Back</a>
       <span class="bg-primary rounded-3 text-white py-2 px-5 fs-5 mb-5">Playlist</span>

       <div class="shadow bg-white rounded-3 mt-4 p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="fw-bolder"><i class="bi bi-music-note-list"></i> <?php echo $playlist['PlayListName'];?></h4>
                <button data-bs-toggle="modal" data-bs-target="#addPlaylist" class="btn btn-info text-white fw-bold">Add New PlayList</button>
                
                <div class="modal fade" id="addPlaylist">
                <div class="modal-dialog">
                    <form method="post" action="<?= site_url('/create-playlist')?>">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4>Create New Playlist</h4>
                        </div>
                        <div class="modal-body">
                            <div class="was-validated">
                                <label class="fw-bolder mb-2">Playlist Name</label>
                                <input placeholder="enter here.." class="form-control" type="text" required name="playlist-name">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-info w-100">Create</button>
                        </div>
                    </div>
                    </form>
                    
                </div>
            </div>

            </div>
            <?php foreach($songs as $song):?>
                <div class="mb-3 bg-light px-3 shadow-sm rounded-3 py-3 d-flex justify-content-between align-items-center">
                <span class="fw-bolder fs-5">
                <i class="bi bi-chevron-right"></i>
                  <?php echo $song['SongName'];?>
                </span>
                <div class="align-items-center d-flex gap-2">
                    <i data-bs-toggle="modal" data-bs-target="#playSong<?php echo $song['Id']?>" class="bi bi-play-circle text-primary fs-4"></i>
                </div>
                <div class="modal fade" id="playSong<?php echo $song['Id']?>">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5>Play Music</h5>
                            </div>
                            <div class="modal-body d-flex align-items-center gap-3">
                                <audio controls>
                                  <source src="../uploads/<?php echo $song['SongName']?>">
                                </audio>
                                <i class="bi bi-music-note-beamed text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach;?>
       </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>