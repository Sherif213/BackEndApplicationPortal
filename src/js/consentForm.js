 // Check the download checkbox when the download link is clicked
 document.getElementById('downloadConsent').addEventListener('click', function() {
  document.getElementById('consentCheckbox').checked = true;
});

// Check the upload checkbox when a file is selected
document.getElementById('consentForm').addEventListener('change', function() {
  if (this.files.length > 0) {
      document.getElementById('uploadCheckbox').checked = true;
  }
})