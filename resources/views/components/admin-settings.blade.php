

<ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-gray-200 gap-1 md:gap-8">
    <li class="me-2">
        <a href="#" aria-current="page" class="inline-block py-2 px-4 md:px-8 text-white rounded-lg active" style="background-color: #513ca9">المستخدمين</a>
    </li>
    <li class="me-2">
        <a href="#" aria-current="page" class="inline-block py-2 px-4 md:px-8 text-black rounded-lg border-purple-400 border-2 bg-gray-100">نص الاتفاقية</a>
    </li>
    <li class="me-2">
        <a href="#" aria-current="page" class="inline-block py-2 px-4 md:px-8 text-black rounded-lg border-purple-400 border-2 bg-gray-100">اعتماد ايصال التحويل</a>
    </li>
    <li class="me-2">
        <a href="#" aria-current="page" class="inline-block py-2 px-4 md:px-8 text-black rounded-lg border-purple-400 border-2 bg-gray-100">اعدادات عامة</a>
    </li>
</ul>



<div class="my-16">
    <div class="my-8 md:my-16 overflow-x-auto">
        <table class="w-full">
            <tr class="bg-gray-100">
                <th class="text-lg px-4 py-2 md:px-12 md:py-4">المستخدم</th>
                <th class="text-lg px-4 py-2 md:px-12 md:py-4">البريد الالكتروني</th>
                <th class="text-lg px-4 py-2 md:px-12 md:py-4">صلاحية الدخول</th>
                <th class="text-lg px-4 py-2 md:px-12 md:py-4"> </th>
            </tr>
    
            @foreach($customers as $customer)
            <tr class="text-center">
                <td class="px-4 py-2 md:px-12 md:py-4">{{$customer->full_name}}</td>
                <td class="px-4 py-2 md:px-12 md:py-4">{{$customer->email}}</td>
                <td class="px-4 py-2 md:px-12 md:py-4">{{$customer->role}}</td>
                <td class="px-4 py-2 md:px-12 md:py-4">
                    <form action="{{route('customer.delete', $customer->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:text-red-900">
                            حذف
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
    
</div>
