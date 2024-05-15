document.addEventListener('DOMContentLoaded', function () {
    fetch('getRandomMovie.php')
        .then(response => response.json())
        .then(movie => {
            document.getElementById('trailer').src = movie.trailer;
            document.getElementById('movie-title').textContent = movie.title;
            document.getElementById('movie-synop').textContent = movie.synop;
        })
        .catch(error => console.error('Error fetching movie:', error));
});
