document.addEventListener('DOMContentLoaded', () => {
    const responseText = document.querySelector('#response-text');
    const submit = document.querySelector('#submit');
    const fileInput = document.querySelector('#file-input');

    fileInput.addEventListener('click', () =>{
       responseText.innerHTML = "";
    });

    submit.addEventListener('click', () => {
        const form = new FormData(document.querySelector('#file-uploader'));
        const url = 'controller/uploadController.php'
        const request = new Request(url, {
            method: 'POST',
            body: form
        });

        fetch(request)
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    responseText.style.color = 'red';
                } else {
                    responseText.style.color = 'green';
                }
                responseText.innerHTML = data.message;
            })
    });
});