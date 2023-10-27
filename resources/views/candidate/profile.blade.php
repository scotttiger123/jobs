@extends('layouts.layouts-vertical-candidate.app')

@section('content')
  
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card card-primary card-outline mx-auto mt-4">
                <div class="card-body box-profile">
                      <!-- Add a Back button -->
                        <button id="backButton" class="btn btn-default btn-file" style="display: none;">
                            <i class="fas fa-chevron-left"></i> 
                        </button>
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="profile-username bold-heading">
                                    Personal Information
                                </h3>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" onclick = "populateInfoModalFields()" data-target="#additionalModal">
                                    <i class="fas fa-pencil-alt"></i> Edit
                                </a>
                            </div>
                        </div>

                        <div class="text-center">
                            <label for="profile-picture">
                                <img id="profile-image" class="profile-user-img img-fluid img-circle"
                                    src="{{ asset('storage/profile_images/default_profile.png') }}"
                                    alt="User profile picture">
                            </label>
                            <input type="file" id="profile-picture" style="display: none;" accept="image/*">
                        </div>

                    @if ($candidateProfile)
                        <h3 class="profile-username text-center" id="display_name">
                                {{ $candidateProfile->first_name }} {{ $candidateProfile->last_name }}
                        </h3>
                        <div class="text-muted text-center" id="headline_view">
                            {{ $candidateProfile->headline }}
                        </div>
                        <div class="text-muted text-center">
                            <i class="fas fa-phone-alt"></i>
                            <span  id="phone_view">
                                {{ $candidateProfile->phone }}
                            </span>
                        </div>
                        <div class="text-muted text-center">
                            <i class="fas fa-envelope"></i>
                            <span  id="email_view">
                            {{ $candidateProfile->email }}
                            </span>
                        </div>
                        <div class="text-muted text-center">
                        <i class="fas fa-map-marker-alt mr-1"></i>
                            <span  id="address_display">
                            {{ $candidateProfile->address }} , {{ $candidateProfile->city }} , {{ $candidateProfile->country }}
                            </span>
                        </div>                            
                    
                    
                    <div id = "first_name_view" hidden>{{ $candidateProfile->first_name }}</div>
                    <div id = "last_name_view" hidden>{{ $candidateProfile->last_name }}</div>
                    <div id = "city_view" hidden>{{ $candidateProfile->city }}</div>
                    <div id = "country_country" hidden>{{ $candidateProfile->country }}</div>
                    <div id = "address_hidden" hidden>{{ $candidateProfile->address }}</div>
                        
                    @else
                                No candidate profile found for this user.
                    @endif
                </div>


                </div>
                <!-- SUMMERY--> 
                <div class="card card-primary card-outline mx-auto mt-4">
                    <div class="card-body box-profile">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="profile-username bold-heading">
                                Summary 
                            </h3>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#summaryModal" onclick = "populateSummaryModalFields()" >
                                <i class="fas fa-pencil-alt"></i> Edit
                            </a>
                        </div>
                        </div>
                        <div class="form-group">
                             <label for="jobDescription"></label>
                             <div class="text-muted text-left">
                                    <span  id="summary_view">
                                    @if ($candidateProfile)
                                        {{ $candidateProfile->summary }}
                                    @else
                                         No summary has been added yet
                                    @endif    
                                    </span>
                            </div>     
                        </div>
                    </div>
                </div>
                <!-- SUMMERY--> 
                <!-- WORK EXPERIENCE--> 
                <div class="card card-primary card-outline mx-auto mt-4">
                    <div class="card-body box-profile">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="profile-username bold-heading">
                                Work Experience 
                            </h3>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#workModal">
                                <i class="fas fa-plus"></i> Add
                            </a>
                        </div>
                        </div>
                       
                        <div class="form-group">
                             <label for=""></label>
                             <div class="text-muted text-left">
                                    <div class = 'workExperiencesContainer' >
                                        @if ($workExperiences)
                                                @if ($workExperiences->count() > 0)
                                                        @foreach ($workExperiences as $workExperience)
                                                        
                                                        <div class="work-experience">    
                                                             <div class="row">   
                                                                <div class="col-md-6 text-left">        
                                                                    <h4 class="profile-username bold-heading" id = "job_tittle_view" >{{ $workExperience->job_title }}</h4>
                                                                </div>    
                                                                <div class="col-md-6 text-right">
                                                                <a href="#" onclick="populateWorkModalFields(this)" class="" 
                                                                    data-job-title="{{ $workExperience->job_title }}"
                                                                    data-company-name="{{ $workExperience->company_name }}"
                                                                    data-description="{{ $workExperience->description }}"
                                                                    data-start-date="{{ $workExperience->start_date }}"
                                                                    data-end-date="{{ $workExperience->end_date }}"
                                                                    data-id="{{ $workExperience->id }}">
                                                                    <i class="fas fa-pencil-alt"></i> 
                                                                </a>&nbsp;
                                                                <i class="fas fa-trash-alt" data-work-id="{{ $workExperience->id }}" onclick="deleteWorkExperience(this)" ></i> 
                                                                </div>
                                                                
                                                            </div>    
                                                                <div id = "w_cmpny_view">{{ $workExperience->company_name }}</div>
                                                                <div>From: {{ $workExperience->start_date }} - To: {{ $workExperience->end_date }}</div>
                                                                <p id= 'description_view'>{{ $workExperience->description }}</p>
                                                        </div>   
                                                        @endforeach
                                                    @endif   
                                                @else
                                                    <p>No work experiences found.</p>
                                                @endif
                                    </div>            
                                
                            </div>   
                        </div>
                    </div>
                </div>
                <!-- END WORK EXPERIENCE --> 

                <!-- EDUCATION--> 
                <div class="card card-primary card-outline mx-auto mt-4">
                    <div class="card-body box-profile">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="profile-username bold-heading">
                                Education
                            </h3>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#educationModal">
                                <i class="fas fa-plus"></i> Add
                            </a>
                        </div>
                    </div>
                        
                        <div class="form-group">
                             <label for=""></label>
                             <div class="text-muted text-left">
                                    <div class = 'eduContainer' >
                                        @if ($candidateEducations)
                                                @if ($candidateEducations->count() > 0)
                                                        @foreach ($candidateEducations as $candidateEduction)
                                                        
                                                        <div class="edu-experience">    
                                                             <div class="row">   
                                                                <div class="col-md-6 text-left">        
                                                                    <h4 class="profile-username bold-heading" id = "job_tittle_view" >{{ $candidateEduction->edu_level_of_education }}</h4>
                                                                </div>    
                                                                <div class="col-md-6 text-right">
                                                                <a href="#" onclick="populateEducationModalFields(this)" class="" 
                                                                data-edu-level-of-education="{{ $candidateEduction->edu_level_of_education }}"
                                                                data-edu-field-of-study="{{ $candidateEduction->edu_field_of_study }}"
                                                                data-edu-school="{{ $candidateEduction->edu_school }}"
                                                                data-edu-city="{{ $candidateEduction->edu_city }}"
                                                                data-edu-country="{{ $candidateEduction->edu_country }}"
                                                                data-edu-start-date="{{ $candidateEduction->edu_start_date }}"
                                                                data-edu-end-date="{{ $candidateEduction->edu_end_date }}"
                                                                data-edu_id="{{ $candidateEduction->id }}">
                                                                    <i class="fas fa-pencil-alt"></i> 
                                                                </a>&nbsp;
                                                                <i class="fas fa-trash-alt" data-work-id="{{ $candidateEduction->id }}" onclick="deleteEducation(this)" ></i> 
                                                                </div>
                                                                
                                                            </div>    
                                                                <div id = "w_cmpny_view">{{ $candidateEduction->company_name }}</div>
                                                                <div>From: {{ $candidateEduction->edu_start_date }} - To: {{ $candidateEduction->edu_end_date }}</div>
                                                                <div >{{ $candidateEduction->edu_field_of_study }}</div>
                                                                <div >{{ $candidateEduction->edu_school }}</div>
                                                                <div >{{ $candidateEduction->edu_city }}</div>
                                                        </div>   
                                                        @endforeach
                                                    @endif   
                                                @else
                                                    <p>No work experiences found.</p>
                                                @endif
                                    </div>            
                                
                            </div>   
                        </div>
                    </div>
                </div>
                <!-- Education --> 
                <!-- SKILLS--> 
                <div class="card card-primary card-outline mx-auto mt-4">
                    <div class="card-body box-profile">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="profile-username bold-heading">
                               Skills
                            </h3>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#skillModal">
                                <i class="fas fa-plus"></i> Add
                            </a>
                        </div>
                        </div>
                       
                        <div class="form-group">
                             <label for=""></label>
                             <div class="text-muted text-left"> 
                             <div class = 'skillsContainer' >
                                        @if ($candidateSkills)
                                                @if ($candidateSkills->count() > 0)
                                                        @foreach ($candidateSkills as $candidateSkill)
                                                        
                                                        <div class="skill-experience">    
                                                             <div class="row">   
                                                                <div class="col-md-6 text-left">        
                                                                    <h4 class="profile-username bold-heading" id = "job_tittle_view" >{{ $candidateSkill->skill_name }}</h4>
                                                                </div>    
                                                                <div class="col-md-6 text-right">
                                                                <a href="#" onclick="populateSkillModalFields(this)" class="" 
                                                                data-skill-name="{{ $candidateSkill->skill_name }}"
                                                                data-year-of-experience="{{ $candidateSkill->year_of_experience }}"
                                                                data-skill-id="{{ $candidateSkill->id }}">
                                                                    <i class="fas fa-pencil-alt"></i> 
                                                                </a>&nbsp;
                                                                <i class="fas fa-trash-alt" data-skill-id="{{ $candidateSkill->id }}" onclick="deleteSkill(this)" ></i> 
                                                                </div>
                                                            </div>        
                                                            <div >Experiece: {{ $candidateSkill->year_of_experience }}</div>
                                                            
                                                        </div>        
                                                        @endforeach
                                                    @endif   
                                                @else
                                                    <p>No Skill add.</p>
                                                @endif
                                    </div>
                                
                                       
                            </div>   
                        </div>
                    </div>
                    <!-- Education --> 
                </div>
                <!-- Certifications and Licenses--> 
                <div class="card card-primary card-outline mx-auto mt-4">
                    <div class="card-body box-profile">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="profile-username bold-heading">
                            Certifications and Licenses
                            </h3>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#certificateModal">
                                <i class="fas fa-plus"></i> Add
                            </a>
                        </div>
                        </div>
                       
                        <div class="form-group">
                             <label for=""></label>
                             <div class="text-muted text-left">
                             <div class = 'certificationContainer' >
                                        @if ($certifications)
                                                @if ($certifications->count() > 0)
                                                        @foreach ($certifications as $certification)
                                                        
                                                        <div class="certification-experience">    
                                                             <div class="row">   
                                                                <div class="col-md-6 text-left">        
                                                                    <h4 class="profile-username bold-heading" id = "job_tittle_view" >{{ $certification->certificate_name }}</h4>
                                                                </div>    
                                                                <div class="col-md-6 text-right">
                                                                <a href="#" onclick="populateSkillModalFields(this)" class="" 
                                                                data-skill-name="{{ $certification->certificate_name }}"
                                                                data-year-of-experience="{{ $certification->certificate_start_date }}"
                                                                data-year-of-experience="{{ $certification->certificate_end_date }}"
                                                                data-certification-id="{{ $certification->id }}">
                                                                    <i class="fas fa-pencil-alt"></i> 
                                                                </a>&nbsp;
                                                                <i class="fas fa-trash-alt" data-certification-id="{{ $certification->id }}" onclick="deleteCertification(this)" ></i> 
                                                                </div>
                                                                
                                                            </div>    
                                                                <div>From: {{ $certification->certificate_start_date }} - To: {{ $certification->certificate_end_date }}</div>
                                                                <p id= 'description_view'>{{ $certification->description }}</p>
                                                        </div>   
                                                        @endforeach
                                                    @endif   
                                                @else
                                                    <p>No Skill add.</p>
                                                @endif
                                    </div>
                                    <!-- end pan -->
                                       
                            </div>   
                        </div>
                    </div>
                     
                    
                </div>
                <!-- Certifications and Licenses -->
            </div>
        </div>
    </div>
