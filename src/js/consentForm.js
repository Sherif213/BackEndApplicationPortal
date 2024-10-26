// Get the elements
const downloadLink = document.getElementById("downloadConsent");
const consentCheckbox = document.getElementById("consentCheckbox");
const fileUpload = document.getElementById("consentForm");
const uploadCheckbox = document.getElementById("uploadCheckbox");

// Enable the consent checkbox after clicking the download link
downloadLink.addEventListener("click", () => {
  setTimeout(() => {
    consentCheckbox.disabled = false;  // Enable after a small delay (simulating download)
  }, 500);
});

// Enable the upload checkbox once a file is selected
fileUpload.addEventListener("change", () => {
  if (fileUpload.files.length > 0) {
    uploadCheckbox.disabled = false;  // Enable upload checkbox if a file is selected
  }
});
