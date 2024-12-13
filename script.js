document.addEventListener('DOMContentLoaded', function () {
    const editor = document.querySelector('trix-editor');
    
    // Handle image upload and custom functionality (if needed)
    editor.addEventListener('trix-attachment-add', function(event) {
        const attachment = event.attachment;

        if (attachment.file) {
            // Simulate the image upload by appending it after being uploaded
            const formData = new FormData();
            formData.append('file', attachment.file);

            fetch('http://localhost/Ecosphere/upload.php', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': 'your-csrf-token-here'
                }
            })
            .then(response => response.json())
            .then(data => {
                // Update the image source after upload is complete
                attachment.setAttributes({
                    url: data.fileUrl // Assuming the response contains the uploaded image URL
                });
            })
            .catch(error => {
                console.error('Error uploading image:', error);
            });
        }
    });

    // You can customize further or handle other functionality here
});
