<div class="information-container6">
    <div class="file-details">
        <div class="file-icon">
            <img src="../images/ParentalConsent.png" alt="File Icon" class="icon">
        </div>
        <div class="file-info">
            <span class="file-name">PARENTAL CONSENT FORM</span>
            <span class="file-size">very important</span>
        </div>
        <div class="file-actions">
            <a href="../images/UNESCO_Junior_Contract.pdf" 
               download="consent.pdf" 
               target="_blank" 
               class="download-button" 
               id="downloadConsent">
                Download
            </a>
        </div>
    </div>

    <!-- Checkboxes Section -->
    <div class="checkbox-section">
        <label class="checkbox-container">
            <input type="checkbox" id="consentCheckbox" disabled required>
            <span>I have downloaded the file.</span>
        </label>
        <label class="checkbox-container">
            <input type="checkbox" id="uploadCheckbox" disabled required>
            <span>I have uploaded a file.</span>
        </label>
        <input type="file" class="form-control" id="consentForm" name="consentForm">
    </div>
</div>

<script>
   
</script>

<style>
.information-container6 {
    border: 1px solid #e0e0e0;
    padding: 10px;
    border-radius: 8px;
    display: flex;
    flex-direction: column;
    margin: 20px;
}

.file-details {
    display: flex;
    align-items: center;
    padding: 10px;
    background-color: #f9f9f9;
    border-radius: 8px;
}

.file-icon {
    width: 40px;
    height: 40px;
    margin-right: 10px;
}

.file-icon img {
    width: 100%;
    height: 100%;
}

.file-info {
    flex-grow: 1;
}

.file-name {
    display: block;
    font-weight: bold;
    font-size: 1rem;
    color: #333;
}

.file-size {
    display: block;
    font-size: 0.9rem;
    color: #666;
}

.file-actions {
    display: flex;
    gap: 10px;
}

.share-button, .download-button {
    border: none;
    border-radius: 5px;
    padding: 8px 16px;
    color: #fff;
    font-weight: bold;
    cursor: pointer;
}

.share-button {
    background-color: #ff4d4d;
}

.download-button {
    background-color: #1e90ff;
    text-decoration: none;
    display: inline-block;
    text-align: center;
}

.checkbox-section {
    margin-top: 15px;
    display: flex;
    gap: 20px;
    align-items: center;
}

.checkbox-container {
    display: flex;
    align-items: center;
    font-size: 0.9rem;
    color: #333;
}

.form-control {
    margin-left: auto;
}
</style>
