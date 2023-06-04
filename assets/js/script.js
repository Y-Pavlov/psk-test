window.onload = function() {
    const fileBtn = document.querySelector('#file-btn');

    fileBtn.addEventListener('click', (e) => {
        e.preventDefault();
        const formData = new FormData();
        const fileField = document.querySelector('input[type="file"]');

        formData.append("file", fileField.files[0]);

        upload(formData);
    })
};

async function upload(formData) {
    try {
        const response = await fetch('ajax/ajax.php', {
            method: "POST",
            body: formData,
        });
        const result = await response.text();
        let append = document.querySelector('.append');
        append.innerHTML = result;
    } catch (error) {
        console.error("Error:", error);
    }
}