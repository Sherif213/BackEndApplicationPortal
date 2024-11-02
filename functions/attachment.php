<?php
// functions/attachment.php

use App\Models\Attachment;

function createNewAttachment($imageData)
{
    try {
        writeToLog("Creating new attachment with data: " . json_encode($imageData));
        $newAttachment = Attachment::create($imageData);
        writeToLog("New attachment created successfully with ID: {$newAttachment->id}");
        return $newAttachment;
    } catch (Exception $e) {
        writeToLog("ERROR creating new attachment: " . $e->getMessage());
        throw new Exception($e->getMessage());
    }
}
?>
