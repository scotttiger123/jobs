@extends('layouts.layouts-vertical-candidate.app')
@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Main Content -->
        <div class="row">
            <!-- Left Column for Resume Upload -->
            <div class="col-md-8">
                <div class="bs-stepper">
                    <div class="bs-stepper-header" role="tablist">
                        <div class="step" data-target="#logins-part">
                            <button type="button" class="step-trigger" role="tab" aria-controls="logins-part" id="logins-part-trigger">
                                <span class="bs-stepper-circle">1</span>
                                <span class="bs-stepper-label">Contact info</span>
                            </button>
                        </div>
                        <div class="line"></div>
                        <div class="step" data-target="#information-part">
                            <button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger">
                                <span class="bs-stepper-circle">2</span>
                                <span class="bs-stepper-label">Add a resume</span>
                            </button>
                        </div>
                        <div class="line"></div>
                        <div class="step" data-target="#submit-part">
                            <button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="submit-part-trigger">
                                <span class="bs-stepper-circle">3</span>
                                <span class="bs-stepper-label">Submit Application</span>
                            </button>
                        </div>
                    </div>
                    <div class="bs-stepper-content">
                        <div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">

                        <div class="card card-primary card-outline mx-auto mt-4">
                                <div class="card-body box-profile">
                                    <div class="form-group">
                                        <label for="">First Name </label>
                                        <input type="text" id="apply_job_first_name" name="" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Last Name </label>
                                        <input type="text" id="apply_job_last_name" name="" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Email*</label>
                                        <input type="text" id="apply_job_email" name="" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Phone*</label>
                                        <input type="text" id="apply_job_phone" name="" class="form-control">
                                    </div>
                                </div>
                            </div>



                        </div>
                        <div id="information-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                            <div class="card card-primary card-outline mx-auto mt-4">
                                <div class="card-body box-profile">
                                    <h2>Add a resume for the employer</h2>
                                    
                                    <form action="" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="icheck-primary d-inline" style = "margin-bottom:20px">
                                            <input type="radio" id="radioPrimary1" name="r1" checked>
                                            <label for="radioPrimary1">
                                                  Saved Resume
                                            </label>
                                            
                                        </div>   
                                        <br>
                                        <div  style = "margin:20px">
                                            <button type="button" class="btn btn-default btn-file">Edit Resume</button>
                                            
                                        </div>    
                                    
                           
                                        <hr>
                                        <div class="form-group">
                                        <div class="icheck-primary d-inline">
                                          <input type="radio" id="radioPrimary2" name="r1">
                                            <label for="radioPrimary2">Upload CV
                                            </label>
                                        </div>
                                           
                                        <div style="margin: 20px;">
                                            <div class="input-group">
                                                <label class="input-group-btn">
                                                    <span class="btn btn-default">
                                                        <i class="fas fa-paperclip"></i> Upload
                                                        <input type="file" name="attachment" id="fileInput" style="display: none" accept=".pdf">
                                                    </span>
                                                </label>
                                                <input type="text" class="form-control" readonly id="fileDisplay">
                                            </div>
                                            <p class="help-block" id="fileTypeMessage">Accepted file type is PDF</p>
                                        </div>
                                        </div>   
                                        <!-- A div to display the selected PDF file -->
                                        <div id="selectedCV1" style="margin: 20px;"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div id="submit-part" class="content" role="tabpanel" aria-labelledby="submit-part-trigger">
                        <div class="card card-primary card-outline mx-auto mt-4">
                            <div class="card-body box-profile">
                                    <h2> Please review your application  </h2>

                                            <div class="contact-card">
                                                <h4 class="contact-heading">Contact Information</h4>
                                                <div class="contact-info" id="contact_info">
                                                    <div class="contact-item" id="full_name">John Doe</div>
                                                    <div class="contact-item" id="email">john@example.com</div>
                                                    <div class="contact-item" id="phone">123-456-7890</div>
                                                </div>
                                            </div>
                                            <div id="resume" class = 'contact-card' ></div>
                                            <div id="selectedCV2" class = 'contact-card' ></div>
                                    <div class="form-group">
                                        <button type="button" class="btn btn-block btn-dark disabled">Submit Application</button>
                                        
                                    </div>
                                </div>    
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary" onclick="stepper.previous()">previous</button>
                        <button type="button" id="update_contact_info" class="btn btn-primary" onclick="stepper.next()">next</button>
                    </div>
                    
                </div>
            </div>

            <!-- Right Column for Job Details -->
            <div class="col-md-4" id="right-pan">
                <div class="card card-primary card-outline mx-auto mt-4">
                    <div class="card-body box-profile">
                        <div id="job-details" class="job-details-container"></div>
                        <div class="job-header"></div>
                        <div class="job-description">
                            <p>Description:</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.contact-card {
    border: 1px solid #ccc;
    border-radius: 5px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    transition: 0.3s;
    padding: 20px;
    margin-bottom: 20px;
    background-color: #fff;
}