</div>
<!-- MODAL STARTS  -->
<!-- additional Information -->
<div class="modal fade" id="additionalModal" tabindex="-1" role="dialog" aria-labelledby="additionalModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="additionalModalLabel">Contact Info</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                        <!-- Job Title -->
                <form method="POST" >
                        @csrf                         
                    <div class="form-group">
                        <label for="first_name">First name*</label>
                        <input type="text" id="first_name" name="first_name"  class="form-control ">
                    </div>

                    <!-- Job Description -->
                    <div class="form-group">
                        <label for="first_name">Last name*</label>
                        <input type="text" id="last_name" name="last_name"  class="form-control ">
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
                                <select class="select2"  id ="city" data-placeholder="Select a State" data-dropdown-css-class="select2-purple" style="width: 100%;" name="city">
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
                                <select class="select2"  id ="country" data-placeholder="Select a State" data-dropdown-css-class="select2-purple" style="width: 100%;" name="city">
                                    <option value="0">Select a Country</option>
                                    <option value="England" selected >England</option>
                                    <option value="Canada">Canada</option>
                                    
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
                    </form>           
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success" onclick="saveInfo()">Save</button>
            </div>
        </div>
    </div>
</div>
</div>


<!-- MODAL STARTS  -->
<!-- additional Information -->
<div class="modal fade" id="summaryModal" tabindex="-1" role="dialog" aria-labelledby="summaryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="summaryModalLabel">Summary </h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <div class="form-group">
                             <label for="summary_pop">Summary </label>
                                <textarea id="summary_pop" name="jobDescrisummery_popption"  class="form-control " rows="4"></textarea>
                        </div>
            </div> 
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success" onclick="saveInfo()">Save</button>
            </div>   
        </div>    
    </div>    
