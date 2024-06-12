

<div class="overflow-hidden shadow-lg rounded-lg">
    <table class="min-w-full bg-white rounded-lg">
        <thead class="border-b bg-gray-200">
            <tr>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 ">.
                    اسم العميل
                </th>
               
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 ">
                    عدد الدراجات
                </th>
               
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 ">
                    تاريخ التسجيل
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $customer)
            <tr class="border-b">
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-center">
                    {{ $customer->full_name }}  <!-- Assuming 'full_name' is the column name -->
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                    {{ $customer->number_of_motorcycles }}  <!-- Assuming 'number_of_motorcycles' is the column name -->
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                    {{ $customer->created_at->format('d-m-Y') }}  <!-- Assuming you want to display the 'created_at' date -->
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>