.contact-heading {
    font-size: 20px;
    margin: 0;
    color: #333;
    text-transform: uppercase;
    font-weight: bold;
}

.contact-info {
    display: flex;
    flex-direction: column;
}

.contact-item {
    font-size: 16px;
    margin-bottom: 10px;
    color: #555;
}

/* Hover effect */
.contact-card:hover {
    box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
}

/* Add additional styling as needed */

</style>
<script>

document.getElementById('update_contact_info').addEventListener('click', function() {
    var firstName = document.getElementById('apply_job_first_name').value;
    var lastName = document.getElementById('apply_job_last_name').value;
    var email = document.getElementById('apply_job_email').value;
    var phone = document.getElementById('apply_job_phone').value;

    document.getElementById('full_name').textContent = 'Full Name: ' + firstName + ' ' + lastName;
    document.getElementById('email').textContent = 'Email: ' + email;
    document.getElementById('phone').textContent = 'Phone: ' + phone;
});



var fileInput = document.getElementById('fileInput');
var fileDisplay = document.getElementById('fileDisplay');
var selectedCV1 = document.getElementById('selectedCV1');
var selectedCV2 = document.getElementById('selectedCV2');
var radioPrimary1 = document.getElementById('radioPrimary1');
var radioPrimary2 = document.getElementById('radioPrimary2');
var fileTypeMessage = document.getElementById('fileTypeMessage');

fileInput.addEventListener('change', function() {
    if (fileInput.files.length > 0) {
        $("#resume").hide();
        var selectedFile = fileInput.files[0];
        var selectedFileName = selectedFile.name;
        var fileExtension = selectedFileName.split('.').pop().toLowerCase();

        // Check if the selected file has an accepted file extension (PDF)
        if (fileExtension === 'pdf') {
            fileDisplay.value = selectedFileName;

            // Display the selected PDF in both places (selectedCV1 and selectedCV2)
            selectedCV1.innerHTML = '';
            selectedCV2.innerHTML = '';

            // Create an <iframe> element to display the PDF
            var pdfViewer = document.createElement('iframe');
            pdfViewer.src = URL.createObjectURL(selectedFile);
            pdfViewer.width = '100%';
            pdfViewer.height = '500px';
            pdfViewer.style.border = '1px solid #ccc';

            // Append the PDF viewer to both places
            selectedCV1.appendChild(pdfViewer);
            selectedCV2.appendChild(pdfViewer);

            fileTypeMessage.style.color = 'green';
            fileTypeMessage.textContent = 'File type is accepted.';
        } else {
            // Display an error message for unsupported file types
            fileTypeMessage.style.color = 'red';
            fileTypeMessage.textContent = 'Unsupported file type. Accepted file type is PDF';
            fileDisplay.value = '';

            // Clear the displayed PDF from both places
            selectedCV1.innerHTML = '';
            selectedCV2.innerHTML = '';
        }
    } else {
        fileDisplay.value = '';

        // Clear the displayed PDF from both places
        selectedCV1.innerHTML = '';
        selectedCV2.innerHTML = '';
        fileTypeMessage.style.color = 'black';
        fileTypeMessage.textContent = 'Accepted file type is PDF';
    }
});