</div> 
<!-- EDUCATION WORK   Modal -->
<div class="modal fade" id="educationModal" tabindex="-1" role="dialog" aria-labelledby="educationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="educationModalLabel">Add Education </h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <div class="form-group">
                            <label for="postal_code" class="col">Level of education*</label>
                            <div class="row">   
                                <div class="col">
                                    <input type="text" id="edu_level_of_education" name="postal_code"  class="form-control ">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="postal_code" class="col">Field of study</label>
                            <div class="row">   
                                <div class="col">
                                    <input type="text" id="edu_field_of_study" name=""  class="form-control ">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="postal_code" class="col">School name</label>
                            <div class="row">   
                                <div class="col">
                                    <input type="text" id="edu_school" name=""  class="form-control ">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="postal_code" class="col">Country</label>
                            <div class="row">   
                                <div class="col">
                                    <input type="text" id="edu_company" name=""  class="form-control ">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="postal_code" class="col">City</label>
                            <div class="row">   
                                <div class="col">
                                    <input type="text" id="edu_city" name=""  class="form-control ">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="postal_code">Time period</label>
                            <div class="row">   
                                <div class="col">
                                        <div class="icheck-danger d-inline"> 
                                            <input type="checkbox"  id="checkboxDanger1">
                                            <label for="checkboxDanger1">Currently enrolled
                                        </label>
                                    </div>
                                 </div>
                        </div>
                        <div class="form-group">
                            <label for="from">From</label>
                            <div class="row">
                                <div class="col">
                                    <input type="date" id="edu_start_date" name="from" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="from">To</label>
                            <div class="row">
                                <div class="col">
                                    <input type="date" id="edu_end_date" name="from" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>                
            </div> 
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success" onclick="saveCandidateEducation()">Save</button>
            </div>   
        </div>    
    </div>    
</div>        
<!-- EDUCATION  Add Modal -->   
<!-- ADD SKILL   Modal -->
<div class="modal fade" id="skillModal" tabindex="-1" role="dialog" aria-labelledby="educationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="educationModalLabel">Add Skill </h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <div class="form-group">
                            <label for="postal_code" class="col">Skill Name </label>
                            <div class="row">   
                                <div class="col">
                                    <input type="text" id="skill_name" name=""  class="form-control ">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="postal_code" class="col">Year of Experience</label>
                            <div class="row">   
                                <div class="col">
                                    <input type="text" id="year_of_experience" name=""  class="form-control ">
                                </div>
                            </div>
                        </div>
                                        
            </div> 
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success" onclick="saveCandidateSkill()">Save</button>
            </div>   
        </div>    
    </div>    
</div>        
<!-- ADD SKILL  Modal -->   
<!-- EDIT SKILL   Modal -->
<div class="modal fade" id="editSkillModal" tabindex="-1" role="dialog" aria-labelledby="educationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="educationModalLabel">Edit Skill </h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <div class="form-group">
                            <label for="postal_code" class="col">Skill Name </label>
                            <div class="row">   
                                <div class="col">
                                    <input type="text" id="edit_skill_name" name=""  class="form-control ">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="postal_code" class="col">Year of Experience</label>
                            <div class="row">   
                                <div class="col">
                                    <input type="text" id="edit_year_of_experience" name=""  class="form-control ">
                                </div>
                            </div>
                        </div>
                                        
            </div> 
            <div class="modal-footer">
                <input type="text" hidden id="edit_skill_id" name=""  class="form-control ">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success" onclick="editCandidateSkill()">Save</button>
            </div>   
        </div>    
    </div>    
</div>        
<!-- EDIT SKILL  Modal -->
<!-- EDUCATION EDIT   Modal -->
<div class="modal fade" id="editEducationModal" tabindex="-1" role="dialog" aria-labelledby="educationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="educationModalLabel">EDIT Education </h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <div class="form-group">
                            <label for="postal_code" class="col">Level of education*</label>
                            <div class="row">   
                                <div class="col">
                                    <input type="text" id="edit_edu_level_of_education" name="postal_code"  class="form-control ">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="postal_code" class="col">Field of study</label>
                            <div class="row">   
                                <div class="col">
                                    <input type="text" id="edit_edu_field_of_study" name=""  class="form-control ">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="postal_code" class="col">School name</label>
                            <div class="row">   
                                <div class="col">
                                    <input type="text" id="edit_edu_school" name=""  class="form-control ">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="postal_code" class="col">Country</label>
                            <div class="row">   
                                <div class="col">
                                    <input type="text" id="edit_edu_country" name=""  class="form-control ">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="postal_code" class="col">City</label>
                            <div class="row">   
                                <div class="col">
                                    <input type="text" id="edit_edu_city" name=""  class="form-control ">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="postal_code">Time period</label>
                            <div class="row">   
                                <div class="col">
                                        <div class="icheck-danger d-inline"> 
                                            <input type="checkbox"  id="checkboxDanger1">
                                            <label for="checkboxDanger1">Currently enrolled
                                        </label>
                                    </div>
                                 </div>
                        </div>
                        <div class="form-group">
                            <label for="from">From</label>
                            <div class="row">
                                <div class="col">
                                    <input type="date" id="edit_edu_start_date" name="from" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="from">To</label>
                            <div class="row">
                                <div class="col">
                                    <input type="date" id="edit_edu_end_date" name="from" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>                
            </div> 
            <div class="modal-footer">
                <input type="text" id="edit_edu_id" name=""  class="form-control ">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success" onclick="editCandidateEducation()">Save</button>
            </div>   
        </div>    
    </div>    
