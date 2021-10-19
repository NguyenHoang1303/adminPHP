document.addEventListener("DOMContentLoaded", function () {

//==================================Form search and sort==================================================================
    $('#delete-search').on('click', function () {
        $('input[name="query"]').val('');
    })
    $('#select-sort').change(function () {
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
    })

    $('.dataItem').on('click', function () {
        const name = $(this).data('name');
        const id = $(this).data('id');
        const description = $(this).data('description');
        const thumbnail = $(this).data('thumbnail');
        const detail = $(this).data('detail');
        const price = $(this).data('price');
        const status = $(this).data('status');
        const categoryId = $(this).data('category_id');
        const updated_at = $(this).data('updated_at');
        const created_at = $(this).data('created_at');

        const item = {
            'id': id,
            'name': name,
            'description': description,
            'thumbnail': thumbnail,
            'detail': detail,
            'price': price ? price : "fail",
            'status': status,
            'categoryId': categoryId,
            'created_at': created_at,
            'updated_at': updated_at,

        }
        deleteItem(id,name)
        getInformation(item)
    })

    function deleteItem(id, name) {
        $('#confirmDelete').text(`Do you wan to delete ${name}?`);
        deleteId.attr('href', urlDelete + id)
    }

    function getInformation(item) {
        const id = item.id;
        const thumbnails = item.thumbnail;
        $('#name').text(item.name)

        $('#price').text(item.price.toLocaleString('vi', {style : 'currency', currency : 'VND'}))
        $('#status').text(item.status)
        $('#description').text(item.description)
        $('#created').text(item.created_at)
        $('#updated').text(item.updated_at)
        $('#detail').html(item.detail)
        $('#categoryId').text(item.categoryId)
        updateId.attr('href', urlUpdate + id)

        if (thumbnails !== undefined){
            const listThumbnails = thumbnails.split(',');
            listThumbnails.pop();
            for (const img of listThumbnails) {
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
            $('#thumbnail').append(`<img style="width: 49%" src="${thumbnails}" alt="">`);
        }

        function imageFound() {
            console.log('That image was not found.');
            $('#thumbnail').html(`<img style="width: 25%" src="${urlImgError}" alt="">`);
        }

    }

    const urlImgError = "https://res.cloudinary.com/nguyenhs/image/upload/v1634270207/image-error/" +
        "33519396-7e56363c-d79d-11e7-969b-09782f5ccbab_qjnqb4.png";
//=============================Modal information and delete=============================================================

})
