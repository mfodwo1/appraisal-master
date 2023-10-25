<div>

@foreach($this->showAppraiseeDetails as $appraiseeDetails)
    <div>
        <h1>Appraisee Details</h1>
        <p>First Name: {{ $appraiseeDetails->first_name }}</p>
        <p>Surname: {{ $appraiseeDetails->surname }}</p>
        <!-- Add more details here -->
    </div>
    @endforeach


</div>