</div>        
<!-- EDUCATION  EDIT Modal --> 
<!-- Work Experience Modal -->
<div class="modal fade" id="workModal" tabindex="-1" role="dialog" aria-labelledby="workModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="workModalLabel">Add work experience </h5>

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
                                        <div class="icheck-danger d-inline"> 
                                            <input type="checkbox"  id="checkboxDanger1">
                                            <label for="checkboxDanger1">I currently  work here
                                        </label>
                                    </div>
                                 </div>
                        </div>
                        <div class="form-group">
                            <label for="from">From</label>
                            <div class="row">
                                <div class="col">
                                    <input type="date" id="w_start_date" name="from" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="from">To</label>
                            <div class="row">
                                <div class="col">
                                    <input type="date" id="w_end_date" name="from" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                             <label for="work_pop">Description </label>
                                
                                <textarea id="work_experience_description" name="w_description" class="form-control" rows="4"></textarea>

                        </div>
            
                    </div>                
            </div> 
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success" onclick="saveWorkExperince()">Save</button>
            </div>   
        </div>    
    </div>    
</div>        
<!-- Work Experience Modal -->
<div class="modal fade" id="workModalEdit" tabindex="-1" role="dialog" aria-labelledby="workModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="workModalLabel">Edit work experience </h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <div class="form-group">
                            <label for="postal_code" class="col">Job title*</label>
                            <div class="row">   
                                <div class="col">
                                    <input type="text" id="edit_w_job_title" name="postal_code"  class="form-control ">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="postal_code" class="col">Company</label>
                            <div class="row">   
                                <div class="col">
                                    <input type="text" id="edit_w_company" name="postal_code"  class="form-control ">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="postal_code">Time period</label>
                            <div class="row">   
                                <div class="col">
                                        <div class="icheck-danger d-inline"> 
                                            <input type="checkbox"  id="edit_checkboxDanger1">
                                            <label for="checkboxDanger1">I currently  work here
                                        </label>
                                    </div>
                                 </div>
                        </div>
                        <div class="form-group">
                            <label for="from">From</label>
                            <div class="row">
                                <div class="col">
                                    <input type="date" id="edit_w_start_date" name="from" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="from">To</label>
                            <div class="row">
                                <div class="col">
                                    <input type="date" id="edit_w_end_date" name="from" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                             <label for="work_pop">Description </label>
                                
                                <textarea id="edit_work_experience_description" name="w_description" class="form-control" rows="4"></textarea>

                        </div>
            
                    </div>                
            </div> 
            <div class="modal-footer">
                <input type="text" id="w_edit_id" name=""  class="form-control ">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success" onclick="editWorkExperince()">Save</button>
            </div>   
        </div>    
    </div>    
</div>

<!-- CERTIFICATE OR LICENCE MODAL -->
<div class="modal fade" id="certificateModal" tabindex="-1" role="dialog" aria-labelledby="educationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="educationModalLabel">Add certification or license </h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                        <div class="form-group">
                            <label for="postal_code" class="col">Certification / license name*</label>
                            Example: Driver’s license, nursing certification
                            <div class="row">   
                                <div class="col">
                                    <input type="text" id="certificate_name" name="postal_code"  class="form-control ">
                                </div>
                            </div>
                        </div>
                       <div class="form-group">
                            <label for="from">From</label>
                            <div class="row">
                                <div class="col">
                                    <input type="date" id="certificate_start_date" name="from" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="from">To</label>
                            <div class="row">
                                <div class="col">
                                    <input type="date" id="certificate_end_date" name="from" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="from">Description</label>
                            <div class="row">
                                <div class="col">
                                    <textarea id="certificate_description" name=""  class="form-control " rows="4"></textarea>
                                </div>
                            </div>
                        </div>
                                    
            </div> 
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success" onclick="saveCertification()">Save</button>
            </div>   
        </div>    
    </div>    
</div>

<!-- EDUCATION  Add Modal -->

<style>
.work-experience {
    border: 1px solid #e0e0e0; /* Light gray border color */
    border-radius: 5px; /* Rounded corners */
    padding: 10px; /* Optional padding for better appearance */
    margin: 10px 0; /* Optional margin to separate elements */
}

.edu-experience {
    border: 1px solid #e0e0e0; /* Light gray border color */
    border-radius: 5px; /* Rounded corners */
    padding: 10px; /* Optional padding for better appearance */
    margin: 10px 0; /* Optional margin to separate elements */
}

.skill-experience {
    border: 1px solid #e0e0e0; /* Light gray border color */
    border-radius: 5px; /* Rounded corners */
    padding: 10px; /* Optional padding for better appearance */
    margin: 10px 0; /* Optional margin to separate elements */
}

.certification-experience {
    border: 1px solid #e0e0e0; /* Light gray border color */
    border-radius: 5px; /* Rounded corners */
    padding: 10px; /* Optional padding for better appearance */
    margin: 10px 0; /* Optional margin to separate elements */
}


