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
        <div class="d-flex gap-3 mb-5   ">
            <div class="d-flex flex-column text-center">
                <a data-bs-toggle="modal" data-bs-target="#playListModal"
                    class="p-3 rounded-3 bg-primary text-white fs-4 shadow"><i class="bi bi-music-note-list"></i></a>
                <span class="text-secondary">Playlist</span>

                <div class="modal fade" id="playListModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4>PlayList</h4>
                                <i class="bi bi-music-note-list"></i>
                            </div>
                            <div class="modal-body">
                                <?php foreach($playlist as $playL):?>
                                <a href="<?php echo base_url('playlist/').$playL['Id'];?>"
                                    class="text-dark text-decoration-none bg-light mb-3 shadow-sm px-3 py-2 rounded-3 d-flex align-items-center justify-content-between">
                                    <span class="text-center w-100 fw-bolder fs-5"><?php echo($playL['PlayListName']);?></span>
                                    <form method="post" action="<?= site_url('/delete-playlist')?>">
                                        <input type="hidden" value="<?php echo $playL['Id'];?>" name="p-id">
                                        <button type="submit" class="border border-0 bg-transparent p-0">
                                        <i class="bi bi-trash text-danger"></i>
                                        </button>
                                    </form>
                                </a>
                                <?php endforeach;?>
                            </div>
                            <div class="modal-footer">
                                    <button data-bs-dismiss="modal" class="btn btn-secondary">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex flex-column text-center">
                <a data-bs-toggle="modal" data-bs-target="#addSongModal"
                    class="p-3 rounded-3 bg-primary text-white fs-4 shadow"><i class="bi bi-box-arrow-in-down"></i></a>
                <span class="text-secondary">Upload</span>
            </div>
            <div class=" align-items-center float-end w-100 d-flex justify-content-end">
 <!--===============================--><input  id="search-music" type="search" placeholder="search music.." class="w-50 form-control">
            </div>
            <div class="modal fade" id="addSongModal">
                <div class="modal-dialog">
                    <form method="post" action="<?= site_url('/upload-song')?>" enctype="multipart/form-data">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4>Upload Song</h4>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3 was-validated">
                                <label class="fw-bolder mb-2">PlayList</label>
                                <select class="form-select" required name="playlist">
                                    <?php foreach($playlist as $playL):?>
                                    <option value="<?php echo($playL['Id']);?>">
                                        <?php echo($playL['PlayListName']);?>
                                    </option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="was-validated">
                                <label class="fw-bolder mb-2">Song Name</label>
                                <input required class="form-control" type="file" name="song-name">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" data-bs-dismiss="modal" class="btn btn-info w-100">Upload Song</button>
                        </div>
                    </div>
                    </form>
                    
                </div>
            </div>
        </div>
        <div class="">
            <?php if($songs): ?>
            <?php foreach($songs as $song): ?>
            <div  class="music-container mb-3  px-3 shadow-sm rounded-3 py-3 d-flex justify-content-between align-items-center">
                <span class="music-list fw-bolder fs-5">
                <i class="bi bi-chevron-right"></i>
                    <?php echo $song['SongName']?>
                </span>
                <div class="align-items-center d-flex gap-2">
                    <i data-bs-toggle="modal" data-bs-target="<?php echo"#play-song".$song['Id'];?>" class="bi bi-play-circle text-primary fs-4"></i>
                    <a href="<?php echo base_url('delete-song/').$song['Id'];?>" class="text-decoration-none bi bi-trash text-danger fs-4"></a>
                </div>

                <div class="modal fade" id="<?php echo"play-song".$song['Id']?>">
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
            <?php endforeach; ?>
            <?php endif; ?>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

        <script>
       $(function () {
            $("#search-music").on('change', function () {
                var sample = $("#search-music").val().trim(); // Trim any leading/trailing whitespace
                $(".music-container").each(function(){
                    var result = $(this).find('.music-list').text().trim(); // Trim any leading/trailing whitespace
                    if(result.indexOf(sample) === -1) {
                        $(this).addClass("d-none"); // Add the class if not found
                    } else {
                        $(this).removeClass("d-none"); // Remove the class if found
                    }
                });
            });
        });

    </script>
</body>

</html>