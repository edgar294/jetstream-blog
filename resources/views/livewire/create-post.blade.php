<div>
	<div class="md:grid md:grid-cols-3 md:gap-6">
		<div class="mt-5 md:mt-0 md:col-span-2">
			<div class="sm:rounded-md sm:overflow-hidden">
				<div class="px-4 py-5 bg-white space-y-6 sm:p-6">
					<div class="grid grid-cols-3 gap-6">
						<div class="col-span-3 sm:col-span-2">
							<label class="block text-sm font-medium text-gray-700">
								Title
							</label>
							<div class="mt-1 flex rounded-md shadow-sm">
								<input
									wire:model="title"
									type="text"
									class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
									placeholder="Lorem ipsum">
							</div>
							@error('title') <span class="block text-sm font-medium text-red-700 text-left px-4">{{ $message }}</span> @enderror
						</div>
					</div>
					<div class="grid grid-cols-3 gap-6">
						<div class="col-span-3 sm:col-span-2">
							<label class="block text-sm font-medium text-gray-700">
								Description
							</label>
							<div class="mt-1 flex rounded-md shadow-sm">
								<textarea
									wire:model="description"
									rows="3"
									class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
									placeholder="Lorem ipsum">
								</textarea>
							</div>
							@error('description') <span class="block text-sm font-medium text-red-700 text-left px-4"> {{ $message }}</span> @enderror
						</div>
					</div>
					<div class="grid grid-cols-3 gap-6">
						<div class="col-span-3 sm:col-span-2">
							<label class="block text-sm font-medium text-gray-700">
								Publication Date
							</label>
							<div class="mt-1">
								<input
									type="date"
									wire:model="publication_date"
									class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">
							</div>
							@error('publication_date') <span class="block text-sm font-medium text-red-700 text-left px-4"> {{ $message }}</span> @enderror
						</div>
					</div>
				</div>
				<div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
					<button
						wire:click="clearForm()"
						@click="show=!show"
						class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
						Cancel
					</button>
					<button
						wire:click="store()"
						type="submit"
						class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
						Save
					</button>
				</div>
			</div>
		</div>
	</div>
</div>