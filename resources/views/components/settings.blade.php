<form class="max-w-sm mx-auto" action="{{ route('update.user.details') }}" method="POST">
    @csrf
    @if (session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Success!</strong>
        <span class="block sm:inline">{{ session('success') }}</span>
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
            <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 1 1-1.697 1.697L10 13.697l-2.651 2.849a1.2 1.2 0 1 1-1.697-1.697L8.303 12 5.651 9.351a1.2 1.2 0 1 1 1.697-1.697L10 10.303l2.651-2.949a1.2 1.2 0 1 1 1.697 1.697L11.697 12l2.651 2.849z"/></svg>
        </span>
    </div>
@endif
    <div class="mb-5">
        <label for="full_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">الاسم</label>
        <input type="text" id="full_name" name="full_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:purple focus:border-purple block w-full p-2.5" placeholder="" required value="{{ old('full_name', Auth::user()->full_name) }}" />
        @error("full_name")
        <span class="text-red-500 text-xs mt-2">{{$message}}</span>
        @enderror
    </div>
    <div class="mb-5">
        <label for="mobile" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">الجوال</label>
        <input type="text" id="mobile" name="mobile" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:purple focus:border-purple block w-full p-2.5" placeholder="555-123-4567" required  value="{{ old('mobile', Auth::user()->mobile) }}"/>
        @error("mobile")
        <span class="text-red-500 text-xs mt-2">{{$message}}</span>
        @enderror
    </div>
    <div class="mb-5">
        <label for="national_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">الرقم الوطني </label>
        <input type="text" id="national_id" name="national_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:purple focus:border-purple block w-full p-2.5" placeholder="1234567890" required  value="{{ old('national_id', Auth::user()->national_id) }}"/>
    </div>
    <div class="mb-5">
        <label for="number_of_motorcycles" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">عدد الدراجات</label>
        <input type="number" id="number_of_motorcycles" name="number_of_motorcycles" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:purple focus:border-purple block w-full p-2.5" placeholder="0" required value="{{ old('number_of_motorcycles', Auth::user()->number_of_motorcycles) }}" />
    </div>
    <button type="submit" class="text-white bg-purple focus:ring-4 focus:outline-none  font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">حفظ</button>
</form>
