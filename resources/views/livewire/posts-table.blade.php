<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        	<div class="flex flex-col">
        		<div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        			@auth
	        			<div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8 md:colspan-1">
	        				<div class="overflow-hidden sm:rounded-lg px-6">
                                <h1 class="text-gray-500 text-center mt-6 text-xl">
                                    My Personals Posts
                                </h1>
                                @include('layouts.flash-messages')
	        					<div x-data={show:false}>
	        						<p class="flex p-5">
	        							<button
	        								@click="show=!show"
	        								class="bg-blue-600 text-gray-200 rounded hover:bg-blue-500 px-4 py-3 text-sm focus:outline-none w-full"
	        								type="button">
	        								Create a New Post
	        							</button>
	        						</p>
	        						<div x-show="show" class="px-4 py-3 my-2 text-gray-700">
	        							@include('livewire.create-post')
	        						</div>
	        					</div>
	        				</div>
	        			</div>
        			@endauth
        			<div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8 md:colspan-2">
        				<div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        					<div class="bg-white px-4 py-3 sm:px-6 flex w-full">
        						<input
        							wire:model="search"
        							placeholder="Search..."
        							type="text"
        							name="first_name"
        							id="first_name"
        							autocomplete="given-name"
        							class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block shadow-sm sm:text-sm border-gray-300 rounded-md w-full">
        						<div class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block shadow-sm sm:text-sm border-gray-300 rounded-md">
            						<select
            							wire:model="perPage"
            							class="outline-none text-gray-500 text-sm">
            							<option value="5">5 por página</option>
            							<option value="10">10 por página</option>
            							<option value="15">15 por página</option>
            							<option value="25">25 por página</option>
            							<option value="50">50 por página</option>
            							<option value="100">100 por página</option>
            						</select>
            					</div>
            					@if($search != '' || $perPage != '5')
	            					<button wire:click="clearFilters" class="inline-flex justify-center py-2 px-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-400 hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-300">
										X
									</button>
								@endif
        					</div>

        					@if($posts->count())
            					<table class="min-w-full divide-y divide-gray-200 table-auto">
            						<thead class="bg-gray-50">
            							<tr>
            								<th
                                                wire:click="changeOrder('id')"
                                                scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">
            									ID
            								</th>
            								<th
                                                wire:click="changeOrder('title')"
                                                scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">
            									Title
            								</th>
            								<th
                                                scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            									Owner
            								</th>
            								<th
                                                wire:click="changeOrder('description')"
                                                scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">
            									Description
            								</th>
            								<th
                                                wire:click="changeOrder('publication_date')"
                                                scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">
            									Publication Date
            								</th>
            							</tr>
            						</thead>
            						<tbody class="bg-white divide-y divide-gray-200">
            							@foreach($posts as $post)
	            							<tr>
	            								<td class="px-6 py-4 whitespace-nowrap">
	            									<div class="flex items-center">
	            										<div class="ml-4">
	            											<div class="text-sm font-medium text-gray-900">
	            												{{ $post->id }}
	            											</div>
	            										</div>
	            									</div>
	            								</td>
	            								<td class="px-6 py-4">
	            									<div class="text-sm text-gray-900">{{ $post->title }}</div>
	            								</td>
	            								<td class="px-6 py-4">
	            									<div class="text-sm text-gray-900">{{ $post->user->name }}</div>
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
            					{{ $posts->links() }}
            				@else
            					<div class="bg-white px-4 py-3 border-t border-gray-200 text-gray-500 sm:px-6 text-center">
                                    @empty($search)
            						    No registered Posts
                                    @else
                                        No Results for {{ $search }} in page {{ $page }} when show {{ $perPage }} per page
                                    @endempty
            					</div>
            				@endif
        				</div>
        			</div>

        		</div>
        	</div>
        </div>
    </div>
</div>

