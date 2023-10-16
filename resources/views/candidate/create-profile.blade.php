@extends('layouts.layouts-vertical-candidate.app')
@section('content')
<div class="content-wrapper">
        <div class="container-fluid">
        <h1 class="mb-4 custom-heading">
            <i class="fas fa-clipboard-check"></i>
                    Create Profile
            </h1>

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
                            <span class="bs-stepper-label">Contact</span>
                            </button>
                        </div>
                        <div class="line"></div>
                        <div class="step" data-target="#information-part">
                            <button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger">
                                <span class="bs-stepper-circle">2</span>
                                <span class="bs-stepper-label">Summary</span>
                            </button>
                        </div>  
                        <div class="line"></div>
                        <div class="step" data-target="#company-part">
                            <button type="button" class="step-trigger" role="tab" aria-controls="company-part" id="company-part-trigger">
                                <span class="bs-stepper-circle">3</span>
                                <span class="bs-stepper-label">Experience</span>
                            </button>
                        </div>  
                        <div class="line"></div>
                        <div class="step" data-target="#education-part">
                            <button type="button" class="step-trigger" role="tab" aria-controls="education-part" id="education-part-trigger">
                                <span class="bs-stepper-circle">4</span>
                                <span class="bs-stepper-label">Education</span>
                            </button>
                        </div>
                        <div class="line"></div>
                        <div class="step" data-target="#skills-part">
                            <button type="button" class="step-trigger" role="tab" aria-controls="skills-part" id="skills-part-trigger">
                                <span class="bs-stepper-circle">5</span>
                                <span class="bs-stepper-label">Skills</span>
                            </button>
                        </div>
                        <div class="line"></div>
                        <div class="step" data-target="#additional-part">
                            <button type="button" class="step-trigger" role="tab" aria-controls="additional-part" id="additional-part-trigger">
                                <span class="bs-stepper-circle">6</span>
                                <span class="bs-stepper-label">Additional Info</span>
                            </button>
                        </div>   
                        

                    </div>
                  <div class="bs-stepper-content">
                    <!-- your steps content here -->
                    <div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">

                    <!-- Job Title -->
                    <div class="form-group">
                        <label for="first_name">First name*</label>
                        <input type="text" id="first_name" name="first_name"  class="form-control ">
                    </div>

                    <!-- Job Description -->
                    <div class="form-group">
                        <label for="first_name">Last name*</label>
                        <input type="text" id="first_name" name="last_name"  class="form-control ">
                    </div>

                    <!-- Skills Required -->
                    <div class="form-group">
                        <label for="headline">Headline / CV Tittle </label>
                        <input type="text" id="headline" name="headline"  class="form-control ">
                        
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" id="phone" name="phone"  class="form-control ">
                    </div>

                    <!-- Number of Positions -->
                        <div class="form-group">
                            <label for="email">Email*</label>
                            <input type="text" id="email" name="email"  class="form-control ">
                        </div>


                    <!-- Job Location -->
                        <div class="form-group">
                            <label for="city">City</label>
                            <div class="select2-purple">
                                <select class="select2" multiple="multiple" data-placeholder="Select a State" data-dropdown-css-class="select2-purple" style="width: 100%;" name="city[]">
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
                        <label>Country</label>
                        <div class="row">
                            <div class="col">
                                <select id="country" name="country" class="form-control">
                                    <option value="0">Select a Country</option>
                                    <option value="Afghanistan">Afghanistan</option>
                                    <option value="Albania">Albania</option>
                                    <option value="Algeria">Algeria</option>
                                    <!-- Add more country options here -->
                                </select>
                            </div>
                        </div>
                    </div>

                        
                        <div class="form-group">
                                <label for="job-type" class="col">Street address*</label>
                                <div class="row">
                                    <div class="col">
                                        <input type="text" id="address" name="address"  class="form-control ">
                                    </div>
                            </div>
                        </div>    
                        <div class="form-group">
                            <label for="postal_code" class="col">Postal code *</label>
                            <div class="row">   
                                <div class="col">
                                    <input type="text" id="postal_code" name="postal_code"  class="form-control ">
                                </div>
                            </div>
                        </div>        
                    <button type = "button" class="btn btn-primary" onclick="stepper.next()">Next</button>
                </div>
                </div>
                    <div id="information-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                        <div class="form-group">
                            <label for="qualification">Summary</label>
                            <textarea id="summary" name="summary"  class="form-control " rows="4"></textarea>
                        </div>

                        <button type = "button" class="btn btn-primary" onclick="stepper.previous()">previous</button> 
                      <button type = "button" class="btn btn-primary" onclick="stepper.next()">next</button>
                     </div>
                     <div id="company-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                        <div class="form-group">
                            <div style="position: relative;">
                                <label for="jobTitle">Work experience *</label>
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#experienceModal" style="position: absolute; right: 0; top: 0; transform: translate(0, -50%); font-size: 20px;">
                                    <!-- Plus sign icon -->
                                    <span>+</span>
                                </button>
                            </div>
                        </div>
                        
                        <button type="button" class="btn btn-primary" onclick="stepper.previous()">previous</button>
                        <button type="button" class="btn btn-primary" onclick="stepper.next()">next</button>
                        
                    </div>
                    <div id="education-part" class="content" role="tabpanel" aria-labelledby="education-part-trigger">
                        <div class="form-group">
                            <div style="position: relative;">
                                <label for="jobTitle">Education *</label>
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#educationModal" style="position: absolute; right: 0; top: 0; transform: translate(0, -50%); font-size: 20px;">
                                    <!-- Plus sign icon -->
                                    <span>+</span>
                                </button>
                            </div>
                        </div>
                        
                        <button type="button" class="btn btn-primary" onclick="stepper.previous()">previous</button>
                        <button type="button" class="btn btn-primary" onclick="stepper.next()">next</button>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                    <div id="skills-part" class="content" role="tabpanel" aria-labelledby="skills-part-trigger">
                        <div class="form-group">
                            <div style="position: relative;">
                                <label for="jobTitle">Skills *</label>
                            </div>
                        </div>
                        
                        <button type="button" class="btn btn-primary" onclick="stepper.previous()">previous</button>
                        <button type="button" class="btn btn-primary" onclick="stepper.next()">next</button>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                    <div id="additional-part" class="content" role="tabpanel" aria-labelledby="additional-part-trigger">
                        <div class="form-group">
                            <div style="position: relative;">
                                <label for="jobTitle">Aditional Information *</label>
                            </div>
                        </div>
                        
                        <button type="button" class="btn btn-primary" onclick="stepper.previous()">previous</button>
                        <button type="button" class="btn btn-primary" onclick="stepper.next()">next</button>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>

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

