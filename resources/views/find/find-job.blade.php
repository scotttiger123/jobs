@extends('layouts.app')
@section('content')
<div class="content-wrapper" style="background-color: white;">
  <div id="loading-container-center">
        <i class="fas fa-spinner fa-spin"></i> Loading...
  </div>
<div class="content" style="background-color: white;"> <!-- Add background-color: white; here -->
      
    <div class="container" >      <!-- Separate row for "Find a Job" -->
      <div class="row" id="find-job-row">
        <div class="col-md-12 text-center">
          <form class="form-inline" id="job-search-form">
            <div class="form-group">
              <label id="label-text-input-what" for="text-input-where" aria-hidden="true" class="label-text-input">What</label> &nbsp;&nbsp;
              <input type="text" class="form-control mr-2" id="keywords" placeholder=" &nbsp; Job title, keywords, or company"> 
            </div>
            <div class="form-group">
              <label id="label-text-input-where" for="text-input-what" aria-hidden="true" class="label-text-input">Where</label>  &nbsp;&nbsp;
              <input type="text" class="form-control mr-2" id="location" placeholder=" &nbsp; City or postcode">
            </div>
            <button type="submit" id = 'submit-button' class="btn btn-primary">Find Job</button>
          </form>
        </div>
      </div>
</div>
      
      <!-- End of "Find a Job" row -->
      <!-- Three columns for Filters, Job Search, and Job Details -->
      <div class="row" >
        <!-- Left Column for Filters -->
        <div class="col-md-3">
          <div class="job-filters">
          <div class="card">
                  <div class="card-header">
                      <h4 class="card-title">
                          <i class="fas fa-cogs"></i> <!-- Cogs Icon -->
                            <b>Filters</b>
                      </h4>
                  </div>
                  <!-- Rest of your card content goes here -->
              </div>

            <div class="filter">
              <h4><b>Salary</b></h4> 
              <label for="salary-min" class = 'label-custom-style'> Salary: <span id="salary-min-value" >0</span></label>
              <input type="range" class="custom-range" id="salary-min" min="0" max="100000" step="1000">

            </div>  
            <div class="filter">
              <h4><b>Job Type</b></h4> 
              <div class="form-group clearfix">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="full-time" id="full_time">
                        <label for="full_time" class = 'label-custom-style'> 
                            Full-Time/Permanent
                        </label>
                    </div>
                    <div class="icheck-primary">
                        <input type="checkbox" value="contract" id="contract">
                        <label for="contract" class = 'label-custom-style'> 
                            Contract
                        </label>
                    </div>
                    <div class="icheck-primary">
                        <input type="checkbox" value="part-time" id="part_time">
                        <label for="part_time" class = 'label-custom-style'> 
                            Part-Time
                        </label>
                    </div>
                    <!-- Add more job type options as needed -->
                </div>

            </div>
            <!-- Add more filters as needed -->
            <button type="button" class="btn btn-primary btn-block">Apply Filters</button>
          </div>
        </div>
        

        <!-- Middle Column for Job Search -->
        <div class="col-md-4">
        <div class="card">
              <div class="card-header">
                  <h3 class="card-title">
                      <i class="fas fa-briefcase"></i> <!-- Jobs Icon -->
                      <b>Jobs</b>
                  </h3>
              </div>
              
          </div>
            <!-- Job Listings -->
            <div id="job-listings" >
              @if($jobs) 
              @foreach ($jobs as $key => $job)
                <!-- Job Listing -->
                <div class="job-listing rounded p-3 mb-3" style="max-height: 300px; min-height: 300px; overflow: hidden; cursor: pointer; {{ $key === 0 ? 'border: 1px solid #164081;' : 'border: 1px solid #ddd;' }}" data-job-id="{{ $job->id }}">
          
                <h4><b>{{ $job->jobTitle }}</b></h4>
                    <p>CureMD, Lahore, Pakistan</p>
                    <p>
                        <i class="fas fa-map-marker-alt"></i> <!-- Location Icon -->
                        {{ $job->jobLocation }}
                              
                        <i class="fas fa-money-bill-alt"></i> 
                        {{ $jobs[0]->min_salary }} to {{ $jobs[0]->max_salary }} / month

                        <i class="fas fa-clock"></i>
                        {{ $job->jobType }} 
                        
                    </p>

                    
                    <p>{!! $job->jobDescription !!}</p> 
                </div>
                <!-- End Job Listing -->
                @endforeach
                @endif
            </div>
        </div> 
      
        <!-- Right Column for Job Details -->
        <div class="col-md-5" id= 'right-pan'>
          <div id="job-details" class="job-details-container">
              <!-- Job Detail Information (Header) -->
              <div id="loading-container">
                  <i class="fas fa-spinner fa-spin"></i> Loading...
              </div>
              
              <div class="job-header">
                  @if($jobs && count($jobs) > 0)
                      <!-- Display the first job listing -->
                      <h4><b>{{ $jobs[0]->jobTitle }}</b><h4>
                      <p>Company:</p>
                      <p>{{ $jobs[0]->min_salary }} - {{ $jobs[0]->max_salary }} a month</p>
                  @endif
                  @if (Auth::check())
                     <button type="button" class="btn btn-primary btn-block" id="apply_now">
                        <i class="fa fa-briefcase"></i> Apply Now
                    </button>
                  @else
                    <a href="{{ route('login') }}" class="btn btn-primary btn-block" id="apply_now">
                      <i class="fa fa-briefcase"></i> Apply Now
                    </a>
                  @endif


              </div>
              <!-- Job Description -->
              <div class="job-description">
                  <p>Description: Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                
              
              </div>
                           
          </div>
      </div>

      </div>
      <!-- End of Three columns row -->
    </div>
  </div>
