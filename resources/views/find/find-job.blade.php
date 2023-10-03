@extends('layouts.app')
@section('content')
<div class="content-wrapper" style="background-color: white;">
<div class="content" style="background-color: white;"> <!-- Add background-color: white; here -->
    <div class="container">
      <!-- Separate row for "Find a Job" -->
      <div class="row" id="find-job-row">
        <div class="col-md-12 text-center">
          <form class="form-inline" id="job-search-form">
            <div class="form-group">
              <input type="text" class="form-control mr-2" id="keywords" placeholder="Keywords">
            </div>
            <div class="form-group">
              <input type="text" class="form-control mr-2" id="location" placeholder="Location">
            </div>
            <button type="submit" class="btn btn-primary">Find Job</button>
          </form>
        </div>
      </div>
      <!-- End of "Find a Job" row -->

      <!-- Three columns for Filters, Job Search, and Job Details -->
      <div class="row">
        <!-- Left Column for Filters -->
        <div class="col-md-3">
          <div class="job-filters">
            <h3>Filters</h3>
            <div class="filter">
              <h4>Min salery</h4> 
              <label for="salary-min">Minimum Salary: <span id="salary-min-value">0</span></label>
              <input type="range" class="custom-range" id="salary-min" min="0" max="100000" step="1000">

            </div>  
            <div class="filter">
              <h4>Location</h4>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="city1" id="location1">
                <label class="form-check-label" for="location1">
                  City 1
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="city2" id="location2">
                <label class="form-check-label" for="location2">
                  City 2
                </label>
              </div>
              <!-- Add more location options as needed -->
            </div>
            <div class="filter">
              <h4>Job Type</h4>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="full-time" id="job-type1">
                <label class="form-check-label" for="job-type1">
                  Full-Time
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="part-time" id="job-type2">
                <label class="form-check-label" for="job-type2">
                  Part-Time
                </label>
              </div>
              <!-- Add more job type options as needed -->
            </div>
            <!-- Add more filters as needed -->
            <button type="button" class="btn btn-primary btn-block">Apply Filters</button>
          </div>
        </div>

        <!-- Middle Column for Job Search -->
        <div class="col-md-6">
          <!-- Job Listings -->
          
          <div class="job-listings">
            
            <!-- Example Job Listing -->
            <div class="job-listing">
              <h3>Job Title 1</h3>
              <p>Company: Company XYZ</p>
              <p>Location: City, State</p>
              <p>Description: Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
              <a href="#" class="btn btn-primary">Apply Now</a>
            </div>
            
            <!-- Example Job Listing -->
            <div class="job-listing">
              <h3>Job Title 2</h3>
              <p>Company: Company ABC</p>
              <p>Location: City, State</p>
              <p>Description: Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
              <a href="#" class="btn btn-primary">Apply Now</a>
            </div>
          </div>
        </div>

        <!-- Right Column for Job Details -->
        <div class="col-md-3">
          <div class="job-details">
            <!-- Job Detail Information -->
            <h3>Job Title</h3>
            <p>Company: Company XYZ</p>
            <p>Location: City, State</p>
            <p>Description: Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            <a href="#" class="btn btn-primary btn-block">Apply Now</a>
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
    background-color: rgba(0, 123, 255, 0.2); /* Transparent blue background */
    padding: 20px 0;
    margin-bottom: 20px;
  }

  /* Style for the "Find Job" button */
  #job-search-form button {
    background-color: #007bff;
    border-color: #007bff;
  }

  #job-search-form button:hover {
    background-color: #0056b3;
    border-color: #0056b3;
  }

  /* Style for checkboxes */
  .form-check-input {
    margin-right: 8px;
  }

  /* Style for filters */
  .filter {
    background-color: #fff; /* White background */
    border: 1px solid #ddd;
    padding: 10px;
    margin-bottom: 10px;
  }

  .filter h4 {
    margin-bottom: 5px;
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
    background: #007bff; /* Blue thumb */
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
</style>
<!-- JavaScript to update range input value -->
<script>
  const salaryMinInput = document.getElementById('salary-min');
  const salaryMinValue = document.getElementById('salary-min-value');

  salaryMinInput.addEventListener('input', function () {
    salaryMinValue.textContent = this.value;
  });
</script>
@endsection
