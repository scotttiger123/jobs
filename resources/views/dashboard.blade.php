@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Post a Job</h1>
    <form action="{{ route('post-job') }}" method="POST">
            @csrf
            <!-- Job Title -->
            <div class="form-group">
                <label for="jobTitle">Job Title*</label>
                <input type="text" id="jobTitle" name="jobTitle" required>
            </div>

            <!-- Job Description -->
            <div class="form-group">
                <label for="jobDescription">Job Description*</label>
                <textarea id="jobDescription" name="jobDescription" required></textarea>
            </div>

            <!-- Skills Required -->
            <div class="form-group">
                <label for="skillsRequired">Skills Required*</label>
                <input type="text" id="skillsRequired" name="skillsRequired" required>
                <small>Max. 20 skills allowed (comma-separated)</small>
            </div>

            <!-- Career Level -->
            <div class="form-group">
                <label for="careerLevel">Required Career Level*</label>
                <select id="careerLevel" name="careerLevel" required>
                    <option value="entry">Entry Level</option>
                    <option value="mid">Mid Level</option>
                    <option value="senior">Senior Level</option>
                </select>
            </div>

            <!-- Number of Positions -->
            <div class="form-group">
                <label for="numPositions">No. of Positions*</label>
                <input type="number" id="numPositions" name="numPositions" required>
            </div>

            <!-- Job Location -->
            <div class="form-group">
                <label for="jobLocation">Job Location*</label>
                <input type="text" id="jobLocation" name="jobLocation" required>
            </div>

            <!-- Minimum Qualification -->
            <div class="form-group">
                <label for="minQualification">Minimum Qualification*</label>
                <input type="text" id="minQualification" name="minQualification" required>
            </div>

            <!-- Years of Experience Required -->
            <div class="form-group">
                <label for="experienceYears">Years of Experience Required*</label>
                <input type="number" id="experienceYears" name="experienceYears" required>
            </div>

            <!-- Salary Range -->
            <div class="form-group">
                <label>What is the salary range?*</label>
                <input type="number" id="salaryFrom" name="salaryFrom" placeholder="From" required>
                <input type="number" id="salaryTo" name="salaryTo" placeholder="To" required>
            </div>

            <!-- Salary Visibility -->
            <div class="form-group">
                <label>Should the salary be visible in your job post?</label><br>
                <label>
                    <input type="radio" name="salaryVisibility" value="yes"> Yes
                </label>
                <label>
                    <input type="radio" name="salaryVisibility" value="no"> No
                </label>
            </div>

            <!-- Gender Preference -->
            <div class="form-group">
                <label>Is there a gender preference for this job?</label><br>
                <label>
                    <input type="radio" name="genderPreference" value="yes"> Yes
                </label>
                <label>
                    <input type="radio" name="genderPreference" value="no"> No
                </label>
            </div>

            <!-- Submit Button -->
            <button type="submit">Post Job</button>
</div>
@endsection