</div>

<aside class="control-sidebar control-sidebar-dark">
  <!-- Add content or widgets for the control sidebar if needed -->
</aside>

<style>
  /* Style for the "Find a Job" row */
  #find-job-row {
   /* background-color: rgba(0, 123, 255, 0.2); */       /* Transparent blue background */
    padding: 20px 0;
    margin-bottom: 20px;
  }
   #job-search-form .form-group {
       width: 40%;
  }
  
  #job-search-form .label-text-input {
      display: inline-block;
  }
  #job-search-form input {
    width: 80%;
    color: #2d2d2d;
    height: 44px;
    min-height: 44px;
    padding-top: 0.5rem;
    padding-right: 0.5rem;
    padding-bottom: 0.5rem;
    padding-left: 0.25rem;
  }

  /* Style for the "Find Job" button */
  .btn-primary {
      background-color: #164081 !important;
      border-color: #164081 !important;
  }
  #job-search-form button .job-search-btn {
    background-color: #164081;
    cursor: pointer;
    font-family: Noto Sans,Helvetica Neue,Helvetica,Arial,sans-serif;
    font-weight: 700;
    font-size: .875rem;
    letter-spacing: 0;
    line-height: 1.43;
    margin: 0 0 1rem;
    padding: 0.75rem 1rem;
    display: block;
    box-sizing: border-box;
    white-space: nowrap;
    word-break: keep-all;
    flex-shrink: 0;
    border: 0.0625rem solid transparent;
    border-radius: 0.5rem;
    color: #fff;
    box-shadow: none;
    text-align: center;
    text-decoration: none;
    min-width: 94px;
    width: 20%;
  }

  #job-search-form button:hover {
    background-color: #0056b3;
    border-color: #0056b3;
  }

  /* Style for checkboxes */
  .form-check-input {
    margin-right: 8px;
  }


       p {
            color: #333 !important; /* Dark Gray Color */
            font-size: 12px;
        }
        .label-custom-style {
            font-weight: normal; 
            font-size: 12px;
            color: #333; 
            padding:5px;
            
        }

        #loading-container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(255, 255, 255, 0.9); /* Semi-transparent background */
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            text-align: center;
            z-index: 1000; /* Adjust as needed */
            display:none;
        }

        #loading-container-center {
            position: absolute;
            top: 30%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(255, 255, 255, 0.9); /* Semi-transparent background */
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            text-align: center;
            z-index: 1000; /* Adjust as needed */
            display:none;
        }

        #apply_now {
         
          width : 25%;
          
        }
        .job-details-container {
            height: 600px;
            overflow-y: hidden;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            padding: 20px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            position: sticky;
            top: 20px; /* Adjust as needed */
        }

        .job-header {
            height: 30%;
            padding: 10px;
            background-color: #f9f9f9;
        }

        .job-description {
            height:70%;
            overflow-y: auto;
            padding: 10px;
            font-size: 12px;
        }

        .job-header h3 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .job-header p {
            font-size: 16px;
            margin-bottom: 8px;
        }


        .job-description p {
            font-size: 12px;
            margin-bottom: 12px;
        }

        /* Style the "Apply Now" button */
        .btn-block {
            width: 100%;
        }



        /* Style the job title */
        .job-title {
            font-size: 24px;
            margin-bottom: 10px;
        }

        /* Style the company and location */
        .company, .location {
            font-size: 16px;
            color: #777;
            margin-bottom: 8px;
        }

        /* Style the job description */
        .description {
            font-size: 18px;
            margin-bottom: 12px;
        }

        /* Style the apply button */
        .apply-btn {
            display: block;
            width: 100%;
            padding: 10px 0;
            background-color: #007bff;
            color: #fff;
            text-align: center;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        .apply-btn:hover {
            background-color: #0056b3;
        }
          #job-details {
            position: sticky;
            top: 20px; 
            background-color: white; 
            padding: 10px;
        }
         

          /* Additional design for filters */
          .form-check-label {
            cursor: pointer;
            display: flex;
            align-items: center;
          }

          .form-check-label:hover {
            background-color: #f2f2f2;
          }

          /* Style for custom range input */
          .custom-range {
            -webkit-appearance: none;
            appearance: none;
            width: 100%;
            height: 10px;
            border-radius: 5px;
            background: #d3d3d3; /* Grey background for the track */
            outline: none;
            opacity: 0.7;
            -webkit-transition: opacity 0.2s;
            transition: opacity 0.2s;
          }

          .custom-range::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: #007bff; 
            cursor: pointer;
          }

          .custom-range::-moz-range-thumb {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: #007bff;
            cursor: pointer;
          }

          .custom-range::-ms-thumb {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: #007bff;
            cursor: pointer;
          }

          /* CSS for the job listings container */
        .job-listings {
            max-height: 300px; 
            overflow-y: auto; 
            border: 1px solid black;
        }
        ::-webkit-scrollbar-thumb {
  background-color: #d6dee1;
  border-radius: 20px;
}

