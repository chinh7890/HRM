<?php
require_once("../connect.php");
if (isset($_GET['id'])) {
       $id = $_GET['id'];
}
session_start();
?>
<!doctype html>
<html lang="en">

<head>
       <!-- Required meta tags -->
       <meta charset="utf-8">
       <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
       <title>Form Validation</title>
       <!-- Bootstrap CSS -->
       <link rel="stylesheet" href="../assets/libs/css/style.css">
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.1/dist/css/bootstrap.min.css" rel="stylesheet">

       <!-- file -->
       <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" crossorigin="anonymous"> -->
       <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.min.css" crossorigin="anonymous">
       <link href="../luutrufile/css/fileinput.css" media="all" rel="stylesheet" type="text/css" />
       <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" crossorigin="anonymous">
       <link href="../luutrufile/themes/explorer-fa5/theme.css" media="all" rel="stylesheet" type="text/css" />
       <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
       <script src="../luutrufile/js/plugins/buffer.min.js" type="text/javascript"></script>
       <script src="../luutrufile/js/plugins/filetype.min.js" type="text/javascript"></script>
       <script src="../luutrufile/js/plugins/piexif.js" type="text/javascript"></script>
       <script src="../luutrufile/js/plugins/sortable.js" type="text/javascript"></script>
       <script src="../luutrufile/js/fileinput.js" type="text/javascript"></script>
       <script src="../luutrufile/js/locales/fr.js" type="text/javascript"></script>
       <script src="../luutrufile/js/locales/es.js" type="text/javascript"></script>
       <script src="../luutrufile/themes/fa5/theme.js" type="text/javascript"></script>
       <script src="../luutrufile/themes/explorer-fa5/theme.js" type="text/javascript"></script>
       <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
       <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
       <style>
              .close {
                     display: none;
              }

              /* .fileinput-remove,
              .fileinput-remove-button {
                     display: none;
              } */
       </style>
</head>

