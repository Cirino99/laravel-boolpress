require('./bootstrap');

const inputImage = document.getElementById('image');
if (inputImage) {
    const elePreview = document.getElementById('previewImg')
    inputImage.addEventListener('change', function (event) {
        const imgPath = event.target.files[0];
        const reader = new FileReader();

        reader.addEventListener('load', () => {
            elePreview.src = reader.result;
        });

        if (imgPath) {
            reader.readAsDataURL(imgPath);
        }
    })
}