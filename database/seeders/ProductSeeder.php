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
                'name' => 'Bắp Cải Tim Hữu Cơ - 350g',
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
                'thumbnail' => 'https://res.cloudinary.com/nguyenhs/image/upload/v1634312496/Demo_Laravel/products/bap-non-huu-co-everyday-goi-250gram--500x500_dhtt7m.jpg',
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
                'thumbnail' => 'https://res.cloudinary.com/nguyenhs/image/upload/v1634312496/Demo_Laravel/products/bap-non-huu-co-everyday-goi-250gram--500x500_dhtt7m.jpg',
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
                'name' => 'Bí Ngòi Xanh Hữu - 300g',
                'thumbnail' => 'https://res.cloudinary.com/nguyenhs/image/upload/v1634312496/Demo_Laravel/products/bap-non-huu-co-everyday-goi-250gram--500x500_dhtt7m.jpg',
                'price' => 28500,
                'categoryId' => 2,
                'description' => 'Bí ngòi xanh là loại trái thuộc họ bầu bí, thân tròn, dài, bên ngoài bí có màu xanh sậm, có ít vân.',
                'detail' => '<div id="collapse-description" class="desc-collapsez showdown"><div>GIỚI THIỆU SẢN PHẨM</div><div><hr></div><p><span>&nbsp;Bí ngòi xanh là loại trái thuộc họ bầu bí, thân tròn, dài, bên ngoài bí có màu xanh sậm, có ít vân.</span><br></p><div>CÔNG DỤNG</div><hr><p>Bí ngòi nói chung giúp chữa các bệnh về hô hấp như hen suyễn, giúp tránh nhồi máu cơ tim và đột quỵ, ngăn ngừa cá bệnh về hoại huyết, thâm tím bị gây ra do thiếu hụt vitamin C.</p><p>Bí ngòi còn giúp tăng khả năng ngăn ngừa chứng đa xơ cứng, ung thư ruột già, ngăn xơ vữa động mạch, làm hạ huyết áp.</p><p>Một số công dụng khác như : Chống lão hóa, tăng cường trí nhớ và làm thuyên giảm những chứng bệnh liên quan đến lão hóa. Bí ngòi còn có tác dụng giảm cân vì các chất dinh dưỡng trong bí ngòi cũng có tác dụng làm tăng chuyển hóa, đồng thời loại quả này 90% là nước và có hàm lượng&nbsp; calorie thấp nên giảm cân hiệu quả.</p><div>CÁCH SỬ DỤNG</div><div><hr></div><p><span>Bí ngòi được chế biến thành rất nhiều món ăn, cụ thể như: bí ngòi xào nấm tươi, trứng rán bí ngòi, cá kho bí ngòi, bí ngòi xào tôm, canh bí ngòi nấu với tôm, thịt bò xào bí ngòi.</span><br><span>Ngoài ra còn có thể làm món bí ngòi hấp, bí ngòi nướng, canh trứng bí ngòi, bí ngồi bao thịt ......</span><br></p><div>&nbsp;</div><div>LƯỢNG DÙNG</div><div><hr></div><div>Mỗi ngày dùng khoảng 500gr bí ngòi sẽ cải thiện được sức khỏe.</div><div>CÁCH BẢO QUẢN</div><div><hr></div><div><span size="2"></span>Bí ngòi có thể bảo quản trong tủ lạnh như rau quả, nhưng không bảo quản quá lâu sẽ làm giảm dinh dưỡng và tạo vị đắng khi sử dụng.</div><div>&nbsp;</div></div>',
                'status'=>1,
                'created_at'=>Carbon::now('Asia/Ho_Chi_Minh'),
                'updated_at'=>Carbon::now('Asia/Ho_Chi_Minh'),
            ],


        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
