document.addEventListener("DOMContentLoaded", function () {

//==================================Form search and sort==================================================================
    $('.delete-search').on('click', function () {
        $(this).siblings().val('')
    })
    // id form category admin
    $('#delete-cate').on('click', function () {
        $(this).siblings().val('')
    })
    $('.icon-search').on('click', function () {
        $('#form-search').submit();
    })
    $('.sortOrder').change(function () {
        this.form.submit();
    })
    $('.sortProduct').change(function () {
        this.form.submit();
    })
    $('#select-category').change(function () {
        this.form.submit();
    })

//==================================Form search and sort==================================================================

//=============================Modal information and delete=============================================================
    const deleteId = $('#deleteId');
    const updateId = $('#updateId');
    const urlDelete = deleteId.attr('href')
    const urlUpdate = updateId.attr('href')

    $('#informationModal').on('hidden.bs.modal', function () {
        $('#thumbnail').html("")
        $('#confirmDelete').html("")
        $('#modal-body-information').html("")
    })

    $('.dataItem').on('click', function () {
        const obj = $(this).data('item');
        const detail = $(this).data('detail');

        const name = $(this).data('name');
        const id = $(this).data('id');


        const item = {
            ...obj,
            'detail': detail ? detail : "",
        }

        deleteItem(id, name)
        getInformation(item)
    })

    function deleteItem(id, name) {
        $('#confirmDelete').text(`Do you wan to delete ${name}?`);
        deleteId.attr('href', urlDelete + id)
    }

    function creatHtmlBodyInformation(name, value) {
        const bodyInformation = document.getElementById('modal-body-information');
        if (name === 'Description' || name === 'Detail') {
            bodyInformation.innerHTML +=
                `<div>
                    <label class="col-sm-12 col-md-12 p-0">${name}:</label>
                    <div class="col-sm-12 col-md-12 p-0">
                        <p>${value}</p>
                    </div>
                </div>`
        } else if (name === 'Thumbnail') {
            bodyInformation.innerHTML += `
             <div class="col-sm-12 col-md-12 p-0" >
                <label class="col-sm-12 col-md-12 p-0" >Thumbnail:</label>
                <div id="thumbnail"></div>
            </div>`
        } else {
            bodyInformation.innerHTML +=
                `<div class="col-sm-6 col-md-6 p-0">
                <label>${name}:</label>
                <p>${value}</p>
            </div>`
        }

    }

    function getInformation(item) {
        const id = item.id;
        const thumbnails = item.thumbnail;

        if (item.name) {
            creatHtmlBodyInformation('Name', item.name);
        }

        if (item.status) {
            let value;
            switch (parseInt(item.status)) {
                case 0:
                    value = 'hết hàng';
                    break;
                case 1:
                    value = 'còn hàng';
                    break;
                case -1:
                    value = 'đã xoá';
                    break;
                default:
                    value = 'lỗi';
                    break;
            }
            creatHtmlBodyInformation('Status', value);
        }

        if (item.price) {
            creatHtmlBodyInformation('Price', item.price.toLocaleString('vi', {style: 'currency', currency: 'VND'}));
        }
        if (item.category) {
            creatHtmlBodyInformation('Category', item.category);
        }
        if (item.description) {
            creatHtmlBodyInformation('Description', item.description);
        }
        if (item.created_at) {
            creatHtmlBodyInformation('Created At', item.created_at);
        }
        if (item.updated_at) {
            creatHtmlBodyInformation('Updated At', item.updated_at);
        }

        if (item.detail) {
            creatHtmlBodyInformation('Detail', item.detail);
        }
        updateId.attr('href', urlUpdate + id)

        if (thumbnails !== undefined) {
            const arrayThumbnails = thumbnails.split(',');
            const listThumbnails = arrayThumbnails.filter(ele => ele !== "");
            for (const img of listThumbnails) {
                creatHtmlBodyInformation("Thumbnail", "thumbnails")
                testImage(img);
            }
        }


        function testImage(URL) {
            const tester = new Image();
            tester.onload = imageNotFound(URL);
            tester.onerror = imageFound;
            tester.src = URL;
        }

        function imageNotFound(thumbnails) {
            console.log('That image is found and loaded');
            $('#modal-body-information').append(`<img class="img-thumbnail" style="width: 25%" src="${thumbnails}" alt="">`);
        }

        function imageFound() {
            console.log('That image was not found.');
            $('#thumbnail').html(`<img style="width: 25%" src="${urlImgError}" alt="">`);
        }

    }

    const urlImgError = "https://res.cloudinary.com/nguyenhs/image/upload/v1634270207/image-error/" +
        "33519396-7e56363c-d79d-11e7-969b-09782f5ccbab_qjnqb4.png";
//=============================Modal information and delete=============================================================

//============================= Handler Checked product ================================================================
    const selectItem = $('.selected-item')
    let hrefDeleteAll = $('#deleteAll').attr('href');
    let hrefUpdateAll = $('#updateAll').attr('href');


    $('input[name="selected-all"]').on('click', function () {
        let arr = new Set();
        selectItem.prop('checked', this.checked);

        if (this.checked) {
            $('#menu-table').css('display', 'block')
            for (const ele of selectItem) {
                arr.add(ele.value);
            }

            $('#deleteAll').attr('href', hrefDeleteAll + Array.from(arr).join(','))
            $('#updateAll').attr('href', hrefUpdateAll + Array.from(arr).join(','))
            $('#numberChoice').text(selectItem.length + " select")

        } else {
            $('#deleteAll').attr('href', hrefDeleteAll)
            $('#updateAll').attr('href', hrefUpdateAll)
            $('#menu-table').css('display', 'none')
        }
    })

    selectItem.on('click', function () {
        let arr = new Set();
        let value = this.value;
        for (let i = 0; i < selectItem.length; i++) {
            if (selectItem[i].checked) {
                arr.add(selectItem[i].value)
            }
        }
        if ($(this).prop('checked')) {
            $('#menu-table').css('display', 'block')
            arr.add(value);
        } else {
            if (arr.has(value)) {
                arr.delete(value)
            }
            if (arr.size === 0) {
                $('#menu-table').css('display', 'none')
            }
        }

        if (arr.size > 0) {
            $('#deleteAll').attr('href', hrefDeleteAll + Array.from(arr).join(','))
            $('#updateAll').attr('href', hrefUpdateAll + Array.from(arr).join(','))
        } else {
            $('#deleteAll').attr('href', hrefDeleteAll)
            $('#updateAll').attr('href', hrefUpdateAll)
        }
    })


})
