<?php
$link = mysqli_connect("localhost", "root", "");
mysqli_select_db($link, "skillbridge");
$learnerId = 8; // i want to get it from session
$tutorId = 2; // pass it through url and get it from GET method

if (isset($_POST["subRev"])) {

    if ($_POST["review"] == "") {
        ?>
        <script type="text/javascript">
            alert("Field's Can't be Empty!!!")
        </script>
        <?php
        header("refresh:0.1;url=mainTutorProfile.php");
    } else {

        mysqli_query($link, "insert into feedback values('','$learnerId','$tutorId','$_POST[review]')");
        ?>
        <script type="text/javascript">
                            alert("Feedback added successfully!!!");</script>
        <?php
        header("refresh:0.1;url=mainTutorProfile.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tutor Dashboard</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="../css/TutorProfile.scss">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>        
        <link rel="stylesheet" href="https://unpkg.com/dropzone/dist/dropzone.css" />
        <link href="https://unpkg.com/cropperjs/dist/cropper.css" rel="stylesheet"/>
        <script src="https://unpkg.com/dropzone"></script>
        <script src="https://unpkg.com/cropperjs"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <style type="text/css">
            .product {
                display: none;
            }



            .image_area {
                position: relative;
            }

            img {
                display: block;
                max-width: 100%;
            }

            .preview {
                overflow: hidden;
                width: 160px;
                height: 160px;
                margin: 10px;
                border: 1px solid red;
            }

            .modal-lg{
                max-width: 1000px !important;
            }

            .overlay {
                position: absolute;
                bottom: 10px;
                left: 0;
                right: 0;
                background-color: rgba(255, 255, 255, 0.5);
                overflow: hidden;
                height: 0;
                transition: .5s ease;
                width: 100%;
            }

            .image_area:hover .overlay {
                height: 50%;
                cursor: pointer;
            }

            .text {
                color: #333;
                font-size: 20px;
                position: absolute;
                top: 50%;
                left: 50%;
                -webkit-transform: translate(-50%, -50%);
                -ms-transform: translate(-50%, -50%);
                transform: translate(-50%, -50%);
                text-align: center;
            }

        </style>
    </head>
    <body>
        <div>
            <div id="nav-content"></div>

            <div class="content">
                <div class="container">
                    <div class="row tutorProfileRow" style="margin: 50px;">
                        <div class="col-md-3">
                            <div class="card border-0 position-relative">
                                <label for="profile" style="cursor: pointer;">
                                    <!--<div class="row">-->
                                    <div class="col-md-4">&nbsp;</div>
                                    <!--<div class="col-md-4">-->
                                    <div class="image_area">
                                        <form method="post">
                                            <label for="upload_image">
                                                <img src="../img/Profile-Icon.png" id="uploaded_image" class="img-responsive img-circle" />
                                                <div class="overlay">
                                                    <div class="text">Click to Change Profile Image</div>
                                                </div>
                                                <input type="file" name="image" class="image" id="upload_image" style="display:none" />
                                            </label>
                                        </form>
                                    </div>
                                    <!--</div>-->
                                    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Crop Image Before Upload</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="img-container">
                                                        <div class="row">
                                                            <div class="col-md-8">
                                                                <img src="" id="sample_image" />
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="preview"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" id="crop" class="btn btn-primary">Crop</button>
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>			
                                    <!--</div>-->
                                </label>
                            </div>

                        </div>

                        <div class="col-md-9">
                            <div class="card tutorProfileCard">
                                <div class="card-body">
                                    <h2 class="card-title">
                                        <span id="nameText">Milton</span>
                                        <span class="edit TutorProfileEdit" onclick="editField('nameText', this)">Edit</span>
                                    </h2>
                                    <h6 class="card-subtitle mb-2 text-muted">
                                        <span id="subtitleText">Martial Arts</span>
                                        <span class="edit TutorProfileEdit" onclick="editField('subtitleText', this)">Edit</span>
                                    </h6>
                                    <p class="card-text">
                                        <span id="descriptionText">I am a passionate martial arts instructor with over 10 years of experience. I specialize in various martial arts disciplines, including Karate, Taekwondo, and Judo. My goal is to help my students develop discipline, self-confidence, and physical fitness through martial arts training.</span>
                                        <span class="edit TutorProfileEdit" onclick="editField('descriptionText', this)">Edit</span>
                                    </p>
                                    <small class="text-muted">
                                        100 Tokens
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="container mt-5">
            <!-- Skill Section -->
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h2>Skills by <i>Milton</i></h2>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSkillModal">Add Skill</button>
            </div>

            <div class="modal fade" id="addSkillModal" tabindex="-1" aria-labelledby="addSkillModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addSkillModalLabel">Add Skill and modules</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-4" id="step1">
                                <h6>Select a Skill</h6>
                                <select class="form-select" id="skillSelect">
                                    <option value="" disabled selected>Choose an option</option>
                                    <option value="dance">Dance</option>
                                    <option value="karate">Karate</option>
                                    <option value="painting">Painting</option>
                                    <option value="singing">Singing</option>
                                    <option value="acting">Acting</option>
                                    <option value="guitar">Guitar</option>
                                    <option value="piano">Piano</option>
                                    <option value="cooking">Cooking</option>
                                    <option value="fashion_design">Fashion Design</option>
                                    <option value="interior_design">Interior Design</option>
                                    <option value="photography">Photography</option>
                                    <option value="magic_tricks">Magic Tricks</option>
                                    <option value="pottery">Pottery</option>
                                    <option value="astronomy">Astronomy</option>
                                    <option value="gardening">Gardening</option>
                                    <option value="handicrafts">Handicrafts</option>
                                    <option value="yoga">Yoga</option>
                                    <option value="meditation_mindfulness">Meditation and Mindfulness</option>
                                    <option value="creative_writing">Creative Writing</option>
                                    <option value="graphic_design">Graphic Design</option>
                                </select>
                                <br>
                                <h6>Enter the common Sub title</h6>
                                <input type="text" class="form-control mt-3" id="specialName" placeholder="Special Name (e.g., Karnatic)"> <br>
                                <button class="btn btn-primary" onclick="nextStep('step1', 'step2')">Next</button>
                            </div>

                            <!-- Module Addition -->
                            <div class="mb-4" id="step2" style="display: none;">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h2>Add Modules and Materials</h2>
                                    <button class="btn btn-secondary" onclick="nextStep('step2', 'step1')">Back</button>
                                </div>
                                <div id="modulesContainer">
                                    <!-- Modules will be dynamically added here -->
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <button class="btn btn-primary" onclick="addModule()">Add Module</button>
                                    <div>
                                        <button class="btn btn-primary ml-auto" id="addQuizFinishButton" style="display: none" onclick="nextStep('step2', 'step3')">Add Quiz and Finish</button>
                                    </div>
                                    <!-- Finish Button -->
                                    <div class="d-flex justify-content-end mt-4">
                                        <button class="btn btn-success" data-bs-dismiss="modal" onclick="finishSkillEntry()">Finish</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="row skill-container mb-3">
                <div class="d-flex justify-content-between align-items-center custom-container">
                    <div class="custom-title">
                        <h6>Indian Cooking</h6>
                    </div>
                    <div class="custom-button">
                        <a href="../pages/LearnerViewCourse.php" target="_blank" class="btn btn-primary">View</a>
                    </div>
                </div>
            </div>



            <!-- Review Section -->
            <div class="row reviewSectionRow my-4">
                <div class="col-md-11 tutorProfileReviewW">
                    <h3 class="mb-4">Reviews</h3>
                    <!-- Add Review Form -->
                    <form class="mb-4" method="POST">
                        <div class="mb-3">
                            <label for="reviewText" class="form-label">Write a Review:</label>
                            <textarea class="form-control" id="reviewText" rows="3" style="position: sticky; top: 0;" name="review"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name="subRev">Submit Review</button>
                    </form>
                </div>
            </div>

            <!-- Separate Container for Displayed Reviews -->
            <?php
            $query = "SELECT * FROM feedback";
            $rs_result = mysqli_query($link, $query);
            while ($row = mysqli_fetch_array($rs_result)) {
                $LID = $row["learnerId"];
                $res1 = mysqli_query($link, "select username from user where userid = $LID ");
                $row1 = mysqli_fetch_row($res1);
                $L_Name = $row1[0];
                ?><div class="products">
                    <div class="row reviewContainer product">
                        <div class="col-md-12">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-3">
                                        <img src="https://via.placeholder.com/50" alt="Reviewer's Profile" class="rounded-circle me-3">
                                        <h5 class="card-title"><?php echo $L_Name; ?></h5>
                                    </div>
                                    <p class="card-text"><?php echo $row["review"]; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>

            <button id="seeMore" class="btn btn-primary">See More</button>
            <button id="showLess" class="btn btn-primary">Show Less</button>
            <script>
                const products = document.querySelectorAll('.product');
                const seeMore = document.getElementById('seeMore');
                const showLess = document.getElementById('showLess');
                let visibleCount = 4;
                // Initial display
                for (let i = 0; i < visibleCount; i++) {
                products[i].style.display = 'block';
                }

                seeMore.addEventListener('click', () => {
                for (let i = visibleCount; i < visibleCount + 4 && i < products.length; i++) {
                products[i].style.display = 'block'; //display
                }
                visibleCount += 4; //visible count = visible count+4
                showLess.style.display = 'inline-block'; //showLess button display

                if (visibleCount >= products.length) {
                seeMore.style.display = 'none';
                }
                });
                showLess.addEventListener('click', () => {
                for (let i = visibleCount - 1; i >= visibleCount - 4 && i >= 0; i--) {
                products[i].style.display = 'none'; //non display
                }
                visibleCount -= 4; //visible count = visible count-4
                seeMore.style.display = 'inline-block';
                if (visibleCount <= 4) {
                showLess.style.display = 'none';
                }
                });
            </script>       

        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        <script>
            

                $(document).ready(function () {

                var $modal = $('#modal');
                var image = document.getElementById('sample_image');
                var cropper;
                $('#upload_image').change(function (event) {
                var files = event.target.files;
                var done = function (url) {
                image.src = url;
                $modal.modal('show');
                };
                if (files && files.length > 0)
                {
                reader = new FileReader();
                reader.onload = function (event)
                {
                done(reader.result);
                };
                reader.readAsDataURL(files[0]);
                }
                });
                $modal.on('shown.bs.modal', function () {
                cropper = new Cropper(image, {
                aspectRatio: 1,
                        viewMode: 3,
                        preview: '.preview'
                });
                }).on('hidden.bs.modal', function () {
                cropper.destroy();
                cropper = null;
                });
                $('#crop').click(function () {
                canvas = cropper.getCroppedCanvas({
                width: 400,
                        height: 400
                });
                canvas.toBlob(function (blob) {
                url = URL.createObjectURL(blob);
                var reader = new FileReader();
                reader.readAsDataURL(blob);
                reader.onloadend = function () {
                var base64data = reader.result;
                $.ajax({
                url: 'upload.php',
                        method: 'POST',
                        data: {image: base64data},
                        success: function (data)
                        {
                        $modal.modal('hide');
                        $('#uploaded_image').attr('src', data);
                        }
                });
                };
                });
                });
                });
                function displayImage(input) {
                if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                document.getElementById('profileImage').src = e.target.result;
                };
                reader.readAsDataURL(input.files[0]);
                }
                }
                let moduleCount = 1;
                let moduleAdded = false;
                function nextStep(currentStepId, nextStepId) {
                document.getElementById(currentStepId).style.display = 'none';
                document.getElementById(nextStepId).style.display = 'block';
                }


                function addModule() {
                const moduleForm = `
                        <div class="module-form mb-4">
                <h3>Module ${moduleCount++}</h3>
                <input type="text" class="form-control" placeholder="Module Name (e.g., Module ${moduleCount})">
            <textarea class="form-control mt-2" placeholder="Module Description"></textarea>
            <!-- PDF Input -->
            <div class="mt-2">
                <label for="pdfInput">Upload PDF</label>
            <input type="file" class="form-control" id="pdfInput" accept=".pdf" multiple>
                </div>
                <!-- Text Input -->
                <div class="mt-2">
                <label for="textInput">Enter Text</label>
            <textarea class="form-control" id="textInput" placeholder="Enter Text"></textarea>
</div>
<!-- YouTube Link Input -->
<div class="mt-2">
<label for="youtubeInput">YouTube Link</label>
<input type="text" class="form-control" id="youtubeInput" placeholder="YouTube Link">
    </div>
</div>
                            
`;
document.getElementById('modulesContainer').insertAdjacentHTML('beforeend', moduleForm);

                                       
        }
        function finishSkillEntry() {
// You can add code to handle finishing the skill entry here
// For example, submit the data to a server or perform other actions.
// Then close the modal or do any other necessary actions.
}


        const addSkillModal = document.getElementById('addSkillModal');
        addSkillModal.addEventListener('hidden.bs.modal', function () {
            document.getElementById('step1').style.display = 'block';
            document.getElementById('step2').style.display = 'none';
            document.getElementById('step3').style.display = 'none';
            document.getElementById('skillSelect').value = '';
            document.getElementById('specialName').value = '';
            moduleCount = 1;
            document.getElementById('modulesContainer').innerHTML = '';
        });
        </script>
        <script src="../js/tutorProfile.js"></script>

    </body>
</html>