radioPrimary1.addEventListener('change', function() {
    if (radioPrimary1.checked) {
        
        $("#resume").show();
        // Clear the file input and remove the file
        fileInput.value = '';
        fileDisplay.value = '';

        // Clear the displayed PDF from both places
        selectedCV1.innerHTML = '';
        selectedCV2.innerHTML = '';
    }
});

radioPrimary2.addEventListener('change', function() {
    if (radioPrimary2.checked) {
        // Automatically trigger a click event on the file input to open the file select dialog
        fileInput.click();

    }
});



function getCandidateCV() {
    $.ajax({
        url: '/get-candidate-cv', // Update the URL if needed
        method: 'GET',
        dataType: 'json',
        success: function (data) {

            $('#apply_job_first_name').val(data.profile.first_name);
            $('#apply_job_last_name').val(data.profile.last_name);
            $('#apply_job_email').val(data.profile.email);
            $('#apply_job_phone').val(data.profile.phone);

            // Clear existing table rows
            $('#resume').find('tr:gt(0)').remove();

            // Function to create a heading row with an underline
            function createHeadingRow(heading) {
                return '<tr><td colspan="2"><strong style="color: #333;">' + heading + '</strong></td></tr>' +
                       '<tr><td colspan="2"><hr></td></tr>';
            }

            // Function to create a blank row for spacing
            function createSpaceRow() {
                return '<tr><td colspan="2">&nbsp;</td></tr>';
            }

            // Display the data with headings, spaces, and underlines
            $('#resume').append('<tr><td colspan="2"><h1 style="color: #333;">CV</h1></td></tr>'); // Title "CV"
            $('#resume').append(createSpaceRow()); // Space before the "Personal Information" heading
            $('#resume').append(createHeadingRow('Personal Information'));
            $('#resume').append('<tr><td style="font-size: 18px;color: #333;">' + data.profile.first_name + ' ' + data.profile.last_name + '</td></tr>');

            

            $('#resume').append('<tr><td style="color: #333;"><strong><em>' + data.profile.headline + '<em></strong></td></tr>');
            $('#resume').append('<tr><td style="color: #555;">' + data.profile.email + '</td></tr>');
            $('#resume').append('<tr><td style="color: #555;">' + data.profile.phone + '</td></tr');

            // Work Experience
            $('#resume').append(createSpaceRow()); // Space before the "Work Experience" heading
            $('#resume').append(createHeadingRow('Work Experience'));
            data.work_experiences.forEach(function (experience) {
                $('#resume').append('<tr><td style="color: #555;padding-left:30px;"><strong>' + experience.job_title + '<strong></td></tr>');
                $('#resume').append('<tr><td style="color: #555;padding-left:30px;">' + experience.company + '</td></tr>');
                // Add more work experience fields as needed
            });

            // Education
            $('#resume').append(createSpaceRow()); // Space before the "Education" heading
            $('#resume').append(createHeadingRow('Education'));
            data.educations.forEach(function (education) {
                $('#resume').append('<tr><td style="color: #555;padding-left:30px;"><strong>' + education.edu_level_of_education + '</strong></td></tr>');
                $('#resume').append('<tr><td style="color: #555;padding-left:30px;">' + education.edu_field_of_study + '</td></tr>');
                $('#resume').append('<tr><td style="color: #555;padding-left:30px;">' + education.edu_school + '</td></tr>');
                $('#resume').append('<tr><td style="color: #555;padding-left:30px;">' + education.edu_start_date + ' to ' + education.edu_end_date + '</td></tr>');
                
                // Add more education fields as needed
            });

            // Skills
            $('#resume').append(createSpaceRow()); // Space before the "Skills" heading
            $('#resume').append(createHeadingRow('Skills'));
            data.skills.forEach(function (skill) {
                var skillInfo = skill.skill_name;
                if (skill.year_of_experience) {
                    skillInfo += ' (' + skill.year_of_experience + ' years of experience)';
                }
                $('#resume').append('<tr><td style="color: #555;padding-left:30px;">' + skillInfo + '</td></tr>');
            });


            // Certifications
            $('#resume').append(createSpaceRow()); // Space before the "Certifications" heading
            $('#resume').append(createHeadingRow('Certifications'));
            data.certifications.forEach(function (certification) {
                $('#resume').append('<tr><td style="color: #555;padding-left:30px;">' + certification.certificate_name + '</td></tr>');
                $('#resume').append('<tr><td style="color: #555;padding-left:30px;">' + certification.certificate_start_date + ' to ' + certification.certificate_end_date + '</td></tr>');
            });
        },
        error: function (xhr, status, error) {
            console.error(error);
        },
    });
}





    // Call the function to update the table on page load
    

    $(document).ready(function () {
        getCandidateCV();
        

        var jobId = '23'; // $(this).data('job-id');
        $.ajax({
            type: 'GET',
            url: `/get-job-details/${jobId}`,
            dataType: 'json',
            success: function (job) {
                updateJobDetails(job);
            },
            error: function (xhr, status, error) {
                $('#loading-container').hide();
                console.error(error);
            },
        });
    });

    function updateJobDetails(data) {
        var jobDetailsDiv = $('.job-header');
        var jobLocationString = '';
        if (data.job.jobLocation !== 'null') {
            var jobLocationArray = JSON.parse(data.job.jobLocation);
            jobLocationString = jobLocationArray.join(', ');
        }
        var jobHtml = `
            <h4><b>${data.job.jobTitle}</b></h4>
            <span class="company-badge">
                <i class="fas fa-certificate"></i> 
            </span>${data.job.company}
            <p>${jobLocationString}</p>
        `;
        jobDetailsDiv.html(jobHtml);

        var jobDetailsDiv = $('.job-description');
        var jobHtml = `
            <p><b><h4>Job Description</h4></b> ${data.job.jobDescription}</p>
            <p><b><h4>Job Details</h4></b></p>
            <table class="job-details-table">
                <tbody>
                    <tr>
                        <th>Total Positions:</th>
                        <td>${data.job.numPositions !== null ? data.job.numPositions : 'N/A'}</td>
                    </tr>
                    <tr>
                        <th>Job Shift</th>
                        <td>${data.job.job_shift !== null ? data.job.job_shift : 'N/A'}</td>
                    </tr>
                    <tr>
                        <th>Job Type</th>
                        <td>${data.job.job_type !== null ? data.job.job_type : 'N/A'}</td>
                    </tr>
                    <tr>
                        <th>Gender</th>
                        <td>${data.job.genderPreference !== null ? data.job.genderPreference : 'N/A'}</td>
                    </tr>
                    <tr>
                        <th>Minimum Education</th>
                        <td>${data.job.qualification !== null ? data.job.qualification : 'N/A'}</td>
                    </tr>
                    <tr>
                        <th>Career Level</th>
                        <td>${data.job.careerLevel !== null ? data.job.careerLevel : 'N/A'}</td>
                    </tr>
                    <tr>
                        <th>Experience</th>
                        <td>${data.job.minExperience !== null && data.job.maxExperience !== null ? `${data.job.minExperience} to ${data.job.maxExperience}` : 'N/A'}</td>
                    </tr>
                    <tr>
                        <th>Age</th>
                        <td>${data.job.minAge !== null && data.job.maxAge !== null ? `${data.job.minAge} to ${data.job.maxAge}` : 'N/A'}</td>
                    </tr>
                    <tr>
                        <th>Apply Before</th>
                        <td>${data.job.apply_by_date !== null ? data.job.apply_by_date : 'N/A'}</td>
                    </tr>
                    <tr>
                        <th>Posting Date</th>
                        <td>${data.job.created_at !== null ? data.job.created_at : 'N/A'}</td>
                    </tr>
                </tbody>
            </table>
        `;
        jobDetailsDiv.html(jobHtml);
    }
</script>
@endsection
