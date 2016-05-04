<?php
/**
 * Created by PhpStorm.
 * User: dvp-evisa
 * Date: 4/27/2016
 * Time: 4:26 PM
 */



require('includes/application_top.php');
//require(DIR_WS_INCLUDES . 'template_top.php');
?>
<link href="ext/dropzone/dropzone.min.css" rel="stylesheet">

<form action="upload.php" class="dropzone" drop-zone="" id="file-dropzone"></form>
<script src="ext/jquery/jquery-1.11.1.min.js"></script>
<script src="ext/dropzone/dropzone.min.js"></script>
<?php
  //require(DIR_WS_INCLUDES . 'template_bottom.php');
  require(DIR_WS_INCLUDES . 'application_bottom.php');
?>

<script type="text/javascript">
//    $(document).ready(function(){
//        Dropzone.autoDiscover = false;
//        $("div#dropzone").dropzone({
//            url: "api/Image",
//            addRemoveLinks: true,
//            uploadMultiple: true, // Adding This
//            dictRemoveFile: 'X (remove)',
//            maxFilesize: 1, // MB
//            accept: function(file, done) {
//                if (file.name == "justinbieber.jpg") {
//                    done("Naha, you don't.");
//                }
//                else { done(); }
//            }
//        });
//    });
    //DropzoneJS snippet - js
//
//    $.getScript('http://cdnjs.cloudflare.com/ajax/libs/dropzone/3.8.4/dropzone.min.js',function(){
        // instantiate the uploader
        $('#file-dropzone').dropzone({
            url: "upload.php",
            maxFilesize: 100,
            maxThumbnailFilesize: 5,
            init: function() {
                this.on('success', function(file, json) {
                    console.log(json);
                    console.log(file);
                });

                this.on('addedfile', function(file) {
                    console.log(file);
                });

                this.on('drop', function(file) {
                    alert('file');
                });
            }
        });
//    });

    $(document).ready(function() {});
</script>