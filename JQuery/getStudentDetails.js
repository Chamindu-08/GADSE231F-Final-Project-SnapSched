// Make AJAX request to fetch data
var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        var data = JSON.parse(this.responseText);
        populateLabels(data);
    }
};
xhttp.open("GET", "StudentProfile.php", true);
xhttp.send();

// Function to populate labels
function populateLabels(data) {
    var admissionNoLabel = document.querySelector('label[for="admissionNo"]');
    var admissionDateLabel = document.querySelector('label[for="admissionDate"]');
    var addressLabel = document.querySelector('label[for="address"]');
    var emailLabel = document.querySelector('label[for="email"]');
    var dobLabel = document.querySelector('label[for="dob"]');
    var guardianNameLabel = document.querySelector('label[for="guardianName"]');
    var contactNoLabel = document.querySelector('label[for="contactNo"]');
    var emergencyContactNoLabel = document.querySelector('label[for="emergencyContactNo"]');
    var passwordLabel = document.querySelector('label[for="password"]');
    var firstNameLastName = document.querySelector('h4');
    var sureName = document.querySelector('h6');

    // Populate labels with data from the database
    admissionNoLabel.textContent = data.StudentId;
    admissionDateLabel.textContent = data.AdmissionDate;
    addressLabel.textContent = data.StudentAddress;
    emailLabel.textContent = data.StudentEmail;
    dobLabel.textContent = data.DOB;
    guardianNameLabel.textContent = data.GuardianName;
    contactNoLabel.textContent = data.GuardianContactNo;
    emergencyContactNoLabel.textContent = data.EmergencyContactNo;
    passwordLabel.textContent = data.StudentPassword;
    firstNameLastName.textContent = data.FirstName + " " + data.LastName;
    sureName.textContent = data.SurName;
}
