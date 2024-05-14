document.addEventListener('DOMContentLoaded', function () {
    fetch('fetch_user_data.php')
        .then(response => {
            if (response.status === 401) {
                // If the server responds with 401 (Unauthorized), redirect to loginPage.php
                window.location.href = 'loginPage.php';
                return;
            }
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            if (data.error) {
                console.error('Error fetching user data:', data.error);
            } else {
                document.getElementById('email').textContent = data.email;
                document.getElementById('name').textContent = data.name;
                document.getElementById('phone').textContent = data.phone;
                document.getElementById('created_at').textContent = new Date(data.created_at).toLocaleString();
            }
        })
        .catch(error => console.error('Error fetching user data:', error));
});