</style>
<script>
window.addEventListener('load', function() {
        populateModalFields();
    });
    
    function populateInfoModalFields(button) { 
    
        var firstName = $('#first_name_view').text().trim();
        var lastName = $('#last_name_view').text().trim();
        var headline = $('#headline_view').text().trim();
        var phone = $('#phone_view').text().trim();
        var email = $('#email_view').text().trim();
        var city = $('#city_view').text().trim();
        var country = $('#country_view').text().trim();
        var address = $('#address_hidden').text().trim();
        var summary = $('#summary_view').text().trim();
        $('#first_name').val(firstName);
        $('#last_name').val(lastName);
        $('#headline').val(headline);
        $('#phone').val(phone);
        $('#email').val(email);
        $('#city').val(city);
        $('#country').val(country);
        $('#address').val(address);
        
    }

    function populateSummaryModalFields() { alert();
    
        $('#summary_pop').val($('#summary_view').text().trim());
}
function populateWorkModalFields(button) { 
    var id = $(button).data('id');
    
    var jobTitle = $(button).data('job-title');
    var companyName = $(button).data('company-name');
    var description = $(button).data('description');
    var startDate = $(button).data('start-date');
    var endDate = $(button).data('end-date');
        
    $('#edit_w_job_title').val(jobTitle);
    $('#edit_w_company').val(companyName);
    $('#edit_work_experience_description').val(description);
    $('#edit_w_start_date').val(startDate);
    $('#edit_w_end_date').val(endDate);
    $('#w_edit_id').val(id);
    
    $('#workModalEdit').modal('show');
    }

    function populateEducationModalFields(button) { 
    
    
    $('#edit_edu_level_of_education').val($(button).data('edu-level-of-education'));
    $('#edit_edu_field_of_study').val($(button).data('edu-field-of-study'));
    $('#edit_edu_school').val($(button).data('edu-school'));
    $('#edit_edu_city').val($(button).data('edu_city'));
    $('#edit_edu_country').val($(button).data('edu_country'));
    $('#edit_edu_start_date').val($(button).data('edu-start-date'));
    $('#edit_edu_end_date').val($(button).data('edu-end-date'));
    $('#edit_edu_id').val($(button).data('edu-id'));
    
    $('#editEducationModal').modal('show');
   
}


    function populateSkillModalFields(button) { 
    
    
    $('#edit_skill_name').val($(button).data('skill-name'));
    $('#edit_year_of_experience').val($(button).data('year-of-experience'));
    $('#edit_skill_id').val($(button).data('skill-id'));
    
    $('#editSkillModal').modal('show');
    }

    function editCandidateSkill() {
        let Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
        
        var data = {
            
                skill_name: $('#edit_skill_name').val(),
                year_of_experience: $('#edit_year_of_experience').val(),
                edit_skill_id: $('#edit_skill_id').val()

                
            };

            
        $.ajax({
            type: 'GET',
            url: 'edit-skill',
            headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            data: data,
            success: function(response) {
                console.log(response);
                var workExperiences = response.candidate_skills;
                        
                        var container = $('.skillsContainer');
                        container.empty();
                        var workExperienceHtml = '';
                        if (workExperiences.length > 0) {
                                    
                                    container.empty();

                                    $.each(workExperiences, function(index, workExperience) {
                                        var skill_name = workExperience.skill_name || '';
                                        var year_of_experience = workExperience.year_of_experience || '';
                                        var skill_id = workExperience.id;

                                        
                                        workExperienceHtml += `
                                            <div class="skill-experience">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h4 class="profile-username bold-heading">${skill_name}</h4>
                                                    </div>
                                                    <div class="col-md-6 text-right">
                                                         <a href="#" onclick="populateSkillModalFields(this)" class="" 
                                                            data-skill-name="${skill_name}"
                                                            data-year-of-experience="${year_of_experience}"
                                                            data-skill-id="${skill_id}">
                                                            <i class="fas fa-pencil-alt"></i> 
                                                        </a>&nbsp;
                                                        <i class="fas fa-trash-alt" data-skill-id=${skill_id}" onclick="deleteSkill(this)"></i>
                                                       
                                                    </div>
                                                </div>
                                                <p id= "">${year_of_experience}</p>
                                                
                                            </div>
                                        `;
                                    });

                                    $('#editSkillModal').modal('hide');
                                    container.append(workExperienceHtml);
                                    Toast.fire({
                                        icon: 'success',
                                        title: 'Skill saved successfully.'
                                    
                                        })
                                    } else {
                                    
                                    container.empty().html('<p>No work experiences found.</p>');
                                }                                        
            },
            error: function(xhr) {
    
                console.error(xhr);
            }
        });
    
    } 


    function saveCandidateSkill() {
        let Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
        
        var data = {
            
                skill_name: $('#skill_name').val(),
                year_of_experience: $('#year_of_experience ').val()
            };

            
        $.ajax({
            type: 'GET',
            url: 'save-skill',
            headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            data: data,
            success: function(response) {
                console.log(response);
                var workExperiences = response.candidate_skills;
                        
                        var container = $('.skillsContainer');
                        container.empty();
                        var workExperienceHtml = '';
                        if (workExperiences.length > 0) {
                                    
                                    container.empty();

                                    $.each(workExperiences, function(index, workExperience) {
                                        var skill_name = workExperience.skill_name || '';
                                        var year_of_experience = workExperience.year_of_experience || '';
                                        var skill_id = workExperience.id;

                                        
                                        workExperienceHtml += `
                                            <div class="skill-experience">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h4 class="profile-username bold-heading">${skill_name}</h4>
                                                    </div>
                                                    <div class="col-md-6 text-right">
                                                         <a href="#" onclick="populateSkillModalFields(this)" class="" 
                                                            data-skill-name="${skill_name}"
                                                            data-year-of-experience="${year_of_experience}"
                                                            data-skill-id="${skill_id}">
                                                            <i class="fas fa-pencil-alt"></i> 
                                                        </a>&nbsp;
                                                        <i class="fas fa-trash-alt" data-skill-id=${skill_id}" onclick="deleteSkill(this)"></i>

                                                       
                                                    </div>
                                                </div>
                                                
                                                <p id= "">${year_of_experience}</p>
                                                
                                            </div>
                                        `;
                                    });

                                    $('#skillModal').modal('hide');
                                    container.append(workExperienceHtml);
                                    Toast.fire({
                                        icon: 'success',
                                        title: 'Skill saved successfully.'
                                    
                                        })
                                    } else {
                                    
                                    container.empty().html('<p>No work experiences found.</p>');
                                }                                        
            },
            error: function(xhr) {
    
                console.error(xhr);
            }
        });
    
    }    

    function saveCandidateEducation() {
        let Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
        
        var data = {
            
                edu_level_of_education: $('#edu_level_of_education').val(),
                edu_field_of_study: $('#edu_field_of_study').val(),
                edu_school: $('#edu_school').val(),
                edu_company: $('#edu_company').val(),
                edu_city: $('#edu_city').val(),
                edu_start_date: $('#edu_start_date').val(),
                edu_end_date: $('#edu_end_date').val()
            };

            
        $.ajax({
            type: 'GET',
            url: 'save-education',
            headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            data: data,
            success: function(response) {
                var workExperiences = response.candidate_education;
                        console.log(workExperiences);
                        var container = $('.eduContainer');
                        container.empty();

                                var workExperienceHtml = '';

                                if (workExperiences.length > 0) {
                                    // Clear the container before appending new data
                                    container.empty();

                                    $.each(workExperiences, function(index, workExperience) {
                                        var edu_level_of_education = workExperience.edu_level_of_education || '';
                                        var edu_field_of_study = workExperience.edu_field_of_study || '';
                                        var edu_school = workExperience.edu_school || '';
                                        var edu_country = workExperience.edu_country || '';
                                        var edu_start_date = workExperience.edu_start_date || '';
                                        var edu_end_date = workExperience.edu_end_date || '';
                                        var edu_id = workExperience.id;

                                        
                                        workExperienceHtml += `
                                            <div class="edu-experience">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h4 class="profile-username bold-heading">${edu_level_of_education}</h4>
                                                    </div>
                                                    <div class="col-md-6 text-right">
                                                         <a href="#" onclick="populateEducationModalFields(this)" class="" 
                                                            data-edu-level-of-education="${edu_level_of_education}"
                                                            data-edu-field-of-study="${edu_field_of_study}"
                                                            data-edu-school="${edu_school}"
                                                            data-edu-city="${edu_city}"
                                                            data-edu-country="${edu_country}"
                                                            data-edu-start-date = "${edu_start_date}"
                                                            data-edu-end-date="${edu_end_date}"
                                                            data-edu_id="${edu_id}">
                                                            <i class="fas fa-pencil-alt"></i> 
                                                        </a>&nbsp;
                                                        <i class="fas fa-trash-alt" data-work-id=${edu_id}" onclick="deleteEducation(this)"></i>

                                                       
                                                    </div>
                                                </div>
                                                <div>${edu_school}</div>
                                                <div>From: ${edu_start_date} - To: ${edu_end_date}</div>
                                                
                                            </div>
                                        `;
                                    });

                                    $('#educationModal').modal('hide');
                                    container.append(workExperienceHtml);
                                    Toast.fire({
                                        icon: 'success',
                                        title: 'Education saved successfully.'
                                    
                                        })
                                } else {
                                    
                                    container.empty().html('<p>No work experiences found.</p>');
                                }

                        
           
            },
            error: function(xhr) {
    
                console.error(xhr);
            }
        });
    
    }    

    function editCandidateEducation() {
        let Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
        
        var data = {
            
                edu_level_of_education: $('#edit_edu_level_of_education').val(),
                edu_field_of_study: $('#edit_edu_field_of_study').val(),
                edu_school: $('#edit_edu_school').val(),
                edu_country: $('#edit_edu_country').val(),
                edu_city: $('#edit_edu_city').val(),
                edu_start_date: $('#edit_edu_start_date').val(),
                edu_end_date: $('#edit_edu_end_date').val(),
                edit_edu_id: $('#edit_edu_id').val()
            };

            
        $.ajax({
            type: 'GET',
            url: 'save-education',
            headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            data: data,
            success: function(response) {
                var workExperiences = response.candidate_education;
                        console.log(workExperiences);
                        var container = $('.eduContainer');
                        container.empty();

                                var workExperienceHtml = '';

                                if (workExperiences.length > 0) {
                                    
                                    container.empty();

                                    $.each(workExperiences, function(index, workExperience) {
                                        var edu_level_of_education = workExperience.edu_level_of_education || '';
                                        var edu_field_of_study = workExperience.edu_field_of_study || '';
                                        var edu_school = workExperience.edu_school || '';
                                        var edu_country = workExperience.edu_country || '';
                                        var edu_start_date = workExperience.edu_start_date || '';
                                        var edu_end_date = workExperience.edu_end_date || '';
                                        var edu_id = workExperience.id;

                                        
                                        workExperienceHtml += `
                                            <div class="edu-experience">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h4 class="profile-username bold-heading">${edu_level_of_education}</h4>
                                                    </div>
                                                    <div class="col-md-6 text-right">
                                                         <a href="#" onclick="populateEducationModalFields(this)" class="" 
                                                            data-edu-level-of-education="${edu_level_of_education}"
                                                            data-edu-field-of-study="${edu_field_of_study}"
                                                            data-edu-school="${edu_school}"
                                                            data-edu-city="${edu_city}"
                                                            data-edu-country="${edu_country}"
                                                            data-edu-start-date = "${edu_start_date}"
                                                            data-edu-end-date="${edu_end_date}"
                                                            data-edu_id="${edu_id}">
                                                            <i class="fas fa-pencil-alt"></i> 
                                                        </a>&nbsp;
                                                        <i class="fas fa-trash-alt" data-work-id=${edu_id}" onclick="deleteEducation(this)"></i>

                                                       
                                                    </div>
                                                </div>
                                                <div>${edu_school}</div>
                                                <div>From: ${edu_start_date} - To: ${edu_end_date}</div>
                                                
                                            </div>
                                        `;
                                    });

                                    $('#editEducationModal').modal('hide');
                                    container.append(workExperienceHtml);
                                    Toast.fire({
                                        icon: 'success',
                                        title: 'Education saved successfully.'
                                    
                                        })
                                } else {
                                    
                                    container.empty().html('<p>No work experiences found.</p>');
                                }

                        
           
            },
            error: function(xhr) {
    
                console.error(xhr);
            }
        });
    
    } 
    
    
    function editWorkExperince() { 
        var data = {
                company_name: $('#edit_w_company').val(),
                job_title: $('#edit_w_job_title').val(),
                start_date: $('#edit_w_start_date').val(),
                end_date: $('#edit_w_start_date').val(),
                description: $('#edit_work_experience_description').val(),
                w_edit_id: $('#w_edit_id').val()
            };

            
        $.ajax({
            type: 'GET',
            url: '/edit-work',
            headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            data: data,
            success: function(response) {
                        var workExperiences = response.work_experiences;
                        console.log(workExperiences);
                        var container = $('.workExperiencesContainer');
                        container.empty();

                                var workExperienceHtml = '';

                                if (workExperiences.length > 0) {
                                    // Clear the container before appending new data
                                    container.empty();

                                    $.each(workExperiences, function(index, workExperience) {
                                        var jobTitle = workExperience.job_title || '';
                                        var company = workExperience.company_name || '';
                                        var startDate = workExperience.start_date || '';
                                        var endDate = workExperience.end_date || '';
                                        var description = workExperience.description || '';
                                        var workExperienceId = workExperience.id;

                                        
                                        workExperienceHtml += `
                                            <div class="work-experience">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h4 class="profile-username bold-heading">${jobTitle}</h4>
                                                    </div>
                                                    <div class="col-md-6 text-right">
                                                        <a href="#" onclick="populateWorkModalFields(this)" class="btn btn-primary btn-sm" 
                                                            data-job-title="${jobTitle}"
                                                            data-company-name="${company}"
                                                            data-description="${description}"
                                                            data-start-date="${startDate}"
                                                            data-end-date="${endDate}"
                                                            data-id="${workExperienceId}">
                                                            <i class="fas fa-pencil-alt"></i> Edit
                                                        </a>
                                                    </div>
                                                </div>
                                                <div>${company}</div>
                                                <div>From: ${startDate} - To: ${endDate}</div>
                                                <p class="description">${description}</p>
                                            </div>
                                        `;
                                    });

                                    
                                    container.append(workExperienceHtml);
                                } else {
                                    
                                    container.empty().html('<p>No work experiences found.</p>');
                                }



                        $('#workModalEdit').modal('hide');
           
            },
            error: function(xhr) {
    
                console.error(xhr);
            }
        });
    
    }
    function saveWorkExperince() {
        
        var data = {
                company_name: $('#w_company').val(),
                job_title: $('#w_job_title').val(),
                start_date: $('#w_start_date').val(),
                end_date: $('#w_end_date').val(),
                description: $('#work_experience_description').val()
            };

            
        $.ajax({
            type: 'GET',
            url: '/save-work',
            headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            data: data,
            success: function(response) {
                var workExperiences = response.work_experiences;
                        console.log(workExperiences);
                        var container = $('.workExperiencesContainer');
                        container.empty();

                                var workExperienceHtml = '';

                                if (workExperiences.length > 0) {
                                    // Clear the container before appending new data
                                    container.empty();

                                    $.each(workExperiences, function(index, workExperience) {
                                        var jobTitle = workExperience.job_title || '';
                                        var company = workExperience.company_name || '';
                                        var startDate = workExperience.start_date || '';
                                        var endDate = workExperience.end_date || '';
                                        var description = workExperience.description || '';
                                        var workExperienceId = workExperience.id;

                                        
                                        workExperienceHtml += `
                                            <div class="work-experience">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h4 class="profile-username bold-heading">${jobTitle}</h4>
                                                    </div>
                                                    <div class="col-md-6 text-right">
                                                         <a href="#" onclick="populateWorkModalFields(this)" class="" 
                                                            data-job-title="${jobTitle}"
                                                            data-company-name="${company}"
                                                            data-description="${description}"
                                                            data-start-date="${startDate}"
                                                            data-end-date="${endDate}"
                                                            data-id="${workExperienceId}">
                                                            <i class="fas fa-pencil-alt"></i> 
                                                        </a>&nbsp;
                                                        <i class="fas fa-trash-alt" data-work-id="${workExperienceId}" onclick="deleteWorkExperience(this)" ></i> 
                                                       
                                                    </div>
                                                </div>
                                                <div>${company}</div>
                                                <div>From: ${startDate} - To: ${endDate}</div>
                                                <p class="description">${description}</p>
                                            </div>
                                        `;
                                    });

                                    
                                    container.append(workExperienceHtml);
                                } else {
                                    
                                    container.empty().html('<p>No work experiences found.</p>');
                                }

                        $('#workModal').modal('hide');
           
            },
            error: function(xhr) {
    
                console.error(xhr);
            }
        });
    
    }    

    
    
    function saveInfo() {
        
        var data = new FormData();
        var fileInput = $('#profile-picture')[0].files[0]; // Get the selected file
        
    data.append('profile_image', fileInput);
    data.append('first_name', $('#first_name').val());
    data.append('last_name', $('#last_name').val());
    data.append('headline', $('#headline').val());
    data.append('phone', $('#phone').val());
    data.append('email', $('#email').val());
    data.append('city', $('#city').val());
    data.append('country', $('#country').val());
    data.append('address', $('#address').val());
    data.append('postal_code', $('#postal_code').val());
    data.append('summary', $('#summary_pop').val());

        
        $.ajax({
            type: 'POST',
            url: '/save-info',
            headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            data: data,
            processData: false, // Required for FormData
            contentType: false, // Required for FormData
            success: function(response) {
                console.log(response);
                $('#additionalModal').modal('hide');
                $('#summaryModal').modal('hide');
                
                        var candidateProfile = response.candidate_profile;

                        var firstName = candidateProfile.first_name || '';
                        var lastName = candidateProfile.last_name || '';
                        var headline = candidateProfile.headline || '';
                        var phone = candidateProfile.phone || '';
                        var email = candidateProfile.email || '';
                        var city = candidateProfile.city || '';
                        var country = candidateProfile.country || '';
                        var address = candidateProfile.address || '';
                        var postalCode = candidateProfile.postal_code || '';
                        var summary = candidateProfile.summary || '';

                        $('#heading').text(headline);
                        $('#display_name').text(firstName.trim() + ' ' + lastName.trim());
                        $('#last_name_view').text(lastName);
                        $('#first_name_view').text(firstName);
                        
                        $('#headline_view').text(headline);
                        $('#phone_view').text(phone);
                        $('#email_view').text(email);
                        $('#address_display').text(address+','+city+','+country);
                        $('#country_view').text(country);
                        $('#city_view').text(city);
                        $('#address_hidden').text(address);
                        $('#postal_code_view').text(postalCode);
                        $('#summary_view').text(summary);

                        

            },
            error: function(xhr) {
    
                console.error(xhr);
            }
        });
    }


    function saveCertification() {
        let Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
        
        var data = {
            
                certificate_name: $('#certificate_name').val(),
                certificate_start_date: $('#certificate_start_date').val(),
                certificate_end_date: $('#certificate_end_date').val(),
                certificate_description: $('#certificate_description').val(),
            };

            
        $.ajax({
            type: 'GET',
            url: 'save-certification',
            headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            data: data,
            success: function(response) {
                var certifications = response.certifications;
                        console.log(certifications);
                        var container = $('.certificationContainer');
                        container.empty();

                                var workExperienceHtml = '';

                                if (certifications.length > 0) {
                                    // Clear the container before appending new data
                                    container.empty();

                                    $.each(certifications, function(index, saveCertification) {
                                        var certificate_name = saveCertification.certificate_name || '';
                                        var certificate_start_date = saveCertification.certificate_start_date || '';
                                        var certificate_end_date = saveCertification.certificate_end_date || '';
                                        var certificate_description = saveCertification.certificate_description || '';
                                        var id = saveCertification.id;

                                        
                                        workExperienceHtml += `
                                            <div class="certification-experience">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h4 class="profile-username bold-heading">${certificate_name}</h4>
                                                    </div>
                                                    <div class="col-md-6 text-right">
                                                         <a href="#" onclick="populateEducationModalFields(this)" class="" 
                                                            data-certificate-name="${certificate_name}"
                                                            data-certificate-start-date="${certificate_start_date}"
                                                            data-certificate-end-date="${certificate_end_date}"
                                                            data-certificate-description="${certificate_description}"
                                                            data-certificate-id="${id}">
                                                            <i class="fas fa-pencil-alt"></i> 
                                                        </a>&nbsp;
                                                        <i class="fas fa-trash-alt" data-certificate-id=${id}" onclick="deleteCertification(this)"></i>

                                                       
                                                    </div>
                                                </div>
                                                <div>From: ${certificate_start_date} - To: ${certificate_end_date}</div>
                                                <div>${certificate_description}</div>
                                                
                                            </div>
                                        `;
                                    });

                                    $('#certificateModal').modal('hide');
                                    container.append(workExperienceHtml);
                                    Toast.fire({
                                        icon: 'success',
                                        title: 'Certification saved successfully.'
                                    
                                        })
                                } else {
                                    
                                    container.empty().html('<p>No data found.</p>');
                                }

                        
           
            },
            error: function(xhr) {
    
                console.error(xhr);
            }
        });
    
    }    



    function deleteWorkExperience(button) {
        var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    if (confirm('Are you sure you want to delete this work experience?')) {
        const workId = $(button).data('work-id');
        
        $.ajax({
            type: 'get',
            url: `/work-experiences/${workId}`, // Replace with your Laravel route
            
            success: function (response) {
                if (response.success) {
                    
                    $(button).closest('.work-experience').remove();
                    Toast.fire({
                    icon: 'success',
                    title: 'Education deleted Successfully.'
                
                    })
                } else {
                    Toast.fire({
                    icon: 'error',
                    title: 'Failed to delete the education .'
                
                    })
                }
            },
            error: function () {
                Toast.fire({
                    icon: 'error',
                    title: 'Failed to delete the education .'
                
                    })
            }
        });
    }
}

