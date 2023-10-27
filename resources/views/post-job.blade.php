@extends('layouts-vertical.app')

@section('content')
<div class="content-wrapper">
        <div class="container-fluid">
            <h1 class="mb-4">
                <i class="fas fa-clipboard-check"></i>
                    POST YOUR FIRST JOB IN MINUTES!</h1>
            <form action="{{ route('job.store') }}" method="POST">
                @csrf
                @if (session('success'))
                        <div class="alert alert-success auto-hide">
                            {{ session('success') }}
                        </div>
                @endif
                @if($errors->any())
                            <div class="alert alert-danger auto-hide">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                <div class="card p-4">
                <div class="bs-stepper">
                    <div class="bs-stepper-header" role="tablist">
                        <div class="step" data-target="#logins-part">
                            <button type="button" class="step-trigger" role="tab" aria-controls="logins-part" id="logins-part-trigger">
                            <span class="bs-stepper-circle">1</span>
                            <span class="bs-stepper-label">Add job details</span>
                            </button>
                        </div>
                        <div class="line"></div>
                        <div class="step" data-target="#information-part">
                            <button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger">
                                <span class="bs-stepper-circle">2</span>
                                <span class="bs-stepper-label">Applicant Requirements</span>
                            </button>
                        </div>  
                        <div class="line"></div>
                        <div class="step" data-target="#company-part">
                            <button type="button" class="step-trigger" role="tab" aria-controls="company-part" id="company-part-trigger">
                                <span class="bs-stepper-circle">3</span>
                                <span class="bs-stepper-label">Company Info </span>
                            </button>
                        </div>  
                    </div>
                  <div class="bs-stepper-content">
                    <!-- your steps content here -->
                    <div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">

                    <!-- Job Title -->
                    <div class="form-group">
                        <label for="jobTitle">Job Title*</label>
                        <input type="text" id="jobTitle" name="jobTitle"  class="form-control ">
                    </div>

                    <!-- Job Description -->
                    <div class="form-group">
                        <label for="jobDescription">Job Description*</label>
                        <textarea id="jobDescription" name="jobDescription"  class="form-control " rows="4"></textarea>
                    </div>

                    <!-- Skills Required -->
                    <div class="form-group">
                        <label for="skillsRequired">Skills Required*</label>
                        <input type="text" id="skillsRequired" name="skillsRequired"  class="form-control " placeholder = 'PHP,SEO,Marketing'>
                        <small class="text-muted">Max. 20 skills allowed (comma-separated)</small>
                    </div>

                    <!-- Career Level -->
                    <div class="form-group">
                        <label for="careerLevel">Required Career Level*</label>
                        <select id="careerLevel" name="careerLevel"  class="form-control ">
                            <option value="entry">Entry Level</option>
                            <option value="mid">Mid Level</option>
                            <option value="senior">Senior Level</option>
                        </select>
                    </div>

                    <!-- Number of Positions -->
                        <div class="form-group">
                            <label for="numPositions">No. of Positions*</label>
                            
                            <select class="form-control select2" style="width: 100%;" id="numPositions" name="numPositions" require>
                                @for ($i = 1; $i <= 35; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                                <option value="35+">35+</option>
                            </select>
                        </div>


                    <!-- Job Location -->
                        <div class="form-group">
                            <label for="jobLocation">Job Location*</label>
                            <div class="select2-purple">
                                <select class="select2" multiple="multiple" data-placeholder="Select a State" data-dropdown-css-class="select2-purple" style="width: 100%;" name="jobLocation[]">
                                <option value="London">London</option>
                                <option value="Birmingham">Birmingham</option>
                                <option value="Manchester">Manchester</option>
                                <option value="Liverpool">Liverpool</option>
                                <option value="Glasgow">Glasgow</option>
                                <option value="Edinburgh">Edinburgh</option>
                                <option value="Leeds">Leeds</option>
                                <option value="Sheffield">Sheffield</option>
                                <option value="Bristol">Bristol</option>
                                <option value="Newcastle upon Tyne">Newcastle upon Tyne</option>
                                <option value="Nottingham">Nottingham</option>
                                <option value="Southampton">Southampton</option>
                                <option value="Cardiff">Cardiff</option>
                                <option value="Belfast">Belfast</option>
                                <option value="Leicester">Leicester</option>
                                <option value="Coventry">Coventry</option>
                                <option value="Hull">Hull</option>
                                <option value="Bradford">Bradford</option>
                                <option value="Stoke-on-Trent">Stoke-on-Trent</option>
                                <option value="Wolverhampton">Wolverhampton</option>
                                <option value="Plymouth">Plymouth</option>
                                <option value="Derby">Derby</option>
                                <option value="Swansea">Swansea</option>
                                <!-- Add more cities as needed -->
                            </select>
                        </div>
                    </div>    

                        <div class="form-group">
                            <label>What is the salary range?*</label>
                            <div class="row">
                                <div class="col">
                                    <select id="" name="min_salary" class="form-control">
                                        <option value="0">From</option>
                                        @for ($i = 1000; $i <= 1000000; $i = $i+1000)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                        <!-- You can increase the loop limit if needed -->
                                    </select>
                                </div>
                                <div class="col">
                                    <select id="" name="max_salary" class="form-control">
                                        <option value="0">To</option>
                                        @for ($i = 1000; $i <= 1000000; $i = $i+1000)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                        <!-- You can increase the loop limit if needed -->
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                                <label for="job-type" class="col">Job Type *</label>
                                <div class="row">
                                    <div class="col">
                                        <select id="job-type" name="job_type" class="form-control">
                                            <option value="full_time">Full-Time</option>
                                            <option value="part_time">Part-Time</option>
                                            <option value="contract">Contract</option>
                                            <option value="Internship">Internship</option>
                                            <option value="freelance">Freelance</option>
                                            
                                        </select>
                                    </div>
                            </div>
                        </div>    
                        <div class="form-group">
                                <label for="job-shift" class="col">Job Shift *</label>
                            <div class="row">   
                                <div class="col">
                                    <select id="job-shift" name="job_shift" class="form-control">
                                        <option value="0">Select</option>
                                        <!-- Add your job shift options here -->
                                        <option value="morning">Morning</option>
                                        <option value="afternoon">Afternoon</option>
                                        <option value="night">Night</option>
                                        <option value="rotating">Rotating</option>
                                        <option value="hybrid">Hybrid Work Modal</option>
                                        <option value="work-from-home">Work from Home </option>
                                        <!-- Add more options as needed -->
                                    </select>
                                </div>
                            </div>
                        </div>        
                    <!-- Salary Visibility -->
                    <div class="form-group clearfix">
                        <label>Should the salary be visible in your job post?</label><br>
                            <div class="icheck-primary d-inline">Yes
                                <input type="radio" id="radioPrimary1" name="r1" checked>
                                <label for="radioPrimary1">
                                </label>
                      </div>
                      <div class="icheck-primary d-inline">No
                        <input type="radio" id="radioPrimary2" name="r1">
                        <label for="radioPrimary2">
                        </label>
                      </div>
                    </div>

                    <!-- Gender Preference -->
                    <div class="form-group">
                        <label>Select Gender </label>
                        <select class="form-control select2" name = "genderPreference" style="width: 100%;">
                            
                                <option>Male</option>
                                <option>Female</option>
                                <option>Transgender</option>
                                <option selected="selected">No Preference</option>
                            </select>
                    </div>
                    <div class="form-group">
                        <label>Apply By Date </label>
                        <input type="date" id="" name="apply_by_date"  class="form-control ">
                    </div>
                
                    <button type = "button" class="btn btn-primary" onclick="stepper.next()">Next</button>
                </div>
                </div>
                <div id="information-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                        <div class="form-group">
                            <label for="qualification">Required Qualification*</label>
                            <select id="qualification" name="qualification"  class="form-control">
                                <option value="High School">High School</option>
                                <option value="Diploma">Diploma</option>
                                <option value="Associate's Degree">Associate's Degree</option>
                                <option value="Bachelor's Degree">Bachelor's Degree</option>
                                <option value="Master's Degree">Master's Degree</option>
                                <option value="Ph.D.">Ph.D.</option>
                                <option value="Certificate">Certificate</option>
                                <!-- Add more qualification options as needed -->
                            </select>
                        </div>

                       <div class="form-group">
                        <label for="exampleInputFile">Specific Degree Title</label>
                            <input type="text" id="minQualification" name="company_email"  class="form-control ">
                       </div>
                       <div class="form-group">
                            <label for="experienceYears">Years of Experience*</label>
                            <div class="row">
                                <div class="col">
                                    <select id="minExperience" name="minExperience" class="form-control">
                                        <option value="0">Min</option>
                                        @for ($i = 1; $i <= 20; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                        <!-- You can increase the loop limit if needed -->
                                    </select>
                                </div>
                                <div class="col">
                                    <select id="maxExperience" name="maxExperience" class="form-control">
                                        <option value="0">Max</option>
                                        @for ($i = 1; $i <= 20; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                        <!-- You can increase the loop limit if needed -->
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                             <label for="exampleInputFile">More Info on Experience</label>
                                <input type="text" id="experience_info" name="experience_info"  class="form-control ">
                        </div>
                        <div class="form-group">
                            <label for="experienceYears">Age Requirement</label>
                            <div class="row">
                                <div class="col">
                                    <select id="minExperience" name="minAge" class="form-control">
                                        <option value="0">Min</option>
                                        @for ($i = 10; $i <= 75; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                        <!-- You can increase the loop limit if needed -->
                                    </select>
                                </div>
                                <div class="col">
                                    <select id="maxExperience" name="maxAge" class="form-control">
                                        <option value="0">Max</option>
                                        @for ($i = 1; $i <= 75; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                        <!-- You can increase the loop limit if needed -->
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button type = "button" class="btn btn-primary" onclick="stepper.previous()">previous</button> 
                      <button type = "button" class="btn btn-primary" onclick="stepper.next()">next</button>
                     </div>
                    <div id="company-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                        <div class="form-group">
                             <label for="jobTitle">Company Name / Brand *</label>
                             <input type="text" id="company" name="company"  class="form-control ">
                        </div>
                        <button type = "button" class="btn btn-primary" onclick="stepper.previous()">previous</button> 
                        <button type="submit" class="btn btn-success">Submit</button>
                    <div>    
                  </div>
                  
                </div>
             </div>
            </form>
        </div>
    </div>
</div>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tinymce@5.10.2/dist/skins/ui/oxide/skin.min.css">
<script src="https://cdn.jsdelivr.net/npm/tinymce@5.10.2/tinymce.min.js"></script>
    <script>
            tinymce.init({
        selector: 'textarea#jobDescription', 
        plugins: 'autolink lists link image charmap print preview anchor',
        toolbar: 'undo redo | formatselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent',
        height: 300, 
        menubar: false, 
        branding: false 
    });

    const inputFields = document.querySelectorAll('input[type="text"], input[type="number"], textarea, select');


inputFields.forEach((inputField) => {
    inputField.addEventListener('click', () => {
        
        inputField.style.boxShadow = '0 2px 5px rgba(0, 0, 0, 0.3)';
    });

    
    inputField.addEventListener('blur', () => {
        inputField.style.boxShadow = 'none';
    });
});
    </script>

<style>
    input[type="text"],
        input[type="number"],
        textarea,
        select {
            width: 100%; /* Use 100% width to expand input fields to the container width */
            padding: 10px; /* Increase padding for spacing and size */
            font-size: 16px; /* Increase font size for readability */
        }
 h1.mb-4 {
            background-color: #FF5733; /* Change the background color to a shade of orange */
            color: #FFF; /* Change the text color to white */
            border-radius: 10px; /* Add rounded corners */
            padding: 10px 20px; /* Adjust padding for spacing */
            display: inline-block; /* Display the h1 element as a block to contain the shadow */
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3); /* Apply a box shadow */
        }
.container-fluid {
        max-width: 80%; 
        margin: 0 auto; 
        padding: 10px; 
 }

.form-group label.required::after {
    content: '*';
    color: red;
    margin-left: 4px;
}

</style>

@endsection
