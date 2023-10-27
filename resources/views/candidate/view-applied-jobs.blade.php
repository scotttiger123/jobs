@extends('layouts.layouts-vertical-candidate.app')
@section('content')
<div class="content-wrapper">
    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><b>Applied Jobs</b></h3>
                </div>
                <div class="card-body">
                    <div class="card-body p-0">
                    <table id="jobPostTable" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Job Title</th>
            <th>Company</th>
            <th>Applied</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($appliedJobs as $appliedJob)
        <tr>
            <td>
                @if ($appliedJob->JobPost) <!-- Check if the relationship exists -->
                    {{ $appliedJob->JobPost->jobTitle }}
                @else
                    Job information not available
                @endif
            </td>
            <td>
                @if ($appliedJob->JobPost) <!-- Check if the relationship exists -->
                    {{ $appliedJob->JobPost->company }}
                @else
                    N/A
                @endif
            </td>
            <td>
                @if ($appliedJob->created_at)
                    {{ $appliedJob->created_at }}
                @else
                    N/A
                @endif
            </td>

           
        </tr>
        @endforeach
    </tbody>
</table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Job Details -->
<div class="modal fade" id="jobDetailsModal" tabindex="-1" role="dialog" aria-labelledby="jobDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog custom-modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="jobDetailsModalLabel">Job Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <table class="table table-bordered table-striped">
                                    <tbody>
                                        <tr>
                                            <th>Field</th>
                                            <th>Value</th>
                                        </tr>
                                        <tr>
                                            <td>Job Title</td>
                                            <td id="modalJobTitle"></td>
                                        </tr>
                                        <tr>
                                            <td>Job Skills</td>
                                            <td id="modalJobSkills"></td>
                                        </tr>
                                        <tr>
                                            <td>Career Level</td>
                                            <td id="careerLevel"></td>
                                        </tr>
                                        <tr>
                                            <td>Number of Positions</td>
                                            <td id="numPositions"></td>
                                        </tr>
                                        <tr>
                                            <td>Job Location</td>
                                            <td id="jobLocation"></td>
                                        </tr>
                                        <tr>
                                            <td>Min Salary</td>
                                            <td id="min_salary"></td>
                                        </tr>
                                        <tr>
                                            <td>Max Salary</td>
                                            <td id="max_salary"></td>
                                        </tr>
                                        <tr>
                                            <td>Salary Visibility</td>
                                            <td id="salaryVisibility"></td>
                                        </tr>
                                        <tr>
                                            <td>Gender Preference</td>
                                            <td id="genderPreference"></td>
                                        </tr>
                                        <tr>
                                            <td>Specific Degree Title</td>
                                            <td id="specificDegreeTitle"></td>
                                        </tr>
                                        <tr>
                                            <td>Min Experience</td>
                                            <td id="minExperience"></td>
                                        </tr>
                                        <tr>
                                            <td>Max Experience</td>
                                            <td id="maxExperience"></td>
                                        </tr>
                                        <tr>
                                            <td>Experience Info</td>
                                            <td id="experienceInfo"></td>
                                        </tr>
                                        <tr>
                                            <td>Min Age</td>
                                            <td id="minAge"></td>
                                        </tr>
                                        <tr>
                                            <td>Max Age</td>
                                            <td id="maxAge"></td>
                                        </tr>
                                        <tr>
                                            <td>Job Type</td>
                                            <td id="jobType"></td>
                                        </tr>
                                        <tr>
                                            <td>Job Description</td>
                                            <td id="jobDescription"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<style>
    .custom-modal-dialog {
        max-width: 800px; /* Adjust the width as needed */
        width: 90%; /* Adjust the width as needed */
    }
</style>


<script>
    $(document).ready(function () {
        
        $('.view-details').click(function () {
            var jobId = $(this).data('job-id');

        
            $.ajax({
                url: '/fetch-job-details/' + jobId, 
                method: 'GET',
                dataType: 'json',
                success: function (data) {
                    
                    $('#modalJobTitle').text(data.jobTitle);
                    $('#modalJobSkills').text(data.skillsRequired);
                    $('#careerLevel').text(data.careerLevel);
                    $('#numPositions').text(data.numPositions);
                    $('#jobLocation').text(data.jobLocation);
                    $('#min_salary').text(data.min_salary);
                    $('#max_salary').text(data.max_salary);
                    $('#salaryVisibility').text(data.salaryVisibility);
                    $('#genderPreference').text(data.genderPreference);
                    $('#specificDegreeTitle').text(data.specificDegreeTitle);
                    $('#minExperience').text(data.minExperience);
                    $('#maxExperience').text(data.maxExperience);
                    $('#experienceInfo').text(data.experienceInfo);
                    $('#minAge').text(data.minAge);
                    $('#maxAge').text(data.maxAge);
                    $('#jobType').text(data.jobType);
                    $('#apply_by_date').text(data.apply_by_date);
                    var jobDescriptionHtml = data.jobDescription;
                    var tempElement = $('<div>').html(jobDescriptionHtml);
                    var jobDescriptionText = tempElement.text();
                    $('#jobDescription').text(jobDescriptionText);
                                            
                    $('#jobDetailsModal').modal('show');
                },
                error: function (xhr, status, error) {
                    console.error(error);
                }
            });
        });
    });
</script>
@endsection

