document.addEventListener("DOMContentLoaded", function () {

// ============================ Xử lý ảnh cách 1 không cần gửi curl ===================================================
//     const thumbnail = document.forms['formCategory']['thumbnail'];
//     $('#opener').cloudinary_upload_widget({
//         cloud_name: "nguyenhs",
//         upload_preset: "phplaravel"
//     }, function (error, result) {
//
//         if (!error && result && result.event === "success") {
//             console.log(result.info.secure_url)
//             thumbnail.value += result.info.secure_url + ',';
//         }
//
//     });
//
//     $(document).on('click', '.cloudinary-delete', function () {
//         // lấy ra thuộc tính data-cloudinary trong thẻ cha của nút xoá
//         const src = $(this).parent().attr('data-cloudinary');
//         //cắt value thumbnail thành mảng chứa các link
//         const arrayLinks = thumbnail.value.split(',');
//         // xoá phần tử cuối cùng
//         arrayLinks.pop();
//         //tìm kiếm và xoá phần tử trong mảng
//         const linksAfterRemove = arrayLinks.filter(ele => {
//             //convert chuỗi thành Json để lấy url thumbnail
//             const obj = JSON.parse(src);
//             return ele !== obj.secure_url
//         });
//         // nếu xoá hết link thì thumbnail = rỗng
//         // nếu không thì join lại thành chuỗi cách nhau bởi dấu phẩy và thêm dấu phẩy cuối chuỗi
//         thumbnail.value = linksAfterRemove.length > 0 ? (linksAfterRemove.join(',') + ',') : '';
//     })

// ============================ Xử lý ảnh cách 2 không cần gửi curl ===================================================


    const thumbnail = document.forms['formCategory']['thumbnail'];
    $(document).on('click', '.close-preview', function () {
        $(this).parent().remove();
        const linkImg = $(this).siblings().attr('src');
        const arrayLinks = thumbnail.value.split(',');
        arrayLinks.pop();
        const linksAfterRemove = arrayLinks.filter(ele => {
            return ele !== linkImg;
        })
        thumbnail.value = linksAfterRemove.length > 0 ? (linksAfterRemove.join(',') + ',') : '';
        const deleteToken = $(this).siblings().attr('data-delete-token');
        deleteImageInCloudinary(deleteToken)

    })

    function deleteImageInCloudinary(deleteToken) {
        const url = "https://api.cloudinary.com/v1_1/nguyenhs/delete_by_token";
        const xhr = new XMLHttpRequest();
        xhr.open("POST", url);
        xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                console.log(xhr.status);
                console.log(xhr.responseText);
            }
        };
        const data = new FormData();
        data.append('token', deleteToken);
        xhr.send(data);
    }


    const myWidget = cloudinary.createUploadWidget({
            cloudName: 'nguyenhs',
            uploadPreset: 'phplaravel'
        }, (error, result) => {
            if (!error && result && result.event === "success") {
                console.log(result);
                thumbnail.value += result.info.secure_url + ',';
                document.getElementById('preview-img').innerHTML +=
                    `<div class="col-md-3 col-sm-3 position-relative">
                        <span class="close-preview">&#10006;</span>
                        <img src="${result.info.secure_url}"
                        data-delete-token = "${result.info.delete_token}"
                        class="col-md-12 col-sm-12 img-thumbnail mr-2 mb-2 imagesChoice">
                    </div>`;
            }
        }
    );
    document.getElementById("upload_widget").addEventListener("click", function () {
        myWidget.open();
    }, false);

//====================================== Reset lại form
    const reset = $('#reset');
    const price = $('input[name="price"]');
    const name = $('input[name="name"]');
    const detailProduct = $('.detailProduct');

    reset.on("click", function () {
        name.attr('value', '');
        if (price.val()) {
            price.attr('value', '');
        }
        if (detailProduct.text()) {
            detailProduct.text('');
        }
        $('#description').text('');
        thumbnail.value = "";
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;

    })
})