.job-details-table {
    width: 100%;
    border-collapse: collapse;
}

.job-details-table th,
.job-details-table td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

.job-details-table th {
    background-color: #f2f2f2;
}

.filter {
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 10px;
            margin-bottom: 10px;
          }

          .filter h4 {
            margin-bottom: 5px;
          }

</style><script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script>

$(document).ready(function () {

  var salaryMinInput = document.getElementById('salary-min');
    salaryMinInput.addEventListener('click', function () {
    var submitButton = document.getElementById('submit-button');
    submitButton.click();  

  });



var lastClickedDiv = $('#job-listings .job-listing:first'); 

      $('#job-listings').on('click', '.job-listing', function() {
          lastClickedDiv.css('border-color', '#ddd'); 
          $(this).css('border-color', '#164081'); 
          lastClickedDiv = $(this); 
      });

    $('#job-search-form').submit(function (event) { 
      var checkedValues = []; 
      if ($('#full_time').prop('checked')) {
            checkedValues.push($('#full_time').val());
            var full_time = $('#full_time').val();
        }
        
        
        if ($('#contract').prop('checked')) {
            checkedValues.push($('#contract').val());
            var contract = $('#contract').val();
        }
        
        
        if ($('#part_time').prop('checked')) {
            checkedValues.push($('#part_time').val());
            var part_time = $('#part_time').val();
        }



      $('#loading-container-center').show();
        event.preventDefault(); 
        var keywords = $('#keywords').val();
        var location = $('#location').val();
        var salary = $('#salary-min-value').text();
        

        console.log(salary);
        $.ajax({
            type: 'GET',
            url: '/search-jobs', 
            data: {
                keywords: keywords,
                location: location,
                salary: salary,
                contract : contract,
                full_time : full_time,
                part_time : part_time
            },
            success: function (data) {
                console.log(data.salary);
                $('#job-listings').empty();
                if (data.jobs.length === 0) {
                      $('#job-listings').append('<p>No results found.</p>');
                } else {
      
                  $.each(data.jobs, function(index, job) { 
                  var jobHtml = `
                      <div class="job-listing rounded p-3 mb-3" style="border: 1px solid #ddd; max-height: 300px; min-height: 300px; overflow: hidden; cursor: pointer;" data-job-id="${job.id}">
                         <h4><b>${job.jobTitle}</b></h4>
                          <p>CureMD, Lahore, Pakistan</p>
                          <p>
                              <i class="fas fa-map-marker-alt"></i> 
                              ${job.jobLocation} 
                                    
                              <i class="fas fa-money-bill-alt"></i> 
                              ${job.min_salary }  - ${ job.max_salary } / month

                              <i class="fas fa-clock"></i>
                               ${job.jobType } 
                          </p>
                          <p>Description: ${job.jobDescription}</p>
                      </div>
                  `;
                    $('#job-listings').append(jobHtml);
                    
                });
              }  
              $('#loading-container-center').hide();
            },
            error: function (xhr, status, error) {
                console.error(error);
                $('#loading-container-center').hide();
            },
        });
    });
});


    
$(document).on('click', '.job-listing', function () {
    var jobId = $(this).data('job-id');
    
    // Show the loading indicator
    $('#loading-container').show();

    $.ajax({
        type: 'GET',
        url: `/get-job-details/${jobId}`,
        dataType: 'json',
        success: function (job) {
            // Hide the loading indicator
            $('#loading-container').hide();

            // Update job details
            updateJobDetails(job);
        },
        error: function (xhr, status, error) {
            // Hide the loading indicator on error as well
            $('#loading-container').hide();

            console.error(error);
        },
    });
});


    function updateJobDetails(data) {
    var jobDetailsDiv = $('.job-header');
    var jobHtml = `
        <h4><b>${data.job.jobTitle}</b></h4>
        <p>Location: ${data.job.jobLocation}</p>
        <a href="{{ route('login') }}" class="btn btn-primary btn-block" id="apply_now">
                      <i class="fa fa-briefcase"></i> Apply Now
                    </a>
    `;
    
    jobDetailsDiv.html(jobHtml);
    
    var jobDetailsDiv = $('.job-description');
    var jobHtml = `
        <p><b><h4>Job Description</h4></b> ${data.job.jobDescription}</p>

        <p><b><h4>Job Details</h4></b> </p>
        <table class="job-details-table">
    <tbody>
        <tr>
            <th>Total Positions:</th>
            <td>${data.job.numPositions !== null ? data.job.numPositions : 'N/A'}</td>
        </tr>
        <tr>
            <th>Job Shift</th>
            <td>N/A</td>
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
  const salaryMinInput = document.getElementById('salary-min');
  const salaryMinValue = document.getElementById('salary-min-value');

  salaryMinInput.addEventListener('input', function () {
    salaryMinValue.textContent = this.value;
  });
  
  
</script>
@endsection