<body>
       <?php
              if (isset($_SESSION["loi"]) && $_SESSION["loi"] == "0") {
                     echo "<script type='text/javascript'>toastr.success('Update Employee Successfully')</script>";
              } elseif(isset($_SESSION["loi"]) && $_SESSION["loi"] == "1") {
                     echo "<script type='text/javascript'>toastr.error('The file is not in the correct format or the data already exists')</script>";
              }
              unset($_SESSION["loi"]);
       ?>

       <!-- ============================================================== -->
       <!-- main wrapper -->
       <!-- ============================================================== -->
       <div class="dashboard-main-wrapper">
              <!-- ============================================================== -->
              <!-- navbar -->
              <!-- ============================================================== -->
              <div class="dashboard-header">
                     <nav class="navbar navbar-expand-lg bg-white fixed-top">
                            <a class="navbar-brand" href="../index.html">VENTECH</a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                   <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                                   <ul class="navbar-nav ml-auto navbar-right-top">
                                          <li class="nav-item dropdown nav-user">
                                                 <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../assets/images/avatar-1.jpg" alt="" class="user-avatar-md rounded-circle"></a>
                                                 <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                                        <div class="nav-user-info">
                                                               <h5 class="mb-0 text-white nav-user-name">
                                                                      John Abraham</h5>
                                                               <span class="status"></span><span class="ml-2">Available</span>
                                                        </div>
                                                        <a class="dropdown-item" href="#"><i class="fas fa-user mr-2"></i>Account</a>
                                                        <a class="dropdown-item" href="#"><i class="fas fa-cog mr-2"></i>Setting</a>
                                                        <a class="dropdown-item" href="#"><i class="fas fa-power-off mr-2"></i>Logout</a>
                                                 </div>
                                          </li>
                                   </ul>
                            </div>
                     </nav>
              </div>
              <!-- ============================================================== -->
              <!-- end navbar -->
              <!-- ============================================================== -->
              <!-- ============================================================== -->
              <!-- left sidebar -->
              <!-- ============================================================== -->
              <div class="nav-left-sidebar sidebar-dark" id="sidebar">
                     <div class="menu-list">
                            <nav class="navbar navbar-expand-lg navbar-light">

                                   <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                                   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                          <span class="navbar-toggler-icon"></span>
                                   </button>
                                   <div class="collapse navbar-collapse" id="navbarNav">
                                          <ul class="navbar-nav flex-column">
                                                 <li class="nav-divider">
                                                        Menu
                                                 </li>
                                                 <li class="nav-item">
                                                        <a class="nav-link" href="./list-employee.php">List Employee</a>
                                                 </li>
                                          </ul>
                                   </div>
                            </nav>
                     </div>
              </div>
              <!-- ============================================================== -->
              <!-- end left sidebar -->
              <!-- ============================================================== -->
              <!-- ============================================================== -->
              <!-- wrapper  -->
              <!-- ============================================================== -->
              <div class="dashboard-wrapper">
                     <div class="container-fluid  dashboard-content">
                            <!-- ============================================================== -->
                            <!-- pageheader -->
                            <!-- ============================================================== -->
                            <div class="row">
                                   <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                          <div class="page-header">
                                                 <h2 class="pageheader-title">Personal Profile</h2>
                                          </div>
                                   </div>
                                   <div class="container">
                                          <form action="../luutrufile/examples/upload.php?action=PersonalProfile&id=<?php echo $id ?>" method="post" enctype="multipart/form-data">
                                                 <input type="hidden" name="" id="id" value="<?php echo $id ?>">
                                                 <input id="per-pro" name="file[]" type="file" data-preview-file-type="" multiple>
                                          </form>
                                   </div>
                            </div>
                            <div class="row">
                                   <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                          <div class="page-header">
                                                 <h2 class="pageheader-title">Certificate</h2>
                                          </div>
                                   </div>
                                   <div class="container">
                                          <form action="../luutrufile/examples/upload.php?action=Certificate&id=<?php echo $id ?>" method="post" enctype="multipart/form-data">
                                                 <input id="certificate" name="file[]" type="file" data-preview-file-type="" multiple>
                                          </form>
                                   </div>
                            </div>


                     </div>


              </div>

       </div>

       <script>
              $(document).ready(function() {
                     var url = "../luutrufile/examples/get_files.php?action=PersonalProfile&id=" + document.getElementById("id").value;
                     var id = document.getElementById("id").value;
                     $.ajax({
                            url: url,
                            dataType: "json",
                            success: function(data) {
                                   var initialPreview = [];
                                   var initialPreviewConfig = [];
                                   for (var i = 0; i < data.length; i++) {
                                          initialPreview.push("../assets/files/" + data[0].employee_code + "/PersonalProfile/" + data[i].profile);
                                          initialPreviewConfig.push({
                                                 type: "pdf",
                                                 caption: data[i].profile,
                                                 showRemove: true,
                                                 filename: data[i].profile,
                                                 url: '../luutrufile/examples/delete_file.php?action=PersonalProfile',
                                                 extra: {
                                                        id: id,
                                                        filename: data[i].profile,
                                                        employee_code: data[0].employee_code
                                                 },
                                                 key: i,
                                          });
                                          var code = data[0].employee_code
                                   }
                                   $("#per-pro").fileinput({
                                          uploadAsync: false,
                                          initialPreviewDownloadUrl: '../assets/files/' + code + '/PersonalProfile/{filename}',
                                          uploadAsync: false,
                                          overwriteInitial: false,
                                          initialPreview: initialPreview,
                                          initialPreviewAsData: true,
                                          initialPreviewFileType: 'image',
                                          initialPreviewConfig: initialPreviewConfig,
                                          uploadExtraData: {
                                                 img_key: "1000",
                                                 img_keywords: "happy, nature",
                                          },
                                          preferIconicPreview: true,
                                          previewFileIconSettings: {
                                                 'pdf': '<i class="fas fa-file-pdf text-danger"></i>',
                                                 'xlsx': '<i class="fas fa-file-excel text-success"></i>',
                                                 'doc': '<i class="fas fa-file-word text-primary"></i>',
                                                 'ppt': '<i class="fas fa-file-powerpoint text-danger"></i>',
                                          },
                                          previewFileExtSettings: {
                                                 'doc': function(ext) {
                                                        return ext.match(/(doc|docx)$/i);
                                                 },
                                                 'pdf': function(ext) {
                                                        return ext.match(/(pdf)$/i);
                                                 },
                                                 'xls': function(ext) {
                                                        return ext.match(/(xls|xlsx)$/i);
                                                 },
                                                 'ppt': function(ext) {
                                                        return ext.match(/(ppt|pptx)$/i);
                                                 },
                                          }
                                   }).on('filesorted', function(e, params) {
                                          console.log('File sorted params', params);
                                   }).on('fileuploaded', function(e, params) {
                                          console.log('File uploaded params', params);
                                   }).on('filedeleted', function(event, key, jqXHR, data) {
                                          console.log('File deleted', data);
                                   });
                            }
                     });
              });
       </script>
       <script>
              $(document).ready(function() {
                     var url = "../luutrufile/examples/get_files.php?action=Certificate&id=" + document.getElementById("id").value;
                     var id = document.getElementById("id").value;
                     $.ajax({

                            url: url,
                            dataType: "json",
                            success: function(data) {
                                   var initialPreview = [];
                                   var initialPreviewConfig = [];
                                   for (var i = 0; i < data.length; i++) {
                                          initialPreview.push("../assets/files/" + data[0].employee_code + "/Certificate/" + data[i].certificate);
                                          initialPreviewConfig.push({
                                                 type: "pdf",
                                                 caption: data[i].certificate,
                                                 showRemove: true,
                                                 filename: data[i].certificate,
                                                 url: '../luutrufile/examples/delete_file.php?action=Certificate',
                                                 extra: {
                                                        id: id,
                                                        filename: data[i].certificate,
                                                        employee_code: data[0].employee_code
                                                 },
                                                 key: i,
                                          });
                                          var code = data[0].employee_code;
                                   }
                                   $("#certificate").fileinput({
                                          initialPreviewDownloadUrl: "../assets/files/" + code + "/{filename}",
                                          uploadAsync: false,
                                          overwriteInitial: false,
                                          initialPreview: initialPreview,
                                          initialPreviewAsData: true,
                                          initialPreviewFileType: 'image',
                                          initialPreviewConfig: initialPreviewConfig,
                                          uploadExtraData: {
                                                 img_key: "1000",
                                                 img_keywords: "happy, nature",
                                          },
                                          preferIconicPreview: true,
                                          previewFileIconSettings: {
                                                 'pdf': '<i class="fas fa-file-pdf text-danger"></i>',
                                                 'xlsx': '<i class="fas fa-file-excel text-success"></i>',
                                                 'doc': '<i class="fas fa-file-word text-primary"></i>',
                                                 'ppt': '<i class="fas fa-file-powerpoint text-danger"></i>',
                                          },
                                          previewFileExtSettings: {
                                                 'doc': function(ext) {
                                                        return ext.match(/(doc|docx)$/i);
                                                 },
                                                 'pdf': function(ext) {
                                                        return ext.match(/(pdf)$/i);
                                                 },
                                                 'xls': function(ext) {
                                                        return ext.match(/(xls|xlsx)$/i);
                                                 },
                                                 'ppt': function(ext) {
                                                        return ext.match(/(ppt|pptx)$/i);
                                                 },
                                          }
                                   }).on('filesorted', function(e, params) {
                                          console.log('File sorted params', params);
                                   }).on('fileuploaded', function(e, params) {
                                          console.log('File uploaded params', params);
                                   }).on('filedeleted', function(event, key, jqXHR, data) {
                                          console.log('File deleted', data);
                                   });
                            }
                     });
              });
       </script>
</body>

</html>