<div class="modal fade" id="experienceModal" tabindex="-1" role="dialog" aria-labelledby="experienceModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="experienceModalLabel">Add Work Experience</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                        <div class="form-group">
                            <label for="postal_code" class="col">Job title*</label>
                            <div class="row">   
                                <div class="col">
                                    <input type="text" id="w_job_title" name="postal_code"  class="form-control ">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="postal_code" class="col">Company</label>
                            <div class="row">   
                                <div class="col">
                                    <input type="text" id="w_company" name="postal_code"  class="form-control ">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="postal_code">Time period</label>
                            <div class="row">   
                                <div class="col">
                                <div class="icheck-primary d-inline">I currently  work here
                                    <input type="radio" id="checkboxPrimary1" name="r1" checked>
                                        
                                
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                        <label for="month">From</label>
                            <div class="row">   
                                <div class="col">
                                    <select id="month" name="month" class = 'form-control'>
                                        <option value="01">January</option>
                                        <option value="02">February</option>
                                        <option value="03">March</option>
                                        <option value="04">April</option>
                                        <option value="05">May</option>
                                        <option value="06">June</option>
                                        <option value="07">July</option>
                                        <option value="08">August</option>
                                        <option value="09">September</option>
                                        <option value="10">October</option>
                                        <option value="11">November</option>
                                        <option value="12">December</option>
                                    </select>
                                </div>
                                <div class="col">        
                                    <select id="year" name="year" class = 'form-control'>
                                        @for ($year = date("Y"); $year <= date("Y") + 10; $year++)
                                            <option value="{{ $year }}">{{ $year }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">To </label>
                            <div class="row">   
                                <div class="col">
                                
                                    <select id="month" name="month" class = 'form-control'>
                                        <option value="01">January</option>
                                        <option value="02">February</option>
                                        <option value="03">March</option>
                                        <option value="04">April</option>
                                        <option value="05">May</option>
                                        <option value="06">June</option>
                                        <option value="07">July</option>
                                        <option value="08">August</option>
                                        <option value="09">September</option>
                                        <option value="10">October</option>
                                        <option value="11">November</option>
                                        <option value="12">December</option>
                                    </select>
                                </div>
                                <div class="col">        
                                    
                                    <select id="year" name="year" class = 'form-control'>
                                        @for ($year = date("Y"); $year <= date("Y") + 10; $year++)
                                            <option value="{{ $year }}">{{ $year }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                             <label for="jobDescription">Description</label>
                                <textarea id="jobDescription" name="jobDescription"  class="form-control " rows="4"></textarea>
                        </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success" onclick="saveExperience()">Save</button>
            </div>
        </div>
    </div>
</div>
</div>


<div class="modal fade" id="educationModal" tabindex="-1" role="dialog" aria-labelledby="educationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="educationModalLabel">Add education</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                        <div class="form-group">
                            <label for="postal_code" class="col">Level of education*</label>
                            <div class="row">   
                                <div class="col">
                                    <input type="text" id="w_job_title" name="postal_code"  class="form-control ">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="postal_code" class="col">Field of study</label>
                            <div class="row">   
                                <div class="col">
                                    <input type="text" id="w_company" name="postal_code"  class="form-control ">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="postal_code" class="col">School name</label>
                            <div class="row">   
                                <div class="col">
                                    <input type="text" id="w_company" name="postal_code"  class="form-control ">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="postal_code">Time period</label>
                            <div class="row">   
                                <div class="col">
                                <div class="icheck-primary d-inline">Currently enrolled
                                    <input type="radio" id="checkboxPrimary1" name="r1" checked>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                        <label for="month">From</label>
                            <div class="row">   
                                <div class="col">
                                    <select id="month" name="month" class = 'form-control'>
                                        <option value="01">January</option>
                                        <option value="02">February</option>
                                        <option value="03">March</option>
                                        <option value="04">April</option>
                                        <option value="05">May</option>
                                        <option value="06">June</option>
                                        <option value="07">July</option>
                                        <option value="08">August</option>
                                        <option value="09">September</option>
                                        <option value="10">October</option>
                                        <option value="11">November</option>
                                        <option value="12">December</option>
                                    </select>
                                </div>
                                <div class="col">        
                                    <select id="year" name="year" class = 'form-control'>
                                        @for ($year = date("Y"); $year <= date("Y") + 10; $year++)
                                            <option value="{{ $year }}">{{ $year }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">To </label>
                            <div class="row">   
                                <div class="col">
                                
                                    <select id="month" name="month" class = 'form-control'>
                                        <option value="01">January</option>
                                        <option value="02">February</option>
                                        <option value="03">March</option>
                                        <option value="04">April</option>
                                        <option value="05">May</option>
                                        <option value="06">June</option>
                                        <option value="07">July</option>
                                        <option value="08">August</option>
                                        <option value="09">September</option>
                                        <option value="10">October</option>
                                        <option value="11">November</option>
                                        <option value="12">December</option>
                                    </select>
                                </div>
                                <div class="col">        
                                    
                                    <select id="year" name="year" class = 'form-control'>
                                        @for ($year = date("Y"); $year <= date("Y") + 10; $year++)
                                            <option value="{{ $year }}">{{ $year }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                             <label for="jobDescription">Description</label>
                                <textarea id="jobDescription" name="jobDescription"  class="form-control " rows="4"></textarea>
                        </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success" onclick="saveExperience()">Save</button>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
