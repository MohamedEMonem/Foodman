function fetch_user_data() {
    fetch('fetch_user_data.php')
        .then(response => {
            if (response.status === 401) {
                window.location.href = 'loginPage.php';
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
                document.getElementById('name').textContent = data.name;

            }
        })
        .catch(error => console.error('Error fetching user data:', error));
};
