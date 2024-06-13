<div id="content" class="w-full md:pl-64 p-8">
    <div class=" p-2 gap-">
        <h2 class="text-4xl text-purple font-bold text-right my-8">مرحباََ</h2>
        <div class="flex justify-between space-x-4 gap-4">
    
            <!-- Right Side Card -->
            <div class="bg-purple text-white p-6 rounded-lg shadow-lg flex flex-col justify-between w-96">
                <div class="flex justify-between space-x-1">
                    <div class="text-lg">عدد الدراجات النارية</div>
                    <div class="text-3xl">{{$data['rentals'] ?? '-'}}</div>
                </div>
                <div class="flex justify-between">
                    <div class="text-lg">عدد العقود</div>
                    <div class="text-3xl">{{$data['contracts']  ?? '-'}}</div>
                </div>
                <div class="flex justify-between">
                    <div class="text-lg">الإيجارات  المدفوعة</div>
                    <div class="text-3xl">{{$data['totalSales']  ?? '-'}}</div>
                </div>
                <div class="w-full bg-white h-2 mt-4 rounded-full">
                    <div class="bg-purple-800 h-2 rounded-full" style="width: 60%;"></div>
                </div>
            </div>
    
             <!-- Left Side Card -->
             <div class="bg-white p-6 rounded-lg shadow-lg w-96 border-purple border-2 text-purple">
                <div class=" text-lg mb-2">رقم العقد</div>
                <div class="text-3xl mb-4">251223006</div>
                <div class="text-lg mb-2">عدد الدراجات النارية</div>
                <div class="text-2xl mb-2">15</div>
                <div class="text-lg mb-2">عدد دفعات الإيجار المتبقية</div>
                <div class="text-2xl">16</div>
            </div>
    
        </div>
    </div>
    <div class="flex justify-center">
        <div class="flex justify-center mt-12 bg-darkerPurple rounded w-80 p-4 text-white">
            <label class="mx-2">تقدر تأجر دراجات اضافية من هنا</label>
            <img src="{{Vite::asset('resources/images/Screenshot from 2024-06-12 21-40-27 (copy).png')}}" alt="">
            </div>   
    </div>
</div> 