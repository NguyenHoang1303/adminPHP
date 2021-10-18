<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('products')->truncate();
//        Product::factory()
//            ->count(50)
//            ->create();
        DB::table('products')->insert([
            [
                'id' => 1,
                'name' => 'Bắp Cải Trắng Hữu Cơ - 350g',
                'thumbnail' => 'https://res.cloudinary.com/nguyenhs/image/upload/v1634310539/Demo_Laravel/products/bap-cai-tim-500x500_bpnslj.jpg',
                'price' => 38500,
                'categoryId' => 2,
                'description' => 'Bắp cải, Cải bắp - Brassica oleracea L. var. capitata L., là một loại rau chủ lực trong họ Cải - Brassicaceae. Người Pháp gọi nó là Su (Chon) nên từ đó còn có tên là Sú.',
                'detail' => '<div><p class="MsoNormal"><b><span>GIỚI THIỆU SẢN PHẨM<o:p></o:p></span></b></p><p class="MsoNormal"><span>•&nbsp;</span><span>Bắp cải, Cải bắp -&nbsp;<i><span>Brassica oleracea</span></i>&nbsp;L.&nbsp;<i><span>var. capitata</span></i>&nbsp;L., là một loại rau chủ lực trong họ Cải -&nbsp;<i><span>Brassicaceae</span></i>. Người Pháp gọi nó là Su (Chon) nên từ đó còn có tên là Sú.<o:p></o:p></span></p><p class="MsoNormal"><span>•&nbsp;</span><span>Bắp cải là loài rau ôn đới gốc ở Địa Trung Hải được nhập vào trồng ở nước ta. Bắp Cải có vị ngọt, tính mát, ngoài là món ăn ngon ra còn có tác dụng chữa được nhiều bệnh. Bắp Cải đã được sử dụng làm thuốc ở châu Âu từ thời Thượng cổ, người ta đã gọi nó là "Thầy thuốc của người nghèo".<span><o:p></o:p></span></span></p><p class="MsoNormal"><b><span>CÔNG DỤNG<o:p></o:p></span></b></p><p class="MsoNormal"><span>•&nbsp;</span><span>Trong bắp cải có chứa Vitamin A, C, U, canxi, kali,phốt pho, các bon hydrat, protein, calo và một số khoáng chất cần thiết cho sức khỏe. Đặc biệt, lượng vitamin C trong bắp cải chỉ thua Cà Chua, còn nhiều gấp 4,5 lần so với cà rốt, gấp 3,6 lần so với Khoai tây, Hành tây. 100g cải bắp cung cấp cho cơ thể 50 calo.<o:p></o:p></span></p><p class="MsoNormal"><span>•&nbsp;</span><span>Bắp cải có tác dụng giảm cholestorol trong máu, giảm nguy xơ vữa động mạch máu, chống báo phì, chữa tiểu đường, giảm đau nhức..... Những chất dinh dưỡng trong cải bắp giúp gen tăng sản sinh ra các chất enzim tham gia vào quá trình giải độc của cơ thể, lọc máu. Bắp cải cũng làm giảm nguy cơ bị ung thư đặc biệt là ung thư phổi, ung thư dạ dày và tuyến tiền liệt ruột kết.<span><o:p></o:p></span></span></p><p class="MsoNormal"><b><span>CÁCH SỬ DỤNG<o:p></o:p></span></b></p><p class="MsoNormal"><span>•&nbsp;</span><span><span>&nbsp;</span>Bắp cải thường được chế biến bằng cách luộc,hoặc xào với thịt nạc và tôm hoặc nấu canh thịt. Người ta còn nhồi thịt heo nạc băm nhỏ vào các lá Bắp Cải rồi hầm nhừ, hoặc dùng các lá Bắp Cải cuốn thịt&nbsp;<span>nạc để vào xửng mà hấp</span>.<o:p></o:p></span></p><p class="MsoNormal"><span>•&nbsp;</span><span>Đối với những người không ăn được bắp cải có thể chuyển qua dùng nước ép bắp cải.<span><o:p></o:p></span></span></p><p class="MsoNormal"><b><span>LƯỢNG DÙNG<o:p></o:p></span></b></p><p class="MsoNormal"><span>•&nbsp;</span><span><span>&nbsp;</span>Phụ nữ ăn bắp cải 4-5 bữa /tuần sẽ giảm 74% nguy cơ mắc bệnh ung thư vú.<o:p></o:p></span></p><p class="MsoNormal"><span>•</span><span>&nbsp;Người mắc bệnh loét dạ dày, tá tràng uống 1/2 cốc bắp cải ép vào mỗi sáng sớm và trước khi đi ngủ.<span><o:p></o:p></span></span></p><p class="MsoNormal"><span>•&nbsp;</span><span>&nbsp;Nếu ăn 1 tuần 1 lần sẽ giảm 70% xác suất ung thư ruột, dùng 100g hằng ngày sẽ giúp phòng và trị bệnh đái tháo đường type 2.<o:p></o:p></span></p><p class="MsoNormal"><span>• </span><span>Lưu ý : người tạng hàn, rối loạn tuyến giáp, người suy thận nặng phải chạy thận nhân tạo không nên dùng nước ép bắp cải.<span><o:p></o:p></span></span></p><p class="MsoNormal"><b><span>CÁCH BẢO QUẢN<o:p></o:p></span></b></p><p class="MsoNormal"><span>•&nbsp;</span><span><span>&nbsp;</span>&nbsp;Khi mua về mà chưa dùng, bạn không rửa bởi khi dính nước nó sẽ nhanh hỏng, hãy để trong túi nhựa và cất ở ngăn mát của tủ lạnh (được khoảng 1 tuần). Nếu dùng một lần không hết cả cái, bạn có thể giữ phần bắp cải còn lại bằng cách vẩy lên một ít nước rồi cho vào túi nhựa và cất trong tủ lạnh.<span><o:p></o:p></span></span></p></div>',
                'status'=>1,
                'created_at'=>Carbon::now('Asia/Ho_Chi_Minh'),
                'updated_at'=>Carbon::now('Asia/Ho_Chi_Minh'),
            ],
            [
                'id' => 2,
                'name' => 'Bắp Non Hữu Cơ-250g',
                'thumbnail' => 'https://res.cloudinary.com/nguyenhs/image/upload/v1634312496/Demo_Laravel/products/bap-non-huu-co-everyday-goi-250gram--500x500_dhtt7m.jpg',
                'price' => 45000,
                'categoryId' => 2,
                'description' => 'Bắp non được trồng theo phương thức hữu cơ đảm bảo không sử dụng phân bón hoá học, thuốc trừ sâu, trừ cỏ độc hại, không dùng chất kích thích tăng trưởng hay chất bảo quản, không sử dụng giống hay thành phần biến đổi gene (GMO) nên giữ được hương vị đặc trưng. Bắp non không chỉ là một nguồn thực phẩm giàu  magiê, sắt, vitamin B và protein mà còn giúp bạn tránh nhiều bệnh tật như: - Phòng ngừa bệnh trĩ và ung thư - phòng chống oxy hoá - Bảo vệ tim - Cải thiện tình trạng thiếu máu - Giảm mức Cholesterol - Giảm đau khớp, xương - Tác dụng tốt cho bệnh nhân Alzheimer',
                'detail' => 'Bắp non được trồng theo phương thức hữu cơ đảm bảo không sử dụng phân bón hoá học, thuốc trừ sâu, trừ cỏ độc hại, không dùng chất kích thích tăng trưởng hay chất bảo quản, không sử dụng giống hay thành phần biến đổi gene (GMO) nên giữ được hương vị đặc trưng. Bắp non không chỉ là một nguồn thực phẩm giàu  magiê, sắt, vitamin B và protein mà còn giúp bạn tránh nhiều bệnh tật như: - Phòng ngừa bệnh trĩ và ung thư - phòng chống oxy hoá - Bảo vệ tim - Cải thiện tình trạng thiếu máu - Giảm mức Cholesterol - Giảm đau khớp, xương - Tác dụng tốt cho bệnh nhân Alzheimer',
                'status'=>1,
                'created_at'=>Carbon::now('Asia/Ho_Chi_Minh'),
                'updated_at'=>Carbon::now('Asia/Ho_Chi_Minh'),
            ],
            [
                'id' => 3,
                'name' => 'Bắp Cải Tím Hữu Cơ - 500g',
                'thumbnail' => 'https://res.cloudinary.com/nguyenhs/image/upload/v1634354918/Demo_Laravel/products/bap-cai-tim-huu-co-500x500_uw37s3.jpg',
                'price' => 55000,
                'categoryId' => 2,
                'description' => 'Bắp cải tím: tên khoa học là Brassica oleracea var capitata ruba là cây bắp cải có màu tím. Xuất xứ từ Địa Trung Hải, hiện nay được trồng rộng rãi khắp thế giới, thích hợp với khí hậu ôn đới và tại Việt Nam bắp cải tím được trồng nhiều ở Đà Lạt.',
                'detail' => '<div><h2><span><strong><span>Bắp cải tím</span></strong><span>: tên khoa học là Brassica oleracea var capitata ruba là cây bắp cải có màu tím. Xuất xứ từ Địa Trung Hải, hiện nay được trồng rộng rãi khắp thế giới, thích hợp với khí hậu ôn đới và tại Việt Nam bắp cải tím được trồng nhiều ở Đà Lạt.<o:p></o:p></span></span></h2><p class="MsoNormal"><span><span>• Sở dĩ bắp cải tím có màu như vậy là vì nó có hàm lượng cao polyphenol anthocyanin, chất này có tính kháng viêm, bảo vệ tế bào khỏi những tổn hại của tia cực tím và có thể giúp giảm nguy cơ mắc một số bệnh ung thư.</span><o:p></o:p></span></p><p class="MsoNormal"><span><span>• Đặc biệt, lượng vitamin C trong bắp cải tím gấp 6-8 lần so với bắp cải xanh, đồng thời chứa nhiều chất dinh dưỡng thực vật hơn bắp cải xanh.</span><o:p></o:p></span></p><h2><b><span>Cách sử dụng:</span></b></h2><p class="MsoNormal"><span>Bắp cải thường được chế biến bằng cách luộc, hoặc xào,làm salad, cuốn thịt hoặc làm gỏi. (Các cách chế biến tham khảo mục món ngon)<o:p></o:p></span></p><h2><b><span>Cách bảo quản:</span></b></h2><p class="MsoNormal"><span><span>Khi mua về mà chưa dùng, bạn không rửa bởi khi dính nước nó sẽ nhanh hỏng, hãy để trong túi nhựa và cất ở ngăn mát của tủ lạnh (được khoảng 1 tuần). Nếu dùng một lần không hết cả cái, bạn có thể giữ phần bắp cải còn lại bằng cách vẩy lên một ít nước rồi cho vào túi nhựa và cất trong tủ lạnh.</span><span><o:p></o:p></span></span></p></div>',
                'status'=>1,
                'created_at'=>Carbon::now('Asia/Ho_Chi_Minh'),
                'updated_at'=>Carbon::now('Asia/Ho_Chi_Minh'),
            ],
            [
                'id' => 4,
                'name' => 'Bí Ngòi Xanh Hữu Cơ - 300g',
                'thumbnail' => 'https://res.cloudinary.com/nguyenhs/image/upload/v1634355042/Demo_Laravel/products/bi-ngoi-huu-co-500x500_b40cg8.jpg',
                'price' => 28500,
                'categoryId' => 2,
                'description' => 'Bí ngòi xanh là loại trái thuộc họ bầu bí, thân tròn, dài, bên ngoài bí có màu xanh sậm, có ít vân.',
                'detail' => '<div id="collapse-description" class="desc-collapsez showdown"><div>GIỚI THIỆU SẢN PHẨM</div><div><hr></div><p><span>&nbsp;Bí ngòi xanh là loại trái thuộc họ bầu bí, thân tròn, dài, bên ngoài bí có màu xanh sậm, có ít vân.</span><br></p><div>CÔNG DỤNG</div><hr><p>Bí ngòi nói chung giúp chữa các bệnh về hô hấp như hen suyễn, giúp tránh nhồi máu cơ tim và đột quỵ, ngăn ngừa cá bệnh về hoại huyết, thâm tím bị gây ra do thiếu hụt vitamin C.</p><p>Bí ngòi còn giúp tăng khả năng ngăn ngừa chứng đa xơ cứng, ung thư ruột già, ngăn xơ vữa động mạch, làm hạ huyết áp.</p><p>Một số công dụng khác như : Chống lão hóa, tăng cường trí nhớ và làm thuyên giảm những chứng bệnh liên quan đến lão hóa. Bí ngòi còn có tác dụng giảm cân vì các chất dinh dưỡng trong bí ngòi cũng có tác dụng làm tăng chuyển hóa, đồng thời loại quả này 90% là nước và có hàm lượng&nbsp; calorie thấp nên giảm cân hiệu quả.</p><div>CÁCH SỬ DỤNG</div><div><hr></div><p><span>Bí ngòi được chế biến thành rất nhiều món ăn, cụ thể như: bí ngòi xào nấm tươi, trứng rán bí ngòi, cá kho bí ngòi, bí ngòi xào tôm, canh bí ngòi nấu với tôm, thịt bò xào bí ngòi.</span><br><span>Ngoài ra còn có thể làm món bí ngòi hấp, bí ngòi nướng, canh trứng bí ngòi, bí ngồi bao thịt ......</span><br></p><div>&nbsp;</div><div>LƯỢNG DÙNG</div><div><hr></div><div>Mỗi ngày dùng khoảng 500gr bí ngòi sẽ cải thiện được sức khỏe.</div><div>CÁCH BẢO QUẢN</div><div><hr></div><div><span size="2"></span>Bí ngòi có thể bảo quản trong tủ lạnh như rau quả, nhưng không bảo quản quá lâu sẽ làm giảm dinh dưỡng và tạo vị đắng khi sử dụng.</div><div>&nbsp;</div></div>',
                'status'=>1,
                'created_at'=>Carbon::now('Asia/Ho_Chi_Minh'),
                'updated_at'=>Carbon::now('Asia/Ho_Chi_Minh'),
            ],
            [
                'id' => 5,
                'name' => 'Bí Đao Hữu Cơ - 500g',
                'thumbnail' => 'https://res.cloudinary.com/nguyenhs/image/upload/v1634355149/Demo_Laravel/products/bi-dao-huu-co-500x500_pae7ks.jpg',
                'price' => 44000,
                'categoryId' => 2,
                'description' => 'Bí xanh (bí đao) có vị ngọt mát thường được nấu chung với tôm khô tạo thành món canh ngon quen thuộc vào mùa hè. Trong mình bí xanh có chứa rất nhiều các chất như đường, protit, vitamin E, PP, B1, B2, C đồng thời còn có sắt bổ máu, canxi bổ xương,… Sử dụng bí xanh như một loại mặt nạ sẽ cực kỳ hữu dụng trong việc nâng tông độ sáng của làn da, tăng cường độ ẩm giúp da mềm mại.',
                'detail' => '<div id="collapse-description" class="desc-collapsez showdown"><p>Bí xanh (bí đao) có vị ngọt mát thường được nấu chung với tôm khô tạo thành món canh ngon quen thuộc vào mùa hè. Trong mình bí xanh có chứa rất nhiều các chất như đường, protit, vitamin E, PP, B1, B2, C đồng thời còn có sắt bổ máu, canxi bổ xương,… Sử dụng bí xanh như một loại mặt nạ sẽ cực kỳ hữu dụng trong việc nâng tông độ sáng của làn da, tăng cường độ ẩm giúp da mềm mại.</p><p><img class=" img-thumbnail" src="https://res.cloudinary.com/nguyenhs/image/upload/v1634355511/Demo_Laravel/products/tri-nam-hieu-qua-nhat51_wjpw3t.jpg" alt="Trị nám hiệu quả " width="461" height="282"></p><p>Bí xanh cũng được sử dụng như một&nbsp;<a href="http://artdeco.com.vn/blog/6-cach-tri-nam-da-mat-tai-nha-don-gian-nhat.html"><b>cách trị nám da mặt</b></a>&nbsp;hiệu quả và vô cùng an toàn. Trước khi làm mặt nạ bí xanh, bạn cần chuẩn bị một miếng bí vừa tầm, tiết kiệm khoảng 50g, 500g đường phèn.</p><p>Cách thực hiện: rửa sạch bí xanh, thái hạt lưu và hầm nhừ cùng đường. Khi thấy hỗn hợp đã đặc lại, bạn hãy xay mịn rồi lọc bỏ phần bã, chỉ lấy phần nước cất của hỗn hợp rồi bảo quản trong tủ lạnh để sử dụng dần dần.</p><p>Mỗi ngày bạn có thể uống 1 thìa nước cốt trên, hòa chung với 200-300ml nước lọc ấm sẽ giúp thanh lọc các độc tố có trong cơ thể, điều tiết lại tuyến nội tiết đang bị giới hạn. Bên cạnh đó, đắp trực tiếp phần nước cốt lên vùng bị nám cũng sẽ nhanh chóng xóa bỏ dấu tích của các nốt nâu nám da mất thẩm mỹ.</p><p><img class=" wp-image-9734 aligncenter" src="https://res.cloudinary.com/nguyenhs/image/upload/v1634355575/Demo_Laravel/products/ta%CC%89i_xu%C3%B4%CC%81ng_fnqdfx.jpg" alt="Trị nám hiệu quả" width="525" height="349"></p><p>Duy trì việc sử dụng hỗn hợp bí xanh và đường trong một thời gian dài, không chỉ giúp làn da đánh bật những vết nám, mà cơ thể của bạn cũng sẽ dẻo dai, khỏe mạnh hơn nhiều.</p></div>',
                'status'=>1,
                'created_at'=>Carbon::now('Asia/Ho_Chi_Minh'),
                'updated_at'=>Carbon::now('Asia/Ho_Chi_Minh'),
            ],
            [
                'id' => 6,
                'name' => 'Bông Cải Xanh Hữu Cơ - 300g',
                'thumbnail' => 'https://res.cloudinary.com/nguyenhs/image/upload/v1634355689/Demo_Laravel/products/bong-cai-xanh-huu-co-500x500_osazlc.jpg',
                'price' => 57000,
                'categoryId' => 2,
                'description' => 'Bông cải xanh hoặc súp lơ xanh, là một loại cây thuộc họ cải, có hoa lớn ở đầu, thường được dùng như rau. Bông cải xanh thường được chế biến bằng cách luộc hoặc hấp, nhưng cũng có thể được ăn sống như là rau sống trong những đĩa đồ nguội khai vị.',
                'detail' => '<div id="collapse-description" class="desc-collapsez showdown"><div>GIỚI THIỆU SẢN PHẨM</div><div><hr></div><p><span>• Bông cải xanh hoặc súp lơ xanh, là một loại cây thuộc họ cải, có hoa lớn ở đầu, thường được dùng như rau. Bông cải xanh thường được chế biến bằng cách luộc hoặc hấp, nhưng cũng có thể được ăn sống như là rau sống trong những đĩa đồ nguội khai vị.</span><br></p><div><br></div><div>CÁCH SỬ DỤNG</div><div><hr></div><div><span size="2">•</span>&nbsp;Có rất nhiều món ăn được chế biến từ bông cải xanh chẳng hạn như pasta với bông cải xanh, súp bông cải xanh, bông cải xanh xào tôm...</div><p><span size="2">•</span><span>&nbsp;Ta có bông cải xanh trộn dầu hàu, một món ăn giàu đạm và rất ngon hay gà xào bông cải xanh món ăn âm dương kết hợp hài hòa ....</span></p><div><span size="2">•</span>&nbsp;Ngoài ra bông cải xanh được dùng để làm các món salad, xào thịt, xào hải sản, giúp món ăn hạ bớt lượng nhiệt từ dầu mỡ, thịt, đảm bảo hài hòa, cân bằng cho bữa ăn...</div><div>&nbsp;</div><div>CÁCH BẢO QUẢN</div><div><hr></div><div><p><span size="2">•</span>&nbsp;Không nên để bông cải xanh chung với các loại trái cây vì đây là loại rau rất nhạy cảm với khí ethylen sinh ra từ một số loại trái cây.</p></div></div>',
                'status'=>1,
                'created_at'=>Carbon::now('Asia/Ho_Chi_Minh'),
                'updated_at'=>Carbon::now('Asia/Ho_Chi_Minh'),
            ],
            [
                'id' => 7,
                'name' => 'Cà Rốt Hữu Cơ - 300g',
                'thumbnail' => 'https://res.cloudinary.com/nguyenhs/image/upload/v1634355838/Demo_Laravel/products/ca-rot-huu-co-500x500_aomeup.jpg',
                'price' => 41400,
                'categoryId' => 2,
                'description' => 'Cà rốt là loại cây có củ, củ to ở phần đầu và nhọn ở phần đuôi, củ cà rốt thường có màu cam hoặc đỏ, phẩn ăn được thường gọi là củ nhưng thực chất đó là phần rễ của cà rốt',
                'detail' => '<div id="collapse-description" class="desc-collapsez showdown"><h4><div><br></div><div>TIÊU CHUẨN : USDA, EU&nbsp;</div><div><br></div><div><br></div><div>GIỚI THIỆU SẢN PHẨM</div><div><hr></div><p><span>• Cà rốt là loại cây có củ, củ to ở phần đầu và nhọn ở phần đuôi, củ cà rốt thường có màu cam hoặc đỏ, phẩn ăn được thường gọi là củ nhưng thực chất đó là phần rễ của cà rốt.</span><br></p><div><span>CÁCH SỬ DỤNG</span><br></div><div><hr></div><div><span size="2">•</span>&nbsp;Ai cũng biết, cà rốt là loại rau mà có mặt hầu như trong mọi món ăn vì tính bổ dưỡng, dễ chế biến và nhiều công dụng của nó.</div><p><span size="2">•</span><span>&nbsp;Nếu muốn có một làn da mịn màn, tươi sáng hay một đôi mắt long lanh khỏe mạnh ta chỉ cần ép cà rốt lấy nước và dùng hằng ngày. Cà rốt được sấy nhuyễn dùng làm món ăn dặm rất bổ dưỡng cho trẻ.</span></p><div><span size="2">•</span>&nbsp;Ta có thể nấu vô số món dinh dưỡng từ cà rốt ví dụ như: thịt bò nấu cà rốt, súp kem cà rốt, mì rau củ xào cà rốt, cháo cá cà rốt, hay súp cà rốt làm món khai vị .... cà rốt có mặt trên mọi món ăn như bún bò kho, hủ tíu, dùng làm kim chi hay rất nhiều các món ăn khác góp phần làm cho món ăn thêm đậm dà, thơm ngon và bổ dưỡng...</div><div>&nbsp;</div><div><br></div><div>CÁCH BẢO QUẢN</div><div><hr></div><div><p><span size="2">•</span>&nbsp;Trữ cà rốt trong tủ lạnh sau khi đã cắt hết lá. Để trữ cà rốt được lâu, có thể gói cà rốt trong tấm vải và cất trong ngăn mát. Với cách này, bạn có thể bảo quản được cà rốt đến hơn 2 tuần. Không rửa hay cắt nhỏ cà rốt khi bảo quản. Chỉ nên rửa cà rốt ngay trước khi sử dụng.Không nên để cà rốt trong túi nhựa vì hơi ẩm của cà rốt sẽ thoát ra khiến cà rốt dễ héo. Tránh để cà rốt gần các trái cây khác, nó sẽ làm cà rốt mau chin. Cà rốt sẽ bị mềm khi để ngoài không khí. Nếu bị mềm, có thể làm cứng lại bằng cách ngâm vào một tô nước đá. Khi mua cà rốt về, tốt nhất là sử dụng ngay hoặc sử dụng trong vòng 1 – 2 tuần, cà rốt sẽ giữ nguyên được những chất dinh dưỡng vốn có.</p></div></h4></div>',
                'status'=>1,
                'created_at'=>Carbon::now('Asia/Ho_Chi_Minh'),
                'updated_at'=>Carbon::now('Asia/Ho_Chi_Minh'),
            ],
            [
                'id' => 8,
                'name' => 'Cải Bẹ Xanh Hữu Cơ - 300g',
                'thumbnail' => 'https://res.cloudinary.com/nguyenhs/image/upload/v1634356055/Demo_Laravel/products/cai-be-xanh-500x500_kndwoe.jpg',
                'price' => 34000,
                'categoryId' => 2,
                'description' => 'Cải bẹ xanh có thân to, nhỏ khác nhau, lá có màu xanh đậm hoặc xanh nõn lá chuối. Lá và thân cây có vị cay, đăng đắng thường dùng phổ biến nhất là nấu canh, hay để muối dưa (dưa cải). Thời gian thu hoạch cho cải bẹ xanh trong khoảng từ 40 – 45 ngày.',
                'detail' => '<div id="collapse-description" class="desc-collapsez showup"><p>Cải bẹ xanh có thân to, nhỏ khác nhau, lá có màu xanh đậm hoặc xanh nõn lá chuối. Lá và thân cây có vị cay, đăng đắng thường dùng phổ biến nhất là nấu canh, hay để muối dưa (dưa cải). Thời gian thu hoạch cho cải bẹ xanh trong khoảng từ 40 – 45 ngày.</p><p>Thành phần dinh dưỡng trong cải bẹ xanh gồm có: vitamin A, B, C, K, axit nicotic, catoten, abumin…, nên được các chuyên gia dinh dưỡng khuyên dùng vì có nhiều lợi ích đối với sức khỏe cũng như có tác dụng phòng chống bệnh tật.</p><p>Theo Đông y Việt Nam, cải bẹ xanh có vị cay, tính ôn, có tác dụng giải cảm hàn, thông đàm, lợi khí... Riêng hạt cải bẹ xanh, có vị cay, tính nhiệt, không độc, trị được các chứng phong hàn, ho đờm, hen, đau họng, tê dại, mụn nhọt..&nbsp;</p></div>',
                'status'=>1,
                'created_at'=>Carbon::now('Asia/Ho_Chi_Minh'),
                'updated_at'=>Carbon::now('Asia/Ho_Chi_Minh'),
            ],
            [
                'id' => 9,
                'name' => 'Cà Chua Bee Ngọt Hữu Cơ - 300g',
                'thumbnail' => 'https://res.cloudinary.com/nguyenhs/image/upload/v1634356095/Demo_Laravel/products/ca-chua-bee-cherry-huu-co-500x500_ectdih.jpg',
                'price' => 40500,
                'categoryId' => 2,
                'description' => 'Cà chua bi rất giàu vitamin C, vitamin A và canxi. Những lợi ích sức khỏe của chúng là chất chống oxy hóa đáng chú ý và phòng chống ung thư. Theo WHFoods, trong một nghiên cứu 14 tháng,trên Tạp chí của Viện Ung thư Quốc gia tìm thấy cà chua đóng một vai trò quan trọng trong việc phòng ngừa ung thư tuyến tiền liệt. Cà chua chứa lycopene, chất có liên quan đến công tác phòng chống bệnh tim. Nó cũng có chức năng như một chất chống oxy hóa giúp bảo vệ tế bào.',
                'detail' => 'Cà chua bi rất giàu vitamin C, vitamin A và canxi. Những lợi ích sức khỏe của chúng là chất chống oxy hóa đáng chú ý và phòng chống ung thư. Theo WHFoods, trong một nghiên cứu 14 tháng,trên Tạp chí của Viện Ung thư Quốc gia tìm thấy cà chua đóng một vai trò quan trọng trong việc phòng ngừa ung thư tuyến tiền liệt. Cà chua chứa lycopene, chất có liên quan đến công tác phòng chống bệnh tim. Nó cũng có chức năng như một chất chống oxy hóa giúp bảo vệ tế bào.',
                'status'=>1,
                'created_at'=>Carbon::now('Asia/Ho_Chi_Minh'),
                'updated_at'=>Carbon::now('Asia/Ho_Chi_Minh'),
            ],
            [
                'id' => 10,
                'name' => 'Cà Tím Hữu Cơ - 300g',
                'thumbnail' => 'https://res.cloudinary.com/nguyenhs/image/upload/v1634356201/Demo_Laravel/products/ca-tim-huu-co-organicfood-500x500_ghgrca.jpg',
                'price' => 33000,
                'categoryId' => 2,
                'description' => 'Cà tím là một loài cây thuộc họ cà, màu tím huế, ruột trắng, không xơ, ăn ngon. Cà tím giúp giảm nguy cơ mắc các bệnh tim mạch nhờ tác dụng giống như nhóm statins, giúp phòng ngừa bệnh cao huyết áp cũng như bệnh tiểu đường ở một số người có nguy cơ cao. Cà tím còn giúp ngăn chặn sự hình thành của các gốc tự do nhờ nguồn axit folic và kali rất dồi dào, giúp ngăn ngừa ung thư và chống lão hoá các tế bào trong cơ thể. Món ngon với cà tím: cà tím cuộn thịt chiên xù, cà tím kẹp thịt rán giòn, cà tím chiên giòn, cà tím sốt cà chua, cà tím xào hành, cà tím nhồi thịt nướng, thịt ba chỉ cháy cạnh ăn kèm cà tím, canh cà tím nấu sườn non, cà tím xào tôm, cà tím kho thịt, canh cà tím đậu hũ…',
                'detail' => '<div id="collapse-description" class="desc-collapsez showdown"><p>Cà tím là một loài cây thuộc họ cà, màu tím huế, ruột trắng, không xơ, ăn ngon.</p><p>Cà tím giúp giảm nguy cơ mắc các bệnh tim mạch nhờ tác dụng giống như nhóm statins, giúp phòng ngừa bệnh cao huyết áp cũng như bệnh tiểu đường ở một số người có nguy cơ cao. Cà tím còn giúp ngăn chặn sự hình thành của các gốc tự do nhờ nguồn axit folic và kali rất dồi dào, giúp ngăn ngừa ung thư và chống lão hoá các tế bào trong cơ thể.</p><p>Món ngon với cà tím: cà tím cuộn thịt chiên xù, cà tím kẹp thịt rán giòn, cà tím chiên giòn, cà tím sốt cà chua, cà tím xào hành, cà tím nhồi thịt nướng, thịt ba chỉ cháy cạnh ăn kèm cà tím, canh cà tím nấu sườn non, cà tím xào tôm, cà tím kho thịt, canh cà tím đậu hũ…</p></div>',
                'status'=>1,
                'created_at'=>Carbon::now('Asia/Ho_Chi_Minh'),
                'updated_at'=>Carbon::now('Asia/Ho_Chi_Minh'),
            ],


        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
