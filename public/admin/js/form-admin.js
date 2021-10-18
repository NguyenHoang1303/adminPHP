document.addEventListener("DOMContentLoaded", function () {

    const thumbnail = document.forms['formCategory']['thumbnail'];


    const myWidget = cloudinary.createUploadWidget({
            cloudName: 'nguyenhs',
            uploadPreset: 'phplaravel'
        }, (error, result) => {
            if (!error && result && result.event === "success") {
                console.log('Done! Here is the image info: ', result.info.secure_url);
                thumbnail.value += result.info.secure_url + ',';
                document.getElementById('preview-img').innerHTML += `<img src="${result.info.secure_url}" class="col-md-5 col-sm-5 img-thumbnail mr-2 mb-2 imagesChoice">`;
            }
        }
    );

    const update = $('#update')
    if (update.text().length > 0){
        thumbnail.value.split(',').forEach(ele => {
            if (ele.length > 0) {
                document.getElementById('preview-img').innerHTML += `<img src="${ele}" class="col-md-5 col-sm-5 img-thumbnail mr-2 mb-2 imagesChoice">`;
            }
        })
    }

    document.getElementById("upload_widget").addEventListener("click", function () {
        thumbnail.value = '';
        $('#preview-img').html("");
        myWidget.open();
    }, false);
    const reset = $('#reset');
    console.log(reset);
    const listImage = $("#preview-img");
    const price = $('input[name="price"]');
    const name = $('input[name="name"]');
    const detailProduct = $('.detailProduct');

    reset.on("click", function () {
        name.attr('value','');
        if (price.val()){
            price.attr('value','');
        }
        if (listImage.children()){
            listImage.children().remove();
        }
        if (detailProduct.text()){
            detailProduct.text('');
        }
        $('#description').text('');
        thumbnail.value = "";
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;

    })
})
