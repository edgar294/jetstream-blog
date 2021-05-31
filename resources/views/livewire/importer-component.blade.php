<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        	<div class="flex flex-col">
        		<div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        			<div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8 md:colspan-1">
        				<div class="overflow-hidden sm:rounded-lg px-6">
                            <h1 class="text-gray-500 text-center mt-6 text-xl">
                                Automatic Import
                            </h1>
                            @include('layouts.flash-messages')
        				</div>
        			</div>
        			<div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8 md:colspan-2">
        				<div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        					<div class="bg-white px-4 py-3 sm:px-6 flex w-full">
        						<input
        							wire:model="url"
        							placeholder="Url to import posts"
        							type="text"
        							class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block shadow-sm sm:text-sm border-gray-300 rounded-md w-full">
        						<div class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block shadow-sm sm:text-sm border-gray-300 rounded-md flex">
        							@if(!$posts)
	            						<button
	            							wire:click="beginImport"
	        								class="bg-blue-600 text-gray-200 rounded hover:bg-blue-500 px-4 py-3 text-sm focus:outline-none w-full"
	        								type="button">
	        								Import...
	        							</button>
	        						@else
	        							<button
		            						wire:click="cancelImport"
		            						class="inline-flex justify-center py-2 px-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-400 hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-300">
											Cancel Import
										</button>
		            					<button
		            						wire:click="confirmImport"
		            						class="inline-flex justify-center py-2 px-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-400 hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-300">
											Confirm Import
										</button>
									@endif
            					</div>
        					</div>

        					@if($posts)
            					<table class="min-w-full divide-y divide-gray-200 table-auto">
            						<thead class="bg-gray-50">
            							<tr>
            								<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            									Title
            								</th>
            								<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            									Owner
            								</th>
            								<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            									Description
            								</th>
            								<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            									Publication Date
            								</th>
            							</tr>
            						</thead>
            						<tbody class="bg-white divide-y divide-gray-200">
            							@foreach($posts as $post)
	            							<tr>
	            								<td class="px-6 py-4">
	            									<div class="text-sm text-gray-900">{{ $post->title }}</div>
	            								</td>
	            								<td class="px-6 py-4">
	            									<div class="text-sm text-gray-900">{{ $admin->name }}</div>
	            								</td>
	            								<td class="px-6 py-4">
	            									<div class="text-sm text-gray-900">{{ $post->description }}</div>
	            								</td>
	            								<td class="px-6 py-4">
	            									<div class="text-sm text-gray-900">{{ $post->publication_date }}</div>
	            								</td>
	            							</tr>
            							@endforeach
            						</tbody>
            					</table>
            				@endif
        				</div>
        			</div>

        		</div>
        	</div>
        </div>
    </div>
</div>

