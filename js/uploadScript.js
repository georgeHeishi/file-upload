document.addEventListener("DOMContentLoaded", () => {
    document.querySelector('#submit').addEventListener('click', () => {
        const form = new FormData(document.querySelector('#file-uploader'));
        const url = 'uploadController.php'
        const request = new Request(url, {
            method: 'POST',
            body: form
        });

        fetch(request)
            .then(response => response.json())
            .then(data => {
                console.log(data);
            })
    });
});