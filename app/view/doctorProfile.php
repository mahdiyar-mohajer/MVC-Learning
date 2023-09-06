<form action="" method="post">
    <div class="bg-gradient-to-b from-purple-600 to-indigo-700 h-96 w-full">
        <div class="w-full flex items-center justify-center my-12">
            <div class="absolute top-40 bg-white dark:bg-gray-800 shadow rounded py-16 lg:px-28 px-8">
                <p class="md:text-3xl text-xl font-bold leading-7 text-center text-gray-700 dark:text-white">complete your profile</p>
                <div class="md:flex items-center mt-12">
                    <div class="md:w-72 flex flex-col">
                        <label class="text-base font-semibold leading-none text-gray-800 dark:text-white">Name</label>
                        <input name="name" tabindex="0" arial-label="Please input name" type="name" class="text-base leading-none text-gray-900 p-3 focus:oultine-none focus:border-indigo-700 mt-4 bg-gray-100 border rounded border-gray-200 placeholder-gray-100" placeholder="Please input  name" />
                    </div>
                    <div class="md:w-72 flex flex-col md:ml-6 md:mt-0 mt-4">
                        <label class="text-base font-semibold leading-none text-gray-800 dark:text-white">Cell Phone Number</label>
                        <input name="phone" tabindex="0" arial-label="Please input email address" type="number" class="text-base leading-none text-gray-900 p-3 focus:oultine-none focus:border-indigo-700 mt-4 bg-gray-100 border rounded border-gray-200 placeholder-gray-100" placeholder="Please input email address" />
                    </div>
                </div>
                <div class="md:flex items-center mt-8">
                    <div class="md:w-72 flex flex-col">
                        <label class="text-base font-semibold leading-none text-gray-800 dark:text-white">Expertise</label>
                        <input name="expertise" tabindex="0" role="input" arial-label="Please input company name" type="name" class="text-base leading-none text-gray-900 p-3 focus:oultine-none focus:border-indigo-700 mt-4 bg-gray-100 border rounded border-gray-200 placeholder-gray-100" placeholder="Please input company name" />
                    </div>
                </div>
                <div class="md:flex items-center mt-8">
                    <div class="ml-8 mt-8">
                        <div x-data="{show: true}">
                            <a href="#" x-on:click.prevent="show = !show" class="relative z-10 border border-gray-600 rounded px-4 py-2 bg-white">
                                <span class="inline-block">Select Days</span>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="stroke-current inline-block w-4 h-4 transform transition duration-150" x-bind:class="{ 'rotate-180': show }">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </a>
                            <div x-show.transition="show" class="relative z-20 mt-1 flex w-64 flex-col px-4 py-8 whitespace-nowrap border border-gray-600 rounded bg-white">
                                <div>
                                    <input type="text" name="text" value="Days" class="inline-block mr-2" />
                                </div>
                                <div><input type="checkbox" name="type[]" value="Saturday" class="inline-block mr-2" />Saturday</div>
                                <div><input type="checkbox" name="type[]" value="Sunday" class="inline-block mr-2" />Sunday</div>
                                <div><input type="checkbox" name="type[]" value="Monday" class="inline-block mr-2" />Monday</div>
                                <div><input type="checkbox" name="type[]" value="Tuesday" class="inline-block mr-2" />Tuesday</div>
                                <div><input type="checkbox" name="type[]" value="Wednesday" class="inline-block mr-2" />Wednesday</div>
                                <div><input type="checkbox" name="type[]" value="Thursday" class="inline-block mr-2" />Thursday</div>
                                <div><input type="checkbox" name="type[]" value="Friday" class="inline-block mr-2" />Friday</div>
                            </div>
                        </div>
                    </div>
                    <div class="ml-8 mt-8">
                        <div x-data="{show: true}">
                            <a href="#" x-on:click.prevent="show = !show" class="relative z-10 border border-gray-600 rounded px-4 py-2 bg-white">
                                <span class="inline-block">Select Time</span>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="stroke-current inline-block w-4 h-4 transform transition duration-150" x-bind:class="{ 'rotate-180': show }">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </a>
                            <div x-show.transition="show" class="relative z-20 mt-1 flex w-64 flex-col px-4 py-8 whitespace-nowrap border border-gray-600 rounded bg-white">
                                <div>
                                    <input type="text" name="text" value="Time" class="inline-block mr-2" />
                                </div>
                                <div><input type="checkbox" name="time[]" value="8-10" class="inline-block mr-2" />8-10</div>
                                <div><input type="checkbox" name="time[]" value="10-12" class="inline-block mr-2" />10-12</div>
                                <div><input type="checkbox" name="time[]" value="12-14" class="inline-block mr-2" />12-14</div>
                                <div><input type="checkbox" name="time[]" value="14-16" class="inline-block mr-2" />14-16</div>
                                <div><input type="checkbox" name="time[]" value="16-18" class="inline-block mr-2" />16-18</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="w-full flex flex-col mt-8">
                        <label class="text-base font-semibold leading-none text-gray-800 dark:text-white">Address</label>
                        <textarea name="address" tabindex="0" aria-label="leave a message" role="textbox" type="name" class="h-36 text-base leading-none text-gray-900 p-3 focus:oultine-none focus:border-indigo-700 mt-4 bg-gray-100 border rounded border-gray-200 placeholder-gray-100 resize-none"></textarea>
                    </div>
                </div>
                <p class="text-xs leading-3 text-gray-600 dark:text-gray-200 mt-4">By clicking submit you agree to our terms of service, privacy policy and how we use data as stated</p>
                <div class="flex items-center justify-center w-full">
                    <button type="submit" class="mt-9 text-base font-semibold leading-none text-white py-4 px-10 bg-indigo-700 rounded hover:bg-indigo-600 focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 focus:outline-none">SUBMIT</button>
                </div>
            </div>
        </div>
    </div>
</form>