function deleteEducation(button) {
    let Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    if (confirm('Are you sure you want to delete this education ?')) {
        const workId = $(button).data('work-id');
        
        $.ajax({
            type: 'get',
            url: `/destory-education/${workId}`, 
            
            success: function (response) {
                if (response.success) {
                    
                    Toast.fire({
                    icon: 'success',
                    title: 'Education deleted Successfully.'
                
                    })
                    
                    $(button).closest('.edu-experience').remove();
                    
                } else {
                    
                    Toast.fire({
                    icon: 'error',
                    title: 'Failed to delete the education .'
                
                    })
                }
            },
            error: function () {
                Toast.fire({
                    icon: 'error',
                    title: 'Failed to delete the education .'
                
                    })
            }
        });
    }
}

function deleteCertification(button) {
    let Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    if (confirm('Are you sure you want to delete this certificate ?')) {
        const workId = $(button).data('certification-id');
        alert(workId);
        $.ajax({
            type: 'get',
            url: `/delete-certificate/${workId}`, 
            
            success: function (response) {
                if (response.success) {
                    
                    Toast.fire({
                    icon: 'success',
                    title: 'Certification deleted Successfully.'
                
                    })
                    
                    $(button).closest('.certification-experience').remove();
                    
                } else {
                    
                    Toast.fire({
                    icon: 'error',
                    title: 'Failed to delete .'
                
                    })
                }
            },
            error: function () {
                Toast.fire({
                    icon: 'error',
                    title: 'Failed to delete .'
                
                    })
            }
        });
    }
}




