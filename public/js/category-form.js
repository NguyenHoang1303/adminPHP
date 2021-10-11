document.addEventListener("DOMContentLoaded", function () {

    const thumbnail = document.forms['formCategory']['thumbnail'];

    const myWidget = cloudinary.createUploadWidget({
            cloudName: 'nguyenhs',
            uploadPreset: 'phplaravel'
        }, (error, result) => {
            if (!error && result && result.event === "success") {
                console.log('Done! Here is the image info: ', result.info.secure_url);
                thumbnail.value += result.info.secure_url + ',';
                document.getElementById('preview-img').innerHTML += `<img src="${result.info.secure_url}" class="col-md-12 col-sm-12 img-thumbnail mr-2 mb-2 imagesChoice">`;
            }
        }
    );

    thumbnail.value.split(',').forEach(ele => {
        if (ele.length > 0) {
            document.getElementById('preview-img').innerHTML += `<img src="${ele}" class="col-md-12 col-sm-12 img-thumbnail mr-2 mb-2 imagesChoice">`;
        }
    })
    document.getElementById("upload_widget").addEventListener("click", function () {
        myWidget.open();
    }, false);
    const reset = document.getElementById("reset");

    reset.addEventListener("click", function () {
        $("#preview-img").children().remove();
        $('input[name="name"]').attr('value','');
        $('#description').text('');
        thumbnail.value = "";
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;

    })
})
