
window.addEventListener('load', () => {
    fetchRandomTrailer();
});

function fetchRandomTrailer() {
    fetch('/trailer') // URL TO BACKEND ROUTE
    .then(response => movies.json())
    .then(data => {
        // Display the trailer on the webpage
        document.getElementById('trailer').src = data.trailer_url;
    })
    .catch(error => {
        console.error('Error fetching random trailer:', error);
    });
}