function deleteSkill(button) {
    let Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    if (confirm('Are you sure you want to delete this Skill ?')) {
        const workId = $(button).data('skill-id');
        
        $.ajax({
            type: 'get',
            url: `/delete-skill/${workId}`, 
            
            success: function (response) {
                if (response.success) {
                    
                    Toast.fire({
                    icon: 'success',
                    title: 'Skill deleted Successfully.'
                
                    })
                    
                    $(button).closest('.skill-experience').remove();
                    
                } else {
                    
                    Toast.fire({
                    icon: 'error',
                    title: 'Failed to delete the skill .'
                
                    })
                }
            },
            error: function () {
                Toast.fire({
                    icon: 'error',
                    title: 'Failed to delete the skill .'
                
                    })
            }
        });
    }
}

document.addEventListener("DOMContentLoaded", function () {
    var urlParams = new URLSearchParams(window.location.search);
    var jobId = urlParams.get("jobId");

    if (jobId) {
        // If jobId is present in the URL, display the "Back" button
        document.getElementById("backButton").style.display = "block";
    }
});

document.getElementById("backButton").addEventListener("click", function () {
    history.back();
});


    const profileImage = document.getElementById('profile-image');
    const fileInput = document.getElementById('profile-picture');

    fileInput.addEventListener('change', (event) => {
        const selectedFile = event.target.files[0];
        if (selectedFile) {
            const objectURL = URL.createObjectURL(selectedFile);
            profileImage.src = objectURL;
        }
    });
</script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tinymce@5.10.2/dist/skins/ui/oxide/skin.min.css">
<script src="https://cdn.jsdelivr.net/npm/tinymce@5.10.2/tinymce.min.js"></script>
    <!-- <script>
            tinymce.init({
        selector: 'textarea#summary_pop', 
        plugins: 'autolink lists link image charmap print preview anchor',
        toolbar: 'undo redo | formatselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent',
        height: 300, 
        menubar: false, 
        branding: false 
        
    });
    
</script> -->
@endsection
