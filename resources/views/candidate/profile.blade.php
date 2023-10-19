@extends('layouts.layouts-vertical-candidate.app')

@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card card-primary card-outline mx-auto mt-4">
                <div class="card-body box-profile">
                        
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="profile-username bold-heading">
                            Personal Information
                        </h3>
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#additionalModal">
                            <i class="fas fa-pencil-alt"></i> Edit
                        </a>
                    </div>
                </div>

                <div class="text-center" >
                    <img class="profile-user-img img-fluid img-circle"
                        src="../../dist/img/user4-128x128.jpg"
                        alt="User profile picture">
                        
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
                    
                    @else
                                No candidate profile found for this user.
                    @endif
                    <div id = "first_name_view" hidden>{{ $candidateProfile->first_name }}</div>
                    <div id = "last_name_view" hidden>{{ $candidateProfile->last_name }}</div>
                    <div id = "city_view" hidden>{{ $candidateProfile->city }}</div>
                    <div id = "country_country" hidden>{{ $candidateProfile->country }}</div>
                    <div id = "address_hidden" hidden>{{ $candidateProfile->address }}</div>
                        

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
                            <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#summaryModal">
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
                                <i class="fas fa-pencil-alt"></i> Edit
                            </a>
                        </div>
                        </div>
                        <div class="form-group">
                             <label for=""></label>
                             <div class="text-muted text-left">
                                    <span  id="work_view">
                                    @if ($candidateProfile)
                                        {{ $candidateProfile->work_experience }}
                                    @else
                                         No summary has been added yet
                                    @endif    
                                    </span>
                            </div>     
                        </div>
                    </div>
                </div>
                <!-- END WORK EXPERIENCE --> 
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
                                    <input type="date" id="from" name="from" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="from">To</label>
                            <div class="row">
                                <div class="col">
                                    <input type="date" id="from" name="from" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                             <label for="work_pop">Description </label>
                                <textarea id="w_description" name=""  class="form-control " rows="4"></textarea>
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

<script>
window.addEventListener('load', function() {
        populateModalFields();
    });
function populateModalFields() {
        
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
        $('#summary_pop').val(summary);
    }
    
    $('#additionalModal').on('show.bs.modal', function (event) { 
        populateModalFields(); 
    });

    function saveWorkExperince() {
        
        var data = {
                company_name: $('#w_company').val(),
                job_title: $('#w_job_title').val(),
                start_date: $('#w_start_month').val(),
                end_date: $('#w_end_month').val(),
                description: $('#w_description').val()
            };

    
        $.ajax({
            type: 'GET',
            url: '/save-work',
            headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            data: data,
            success: function(response) {
                console.log(response);
                
                $('#workModal').modal('hide');
                 

            },
            error: function(xhr) {
    
                console.error(xhr);
            }
        });
    
    }    

    function saveInfo() {
        
        var data = {
            first_name: $('#first_name').val(),
            last_name: $('#last_name').val(),
            headline: $('#headline').val(),
            phone: $('#phone').val(),
            email: $('#email').val(),
            city: $('#city').val(),
            country: $('#country').val(),
            address: $('#address').val(),
            postal_code: $('#postal_code').val(),
            summary: $('#summary_pop').val(),
            
        };

        
        $.ajax({
            type: 'GET',
            url: '/save-info',
            headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            data: data,
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

    
</script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tinymce@5.10.2/dist/skins/ui/oxide/skin.min.css">
<script src="https://cdn.jsdelivr.net/npm/tinymce@5.10.2/tinymce.min.js"></script>
    <script>
            tinymce.init({
        selector: 'textarea#summary_pop', 
        plugins: 'autolink lists link image charmap print preview anchor',
        toolbar: 'undo redo | formatselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent',
        height: 300, 
        menubar: false, 
        branding: false 
        
    });
    tinymce.init({
        selector: 'textarea#w_description', 
        plugins: 'autolink lists link image charmap print preview anchor',
        toolbar: 'undo redo | formatselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent',
        height: 300, 
        menubar: false, 
        branding: false 
        
    });
</script>
@endsection
