function sendAJAXRequest(url, data) {
    fetch(url, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(data)
    })
    .then(response => response.json())
    .then(data => {
        // Handle success or error based on server response
        console.log("Task updated successfully:", data);
    })
    .catch(error => {
        console.error('Error:', error);
    });
}
