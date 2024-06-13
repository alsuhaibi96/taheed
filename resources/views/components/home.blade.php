<div class="relative overflow-x-auto w-full sm:w-96">
    <div class="flex flex-col gap-4 px-4 sm:px-0">
        <div class="flex justify-between items-center mb-6 sm:mb-12">
            <p class="text-2xl sm:text-3xl font-bold">عدد العملاء المسجلين</p>
            <p class="text-2xl sm:text-3xl font-bold">{{$customerCount}}</p>
        </div>
        <div class="flex justify-between items-center mb-3 sm:mb-3">
            <p class="text-2xl sm:text-3xl font-bold">عدد العملاء الذين اشتروا</p>
            <p class="text-2xl sm:text-3xl font-bold">{{$totalSales}}</p>
        </div>

        <div class="flex justify-between items-center mb-3 sm:mb-3">
            <p class="text-2xl sm:text-3xl font-bold">عدد الدراجات النارية</p>
            <p class="text-2xl sm:text-3xl font-bold">{{$rentals}}</p>
        </div>
    </div>
</div>
