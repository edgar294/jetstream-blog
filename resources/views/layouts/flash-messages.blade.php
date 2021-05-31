@if ($message = Session::get('success'))
	<div x-data="{ show: true }" x-show="show"
	    class="flex justify-between items-center bg-green-200 relative text-green-600 py-3 px-3 rounded-lg">
	    <div>
	        {{ $message }}
	    </div>
	    <div>
	        <button type="button" @click="show = false" class=" text-green-700">
	            <span class="text-2xl">&times;</span>
	        </button>
	    </div>
	</div>
@endif

@if ($message = Session::get('error'))
	<div x-data="{ show: true }" x-show="show"
	    class="flex justify-between items-center bg-red-200 relative text-red-600 py-3 px-3 rounded-lg">
	    <div>
	        {{ $message }}
	    </div>
	    <div>
	        <button type="button" @click="show = false" class=" text-red-700">
	            <span class="text-2xl">&times;</span>
	        </button>
	    </div>
	</div>
@endif
